<?php

class UserController extends BaseController
{
  	public function getAddUser()
  	{
	    return View::make('user.add');
    }

    public function postAddUser()
    {
        $name 		= Input::get('name');
		$name_mm 	= Input::get('name_mm');
		$name_jp 	= Input::get('name_jp');
		$email 		= Input::get('email');
		$password 	= Hash::make(Input::get('password'));
		$role 		= Input::get('role');
        // dd($name);
        $checkuser  = User::wherename($name)->whereemail($email)->first();
        if($checkuser)
        {
            $response='This record is already exit';
            // return Response::json($response);
            return Redirect::to('userlist')->with('message',$response);
        }
 
    	$user 			= new User();
		$user->name 	= $name;
		$user->name_mm 	= $name_mm;
		$user->name_jp 	= $name_jp;
		$user->email 	= $email;
		$user->password = $password;
		$user->role 	= $role;
		$result			= $user->save();

        $message="success.";
    
    	return Redirect::to('userlist')->with('message',$message);
    }

    public function showUserList()
    {
    	$obj_user   = User::groupBy('email')->orderBy('id','desc')->paginate(12);
    	$response   = $obj_user;
    	$totalCount = User::count();

    	return View::make('user.list',array('response'=>$response,'totalCount'=>$totalCount));
    }

    public function getEditUser($id)
    {
		return View::make('user.edit')->with('user',User::find($id));
    }

    public function postEditUser($id)
    {
        $name 		= Input::get('name');
		$name_mm 	= Input::get('name_mm');
		$name_jp 	= Input::get('name_jp');
		$email 		= Input::get('email');
		$password 	= Hash::make(Input::get('password'));
		$role 		= Input::get('role');
        
        $checksamewithother  = User::where('id','!=',$id)->wherename($name)->first();
        if($checksamewithother)
        {
            $response ='This record is already exit';
            return Redirect::to('userlist')->with('message',$response);
        }

        $toupdate   = User::whereid($id)->find($id);
        if($toupdate)
        {
            $affectedRows1 = User::where('id','=',$id)->update(array('name'=>$name,
                                                                    'name_mm' =>$name_mm,
                                                                    'name_jp' =>$name_jp,
                                                                    'email'   =>$email,
                                                                    'role'    =>$role ,
                                                                    'password'=>$password));
            $message = "success.";
            return Redirect::to('userlist')->with('message',$message);    
        }
    }

    public function getDeleteUser($id)
    {
        $affectedRows1 = User::where('id','=',$id)->delete();
    	$todeletestudent = Student::where('user_id','=',$id)->delete();
        $response="Successfully delete one record.";
        return Redirect::to('userlist')->with('message',$response);
    }

    public function getLogin()
    {
      return View::make('admin.login');
    }

    public function postLogin()
    {
          $user =array(
                'email'=>Input::get('username'),
                'password'=>Input::get('password')
                );
            if(Auth::attempt($user))
            {
                return '/seminarlist';
            }
            return '/admin';
    }

    public function getLogout()
    {
        Auth::logout();

        return Redirect::route('admin')
            ->with('flash_notice','You are successfully logged out.');
    }

}