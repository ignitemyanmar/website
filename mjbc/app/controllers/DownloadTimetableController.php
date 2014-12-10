<?php

class DownloadTimetableController extends BaseController
{
  	public function getAddDownloadTimetable()
  	{
	    return View::make('download_timetable.add');
    }

    public function postAddDownloadTimetable()
    {
        $name         = Input::get('name');
        $pdf_file     = Input::file('pdf_file');
        $file         = Input::file('pdf_file' );
        $checkexist   = DownloadTimeTable::wherename($name)->first();
        if($checkexist)
        {
            $response='This record is already exit';
            // return Response::json($response);
            return Redirect::to('downloadtimetablelist')->with('message',$response);
        }
        if($file!=null){
        $OriginalFilename= $file->getClientOriginalName();
            $FinalFilename=$OriginalFilename ;
            // rename file if it already exists by prefixing an incrementing number
            $FileCounter = 1;
            $filename = pathinfo($OriginalFilename, PATHINFO_FILENAME);
            $extension =  pathinfo($OriginalFilename, PATHINFO_EXTENSION);
            while (file_exists( 'pdffiles/'.$FinalFilename )){
                // $FinalFilename = $filename . '_' . $FileCounter++ . '.' . $extension;
                $tempname= $filename . '_' . $FileCounter++ ;
              $FinalFilename = $tempname . '.' . $extension;
            }
        }
    	$download_tt = new DownloadTimeTable();
        $download_tt->name = $name;
        $download_tt->file = $FinalFilename;
        // if($download_pdf){
        //       $download_tt->file  = $download_pdf[0];
        // }
    	$result=$download_tt->save();
        $message="success.";
        $destinationPath = 'pdffiles/';
        Input::file('pdf_file')->move($destinationPath, $FinalFilename);

        if ( $result )
        {          
            return Redirect::to('downloadtimetablelist')->with('message',$message);
        }
        else
        {
            // Get validation errors (see Ardent package)
            $error = $download_tt->errors()->all();

            return View::make('download_timetable.list');
        }
    }

    public function showDownloadTimetableList()
    {
    	$obj_download_tt = DownloadTimeTable::orderBy('id','desc')->get();
    	$response        = $obj_download_tt;
    	$totalCount      = DownloadTimeTable::count();

    	return View::make('download_timetable.list',array('response'=>$response,'totalCount'=>$totalCount));
    }

    public function getEditDownloadTimetable($id)
    {
    	return View::make('download_timetable.edit')->with('download_tt',DownloadTimeTable::find($id));
    }

    
    public function postEditDownloadTimetable($id)
    {
        $name         = Input::get('name');
        $file         = Input::file('pdf_file' );
        
        $checksamewithother  = DownloadTimeTable::where('id','!=',$id)->wherename($name)->first();
        // dd($checksamewithother);
        if($checksamewithother)
        {
            $response ='This record is already exit';
            return Redirect::to('downloadtimetablelist')->with('message',$response);
        }

        if($file==''){
            $FinalFilename=Input::get('hdfile');
        }else
        {
            $OriginalFilename= $file->getClientOriginalName();
            $FinalFilename=$OriginalFilename ;
            $FileCounter = 1;
            $filename  = pathinfo($OriginalFilename, PATHINFO_FILENAME);
            $extension =  pathinfo($OriginalFilename, PATHINFO_EXTENSION);
            while (file_exists( 'pdffiles/'.$FinalFilename ))
                $FinalFilename = $filename . '_' . $FileCounter++ . '.' . $extension;
        }

        $toupdate      = DownloadTimeTable::whereid($id)->find($id);
        if($toupdate)
        {
            $affectedRows1 = DownloadTimeTable::where('id','=',$id)->update(array('name'=>$name,
                                                                            'file'=>$FinalFilename));
            $message = "success.";
            return Redirect::to('downloadtimetablelist')->with('message',$message);    
        }
        
    }
    public function getDeleteDownloadTimetable($id)
    {
    	$affectedRows1 = DownloadTimeTable::where('id','=',$id)->delete();
        $response="Successfully delete one record.";
        return Redirect::to('downloadtimetablelist')->with('message',$response);
    }
}