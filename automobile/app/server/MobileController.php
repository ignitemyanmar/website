<?php

class MobileController extends BaseController
{

	public function getbodylist(){
		$body=Body::all();
		return Response::json($body);
	}

	public function getcolorlist(){
		$color=Color::all();
		return Response::json($color);
	}

	public function getconditionlist(){
		$condition=Condition::all();
		return Response::json($condition);
	}

	public function getcountrylist(){
		$country=City::all();
		return Response::json($country);
	}

	

	public function getmakelist(){
		$makes=Make::all();
		$arr_make=array();
		if(count($makes)>0){
			foreach ($makes as $row) {
				$temp['id']=$row->id;
				$temp['catid']=0;
				$temp['name']=$row->make;
				$arr_make[]=$temp;
			}
		}
		$makes=$arr_make;
		return Response::json($makes);
	}

	public function getmakebycatlist($catid){
		switch ($catid) {
			case '1':
				$category="ျမန္မာျပည္တြင္ေရာက္ရွိေနေသာ ကားမ်ား";
				break;
			case '2':
				$category="ဆိပ္ကမ္းေရာက္ တန္ဖုိးျဖင့္ေရာင္းမည့္ကားမ်ား";
				break;
			case '3':
				$category="စလစ္မ်ား";
				break;
			case '4':
				$category="အပ္ႏွံရမည့္ ယဥ္အုိယဥ္ေဟာင္းမ်ား";
				break;
			default:
				$category='';
				break;
		}
		$makes=array();
		$makeids=Car::wherecategory($category)->groupBy('makeid')->lists('makeid');
		if(count($makeids)>0){
			$makes=Make::wherein('id', $makeids)->get();
		}
		// return Response::json($makes);
		$arr_make=array();
		if(count($makes)>0){
			foreach ($makes as $row) {
				$temp['id']=$row->id;
				$temp['catid']=$catid;
				$temp['name']=$row->make;
				$arr_make[]=$temp;
			}
		}
		$makes=$arr_make;
		return Response::json($makes);
	}

	public function getmodellist(){
		$models=Models::all();
		$arr_model=array();
		if(count($models)>0){
			foreach ($models as $rows) {
				$temp['id']=$rows->id;
				$temp['makeid']=$rows->makeid;
				$temp['name']=$rows->model;
				$arr_model[]=$temp;
			}
		}
		$models=$arr_model;
		return Response::json($models);
	}

	public function getmodelbymakelist($makeid){
		$models=Models::wheremakeid($makeid)->get();
		$arr_model=array();
		if(count($models)>0){
			foreach ($models as $rows) {
				$temp['id']=$rows->id;
				$temp['makeid']=$makeid;
				$temp['name']=$rows->model;
				$arr_model[]=$temp;
			}
		}
		$models=$arr_model;
		return Response::json($models);
	}

	public function getfuellist(){
		$fuels=array(array('id'=>1, 'name'=>'Diesel'),
					 array('id'=>2, 'name'=>'Gasonline'),
					 array('id'=>3, 'name'=>'CNG'),
					 array('id'=>4, 'name'=>'Octane'),
					 array('id'=>5, 'name'=>'Other'),
					 );
		return Response::json($fuels);
	}

	public function gettransmissionlist(){
		$transmission=array(array('id'=>1, 'name'=>'Automatic'),
					 array('id'=>2, 'name'=>'Manual'),
					 array('id'=>3, 'name'=>'Auto-Manual'),
					 array('id'=>4, 'name'=>'Other'),
					 );
		return Response::json($transmission);
	}

	public function getnewslist(){
		$limit = Input::query('limit') ? Input::query('limit') : 8;
		$offset = Input::query('offset') ? Input::query('offset') : 1;
		$offset = ($offset-1) * $limit;
		$news=News::take($limit)->skip($offset)->get();
		if(count($news)>0){
			$arr_news=array();
			foreach ($news as $row) {
				$temp['id']=$row->id;
				$temp['title']=$row->name;
				$temp['catename']=$row->type;
				$temp['image']='www.automobile.com.mm/newsphoto/php/files/'.$row->image;
				$temp['introtext']=$row->short_description;
				$temp['fulltext']=$row->description;
				$temp['hits']=$row->hits;
				$temp['created']=$row->date;
				$arr_news[]=$temp;
			}
			$news=$arr_news;
		}
		return Response::json($news);
	}

	public function getnewsbytype($type){
		$type=substr($type, 0,5);
		$limit = Input::query('limit') ? Input::query('limit') : 8;
		$offset = Input::query('offset') ? Input::query('offset') : 1;
		$offset = ($offset-1) * $limit;
		$news=News::where('type','like', $type.'%')->take($limit)->skip($offset)->get();
		if(count($news)>0){
			$arr_news=array();
			foreach ($news as $row) {
				$temp['id']=$row->id;
				$temp['name']=$row->name;
				$temp['type']=$row->type;
				$temp['image']='www.automobile.com.mm/newsphoto/php/files/'.$row->image;
				$temp['short_description']=$row->short_description;
				$temp['description']=$row->description;
				$arr_news[]=$temp;
			}
			$news=$arr_news;
		}
		return Response::json($news);
	}

	public function getcarlist(){
		$limit = Input::query('limit') ? Input::query('limit') : 8;
		$offset = Input::query('offset') ? Input::query('offset') : 1;
		$offset = ($offset-1) * $limit;
		$cars=Car::take($limit)->skip($offset)->get();
		if(count($cars) > 0){
			$i=0;
			$arr_car=array();
			foreach ($cars as $row) {
				$temp['id']=$row->id;
				$temp['catid']=0;
				$temp['category']=$row->category;
				$temp['fuelid']=0;
				$temp['fuelname']=$row->fuel;
				$temp['bodytypeid']=$row->bodyid;
				$temp['bodytype']=Body::whereid($row->bodyid)->pluck('name');
				$temp['makeid']=$row->makeid;
				$temp['make']=Make::whereid($row->makeid)->pluck('make');
				$temp['countryid']=0;
				$temp['country']=$row->country;
				$temp['modelid']=$row->modelid;
				$temp['model']=Models::whereid($row->modelid)->pluck('model');
				$temp['conditionid']=$row->conditionid;
				$temp['condition']=Condition::whereid($row->conditionid)->pluck('name');
				$temp['intcolor']=$row->colorid;
				$temp['color']=Color::whereid($row->colorid)->pluck('name');
				$temp['bprice']=0;
				$temp['price']=$row->price;
				$temp['vincode']='';
				$temp['year']=$row->year;
				$temp['mileage']=$row->mileage;
				$temp['image']='www.automobile.com.mm/carphoto/files/'.$row->image;
				$temp['transmission']=$row->transmission;
				$temp['enginepower']=$row->enginepower;
				$temp['description']=$row->description;
				$arr_car[]=$temp;
			}
			$cars=$arr_car;
		}
		return Response::json($cars);
	}

	public function getcarbyid($id){
		$car=Car::whereid($id)->first();
		if(count($car)>0){
			$car['id']=$car->id;
			$car['catid']=0;
			$car['category']=$car->category;
			$car['fuelid']=0;
			$car['fuelname']=$car->fuel;
			$car['bodytypeid']=$car->bodyid;
			$car['bodytype']=Body::whereid($car->bodyid)->pluck('name');
			$car['makeid']=$car->makeid;
			$car['make']=Make::whereid($car->makeid)->pluck('make');
			$car['countryid']=0;
			$car['country']=$car->country;
			$car['modelid']=$car->modelid;
			$car['model']=Models::whereid($car->modelid)->pluck('model');
			$car['conditionid']=$car->conditionid;
			$car['condition']=Condition::whereid($car->conditionid)->pluck('name');
			$car['intcolor']=$car->colorid;
			$car['color']=Color::whereid($car->colorid)->pluck('name');
			$car['bprice']=0;
			$car['price']=$car->price;
			$car['vincode']='';
			$car['year']=$car->year;
			$car['mileage']=$car->mileage;
			$car['image']='www.automobile.com.mm/carphoto/files/'.$car->image;
			$car['transmission']=$car->transmission;
			$car['enginepower']=$car->enginepower;
			$car['description']=$car->description;
			$objimages=CarImages::wherecarid($id)->get();
			$image=array();
			if($objimages){
				foreach ($objimages as $imglist) {
					$image[]='www.automobile.com.mm/carphoto/files/'.str_replace(' ', '%20', $imglist['image']);
				}
			}
			$car['image_list']=$image;
			$seller=array();
			$objdealer=Dealer::whereid($car->dealerid)->first();
			if($objdealer){
				$seller['name']=$objdealer->name ? $objdealer->name : '-';
				$seller['companyname']=$objdealer->companyname ? $objdealer->companyname : '-';
				$seller['address']=$objdealer->address ? $objdealer->address : '-';
				$seller['city']=$objdealer->city ? $objdealer->city : '-';
				$seller['country']=$objdealer->country ? $objdealer->country : '-';
				$seller['website']=$objdealer->website ? $objdealer->website : '-';
				$seller['phone']=$objdealer->phone ? $objdealer->phone : '-';
				$seller['email']=User::whereid($objdealer->userid)->pluck('email');
				$seller['website']=$objdealer->website;
				$img='';
				if($objdealer->logo)
					$img="businesslogo/php/files/".$objdealer->logo;
				$seller['logo']=$img;
			}
			$car['seller']=$seller;


		}
		return Response::json($car);
	}

	public function getcarbyuserid($id){
		$limit = Input::query('limit') ? Input::query('limit') : 8;
		$offset = Input::query('offset') ? Input::query('offset') : 1;
		$offset = ($offset-1) * $limit;
		$car=Car::wheredealerid($id)->take($limit)->skip($offset)->get();
		if(count($car)>0){
			$arr_car=array();
			foreach ($car as $row) {
				$temp['id']=$row->id;
				$temp['catid']=0;
				$temp['category']=$row->category;
				$temp['fuelid']=0;
				$temp['fuelname']=$row->fuel;
				$temp['bodytypeid']=$row->bodyid;
				$temp['bodytype']=Body::whereid($row->bodyid)->pluck('name');
				$temp['makeid']=$row->makeid;
				$temp['make']=Make::whereid($row->makeid)->pluck('make');
				$temp['countryid']=0;
				$temp['country']=$row->country;
				$temp['modelid']=$row->modelid;
				$temp['model']=Models::whereid($row->modelid)->pluck('model');
				$temp['conditionid']=$row->conditionid;
				$temp['condition']=Condition::whereid($row->conditionid)->pluck('name');
				$temp['intcolor']=$row->colorid;
				$temp['color']=Color::whereid($row->colorid)->pluck('name');
				$temp['bprice']=0;
				$temp['price']=$row->price;
				$temp['vincode']='';
				$temp['year']=$row->year;
				$temp['mileage']=$row->mileage;
				$temp['image']='www.automobile.com.mm/carphoto/files/'.$row->image;
				$temp['transmission']=$row->transmission;
				$temp['enginepower']=$row->enginepower;
				$temp['description']=$row->description;
				$arr_car[]=$temp;
			}
			$car=$arr_car;
		}
		return Response::json($car);
	}

	public function deletecarid($id){
		Car::whereid($id)->delete();
		return Response::json("Successfully delete");
	}


	public function getsearchcars($linkparas)
    {
        if($linkparas) 
        {
            $linkparas = explode('/', $linkparas);
        	$count=count($linkparas);
        	$categoryid=null;
        	$category=null;
        	$makeid=null;
        	$modelid=null;
        	for($i=0; $i<$count; $i++){
        		if($i==0){
	        		$categoryid=$linkparas[$i];
	        		if($categoryid==1){
	        			$category='ျမန္မာျပည္တြင္ေရာက္ရွိေနေသာ ကားမ်ား';
	        		}
        		}elseif($i==1){
	        		$makeid=$linkparas[$i];
        		}elseif($i==2){
        			$modelid=$linkparas[$i];
        		}else{
        			//
        		}
        	}
        	$limit = Input::query('limit') ? Input::query('limit') : 8;
			$offset = Input::query('offset') ? Input::query('offset') : 1;
			$offset = ($offset-1) * $limit;
			$cars=array();
       		// dd($categoryid. $makeid. $modelid);
        	if(!is_null($category) && !is_null($makeid) && !is_null($modelid)){
				$cars=Car::wherecategory($category)->wheremakeid($makeid)->wheremodelid($modelid)->take($limit)->skip($offset)->get();
        	}elseif(!is_null($category) && !is_null($makeid) && is_null($modelid)){
				$cars=Car::wherecategory($category)->wheremakeid($makeid)->take($limit)->skip($offset)->get();
        	}elseif(!is_null($category) && is_null($makeid) && is_null($modelid)){
        		$cars=Car::wherecategory($category)->take($limit)->skip($offset)->get();
        	}else{
				$cars=Car::wheremakeid($makeid)->wheremodelid($modelid)->take($limit)->skip($offset)->get();
        	}
        	if(count($cars) > 0){
					$i=0;
					$arr_car=array();
					foreach ($cars as $row) {
						$temp['id']=$row->id;
						$temp['catid']=$categoryid;
						$temp['category']=$row->category;
						$temp['price']=$row->price;
						$temp['year']=$row->year;
						$temp['fuel']=$row->fuel;
						$temp['bodytype']=$row->bodyid;
						$temp['make']=$row->makeid;
						$temp['model']=$row->modelid;
						$temp['condition']=$row->conditionid;
						$temp['vincode']='';
						$temp['extcolor']=$row->colorid;
						$temp['imgmain']=$row->image;
						$arr_car[]=$temp;
					}
					$cars=$arr_car;
				}
				return Response::json($cars);
        }
    }

    public function postcarcreate(){
    	$categoryid=Input::get('catid');
    	switch ($categoryid) {
    		case '1':
    			$category='ျမန္မာျပည္တြင္ေရာက္ရွိေနေသာ ကားမ်ား';
    			break;
    		case '2':
    			$category='ဆိပ္ကမ္းေရာက္ တန္ဖုိးျဖင့္ေရာင္းမည့္ကားမ်ား';
    			break;
    		case '3':
    			$category='စလစ္မ်ား';
    			break;
    		case '4':
    			$category='အပ္ႏွံရမည့္ ယဥ္အုိယဥ္ေဟာင္းမ်ား';
    			break;
    		
    		default:
    			$category=null;
    			break;
    	}
    	$fuelid=Input::get('fuel');
    	switch ($fuelid) {
    		case '1':
    			$fuel='Diesel';
    			break;
    		case '2':
    			$fuel='Gasonline';
    			break;
    		case '3':
    			$fuel='CNG';
    			break;
    		case '4':
    			$fuel='Octane';
    			break;
    		case '5':
    			$fuel='Other';
    			break;
    		
    		default:
    			$fuel=null;
    			break;
    	}
    	$transid=Input::get('trans');
    	switch ($transid) {
    		case '1':
    			$transmission='Automatic';
    			break;
    		case '2':
    			$transmission='Manual';
    			break;
    		case '3':
    			$transmission='Auto-Manual';
    			break;
    		case '4':
    			$transmission='Other';
    			break;
    		default:
    			$transmission=null;
    			break;
    	}
    	$input=Input::all();
    	if($categoryid==1){
	    	$objcar=new Car();
	    	$objcar->category=$category;
	    	$objcar->makeid=$input['make'];
	    	$objcar->modelid=$input['model'];
	    	$objcar->cityid=$input['country'];
	    	$objcar->conditionid=$input['condition'];
	    	$objcar->dealerid=$input['user'];
	    	$objcar->bodyid=$input['bodytype'];
	    	$objcar->fuel=$fuel;
	    	$objcar->transmission=$transmission;
	    	$objcar->year=$input['year'];
	    	$objcar->mileage=$input['mileage'];
	    	$objcar->price=$input['price'];
	    	$objcar->colorid=$input['extcolor'];
	    	$objcar->enginepower=$input['engine'];

	    	$checkcar=Car::wheremakeid($input['make'])->wheremodelid($input['model'])
	    					->wherebodyid($input['bodytype'])
	    					->wheredealerid($input['user'])->get();
	    	if(count($checkcar)>0){
	    		return Response::json("Already exit.");
	    	}
	    	$objcar->save();
    	}elseif($categoryid==2){
    		$objcar=new Car();
	    	$objcar->category=$category;
	    	$objcar->price=$input['price'];
	    	$objcar->licneseno=$input['licneseno'];
	    	$objcar->ownerbook=$input['ownerbook'];
	    	$objcar->sellingtype=$input['sellingtype'];
	    	$objcar->longdays=$input['longdays'];
	    	$objcar->makeid=$input['make'];
	    	$objcar->modelid=$input['model'];
	    	$objcar->bodyid=$input['bodytype'];
	    	$objcar->mileage=$input['mileage'];
	    	$objcar->conditionid=$input['condition'];
	    	$objcar->year=$input['year'];
	    	$objcar->carno=$input['carno'];
	    	$objcar->description=$input['description'];
	    	$objcar->attachfile=$input['attachfile'];
	    	$objcar->dealerid=$input['user'];

	    	$checkcar=Car::wheremakeid($input['make'])->wheremodelid($input['model'])
	    					->wherebodyid($input['bodytype'])
	    					->wheredealerid($input['user'])->get();
	    	if(count($checkcar)>0){
	    		return Response::json("Already exit.");
	    	}
	    	$objcar->save();
    	}
    	return Response::json("success");
    	/*$objcar->equipment=$input['equipment'];
    	$objcar->transmission=$input['trans'];
    	$objcar->drive=$input['drive'];
    	$objcar->fuel=$input['fuel'];
    	$objcar->month=$input['month'];
    	$objcar->vincode=$input['vincode'];
    	$objcar->bprice=$input['bprice'];
    	$objcar->intcolor=$input['intcolor'];
    	$objcar->doors=$input['doors'];
    	$objcar->seats=$input['seats'];
    	$objcar->creatdate=$input['creatdate'];
    	$objcar->expirdate=$input['expirdate'];
    	$objcar->embedcode=$input['embedcode'];
    	$objcar->fcommercial=$input['fcommercial'];
    	$objcar->ffeatured=$input['ffeatured'];*/
    }

    /*************************************
    * Start  16.5.14
	**************************************
    */
    public function getmycar(){
    	$userid=Input::get('userid');
    	$limit = Input::query('limit') ? Input::query('limit') : 8;
		$offset = Input::query('offset') ? Input::query('offset') : 1;
		$offset = ($offset-1) * $limit;
		$car=Car::wheredealerid($userid)->take($limit)->skip($offset)->get();
		if(count($car)>0){
			$arr_car=array();
			foreach ($car as $row) {
				$temp['id']=$row->id;
				switch ($row->category) {
					case 'ျမန္မာျပည္တြင္ေရာက္ရွိေနေသာ ကားမ်ား':
						$categoryid=1;
						break;
					case 'ဆိပ္ကမ္းေရာက္ တန္ဖုိးျဖင့္ေရာင္းမည့္ကားမ်ား':
						$categoryid=2;
						break;
					case 'စလစ္မ်ား':
						$categoryid=3;
						break;
					case 'အပ္ႏွံရမည့္ ယဥ္အုိယဥ္ေဟာင္းမ်ား':
						$categoryid=4;
						break;
					default:
						$categoryid=0;
						break;
				}
				$temp['catid']=$categoryid;
				$temp['category']=$row->category;
				$temp['makeid']=$row->makeid;
				$temp['make']=Make::whereid($row->makeid)->pluck('make');
				$temp['modelid']=$row->modelid;
				$temp['model']=Models::whereid($row->modelid)->pluck('model');
				$temp['bodytypeid']=$row->bodyid;
				$temp['bodytype']=Body::whereid($row->bodyid)->pluck('name');
				$temp['countryid']=0;
				$temp['country']=$row->country;
				$temp['fuelid']=0;
				$temp['fuelname']=$row->fuel;
				$temp['user']=$userid;
				$temp['driveid']=null;
				$temp['drive']=null;
				$temp['transid']=1;
				$ingredientids=null;
				$ingredientids=$temp['equipmentid']=CarIngredient::wherecarid($row->id)->lists('ingredientid');
				if(count($ingredientids)>0){
					$temp['equipment']=Ingredient::wherein('id', $ingredientids)->lists('name');
				}else{
					$temp['equipment']=array();
				}
				// return Response::json($temp['equipment']);

				$temp['trans']=$row->transmission;
				$temp['conditionid']=$row->conditionid;
				$temp['condition']=Condition::whereid($row->conditionid)->pluck('name');
				$temp['intcolor']=$row->colorid;
				$temp['color']=Color::whereid($row->colorid)->pluck('name');
				$temp['bprice']=0;
				$temp['price']=$row->price;
				$temp['vincode']='';
				$temp['year']=$row->year;
				$temp['month']=0;
				$temp['doors']=null;
				$temp['seats']=null;
				$temp['hits']=$row->viewcount;
				$temp['mileage']=$row->mileage;
				$temp['imgmain']='www.automobile.com.mm/carphoto/files/'.$row->image;
				$temp['engine']=$row->enginepower;
				$temp['description']=$row->description;
				$temp['imgcount'] =(CarImages::wherecarid($row->id)->count('id') + 1);
				$arr_car[]=$temp;
			}
			$car=$arr_car;
		}
		return Response::json($car);

    }

    public function getcarbycarid($id){
    	$car=Car::whereid($id)->first(array('modelid', 'category','makeid','price','fuel','bodyid', 'colorid','conditionid'));
    	if($car){
    		$carinfo=array();
    		$carinfo['id']=$id;
    		$carinfo['model']=$car->modelid;
    		switch ($car->category) {
					case 'ျမန္မာျပည္တြင္ေရာက္ရွိေနေသာ ကားမ်ား':
						$categoryid=1;
						break;
					case 'ဆိပ္ကမ္းေရာက္ တန္ဖုိးျဖင့္ေရာင္းမည့္ကားမ်ား':
						$categoryid=2;
						break;
					case 'စလစ္မ်ား':
						$categoryid=3;
						break;
					case 'အပ္ႏွံရမည့္ ယဥ္အုိယဥ္ေဟာင္းမ်ား':
						$categoryid=4;
						break;
					default:
						$categoryid=0;
						break;
				}
    		$carinfo['catid']=$categoryid;
    		$carinfo['price']=$car->price;
    		switch ($car->fuel) {
					case 'Diesel':
						$fuelid=1;
						break;
					case 'Gasonline':
						$fuelid=2;
						break;
					case 'CNG':
						$fuelid=3;
						break;
					case 'Octane':
						$fuelid=4;
						break;
					case 'Other':
						$fuelid=5;
						break;
					default:
						$fuelid=0;
						break;
				}
    		$carinfo['fuel']=$fuelid;
    		$carinfo['bodytype']=$car->bodyid;
    		$carinfo['make']=$car->makeid;
    		$carinfo['condition']=$car->conditionid;
    		$carinfo['vincode']=null;
    		$carinfo['intcolor']=$car->colorid;
    	}
    	return Response::json($carinfo);
    }


    public function getcarlistbyuserid($userid){
    	$car=Car::wheredealerid($userid)->get(array('id','modelid', 'category','makeid','price','fuel','bodyid', 'colorid','conditionid'));
    	if($car){
    		$temp=array();
    		foreach ($car as $row) {
    			$carinfo=array();
	    		$carinfo['id']=$row->id;
	    		$carinfo['model']=$row->modelid;
	    		switch ($row->category) {
						case 'ျမန္မာျပည္တြင္ေရာက္ရွိေနေသာ ကားမ်ား':
							$categoryid=1;
							break;
						case 'ဆိပ္ကမ္းေရာက္ တန္ဖုိးျဖင့္ေရာင္းမည့္ကားမ်ား':
							$categoryid=2;
							break;
						case 'စလစ္မ်ား':
							$categoryid=3;
							break;
						case 'အပ္ႏွံရမည့္ ယဥ္အုိယဥ္ေဟာင္းမ်ား':
							$categoryid=4;
							break;
						default:
							$categoryid=0;
							break;
					}
	    		$carinfo['catid']=$categoryid;
	    		$carinfo['price']=$row->price;
	    		switch ($row->fuel) {
						case 'Diesel':
							$fuelid=1;
							break;
						case 'Gasonline':
							$fuelid=2;
							break;
						case 'CNG':
							$fuelid=3;
							break;
						case 'Octane':
							$fuelid=4;
							break;
						case 'Other':
							$fuelid=5;
							break;
						default:
							$fuelid=0;
							break;
					}
	    		$carinfo['fuel']=$fuelid;
	    		$carinfo['bodytype']=$row->bodyid;
	    		$carinfo['make']=$row->makeid;
	    		$carinfo['condition']=$row->conditionid;
	    		$carinfo['vincode']=null;
	    		$carinfo['intcolor']=$row->colorid;
	    		$temp[]=$carinfo;
    		}
    		$car=$temp;
    	}
    	return Response::json($car);
    }

    public function getcarlistinfo(){
    	$car=Car::get(array('id','modelid', 'category','makeid','price','fuel','bodyid', 'colorid','conditionid'));
    	if($car){
    		$temp=array();
    		foreach ($car as $row) {
    			$carinfo=array();
	    		$carinfo['id']=$row->id;
	    		$carinfo['model']=$row->modelid;
	    		switch ($row->category) {
						case 'ျမန္မာျပည္တြင္ေရာက္ရွိေနေသာ ကားမ်ား':
							$categoryid=1;
							break;
						case 'ဆိပ္ကမ္းေရာက္ တန္ဖုိးျဖင့္ေရာင္းမည့္ကားမ်ား':
							$categoryid=2;
							break;
						case 'စလစ္မ်ား':
							$categoryid=3;
							break;
						case 'အပ္ႏွံရမည့္ ယဥ္အုိယဥ္ေဟာင္းမ်ား':
							$categoryid=4;
							break;
						default:
							$categoryid=0;
							break;
					}
	    		$carinfo['catid']=$categoryid;
	    		$carinfo['price']=$row->price;
	    		switch ($row->fuel) {
						case 'Diesel':
							$fuelid=1;
							break;
						case 'Gasonline':
							$fuelid=2;
							break;
						case 'CNG':
							$fuelid=3;
							break;
						case 'Octane':
							$fuelid=4;
							break;
						case 'Other':
							$fuelid=5;
							break;
						default:
							$fuelid=0;
							break;
					}
	    		$carinfo['fuel']=$fuelid;
	    		$carinfo['bodytype']=$row->bodyid;
	    		$carinfo['make']=$row->makeid;
	    		$carinfo['condition']=$row->conditionid;
	    		$carinfo['vincode']=null;
	    		$carinfo['intcolor']=$row->colorid;
	    		$temp[]=$carinfo;
    		}
    		$car=$temp;
    	}
    	return Response::json($car);
    }

    public function getsearch(){
    	$categoryid=null;
    	$category=null;
    	$makeid=null;
    	$modelid=null;

        $catid = Input::get('catid') ? Input::get('catid') : null;
		$makeid = Input::get('makeid') ? Input::get('makeid') : null;
		$modelid = Input::get('modelid') ? Input::get('modelid') : null;
		if(!is_null($catid)){
			switch ($catid) {
				case '1':
					$category='ျမန္မာျပည္တြင္ေရာက္ရွိေနေသာ ကားမ်ား';
					break;
				case '2':
					$category='ဆိပ္ကမ္းေရာက္ တန္ဖုိးျဖင့္ေရာင္းမည့္ကားမ်ား';
					break;
				case '3':
					$category='စလစ္မ်ား';
					break;
				case '4':
					$category='အပ္ႏွံရမည့္ ယဥ္အုိယဥ္ေဟာင္းမ်ား';
					break;
				default:
					$category=null;
					break;
			}
		}
		$limit = Input::query('limit') ? Input::query('limit') : 8;
		$offset = Input::query('offset') ? Input::query('offset') : 1;
		$offset = ($offset-1) * $limit;
			$cars=array();
        	if(!is_null($category) && !is_null($makeid) && !is_null($modelid)){
				$cars=Car::wherecategory($category)->wheremakeid($makeid)->wheremodelid($modelid)->take($limit)->skip($offset)->get();
        	}elseif(!is_null($category) && !is_null($makeid) && is_null($modelid)){
				$cars=Car::wherecategory($category)->wheremakeid($makeid)->take($limit)->skip($offset)->get();
        	}elseif(!is_null($category) && is_null($makeid) && is_null($modelid)){
        		$cars=Car::wherecategory($category)->take($limit)->skip($offset)->get();
        	}else{
				$cars=Car::wherecategory($category)->wheremakeid($makeid)->wheremodelid($modelid)->take($limit)->skip($offset)->get();
        	}
        	if(count($cars)>0){
				$arr_car=array();
				foreach ($cars as $row) {
					switch ($row->category) {
						case 'ျမန္မာျပည္တြင္ေရာက္ရွိေနေသာ ကားမ်ား':
							$categoryid=1;
							break;
						case 'ဆိပ္ကမ္းေရာက္ တန္ဖုိးျဖင့္ေရာင္းမည့္ကားမ်ား':
							$categoryid=2;
							break;
						case 'စလစ္မ်ား':
							$categoryid=3;
							break;
						case 'အပ္ႏွံရမည့္ ယဥ္အုိယဥ္ေဟာင္းမ်ား':
							$categoryid=4;
							break;
						default:
							$categoryid=0;
							break;
					}
					$temp['id']=$row->id;
					$temp['catid']=$categoryid;
					$temp['catname']=$row->category;
					$temp['makeid']=$row->makeid;
					$temp['makename']=Make::whereid($row->makeid)->pluck('make');
					$temp['modelid']=$row->modelid;
					$temp['modelname']=Models::whereid($row->modelid)->pluck('model');
					$temp['bodytypeid']=$row->bodyid;
					$temp['bodytype']=Body::whereid($row->bodyid)->pluck('name');
					$temp['countryid']=0;
					$temp['country']=$row->country;
					$temp['fuelid']=0;
					$temp['fuel']=$row->fuel;
					$temp['user']=$row->dealerid;
					$temp['driveid']=null;
					$temp['drive']=null;
					$temp['transid']=1;
					$ingredientids=null;
					$ingredientids=$temp['equipmentid']=CarIngredient::wherecarid($row->id)->lists('ingredientid');
					if(count($ingredientids)>0){
						$temp['equipment']=Ingredient::wherein('id', $ingredientids)->lists('name');
					}else{
						$temp['equipment']=array();
					}
					// return Response::json($temp['equipment']);

					$temp['transid']=null;
					$temp['trans']=$row->transmission;
					$temp['conditionid']=$row->conditionid;
					$temp['condition']=Condition::whereid($row->conditionid)->pluck('name');
					$temp['intcolor']=$row->colorid;
					$temp['color']=Color::whereid($row->colorid)->pluck('name');
					$temp['bprice']=0;
					$temp['price']=$row->price;
					$temp['vincode']='';
					$temp['year']=$row->year;
					$temp['month']=0;
					$temp['doors']=null;
					$temp['seats']=null;
					$temp['creatdate'] = $row->created_at;
					$temp['expirdate'] = $row->updated_at;
					$temp['embedcode'] = null;
					$temp['fcommercial'] = null;
					$temp['ffeatured'] = null;
					$temp['ftop'] = null;
					$temp['special'] = null;
					$temp['fauction'] = null;
					$temp['ordering'] =null;
					$temp['state'] =null;
					$temp['expemail'] =null;
					$temp['otherinfo'] =null;
					$temp['unweight'] =null;
					$temp['grweight'] =null;
					$temp['length'] =null;
					$temp['width'] =null;
					$temp['displacement'] = null;
					$temp['solid'] = null;
					
					$temp['hits']=$row->viewcount;
					$temp['mileage']=$row->mileage;
					$temp['imgmain']='www.automobile.com.mm/carphoto/files/'.$row->image;
					$temp['engine']=$row->enginepower;
					$temp['description']=$row->description;
					$temp['imgcount'] =(CarImages::wherecarid($row->id)->count('id') + 1);
					$arr_car[]=$temp;
				}
				$cars=$arr_car;
			}
		return Response::json($cars);
    }

        public function getuserbyid($id){
	    	$objuser=User::find($id);
	    	$userinfo=array();
	    	if(count($objuser)>0){
	        	$userinfo['id']=$objuser->id;
	        	$userinfo['name']=$objuser->name;
	        	$userinfo['firstname']=$objuser->first_name;
	        	$userinfo['lastname']=$objuser->last_name;
	        	$userinfo['email']=$objuser->email;
	        	$userinfo['company']=Dealer::whereuserid($objuser->id)->pluck('companyname');
	        	$userinfo['phone']=$objuser->phone;
	        	$userinfo['country']=$objuser->country;
        	}
	        return Response::json($userinfo);
        }

        public function postuserregister(){
        	$check=User::whereemail(Input::get('email'))->first();
        	if(count($check)>0){
        		$userinfo['status']=0;
        		$userinfo['message']='Email is already in us';
        		return Response::json($userinfo);
        	}
        	$objuser=new User();
        	$objuser->first_name=Input::get('name');
        	$objuser->name=Input::get('username');
        	$objuser->email=Input::get('email');
        	$objuser->password=Hash::make(Input::get('password'));
        	$objuser->phone=Input::get('phone');
        	$objuser->country=Input::get('country');
        	$objuser->save();
        	$userid=User::max('id');
        	$objdealer=new Dealer();
        	$objdealer->userid=$userid;
        	$objdealer->companyname=Input::get('companyname');
			$objdealer->save();

			$objuser=User::find($userid);
	    	$userinfo=array();
	    	if(count($objuser)>0){
	    		$userinfo['status']=1;
	    		$userinfo['message']='Save successfully your record.';
	        	$userinfo['userid']=$objuser->id;
	        	$userinfo['name']=$objuser->first_name;
	        	$userinfo['lastname']=$objuser->last_name;
	        	$userinfo['username']=$objuser->name;
	        	$userinfo['email']=$objuser->email;
	        	$userinfo['companyname']=Dealer::whereuserid($objuser->id)->pluck('companyname');
	        	$userinfo['phone']=$objuser->phone;
	        	$userinfo['country']=$objuser->country;
        	}
	        return Response::json($userinfo);
	    }

	    public function postuserlogin(){
	    	$loginuser = array(
                  'email' => Input::get('email'),
                  'password' => Input::get('password')
              );
              
	        if (Auth::attempt($loginuser)) {
	        	$response['status'] = 1;
                $response['message'] = "Successfully your login.";
                $response['userid'] =  Auth::user()->id;
                $response['name'] =  Auth::user()->name;
                $response['username'] =  Auth::user()->first_name;
                $response['email'] =  Auth::user()->email;
                $companyname = Dealer::whereuserid(Auth::user()->id)->pluck('companyname');
                $response['companyname'] =  $companyname;
                $response['phone'] =  Auth::user()->phone;
                $response['country'] =  Auth::user()->country;
                return Response::json($response); 
	        }else{
                $response['status'] = 0;
                $response['message'] = "Invalid email and password.";
                return Response::json($response);                    
            }
	    }

	    public function postuseredit(){
	    	$input = (object)Input::all();
            $user = array(
                'email' => $input->email,
                'password' => $input->currentpassword
                );
            if(Auth::check()){
                Auth::logout();
            }
            if(Auth::attempt($user)){

                $edituser = User::whereid($input->userid)->first();
                $edituser->first_name = $input->name;
                $edituser->name = $input->username;
                if($input->newpassword != ""){
                    $edituser->password = Hash::make($input->newpassword);
                }else{
                	$edituser->password = Hash::make($input->currentpassword);
                }
                $edituser->phone = $input->phone;
                $edituser->country = $input->country;
                $edituser->save();

                $eidtdealer = Dealer::whereuserid($input->userid)->first();   
                $eidtdealer->companyname = $input->companyname;
                $eidtdealer->save();

                $response['status'] = 1;
                $response['message'] = "Successfully your record is updated.";
                $response['userid'] =  $input->userid;
                $response['name'] =  $input->name;
                $response['username'] =  $input->username;
                $response['email'] =  $input->email;
                $response['companyname'] =  $input->companyname;
                $response['phone'] =  $input->phone;
                $response['country'] =  $input->country;
                return Response::json($response); 
            }else{
                $response['status'] = 0;
                $response['message'] = "Invalid your old password.";
                return Response::json($response);                    
            }
        }   

        public function postpicture(){
			$image_file = Input::file('Picture');
			if($image_file!=null){
		      	$filename='';
		        $OriginalFilename= $image_file->getClientOriginalName();
		            $image=$OriginalFilename ;
		            // rename file if it already exists by prefixing an incrementing number
		            $FileCounter = 1;
		            $filename = pathinfo($OriginalFilename, PATHINFO_FILENAME);
		            $extension =  pathinfo($OriginalFilename, PATHINFO_EXTENSION);
		            while (file_exists( 'carphoto/php/files/middle/'.$image )){
		              $tempname= $filename . '_' . $FileCounter++ ;
		              $image = $tempname . '.' . $extension;
		           	}

		          	$destinationPath = 'carphoto/php/files/middle/';
		          	Input::file('image_file')->move($destinationPath, $image);
		          	$destinationPath1 = 'carphoto/php/files/thumbnail/';
		          	Input::file('image_file')->move($destinationPath1, $image);
		    		$respond['status'] = 1;
		    		$respond['photoname'] = $filename;
		    		return Response::json($respond);
		    }
		    $respond['status'] = 2;
    		return Response::json($respond);

		}

	public function getcarassociation(){
		$response=array();
		$objcountry=City::all();
		$country=array();
		foreach($objcountry as $row){
			$temp['id']=$row->id;
			$temp['name']=$row->name;
			$country[]=$temp;
		}
		$response['country']=$country;

		$objcondition=Condition::all();
		$condition=array();
		foreach($objcondition as $row){
			$temp['id']=$row->id;
			$temp['name']=$row->name;
			$condition[]=$temp;
		}
		$response['condition']=$condition;

		$objbody=Body::all();
		$body=array();
		foreach($objbody as $row){
			$temp['id']=$row->id;
			$temp['name']=$row->name;
			$body[]=$temp;
		}
		$response['bodytype']=$body;

		$drive=array();
		$response['drive']=$drive;

		$fuel=array(array('id'=>1, 'name'=>'CNG'),
					array('id'=>2, 'name'=>'Diesel'),
					array('id'=>3, 'name'=>'Gasoline'),
					array('id'=>4, 'name'=>'Hybrid'),
					array('id'=>5, 'name'=>'Others'),
					);
		$response['fuel']=$fuel;

		$trans=array(array('id'=>1, 'name'=>'Automatic'),
					array('id'=>2, 'name'=>'Manual'),
					array('id'=>3, 'name'=>'Auto-manual'),
					);
		$response['trans']=$trans;

		$objequipment=Ingredient::all();
		$equipment=array();
		foreach($objequipment as $row){
			$temp['id']=$row->id;
			$temp['name']=$row->name;
			$equipment[]=$temp;
		}
		$response['equipment']=$equipment;

		$objcolor=Color::all();
		$color=array();
		foreach($objcolor as $row){
			$temp['id']=$row->id;
			$temp['name']=$row->name;
			$color[]=$temp;
		}
		$response['color']=$color;

		return Response::json($response);
	}

}