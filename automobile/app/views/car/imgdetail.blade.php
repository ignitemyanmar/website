@extends('../master')
@section('content')
	<div class="large-9 columns">
    <div class="row">
          <p class="title">အေသးစိတ္အခ်က္အလက္မ်ား</p>
          <p style="float:right;">
              <a href="" class="button2">Remove from shortlist</a><br>
          </p>
    </div>
    
    <div class="row">
      <div class="large-12 columns title">
        <div class="">
              <h3 style="float:left; font-weight:bold;">ABARTH NUM 20</h3> 
              <span class="price">20,000 K</span>
        </div>
      </div>
    </div>
    <div class="row">
        <div class="large-6 columns nopadding">
          <div class="slider3_background">
            <ul class="rslides" id="slider3">
              <li><img src="../../../carimagesm/buy1.jpg" alt=""></li>
              <li><img src="../../../carimagesm/buy2.jpg" alt=""></li>
              <li><img src="../../../carimagesm/buy3.jpg" alt=""></li>
             <!--  <li><img src="../../../carimagesm/buy4.jpg" alt=""></li>
              <li><img src="../../../carimagesm/buy5.jpg" alt=""></li>
              <li><img src="../../../carimagesm/buy6.jpg" alt=""></li>
 -->
            </ul>
            <!-- Slideshow 3 Pager -->
            <ul id="slider3-pager">
              <li style="display:inline;"><a href="#"><img src="../../../carimagesm/buy1.jpg" alt="" class="thumbslide"></a></li>
              <li style="display:inline;"><a href="#"><img src="../../../carimagesm/buy2.jpg" alt="" class="thumbslide"></a></li>
              <li style="display:inline;"><a href="#"><img src="../../../carimagesm/buy3.jpg" alt="" class="thumbslide"></a></li>
              <!-- <li style="display:inline;"><a href="#"><img src="../../../carimagesm/buy4.jpg" alt="" class="thumbslide"></a></li>
              <li style="display:inline;"><a href="#"><img src="../../../carimagesm/buy5.jpg" alt="" class="thumbslide"></a></li>
              <li style="display:inline;"><a href="#"><img src="../../../carimagesm/buy6.jpg" alt="" class="thumbslide"></a></li>
               -->
            </ul>
            <div >
              <dl class="tabs" data-tab style="border-bottom: 1px solid #DDD;"> 
                <dd class="active">
                  <a href="#panel2-1">Equipments</a>
                </dd> 
                <dd>
                  <a href="#panel2-2">Contact</a>
                </dd> 
              </dl> 
            </div>    

              <div class="tabs-content"> 
                <div class="content active" id="panel2-1"> 
                  <div class="large-12 columns ">
                    <h5> ပါဝင္ပစၥည္းမ်ား</h5>
                  </div>
                  <div class="large-6 columns ">
                    <span>- စီဒီ</span><br>
                    <span>- Airbag</span><br>
                    <span>Total hits: 28 </span>
                  </div>
                  <div class="large-6 columns ">
                    <br>
                    <span>- Air Con  </span><br>
                    <span>- တီဗြီ  </span><br>
                  </div>
                </div> 
                <div class="content" id="panel2-2"> 
                  <div class="large-12 columns ">
                      <form action="" method="post">
                        <div>
                            <strong>  အမည္  </strong><br>
                        </div><br>
                        <p>
                            <input type="text" value="" name="name">
                        </p>
                        <div>
                            <strong> ဖုန္းနံပါတ္</strong><br>
                        </div><br>
                        <p>
                            <input id="" type="text" value="" name="phone">
                        </p>
                        <div>
                            <strong>Your Email</strong><br>
                        </div><br>
                        <p>
                            <input id="email" type="text" value="" name="email">
                        </p>
                        <div>
                            <strong> Message</strong><br>
                        </div><br>
                        <p>
                            <textarea id="expmessage" cols="40" rows="4" name="expmessage"></textarea>
                        </p>
                        <a href="#" class="button save">ပို႕ရန္</a>
                        
                    </form>
                  </div>
                </div> 
              </div>

          </div>  
        </div>
       
        <div class="large-6 columns car_spec">

          <table>
            <tr>
              <td><strong> ကားအေျခအေန:</strong></td>
              <td>:</td>
              <td>New</td>
            </tr>
            <tr>
              <td><strong>ကားထုတ္လုပ္သည့္ခုႏွစ္:</strong> </td>
              <td>:</td>
              <td>2010</td>
            </tr>
            <tr>
              <td><strong>ေလာင္စာအမ်ိဳးအစား:</strong></td>
              <td>:</td>
              <td>CNG</td>
            </tr>
            <tr>
              <td><strong>ဂီယာအမ်ိဳးအစား</strong></td>
              <td>:</td>
              <td>Auto-manual</td>
            </tr>
            <tr>
              <td><strong>အေရာင္</strong></td>
              <td>:</td>
              <td>Green</td>
            </tr>
            <tr>
              <td colspan="3"><h3><strong>Vehicle Location</strong></h3></td>
            </tr>
            <tr>
              <td><strong>Country:</strong></td>
              <td>:</td>
              <td>Mandalay</td>
            </tr>
            <tr>
              <td colspan="3"><h4><strong>ေရာင္းသူ၏ အခ်က္အလက္မ်ား</strong></h4></td>
            </tr>
            <tr>
              <td><strong>Name:</strong></td>
              <td>:</td>
              <td>Automobile</td>
            </tr>
              <tr>
              <td><strong>Username</strong></td>
              <td>:</td>
              <td>Automobile</td>
            </tr>
            <tr>
              <td><strong>Phone</strong></td>
              <td>:</td>
              <td>01-537406</td>
            </tr>
            <tr>
              <td><strong>Email</strong></td>
              <td>:</td>
              <td>info@automobile.com.mm</td>
            </tr>
            <tr>
              <td><strong>Country</strong></td>
              <td>:</td>
              <td>Yangon</td>
            </tr>
            <tr>
              <td colspan="3">
                  <a href="#"><span id="span">Show all ads from this seller</span></a><br>
              </td>
            </tr>
            <tr>
              <td colspan="3">
                  <a href="#"><span id="span">More info about seller</span></a>
              </td>
            </tr>  
          </table>

        </div>
    </div>
		
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
