<?php

class BusinessGuideController  extends BaseController {

	public function getallbusiness()
	{
        $businessguide=BusinessGuide::paginate(2);
        if(count($businessguide) >0){
            $i=0;
            foreach ($businessguide as $row) {
                $businessguide[$i]=$row;
                $businessguide[$i]['category']=BusinessCategory::whereid($row->categoryid)->pluck('title');
                $i++;
            }
        }
		return View::make('businessguide.index', array('businessguide'=>$businessguide));
	}

	public function getbusinessbytype($type)
	{
        $type=substr($type, 4,6);
        $typeid=BusinessCategory::where('title','like','%'.$type.'%')->pluck('id');
        $businessguide=BusinessGuide::wherecategoryid($typeid)->orderBy('companyname')->paginate(2);
		if(count($businessguide) >0){
            $i=0;
            foreach ($businessguide as $row) {
                $businessguide[$i]=$row;
                $businessguide[$i]['category']=BusinessCategory::whereid($row->categoryid)->pluck('title');
                $i++;
            }
        }
        return View::make('businessguide.type', array('type' => $type, 'businessguide'=>$businessguide));
	}

    public function getbusinessdetail($type, $title){
        $title=str_replace('-', ' ', $title);
        $type=substr($type, 4,6);
        $typeid=BusinessCategory::where('title','like','%'.$type.'%')->pluck('id');
        $businessguide=BusinessGuide::with('days')->wherecategoryid($typeid)->wherecompanyname($title)->first();
        // return Response::json($businessguide);
        return View::make('businessguide.detail', array('type' => $type, 'businessguide'=>$businessguide));
    }

	public function getAddBusinessGuide()
  	{   
        $days=array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
        $objcategory=BusinessCategory::all();
      	return View::make('businessguide.add', array('days' => $days, 'categories' => $objcategory));
  	}
 
  	public function postAddBusinessGuide()
  	{   
	    $companyname=Input::get('name');
        $category=Input::get('category');
        $contact_person=Input::get('contact_person');
        $file=Input::file( 'image_file' );
        $email=Input::get('email');
        $phone=Input::get('phone');
        $street=Input::get('street');
        $township=Input::get('township');
        $city=Input::get('city');
        $website=Input::get('website');
        $short_description=Input::get('short_description');
        $description=Input::get('description');
        $businesslogo='';
        if($file!=null){
            $filename='';
            $OriginalFilename= $file->getClientOriginalName();
                $businesslogo=$OriginalFilename ;
                // rename file if it already exists by prefixing an incrementing number
                $FileCounter = 1;
                $filename = pathinfo($OriginalFilename, PATHINFO_FILENAME);
                $extension =  pathinfo($OriginalFilename, PATHINFO_EXTENSION);
                while (file_exists( 'businesslogo/php/files/'.$businesslogo )){
                  $tempname= $filename . '_' . $FileCounter++ ;
                  $businesslogo = $tempname . '.' . $extension;
               }

              $destinationPath = 'businesslogo/php/files/';
              Input::file('image_file')->move($destinationPath, $businesslogo);
            }     
        $objbusiness=new BusinessGuide();
        $objbusiness->companyname=$companyname; 
        $objbusiness->categoryid=$category; 
        $objbusiness->image=$businesslogo; 
        $objbusiness->contact_person=$contact_person; 
        $objbusiness->email=$email; 
        $objbusiness->phone=$phone; 
        $objbusiness->street=$street; 
        $objbusiness->township=$township; 
        $objbusiness->city=$city; 
        $objbusiness->website=$website; 
        $objbusiness->short_description=$short_description; 
        $objbusiness->description=$description; 
        $objbusiness->save();
        $businessid=BusinessGuide::max('id');

        $businessdays=Input::get('days');
        $count_days=count($businessdays);
        if($count_days > 0){
            for($i=0 ; $i < $count_days; $i++){
                $objbusinessday=new BusinessDays();
                $objbusinessday->businessid=$businessid;
                $objbusinessday->day=$businessdays[$i];
                $objbusinessday->save();
            }
        }
        return Redirect::to('/businessguidelist');
  	}
  	public function getEditBusinessGuide($id)
    {
        $days=array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
        // return Response::json($days);
        $objcategory=BusinessCategory::all();
        $objbusiness=BusinessGuide::with('days')->find($id);
        // return Response::json($objbusiness);

        return View::make('businessguide.edit', array('categories' => $objcategory, 'business' => $objbusiness, 'days'=> $days));
    }

   
    public function postEditBusinessGuide($id)
    {
          
        $companyname=Input::get('name');
        $category=Input::get('category');
        $contact_person=Input::get('contact_person');
        $file=Input::file( 'image_file' );
        $email=Input::get('email');
        $phone=Input::get('phone');
        $street=Input::get('street');
        $township=Input::get('township');
        $city=Input::get('city');
        $website=Input::get('website');
        $short_description=Input::get('short_description');
        $description=Input::get('description');
        $businesslogo='';
        if($file!=null){
            $companylogo=BusinessGuide::whereid($id)->pluck('image');
            @unlink("../businesslogo/php/files/".$image);
            $filename='';
            $OriginalFilename= $file->getClientOriginalName();
                $businesslogo=$OriginalFilename ;
                // rename file if it already exists by prefixing an incrementing number
                $FileCounter = 1;
                $filename = pathinfo($OriginalFilename, PATHINFO_FILENAME);
                $extension =  pathinfo($OriginalFilename, PATHINFO_EXTENSION);
                while (file_exists( 'businesslogo/php/files/'.$businesslogo )){
                  $tempname= $filename . '_' . $FileCounter++ ;
                  $businesslogo = $tempname . '.' . $extension;
               }

              $destinationPath = 'businesslogo/php/files/';
              Input::file('image_file')->move($destinationPath, $businesslogo);
        }else{
            $businesslogo=Input::get('hdphoto');
        }  
        $objbusiness= BusinessGuide::find($id);
        $objbusiness->companyname=$companyname; 
        $objbusiness->categoryid=$category; 
        $objbusiness->image=$businesslogo; 
        $objbusiness->contact_person=$contact_person; 
        $objbusiness->email=$email; 
        $objbusiness->phone=$phone; 
        $objbusiness->street=$street; 
        $objbusiness->township=$township; 
        $objbusiness->city=$city; 
        $objbusiness->website=$website; 
        $objbusiness->short_description=$short_description; 
        $objbusiness->description=$description; 
        $objbusiness->update();

        BusinessDays::wherebusinessid($id)->delete();
        $businessdays=Input::get('days');
        $count_days=count($businessdays);
        if($count_days > 0){
            for($i=0 ; $i < $count_days; $i++){
                $objbusinessday=new BusinessDays();
                $objbusinessday->businessid=$id;
                $objbusinessday->day=$businessdays[$i];
                $objbusinessday->save();
            }
        }
        return Redirect::to('/businessguidelist');
    }

    public function getDeleteBusinessGuide($id)
    {           
            $companylogo=BusinessGuide::where('id','=',$id)->pluck('image');
            $affectedRows1 = BusinessGuide::where('id', '=', $id)->delete();
            
            @unlink('../businesslogo/php/files/'.$companylogo);
            return Redirect::to('/businessguidelist');
            
    }

    public function postdelBusinessGuide()
    {           
           $todeleterecorts=Input::get('recordstoDelete');
           if(count($todeleterecorts) == 0){
            return Redirect::to("/businessguidelist");
           }
           
            foreach ($todeleterecorts as $recid) {
                $companylogo=BusinessGuide::where('id','=',$recid)->pluck('image');
                $result = BusinessGuide::where('id', '=', $recid)->delete();
                @unlink('../businesslogo/php/files/'.$companylogo);
            }
            return Redirect::to("/businessguidelist");
    }

     public function getAllBusinessGuide()
    {
       	$businessguides= BusinessGuide::orderBy('id', 'DESC')                
                ->paginate(15);
       	$response=$businessguides;
        $totalcount=BusinessGuide::count();
        return View::make('businessguide.list',array('response'=>$response, 'totalcount'=>$totalcount));
    }
    
    
    public function postSearchBusinessGuide()
    {
            $keyword =Input::get('keyword');            
            $businessguides = BusinessGuide::where('companyname','LIKE','%' . $keyword . '%')
                        ->orderBy('id', 'DESC')->paginate(10);
           $count=count($businessguides);
            return \View::make('businessguide.list')->with('response', $businessguides)->with('totalcount',$count);
    
    }

    public function getbusinesssearch(){
        $keyword =Input::get('search');
        $businessguide=BusinessGuide::where('companyname','LIKE','%'.$keyword.'%')->paginate(12);
        if(count($businessguide) >0){
            $i=0;
            foreach ($businessguide as $row) {
                $businessguide[$i]=$row;
                $businessguide[$i]['category']=BusinessCategory::whereid($row->categoryid)->pluck('title');
                $i++;
            }
        }
        return View::make('businessguide.index', array('businessguide'=>$businessguide));
    }
    



}