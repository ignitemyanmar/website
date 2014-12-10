<?php

class BannerController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$response=Banner::all();
		return View::make('banner.list', array('response'=>$response));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('banner.add');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$category=Input::get('category');
		$image=Input::get('gallery1');
		$title=Input::get('title');
		$title_mm=Input::get('title_mm');
		$title_jp=Input::get('title_jp');
		$category=Input::get('category');
		$check_exiting =Banner::wherecategory($category)->wheretitle($title)->first();
		if($check_exiting){
			$response['status'] =0;
			$response['info'] ="This Record is already exit.";
			return Redirect::to('/banner')->with('message', $response);
		}
		$objbanner= new Banner();
		$objbanner->category=$category;
		$objbanner->image=$image;
		$objbanner->title=$title;
		$objbanner->title_mm=$title_mm;
		$objbanner->title_jp=$title_jp;
		$objbanner->save();
		$response['status']=1;
		$response['info'] ="Successfully insert one record.";
		return Redirect::to('/banner')->with('message', $response);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$response=Banner::find($id);
		return View::make('banner.edit', array('response'=>$response));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$title=Input::get('title');
		$title_mm=Input::get('title_mm');
		$title_jp=Input::get('title_jp');
		$category=Input::get('category');
		$oldimage=Input::get('hdimage');
		$image=Input::get('gallery1');
		if(!$category){
			return Redirect::to('/banner-create');
		}
		$check_exiting =Banner::wherecategory($category)->wheretitle($title)->where('id','!=',$id)->first();
		if($check_exiting){
			$message['status']=1;
			$message['info'] ="This Record is already exit.";
			return Redirect::to('/banner')->with('message', $message);
		}
		$objbanner= Banner::find($id);
		$objbanner->category=$category;
		$objbanner->title=$title;
		$objbanner->title_mm=$title_mm;
		$objbanner->title_jp=$title_jp;
		if($image)
			$objbanner->image=$image;
		else
			$objbanner->image=$oldimage;
		$objbanner->update();
		$message['info']="Successfully update.";
		$message['status']=1;
		return Redirect::to('/banner')->with('message', $message);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Banner::whereid($id)->delete();
		$message['info']="Successfully has been delete one record.";
		$message['status']=1;
		return Redirect::to('banner')->with('message',$message);
	}


}
