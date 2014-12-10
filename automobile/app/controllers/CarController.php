<?php

class CarController extends BaseController {

	public function getSaveVehicle(){
		// Cart::destroy();
		$carinfo=Input::get('carinfo');
		$carinfoarray=explode('/', $carinfo);
		if($carinfoarray){
			$carid=$carinfoarray[1];
			$make=$carinfoarray[2];
			$model=$carinfoarray[3];
		}
		$objcar=Car::whereid($carid)->first();
		if($objcar){
			Cart::add(array('id' => $carid, 'name' => $make.' '.$model, 'qty' => 1, 'price' => $objcar->price, 'options' => array('image' => $objcar->image)));
		}
		$response=Cart::content();
		// return Response::json($cartinfo);
		return View::make('ajax.savevehicle', array('carinfo' => $response));
	}

	public function getRemoveVehicle(){
		$ids=Input::get('parameter');
		try {
			foreach ($ids as $id) {
				$rowId=Cart::search(array('id' => $id));
				Cart::remove($rowId[0]);
			}
			$response=Cart::content();
		} catch (Exception $e) {
			return $response=array();
		}
		
		return View::make('ajax.savevehicle', array('carinfo' => $response));
	}

	public function getCompareVehicle(){
		$carids=Input::get('compare');
		$comparecount=count($carids);
		$carinfo=array();
		$i=0;
		if(count($carids)>0){
			
			
				foreach ($carids as $carid) {
					if($i < 3){
						$objcar 		=Car::whereid($carid)->first();
						if($objcar){
							$temp['id']				=$objcar->id;
							$temp['category']		=$objcar->category;
							$temp['make']			=Make::whereid($objcar->makeid)->pluck('make');
							$temp['model']			=Models::whereid($objcar->modelid)->pluck('model');
							$temp['year']			=$objcar->year;
							$temp['price']			=$objcar->price;
							$temp['mileage']		=$objcar->mileage	;
							$temp['enginepower']	=$objcar->enginepower;
							$temp['fuel']			=$objcar->fuel;
							$temp['body']			=Body::whereid($objcar->bodyid)->pluck('name');
							$temp['transmission']	=$objcar->transmission;
							$temp['color']			=Color::whereid($objcar->colorid)->pluck('name');
							$equipment_ids 			=CarIngredient::wherecarid($objcar->id)->lists('ingredientid');
							$ingredients =array();
							if($equipment_ids){
								foreach ($equipment_ids as $equipment_id) {
									$temp['name'] 	=Ingredient::whereid($equipment_id)->pluck('name');
									$ingredients[] 	=$temp;
								}
							}
							$temp['equipments']		=$ingredients;

							$objseller 				=Dealer::whereid($objcar->dealerid)->first();
							$dealerinfo =array();
							if($objseller){
								$dealerinfo['id'] 		=$objseller->id;
								$dealerinfo['name'] 	=$objseller->name;
								$dealerinfo['companyname']=$objseller->companyname;
								$dealerinfo['address'] 	=$objseller->address.', '.$objseller->city.', '. $objseller->country;
								$dealerinfo['phone']	=$objseller->phone;
								$dealerinfo['email']	=User::whereid($objseller->userid)->pluck('email');
							}
							$temp['dealer'] 		=$dealerinfo;
							$carinfo[]=$temp;
						}
					}
					$i++;
				}
			
		}
		return View::make('car.compare', array('cars'=> $carinfo, 'count'=>$i, 'totalcompare' => $comparecount));
	}	

	public function getbuycar()
	{
		$cars=Car::orderBy('id','desc')->paginate(12);
		if(count($cars) > 0){
			$i=0;
			foreach ($cars as $row) {
				$cars[$i]=$row;
				$cars[$i]['make']=Make::whereid($row->makeid)->pluck('make');
				$cars[$i]['model']=Models::whereid($row->modelid)->pluck('model');
				$cars[$i]['body']=Body::whereid($row->bodyid)->pluck('name');
				$cars[$i]['color']=Color::whereid($row->colorid)->pluck('name');
				$i++;
			}
		}
		return View::make('car.buy_car', array('cars'=> $cars));
	}
	
	public function getbuycarbytype($type){
		$bodyid=Body::wherename($type)->pluck('id');
		$cars=Car::orderBy('id','desc')->wherebodyid($bodyid)->paginate(6);
		if(count($cars) > 0){
			$i=0;
			foreach ($cars as $row) {
				$cars[$i]=$row;
				$cars[$i]['make']=Make::whereid($row->makeid)->pluck('make');
				$cars[$i]['model']=Models::whereid($row->modelid)->pluck('model');
				$cars[$i]['body']=Body::whereid($row->bodyid)->pluck('name');
				$cars[$i]['color']=Color::whereid($row->colorid)->pluck('name');
				$i++;
			}
		}
		return View::make('car.type_buy_car', array('cars' => $cars, 'type'=>$type));

	}

	public function getbuycarbybrand($brand){
		$org_withdash=$brand;
		$brand=str_replace('-', ' ', $brand);
		$makeid=Make::wheremake($brand)->orwhere('make','=',$org_withdash)->pluck('id');
		$cars=Car::where('status','!=','sold')
					->where('makeid','=',$makeid)
					->orderBy('id','desc')
					->paginate(12);
		if(count($cars) > 0){
			$i=0;
			foreach ($cars as $row) {
				$cars[$i]=$row;
				$cars[$i]['make']=Make::whereid($row->makeid)->pluck('make');
				$cars[$i]['model']=Models::whereid($row->modelid)->pluck('model');
				$cars[$i]['body']=Body::whereid($row->bodyid)->pluck('name');
				$cars[$i]['color']=Color::whereid($row->colorid)->pluck('name');
				$i++;
			}
		}
		return View::make('car.car_by_brand', array('brand'=> $brand, 'cars' => $cars));
	}

	public function getCarDetailinfo($type, $id, $make, $model){
		// Session::flush();
		Session::forget('cardetail');
		$carupdate=Car::find($id);
		if(count($carupdate)>0){
			$counts=($carupdate->viewcount +1);
			$carupdate->viewcount=$counts;
			$carupdate->update();
		}
		$url=$type.'/'.$id.'/'.$make.'/'.$model;
		
		$title=$make.' ( '. $model .' )';
		$type=str_replace('-', ' ', $type);
		$make=str_replace('-', ' ', $make);
		$model=str_replace('-', ' ', $model);
		$car=Car::with(array('user','dealer', 'images','color','condition','city', 'ingredients'))->whereid($id)->first();
		
		if(count($car)>0){
			$car['make']=$make;
			$car['model']=$model;
			$car['body']=Body::whereid($car->bodyid)->pluck('name');
			$car['enginepower']=EnginePower::whereid($car->enginepower_id)->pluck('name');
			if($car->cityid !=0)
			$car['city_name']=City::whereid($car->cityid)->pluck('name');
			if(count($car->ingredients)>0){
				$i=0;
				foreach ($car->ingredients as $rows) {
					$car['ingredients'][$i]=$rows;
					$car['ingredients'][$i]['name']=Ingredient::whereid($rows->ingredientid)->pluck('name');
					$i++;
				}
			}

			$description=$car->description ." Price :   ".$car->price .' သိန္း';
			$cardetail['title']=$title;
			$cardetail['description']=$description;
			$cardetail['url']="http://automobile.com.mm/buy-car/".$url;
			$cardetail['image']="http://automobile.com.mm/carphoto/php/files/".$car->image;
			// $cardetail['image']="http://automobilemm.dev/carphoto/php/files/".$car->image;
			
			Session::put('cardetail', $cardetail);
		}else{
			$car=array();
		}
		
		// return Response::json($car);
		return View::make('car.detail', array('car'=> $car));
	}

	public function getCarUserUpload()
	{
		$makes=Make::all();
		$body=Body::all();
		$condition=Condition::all();
		$color=Color::all();
		$enginepowers=EnginePower::all();
		$city=City::all();
		$ingredient=Ingredient::all();
		$response['make']=$makes;
		$response['body']=$body;
		$response['enginepowers']=$enginepowers;
		$response['condition']=$condition;
		$response['color']=$color;
		$response['city']=$city;
		$response['ingredient']=$ingredient;
		return View::make('car.car_user_upload', array('response' => $response));
	}

	public function getVehicleUpdate($id){
		$makes=Make::all();
		$body=Body::all();
		$enginepowers=EnginePower::all();
		$condition=Condition::all();
		$color=Color::all();
		$city=City::all();
		$ingredient=Ingredient::all();
		$response['make']=$makes;
		$response['body']=$body;
		$response['enginepowers']=$enginepowers;
		$response['condition']=$condition;
		$response['color']=$color;
		$response['city']=$city;
		$response['ingredient']=$ingredient;
		$car=Car::with(array('images'))->find($id);
		$response['car']=$car;
		$response['caringredients']=CarIngredient::wherecarid($id)->lists('ingredientid');
		$response['model']=Models::wheremakeid($car->makeid)->get();

		return View::make('car.vehicle_update', array('response' => $response));	
	}

	public function getMyCarlists()
	{
		$cars=array();
		$userinfo=array();
		if(Auth::check()){
			$userid=Auth::user()->id;
			if($userid){
				// $dealerid=Dealer::whereuserid($userid)->pluck('id');
				$cars=Car::wheredealerid($userid)->paginate(6);
				if(count($cars) > 0){
					$i=0;
					foreach ($cars as $row) {
						$cars[$i]=$row;
						$cars[$i]['make']=Make::whereid($row->makeid)->pluck('make');
						$cars[$i]['model']=Models::whereid($row->modelid)->pluck('model');
						$cars[$i]['body']=Body::whereid($row->bodyid)->pluck('name');
						$cars[$i]['color']=Color::whereid($row->colorid)->pluck('name');
						$i++;
					}
				}	
			}
			$userinfo=User::whereid($userid)->with('dealer')->first();
		}		
		// return Response::json($userinfo);
		return View::make('car.my_car_lists', array('cars'=> $cars,'userinfo'=>$userinfo));
	}
	
	public function getDealerinfo()
	{
		$user=array();
		if(Auth::check()){
			$user=User::with(array('dealer'))->whereid(Auth::user()->id)->first();
			// return Response::json($user);
			return View::make('car.dealer_info', array('user'=> $user));
		}
		return View::make('car.dealer_info', array('user'=> $user));
	}

	/*for admin panel*/
	public function getCarlist(){
		$objcar=Car::orderBy('id','=','desc')->paginate(12);
		$count=Car::count();
		if(count($count)> 0){
			$i=0;
			foreach ($objcar as $car) {
				$objcar[$i]=$car;
				$objcar[$i]['make']=Make::whereid($car->makeid)->pluck('make');
				$objcar[$i]['model']=Models::whereid($car->modelid)->pluck('model');
				$objcar[$i]['condition']=Condition::whereid($car->conditionid)->pluck('name');
				$objcar[$i]['body']=Body::whereid($car->bodyid)->pluck('name');
				$objcar[$i]['color']=Color::whereid($car->colorid)->pluck('name');

				$i++;
			}
		}
		return View::make('car.list', 	array('cars' => $objcar));
	}

	public function getAddCar(){
		$makes=Make::all();
		$body=Body::all();
		$condition=Condition::all();
		$color=Color::all();
		$enginepowers=EnginePower::all();
		$city=City::all();
		$ingredient=Ingredient::all();
		$response['make']=$makes;
		$response['body']=$body;
		$response['enginepowers']=$enginepowers;
		$response['condition']=$condition;
		$response['color']=$color;
		$response['city']=$city;
		$response['ingredient']=$ingredient;
		return View::make('car.add', array('response' => $response));
	}

	public function postAddCar(){
		$category=Input::get('category');
		$price=Input::get('price');
		$slip=Input::get('slip');
		$negotiate=Input::get('negotiate');
		$licenseno=Input::get('licenseno');
		$carno=Input::get('car_no');
		$ownerbook=Input::get('ownerbook');
		$makeid=Input::get('makeid');
		$modelid=Input::get('modelid');
		$bodyid=Input::get('bodyid');
		$transmission=Input::get('transmission');
		$handdrive=Input::get('handdrive');
		$enginepower=Input::get('enginepower');
		$fuel=Input::get('fuel');
		$mileage=Input::get('mileage');
		$conditionid=Input::get('conditionid');
		$colorid=Input::get('colorid');
		$year=Input::get('year');
		$seater=Input::get('seater');
		$seatrow=Input::get('seatrow');
		$cityid=Input::get('cityid');
		$country=Input::get('country');
		$description=Input::get('description');
		$ingredient=Input::get('ingredient');
		$image_file=Input::file('image_file');
		$gallery=Input::file('gallery');
		$check=$status=Input::get('status');
		if($check=='auto_mobile'){ //for front user upload
			$status="Sell";
		}
		$userid=Auth::user()->id;

		$image='';
	    if($image_file!=null){
	      	$filename='';
	        $OriginalFilename= $image_file->getClientOriginalName();
	            $image=$OriginalFilename ;
	            // rename file if it already exists by prefixing an incrementing number
	            $FileCounter = 1;
	            $filename = pathinfo($OriginalFilename, PATHINFO_FILENAME);
	            $extension =  pathinfo($OriginalFilename, PATHINFO_EXTENSION);
	            while (file_exists( 'carphoto/php/files/'.$image )){
	              $tempname= $filename . '_' . $FileCounter++ ;
	              $image = $tempname . '.' . $extension;
	           }

	          $destinationPath = 'carphoto/php/files/';
	          Input::file('image_file')->move($destinationPath, $image);
	    }

		$objcar=new Car();
		$objcar->category=$category;
		$objcar->makeid=$makeid;
		$objcar->modelid=$modelid;
		$objcar->conditionid=$conditionid;
		$objcar->bodyid=$bodyid;
		$objcar->colorid=$colorid;
		$objcar->seater=$seater ? $seater : 0;
		$objcar->seatrow=$seatrow ? $seatrow : 0;
		$objcar->year=$year;
		$objcar->price=$price;
		$objcar->slip=$slip;
		$objcar->negotiate=$negotiate;
		$objcar->mileage=$mileage;
		$objcar->fuel=$fuel;
		$objcar->transmission=$transmission;
		$objcar->handdrive=$handdrive ? $handdrive : "Left";
		$objcar->image=$image;
		$objcar->cityid=$cityid;
		$objcar->country=$country;
		$objcar->dealerid=$userid;
		$objcar->licenseno=$licenseno;
		$objcar->carno=$carno ? $carno : '-';
		$objcar->ownerbook=$ownerbook;
		$objcar->enginepower_id=$enginepower;
		$objcar->description=$description;
		$objcar->status=$status;
		$objcar->publish=1;
		$objcar->save();

		$maxid=Car::max('id');
	    $gallery=Input::get('gallery');
	    $count=count($gallery);
	    for($i=0;$i<$count;$i++){
	        if($gallery[$i]==null){}
	        else{ 
	          $carimages=new CarImages();
	          $carimages->carid=$maxid;
	          $carimages->image=$gallery[$i];
	          $carimages->save();
	        }
	    }

	    $ingredient=Input::get('ingredient');
	    $count=count($ingredient);
	    for($i=0;$i<$count;$i++){
	        if($ingredient[$i]==null){}
	        else{ 
	          $caringredients=new CarIngredient();
	          $caringredients->carid=$maxid;
	          $caringredients->ingredientid=$ingredient[$i];
	          $caringredients->save();
	        }
	    }
	    if($check=='auto_mobile'){
	    	return Redirect::to('/sell-car/my-vehicles');
		}
	    return Redirect::to('carlist');
	}



	public function getEditCar($id){
		$makes=Make::all();
		$body=Body::all();
		$enginepowers=EnginePower::all();
		$condition=Condition::all();
		$color=Color::all();
		$city=City::all();
		$ingredient=Ingredient::all();
		$response['make']=$makes;
		$response['enginepowers']=$enginepowers;
		$response['body']=$body;
		$response['condition']=$condition;
		$response['color']=$color;
		$response['city']=$city;
		$response['ingredient']=$ingredient;
		$car=Car::with(array('images'))->find($id);
		$response['model']=array();
		if($car){
			$response['model']=Models::wheremakeid($car->makeid)->get();
		}
		$response['car']=$car;
		$response['caringredients']=CarIngredient::wherecarid($id)->lists('ingredientid');
		// $response['model']=Models::wheremakeid($car->makeid)->get();

		return View::make('car.edit', array('response' => $response));
	}

	public function postUpdateCar($id){
		$frontupdate=Input::get('updatecar') ? Input::get('updatecar'): '';
		$category=Input::get('category');
		$price=Input::get('price');
		$slip=Input::get('slip');
		$negotiate=Input::get('negotiate');
		$licenseno=Input::get('licenseno');
		$ownerbook=Input::get('ownerbook');
		$carno=Input::get('car_no');
		$makeid=Input::get('makeid');
		$modelid=Input::get('modelid');
		$bodyid=Input::get('bodyid');
		$transmission=Input::get('transmission');
		$handdrive=Input::get('handdrive');
		$enginepower=Input::get('enginepower');
		$fuel=Input::get('fuel');
		$mileage=Input::get('mileage');
		$conditionid=Input::get('conditionid');
		$colorid=Input::get('colorid');
		$seater=Input::get('seater');
		$seatrow=Input::get('seatrow');
		$year=Input::get('year');
		$cityid=Input::get('cityid');
		$description=Input::get('description');
		$country=Input::get('country');
		$ingredient=Input::get('ingredient');
		$image_file=Input::file('image_file');
		$longdescription=Input::get('longdescription');
		$gallery=Input::file('gallery');
		$status=Input::get('status');

		$image='';
	    if($image_file!=null){
	      	$filename='';
	      	$image=Car::whereid($id)->pluck('image');
        	@unlink("carphoto/php/files/".$image);
	        $OriginalFilename= $image_file->getClientOriginalName();
	            $image=$OriginalFilename ;
	            // rename file if it already exists by prefixing an incrementing number
	            $FileCounter = 1;
	            $filename = pathinfo($OriginalFilename, PATHINFO_FILENAME);
	            $extension =  pathinfo($OriginalFilename, PATHINFO_EXTENSION);
	            while (file_exists( 'carphoto/php/files/'.$image )){
	              $tempname= $filename . '_' . $FileCounter++ ;
	              $image = $tempname . '.' . $extension;
	           }

	          $destinationPath = 'carphoto/php/files/';
	          Input::file('image_file')->move($destinationPath, $image);
	    }else{
            $image=Input::get('hdphoto');
      	} 

		$objcar=Car::find($id);
		$objcar->category=$category;
		$objcar->makeid=$makeid;
		$objcar->modelid=$modelid;
		$objcar->conditionid=$conditionid;
		$objcar->bodyid=$bodyid;
		$objcar->colorid=$colorid;
		$objcar->seater=$seater;
		$objcar->seatrow=$seatrow;
		$objcar->year=$year;
		$objcar->price=$price;
		$objcar->slip=$slip;
		$objcar->negotiate=$negotiate;
		$objcar->mileage=$mileage;
		$objcar->fuel=$fuel;
		$objcar->transmission=$transmission;
		$objcar->handdrive=$handdrive;
		$objcar->image=$image;
		$objcar->country=$country;
		$objcar->cityid=$cityid;
		$objcar->licenseno=$licenseno;
		$objcar->ownerbook=$ownerbook;
		$objcar->carno=$carno;
		$objcar->enginepower_id=$enginepower;
		$objcar->description=$description;
		if($frontupdate ==''){
			$objcar->status=$status;
		}
		$objcar->publish=Input::get('publish');

		$objcar->save();
		CarImages::wherecarid($id)->delete();
	    $gallery=Input::get('gallery');
	    $count=count($gallery);
	    for($i=0;$i<$count;$i++){
	        if($gallery[$i]==null){}
	        else{ 
	          $carimages=new CarImages();
	          $carimages->carid=$id;
	          $carimages->image=$gallery[$i];
	          $carimages->save();
	        }
	    }

	    CarIngredient::wherecarid($id)->delete();
	    $ingredient=Input::get('ingredient');
	    $count=count($ingredient);
	    for($i=0;$i<$count;$i++){
	        if($ingredient[$i]==null){}
	        else{ 
	          $caringredients=new CarIngredient();
	          $caringredients->carid=$id;
	          $caringredients->ingredientid=$ingredient[$i];
	          $caringredients->save();
	        }
	    }
	    if($frontupdate !=''){
	    	return Redirect::to('sell-car/my-vehicles');
	    }else{
	    	return Redirect::to('carlist');
	    }
	}

	public function getStatusChange($status,$id){
		$car=Car::find($id);
		$car->status=$status;
		$car->save();
		return Redirect::to('carlist');
	}

	public function getSoldStatusChange($id){
		$car=Car::find($id);
		$car->status="sold";
		$car->save();
		return Redirect::to('sell-car/my-vehicles');
	}

	public function getDeleteCar($id){
		$image=Car::whereid($id)->pluck('image');
		$images=CarImages::wherecarid($id)->lists('image');
		@unlink('carphoto/php/files/'.$image);
		if(count($images)>0){
			for($i=0; $i<count($images); $i++){
				@unlink('carphoto/php/files/'.$images[$i]);
				@unlink('carphoto/php/files/thumbnail/'.$images[$i]);
			}
		}
		Car::whereid($id)->delete();
		CarIngredient::wherecarid($id)->delete();
		return Redirect::to('carlist');
	}

	public function getDeleteMyCar($id){
		$image=Car::whereid($id)->pluck('image');
		$images=CarImages::wherecarid($id)->lists('image');
		@unlink('carphoto/php/files/'.$image);
		if(count($images)>0){
			for($i=0; $i<count($images); $i++){
				@unlink('carphoto/php/files/'.$images[$i]);
				@unlink('carphoto/php/files/thumbnail/'.$images[$i]);
			}
		}
		Car::whereid($id)->delete();
		CarIngredient::wherecarid($id)->delete();
		return Redirect::to('sell-car/my-vehicles');
	}

}