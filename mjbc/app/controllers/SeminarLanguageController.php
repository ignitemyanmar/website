<?php

class SeminarLanguageController extends BaseController
{
  	public function getAddSeminarLanguage()
  	{
        $seminar =Seminar::all();
        $language = Language::all();
        $response['seminar'] = $seminar;
        $response['language'] = $language;
	    return View::make('seminar_language.add',array('response'=>$response));
    }

    public function postAddSeminarLanguage()
    {
        $name               = Input::get('name');
        $seminarname        = Input::get('s_name');
        $language_id        = Input::get('languageid');
        $codeno             = Input::get('codeno');
        $training_name      = Input::get('t_name');
        $training_needs     = Input::get('t_needs');
        $subject            = Input::get('subject');
        $venue              = Input::get('venue');
        $tuitionfees        = Input::get('tuitionfees');
        $imp_method         = Input::get('implement');
        $physician          = Input::get('physician');
    	$description        = Input::get('description');
        // dd($tuitionfees);
        $checkexist = SeminarLanguage::wherename($name)->whereseminar_id($seminarname)->wherelanguage_id($language_id)->first();
        if($checkexist)
        {
            $response='This record is already exit';
            // return Response::json($response);
            return Redirect::to('languageseminarlist')->with('message',$response);
        }
 
    	$seminarlanguage  = new SeminarLanguage();
        $seminarlanguage ->seminar_id               = $seminarname;
        $seminarlanguage ->name                     = $name;
        $seminarlanguage ->language_id              = $language_id;
        $seminarlanguage ->code_no                  = $codeno;
        $seminarlanguage ->training_name            = $training_name;
        $seminarlanguage ->training_needs           = $training_needs;
        $seminarlanguage ->subject                  = $subject;
        $seminarlanguage ->venue                    = $venue;
        $seminarlanguage ->tuition_fees             = $tuitionfees;
        $seminarlanguage ->implementation_method    = $imp_method;
        $seminarlanguage ->physician                = $physician;
    	$seminarlanguage ->description              = $description;
    	$result   = $seminarlanguage->save();
        $message="success.";
    
    	return Redirect::to('languageseminarlist')->with('message',$message);
    }

    public function showSeminarLanguageList()
    {
        $response = $obj_seminarlang = SeminarLanguage::orderBy('id','desc')->get();
        $allseminarlang = SeminarLanguage::all();
        $totalCount = count($allseminarlang);
        $i=0;
        foreach($response as $seminarlang)
        {
            $seminarname = Seminar::where('id','=',$seminarlang['seminar_id'])->pluck('name');
            $language    = Language::where('id','=',$seminarlang['language_id'])->pluck('name');

            $response[$i]['id']              = $seminarlang['id'];
            $response[$i]['seminar_id']      = $seminarname;
            $response[$i]['language_id']     = $language;
            $i++;
        }

    	return View::make('seminar_language.list',array('response'=>$response,'totalCount'=>$totalCount,'seminarlang'=>$seminarlang));
    }

    public function getEditSeminarLanguage($id)
    {
    	$obj_seminarlang = SeminarLanguage::find($id);
           if(count($obj_seminarlang) == 0)
           {
            return Redirect::to('languageseminarlist');
           }
           $seminar_lang['id']                       = $id;
           $seminar_lang['seminar_id']               = $obj_seminarlang->seminar_id;
           $seminar_lang['language_id']              = $obj_seminarlang->language_id;
           $seminar_lang['name']                     = $obj_seminarlang->name;
           $seminar_lang['code_no']                  = $obj_seminarlang->code_no;
           $seminar_lang['training_needs']           = $obj_seminarlang->training_needs;
           $seminar_lang['training_name']            = $obj_seminarlang->training_name;
           $seminar_lang['subject']                  = $obj_seminarlang->subject;
           $seminar_lang['venue']                    = $obj_seminarlang->venue;
           $seminar_lang['tuition_fees']             = $obj_seminarlang->tuition_fees;
           $seminar_lang['implementation_method']    = $obj_seminarlang->implementation_method;
           $seminar_lang['physician']                = $obj_seminarlang->physician;
           $seminar_lang['language']                 = $obj_seminarlang->language;
           $seminar_lang['description']              = $obj_seminarlang->description;

           $seminar  = Seminar::all();
           $language = Language::all();

           $response['seminar_lang']  = $seminar_lang;
           $response['seminar']       = $seminar;
           $response['language']      = $language;
           // return Response::json($response['seminar_lang']);
        
        return View::make('seminar_language.edit',array('response'=>$response));
    }

    public function postEditSeminarLanguage($id)
    {
        $name               = Input::get('name');
        $seminarname        = Input::get('s_name');
        $language_id        = Input::get('languageid');
        $codeno             = Input::get('codeno');
        $training_name      = Input::get('t_name');
        $training_needs     = Input::get('t_needs');
        $subject            = Input::get('subject');
        $venue              = Input::get('venue');
        $tuitionfees        = Input::get('tuitionfees');
        $imp_method         = Input::get('implement');
        $physician          = Input::get('physician');
        $description        = Input::get('description');
        
        $checksamewithother = SeminarLanguage::where('id','!=',$id)->wherename($name)->first();
        if($checksamewithother)
        {
            $response ='This record is already exit';
            return Redirect::to('languageseminarlist')->with('message',$response);
        }

        $toupdate      = SeminarLanguage::whereid($id)->find($id);
        if($toupdate)
        {
            $affectedRows1 = SeminarLanguage::where('id','=',$id)->update(array('name'=>$name,
                                                                                'seminar_id'=>$seminarname,
                                                                                'language_id'=>$language_id,
                                                                                'code_no'=>$codeno,
                                                                                'training_name'=>$training_name,
                                                                                'training_needs'=>$training_needs,
                                                                                'venue'=>$venue,
                                                                                'tuition_fees'=>$tuitionfees,
                                                                                'implementation_method'=>$imp_method,
                                                                                'physician'=>$physician,
                                                                                'description'=>$description,
                                                                                'subject'=>$subject
                                                                                ));
            $message = "success.";
            return Redirect::to('languageseminarlist')->with('message',$message);    
        }
    }

    public function getDeleteSeminarLanguage($id)
    {
    	$affectedRows1 = SeminarLanguage::where('id','=',$id)->delete();
        $response="Successfully delete one record.";
        return Redirect::to('languageseminarlist')->with('message',$response);
    }
    
}