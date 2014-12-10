@extends('../master')
@section('content')
<div class="large-9 columns">
	<div class="row" style="padding:6px 5px;">
	  <div class="content-title">
      <span class="icon-logo"></span>
        Forgot Password
      <span class="bottom-line"></span>
    </div>
    <div class="large-12 columns list-frame">
        @if(Session::has('message'))<div><p style="color:red; padding .5rem 1rem;margin-left:1rem;"> * {{Session::get('message')}}</p></div>
        @endif
        <form action="/forgotpassword" method="post" class="addnew-form custom">
          <form action="/resetpassword" method="post">
                               <label>Password</label> <input type="password" name='password' required>
                               <input type="hidden" name='randomno' value="{{$randomno}}">
                                <input type="submit" name="submit" value="Submit" class="button smalllogin round">
                            </form>
          <div class="row">
            <div class="large-2 columns" ><br>
              <label for="title">Password</label>
            </div>
            <div class="large-4 columns"><br>
                <input type="hidden" name='email' value="{{$email}}">
                <input type="text" name="email" required>
            </div>
            <div class="large-6 columns" ><br>
              &nbsp;
            </div>
          </div>
          <div class="row">
            <div class="large-3 small-2 columns" ><br>
              &nbsp;
            </div>
            <div class="large-3 small-3 columns"><br>
                <input type="submit" value="Forgot Password" id='register' class="btn search btn-primary round">
            </div>
            <div class="large-6 small-6 columns" ><br>
              &nbsp;
            </div>
          </div>
          
          
        </form>
	  </div>
  </div>        
</div>
@stop
