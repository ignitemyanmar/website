<?php

class UserController extends BaseController {

  /*
  |--------------------------------------------------------------------------
  | Default User Controller
  |--------------------------------------------------------------------------
  |
  | You may wish to use controllers instead of, or in addition to, Closure
  | based routes. That's great! Here is an example controller method to
  | get you started. To route to this controller, just add the route:
  |
  | Route::get('/', 'UserCusController@createuser');
  |
  */
  public function getloadfacebook(){
      // Bundle::start('facebook-sdk'); // start the bundle
        $facebook = new Facebook(array(
        'appId' => '572699629418497',
        'secret' => '80d93406274b0acfd1b5aac3a6f492d2',
        'cookie'=>'false',
        
        )); // facebook config (Add security key and App id)
        $facebook->destroySession();  // To Remove Old Session
      $token = $facebook->getAccessToken();
      
      $params = array(
        'scope' => 'email,user_birthday',
          'redirect_uri' => 'http://www.mmjunction.com/users/facebook'
      );
      $loginUrl = $facebook->getLoginUrl($params);
      echo '<script>top.location="'.$loginUrl.'";</script>';
  }

  public function getfacebook(){     
      // Bundle::start('facebook-sdk'); // start the bundle
        $facebook = new Facebook(array(
        'appId' => '572699629418497',
        'secret' => '80d93406274b0acfd1b5aac3a6f492d2',
        'cookie'=>'false',
      
        )); // facebook config (Add security key and App id)
        $facebook->destroySession();  // To Remove Old Session
      $token = $facebook->getAccessToken();
      

      $session = $facebook->getUser(); // To get Facebook user data 
      
      //dd($token);
      $me = null;

      //dd($session); 
      if($session) {
        
        try {
            //grab facebook data
            $me = $facebook->api(array('method' =>
            'fql.query', 'query' => "SELECT first_name,email,pic_square,last_name,uid,sex,birthday_date FROM user
            WHERE uid = me()" )); 
            //dd($me);
            // Retrieve User information for mm junction db

            $year = substr($me[0]['birthday_date'], -4); 
            $day = substr($me[0]['birthday_date'], -7, 2);
            $month = substr($me[0]['birthday_date'], -10, 2);
            $dob = $year.'-'.$month.'-'.$day;
            if($me[0]['sex'] == 'male'){
              $sex = 0;
            }else if($me[0]['sex'] == 'female'){
              $sex = 1;
            }
            else{
              $sex = 2;
            }
            $password = $me[0]['uid'];      
            $user = User::whereOuid($me[0]['uid'])->first();
            
            if($user == null){
              // Create new user if it is firsttime
              $objuser=new User();
              $objuser->name=$me[0]['first_name'] .' ' . $me[0]['last_name'];
              $objuser->email=$me[0]['email'];
              $objuser->Ouid=$me[0]['uid'];
              $objuser->Photo=$me[0]['pic_square'];
              $objuser->Gender=$sex;
              $objuser->DOB=$dob;
              $objuser->password=Hash::make($password);
              $objuser->save();

              /*User::create(array(
                'Name'=>$me[0]['first_name'] .' ' . $me[0]['last_name'],
                
                'Email'=>$me[0]['email'],
                'Ouid'=>$me[0]['uid'],
                'Photo'=>$me[0]['pic_square'],
                'Gender'=>$sex,
                'DOB'=>$dob,
                'Password'=>Hash::make($password)
                ));*/


            }else{
              // update user information if user is already exist
                          
              $user->name=$me[0]['first_name'] . ' '. $me[0]['last_name'];;
              $user->password = Hash::make($password);
              $user->email=$me[0]['email'];
              $user->Ouid=$me[0]['uid'];
              $user->Photo=$me[0]['pic_square'];
              $user->Gender=$sex;
              $user->DOB = $dob;
              $user->save();
            }
            
            $user = array(
              'email' => $me[0]['email'],
              'password' => $password
            );
            //dd($user);
          
            /* login in */
          
            if(Auth::attempt($user)){     
              return Redirect::to('/');
            }else{
              return Redirect::to('/');
            }
            
        } 
        catch (FacebookApiException $e) { 

        }
        
      }// close if (session)    

      if(!($session)){
        echo '<script>
          top.location.href="'.$facebook->getLoginUrl
          (array('req_perms' => 'publish_stream',
            'next' => 'http://apps.facebook.com/mmjunction/',)).'";
          </script>';
          exit;

      }
      
      
      /*
          $me = $facebook->api('/me');
          
          $pages = $facebook->api(array('method' => 'fql.query', 
            'query' => 'SELECT pic_square, uid, first_name, last_name FROM user
            WHERE uid IN (SELECT uid2 FROM friend WHERE uid1 = me())
            AND is_app_user = 1'));
      
          dd($pages);
      
          return View::make('home.index')
            ->with('title','Welcome to MM Junction')
            ->with('pages',$pages);

          */

              
        return Redirect::to('/');
          
        
  }
  
  public function getRegister(){
    return View::make('home.register');
  }

  public function postRegister(){
    $user=new User();
    $user->first_name=Input::get('firstname');
    $user->last_name=Input::get('lastname');
    $username=$user->name=Input::get('firstname').' '. Input::get('lastname');
    $user->email=Input::get('email');
    $user->password=Hash::make(Input::get('password'));
    $user->usertype="Registered";
    $user->role=0;
    $user->save();
    $userid=User::max('id');
    $dealer=new Dealer();
    $dealer->userid=$userid;
    $dealer->name=Input::get('dealername');
    $dealer->companyname=Input::get('companyname');
    $dealer->website=Input::get('website');
    $dealer->phone=Input::get('phone');
    $dealer->fax=Input::get('fax');
    $dealer->address=Input::get('address');
    $dealer->city=Input::get('city');
    $dealer->country=Input::get('country');
    $dealer->description=Input::get('otherinfo');
    $file=Input::file( 'image_file' );
      $FinalFilename="";
      if($file !=null){
          $OriginalFilename= $file->getClientOriginalName();
          $FinalFilename=$OriginalFilename ;
          // rename file if it already exists by prefixing an incrementing number
          $FileCounter = 1;
          $filename = pathinfo($OriginalFilename, PATHINFO_FILENAME);
          $extension =  pathinfo($OriginalFilename, PATHINFO_EXTENSION);
          while (file_exists( 'businesslogo/php/files/'.$FinalFilename ))
              $FinalFilename = $filename . '_' . $FileCounter++ . '.' . $extension;
          
          $destinationPath = 'businesslogo/php/files/';
          Input::file('image_file')->move($destinationPath, $FinalFilename);
      }

    $dealer->logo=$FinalFilename;
    $dealer->zipcode=Input::get('zipcode');
    $dealer->save();
    $loginuser = array(
                  'name' => $username,
                  'password' => Input::get('password')
              );
              
        if (Auth::attempt($loginuser)) {
            return Redirect::to('/sell-car/my-vehicles');
        }
    return Redirect::to('/demo');

  }

  public function postProfileupdate($id){
    $user=User::find($id);
    $user->first_name=Input::get('firstname');
    $user->last_name=Input::get('lastname');
    $username=$user->name=Input::get('firstname').' '. Input::get('lastname');
    $user->email=Input::get('email');
    $user->usertype="Registered";
    $user->role=0;
    $user->save();
    $dealer=Dealer::whereuserid($id)->first();
    $dealer->userid=$id;
    $dealer->name=Input::get('dealername');
    $dealer->companyname=Input::get('companyname');
    $dealer->website=Input::get('website');
    $dealer->phone=Input::get('phone');
    $dealer->fax=Input::get('fax');
    $dealer->address=Input::get('address');
    $dealer->city=Input::get('city');
    $dealer->country=Input::get('country');
    $dealer->description=Input::get('otherinfo');
    $file=Input::file( 'image_file' );
    $oldfile=Input::get( 'hdphoto' );

      $FinalFilename="";
      if($file !=null){
          $OriginalFilename= $file->getClientOriginalName();
          $FinalFilename=$OriginalFilename ;
          // rename file if it already exists by prefixing an incrementing number
          $FileCounter = 1;
          $filename = pathinfo($OriginalFilename, PATHINFO_FILENAME);
          $extension =  pathinfo($OriginalFilename, PATHINFO_EXTENSION);
          while (file_exists( 'businesslogo/php/files/'.$FinalFilename ))
              $FinalFilename = $filename . '_' . $FileCounter++ . '.' . $extension;
          
          $destinationPath = 'businesslogo/php/files/';
          Input::file('image_file')->move($destinationPath, $FinalFilename);
      }
    if($file==''){
      $FinalFilename=$oldfile;
    }


    $dealer->logo=$FinalFilename;
    $dealer->zipcode=Input::get('zipcode');
    $dealer->save();
      return Redirect::to('/sell-car/my-vehicles');
  }

  public function postfrontLogin(){
      $user = array(
                  'email' => Input::get('name'),
                  'password' => Input::get('password')
              );
              
        if (Auth::attempt($user)) {
            return Redirect::to('/sell-car/my-profile');
        }
              
      // authentication failure! lets go back to the login page
      return Redirect::to('/demo#login')
          ->with('flash_error', 'Your username/password combination was incorrect.')
          ->withInput();

    }

    public function getfrontLogout(){
        Auth::logout();
              return Redirect::to('/demo');
    }

    public function adduser()
      {
        if(Auth::user()->role!=8){
              return Redirect::to("userlist");
        }
        return View::make('user.add');
      }

  
    /**
     * Stores new user
     *
    */
    public function addnewuser()
    {
        $user=new User();
        $user->first_name = Input::get( 'firstname' );
        $user->last_name = Input::get( 'lastname' );
        $user->email = Input::get( 'email' );
        $user->password = Hash::make(Input::get('password'));
        $user->role = Input::get('role');
        $user->save();
        return Redirect::route('listuser');
    }
   
    public function toedituser($id)
    {
                
        return \View::make('user.edit')->with('user',User::find($id));
    }

    public function edituser($id)
    {
       $affectedRows = User::where('id', '=', $id)->update(array(
                    'first_name'=>Input::get('firstname'),
                    'last_name'=>Input::get('lastname'),
                    'email'=>Input::get('email'),
                    'role'=>Input::get('role'),
                    'password'=>Hash::make(Input::get('password'))                    
                    ));
       return Redirect::to('userlist');
    }
 
    public function deluser($id)
    {           
           
            $affectedRows1 = User::where('id', '=', $id)->delete();
            return Redirect::to('userlist');
      }

      public function listuser()
    {
       $users= User::orderBy('created_at', 'DESC')->paginate(10);
        return \View::make('user.list')->with('users', $users);
    }


    public function getLogin()
    {
      return View::make('admin.login');
    }

    public function postLogin(){
      $user = array(
              'email' => Input::get('username'),
              'password' => Input::get('password')
          );
          
          if (Auth::attempt($user)) {
              return Redirect::to('/userlist')
                  ->with('flash_notice', 'You are successfully logged in.');
          }
          
          // authentication failure! lets go back to the login page
          return Redirect::to('imeauto')
              ->with('flash_error', 'Your username/password combination was incorrect.')
              ->withInput();
    }

    public function getLogout(){
      Auth::logout();

          return Redirect::route('imeauto')
              ->with('flash_notice', 'You are successfully logged out.');
    }

    public function filterauth(){
        if (Auth::guest())
                      return Redirect::to('imeauto')
                              ->with('flash_error', 'You must be logged in to view this page!');

    }

    public function filterguest(){
      if (Auth::check()) 
                  return Redirect::to('/userlist')
                          ->with('flash_notice', 'You are already logged in!');

    }

      public function getforgotpassword(){
      return View::make('admin/forgot');
    }

    public function postforgotpassword(){
      $email=Input::get('email');
      $user=User::whereemail($email)->first();
      if($user){
        $randomno= rand(10000000000,9);
        $user->password=$randomno;
        $user->update();
        $fromAddr ='modamyanmar@gmail.com';
        $name=$user->name;
        $recipientAddr = $email;
        $subjectStr ="Reset password";
        $bodytext="Hi ". $name;

        $bodytext .="<br>To recover your sign-in for admin panel, click <a href='http://moda.com.mm/resetpassword/".$email."/".$randomno."'> follow this link.</a>";
        // $bodytext .="<br>To recover your sign-in for admin panel, click <a href='http://moda.com.mm/resetpassword/".$email."'> follow this link.</a>";
        $footer="";
    $mailBodyText = <<<HHHHHHHHHHHHHH
                <html>
                <head>
                <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
                <title>Moda Fashion Magazine</title> 
                </head>
                <body>
                <table width="100%" border="0" align="left" bgcolor="#eeffee">
                <tr><td colspan="2" bgcolor="#000" height="40px" valign="baseline" align="center"><b style="font-family:Georgia, 'Times New Roman', Times, serif; font-size:24px; color:#fff;">$subjectStr</b></td></tr>
                <tr>
                <td height="30px" colspan="2">&nbsp;</td>
                </tr>
                <tr style="margin-left:40px;">
                <td colspan="2" width="80%"><p  style="padding:8px; color:#777777; border:1px solid #eee;margin:5px 30px 50px; font-family:Georgia, 'Times New Roman', Times, serif; min-height:180px;">$bodytext</p></td>
                </tr>
                <tr>
                <td colspan="2"></td>
                </tr>
                <tr>
                <td colspan="2" height="30px" style="background:#074E68; font-family:Cambria" align="center"><a href="http://www.moda.com.mm" style="color:#eee;">Moda Fashion Magazine</a></td>
                </tr>
                </table>
                </body>
                </html>
HHHHHHHHHHHHHH;

//$headers= <<<TTTTTTTTTTTT
//From: $fromAddr
//MIME-Version: 1.0
//Content-Type: text/html;
//TTTTTTTTTTTT;

$headers = "From: ".$fromAddr."\r\n";  
$headers .= "Reply-To: ".$fromAddr."\r\n";  
$headers .= "Return-Path: ".$fromAddr."\r\n";   
$headers .= "Content-type: text/html\r\n"; 
mail("$recipientAddr","$subjectStr" ,"$mailBodyText","$headers");
    return Redirect::to('/imeauto')
                  ->with('flash_error', 'Please check your email for code.');

      }else{
        return Redirect::to('forgotpassword')->with('flash_error', 'There is no email in user list.');
        // return View::make('admin/forgot')->with('flash_error', 'There is no email in user list.');
      }
  }

  public function getresetpassword($email, $randno){
    return View::make('admin.resetpassword')->with('email', $email)->with('randomno',$randno);
  } 

  public function postresetpassword(){
    $email=Input::get('email');
    $password=Input::get('password');
    $randomno=Input::get('randomno');
    if($email){
      $user=User::whereemail($email)->where('password','=',$randomno)->first();
      if($user){
        $user->password=Hash::make($password);
        $user->update();
        return Redirect::to('imeauto')->with('flash_error', "Password successfully changed.");
      }else{
        return Redirect::to('imeauto')->with('flash_error', "You cann't be reset password.");
      }
    }else{
        return Redirect::to('imeauto')->with('flash_error', "You cann't be reset password.");
      
    }
  }

  

}