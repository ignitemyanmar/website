<?php
class HomeController extends BaseController {

	public function getIndex()
	{
		$slider=Car::orderBy('id', 'desc')->wherestatus('premium')->limit(5)->get();
		$i=0;
		foreach ($slider as $row) {
			$slider[$i]=$row;
			$slider[$i]['make']=Make::whereid($row->makeid)->pluck('make');
			$slider[$i]['model']=Models::whereid($row->modelid)->pluck('model');
			$slider[$i]['body']=Body::whereid($row->bodyid)->pluck('name');
			$i++;
		}
		$latest=Car::orderBy('id', 'desc')->limit(6)->get();
		$i=0;
		foreach ($latest as $row) {
			$latest[$i]=$row;
			$latest[$i]['make']=Make::whereid($row->makeid)->pluck('make');
			$latest[$i]['model']=Models::whereid($row->modelid)->pluck('model');
			$latest[$i]['body']=Body::whereid($row->bodyid)->pluck('name');
			$i++;
		}
		$popular=Car::orderBy('viewcount', 'desc')->limit(6)->get();
		$j=0;
		foreach ($popular as $rows) {
			$popular[$j]=$rows;
			$popular[$j]['make']=Make::whereid($rows->makeid)->pluck('make');
			$popular[$j]['model']=Models::whereid($rows->modelid)->pluck('model');
			$popular[$j]['body']=Body::whereid($row->bodyid)->pluck('name');
			$j++;
		}
		$make=Make::wherestatus(1)->orderBy('make', 'asc')->get();
		$k=0;
		foreach ($make as $rows) {
			$make[$k]=$rows;
			$make[$k]['count']=Car::wheremakeid($rows->id)->count();
			$k++;
		}
		// return Response::json($make);
		$feature=Car::wherestatus('feature')->orderBy('updated_at','DESC')->limit(18)->get();
		$k=0;
		foreach ($feature as $rows) {
			$feature[$k]=$rows;
			$feature[$k]['make']=Make::whereid($rows->makeid)->pluck('make');
			$feature[$k]['model']=Models::whereid($rows->modelid)->pluck('model');
			$feature[$k]['body']=Body::whereid($row->bodyid)->pluck('name');
			$k++;
		}
		$response['slider']=$slider;
		$response['latest']=$latest;
		$response['popular']=$popular;
		$response['make']=$make;
		$response['feature']=$feature;
		$brands=Make::orderBy('make','asc')->get();
		return View::make('home.index', array('response' => $response));
	}

}