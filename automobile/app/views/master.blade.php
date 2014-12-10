<!DOCTYPE html>
    <html>
    <head>
      <?php $currentroute=Route::getCurrentRoute()->getPath();?>
      <meta property="og:image" content="../images/logo01.png"/>
      @if($currentroute=="buy-car/{type}/{id}/{make}/{model}")
        <?php $make=Input::get('make');$model=Input::get('model'); ?>
        @if(isset($car))
        <title>{{ $car->make. ' '. $car->model.' (' . $car->body .')' }}</title>
        @endif
        @if(Session::has('cardetail'))
          <?php $cardetail=Session::get('cardetail'); ?>
          <meta property="og:title" content="{{ $car->make. ' '. $car->model.' (' . $car->body .')' }}" />
          <meta property="og:site_name" content="Automobile Car Website"/>
          <meta property="og:description" content="{{$cardetail['description']}}" />
          <meta property="og:image" content="{{$cardetail['image']}}" />
        @endif
      @else
      <title>Automobile</title>
      @endif
      {{HTML::style('images/favicon.ico',array('rel'=>'icon','type'=>'image/ico'))}}
      {{HTML::style('css/foundation.min.css')}}
      {{HTML::style('src/select2.css')}}
      {{HTML::style('css/frontnav.css')}}
      {{HTML::style('css/lstyle.css')}}
      {{HTML::style('css/mstyle.css')}}
      {{HTML::style('css/sstyle.css')}}
      {{HTML::script('js/jquery.js')}}
      {{HTML::script('src/jquery-ui.js')}}
    </head>
    <body>
        <div id="title_frame" style="position:absolute; z-index:-1;">
          <div class="row">
            <div class="large-4 columns">&nbsp;</div>
            <div class="large-8 columns">
              &nbsp;
            </div>
          </div>
        </div>
        <div class="contentframe off-canvas-wrap">
          <div class="inner-wrap">
                <nav class="top-bar show-for-large-up top-bars" data-topbar> 
                    <ul class="title-area"> 
                      <li class="name">
                        <a href="/"><img src="../../../../images/AutoM.png"></a>
                      </li>
                      <br>
                    </ul> 
                    <section class="top-bar-section"> 
                      <div style="clear:both;min-height:5.2rem;z-index:-99;">&nbsp;</div>
                      <ul class="left"> 
                      <?php $currentroute=Route::getCurrentRoute()->getPath();
                        $currentroute=substr($currentroute,0,3);
                        $currentroute=substr($currentroute,0,3);
                        ?>
                        <li @if($currentroute =='/') class="active" @else  @endif> 
                          <a href="/">Home</a> 
                        </li>
                        <li @if($currentroute =='buy') class="has-dropdown active" @else class="has-dropdown"  @endif> 
                          <a href="/buy-car">ကားဝယ်ရန်</a> 
                          <ul class="dropdown"> 
                            <li>
                              <a href="/buy-car/coupe">
                              <span class="icon-arrow-right"></span>
                              Coupe</a>
                            </li> 
                            <li>
                              <a href="/buy-car/hatchback-and-stationwagon">
                                <span class="icon-arrow-right"></span>
                                Hatchback</a>
                            </li>
                            <li>
                              <a href="/buy-car/truck">
                                <span class="icon-arrow-right"></span>
                                Truck</a>
                            </li> 
                            <li>
                              <a href="/buy-car/sedan">
                              <span class="icon-arrow-right"></span>
                              Sedan</a>
                            </li> 
                            <li>
                              <a href="/buy-car/sports">
                              <span class="icon-arrow-right"></span>
                              Sports Type</a>
                            </li> 
                            <li>
                              <a href="/buy-car/suv">
                              <span class="icon-arrow-right"></span>
                              SUV</a>
                            </li> 
                            <li>
                              <a href="/buy-car/van">
                              <span class="icon-arrow-right"></span>
                              Van</a>
                            </li>
                            <li>
                              <a href="/buy-car/wagon">
                              <span class="icon-arrow-right"></span>
                              Wagon</a>
                            </li> 
                            <li>
                              <a href="/buy-car/others">
                              <span class="icon-arrow-right"></span>
                              Others</a>
                            </li>
                            <li>
                              <a href="/buy-cars/search-cars?categories=စလစ္မ်ား">
                              <span class="icon-arrow-right"></span>
                              စလစ်</a>
                            </li>   
                            <li>
                              <a href="/buy-cars/search-cars?categories=အပ္ႏွံရမည့္ ယာဥ္အုိယာဥ္ေဟာင္းမ်ား">
                              <span class="icon-arrow-right"></span>
                              အပ်နှံမည့်ကားများ</a>
                            </li> 
                            

                          </ul> 
                        </li> 
                        <li @if($currentroute=='sel') class="has-dropdown active" @else class="has-dropdown" @endif> 
                          <a href="/sell-car">ကားေရာင်းရန်</a> 
                          <ul class="dropdown">
                            <li>
                              <a href="/sell-car/add-new-vehicle">
                              <span class="icon-arrow-right"></span>
                              ကားသစ်တင်ရန်</a>
                            </li> 
                            <li>
                              <a href="/sell-car/my-vehicles">
                              <span class="icon-arrow-right"></span>
                              မိမိတင်ထားေသာကားများ</a>
                            </li>  
                            <li>
                              <a href="/sell-car/my-profile">
                              <span class="icon-arrow-right"></span>
                              မိမိအချက်အလက်များ</a>
                            </li>  
                          </ul> 
                        </li>
                        <li @if($currentroute=='art') class="has-dropdown active" @else class="has-dropdown" @endif> 
                          <a href="/articles">ကားအေြကာင်းသုံးသပ်ချက်များ</a> 
                          <ul class="dropdown">
                            <li>
                              <a href="/articles/japan-make-car">
                              <span class="icon-arrow-right"></span>
                              ဂျပန်နိုင်ငံထုတ်ကားများ</a>
                            </li> 
                            <li>
                              <a href="/articles/american-make-car">
                              <span class="icon-arrow-right"></span>
                              အေမရိကန်နိုင်ငံထုတ်ကားများ</a>
                            </li>  
                            <li>
                              <a href="/articles/germany-make-car">
                              <span class="icon-arrow-right"></span>
                              ဂျာမနီနိုင်ငံထုတ်ကားများ</a>
                            </li> 
                            <li>
                              <a href="/articles/england-make-car">
                              <span class="icon-arrow-right"></span>
                              အဂႅလန်နိုင်ငံထုတ်ကားများ</a>
                            </li> 
                            <li>
                              <a href="/articles/other-make-car">
                              <span class="icon-arrow-right"></span>
                              အြခားနိုင်ငံထုတ်ကားများ</a>
                            </li>  
                          </ul> 
                        </li>
                        <li @if($currentroute=='bus') class="has-dropdown active" @else class="has-dropdown" @endif> 
                          <a href="/business-guide">စီးပွားေရးလမ်းညွန်</a> 
                          <ul class="dropdown"> 
                            <li>
                              <a href="/business-guide/car-showrooms">
                              <span class="icon-arrow-right"></span>
                              Car Showrooms</a>
                            </li> 
                            <li>
                              <a href="/business-guide/car-accessory-shop">
                              <span class="icon-arrow-right"></span>
                              Car Accessories Shop</a>
                            </li> 
                            <li>
                              <a href="/business-guide/car-workshops">
                              <span class="icon-arrow-right"></span>
                              Car Workshops</a>
                            </li> 
                            <li>
                              <a href="/business-guide/car-decoration">
                              <span class="icon-arrow-right"></span>
                              Car Decoration</a>
                            </li> 
                            <li>
                              <a href="/business-guide/others">
                              <span class="icon-arrow-right"></span>
                              Others</a>
                            </li> 
                            
                          </ul> 
                        </li>
                        <li @if($currentroute=='new') class="has-dropdown active" @else class="has-dropdown" @endif>  
                          <a href="/news">သတင်းများ</a>
                          <ul class="dropdown">
                            <li>
                              <a href="/news/local-news">
                              <span class="icon-arrow-right"></span>
                              Local News</a>
                            </li> 
                            <li>
                              <a href="/news/international-news">
                              <span class="icon-arrow-right"></span>
                              International News</a>
                            </li>
                          </ul> 
                        </li>
                        <li @if($currentroute=='con') class="active" @endif> 
                          <a href="/contact-us">ဆက်သွယ်ရန်</a>
                        </li>
                      </ul> 
                    </section> 
                </nav>
                <!-- shown on only on a small screen. -->
                <nav class="tab-bar hide-for-large-up">
                  <a class="left-off-canvas-toggle menu-icon">
                    <div class="menubar-icon"></div>
                    <span></span>
                  </a>
                </nav>
                <aside class="contentframe-left-off-canvas-menu">
                  <ul class="off-canvas-list">
                    <!-- <li><label class="first menubar-icon">&nbsp;</label></li> -->
                    <li><a href="http://www.automobile.com.mm/">Home</a></li>
                  </ul>
                  <hr>
                  <ul class="off-canvas-list">
                    <li>
                      <label>
                        <a href="/buy-car">ကားဝယ္ရန္</a>
                      </label>
                    </li>
                    <hr>
                    <div class="site-links">
                      <ul class="top">
                        <!-- <li class="logo"><a href="http://example.com/"></a></li> -->
                        <li><a href="/buy-car/coupe">Coupe</a></li>
                        <li><a href="/buy-car/hatchback-and-stationwagon">Hatchback And Stationwagon</a></li>
                        <li><a href="/buy-car/seden">Seden</a></li>
                        <li><a href="/buy-car/sport">Sport</a></li>
                        <li><a href="/buy-car/suv">Suv</a></li>
                        <li><a href="/buy-car/van">Van</a></li>
                        <li><a href="/buy-car/wagon">Wagon</a></li>
                      </ul>
                    </div>

                    <li><label><a href="/sell-car">ကားေရာင္းရန္</a></label></li>
                    <hr>
                    <div class="site-links">
                      <ul class="top">
                        <!-- <li class="logo"><a href="http://example.com/"></a></li> -->
                        <li><a href="/sell-car/add-new-vehicle">ကားသစ္တင္ရန္</a></li>
                        <li><a href="/sell-car/my-vehicles">မိမိတင္ထားေသာကားမ်ား</a></li>
                        <li><a href="/sell-car/my-profile">My Profile</a></li>
                      </ul>
                    </div>
                    <li><a href="/articles">ကားအေၾကာင္းသုံးသပ္ခ်က္မ်ား</a></li>
                    <hr>
                    <div class="site-links">
                      <ul class="top">
                        <li><a href="/articles/japan-make-car" >ဂ်ပန္ႏုိင္ငံထုတ္ကားမ်ား</a></li>
                        <li><a href="/articles/american-make-car" >အေမရိကန္ႏုိင္ငံထုတ္ကားမ်ား</a></li>
                        <li>
                          <a href="/articles/germany-make-car">ဂ်ာမဏီႏုိင္ငံထုတ္ကားမ်ား</a>
                        </li>
                        <li><a href="/articles/england-make-car" >အဂၤလန္ႏုိင္ငံထုတ္ကားမ်ား</a></li>
                        <li><a href="/articles/other-make-car">အျခားႏုိင္ငံထုတ္ကားမ်ား</a></li>
                      </ul>
                    </div>

                    <li><a href="/business-guide">စီးပြားေရးလမ္းညြန္</a></li>
                    <hr>
                    <div class="site-links">
                      <ul class="top">
                        <li><a href="/business-guide/car-showrooms" >Car Showrooms</a></li>
                        <li><a href="/business-guide/car-accessory-shop" >Car accessory Shop</a></li>
                        <li><a href="/business-guide/car-workshops" >Car Workshop</a></li>
                        <li><a href="/business-guide/car-decoration" >Car Decoration</a></li>
                      </ul>
                    </div>

                    <li><a href="/news">သတင္းမ်ား</a></li>
                    <hr>
                    <div class="site-links">
                      <ul class="top">
                        <li><a href="/news/local-news" >Local News</a></li>
                        <li><a href="/news/international-news" >International News</a></li>
                      </ul>
                    </div>
                    <hr>
                    <li><a href="/contact-us">ဆက္သြယ္ရန္</a></li>
                    <hr>
                  </ul>
                </aside>
                <a class="exit-off-canvas" href="#"></a>
              <!--End shown menu on only on a small screen. -->

              <section class="main-section"> 
                <div style="clear:both;min-height:6px;"></div>
                <div class="row content-frame">
                  @include('home.left')

                  @yield('content')
                  
                </div>

              </section> 
             

          </div>
        </div>



      <!-- footer  -->
      <!-- <div class="large-12 columns footer"> -->
            <div class="large12 footer">
              <div class="row">
                <div class="large-5 columns">
                  <br><img src="../../../../images/AutoMobileFooter.png">
                  <a href="http://www.ignitemyanmar.com" class="ayar-wagaung" target="_blank">Powered  By Ignite Software Solution</a>
                </div>
                <div class="large-7 columns group">
                  <div class="links right ayar-wagaung" style="padding-top:1.6rem;">
                  @if(Session::has('contact'))
                    <?php  $contact=Session::get('contact'); ?>
                    <span class="phone">
                      <a class="phone" href="#">{{$contact->phone}}</a> 
                      <a class="enquiry" title="Send Enquiry" href="#">{{$contact->email}}</a>
                    </span>  
                  </div>
                  @endif

                </div>
              </div>
            </div>
      <!-- </div> -->
      {{HTML::script('../../js/foundation.min.js')}}
      {{HTML::script('src/select2.min.js')}}
      {{HTML::script('js/responsiveslides.min.js')}}
      {{HTML::script('js/compare.js')}}

    <script type="text/javascript">
        $(document).foundation();   
    </script>
    <script type="text/javascript">
      var __lc = {};
      __lc.license = 4596371;

      (function() {
        var lc = document.createElement('script'); lc.type = 'text/javascript'; lc.async = true;
        lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(lc, s);
      })();
    </script>
        
    </body>
    </html>