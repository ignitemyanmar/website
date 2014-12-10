<?php

class StudentController extends BaseController
{
  	public function getRegisterStudent()
  	{
	    $user = User::all();
        return View::make('student.register',array('response'=>$user));
    }

    public function postRegisterStudent()
    {
        $user        = Input::get('user');
        $name 		 = Input::get('name');
		$name_mm 	 = Input::get('name_mm');
		$name_jp 	 = Input::get('name_jp');
		$email 		 = Input::get('email');
		$password 	 = Hash::make(Input::get('password'));
        $phone       = Input::get('phone');
        $gender      = Input::get('gender');
        $nationality = Input::get('nationality');
        $b_day       = Input::get('b_day');
        $b_month     = Input::get('b_month');
        $b_year      = Input::get('b_year');
        $gallery     = Input::get('gallery');
		$nrc 		 = Input::get('nrc');
        $checkexist  = Student::wherename($name)->whereuser_id($user)->whereemail($email)->first();
        if($checkexist)
        {
            $response='This student is already exit';
            return Redirect::to('studentlist')->with('message',$response);
        }
 
    	$student 			    =  new Student();
		$student->name 	        = $name;
		$student->name_mm 	    = $name_mm;
		$student->name_jp 	    = $name_jp;
		$student->email 	    = $email;
		$student->password      = $password;
        $student->phone         = $phone;
        $student->gender        = $gender;
        $student->nationality   = $nationality;
        $student->birth_day     = $b_day;
        $student->birth_month   = $b_month;
        $student->birth_year    = $b_year;
        $student->nrc_no        = $nrc;
        $student->user_id       = $user;
		$student->image 	    = $gallery[0];
		$result	= $student->save();

        $message="Successfully Register.";
    
    	return Redirect::to('studentlist')->with('message',$message);
    }

    public function showStudentList()
    {
    	$obj_student   = Student::paginate(12);
    	$response      = $obj_student;
    	$totalCount    = Student::count();

    	return View::make('student.list',array('response'=>$response,'totalCount'=>$totalCount));
    }

    public function getEditProfile($id)
    {
		  $objstudent = Student::find($id);
           if(count($objstudent) == 0)
           {
            return Redirect::to('studentlist');
           }
           $student['id']          = $id;
           $student['user_id']     = $objstudent->user_id;
           $student['name']        = $objstudent->name;
           $student['name_mm']     = $objstudent->name_mm;
           $student['name_jp']     = $objstudent->name_jp;
           $student['email']       = $objstudent->email;
           $student['phone']       = $objstudent->phone;
           $student['gender']      = $objstudent->gender;
           $student['nationality'] = $objstudent->nationality;
           $student['nrc_no']      = $objstudent->nrc_no;
           $student['birth_day']   = $objstudent->birth_day;
           $student['birth_month'] = $objstudent->birth_month;
           $student['birth_year']  = $objstudent->birth_year;
           $student['image']       = $objstudent->image;

           $user = User::all();

           $response['student'] = $student;
           $response['user']    = $user;

           // return Response::json($student);

        return View::make('student.edit',array('response'=>$response));

    }

    public function postUpdateProfile($id)
    {
        $user        = Input::get('user');
        $name        = Input::get('name');
        $name_mm     = Input::get('name_mm');
        $name_jp     = Input::get('name_jp');
        $email       = Input::get('email');
        $password    = Hash::make(Input::get('password'));
        $phone       = Input::get('phone');
        $gender      = Input::get('gender');
        $nationality = Input::get('nationality');
        $b_day       = Input::get('b_day');
        $b_month     = Input::get('b_month');
        $b_year      = Input::get('b_year');
        $gallery     = Input::get('gallery');
        // dd($phone);
        $nrc         = Input::get('nrc');
        $checkexist  = Student::whereid($id)
                            ->wherename($name)->whereemail($email)->first();
        // return Response::json($checkexist);
        if($checkexist)
        {
            $affectedRows1 = Student::where('id','=',$id)->update(array('name'=>$name,
                                                                        'name_mm' =>$name_mm,
						            								    'name_jp' =>$name_jp,
						                    						    'email'   =>$email,
												                        'user_id' =>$user ,
                                                                        'password'=>$password,
                                                                        'gender'=>$gender,
                                                                        'nationality'=>$nationality,
                                                                        'nrc_no'=>$nrc,
                                                                        'phone'=>$phone,
                                                                        'birth_day'=>$b_day,
                                                                        'birth_month'=>$b_month,
                                                                        'birth_year'=>$b_year,
												                        'password'=>$password,
                                                                        'image'=>$gallery[0]
                                                                        ));
                
            return Redirect::to('studentlist');
        }


        $checkstudent  = Student::whereuser_id($user)->wherename($name)->whereemail($email)->first();
        if($checkstudent)
        {
            $response ='This student is already exit';
            return Redirect::to('studentlist')->with('message',$response);
            // return Response::json($response);
        }
        $affectedRows = Student::where('id','=',$id)->update(array('name'=>$name,
                                                                   'name_mm' =>$name_mm,
                                                                    'name_jp' =>$name_jp,
                                                                    'email'   =>$email,
                                                                    'user_id' =>$user ,
                                                                    'password'=>$password,
                                                                    'gender'=>$gender,
                                                                    'nationality'=>$nationality,
                                                                    'nrc_no'=>$nrc,
                                                                    'phone'=>$phone,
                                                                    'birth_day'=>$b_day,
                                                                    'birth_month'=>$b_month,
                                                                    'birth_year'=>$b_year,
                                                                    'password'=>$password,
                                                                    'image'=>$gallery[0]
                                                                    ));
        // $message = "success."
        return Redirect::to('studentlist');
    }

    public function getDeleteStudent($id)
    {
    	$affectedRows1 = Student::where('id','=',$id)->delete();
        $response="Successfully delete one record.";
        return Redirect::to('studentlist')->with('message',$response);
    }

    public function postDeleteStudent($id)
    {
    	$totaldeleterecords = Input::get('recordstoDelete');
    	if(count($totaldeleterecords)==0)
    	{
    		return Redirect::to("/studentlist");
    	}
    	foreach($totaldeleterecords as $recid)
    	{
    		$result = Student::where('id','=',$recid)->delete();
    	}
    	return Redirect::to('studentlist');
    }

    public function postSearchStudent()
    {
		$keyword    = Input::get('keyword');
		$response   = $student = Student::where('name','LIKE','%'.$keyword.'%')
    							->orderBy('id','DESC')->paginate(10);
		$allstudent = Student::all();
		$totalCount = count($allstudent);
		return View::make('student.list')->with('student',$student)->with('totalCount',$totalCount)->with('response',$response);
    }
}