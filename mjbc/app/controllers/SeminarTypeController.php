<?php

class SeminarTypeController extends BaseController
{
  	public function getAddSeminarType()
  	{
	    return View::make('seminartype.add');
    }

    public function postAddSeminarType()
    {
        $name         = Input::get('name');
        $name_mm      = Input::get('name_mm');
    	$name_jp      = Input::get('name_jp');

        $checkseminartype = SeminarType::wherename($name)->first();
        if($checkseminartype)
        {
            $response='This record is already exit';
            // return Response::json($response);
            return Redirect::to('seminartypelist')->with('message',$response);
        }
 
    	$seminartype = new SeminarType();
        $seminartype->name    = $name;
        $seminartype->name_mm = $name_mm;
    	$seminartype->name_jp = $name_jp;
    	$result=$seminartype->save();
        $message="success.";
    
    	return Redirect::to('seminartypelist')->with('message',$message);
    }

    public function showSeminarTypeList()
    {
    	$obj_seminartype = SeminarType::orderBy('id','desc')->get();
    	$response = $obj_seminartype;
    	$totalCount = SeminarType::count();

    	return View::make('seminartype.list',array('response'=>$response,'totalCount'=>$totalCount));
    }

    public function getEditSeminarType($id)
    {
    	return View::make('seminartype.edit')->with('seminartype',SeminarType::find($id));
    }

    public function postEditSeminarType($id)
    {
        $name         = Input::get('name');
        $name_mm      = Input::get('name_mm');
        $name_jp      = Input::get('name_jp');
       
        $checksamewithother  = SeminarType::where('id','!=',$id)->wherename($name)->first();
        if($checksamewithother)
        {
            $response ='This record is already exit';
            return Redirect::to('seminartypelist')->with('message',$response);
        }
        
        $toupdate      = SeminarType::whereid($id)->find($id);
        if($toupdate)
        {
            $affectedRows1 = SeminarType::where('id','=',$id)->update(array('name'=>$name,
                                                                            'name_mm'=>$name_mm,
                                                                            'name_jp'=>$name_jp));
            $message = "success.";
            return Redirect::to('seminartypelist')->with('message',$message);    
        }
    }

    public function getDeleteSeminarType($id)
    {
        $affectedRows1 = SeminarType::where('id','=',$id)->delete();
    	$affectedRows  = Seminar::where('seminar_type_id','=',$id)->delete();
        $response="Successfully delete one record.";
        return Redirect::to('seminartypelist')->with('message',$response);
    }
    
}