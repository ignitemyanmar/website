@extends('../master')
@section('content')
{{HTML::style('../../css/slider.css')}}
<style type="text/css">
  body.plugin{color: #fff;}
       #fboverlay {
        opacity: 0.8;
        filter: alpha(opacity=60);
        -webkit-filter: grayscale(100%);
        -moz-filter: grayscale(100%);
        -o-filter: grayscale(100%);
        -ms-filter: grayscale(100%);
        filter: grayscale(100%);
      }
    }
      .zawgyi-one{font-family: "Zawgyi-One";}
      .tabs-content > .content{width: 100%;}
      textarea{margin-left: 0;}
</style>
	<div class="large-9 columns">
    @if(isset($car))
      @if(count($car)>0)
        <div class="row">
          <div class="content-title">
            <span class="icon-logo"></span>
              {{ $car->make. ' '. $car->model.' (' . $car->body .')' }}<span class="price right">{{ $car->price}} သိန်း @if($car->slip == 0) <b>+</b> စလစ် @endif  @if($car->negotiate==1) ( ညိှနူိင်း ) @else ( ေရာင်းမည် ) @endif</span>
            <span class="bottom-line"></span>

          </div>
        </div>
        <div style="background: none repeat scroll 0% 0% rgb(202, 99, 6); color: rgb(255, 255, 255) ! important; padding: 5px 12px; width: 53%; border-radius: 2px;">
          <div id="fb-root">
            <?php $urllink='' ?>
            @if(Session::has('cardetail'))
              <?php 
                $cardetail=Session::get('cardetail');
                $urllink=$cardetail['url']; 
              ?>
            @endif
            <div class="fb-like" data-href="{{ $urllink }}" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
          </div>
        </div>
        
        <div class="clear">&nbsp;</div>
        <div class="row" style="background:#fff; padding-top:6px;">
          <div class="large-6 columns nopadding" style="padding-left:9px;">
            <div class="slider3_background">
                  <ul class="rslides" id="slider3">
                      <li><img src="../../../../carphoto/php/files/{{ $car->image}}" alt=""></li>
                    @if(count($car->images)>0)
                      @foreach($car->images as $row)
                        <li><img src="../../../../carphoto/php/files/{{ $row->image}}" alt=""></li>
                      @endforeach
                    @endif
                  </ul>
                  <!-- Slideshow 3 Pager -->
                  <ul id="slider3-pager">
                    <?php
                      $label=''; 
                      if(strtolower($car->status)=='feature') {
                        $label='top';
                      }
                      if(strtolower($car->status)=='sold') {
                        $label='sold';
                      }
                    ?>
                    <div class="{{$label}}">
                      <span></span>
                        <li style="display:inline;"><a href="#"><img src="../../../../carphoto/php/files/{{ $car->image}}" alt="" class="thumbslide"></a></li>
                    @if(count($car->images)>0)
                      @foreach($car->images as $row)
                        <li style="display:inline;"><a href="#"><img src="../../../../carphoto/php/files/{{ $row->image}}" alt="" class="thumbslide"></a></li>
                      @endforeach
                    @endif
                    </div>
                  </ul>
             
            </div>
          </div>
          <div class="large-6 columns car_spec">
            <div class="clear">&nbsp;</div> 
            <div class="row">
              <div class="large-6 columns">
                <p>ကားအေြခအေန</p>
              </div>
              <div class="large-6 columns">
                <p>{{ $car->condition->name}}</p>
              </div>  
            </div>
           
            <div class="row">
              <div class="large-6 columns">
                <p>ကားထုတ်လုပ်သည့်ခုနစ်</p>
              </div>
              <div class="large-6 columns">
                <p>{{ $car->year}}</p>
              </div>  
            </div>

            <div class="row">
              <div class="large-6 columns">
                <p>ေလာင်စာအမျုိးအစား</p>
              </div>
              <div class="large-6 columns">
                <p>{{ $car->fuel}}</p>
              </div>  
            </div>
            <div class="row">
              <div class="large-6 columns">
                <p>ဂီယာအမျုိးအစား</p>
              </div>
              <div class="large-6 columns">
                <p>{{ $car->transmission}}</p>
              </div>  
            </div>

            <div class="row">
              <div class="large-6 columns">
                <p>အေရာင်</p>
              </div>  
              <div class="large-6 columns">
                @if(count($car->color)>0)
                <p>{{ $car->color->name}}</p>
                @endif
              </div>  
            </div>

            <div class="row">
              <div class="large-11 columns">
                <div class="dt_title">
                  <span>Vehicle Location</span>
                </div>
              </div>
              <div class="large-1 columns">&nbsp;</div>
            </div>
            <br>
            <div class="row">
              <div class="large-6 columns">
                <p>State/Devision</p>
              </div>
              <div class="large-6 columns">
                @if(count($car->city)>0)
                <p>{{ $car->city->name}}</p>
                @endif
              </div>  
            </div>

            <div class="row">
              <div class="large-10 columns">
                <div class="dt_title">
                  <span>ေရာင်းသူ၏ အချက်အလက်များ</span>
                </div>
              </div>
              <div class="large-2 columns">&nbsp;</div>
            </div>
            <br>
            @if($car->dealer)
              <div class="row">
                <div class="large-4 columns">
                  <p>Name</p>
                </div>
                <div class="large-8 columns">
                  <p>{{$car->dealer->name.  ' ( '.$car->dealer->companyname . ' )'}}</p>
                </div>  
              </div>
              
              <div class="row">
                <div class="large-4 columns">
                  <p>Phone</p>
                </div>
                <div class="large-8 columns">
                  <p>{{ $car->dealer->phone}}</p>
                </div>  
              </div>
              <div class="row">
                <div class="large-4 columns">
                  <p class="zawgyi-one">Address</p>
                </div>
                <div class="large-8 columns">
                  <p class="zawgyi-one">{{ $car->dealer->address}}</p>
                </div>  
              </div>
              <div class="row">
                <div class="large-4 columns">
                  <p>Email</p>
                </div>
                <div class="large-8 columns">
                  <p>{{ $car->user->email}}</p>
                </div>  
              </div>
              <div class="row">
                <div class="large-4 columns">
                  <p>Country</p>
                </div>
                <div class="large-8 columns">
                  <p>{{ $car->dealer->country}}</p>
                </div>  
              </div>
            @endif
          </div> 
        </div>

        <!-- tab -->
        <br>
        <div class="clear">&nbsp;</div>
        <!-- <div class="row">
            <div class="large-8 columns nopadding" style="background:rgba(0,0,0,0.8);">
                <div >
                  <dl class="tabs class="ayar-wagaung"" data-tab style="border-bottom: 1px solid #666;"> 
                    <dd class="active">
                      <a href="#panel2-1" class="ayar-wagaung">ပါဝင်ပစ္စည်းများ</a>
                    </dd> 
                    <dd>
                      <a href="#panel2-2" class="ayar-wagaung">ကားပုိင်ရှင်သုိ့ ဆက်သွယ်ရန်</a>
                    </dd>
                    <dd>
                      <a href="#panel2-3" class="ayar-wagaung">ကားအချက်အလက်များ</a>
                    </dd>  
                  </dl> 
                </div>    

                <div class="tabs-content"> 
                  <div class="content active" id="panel2-1"> 
                    <div class="large-12 columns">
                      <h6 style="opacity:0"> ပါဝင်ေသာ အသုံးအေဆာင်များ</h6>
                    </div>
                    <div class="large-12 columns">
                      <?php $i=1; $count= count($car->ingredients);?>
                          <div class="row">
                        @foreach($car->ingredients as $ingredient)
                              <div class="large-4 columns">
                                {{ $ingredient->name }}<br>
                              </div>
                          @if($i==$count || $i%3==0)
                          <hr style="border:1px dotted #ccc; opacity:.4;">
                          @endif
                          <?php $i++ ?>
                      @endforeach
                            </div>

                      <br>
                      <span class='ayar-wagaung'>Total hits: {{$car->viewcount}} </span>
                    </div>
                  </div> 
                  <div class="content" id="panel2-2"> 
                    <div class="large-12 columns ">
                      <form action="/contact-to-dealer" method="post">
                          <div>
                              <span class="ayar-wagaung">  အမည်  </span><br>
                          </div><br>
                          <p>
                              <input type="text" value="" name="name">
                          </p>
                          <div>
                              <span class="ayar-wagaung"> ဖုန်းနံပါတ်</span><br>
                          </div><br>
                          <p>
                              <input id="" type="text" value="" name="phone">
                          </p>
                          <div>
                              <span class="ayar-wagaung">Your Email</span><br>
                          </div><br>
                          <p>
                          
                              @if($car->dealer)

                                <input type="hidden" id="dlname" type="text" value="{{$car->dealer->name.  ' ( '.$car->dealer->companyname . ' )'}}" name="dlname">
                                <input type="hidden" id="dlemail" type="text" value="{{ $car->user->email}}" name="toemail">
                              @endif
                              <input id="email" type="text" value="" name="email">
                          </p>
                          <div>
                              <span class="ayar-wagaung"> Message</span><br>
                          </div><br>
                          <p>
                              <textarea id="expmessage" cols="40" rows="4" name="expmessage"></textarea>
                          </p>
                          <input type="submit" class="btn search btn-primary ayar-wagaung" value="ပုိ့ရန်">
                      </form>
                    </div>
                  </div> 
                  <div class="content" id="panel2-3"> 
                    <div class="large-12 columns ">
                        @if($car)
                        <div class="row"> 
                            <div class="large-6 columns">
                              <label>အင်ဂျင်ပါဝါ</label>
                            </div>
                            <div class="large-6 columns">
                              <label>@if($car->enginepower){{$car->enginepower}} @else - @endif</label>
                            </div>
                        </div><br>
                        <div class="row"> 
                            <div class="large-6 columns">
                              <label>လုိင်စင်အမျိုးအစား</label>
                            </div>
                            <div class="large-6 columns">
                              <label>@if($car->licenseno=='red') အနီ @else အနက် @endif</label>
                            </div>
                        </div><br>
                        <div class="row"> 
                            <div class="large-6 columns">
                              <label>ကားနံပါတ်</label>
                            </div>
                            <div class="large-6 columns">
                              <label>@if($car->carno) {{$car->carno}} @else - @endif</label>
                            </div>
                        </div><br>
                        
                        <div class="row"> 
                            <div class="large-6 columns">
                              <label>ေမာင်းနှင်ြပီးကီလုိ</label>
                            </div>
                            <div class="large-6 columns">
                              <label>@if($car->mileage){{$car->mileage}} @else - @endif km</label>
                            </div>
                        </div><br>

                        <div class="row"> 
                            <div class="large-6 columns">
                              <label>Owner Book</label>
                            </div>
                            <div class="large-6 columns">
                              <label>@if($car->ownerbook=='finish') &nbsp;ြပီး  @else မြပီးေသး @endif</label>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="large-12 columns">
                                <p>  {{ $car->description}} </p> 
                            </div>
                        </div>
                        @endif
                    </div>
                  </div> 
                </div>
            </div>
            <div class="large-4 columns">&nbsp;</div>
        </div> -->
        <div class="row">
            <div class="large-8 columns nopadding" style="background:rgba(0,0,0,0.8);">
                <div >
                  <dl class="tabs class="ayar-wagaung"" data-tab style="border-bottom: 1px solid #666;"> 
                    <dd  class="active">
                      <a href="#panel2-1" class="ayar-wagaung">ကားအချက်အလက်များ</a>
                    </dd>  
                    <dd>
                      <a href="#panel2-2" class="ayar-wagaung">ပါဝင်ပစ္စည်းများ</a>
                    </dd> 
                    <dd>
                      <a href="#panel2-3" class="ayar-wagaung">ကားပုိင်ရှင်သုိ့ ဆက်သွယ်ရန်</a>
                    </dd>
                    
                  </dl> 
                </div>    

                <div class="tabs-content"> 
                  <div class="content active" id="panel2-1"> 
                    <div class="large-12 columns ">
                        @if($car)
                        <div class="row"> 
                            <div class="large-6 columns">
                              <label>လုိင်စင်အမျိုးအစား</label>
                            </div>
                            <div class="large-6 columns">
                              <label>@if($car->licenseno=='red') အနီ @else အနက် @endif</label>
                            </div>
                        </div><br>
                        <div class="row"> 
                            <div class="large-6 columns">
                              <label>ကားနံပါတ်</label>
                            </div>
                            <div class="large-6 columns">
                              <label>@if($car->carno) {{$car->carno}} @else - @endif</label>
                            </div>
                        </div><br>

                        <div class="row"> 
                            <div class="large-6 columns">
                              <label>အင်ဂျင်ပါဝါ</label>
                            </div>
                            <div class="large-6 columns">
                              <label>@if($car->enginepower){{$car->enginepower}} @else - @endif</label>
                            </div>
                        </div><br>
                        
                        <div class="row"> 
                            <div class="large-6 columns">
                              <label>ေမာင်းနှင်ြပီးကီလုိ</label>
                            </div>
                            <div class="large-6 columns">
                              <label>@if($car->mileage){{$car->mileage}} @else - @endif km</label>
                            </div>
                        </div><br>

                        <div class="row"> 
                            <div class="large-6 columns">
                              <label>Owner Book</label>
                            </div>
                            <div class="large-6 columns">
                              <label>@if($car->ownerbook=='finish') &nbsp;ြပီး  @else မြပီးေသး @endif</label>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="large-12 columns">
                                <p>  {{ $car->description}} </p> 
                            </div>
                        </div>
                        @endif
                    </div>
                  </div> 
                  <div class="content" id="panel2-2"> 
                    <div class="large-12 columns">
                      <h6 style="opacity:0"> ပါဝင်ေသာ အသုံးအေဆာင်များ</h6>
                    </div>
                    <div class="large-12 columns">
                      <?php $i=1; $count= count($car->ingredients);?>
                          <div class="row">
                        @foreach($car->ingredients as $ingredient)
                              <div class="large-4 columns">
                                {{ $ingredient->name }}<br>
                              </div>
                          @if($i==$count || $i%3==0)
                          <hr style="border:1px dotted #ccc; opacity:.4;">
                          @endif
                          <?php $i++ ?>
                      @endforeach
                            </div>

                      <br>
                      <span class='ayar-wagaung'>Total hits: {{$car->viewcount}} </span>
                    </div>
                  </div> 
                  <div class="content" id="panel2-3"> 
                    <div class="large-12 columns ">
                      <form action="/contact-to-dealer" method="post">
                          <div>
                              <span class="ayar-wagaung">  အမည်  </span><br>
                          </div><br>
                          <p>
                              <input type="text" value="" name="name">
                          </p>
                          <div>
                              <span class="ayar-wagaung"> ဖုန်းနံပါတ်</span><br>
                          </div><br>
                          <p>
                              <input id="" type="text" value="" name="phone">
                          </p>
                          <div>
                              <span class="ayar-wagaung">Your Email</span><br>
                          </div><br>
                          <p>
                          
                              @if($car->dealer)

                                <input type="hidden" id="dlname" type="text" value="{{$car->dealer->name.  ' ( '.$car->dealer->companyname . ' )'}}" name="dlname">
                                <input type="hidden" id="dlemail" type="text" value="{{ $car->user->email}}" name="toemail">
                              @endif
                              <input id="email" type="text" value="" name="email">
                          </p>
                          <div>
                              <span class="ayar-wagaung"> Message</span><br>
                          </div><br>
                          <p>
                              <textarea id="expmessage" cols="40" rows="4" name="expmessage"></textarea>
                          </p>
                          <input type="submit" class="btn search btn-primary ayar-wagaung" value="ပုိ့ရန်">
                      </form>
                    </div>
                  </div> 
                  
                </div>
            </div>
            <div class="large-4 columns">&nbsp;</div>
        </div>

        <div class="row">
            <div class="large-6 columns nopadding">
               
            </div>
           
            <div class="large-6 columns car_spec" style="padding-right:0;">

             
            </div>
        </div>
      @endif
    @endif
		
	</div>
<link rel="stylesheet" href="../../../css/responsiveslides.css">
<link rel="stylesheet" href="../../../css/demo.css">
<!-- <script src="../../../js/jquery-1.10.2.min.js"></script> -->
<script src="../../../js/responsiveslides.min.js"></script>
 
<script type="text/javascript">
        $(function(){
          setTimeout( function(){
            $('#lb_backdrop').css("opacity","0");
            $('#lb_backdrop').hide();
            },1100);
          setTimeout( function(){
            $('#container').css("opacity","1");
              $('#loading').css("opacity","0")
              },800);
          
          $("#slider3").responsiveSlides({
            manualControls: '#slider3-pager',
          });
      });
</script>

<script>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '572699629418497',
          status     : true,
          xfbml      : true
        });
      };

      (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
                fjs.parentNode.insertBefore(js, fjs);
              }(document, 'script', 'facebook-jssdk'));
    </script>
@stop
