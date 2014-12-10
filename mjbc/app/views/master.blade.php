 <?php 
    $cur_route=Request::url();
    $language=Session::has('language') ? Session::get('language') : 'english';
    $activemm = $activeeng= $activejp= '';
    if($language=="myanmar"){
      $activemm='active';
      $search='ရွာရန္';
      $menu_language=array('ပင္မစာမ်က္ႏွာ','ေဆြးေႏြးပြဲမ်ား', 'အတုိင္ပင္ခံလုပ္ငန္း','စီမံခန္႕ခြဲေရး','သတင္းႏွင့္ပြဲမ်ား','မၾကာခဏ ေမးခြန္းမ်ား','MJBC အေၾကာင္း','ဆက္သြယ္ရန္');

    }
    elseif($language=="english"){
      $activeeng='active';
      $search='Search';
      $menu_language=array('Home','Seminar', 'Consultancy','Executive Search','News/Events','FAQ','About Us','Contact Us');
    }
    else{
      $activejp="active";
      $search='検索';
      $menu_language=array('ホーム','セミナー', 'コンサルタント業','エグゼクティブサーチ','ニュース/イベント','よくある質問','私達について','お問い合わせ');
    }

?>
<!DOCTYPE html>
    <html>
    <head>
      <?php $currentroute=Route::getCurrentRoute()->getPath();?>
      <title>MJBC Website</title>
      {{HTML::style('images/favicon.ico',array('rel'=>'icon','type'=>'image/ico'))}}
      {{HTML::style('../../css/ticker/ticker-styleb3e8.css?ver=0.1')}}
      {{HTML::style('css/foundation.min.css')}}
      {{HTML::style('css/font.css')}}
      {{HTML::style('css/frontnav.css')}}
      {{HTML::style('css/lstyle.css')}}
      {{HTML::style('css/mstyle.css')}}
      {{HTML::style('css/sstyle.css')}}
      {{HTML::style('css/style.css')}}

      {{HTML::script('js/jquery.js')}}
      @if($language=='myanmar')
        <style type="text/css">
          .side-nav li a{margin-top: -5px}
        </style>
      @endif
    </head>
    <body>
        <div id="title_frame" style="position:absolute; padding-top:2.1rem;">
          
          <input type="hidden" value="{{$cur_route}}" id="route">

          <div class="row padding_4">
            <div class="large-3 columns">&nbsp;</div>
            <div class="large-5 columns site-desc">
              <h4 style="font-size:19px;font-weight:300;">
              <?php $zawgyi=""; ?>
              @if($language=="english")
                Meaning of the Constitution,<br>  Nature, Scope and Sources,
              @elseif($language=='japan')
                憲法の意味<br>
                自然、スコープとソース、
              @else
                <?php $zawgyi="zg"; ?>
                Meaning of the Constitution,<br>  Nature, Scope and Sources,
              @endif
              </h4>
            </div>
            <div class="large-4 columns nopadding" style="padding-top:2.1rem;">
              <div class="right language">
                <a href="#" id="myanmar"><img src="../../../../../img/myanmar.png" class='language {{$activemm}}' data-value="myanmar"></a>
                <a href="#" id="japan"><img src="../../../../../img/japan.png" class='language {{$activejp}}' data-value="japan"></a>
                <a href="#" id="english"><img src="../../../../../img/uk.png" class='language {{$activeeng}}' data-value="english"></a>
              </div>
              <div class="row">
                <form action="/search">
                <div class="large-8 columns nopadding">
                  <input type="text" name="search" placeholder="{{$search}}" style="margin-right:20px;float:right;border-radius: 8px;">
                </div>
                <div class="large-3 columns">
                  <input type="submit" class="button search" value="{{$search}}">
                </div>
                <div class="large-1 columns nopadding">&nbsp;</div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="contentframe off-canvas-wrap">
          <div class="inner-wrap">
                <br>
                <nav class="top-bar show-for-large-up top-bars" data-topbar> 
                    <ul class="title-area row padding_4" style="margin-left:0;"> 
                      <li class="name large-4 columns nopadding">
                        <a href="/"><img src="../../../../images/favicon.png"></a>
                      </li>
                    </ul> 
                    <section class="top-bar-section padding_4"> 
                      <div style="clear:both;min-height:5.2rem;z-index:-99;">&nbsp;</div>
                      <ul class="left"> 
                      <?php $currentroute=Route::getCurrentRoute()->getPath();
                        $currentroute=substr($currentroute,0,3);
                        $currentroute=substr($currentroute,0,3);
                        ?>
                        <li @if($currentroute =='/') class="active" @else  @endif> 
                          <a href="/" class="{{$zawgyi}}">{{$menu_language[0]}}</a> 
                        </li>
                        <li @if($currentroute =='sem') class="active" @else class=""  @endif> 
                          <a href="/type/en/seminar" class="{{$zawgyi}}">{{$menu_language[1]}}</a> 
                        </li> 
                        <li @if($currentroute=='con') class="active" @else class="" @endif> 
                          <a href="/type/en/consultancy" class="{{$zawgyi}}">{{$menu_language[2]}}</a> 
                        </li>
                        <li @if($currentroute=='art') class="active" @else class="" @endif> 
                          <a href="/type/en/executivesearch" class="{{$zawgyi}}">{{$menu_language[3]}}</a> 
                        </li>
                        <li @if($currentroute=='new') class="active" @else class="" @endif> 
                          <!-- <a href="/type/en/news-event">{{$menu_language[4]}}</a>  -->
                          <a href="/news&events" class="{{$zawgyi}}">{{$menu_language[4]}}</a> 
                        </li>
                        <li @if($currentroute=='faq') class="active" @else class="" @endif>  
                          <a href="/en/faq" class="{{$zawgyi}}">{{$menu_language[5]}}</a>
                        </li>
                        <li @if($currentroute=='abo') class="active" @endif> 
                          <a href="/en/about-us" class="{{$zawgyi}}">{{$menu_language[6]}}</a>
                        </li>
                         <li @if($currentroute=='con') class="active" @endif> 
                          <a href="/en/contact-us" class="{{$zawgyi}}">{{$menu_language[7]}}</a>
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
                    <li><a href="/">Home</a></li>
                  </ul>
                  <hr>
                  <ul class="off-canvas-list">
                    <li>
                      <label>
                        <a href="/type/en/seminar">Seminars</a>
                      </label>
                    </li>
                    <hr>

                    <li><label><a href="/type/en/consultancy">Consultancy</a></label></li>
                    <hr>
                    <div class="site-links">
                      <ul class="top">
                        <li><a href="/type/en/executivesearch">Executive Search</a></li>
                      </ul>
                    </div>
                    <li><a href="/news&events">News/Events</a></li>
                    <hr>
                    <div class="site-links">
                      <ul class="top">
                        <li><a href="/en/faq" >Faq</a></li>
                      </ul>
                    </div>

                    <li><a href="/en/about-us">About Us</a></li>
                    <hr>
                    <div class="site-links">
                      <ul class="top">
                      </ul>
                    </div>

                    <li><a href="/en/contact-us">Contact Us</a></li>
                    <hr>
                    <div class="site-links">
                      <ul class="top">
                      </ul>
                    </div>
                    <hr>
                  </ul>
                </aside>
                <a class="exit-off-canvas" href="#"></a>
              <!--End shown menu on only on a small screen. -->

              <section class="main-section"> 
                <div style="clear:both;"></div>
                <div class="row content-frame padding_4">
                  <div class="clear_row">&nbsp;</div>
                  <div class="row">
                    <div class="large-10 columns nopadding">
                      <div class="breakingnews" style="width:100%;float:left;">
                        <div id="topNav">
                          <aside id="wp-news-ticker-2" class="widget widget_wp-news-ticker {{$zawgyi}}">    <div id="ticker-wrapper" class="no-js">
                            <ul id="js-news" class="js-hidden" style="margin-left:0;">
                              @if($language=="japan")
                                <li class="news-item news"><a href="#" title="刑法は、1948年のミャンマーの独立後1861年にイギリスの電子政府により制定された。">刑法は、1948年のミャンマーの独立後1861年にイギリスの電子政府により制定された。</a></li>
                              @elseif($language=="myanmar")
                                <li class="news-item news"><a href="#" title="MJBC သည္ ေဆြးေႏြးပြဲ ၁၀၀ က်င္းပခဲ့ျပီး မွတ္ပုံတင္သူ ၆၀၀၀ ေက်ာ္ရွိပါသည္။">MJBC သည္ ေဆြးေႏြးပြဲ ၁၀၀ က်င္းပခဲ့ျပီး မွတ္ပုံတင္သူ ၆၀၀၀ ေက်ာ္ရွိပါသည္။</a></li>

                              @else
                                <li class="news-item news"><a href="#" title="MJBC has 10,000 seminars attends and 5,000 registrations.">MJBC has 10,000 seminars attends and 5,000 registrations.</a></li>
                                <li class="news-item news"><a href="#" title="Criminal law was enacted by English Goverment in 1861 after the independence of Myanmar in 1948.">Criminal law was enacted by English Goverment in 1861 after the independence of Myanmar in 1948.</a></li>
                              @endif
                            </ul>
                          </aside>
                        </div>
                      </div>

                      <!-- <div class="news">MJBC has 10,000 seminars attends and 5,000 registrations.</div> -->
                    </div>
                    <div class="large-2 columns nopadding">
                        <div class="social right">
                          <img src="../../../../img/twitter.png">
                          <img src="../../../../img/facebook.png">
                          <img src="../../../../img/social.png">
                        </div>
                    </div>
                  </div>
                  @yield('content')

                  <div class="row">
                    <div class="large-12 columns nopadding">
                      @if($language=="japan")
                        <p><b>9月、26日に開催された、2014年</b><br>
                        の拡大とミャンマー人の資料を利用して、現在の経営手法のミャンマーのような要件に事業会社を検討している自分の会社は、ITS成功し完了しました。
                      @elseif($language=="myanmar")
                        <p><b>Held on September, 26, 2014</b><br>
                        Own companies that are considering expanding and companies operating in Myanmar-like requirements of the current management methods that take advantage of the Myanmar human resources has completed its successful. 
                      @else
                        <p><b>Held on September, 26, 2014</b><br>
                        Own companies that are considering expanding and companies operating in Myanmar-like requirements of the current management methods that take advantage of the Myanmar human resources has completed its successful. 
                      @endif
                      
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="large12 footer">
                          <ul> 
                              <li> 
                                <a href="/">{{$menu_language[0]}}</a> 
                              </li>
                              <li> 
                                <a href="/type/en/seminar">{{$menu_language[1]}}</a> 
                              </li> 
                              <li> 
                                <a href="/type/en/consultancy">{{$menu_language[2]}}</a> 
                              </li>
                              <li> 
                                <a href="/type/en/executivesearch">{{$menu_language[3]}}</a> 
                              </li>
                              <li @if($currentroute=='') class="has-dropdown active" @else class="has-dropdown" @endif> 
                                <a href="/news&events">{{$menu_language[4]}}</a> 
                              </li>
                              <li @if($currentroute=='') class="active" @endif> 
                                <a href="/en/faq">{{$menu_language[5]}}</a>
                              </li>
                              <li @if($currentroute=='con') class="active" @endif> 
                                <a href="/en/about-us">{{$menu_language[6]}}</a>
                              </li>
                              <li @if($currentroute=='con') class="active" @endif> 
                                <a href="/en/contact-us">{{$menu_language[7]}}</a>
                              </li>
                          </ul> 
                    </div>

                  </div>
                  <br>
                  <div class="row">
                    <div class="large-12 columns">
                      <p class="text-center">
                        Building14, Room-601, Myanmar ICT Park, Universities Hlaing Campus, Hlaing Township, Yangon. Postal Code 11052 <br>
                        Tel: 95 1 2,305,206, 5,029,577, E-mail:mjbcc2014@gmail.com <br>
                        In charge: Ms. Phyu Phyu Than 
                      </p>
                    </div>
                  </div>
                </div>
                <hr>


              </section> 
          </div>
        </div>
      {{HTML::script('../../js/foundation.min.js')}}
      <!-- for breaking news -->
      {{HTML::script('../../js/ticker/jquery.ticker-minb3e8.js?ver=0.1')}}
    <script type="text/javascript">
        $(document).foundation();   
    </script>
    <script type="text/javascript">
      $(function(){
        jQuery('#js-news').ticker({
          direction: "ltr",
          controls: false,
          displayType: "reveal",
          titleText: ""
        });

        $('.language').click(function(){
          $('.language').each(function(){
            $(this).removeClass('active');
          });
          var val=$(this).data('value');
          var currentroute=$('#route').val();
          $(this).toggleClass('active');
          $.ajax({
                 type: "GET",
                 url: "/language",
                 data: {language:val}
                 }).done(function( result ) {
                    window.location.href=currentroute; 
                 });
          return false;
        });
      });
    </script>
  </body>
</html>