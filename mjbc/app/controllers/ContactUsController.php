<?php

class ContactUsController extends BaseController
{

    public function getContactUs($lan){
        $response=ContactUs::orderBy('id','desc')->first();
        return View::make('contact_us.index', array('response'=>$response));
    }

  	public function getAddContactUs()
  	{
	    return View::make('contact_us.add');
    }

    public function postAddContactUs()
    {
        $name            = Input::get('name');
        $name_mm         = Input::get('name_mm');
    	$name_jp         = Input::get('name_jp');
        $address         = Input::get('address');
        $address_mm      = Input::get('address_mm');
        $address_jp      = Input::get('address_jp');
        $email           = Input::get('email');
        $phone           = Input::get('phone');
        $location        = Input::get('location');
        // dd($name);
        $checkcontactus  = ContactUs::wherename($name)->whereemail($email)->first();
        if($checkcontactus)
        {
            $response='This record is already exit';
            // return Response::json($response);
            return Redirect::to('contactuslist')->with('message',$response);
        }
 
    	$contactus = new ContactUs();
        $contactus->name           = $name;
        $contactus->name_mm        = $name_mm;
        $contactus->name_jp        = $name_jp;
        $contactus->address        = $address;
        $contactus->address_mm     = $address_mm;
        $contactus->address_jp     = $address_jp;
        $contactus->email          = $email;
        $contactus->phone          = $phone;
    	$contactus->location       = $location;
    	$result=$contactus->save();
        $message="success.";
    
    	return Redirect::to('contactuslist')->with('message',$message);
    }

    public function showContactUsList()
    {
    	$obj_contactus = ContactUs::orderBy('id','desc')->get();
    	$response = $obj_contactus;
    	$totalCount = ContactUs::count();

    	return View::make('contact_us.list',array('response'=>$response,'totalCount'=>$totalCount));
    }

    public function getEditContactUs($id)
    {
    	return View::make('contact_us.edit')->with('contactus',ContactUs::find($id));
    }

    public function postEditContactUs($id)
    {
        $name            = Input::get('name');
        $name_mm         = Input::get('name_mm');
        $name_jp         = Input::get('name_jp');
        $address         = Input::get('address');
        $address_mm      = Input::get('address_mm');
        $address_jp      = Input::get('address_jp');
        $email           = Input::get('email');
        $phone           = Input::get('phone');
        $location        = Input::get('location');
        
        $checksamewithother  = ContactUs::where('id','!=',$id)->wherename($name)->first();
        if($checksamewithother)
        {
            $response ='This record is already exit';
            return Redirect::to('contactuslist')->with('message',$response);
        }
        $toupdate      = ContactUs::whereid($id)->find($id);
        if($toupdate)
        {
            $affectedRows1 = ContactUs::where('id','=',$id)->update(array('name'=>$name,
                                                                            'name_mm'=>$name_mm,
                                                                            'name_jp'=>$name_jp,
                                                                            'address'=>$address,
                                                                            'address_mm'=>$address_mm,
                                                                            'address_jp'=>$address_jp,
                                                                            'email'=>$email,
                                                                            'phone'=>$phone,
                                                                            'location'=>$location
                                                                            ));
            $message = "success.";
            return Redirect::to('contactuslist')->with('message',$message);    
        }
    }

    public function getDeleteContactUs($id)
    {
    	$affectedRows1 = ContactUs::where('id','=',$id)->delete();
        $response="Successfully delete one record.";
        return Redirect::to('contactuslist')->with('message',$response);
    }

    
}