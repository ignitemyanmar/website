<?php

class LanguageController extends BaseController
{
  	public function getAddLanguage()
  	{
	    return View::make('language.add');
    }

    public function postAddLanguage()
    {
        $name         = Input::get('name');

        $checkexit    = Language::wherename($name)->first();
        if($checkexit)
        {
            $response='This record is already exit';
            // return Response::json($response);
            return Redirect::to('languagelist')->with('message',$response);
        }
 
    	$language = new Language();
        $language->name    = $name;
    	$result=$language->save();
        $message="success.";
    
    	return Redirect::to('languagelist')->with('message',$message);
    }

    public function showLanguageList()
    {
    	$obj_language = Language::orderBy('id','desc')->get();
    	$response = $obj_language;
    	$totalCount = Language::count();

    	return View::make('language.list',array('response'=>$response,'totalCount'=>$totalCount));
    }

    public function getEditLanguage($id)
    {
    	return View::make('language.edit')->with('language',Language::find($id));
    }

    public function postEditLanguage($id)
    {
        $name = Input::get('name');
        
        $checksamewithother  = Language::where('id','!=',$id)->wherename($name)->first();
        if($checksamewithother)
        {
            $response ='This record is already exit';
            return Redirect::to('languagelist')->with('message',$response);
        }

        $toupdate      = Language::whereid($id)->find($id);
        if($toupdate)
        {
            $affectedRows1 = Language::where('id','=',$id)->update(array('name'=>$name));
            $message = "success.";
            return Redirect::to('languagelist')->with('message',$message);    
        }
    }

    public function getDeleteLanguage($id)
    {
        $affectedRows1 = Language::where('id','=',$id)->delete();
    	$todeletelangseminar = SeminarLanguage::where('language_id','=',$id)->delete();
        $response="Successfully delete one record.";
        return Redirect::to('languagelist')->with('message',$response);
    }
}