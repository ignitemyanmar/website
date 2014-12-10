<?php

class ExecutiveSearchController extends BaseController
{
  	public function getAddExecutiveSearch()
  	{
	    return View::make('executive_search.add');
    }

    public function postAddExecutiveSearch()
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
        $gallery         = Input::get('gallery');

        // dd($edate);

        $checknews = ExecutiveSearch::wherename($name)->first();
        if($checknews)
        {
            $response='This record is already exit';
            // return Response::json($response);
            return Redirect::to('e_searchlist')->with('message',$response);
        }
 
    	$news = new ExecutiveSearch();
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
        if($gallery){
              $news->image    =$gallery[0];
        }
    	$result=$news->save();

        $maxnews_id=ExecutiveSearch::max('id');
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

        $message="success.";
    
    	return Redirect::to('e_searchlist')->with('message',$message);
    }

    public function showExecutiveSearchList()
    {
    	$obj_news = ExecutiveSearch::orderBy('id','desc')->get();
        // return Response::json($obj_news);
    	$response = $obj_news;
    	$totalCount = ExecutiveSearch::count();

    	return View::make('executive_search.list',array('response'=>$response,'totalCount'=>$totalCount));
    }

    public function getEditExecutiveSearch($id)
    {
        $objnews = ExecutiveSearch::with(array('news_event_images'))->find($id);
    	
        return View::make('executive_search.edit', array('response'=> $objnews));
        // return View::make('consultancy.edit')->with('consultancy',Consultancy::find($id));
    }

    public function postEditExecutiveSearch($id)
    {
        $name            = Input::get('name');
        $name_mm         = Input::get('name_mm');
        $name_jp         = Input::get('name_jp');
        $description     = Input::get('description');
        $description_mm  = Input::get('description_mm');
        $description_jp  = Input::get('description_jp');
        $gallery         = Input::get('gallery');
        $sdate           = Input::get('sdate');
        $sdate           = date("Y-m-d", strtotime($sdate ) );
        $edate           = Input::get('edate');
        $edate           = date("Y-m-d", strtotime($edate ) );
        $stime           = Input::get('stime');
        $etime           = Input::get('etime');
        $venue           = Input::get('venue');
        
        $checksamewithother  = ExecutiveSearch::where('id','!=',$id)->wherename($name)->first();
        if($checksamewithother)
        {
            $response ='This record is already exit';
            return Redirect::to('e_searchlist')->with('message',$response);
        }

        $toupdate      = ExecutiveSearch::whereid($id)->find($id);
        if($toupdate)
        {
            $affectedRows1 = ExecutiveSearch::where('id','=',$id)->update(array('name'=>$name,
                                                                                'name_mm'=>$name_mm,
                                                                                'name_jp'=>$name_jp,
                                                                                'description'=>$description,
                                                                                'description_jp'=>$description_jp,
                                                                                'description_mm'=>$description_mm,
                                                                                'image'=>$gallery[0],
                                                                                'start_date'=>$sdate,
                                                                                'end_date'=>$edate,
                                                                                'start_time'=>$stime,
                                                                                'end_time'=>$etime,
                                                                                'venue'=>$venue));
        }

        $maxid=$id;
        if($gallery){
            $l=0;
            $images=NewsImages::wherenews_event_id($id)->lists('image');
            NewsImages::wherenews_event_id($id)->delete();
            if($images){
                foreach ($images as $image) {
                    @unlink('/news_photo/php/files/'.$image);
                }
            }
            foreach ($gallery as $galleryimg) {
                if($l>0){
                    $objnewsimages=new NewsImages();
                    $objnewsimages->news_event_id=$maxid;
                    $objnewsimages->image=$galleryimg;
                    $objnewsimages->save();
                }
                $l++;
            }
        }
            $message = "success.";
        return Redirect::to('e_searchlist')->with('message',$message);    
    }

    public function getDeleteExecutiveSearch($id)
    {
    	$affectedRows1 = ExecutiveSearch::where('id','=',$id)->delete();
        $affectedRows = NewsImages::where('news_event_id','=',$id)->delete();
        $response="Successfully delete one record.";
        return Redirect::to('e_searchlist')->with('message',$response);
    }

}