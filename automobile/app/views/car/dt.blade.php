@extends('../master')
@section('content')
	<div class="large-9 columns">
    @if(count($car)>0)
      <div class="row">
        <div class="content-title">
          <span class="icon-logo"></span>
            {{ $car->make. ' '. $car->model.' (' . $car->body .')' }}<span class="price right">{{ $car->price}} K</span>
          <span class="bottom-line"></span>

        </div>
      </div>
      <div class="clear">&nbsp;</div>

      <div class="row">
          <div class="large-6 columns nopadding">
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
                    <li style="display:inline;"><a href="#"><img src="../../../../carphoto/php/files/{{ $car->image}}" alt="" class="thumbslide"></a></li>
                @if(count($car->images)>0)
                  @foreach($car->images as $row)
                    <li style="display:inline;"><a href="#"><img src="../../../../carphoto/php/files/{{ $row->image}}" alt="" class="thumbslide"></a></li>
                  @endforeach
                @endif
              </ul>
              <div >
                <dl class="tabs" data-tab style="border-bottom: 1px solid #666;"> 
                  <dd class="active">
                    <a href="#panel2-1" class="ayar-wagaung">Equipments</a>
                  </dd> 
                  <dd>
                    <a href="#panel2-2" class="ayar-wagaung">Contact</a>
                  </dd> 
                </dl> 
              </div>    

                <div class="tabs-content"> 
                  <div class="content active" id="panel2-1"> 
                    <div class="large-12 columns">
                      <h5 class="ayar-wagaung"> ပါဝင်ေသာ အသုံးအေဆာင်များ</h5>
                    </div>
                    <div class="large-12 columns">
                      <hr style="border:1px dashed #ccc; opacity:1;">
                      <?php $i=1; $count= count($car->ingredients);?>
                          <div class="row">
                        @foreach($car->ingredients as $ingredient)
                              <div class="large-4 column">
                                <span>{{ $ingredient->name }}</span><br>
                              </div>
                          @if($i==$count || $i%3==0)
                          <hr style="border:1px dotted #ccc; opacity:.4;">
                          @endif
                          <?php $i++ ?>
                      @endforeach
                            </div>


                      <span class='ayar-wagaung'>Total hits: {{$car->viewcount}} </span>
                    </div>
                  </div> 
                  <div class="content" id="panel2-2"> 
                    <div class="large-12 columns ">
                        <form action="" method="post">
                          <div>
                              <strong class="ayar-wagaung">  အမည်  </strong><br>
                          </div><br>
                          <p>
                              <input type="text" value="" name="name">
                          </p>
                          <div>
                              <strong class="ayar-wagaung"> ဖုန်းနံပါတ်</strong><br>
                          </div><br>
                          <p>
                              <input id="" type="text" value="" name="phone">
                          </p>
                          <div>
                              <strong class="ayar-wagaung">Your Email</strong><br>
                          </div><br>
                          <p>
                              <input id="email" type="text" value="" name="email">
                          </p>
                          <div>
                              <strong class="ayar-wagaung"> Message</strong><br>
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
          </div>
         
          <div class="large-6 columns car_spec" style="padding-right:0;">

            <table style="width:100%;">
              <tr>
                <td> ကားအေျခအေန:</td>
                
                <td>{{ $car->condition->name}}</td>
              </tr>
              <tr>
                <td>ကားထုတ္လုပ္သည့္ခုႏွစ္:</td>
                
                <td>{{ $car->year}}</td>
              </tr>
              <tr>
                <td>ေလာင္စာအမ်ိဳးအစား:</td>
                
                <td>{{ $car->fuel}}</td>
              </tr>
              <tr>
                <td>ဂီယာအမ်ိဳးအစား</td>
                
                <td>{{ $car->transmission}}</td>
              </tr>
              <tr>
                <td>အေရာင္</td>
                
                <td>{{ $car->color->Name}}</td>
              </tr>
              <tr>
                <td colspan="3" class="header-title"><h5>Vehicle Location</h5></td>
              </tr>
              <tr>
                <td>City:</td>
                
                <td>{{ $car->city->name}}</td>
              </tr>
              <tr >
                <td colspan="3" class="header-title"><h5>ေရာင်းသူ၏ အချက်အလက်များ</h5></td>
              </tr>
              @if($car->dealer)
                <tr>
                  <td>Name:</td>
                  
                  <td>{{$car->dealer->first_name.' '. $car->dealer->last_name}}</td>
                </tr>
                
                <tr>
                  <td>Phone</td>
                  
                  <td>{{ $car->dealer->phone}}</td>
                </tr>
                <tr>
                  <td>Email</td>
                  
                  <td>{{ $car->dealer->email}}</td>
                </tr>
                <tr>
                  <td>Country</td>
                  
                  <td>{{ $car->dealer->country}}</td>
                </tr>
              @endif
            </table>

          </div>
      </div>
    @endif
		
	</div>
<link rel="stylesheet" href="../../../css/responsiveslides.css">
<link rel="stylesheet" href="../../../css/demo.css">
<script src="../../../js/jquery-1.10.2.min.js"></script>
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
@stop
