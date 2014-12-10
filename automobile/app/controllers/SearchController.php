<?php
class SearchController extends BaseController {

	public function getbrandlistbycategory($category)
	{
		$makeids=Car::wherecategory($category)->groupBy('makeid')->lists('makeid');
		$makes=array();
		if(count($makeids)>0){
			$makes=Make::wherein('id', $makeids)->orderBy('make','asc')->get(array('id','make'));
		}
		return Response::json($makes);
	}

	public function getmodellistbybrand($makeid){
		$models=array();
		$modelids=Car::wheremakeid($makeid)->groupBy('modelid')->lists('modelid');
		if(count($modelids)>0){
			$models=Models::wherein('id', $modelids)->orderBy('model','asc')->get(array('id','model'));
			// $models=Models::wheremakeid($makeid)->orderBy('model','asc')->get(array('id','model'));
		}
		return Response::json($models);
	}

	public function getsearchcars(){
		$type="သင်ၡာေဖွေသာကားများ";
    	$categoryid=null;
    	$category=null;
    	$makeid=null;
    	$modelid=null;
    	$page=Input::get('page');
    	if($page){
    		$category = Input::get('categories') ?  Input::get('categories') : Session::get('category');
			$makeid = Input::get('make') ? Input::get('make') : Session::get('makeid');
			$modelid = Input::get('models') ? Input::get('models') : Session::get('modelid');
    	}else{
    		$category = Input::get('categories') ?  Input::get('categories') : null;
			$makeid = Input::get('make') ? Input::get('make') : null;
			$modelid = Input::get('models') ? Input::get('models') : null;
    	}
		Session::put('category',$category);
		Session::put('makeid',$makeid);
		Session::put('modelid',$modelid);
			$cars=array();
        	if(!is_null($category) && !is_null($makeid) && !is_null($modelid)){
				$cars=Car::wherecategory($category)->wheremakeid($makeid)->wheremodelid($modelid)->paginate(12);
        	}elseif(!is_null($category) && !is_null($makeid) && is_null($modelid)){
				$cars=Car::wherecategory($category)->wheremakeid($makeid)->paginate(12);
        	}elseif(!is_null($category) && is_null($makeid) && is_null($modelid)){
        		$cars=Car::wherecategory($category)->paginate(12);
        	}else{
				$cars=Car::wherecategory($category)->paginate(12);
        	}
        	
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
			// return Response::json($cars);
			return View::make('car.type_buy_car', array('cars' => $cars, 'type'=>$type));

    }
}