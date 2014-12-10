<?php

class SeminarImagesController extends BaseController
{
  	public function getAddSeminarImages()
  	{
        $seminar =Seminar::all();
	    return View::make('seminar_images.add',array('response'=>$seminar));
    }

    public function postAddSeminarImages()
    {
        $seminarid    = Input::get('seminar');
        $gallery      = Input::get('gallery');
        
        $checkexist   = SeminarImages::whereseminar_id($seminarid)->whereimages($gallery[0])->first();
        if($checkexist)
        {
            $response='This record is already exit';
            // return Response::json($response);
            return Redirect::to('seminarimagelist')->with('message',$response);
        }

    	$seminar_img = new SeminarImages();
        $seminar_img->seminar_id  = $seminarid;
        if($gallery){
              $seminar_img->images  = $gallery[0];
        }
    	$result=$seminar_img->save();

        $message="success.";
    
    	return Redirect::to('seminarimagelist')->with('message',$message);
    }

    public function showSeminarImagesList()
    {
        $response = $objseminar_img = SeminarImages::get();
        $allseminar_img = SeminarImages::all();
        $totalCount = count($allseminar_img);
        $i=0;
        foreach($response as $seminar_img)
        {
            $seminarname = Seminar::where('id','=',$seminar_img['seminar_id'])->pluck('name');

            $response[$i]['id']          = $seminar_img['id'];
            $response[$i]['seminar_id']  = $seminarname;
            $response[$i]['images']      = $seminar_img['images'];
            $i++;
        }

        return View::make('seminar_images.list',array('response'=>$response,'totalCount'=>$totalCount,'objseminar_img'=>$objseminar_img));

    	// return View::make('aboutus_images.list',array('response'=>$response,'totalCount'=>$totalCount));
    }

    public function getEditSeminarImages($id)
    {
    	// return View::make('aboutus_images.edit')->with('aboutus',AboutUs::find($id));
         $objseminar_img = SeminarImages::find($id);
           if(count($objseminar_img) == 0)
           {
            return Redirect::to('seminarimagelist');
           }
           $seminar_img['id'] = $id;
           $seminar_img['seminar_id'] = $objseminar_img->seminar_id;
           $seminar_img['images'] = $objseminar_img->images;

           $seminar = Seminar::all();

           $response['seminar_img'] = $seminar_img;
           $response['seminar']    = $seminar;

           // return Response::json($seminar_img);

        return View::make('seminar_images.edit',array('response'=>$response));
    }

    public function postEditSeminarImages($id)
    {
        $seminarid    = Input::get('seminar');
        $gallery      = Input::get('gallery');
        
        $checkconsultancy  = Consultancy::where('id','!=',$id)->wherename($name)->wheredescription($description)->first();
        if($checkconsultancy)
        {
            $response ='This record is already exit';
            return Redirect::to('consultancylist')->with('message',$response);
        }
        if($checkexist)
        {
            $affectedRows1 = SeminarImages::where('id','=',$id)->update(array('seminar_id'=>$seminarid,
                                                                              'images'=>$gallery[0]));
                
            return Redirect::to('seminarimagelist');
        }


        $checkseminarimg  = SeminarImages::whereseminar_id($seminarid)->whereimages($gallery)->first();
        if($checkseminarimg)
        {
            $response ='This record is already exit';
            return Redirect::to('seminarimagelist')->with('message',$response);
            // return Response::json($response);
        }
        $affectedRows = SeminarImages::where('id','=',$id)->update(array('seminar_id'=>$seminarid,
                                                                            'images'=>$gallery[0]));
                                                                        
        // $message = "success."
       
        return Redirect::to('seminarimagelist');
    }

    public function getDeleteSeminarImages($id)
    {
    	$affectedRows1 = SeminarImages::where('id','=',$id)->delete();
        $response="Successfully delete one record.";
        return Redirect::to('seminarimagelist')->with('message',$response);
    }

    public function postDeleteSeminarImages($id)
    {
    	
    	$totaldeleterecords = Input::get('recordstoDelete');
    	if(count($totaldeleterecords)==0)
    	{
    		return Redirect::to("/seminarimagelist");
    	}
    	foreach($totaldeleterecords as $recid)
    	{
    		$result = SeminarImages::where('id','=',$recid)->delete();
    	}
    	return Redirect::to('seminarimagelist');
    }

    public function postSearchSeminarImages()
    {
		$keyword  = Input::get('keyword');
		$seminarid = Seminar::where('name','LIKE','%'.$keyword.'%')->pluck('id');
		$response = $seminarimg = SeminarImages::where('seminar_id','LIKE','%'.$seminarid.'%')
                                ->orderBy('id','DESC')->paginate(10);
        $allseminarimg = SeminarImages::all();
		$totalCount = count($allseminarimg);
		return View::make('seminar_images.list')->with('seminarimg',$seminarimg)->with('totalCount',$totalCount)->with('response',$response);
    }
}