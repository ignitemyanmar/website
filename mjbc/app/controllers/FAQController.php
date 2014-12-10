<?php

class FAQController extends BaseController
{
    public function getFaq($lan){
        $language=Session::get('language') ? Session::get('language') : 'english';
        $response=FAQ::orderBy('id','desc')->get();
        return View::make('faq.index',array('response'=>$response, 'language'=>$language));
    }
    
  	public function getAddFAQ()
  	{
	    return View::make('faq.add');
    }


    public function postAddFAQ()
    {
        $name            = Input::get('name');
        $name_mm         = Input::get('name_mm');
    	$name_jp         = Input::get('name_jp');
        $description     = Input::get('description');
        $description_mm  = Input::get('description_mm');
        $description_jp  = Input::get('description_jp');
       
        $checkfaq = FAQ::wherename($name)->first();
        if($checkfaq)
        {
            $response='This record is already exit';
            return Redirect::to('faqlist')->with('message',$response);
        }
 
    	$faq = new FAQ();
        $faq->name           = $name;
        $faq->name_mm        = $name_mm;
        $faq->name_jp        = $name_jp;
        $faq->description    = $description;
        $faq->description_mm = $description_mm;
    	$faq->description_jp = $description_jp;
    	$result=$faq->save();
        $message="success.";
    
    	return Redirect::to('faqlist')->with('message',$message);
    }

    public function showFAQList()
    {
    	$obj_faq = FAQ::orderBy('id','desc')->get();
    	$response = $obj_faq;
    	$totalCount = FAQ::count();
    	return View::make('faq.list',array('response'=>$response,'totalCount'=>$totalCount));
    }

    public function getEditFAQ($id)
    {
    	return View::make('faq.edit')->with('faq',FAQ::find($id));
    }

    public function postEditFAQ($id)
    {
        $name            = Input::get('name');
        $name_mm         = Input::get('name_mm');
        $name_jp         = Input::get('name_jp');
        $description     = Input::get('description');
        $description_mm  = Input::get('description_mm');
        $description_jp  = Input::get('description_jp');
       
        $checksamewithother  = FAQ::where('id','!=',$id)->wherename($name)->first();
        if($checksamewithother)
        {
            $response ='This record is already exit';
            return Redirect::to('faqlist')->with('message',$response);
        }

        $toupdate      = FAQ::whereid($id)->find($id);
        if($toupdate)
        {
            $affectedRows1 = FAQ::where('id','=',$id)->update(array('name'=>$name,
                                                                            'name_mm'=>$name_mm,
                                                                            'name_jp'=>$name_jp,
                                                                            'description'=>$description,
                                                                            'description_mm'=>$description_mm,
                                                                            'description_jp'=>$description_jp
                                                                            ));
            $message = "success.";
            return Redirect::to('faqlist')->with('message',$message);    
        }
    }

    public function getDeleteFAQ($id)
    {
    	$affectedRows1 = FAQ::where('id','=',$id)->delete();
        $response="Successfully delete one record.";
        return Redirect::to('faqlist')->with('message',$response);
    }

    public function postDeleteFAQ($id)
    {
    	$totaldeleterecords = Input::get('recordstoDelete');
    	if(count($totaldeleterecords)==0)
    	{
    		return Redirect::to("/faqlist");
    	}
    	foreach($totaldeleterecords as $recid)
    	{
    		$result = FAQ::where('id','=',$recid)->delete();
    	}
    	return Redirect::to('faqlist');
    }

    public function postSearchFAQ()
    {
		$keyword = Input::get('keyword');
		$response = $faq = FAQ::where('name','LIKE','%'.$keyword.'%')
    							->orderBy('id','DESC')->paginate(10);
		$allfaq = FAQ::all();
		$totalCount = count($allfaq);
		return View::make('faq.list')->with('faq',$faq)->with('totalCount',$totalCount)->with('response',$response);
    }
}