<!DOCTYPE html>
    <html>
    <head>
      <title>Automobile</title>
      <meta property="og:image" content="http://www.Automobile.com/images/logo01.png"/>
      {{HTML::style('../../images/favicon.ico',array('rel'=>'icon','type'=>'image/ico'))}}
      {{HTML::style('../../css/foundation.min.css')}}
      {{HTML::style('../../css/custom_navbar.css')}}
      {{HTML::style('../../css/back_custom.css')}}
      {{HTML::style('../../css/upload.css')}}
      {{HTML::style('../../css/jquery-ui.css')}}
      {{HTML::style('../../src/select2.css')}}
      
      {{HTML::script('../../js/jquery.js')}}
      {{HTML::script('../../src/tinymce.min.js')}}
    </head>
    <body id="body">
        <a class="to-top"></a>
        <div class="contentframe off-canvas-wrap">
          <div class="large-12 columns title_frame">
                  <a href="/"><img src="../../images/AutoM.png" width='180px'></a><h3 class='title' style="font-size: 21px; color:white;float:left; margin-top:-32px; margin-left:15%;">Administration</h3 class='title'>
          </div><br>
          <div class="inner-wrap">
            <!-- shown on large screens and up. -->
              <div id="title_frame1">
                <nav class="top-bar show-for-large-up top-bars" data-topbar > 
                    <!-- <ul class="title-area"> 
                      <li class="name">
                        <a href="/"><img src="../../images/AutoM.png" width="100"></a> <span style="font-size: 44px; color:yellow; font-weight:200;">Administration</span>
                      </li>
                    </ul> --> 
                    <section class="top-bar-section"> 
                      <!-- Right Nav Section --> 
                      @if(Auth::check())
                      <ul class="left"> 
                        <?php $currentroute=Route::getCurrentRoute()->getPath();
                          $currentroute=substr($currentroute,0,3);
                        ?>
                       
                          <li @if($currentroute =='car') class="has-dropdown active" @else class="has-dropdown"  @endif> 
                            <a href="/menulist">Car</a> 
                            <ul class="dropdown"> 
                              <li class="has-dropdown">
                                <a href="/carlist">Car List</a>
                                <ul class="dropdown">
                                  <li>
                                    <a href="/car-create">Add New Car</a>
                                  </li>
                                </ul>
                              </li> 
                              <li class='has-dropdown'>
                                <a href="/car-articlelist">Article</a>
                                <ul class="dropdown">
                                  <li>
                                    <a href="/car-article-create">Add New Article</a>
                                  </li>
                                </ul>
                              </li>
                              <li class='has-dropdown'>
                                <a href="/car-article-categorylist">Article Category</a>
                                <ul class="dropdown">
                                  <li>
                                    <a href="/car-article-category-create">Add New Article</a>
                                  </li>
                                </ul>
                              </li>

                              <li class='has-dropdown'>
                                <a href="/car-makelist">Makes</a>
                                <ul class="dropdown">
                                  <li>
                                    <a href="/car-make-create">Add New Make</a>
                                  </li>
                                </ul>
                              </li> 
                              <li class='has-dropdown'>
                                <a href="/car-modellist">Models</a>
                                <ul class="dropdown">
                                  <li>
                                    <a href="/car-model-create">Add New model</a>
                                  </li>
                                </ul>
                              </li>
                              <li class='has-dropdown'>
                                <a href="/car-conditionlist">Condition</a>
                                <ul class="dropdown">
                                  <li>
                                    <a href="/car-condition-create">Add New Condition</a>
                                  </li>
                                </ul>
                              </li> 
                              <li class='has-dropdown'>
                                <a href="/car-bodylist">Body</a>
                                <ul class="dropdown">
                                  <li>
                                    <a href="/car-body-create">Add New Body Type</a>
                                  </li>
                                </ul>
                              </li>
                              <li class='has-dropdown'>
                                <a href="/car-enginelist">Engine Power</a>
                                <ul class="dropdown">
                                  <li>
                                    <a href="/car-engine-create">Add New Engine Power</a>
                                  </li>
                                </ul>
                              </li>
                              <li class='has-dropdown'>
                                <a href="/car-colorlist">Color</a>
                                <ul class="dropdown">
                                  <li>
                                    <a href="/car-color-create">Add New Color</a>
                                  </li>
                                </ul>
                              </li>  
                              <li class='has-dropdown'>
                                <a href="/car-citylist">City</a>
                                <ul class="dropdown">
                                  <li>
                                    <a href="/car-city-create">Add New City</a>
                                  </li>
                                </ul>
                              </li>  
                              <li class='has-dropdown'>
                                <a href="/car-ingredientlist">Ingredient</a>
                                <ul class="dropdown">
                                  <li>
                                    <a href="/car-ingredient-create">Add New Ingredient</a>
                                  </li>
                                </ul>
                              </li>  
                            </ul> 
                          </li> 
                          <li @if($currentroute=='adv') class="has-dropdown active" @else class="has-dropdown" @endif> 
                            <a href="advertisementlist">Advertisement</a> 
                            <ul class="dropdown">
                              <li>
                                <a href="advertisement-create">Add New Advertisement</a>
                              </li> 
                              <li>
                                <a href="advertisementlist">Advertisement List</a>
                              </li>  
                            </ul> 
                          </li>
                          <li @if($currentroute=='con') class="has-dropdown active" @else class="has-dropdown" @endif> 
                            <a href="/contact-us-list">Contact Us</a> 
                            <ul class="dropdown">
                              <li class="has-dropdown">
                                <a href="/contact-us-list">Contact Us List</a>
                                <ul class="dropdown">
                                  <li>
                                    <a href="/contact-us-create">Add Contact Us</a>
                                  </li>
                                </ul>
                              </li> 
                               
                            </ul> 
                          </li>
                          
                          <li @if($currentroute=='bus') class="has-dropdown active" @else class="has-dropdown" @endif> 
                            <a href="/businessguidelist">Business Guide</a> 
                            <ul class="dropdown"> 
                              <li class="has-dropdown">
                                <a href="/businessguidelist">Business Guide List</a>
                                <ul class="dropdown">
                                  <li>
                                    <a href="/businessguide-create">Add New Business Guide</a>
                                  </li>
                                </ul>
                              </li>
                              <li class="has-dropdown">
                                <a href="/business-categorylist">Business Category List</a>
                                <ul class="dropdown">
                                  <li>
                                    <a href="/business-category-create">Add New Business Category</a>
                                  </li>
                                </ul>
                              </li> 
                            </ul> 
                          </li>

                          <li @if($currentroute=='bus') class="has-dropdown active" @else class="has-dropdown" @endif> 
                            <a href="/newslist">News</a> 
                            <ul class="dropdown"> 
                              <li class="has-dropdown">
                                <a href="/newslist">News List</a>
                                <ul class="dropdown">
                                  <li>
                                    <a href="/news-create">Add News</a>
                                  </li>
                                </ul>
                              </li>
                            </ul> 
                          </li>

                          <li @if($currentroute=='use') class="has-dropdown active" @else class="has-dropdown" @endif>  
                            <a href="/userlist">Users</a>
                            <ul class="dropdown">
                              <li>
                                <a href="/user-create">Add New User</a>
                              </li> 
                              <li>
                                <a href="/userlist">User List</a>
                              </li>

                            </ul> 
                          </li>
                                                 
                        
                      </ul> 
                      <ul class="right">
                        <li @if($currentroute=='new') class="has-dropdown active" @else class="has-dropdown" @endif>
                          <a href="">{{Auth::user()->first_name}}</a>
                          <ul class="dropdown">
                            <li>
                              <a href="#">Edit Profile</a>
                            </li>
                          </ul>
                        </li>
                        <li>  
                          <a href="/users-logout">Logout</a>
                        </li>
                      </ul>
                      @endif

                    </section> 
                </nav>
                <div class="large-12 columns" style="border-top:2px solid #FF9A1D;">&nbsp;</div>
                <!-- shown on only on a small screen. -->
                <nav class="tab-bar hide-for-large-up">
                  <a class="left-off-canvas-toggle menu-icon">
                    <span>Automobile</span>
                  </a>
                </nav>
              </div>
              
              <aside class="contentframe-left-off-canvas-menu">
                <ul class="off-canvas-list">
                  <li><label class="first">Automobile</label></li>
                  <li><a href="http://www.Automobile.com.mm/">Automobile</a></li>
                </ul>
                <hr>
                <ul class="off-canvas-list">
                  <li>
                    <label>
                      <a href="/to-buy">ကားဝယ္ရန္</a>
                    </label>
                  </li>
                  <li><a href="/sell-car">ကားေရာင္းရန္</a></li>
                  <li><a href="/articles">ကားအေၾကာင္းသုံးသပ္ခ်က္မ်ား</a></li>
                  <li><a href="/business-guide">စီးပြားေရးလမ္းညြန္</a></li>
                  <li><a href="/news">သတင္းမ်ား</a></li>
                  <hr>
                  <li><label><a href="/forums">ေဆြးေႏြးခန္း</a></label></li>
                  <li><a href="/contact-us">ဆက္သြယ္ရန္</a></li>
                  <hr>
                  <div class="site-links">
                    <ul class="top">
                      <!-- <li class="logo"><a href="http://example.com/"></a></li> -->
                      <li><a href="/sell-car">ကားေရာင္းရန္</a></li>
                      <li><a href="/articles">ကားအေၾကာင္းသုံးသပ္ခ်က္မ်ား</a></li>
                      <li><a href="/business-guide">စီးပြားေရးလမ္းညြန္</a></li>
                      <li><a href="/news">သတင္းမ်ား</a></li>
                    </ul>
                  </div>
                </ul>
              </aside>
              <a class="exit-off-canvas" href="#"></a>
              <!--End shown menu on only on a small screen. -->

              <section class="main-section" style="min-height:620px;"> 
                <div class="row" style="padding:15px;">
                  <!-- <div class="large-1 columns">&nbsp;</div> -->
                   @yield('content')
                  <!-- <div class="large-1 columns">&nbsp;</div> -->
                </div>
                <div class="clear">&nbsp;</div>
              </section> 
          </div>
        </div>



      <!-- footer  -->
      <div class="clear">&nbsp;<br></div>
            <div id="footer">
            <p id="" class="text-center"><span id="">Copy right &copy; <?=date('Y')?>  All right reserved by <a href="/">example.com</a></span> Developed by <a href="http://www.ignitemyanmar.com" style="color:#FF9900">ignite software solution</a></p>
            </div>

      

    {{HTML::script('../../src/jquery-ui.js')}}
    {{HTML::script('../../src/select2.min.js')}}
    {{HTML::script('../../../js/foundation.min.js')}}
    <script type="text/javascript">
        $(document).foundation();   
    </script>
    {{HTML::script('../../src/jquery.fileupload.js')}}
  </body>
</html>