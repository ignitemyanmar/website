<?php

class ContactController extends BaseController {

	public function getcontact()
	{
		$contact=ContactUs::all();
		return View::make('contact.index', array('contact' => $contact));
	}

	public function showcontactuslist()
	{
	    $objContactUs=ContactUs::paginate(12);
	    $response=$objContactUs;
	    $totalcount=ContactUs::count();
	    return View::make('contact.list', array('response'=>$response, 'totalcount'=>$totalcount));
	}

	public function getAddcontact()
	{   
	    return View::make('contact.add');
	}
	  
	public function postAddcontact()
	{   
	    $title=Input::get('title');
	    $address=Input::get('address');
	    $phone=Input::get('phone');
	    $email=Input::get('email');
	    $fax=Input::get('fax');
	    $website=Input::get('website');
	    $objcontactus=new ContactUs();
	    $objcontactus->title=$title;
	    $objcontactus->address=$address;
	    $objcontactus->phone=$phone;
	    $objcontactus->email=$email;
	    $objcontactus->fax=$fax;
	    $objcontactus->save();

	    return Redirect::to('/contact-us-list');
	}

	public function getEditcontactus($id)
	{
	    return View::make('contact.edit')->with('contact_us',ContactUs::find($id));
	}

	  public function postEditcontactus($id)
	  {
	       
	        $contactus=new ContactUs(); 

	       
	        $affectedRow = ContactUs::where('id', '=', $id)->update(array(
	                    'title'=>Input::get('title'),
	                    'address'=>Input::get('address'),
	                    'phone'=>Input::get('phone'),                                         
	                    'fax'=>Input::get('fax'),
	                    'website'=>Input::get('website'),
	                                                                            
	                    ));
	  
	      return Redirect::to('/contact-us-list');      
	  }

	     public function getDeletcontactus($id)
	  {       
	            
	            $affectedRows1 = ContactUs::where('id', '=', $id)-> delete();

	            
	            return Redirect::to('contact-us-list')->with('message','One Record have been deleted.');
	  }

	  public function postdelcontactus($id)
	  {           
	            $todeleterecorts=Input::get('recordstoDelete');
	           if(count($todeleterecorts) == 0)
	           {
	            return Redirect::to("/contactuslist");
	           }
	           
	            
	  }

	   public function postSearcontactus()
	  {
	    $keyword =Input::get('keyword');
	    $response=$objContactUs=ContactUs::where('title','LIKE','%' . $keyword . '%')
	                ->orwhere('address','LIKE','%' . $keyword . '%')
	                ->orderBy('id', 'DESC')
	                ->paginate(8);
	        $allcontact=ContactUs::all();
	        $totalcount=count($allcontact);

	        // return Response::json($response);  

	        return View::make('contact.list', array(
	                        'response' => $response, 
	                        'objContactUs' => $objContactUs, 
	                        'totalcount'=>$totalcount,                       
	                        'message'=>''
	                       ));
	  }



}