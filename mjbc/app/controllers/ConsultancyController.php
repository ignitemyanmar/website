<?php

class ConsultancyController extends BaseController
{
  	public function getAddConsultancy()
  	{
	    return View::make('consultancy.add');
    }

    public function postAddConsultancy()
    {
        $name            = Input::get('name');
        $name_mm         = Input::get('name_mm');
    	$name_jp         = Input::get('name_jp');
        $description     = Input::get('description');
        $description_mm  = Input::get('description_mm');
        $description_jp  = Input::get('description_jp');
        $gallery         = Input::get('gallery');
        $file            = Input::file('pdf_file' );


        $checkconsultancy = Consultancy::wherename($name)->first();
        if($checkconsultancy)
        {
            $response='This record is already exit';
            // return Response::json($response);
            return Redirect::to('consultancylist')->with('message',$response);
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

    	$consultancy = new Consultancy();
        $consultancy->name           = $name;
        $consultancy->name_mm        = $name_mm;
        $consultancy->name_jp        = $name_jp;
        $consultancy->description    = $description;
        $consultancy->description_mm = $description_mm;
    	$consultancy->description_jp = $description_jp;
        $consultancy->download_file  = $FinalFilename;
        if($gallery){
              $consultancy->image    =$gallery[0];
        }
    	$result=$consultancy->save();

        $maxconsultancy_id=Consultancy::max('id');
        if($gallery){
            $i=0;
            foreach ($gallery as $galleryimg) {
                if($i>0){
                    $consultancyimages=new ConsultancyImages();
                    $consultancyimages->consultancy_id=$maxconsultancy_id;
                    $consultancyimages->image=$galleryimg;
                    $consultancyimages->save();
                }
                $i++;
            }
        }

        $message="success.";
    
        $destinationPath = 'pdffiles/';
        Input::file('pdf_file')->move($destinationPath, $FinalFilename);

        if ( $result )
        {          
            return Redirect::to('consultancylist')->with('message',$message);
        }
        else
        {
            // Get validation errors (see Ardent package)
            $error = $consultancy->errors()->all();

            return View::make('consultancy.list');
        }
    }

    public function showConsultancyList()
    {
    	$obj_consultancy = Consultancy::orderBy('id','desc')->get();
    	$response = $obj_consultancy;
    	$totalCount = Consultancy::count();

    	return View::make('consultancy.list',array('response'=>$response,'totalCount'=>$totalCount));
    }

    public function getEditConsultancy($id)
    {
        $objconsultancy = Consultancy::with(array('consultancy_images'))->find($id);
    	
        return View::make('consultancy.edit', array('response'=> $objconsultancy));
        // return View::make('consultancy.edit')->with('consultancy',Consultancy::find($id));
    }

    public function postEditConsultancy($id)
    {
        $name            = Input::get('name');
        $name_mm         = Input::get('name_mm');
        $name_jp         = Input::get('name_jp');
        $description     = Input::get('description');
        $description_mm  = Input::get('description_mm');
        $description_jp  = Input::get('description_jp');
        $gallery         = Input::get('gallery');
        $file            = Input::file( 'pdf_file' );
        // dd($FinalFilename);
         $checkconsultancy  = Consultancy::where('id','!=',$id)->wherename($name)->wheredescription($description)->first();
        if($checkconsultancy)
        {
            $response ='This record is already exit';
            return Redirect::to('consultancylist')->with('message',$response);
        }
       
        if($file==''){
            $FinalFilename=Input::get('hdfile');
        }else
        {
            $OriginalFilename= $file->getClientOriginalName();
            $FinalFilename=$OriginalFilename ;
            $FileCounter = 1;
            $filename = pathinfo($OriginalFilename, PATHINFO_FILENAME);
            $extension =  pathinfo($OriginalFilename, PATHINFO_EXTENSION);
            while (file_exists( 'pdffiles/'.$FinalFilename ))
                $FinalFilename = $filename . '_' . $FileCounter++ . '.' . $extension;
        }

        
        
        $d_file=Consultancy::whereid($id)->pluck('download_file');

        $consultancy   = Consultancy::find($id);
        $consultancy->name              = $name;
        $consultancy->name_mm           = $name_mm;
        $consultancy->name_jp           = $name_jp;
        $consultancy->description       = $description;
        $consultancy->description_mm    = $description_mm;
        $consultancy->description_jp    = $description_jp;
        $consultancy->download_file     = $FinalFilename;
        if($gallery){
              $consultancy->image        =$gallery[0];
        }
        $result = $consultancy->update();

        $maxid=$id;
        if($gallery){
            $l=0;
            $images=ConsultancyImages::whereconsultancy_id($id)->lists('image');
            // dd($images);
            ConsultancyImages::whereconsultancy_id($id)->delete();
            if($images){
                foreach ($images as $image) {
                    @unlink('/consultancy_photo/php/files/'.$image);
                }
            }
            foreach ($gallery as $galleryimg) {
                if($l>0){
                    $objconimages=new ConsultancyImages();
                    $objconimages->consultancy_id=$maxid;
                    $objconimages->image=$galleryimg;
                    $objconimages->save();
                }
                $l++;
            }
        }

        if($file!=''){
        @unlink("pdffiles/".$d_file);
        $destinationPath = 'pdffiles/';
        Input::file('pdf_file')->move($destinationPath, $FinalFilename);
        }
         $message = "success.";
         return Redirect::to('consultancylist')->with('message',$message);
    }

    public function getDeleteConsultancy($id)
    {
        $affectedRows1 = Consultancy::where('id','=',$id)->delete();
    	$affectedRows  = ConsultancyImages::where('consultancy_id','=',$id)->delete();
        $response="Successfully delete one record.";
        return Redirect::to('consultancylist')->with('message',$response);
    }

    
}