<?php

class AboutUsImageController extends BaseController
{
  	public function getAddAboutUsImage()
  	{
        $aboutus =AboutUs::all();
	    return View::make('aboutus_images.add',array('response'=>$aboutus));
    }

    public function postAddAboutUsImage()
    {
        $aboutusid    = Input::get('aboutus');
        $gallery      = Input::get('gallery');
        // dd($gallery);
        $checkexist   = AboutUsImg::whereabout_us_id($aboutusid)->whereimage($gallery[0])->first();
        if($checkexist)
        {
            $response='This record is already exit';
            // return Response::json($response);
            return Redirect::to('aboutusimglist')->with('message',$response);
        }
    	$aboutus_img = new AboutUsImg();
        $aboutus_img->about_us_id  = $aboutusid;
        if($gallery){
              $aboutus_img->image  = $gallery[0];
        }
    	$result=$aboutus_img->save();

        $message="success.";
    
    	return Redirect::to('aboutusimglist')->with('message',$message);
    }

    public function showAboutUsImageList()
    {
        $response = $objaboutus_img = AboutUsImg::get();
        $allaboutus_img = AboutUsImg::all();
        $totalCount = count($allaboutus_img);
        $i=0;
        foreach($response as $aboutus_img)
        {
            $aboutusname = AboutUs::where('id','=',$aboutus_img['about_us_id'])->pluck('name');

            $response[$i]['id']          = $aboutus_img['id'];
            $response[$i]['about_us_id'] = $aboutusname;
            $response[$i]['image']       = $aboutus_img['image'];
            $i++;
        }

        return View::make('aboutus_images.list',array('response'=>$response,'totalCount'=>$totalCount,'objaboutus_img'=>$objaboutus_img));

    	// return View::make('aboutus_images.list',array('response'=>$response,'totalCount'=>$totalCount));
    }

    public function getEditAboutUsImage($id)
    {
    	// return View::make('aboutus_images.edit')->with('aboutus',AboutUs::find($id));
         $objaboutus_img = AboutUsImg::find($id);
           if(count($objaboutus_img) == 0)
           {
            return Redirect::to('aboutusimglist');
           }
           $aboutus_img['id'] = $id;
           $aboutus_img['about_us_id'] = $objaboutus_img->about_us_id;
           $aboutus_img['image'] = $objaboutus_img->image;

           $aboutus = AboutUs::all();

           $response['aboutus_img'] = $aboutus_img;
           $response['aboutus']    = $aboutus;

           // return Response::json($response);

        return View::make('aboutus_images.edit',array('response'=>$response));
    }

    public function postEditAboutUsImage($id)
    {
        $aboutusid    = Input::get('aboutus');
        $gallery      = Input::get('gallery');
        
        $checkexist   = AboutUsImg::whereid($id)
                            ->whereabout_us_id($aboutusid)->first();
        // return Response::json($checkexist);
        if($checkexist)
        {
            $affectedRows1 = AboutUsImg::where('id','=',$id)->update(array('about_us_id'=>$aboutusid,
                                                                            'image'=>$gallery[0]));
                
            return Redirect::to('aboutusimglist');
        }


        $checkaboutusimg  = AboutUsImg::whereabout_us_id($aboutusid)->whereimage($gallery)->first();
        if($checkaboutusimg)
        {
            $response ='This record is already exit';
            return Redirect::to('aboutusimglist')->with('message',$response);
            // return Response::json($response);
        }
        $affectedRows = AboutUsImg::where('id','=',$id)->update(array('about_us_id'=>$aboutusid,
                                                                            'image'=>$gallery[0]));
                                                                        
        // $message = "success."
       
        return Redirect::to('aboutusimglist');
    }

    public function getDeleteAboutUsImage($id)
    {
    	$affectedRows1 = AboutUsImg::where('id','=',$id)->delete();
        $response="Successfully delete one record.";
        return Redirect::to('aboutusimglist')->with('message',$response);
    }

    public function postDeleteAboutUsImage($id)
    {
    	
    	$totaldeleterecords = Input::get('recordstoDelete');
    	if(count($totaldeleterecords)==0)
    	{
    		return Redirect::to("/aboutusimglist");
    	}
    	foreach($totaldeleterecords as $recid)
    	{
    		$result = AboutUsImg::where('id','=',$recid)->delete();
    	}
    	return Redirect::to('aboutusimglist');
    }

    public function postSearchAboutUsImage()
    {
		$keyword = Input::get('keyword');
		$response = $aboutusimg = AboutUsImg::where('name','LIKE','%'.$keyword.'%')
    							->orderBy('id','DESC')->paginate(10);
		$allaboutusimg = AboutUsImg::all();
		$totalCount = count($allaboutusimg);
		return View::make('aboutus_images.list')->with('aboutusimg',$aboutusimg)->with('totalCount',$totalCount)->with('response',$response);
    }
}