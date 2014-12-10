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

	public function getenginepower(){
		$objengines=array();
		$objengines=EnginePower::all();

		return Response::json($objengines);
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
					 array('id'=>2, 'name'=>'CNG'),
					 array('id'=>3, 'name'=>'Octane'),
					 array('id'=>4, 'name'=>'Others'),
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
				$temp['image']='newsphoto/php/files/'.$row->image;
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
				$temp['image']='newsphoto/php/files/'.$row->image;
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
				$temp['image']='carphoto/php/files/'.str_replace(' ', '%20', $row->image);
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
    	$userid=Input::get('userid');
    	$limit = Input::query('limit') ? Input::query('limit') : 8;
		$offset = Input::query('offset') ? Input::query('offset') : 1;
		$offset = ($offset-1) * $limit;
		$car=Car::whereid($id)->with(array('model','make','body','condition','color','ingredients','city','images','enginepowers','dealer','user'))->take($limit)->skip($offset)->get();
		$response=array();
		if($car){
			foreach ($car as $row) {
				$temp['id']=$row->id;
				$temp['userid']=$row->dealerid;
				$temp['category']=$row->category;

				switch ($row->category) {
					case 'ျမန္မာျပည္တြင္ေရာက္ရွိေနေသာ ကားမ်ား':
						$temp['catid']=1;
						break;
					case 'ဆိပ္ကမ္းေရာက္ တန္ဖုိးျဖင့္ေရာင္းမည့္ကားမ်ား':
						$temp['catid']=2;
						break;
					case 'စလစ္မ်ား':
						$temp['catid']=3;
						break;
					case 'အပ္ႏွံရမည့္ ယဥ္အုိယဥ္ေဟာင္းမ်ား':
						$temp['catid']=4;
						break;
					default:
						$temp['catid']=1;
						break;
				}
				$temp['makeid']=$row->makeid;
				if(isset($row->make))
				$temp['make']=$row->make->make !=null ? $row->make->make : '-';
				$temp['modelid']=$row->modelid;
				$temp['model']='-';
				if(isset($row->model))
				$temp['model']=$row->model->model;
				$temp['conditionid']=$row->conditionid;
				$temp['condition']='-';
				if(isset($row->condition))
				$temp['condition']=$row->condition->name;
				$temp['bodyid']=$row->bodyid;
				$temp['bodytype']='';
				if(isset($row->body))
				$temp['bodytype']=$row->body->name;
				$temp['colorid']=$row->colorid;
				$temp['color']='';
				if(isset($row->color))
				$temp['color']=$row->color->name;
				$temp['seater']=$row->seater;
				$temp['seatrow']=$row->seatrow;
				$temp['year']=$row->year;
				$temp['price']=$row->price;
				$temp['slip']=$row->slip;
				$temp['negotiate']=$row->negotiate;
				$temp['mileage']=$row->mileage;
				$temp['fuel']=$row->fuel;
				switch ($row->fuel) {
					case 'CNG':
						$temp['fuelid']=1;
						break;
					case 'Diesel':
						$temp['fuelid']=2;
						break;
					case 'Octane':
						$temp['fuelid']=3;
						break;
					default:
						$temp['fuelid']=1;
						break;
				}
				$temp['transmission']=$row->transmission;
				$temp['handdrive']=$row->handdrive;
				$images='';
				if($row->image)
					$images='carphoto/php/files/'.str_replace(' ','%20', $row->image);
				$temp['image']=$images;
				$image_list=array();
				if(count($row->images)>0){
					foreach ($row->images as $image) {
						$image_list[]='carphoto/php/files/'.str_replace(' ','%20', $image->image);
					}
				}
				$temp['image_list']=$image_list;
				$equipments=array();
				if($row->ingredients){
					foreach ($row->ingredients as $arr_ingredient) {
						$tmp['id']=$arr_ingredient->ingredientid;
						$tmp['name']=Ingredient::whereid($arr_ingredient->ingredientid)->pluck('name');
						$equipments[]=$tmp;
					}

				}
				$temp['equipments']=$equipments;
				$temp['cityid']=$row->cityid;
				$temp['city'] =$row->city->name;
				$temp['country']=$row->country;
				$temp['licenseno']=$row->licenseno;
				$temp['carno']=$row->carno;
				$temp['ownerbook']=$row->ownerbook;
				$temp['enginepower_id']=$row->enginepower_id;
				$temp['enginepower']='';
				if(count($row->enginepowers)>0)
				$temp['enginepower']=$row->enginepowers->name;
				$temp['description']=$row->description;
				$temp['status']=$row->status;
				$temp['viewcount']=$row->viewcount;
				$temp['created_at']=date($row->created_at);
				$temp['status']=$row->status;
				$temp['updated_at']=date($row->updated_at);
				
				$dealer['username']="";
				$dealer['email']="";
				$dealer['id']="";
				$dealer['dealername']="";
				$dealer['companyname']="";
				$dealer['phone']="";
				$dealer['address']="";
				$dealer['city']="";
				$dealer['country']="";
				$dealer['website']="";
				$dealer['zipcode']="";
				if(count($row->user)){
					$dealer['username']=$row->user->name;
					$dealer['email']=$row->user->email;
				}
				if(count($row->dealer)){
					$dealer['id']=$row->dealer->id;
					$dealer['dealername']=$row->dealer->name;
					$dealer['companyname']=$row->dealer->companyname;
					$dealer['phone']=$row->dealer->phone;
					$dealer['address']=$row->dealer->address;
					$dealer['city']=$row->dealer->city;
					$dealer['country']=$row->dealer->country;
					$dealer['website']=$row->dealer->website;
					$dealer['zipcode']=$row->dealer->zipcode;
				}
				$temp['seller']=$dealer;

				$response=$temp;
				
			}
		}
		return Response::json($response);
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
				$temp['image']='carphoto/php/files/'.str_replace(' ','%20', $row->image);
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
		$response['status']=1;
		$response['message']="Successfully delete";
		return Response::json($response);
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
				$cars=Car::wherecategory($category)
						->wheremakeid($makeid)->wheremodelid($modelid)
						->with(array('model','make','body','condition','color','ingredients','city','images'))
						->take($limit)->skip($offset)->get();
        	}elseif(!is_null($category) && !is_null($makeid) && is_null($modelid)){
				$cars=Car::wherecategory($category)
						->wheremakeid($makeid)
						->with(array('model','make','body','condition','color','ingredients','city','images'))
						->take($limit)->skip($offset)->get();
        	}elseif(!is_null($category) && is_null($makeid) && is_null($modelid)){
        		$cars=Car::wherecategory($category)
							->with(array('model','make','body','condition','color','ingredients','city','images'))
        					->take($limit)
        					->skip($offset)->get();
        	}else{
				$cars=Car::wheremakeid($makeid)
					->wheremodelid($modelid)
					->with(array('model','make','body','condition','color','ingredients','city','images'))
					->take($limit)->skip($offset)->get();
        	}
        	$response=array();
			if($cars){
				foreach ($cars as $row) {
					$temp['id']=$row->id;
					$temp['userid']=$row->dealerid;
					$temp['category']=$row->category;

					switch ($row->category) {
						case 'ျမန္မာျပည္တြင္ေရာက္ရွိေနေသာ ကားမ်ား':
							$temp['catid']=1;
							break;
						case 'ဆိပ္ကမ္းေရာက္ တန္ဖုိးျဖင့္ေရာင္းမည့္ကားမ်ား':
							$temp['catid']=2;
							break;
						case 'စလစ္မ်ား':
							$temp['catid']=3;
							break;
						case 'အပ္ႏွံရမည့္ ယဥ္အုိယဥ္ေဟာင္းမ်ား':
							$temp['catid']=4;
							break;
						default:
							$temp['catid']=1;
							break;
					}
					$temp['makeid']=$row->makeid;
					if(isset($row->make))
					$temp['make']=$row->make->make !=null ? $row->make->make : '-';
					$temp['modelid']=$row->modelid;
					$temp['model']='-';
					if(isset($row->model))
					$temp['model']=$row->model->model;
					$temp['conditionid']=$row->conditionid;
					$temp['condition']='-';
					if(isset($row->condition))
					$temp['condition']=$row->condition->name;
					$temp['bodyid']=$row->bodyid;
					$temp['bodytype']='';
					if(isset($row->body))
					$temp['bodytype']=$row->body->name;
					$temp['colorid']=$row->colorid;
					$temp['color']='';
					if(isset($row->color))
					$temp['color']=$row->color->name;
					$temp['seater']=$row->seater;
					$temp['seatrow']=$row->seatrow;
					$temp['year']=$row->year;
					$temp['price']=$row->price;
					$temp['slip']=$row->slip;
					$temp['negotiate']=$row->negotiate;
					$temp['mileage']=$row->mileage;
					$temp['fuel']=$row->fuel;
					switch ($row->fuel) {
						case 'CNG':
							$temp['fuelid']=1;
							break;
						case 'Diesel':
							$temp['fuelid']=2;
							break;
						case 'Octane':
							$temp['fuelid']=3;
							break;
						default:
							$temp['fuelid']=1;
							break;
					}
					$temp['transmission']=$row->transmission;
					$temp['handdrive']=$row->handdrive;
					$images='';
					if($row->image)
						$images='carphoto/php/files/'.str_replace(' ', '%20', $row->image);
					$temp['image']=$images;
					$image_list=array();
					if(count($row->images)>0){
						foreach ($row->images as $image) {
							$image_list[]='carphoto/php/files/'.str_replace(' ', '%20', $image->image);
						}
					}
					$temp['image_list']=$image_list;
					$equipments=array();
					if($row->ingredients){
						foreach ($row->ingredients as $arr_ingredient) {
							$tmp['id']=$arr_ingredient->ingredientid;
							$tmp['name']=Ingredient::whereid($arr_ingredient->ingredientid)->pluck('name');
							$equipments[]=$tmp;
						}

					}
					$temp['equipments']=$equipments;
					$temp['cityid']=$row->cityid;
					$temp['city'] =$row->city->name;
					$temp['country']=$row->country;
					$temp['licenseno']=$row->licenseno;
					$temp['carno']=$row->carno;
					$temp['ownerbook']=$row->ownerbook;
					$temp['enginepower']=$row->enginepower;
					$temp['description']=$row->description;
					$temp['status']=$row->status;
					$temp['viewcount']=$row->viewcount;
					$temp['created_at']=date($row->created_at);
					$temp['status']=$row->status;
					$temp['updated_at']=date($row->updated_at);
					/*
					$dealer['id']=$row->dealer->id;
					$dealer['dealername']=$row->dealer->name;
					$dealer['username']=$row->user->name;
					$dealer['email']=$row->user->email;
					$dealer['companyname']=$row->dealer->companyname;
					$dealer['phone']=$row->dealer->phone;
					$dealer['address']=$row->dealer->address;
					$dealer['city']=$row->dealer->city;
					$dealer['country']=$row->dealer->country;
					$dealer['website']=$row->dealer->website;
					$dealer['zipcode']=$row->dealer->zipcode;
					$temp['dealer']=$dealer;*/

					$response[]=$temp;
				}
			}
			return Response::json($response);
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
    			$category='အပ္ႏွံရမည့္ ယာဥ္အုိယာဥ္ေဟာင္းမ်ား';
    			break;
    		default:
    			$category='ျမန္မာျပည္တြင္ေရာက္ရွိေနေသာ ကားမ်ား';
    			break;
    	}
    	$fuelid=Input::get('fuel');
    	switch ($fuelid) {
    		case '1':
    			$fuel='CNG';
    			break;
    		case '2':
    			$fuel='Diesel';
    			break;
    		case '3':
    			$fuel='Octane';
    			break;
    		case '4':
    			$fuel='Others';
    			break;
    		default:
    			$fuel='Others';
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
    			$transmission='Others';
    			break;
    		default:
    			$transmission='Others';
    			break;
    	}
    	$input=Input::all();
    	
    	$keys=array('catid', 'make','model','country','condition','user','bodytype','fuel', 'trans','price','engine','attachfile','ownerbook','year');
    	$require='Required parameter are ';
    	$flag_require=0;
    	for($i=0; $i<count($keys); $i++){
    		$parameter=Input::get($keys[$i]);
    		if(!$parameter){
    			$require .=' '.$keys[$i] .",";
    			$flag_require +=1;
    		}
    	}
    	$require= substr($require, 0, -1);
    	$require .='.';
    	if($flag_require > 0)
    		return Response::json($require);

    	if($categoryid){
	    	$objcar=new Car();
	    	$objcar->category=$category;
	    	$objcar->price=$input['price'];
	    	$objcar->slip 		=Input::get('slip') ? Input::get('slip') : 0;
	    	$objcar->negotiate  =Input::get('negotiate') ? Input::get('negotiate') : 0;
	    	$objcar->licenseno	=$input['licenseno'];
	    	$objcar->ownerbook=$input['ownerbook'];
	    	$objcar->dealerid	=$input['user'];
	    	$objcar->carno=$input['carno'];
	    	$objcar->makeid=$input['make'];
	    	$objcar->modelid=$input['model'];
	    	$objcar->bodyid=$input['bodytype'];
	    	$objcar->year=$input['year'];
	    	$objcar->transmission=$transmission;
	    	$objcar->handdrive=$input['handdrive'];
	    	$objcar->enginepower_id=$input['engine'];
	    	$objcar->fuel=$fuel;
	    	$objcar->mileage=Input::get('mileage') ? Input::get('mileage') : 0;
	    	$objcar->conditionid=$input['condition'];
	    	$objcar->colorid=$input['color'];
	    	$objcar->seater=Input::get('seater') ? Input::get('seater') : 0;
	    	$objcar->seatrow=Input::get('seatrow') ? Input::get('seatrow') : 0;
	    	$objcar->image=Input::get('attachfile') ? Input::get('attachfile') : null;
	    	$objcar->cityid=$input['city'];
	    	$objcar->country=$input['country'];
	    	$objcar->description=Input::get('description') ? Input::get('description') : null;


	    	$checkcar=Car::wherecarno($input['carno'])->wheremakeid($input['make'])->wheremodelid($input['model'])
	    					->wherebodyid($input['bodytype'])
	    					->wheredealerid($input['user'])->get();
	    	if(count($checkcar)>0){
	    		$response['status']=0;
    			$response['message']="Already exit.";
	    		return Response::json($response);
	    	}
	    	$objcar->save();
	    	
	    	$equipments=Input::get('eqiupments');
	    	$equipments= explode(',', $equipments);
		    $count=count($equipments);
		    for($i=0;$i<$count;$i++){
		        if($equipments[$i]==null){}
		        else{ 
		          $caringredients=new CarIngredient();
		          $caringredients->carid=$objcar->id;
		          $caringredients->ingredientid=$equipments[$i];
		          $caringredients->save();
		        }
		    }
	    	$response['status']=1;
	    	$response['message']="Successfully save one record.";
	    	return Response::json($response);
    	}else{
    		$response['status']=0;
	    	$response['message']="Can'nt upload car.";
	    	return Response::json($response);
    	}
    	
    }

    public function postUpdateCar($id){
		$category=Input::get('catid');
		$price=Input::get('price');
		$slip=Input::get('slip');
		$negotiate=Input::get('negotiate');
		$licenseno=Input::get('licenseno');
		$ownerbook=Input::get('ownerbook');
		$carno=Input::get('carno');
		$makeid=Input::get('make');
		$modelid=Input::get('model');
		$bodyid=Input::get('bodytype');
		$transmission=Input::get('trans');
		$handdrive=Input::get('handdrive');
		$enginepower=Input::get('engine');
		$fuel=Input::get('fuel');
		$mileage=Input::get('mileage');
		$conditionid=Input::get('condition');
		$colorid=Input::get('color');
		$seater=Input::get('seater');
		$seatrow=Input::get('seatrow');
		$year=Input::get('year');
		$cityid=Input::get('city');
		$description=Input::get('description');
		$country=Input::get('country');
		$ingredient=Input::get('equipments');
		$image=Input::get('attachfile');
		$status=Input::get('status');

		$fuelid=Input::get('fuel');
    	switch ($fuelid) {
    		case '1':
    			$fuel='CNG';
    			break;
    		case '2':
    			$fuel='Diesel';
    			break;
    		case '3':
    			$fuel='Octane';
    			break;
    		case '4':
    			$fuel='Others';
    			break;
    		default:
    			$fuel='Others';
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
    			$transmission='Others';
    			break;
    		default:
    			$transmission='Others';
    			break;
    	}

		$objcar=Car::find($id);
		$objcar->category=$category;
		$objcar->price=$price;
		$objcar->slip=$slip;
		$objcar->negotiate=$negotiate;
		$objcar->licenseno=$licenseno;
		$objcar->ownerbook=$ownerbook;
		$objcar->carno=$carno;
		$objcar->makeid=$makeid;
		$objcar->modelid=$modelid;
		$objcar->bodyid=$bodyid;
		$objcar->year=$year;
		$objcar->transmission=$transmission;
		$objcar->handdrive=$handdrive;
		$objcar->enginepower_id=$enginepower;
		$objcar->fuel=$fuel;
		$objcar->mileage=$mileage;
		$objcar->conditionid=$conditionid;
		$objcar->colorid=$colorid;
		$objcar->seater=$seater;
		$objcar->seatrow=$seatrow;
		$objcar->handdrive=$handdrive;
		$objcar->image=$image;
		$objcar->cityid=$cityid;
		$objcar->country=$country;
		$objcar->description=$description;
		$objcar->status="sell";
		$objcar->publish=Input::get('publish');

		$updatecar=$objcar->save();
	    CarIngredient::wherecarid($id)->delete();
	    $equipments=Input::get('eqiupments');
	    	$equipments= explode(',', $equipments);
		    $count=count($equipments);
		    for($i=0;$i<$count;$i++){
		        if($equipments[$i]==null){}
		        else{ 
		          $caringredients=new CarIngredient();
		          $caringredients->carid=$id;
		          $caringredients->ingredientid=$equipments[$i];
		          $caringredients->save();
		        }
		    }

	    if($updatecar){
	   		$response['status']=1;
	   		$response['message']='Successfully save one record.';
	    	return Response::json($response); 	
	    }else{
	    	$response['status']=0;
	    	$response['message']="Can't update.";
	    	return Response::json($response); 
	    }
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
		$car=Car::wheredealerid($userid)->with(array('model','make','body','condition','color','ingredients','city','images','dealer','user'))->take($limit)->skip($offset)->get();
		$response=array();
		if($car){
			foreach ($car as $row) {
				$temp['id']=$row->id;
				$temp['userid']=$row->dealerid;
				$temp['category']=$row->category;

				switch ($row->category) {
					case 'ျမန္မာျပည္တြင္ေရာက္ရွိေနေသာ ကားမ်ား':
						$temp['catid']=1;
						break;
					case 'ဆိပ္ကမ္းေရာက္ တန္ဖုိးျဖင့္ေရာင္းမည့္ကားမ်ား':
						$temp['catid']=2;
						break;
					case 'စလစ္မ်ား':
						$temp['catid']=3;
						break;
					case 'အပ္ႏွံရမည့္ ယဥ္အုိယဥ္ေဟာင္းမ်ား':
						$temp['catid']=4;
						break;
					default:
						$temp['catid']=1;
						break;
				}
				$temp['makeid']=$row->makeid;
				if(isset($row->make))
				$temp['make']=$row->make->make !=null ? $row->make->make : '-';
				$temp['modelid']=$row->modelid;
				$temp['model']='-';
				if(isset($row->model))
				$temp['model']=$row->model->model;
				$temp['conditionid']=$row->conditionid;
				$temp['condition']='-';
				if(isset($row->condition))
				$temp['condition']=$row->condition->name;
				$temp['bodyid']=$row->bodyid;
				$temp['bodytype']='';
				if(isset($row->body))
				$temp['bodytype']=$row->body->name;
				$temp['colorid']=$row->colorid;
				$temp['color']='';
				if(isset($row->color))
				$temp['color']=$row->color->name;
				$temp['seater']=$row->seater;
				$temp['seatrow']=$row->seatrow;
				$temp['year']=$row->year;
				$temp['price']=$row->price;
				$temp['slip']=$row->slip;
				$temp['negotiate']=$row->negotiate;
				$temp['mileage']=$row->mileage;
				$temp['fuel']=$row->fuel;
				switch ($row->fuel) {
					case 'CNG':
						$temp['fuelid']=1;
						break;
					case 'Diesel':
						$temp['fuelid']=2;
						break;
					case 'Octane':
						$temp['fuelid']=3;
						break;
					default:
						$temp['fuelid']=1;
						break;
				}
				$temp['transmission']=$row->transmission;
				$temp['handdrive']=$row->handdrive;
				$images='';
				if($row->image)
					$images='carphoto/php/files/'. str_replace(' ', '%20', $row->image);
				$temp['image']=$images;
				$image_list=array();
				if(count($row->images)>0){
					foreach ($row->images as $image) {
						$image_list[]='carphoto/php/files/'. str_replace(' ', '%20', $image->image);
					}
				}
				$temp['image_list']=$image_list;
				$equipments=array();
				if($row->ingredients){
					foreach ($row->ingredients as $arr_ingredient) {
						$tmp['id']=$arr_ingredient->ingredientid;
						$tmp['name']=Ingredient::whereid($arr_ingredient->ingredientid)->pluck('name');
						$equipments[]=$tmp;
					}

				}
				$temp['equipments']=$equipments;
				$temp['cityid']=$row->cityid;
				$temp['city'] ='-';
				if($row->city)
				$temp['city'] =$row->city->name;
				$temp['country']=$row->country;
				$temp['licenseno']=$row->licenseno;
				$temp['carno']=$row->carno;
				$temp['ownerbook']=$row->ownerbook;
				$temp['enginepower']=$row->enginepower;
				$temp['description']=$row->description;
				$temp['status']=$row->status;
				$temp['viewcount']=$row->viewcount;
				$temp['created_at']=date($row->created_at);
				$temp['status']=$row->status;
				$temp['updated_at']=date($row->updated_at);
				/*
				$dealer['id']=$row->dealer->id;
				$dealer['dealername']=$row->dealer->name;
				$dealer['username']=$row->user->name;
				$dealer['email']=$row->user->email;
				$dealer['companyname']=$row->dealer->companyname;
				$dealer['phone']=$row->dealer->phone;
				$dealer['address']=$row->dealer->address;
				$dealer['city']=$row->dealer->city;
				$dealer['country']=$row->dealer->country;
				$dealer['website']=$row->dealer->website;
				$dealer['zipcode']=$row->dealer->zipcode;
				$temp['dealer']=$dealer;*/

				$response[]=$temp;
				
			}
		}
		return Response::json($response);
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
						$fuelid=5;
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
	    		$carinfo['model_id']=$row->modelid;
	    		$carinfo['model']=Models::whereid($row->modelid)->pluck('model');
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
	    		$carinfo['category']=$row->category;
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
	    		$carinfo['fuel_id']=$fuelid;
	    		$carinfo['fuel']=$row->fuel;
	    		$carinfo['bodytype_id']=$row->bodyid;
	    		$carinfo['bodytype']=Body::whereid($row->bodyid)->pluck('name');
	    		$carinfo['make_id']=$row->makeid;
	    		$carinfo['make']=Make::whereid($row->makeid)->pluck('make');
	    		$carinfo['condition_id']=$row->conditionid;
	    		$carinfo['condition']=Condition::whereid($row->conditionid)->pluck('name');
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
	    		$carinfo['model_id']=$row->modelid;
	    		$carinfo['model']=Models::whereid($row->modelid)->pluck('model');
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
	    		$carinfo['category']=$row->category;
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
	    		$carinfo['fuel_id']=$fuelid;
	    		$carinfo['fuel']=$row->fuel;
	    		$carinfo['bodytype_id']=$row->bodyid;
	    		$carinfo['bodytype']=Body::whereid($row->bodyid)->pluck('name');
	    		$carinfo['make_id']=$row->makeid;
	    		$carinfo['make']=Make::whereid($row->makeid)->pluck('make');
	    		$carinfo['condition_id']=$row->conditionid;
	    		$carinfo['condition']=Condition::whereid($row->conditionid)->pluck('name');
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
					$temp['imgmain']='carphoto/php/files/'.str_replace(' ', '%20', $row->image);
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
			$Picture = Input::file('Picture');
			if($Picture!=null){
		      	$filename='';
		        $OriginalFilename= $Picture->getClientOriginalName();
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
		          	Input::file('Picture')->move($destinationPath, $image);
		    		$respond['status'] = 1;
		    		$respond['photoname'] = str_replace(' ', '%20', $image);
		    		return Response::json($respond);
		    }
		    $respond['status'] = 0;
		    $respond['message'] = "Picture field must be file field.";
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
					array('id'=>3, 'name'=>'Octane'),
					array('id'=>4, 'name'=>'Others'),
					);
		$response['fuel']=$fuel;

		$trans=array(array('id'=>1, 'name'=>'Automatic'),
					array('id'=>2, 'name'=>'Manual'),
					array('id'=>3, 'name'=>'Auto-manual'),
					array('id'=>4, 'name'=>'Others'),
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