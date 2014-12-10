<?php

class AboutUsController extends BaseController
{
    public function getAboutUs($lan){
        $response=AboutUs::orderBy('id','desc')->get();
        return View::make('about_us.index',array('response'=>$response));
    }

    public function getAddAboutUs()
  	{
	    return View::make('about_us.add');
    }

    public function postAddAboutUs()
    {
        $name            = Input::get('name');
        $name_mm         = Input::get('name_mm');
    	$name_jp         = Input::get('name_jp');
        $description     = Input::get('description');
        $description_mm  = Input::get('description_mm');
        $description_jp  = Input::get('description_jp');
        $gallery         = Input::get('gallery');
        // dd($gallery);
        $checkaboutus = AboutUs::wherename($name)->first();
        if($checkaboutus)
        {
            $response='This record is already exit';
            // return Response::json($response);
            return Redirect::to('aboutuslist')->with('message',$response);
        }
 
    	$aboutus = new AboutUs();
        $aboutus->name           = $name;
        $aboutus->name_mm        = $name_mm;
        $aboutus->name_jp        = $name_jp;
        $aboutus->description    = $description;
        $aboutus->description_mm = $description_mm;
    	$aboutus->description_jp = $description_jp;
    	$result = $aboutus->save();

        $max_id = AboutUs::max('id');
        if($gallery){
            $i=0;
            foreach ($gallery as $galleryimg) 
            {
                $aboutusimages=new AboutUsImg();
                $aboutusimages->about_us_id=$max_id;
                $aboutusimages->image=$galleryimg;
                $aboutusimages->save();
                $i++;
            }  
        }

        $message="success.";


    
    	return Redirect::to('aboutuslist')->with('message',$message);
    }

    public function showAboutUsList()
    {
    	$obj_aboutus = AboutUs::orderBy('id','desc') -> paginate(8);
    	$response    = $obj_aboutus;
    	$totalCount  = AboutUs::count();

    	return View::make('about_us.list',array('response'=>$response,'totalCount'=>$totalCount));
    }

    public function getEditAboutUs($id)
    {
        $objaboutus = AboutUs::with(array('about_us_images'))->find($id);
        // return Response::json($objaboutus);
        return View::make('about_us.edit', array('response'=> $objaboutus));
    }

    public function postEditAboutUs($id)
    {
        $name            = Input::get('name');
        $name_mm         = Input::get('name_mm');
        $name_jp         = Input::get('name_jp');
        $description     = Input::get('description');
        $description_mm  = Input::get('description_mm');
        $description_jp  = Input::get('description_jp');
        $gallery         = Input::get('gallery');
        
        $checksamewithother  = AboutUs::where('id','!=',$id)->wherename($name)->first();
        if($checksamewithother)
        {
            $response ='This record is already exit';
            return Redirect::to('aboutuslist')->with('message',$response);
        }

        $toupdate      = AboutUs::whereid($id)->find($id);
        if($toupdate)
        {
            $affectedRows1 = AboutUs::where('id','=',$id)->update(array('name'=>$name,
                                                                            'name_mm'=>$name_mm,
                                                                            'name_jp'=>$name_jp,
                                                                            'description'=>$description,
                                                                            'description_mm'=>$description_mm,
                                                                            'description_jp'=>$description_jp
                                                                            ));
        }

       
            $max_id = $id;
            if($gallery){
             AboutUsImg::whereabout_us_id($id)->delete();
                $i=0;
                foreach ($gallery as $galleryimg) 
                {
                    $aboutusimages=new AboutUsImg();
                    $aboutusimages->about_us_id=$max_id;
                    $aboutusimages->image=$galleryimg;
                    $aboutusimages->save();
                    $i++;
                }  
            }
                
            $message = "success.";
            return Redirect::to('aboutuslist')->with('message',$message);    
    }

       
    public function getDeleteAboutUs($id)
    {
        $affectedRows1 = AboutUs::where('id','=',$id)->delete();
    	$affectedRows  = AboutUsImg::where('about_us_id','=',$id)->delete();
        $response="Successfully delete one record.";
        return Redirect::to('aboutuslist')->with('message',$response);
    }

}