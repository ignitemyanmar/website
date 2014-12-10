<?php

class SeminarController extends BaseController
{
  	public function getAddSeminar()
  	{
        $seminartype =SeminarType::all();
        $language = Language::all();
        $response['language'] = $language;
	    return View::make('seminar.add',array('response'=>$seminartype, 'responses'=>$response));
    }

    public function postAddSeminar()
    {
        $name               = Input::get('name');
        $category        = Input::get('category');
        $language_id        = Input::get('languageid');
        $seminartype        = Input::get('seminartype');
        $codeno             = Input::get('codeno');
        $training_name      = Input::get('t_name');
        $training_needs     = Input::get('t_needs');
        $subject            = Input::get('subject');
        $constantmember     = Input::get('member');
        $tuitionfees        = Input::get('tuitionfees');
        $imp_method         = Input::get('implement');
        $physician          = Input::get('physician');
        $language           = Input::get('language');
    	$description        = Input::get('description');
        $gallery            = Input::get('gallery');
        // dd($tuitionfees);
        $checkexist = Seminar::wherecategory($category)->whereseminar_type_id($seminar_type_id)->wherename($name)->first();
        if($checkexist)
        {
            $response='This record is already exit';
            // return Response::json($response);
            return Redirect::to('seminarlist')->with('message',$response);
        }
 
    	$seminar  = new Seminar();
        $seminar ->name                     = $name;
        $seminar ->category                 = $category;
        $seminar ->language_id              = $language_id;
        $seminar ->seminar_type_id          = $seminartype;
        $seminar ->code_no                  = $codeno;
        $seminar ->training_name            = $training_name;
        $seminar ->training_needs           = $training_needs;
        $seminar ->subject                  = $subject;
        $seminar ->constant_members         = $constantmember;
        $seminar ->tuition_fees             = $tuitionfees;
        $seminar ->implementation_method    = $imp_method;
        $seminar ->physician                = $physician;
        $seminar ->language                 = $language;
    	$seminar ->description              = $description;
    	$result   = $seminar->save();

        $max_id = Seminar::max('id');
        if($gallery){
            $i=0;
            foreach ($gallery as $galleryimg) 
            {
                $aboutusimages=new SeminarImages();
                $aboutusimages->seminar_id=$max_id;
                $aboutusimages->images=$galleryimg;
                $aboutusimages->save();
                $i++;
            }  
        }
        $message="success.";
    
    	return Redirect::to('seminarlist')->with('message',$message);
    }

    public function showSeminarList()
    {
    	// $obj_seminar = Seminar::get();
    	// $response    = $obj_seminar;
    	// $totalCount  = Seminar::count();

        $response = $obj_seminar = Seminar::orderBy('id','desc')->get();
        $allseminar = AboutUsImg::all();
        $totalCount = count($allseminar);
        $i=0;
        foreach($response as $obj_seminar)
        {
            $seminartypename = SeminarType::where('id','=',$obj_seminar['seminar_type_id'])->pluck('name');
            $response[$i]['id']              = $obj_seminar['id'];
            $response[$i]['seminar_type']    = $seminartypename;
            $response[$i]['language_name']    = Language::whereid($obj_seminar->language_id)->pluck('name');

            $i++;
        }

    	return View::make('seminar.list',array('response'=>$response,'totalCount'=>$totalCount,'obj_seminar'=>$obj_seminar));
    }

    public function getEditSeminar($id)
    {
    	$obj_seminar = Seminar::with(array('seminar_images'))->find($id);
           if(count($obj_seminar) == 0)
           {
            return Redirect::to('seminarlist');
           }
          

           $seminartype = SeminarType::all();
           $seminarimg = SeminarImages::all();

           $response['seminar']        = $obj_seminar;
           $response['seminartype']    = $seminartype;
           $response['seminarimg']    = $seminarimg;
           $language = Language::all();
            $response['language'] = $language;
        // return Response::json($response['seminar']);
        // return View::make('aboutus_images.edit',array('response'=>$response));
        return View::make('seminar.edit',array('response'=>$response));
    }

    public function postEditSeminar($id)
    {
        $name               = Input::get('name');
        $category           = Input::get('category');
        $language_id        = Input::get('languageid');
        $seminartype        = Input::get('seminartype');
        $codeno             = Input::get('codeno');
        $training_name      = Input::get('t_name');
        $training_needs     = Input::get('t_needs');
        $subject            = Input::get('subject');
        $constantmember     = Input::get('member');
        $tuitionfees        = Input::get('tuitionfees');
        $imp_method         = Input::get('implement');
        $physician          = Input::get('physician');
        $language           = Input::get('language');
        $gallery            = Input::get('gallery');
        $description        = Input::get('description');
        
        $checksamewithother = Seminar::where('id','!=',$id)->wherename($name)->whereseminar_type_id($seminartype)->first();
        if($checksamewithother)
        {
            $response ='This record is already exit';
            return Redirect::to('seminarlist')->with('message',$response);
        }
       
        $toupdate     = Seminar::whereid($id)->find($id);
        if($toupdate)
        {
            $affectedRows = Seminar::where('id','=',$id)->update(array('name'=>$name,
                                                                        'category'=>$category,
                                                                        'language_id'=>$language_id,
                                                                        'seminar_type_id'=>$seminartype,
                                                                        'code_no'=>$codeno,
                                                                        'training_name'=>$training_name,
                                                                        'training_needs'=>$training_needs,
                                                                        'constant_members'=>$constantmember,
                                                                        'tuition_fees'=>$tuitionfees,
                                                                        'implementation_method'=>$imp_method,
                                                                        'physician'=>$physician,
                                                                        'language'=>$language,
                                                                        'description'=>$description,
                                                                        'subject'=>$subject
                                                                        ));
        }
        
          $max_id = $id;
            if($gallery){
             SeminarImages::whereseminar_id($id)->delete();
                $i=0;
                foreach ($gallery as $galleryimg) 
                {
                    $seminarimages=new SeminarImages();
                    $seminarimages->seminar_id=$max_id;
                    $seminarimages->images=$galleryimg;
                    $seminarimages->save();
                    $i++;
                }  
            }

        $message = "success.";
        return Redirect::to('seminarlist')->with('message',$message);
    }

    public function getDeleteSeminar($id)
    {
        $affectedRows1 = Seminar::where('id','=',$id)->delete();
        $affectedRows  = SeminarImages::where('seminar_id','=',$id)->delete();
        $todeleteintimetable  = TimeTable::where('seminar_id','=',$id)->delete();
    	$todeletelangseminar  = SeminarLanguage::where('seminar_id','=',$id)->delete();
        $response="Successfully delete one record.";
        return Redirect::to('seminarlist')->with('message',$response);
    }

}