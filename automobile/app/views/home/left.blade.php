<?php 
    $leftadvertisement=Advertisement::whereposition('left-advertisement')->orderBy('id','desc')->limit(4)->get();
    $contact=ContactUs::first();
    Session::put('contact', $contact);
    $latest_news=News::orderBy('id','desc')->limit(5)->get();
      if(count($latest_news)>0){
        $j=0;
        foreach ($latest_news as $row) {
          $latest_news[$j]=$row;
          $latest_news[$j]['category']=ArticleCategory::whereid($row->categoryid)->pluck('category');
          $j++;
        }
      }
?>
<div class="large-3 columns advertisement">
  <div class="row">
    <div class="large-12 columns  nopadding">
      <p class="title latest-label">ေနာက်ဆုံးရသတင်းများ</p>
      @if(count($latest_news)>0)
        @foreach($latest_news as $rows)
          <div class="latestnews">
            <a href="/news/{{str_replace(' ', '-', $rows->type)}}/{{str_replace(' ', '-', $rows->name)}}">{{$rows->name}}</a>
          </div>
        @endforeach
      @endif
    </div>
  </div>
  <div class="clearfix">&nbsp;</div>
  @if(isset($leftadvertisement))
    @foreach($leftadvertisement as $leftadver)
      <div class="row">
        <div class="large-12 columns nopadding text-center">
          @if($leftadver->weblink)
            <a href="http://{{$leftadver->weblink}}" target="_blank"><img src="../../../../advertisementphoto/php/files/{{$leftadver->image}}" width="100%"></a>
          @else
            <img src="../../../../advertisementphoto/php/files/{{$leftadver->image}}" width="100%">
          @endif
        </div>
      </div>
      <div class="clearfix">&nbsp;</div>
    @endforeach
  @endif
  <div class="row">
    <div class="large-12 columns nopadding">
      <p class="title">ဤေနရာတွင်<br>ေြကြငာလုိပါကဆက်သွယ်ရန်</p>
      <div class="list-frame ayar-wagaung adv_panel">
        @if($contact)
        အီးေမးလ်: {{$contact->email}}<br>
        ဖုန်း : {{$contact->phone}}
        @endif
      </div>
    </div>
  </div>
      <div class="clearfix">&nbsp;</div>

  <div class="row">
    <div class="large-12 columns nopadding">
      <p class="title sm_btn">Saved Vehicles</p>
      <div id="savevehicle" class="list-frame login_panel">
         @include('ajax.savevehicle', array('carinfo'=>Cart::content()))
        <div class="clearfix"></div>
      </div>
      <div>
      </div>

    </div>
  </div>
      <div class="clearfix">&nbsp;</div>

  <div class="row">
    <div class="large-12 columns nopadding">
      <p class="title sm_btn">Application Download</p>
      <div id="savevehicle" class="list-frame login_panel">
        <br>
         <a href="../../../download/android/Automobile.apk" class="ayar-wagaung" style="font-size:15px;"><img src="../../../img/automobile_icon.png" style="width: 28px;margin-right: .5rem;margin-top: -4px;">Automobile Android Application</a>
         <div class="clear">&nbsp;</div><br>
         <a href="#" class="ayar-wagaung" style="font-size:15px;"><img src="../../../img/play28.png" style="width: 22px;margin-right: .75rem;margin-top: -4px;">Download at Play Store</a>
        <div class="clearfix"></div>
      </div>
      <div>
      </div>

    </div>
  </div>
      <div class="clearfix">&nbsp;</div>

  <div class="row">
    @if(Auth::check())
      <div class="large-12 columns nopadding">
        <p class="title sm_btn">Login</p>
          <div class="login_panel">
            <p class="list-frame">Hi <span>{{ Auth::user()->first_name.' '.Auth::user()->last_name }}.</span></p>
            <a href="/login-register/user-logout"><input type="button" name='login' class="btn search btn-primary ayar-wagaung" value="Logout"></a>
            <div class="clear"></div>
          </div><br>
      </div>
    @else
    <div class="large-12 columns nopadding">
      <p class="title sm_btn">Login</p>
      <form action="/login-register/user-login" class="login list-frame login_panel" id='login' method="post">
        @if (Session::has('flash_error'))
            <div id="flash_error">{{ Session::get('flash_error') }}</div>
        @endif
        <label>User Name (Email)</label>
        <input type="text" name='name' placeholder="eg. name@domain.com">
        <label>Password</label>
        <input type="password" name='password' placeholder="eg. .........">
        <input type="submit" name='login' class="btn search btn-primary ayar-wagaung left" value="Login">
        <div class="clearfix">&nbsp;</div>
        <ul class="nav nav-pills nav-stacked">
            <li>
                <a href="#" class="ayar-wagaung">
                <i class="icons-lock"></i> Forgot your password?</a>
            </li>
           
        </ul>
      </form>
    </div>

    <div class="large-12 columns nopadding">
      <p class="title sm_btn">Register</p>
      <div class="login_panel">
        <ul class="nav nav-pills nav-stacked">
            <li>
                <a href="/users/register" class="ayar-wagaung">
                <i class="icons-lock"></i>Create Account</a>
            </li>
           
        </ul>
      </div>
      
    </div>
    <div class="clear">&nbsp;</div><br>

    @endif

  </div>
</div>
