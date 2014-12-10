<?php

class NewsEventsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$obj_news = NewsEvents::orderBy('id','desc')->get();
    	$response = $obj_news;
    	return View::make('news_events.list',array('response'=>$response));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('news_events.add');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$name            = Input::get('name');
        $name_mm         = Input::get('name_mm');
    	$name_jp         = Input::get('name_jp');
        $description     = Input::get('description');
        $description_mm  = Input::get('description_mm');
        $description_jp  = Input::get('description_jp');
        $sdate           = Input::get('sdate');
        $sdate           = date("Y-m-d", strtotime($sdate ) );
        $edate           = Input::get('edate');
        $edate           = date("Y-m-d", strtotime($edate ) );
        $stime           = Input::get('stime');
        $etime           = Input::get('etime');
        $venue           = Input::get('venue');
        $venue_mm        = Input::get('venue_mm');
        $venue_jp        = Input::get('venue_jp');
        $gallery         = Input::get('gallery');

        // dd($edate);

        $checknews = NewsEvents::wherename($name)->first();
        if($checknews)
        {
            $response='This record is already exit';
            // return Response::json($response);
            return Redirect::to('news_events')->with('message',$response);
        }
 
    	$news = new NewsEvents();
        $news->name           = $name;
        $news->name_mm        = $name_mm;
        $news->name_jp        = $name_jp;
        $news->description    = $description;
        $news->description_mm = $description_mm;
        $news->description_jp = $description_jp;
        $news->start_date     = $sdate;
        $news->end_date       = $edate;
        $news->start_time     = $stime;
    	$news->end_time       = $etime;
        $news->venue          = $venue;
        $news->venue_mm       = $venue_mm;
        $news->venue_jp       = $venue_jp;
        if($gallery){
              $news->image    =$gallery[0];
        }
    	$result=$news->save();

        $maxnews_id=NewsEvents::max('id');
        if($gallery){
            $i=0;
            foreach ($gallery as $galleryimg) {
                if($i>0){
                    $newsimages=new NewsImages();
                    $newsimages->news_event_id=$maxnews_id;
                    $newsimages->image=$galleryimg;
                    $newsimages->save();
                }
                $i++;
            }
        }

        $message="Successfully save one record.";
    	return Redirect::to('news_events')->with('message',$message);
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
		$response=NewsEvents::with(array('news_event_images'))->find($id);
		// return Response::json($response);
		return View::make('news_events.edit', array('response'=>$response));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$name            = Input::get('name');
        $name_mm         = Input::get('name_mm');
    	$name_jp         = Input::get('name_jp');
        $description     = Input::get('description');
        $description_mm  = Input::get('description_mm');
        $description_jp  = Input::get('description_jp');
        $sdate           = Input::get('sdate');
        $sdate           = date("Y-m-d", strtotime($sdate ) );
        $edate           = Input::get('edate');
        $edate           = date("Y-m-d", strtotime($edate ) );
        $stime           = Input::get('stime');
        $etime           = Input::get('etime');
        $venue           = Input::get('venue');
        $venue_mm        = Input::get('venue_mm');
        $venue_jp        = Input::get('venue_jp');
        $gallery         = Input::get('gallery');

        // dd($edate);

        $checknews = NewsEvents::wherename($name)->where('id','!=',$id)->first();
        if($checknews)
        {
            $response='This record is already exit';
            return Redirect::to('news_events')->with('message',$response);
        }
 
    	$news = NewsEvents::find($id);
        $news->name           = $name;
        $news->name_mm        = $name_mm;
        $news->name_jp        = $name_jp;
        $news->description    = $description;
        $news->description_mm = $description_mm;
        $news->description_jp = $description_jp;
        $news->start_date     = $sdate;
        $news->end_date       = $edate;
        $news->start_time     = $stime;
    	$news->end_time       = $etime;
        $news->venue          = $venue;
        $news->venue_mm       = $venue_mm;
        $news->venue_jp       = $venue_jp;
        if($gallery){
              $news->image    =$gallery[0];
        }
    	$result=$news->update();

    	NewsImages::wherenews_event_id($id)->delete();
        if($gallery){
            $i=0;
            foreach ($gallery as $galleryimg) {
                if($i>0){
                    $newsimages=new NewsImages();
                    $newsimages->news_event_id=$id;
                    $newsimages->image=$galleryimg;
                    $newsimages->save();
                }
                $i++;
            }
        }

        $message="Successfully save one record.";
    	return Redirect::to('news_events')->with('message',$message);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		NewsEvents::whereid($id)->delete();
		$message="Successfully has been delete one record.";
		return Redirect::to('news_events')->with('message',$message);
	}


}
