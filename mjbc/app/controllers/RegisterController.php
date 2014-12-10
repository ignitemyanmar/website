<?php

class RegisterController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex($id,$name)
	{
		$course['id']=$id;
		$course['name']=$name;
		return View::make('register.index', array('course'=>$course));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function store()
	{
		$course_id=Input::get('course_id');
		$course   =Input::get('course');
		$name=Input::get('name');
		$email=Input::get('email');
		$password=Input::get('password');
		$phone=Input::get('phone');
		$gender=Input::get('gender');
		$company_name=Input::get('company_name');
		$department=Input::get('department');
		$address=Input::get('address');
		$nationality=Input::get('nationality');

		$checkemail=User::whereemail($email)->wherecourse_id($course_id)->first();
		if($checkemail){
			return Redirect::to("/user/register/$course_id/$course")->with('message',"This email is already used.");
		}

		$objuser=new User();
		$objuser->course_id=$course_id;
		$objuser->name=$name;
		$objuser->email=$email;
		// $objuser->password=Hash::make($password);
		$objuser->phone=$phone;
		$objuser->gender=$gender;
		$objuser->address=$address;
		$objuser->company_name=$company_name;
		$objuser->department=$department;
		$objuser->nationality=$nationality;
		$objuser->role=2;
		$objuser->save();
		return Redirect::to('/');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function login()
	{
		$user =array(
                'email'=>Input::get('email'),
                'password'=>Input::get('password')
                );
        if(Auth::attempt($user))
        {
            return Redirect::to('/type/en/seminar');
        }
        return Redirect::to('/')->with('message',"Email and password don't match.");
	}

	public function enrolllist(){
		$response=User::where('course_id','!=',0)->with(array('seminar'))->orderBy('id','desc')->get();
		/*if($response){
			foreach ($response as $row) {
					$response['course']=Seminar::whereid($row->course_id)->pluck('name');
			}
		}*/
		return View::make('register.enroll', array('response'=>$response));
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
