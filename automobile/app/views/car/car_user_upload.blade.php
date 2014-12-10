@extends('../master')
@section('content')
{{HTML::style('../../css/upload.css')}}
	<div class="large-9 columns left_padding_none">
		<div class="row">
        <div class="large-12 columns list-frame nopadding">
          <div class="content-title">
            <span class="icon-logo"></span>
              ကားအသစ်တင်ရန်
            <span class="bottom-line"></span>
          </div>
          <div class="clear">&nbsp;</div>
          @if(Auth::check())
            <form id="upload_form" class="row  addnew-form" action = "/addnewcar" method= "post" enctype="multipart/form-data">
              <div class="row">
                <div class="large-6 columns">&nbsp;</div>
                <div class="large-6 columns ayar-wagaung">
                  <span class="require ayar-wagaung" style="border:1px solid #9C3C48;padding:9px;">[*] <big style="color:#F7941D;font-size:16px; position:relative;"> &nbsp;ြပထားေသာ အချက်အလက်များကုိ မြဖစ်မေနထည့်ေပးရန်။</big> </span>
                </div>
              </div>
              <div class="cleardiv">&nbsp;</div>

              <div class="row">
                <div class="large-3 column"><label for="email">Category <span class='require'>(<b class="star">*</b>&nbsp;&nbsp;)</span></label></div>
                <div class="large-6 column">
                  <select name="category" id='categories'>
                    <option value="ျမန္မာျပည္တြင္ေရာက္ရွိေနေသာ ကားမ်ား">ျမန္မာျပည္တြင္ေရာက္ရွိေနေသာ ကားမ်ား</option>
                    <option value="ဆိပ္ကမ္းေရာက္ တန္ဖုိးျဖင့္ေရာင္းမည့္ကားမ်ား">ဆိပ္ကမ္းေရာက္ တန္ဖုိးျဖင့္ေရာင္းမည့္ကားမ်ား</option>
                    <option value="စလစ္မ်ား">စလစ္မ်ား</option>  
                    <option value="အပ္ႏွံရမည့္ ယာဥ္အုိယာဥ္ေဟာင္းမ်ား">အပ္ႏွံရမည့္ ယာဥ္အုိယာဥ္ေဟာင္းမ်ား</option>
                    <option value=""></option>
                  </select>
                </div>
                <div class="large-3 column">&nbsp;</div>

              </div>
              <div class="cleardiv">&nbsp;</div>
              
              <div class="row">
                <div class="large-3 column"><label for="price">Price<span class='require'>(<b class="star">*</b>&nbsp;&nbsp;)</span></label></div>
                <div class="large-2 column">
                  <input name="price" type="text" onKeyPress="return isNumberKey(event);" required="required" maxlength="5">
                  <span class="right post_fix_label">သိန္း</span>
                </div>
                <div class="large-2 column text-right nopadding"><label>စလစ်</label></div>
                <div class="large-2 column">
                  <div class="switch round">
                    <input id="np" name="slip" type="radio" checked value="1">
                    <label for="np" onclick="">ပါြပီး</label>

                    <input id="np1" name="slip" type="radio" value="0">
                    <label for="np1" onclick="">မပါ</label>
                    <span></span>
                  </div>
                </div>
                <div class="large-1 column text-right nopadding"><label>ညိှနုှိင်း</label></div>
                <div class="large-2 column">
                  <div class="switch round">
                    <input id="np2" name="negotiate" type="radio" checked value="1">
                    <label for="np2" onclick="">ရ</label>

                    <input id="np3" name="negotiate" type="radio" value="0">
                    <label for="np3" onclick="">မရ</label>
                    <span></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="large-3 column"><label for="licenseno">နံပါတ်<span class='require'>(<b class="star">*</b>&nbsp;&nbsp;)</span></label></div>
                <div class="large-2 column">
                  <input type="checkbox" name='licenseno' class="chkclass" value="red" checked />
                  <span class='radiolabel'>အနီ</span>
                </div>
                <div class="large-7 column">
                  <input type="checkbox" name='licenseno' class="chkclass" value="black"/>
                  <span class='radiolabel'>အနက္</span>
                </div>
              </div>
              

              <div class="row">
                <div class="large-3 column"><label for="ownerbook">Owner Book<span class='require'>(<b class="star">*</b>&nbsp;&nbsp;)</span></label></div>
                <div class="large-2 column">
                  <input type="checkbox" name='ownerbook' class="chkownerbook" value="finish" checked/>
                  <span class='radiolabel'>ထြက္ျပီး</span>
                </div>
                <div class="large-7 column">
                  <!-- <input type="radio" name='ownerbook' value="unfinish"> -->
                  <input type="checkbox" name='ownerbook' class="chkownerbook" value="unfinish"/>
                  <span class='radiolabel'>မျပီးေသး</span>
                </div>
              </div>

              <div class="row">
                <div class="large-3 column"><label for="no">နံပါတ်(အက္ခရာ)</label></div>
                <div class="large-3 column">
                  <input type="text" name="car_no">
                </div>
                <div class="large-6 column">&nbsp;
                </div>
              </div>

              <div class="row">
                <div class="large-3 column"><label for="email">ကားအၝတ်တံဆိပ် (Make)<span class='require'>(<b class="star">*</b>&nbsp;&nbsp;)</span></label></div>
                <div class="large-5 column">
                  <select name="makeid" id='make'>
                    @foreach($response['make'] as $make)
                      <option value="{{ $make->id }}">{{ $make->make }}</option>
                    @endforeach
                    
                  </select>
                </div>
                <div class="large-4 column">&nbsp;</div>

              </div>
              <div class="cleardiv">&nbsp;</div>

              <div class="row">
                <div class="large-3 column"><label for="email">ကားအမျုိးအစား<br>(Model)<span class='require'>(<b class="star">*</b>&nbsp;&nbsp;)</span></label></div>
                <div class="large-5 column">
                  <div id='models'>
                    <select name="modelid" id='model' required>
                      <option value="">Select Model</option>
                      
                    </select>
                  </div>
                  <div id='loading' style="display:none;">Loading....</div>
                </div>
                <div class="large-4 column">&nbsp;</div>

              </div>
              <div class="cleardiv">&nbsp;</div>

              <div class="row">
                <div class="large-3 column"><label for="email">ကားေဘာ်ဒီ အမျုိးအစား (Body Type)</label><span class='require'>(<b class="star">*</b>&nbsp;&nbsp;)</span></div>
                <div class="large-5 column">
                  <select name="bodyid" id='bodies'>
                    @foreach($response['body'] as $body)
                      <option value="{{ $body->id }}">{{ $body->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="large-4 column">&nbsp;</div>

              </div>
              <div class="cleardiv">&nbsp;</div>

              <div class="row">
                <div class="large-3 column"><label for="email">Year (made)<span class='require'>(<b class="star">*</b>&nbsp;&nbsp;)</span></label></div>
                <div class="large-5 column">
                  <?php $year=date('Y');  $nextyear=++$year;?>
                  <select name="year" id='year'>
                    <option value="">Select Year</option>
                    @for($i=$nextyear; $i>=1988;$i--)
                      <option value="{{$i}}">{{$i}}</option>
                    @endfor
                  </select>
                </div>
                <div class="large-4 column">&nbsp;</div>

              </div><br>

              <div class="row">
                <div class="large-3 column"><label for="email">Transmission (ဂီယာ)</label></div>
                <div class="large-5 column">
                  <select name="transmission" id='transmission'>
                    <option value="Automatic">Automatic</option>
                    <option value="Manual">Manual</option>
                    <option value="Auto-Manual">Auto-Manual</option>
                    <option value="Others">Others</option>
                  </select>
                </div>
                <div class="large-4 column">&nbsp;</div>
              </div>
              <div class="cleardiv">&nbsp;</div>

              <div class="row">
                <div class="large-3 column"><label for="email">Hand Drive</label></div>
                <div class="large-5 column">
                  <select name="handdrive" id='handdrive'>
                    <option value="">Select Hand Drive</option>
                    <option value="Left">Left</option>
                    <option value="Right">Right</option>
                  </select>
                </div>
                <div class="large-4 column">&nbsp;</div>
              </div>
              <div class="cleardiv">&nbsp;</div>

              <div class="row">
                <div class="large-3 column"><label for="price">Engine Power <span class='require'>(<b class="star">*</b>&nbsp;&nbsp;)</span></label></label></div>
                <div class="large-5 column">
                  <select name="enginepower" id='engine' required>
                    <option value="">Select Engine Power</option>
                      @if($response['enginepowers'])
                        @foreach($response['enginepowers'] as $enginepower)
                          <option value="{{$enginepower['id']}}">{{$enginepower['name']}}</option>
                        @endforeach
                      @endif
                  </select>
                </div>
                <div class="large-4 column">&nbsp;</div>

              </div><br>
              <div class="row">
                <div class="large-3 column"><label for="email">Fuel (ေလာင်စာ)</label></div>
                <div class="large-5 column">
                  <select name="fuel" id='fuel'>
                    <option value="CNG">CNG</option>
                    <option value="Diesel">Diesel</option>
                    <option value="Octane">Octane</option>
                    <option value="Others">Others</option>
                  </select>
                </div>
                <div class="large-4 column">&nbsp;</div>

              </div>
              <div class="cleardiv">&nbsp;</div>

              <div class="row">
                <div class="large-3 column"><label for="price">Mileage (ေမာင်းနှင်ြပီးကီလုိ)</label></div>
                <div class="large-3 column">
                  <input name="mileage" type="text" maxlength="11">
                </div>
                <div class="large-6 column"><span class='post_fix_label' style="left:-11px;">(km)</span></div>
              </div>

              <div class="row">
                <div class="large-3 column"><label for="email">Condition (ကားအေြခအေန)</label></div>
                <div class="large-5 column">
                  <select name="conditionid" id='condition'>
                    @foreach($response['condition'] as $condition)
                      <option value="{{ $condition->id }}">{{ $condition->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="large-4 column">&nbsp;</div>

              </div><br>

              <div class="row">
                <div class="large-3 column"><label for="email">Color</label></div>
                <div class="large-5 column">
                  <select name="colorid" id='color'>
                    @foreach($response['color'] as $color)
                      <option value="{{ $color->id }}">{{ $color->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="large-4 column">&nbsp;</div>
              </div><br>

              <div class="row">
                <div class="large-3 column"><label for="seater">Seater</label></div>
                <div class="large-5 column">
                  <select name="seater" id='seater'>
                    <option value="">Select Seater</option>
                    @for($i=1; $i<=100;$i++)
                      <option value="{{$i}}">{{$i}}</option>
                    @endfor
                  </select>
                </div>
                <div class="large-4 column">&nbsp;</div>
              </div><br>

              <div class="row">
                <div class="large-3 column"><label for="seatrow">Seat Row</label></div>
                <div class="large-5 column">
                  <select name="seatrow" id='seatrow'>
                    <option value="">Select Seat Row</option>
                    @for($i=1; $i<=100;$i++)
                      <option value="{{$i}}">{{$i}}</option>
                    @endfor
                  </select>
                </div>
                <div class="large-4 column">&nbsp;</div>
              </div><br>

              
              <div class="row">
                <div class="large-3 column"><label for="email">က.ည.န လုိင်စင် (တိုင်း/ြပည်နယ်)</label></div>
                <div class="large-5 column">
                  <select name="cityid" id='city'>
                    @foreach($response['city'] as $city)
                      <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="large-4 column">&nbsp;</div>

              </div><br>

              <div class="row">
                <div class="large-3 column"><label for="email">Country </label></div>
                <div class="large-5 column">
                  <select name="country" id='country'>
                    <option value="Myanmar">Myanmar</option>
                  </select>
                </div>
                <div class="large-4 column">&nbsp;</div>

              </div><br><hr>


              <div class="row">
                <div class="large-3 column"><label for="email">ပါဝင်ေသာ ပစ္စည်းများ</label></div>
                <div class="large-9 columns" style="padding-left:1rem;">
                    <?php $i=1; $count= count($response['ingredient']);?>
                    @foreach($response['ingredient'] as $ingredient)
                      @if($i==1 || $i%3==0)
                      <div class="row">
                      @endif
                      <div class="large-4 column left">
                        <input type="checkbox" name='ingredient[]' value="{{ $ingredient->id }}">
                        <label>{{ $ingredient->name }}</label><br>
                      </div>
                      @if($i%3==0 || $i==$count)
                      </div>
                      @endif
                    <?php $i++ ?>
                    @endforeach
                    
                  <!-- </div> -->
                </div>
              </div><br><hr>

              <div class="row">
                <div class="large-3 column"><label for="image">Image<span class='require'>(<b class="star">*</b>&nbsp;&nbsp;)</span></label></div>
                <div class="large-9 column">
                    <div class="row">
                        <div class="large-4 columns">
                          <div class="file-upload">
                              <span class="text-center">Upload</span>
                              <input type="file" name="image_file" id="image_file" onchange="fileSelected('uploadfiles/');" required/>
                          </div>
                        </div>
                        <div class="large-8 columns">
                          <div id="error">You should select valid image files only!</div>
                          <div id="error2">An error occurred while uploading the file</div>
                          <div id="abort">The upload has been canceled by the user or the browser dropped the connection</div>
                          <div id="warnsize">Your file is very big. We can't accept it. Please select more small file</div>

                          <div id="progress_info">
                            <div id="progress"></div>
                            <div id="progress_percent">&nbsp;</div>
                            <div class="clear_both"></div>
                              <div>
                                <div id="speed">&nbsp;</div>
                                <div id="remaining">&nbsp;</div>
                                <div id="b_transfered">&nbsp;</div>
                                <div class="clear_both"></div>
                              </div>
                            <div id="upload_response"></div>
                          </div>
                          
                            <div class="previewstyle">
                              <img id="preview" class="preview" />
                            </div>
                          <div id="progress_info">
                                        <div id="progress"></div>
                                        <div id="progress_percent">&nbsp;</div>
                                        <div class="clear_both"></div>
                                        <div>
                                            <div id="speed">&nbsp;</div>
                                            <div id="remaining">&nbsp;</div>
                                            <div id="b_transfered">&nbsp;</div>
                                            <div class="clear_both"></div>
                                        </div>
                                        <div id="upload_response"></div>
                                    </div>
                        </div>
                    </div>
                </div>
              </div>
              <br>

              <div class="row">
                <div class="large-3 columns"><label>ေြပာြကားချင်သည့်အချက်အလက်များ</label></div>
                <div class="large-9 columns" style="padding-right:3rem;">
                    <textarea name="description" id="tinymce"></textarea>
                </div>
            </div><br>

                <div class="row">
                <div class="large-3 column"><label for="image">Gallery</label></div>
                <div class="large-9 column" style="padding-left:1.4rem;">
                  <!--<label for="item">item <i class="text-red"></i></label><br> -->

                    <div class="gallery-input" style="background:transparent;">
                      <ul style="margin-top: -30px;margin-left: -4px;">
                        <div class="gallery_container">
                        </div>
                        <div class="script"></div>
                        <div class="upload" style="width:180px;">
                          <span style="margin-left:63px;">Upload</span>
                          <input type="file" id="gallery_upload" style="width:180px; text-align:center;" data-url="../carphoto/php/index.php" multiple >
                        </div>
                      </ul>
                    </div>
                </div>
              </div><br>


              <div class="row">
                <div class="large-3 column">&nbsp;</div>
                <div class="large-9 column">
                  <input type = "hidden" value = "auto_mobile" name="status"/>
                  <input type = "submit" value = "Save" class="btn search btn-primary" id="btn_create" />
                </div>
              </div>
            </form>
          @else
            <p class="padding-10"> Please <a href='#login'>Login</a> or <a href="/users/register">Register.</a> </p>
          @endif
        </div>
    </div>
    <div class="clearfix"></div>
	</div>
  <div class="clear">&nbsp;</div>


{{HTML::script('../../../js/imageupload.js')}}
{{HTML::script('../../src/jquery.fileupload.js')}}
{{HTML::script('../../js/fileupload.js')}}
<script type="text/javascript">
        $(function(){
              $("input:checkbox.chkclass").click(function(){
                $("input:checkbox.chkclass").not($(this)).removeAttr("checked");
                $(this).attr("checked", $(this).attr("checked"));    
              });
              $("input:checkbox.chkownerbook").click(function(){
                $("input:checkbox.chkownerbook").not($(this)).removeAttr("checked");
                $(this).attr("checked", $(this).attr("checked"));    
              });

              

          $('#models').hide();
            var make = $('#make').val();
              $.get('/modellist/'+make,function(data){
                var result = '<option value="" selected>Select Model</option>';
                for (var i = 0; i < data.length; i++) {
                  result += '<option value="'+data[i].id+'">'+data[i].model+'</option>';
                }
                  $('#model').html(result);
                $('#model').select2();
                $('#models').show();
              }); 
            $('#categories').select2();
            $('#make').select2();
            $('#model').select2();
            $('#bodies').select2();
            $('#transmission').select2();
            $('#handdrive').select2();
            $('#fuel').select2();
            $('#color').select2();
            $('#seater').select2();
            $('#seatrow').select2();
            $('#condition').select2();
            $('#year').select2();
            $('#engine').select2();
            $('#city').select2();
            $('#country').select2();
            $('#status').select2();

      });
      function isNumberKey(evt)
              {
                var charCode = (evt.which) ? evt.which : event.keyCode
                if (charCode > 31 && (charCode < 48 || charCode > 57) )
                  return false;
                
                return true;
                
              }

      $('#make').change(function(){
          $('#models').hide();
          var make = $('#make').val();
            $.get('/modellist/'+make,function(data){
              var result = '<option value="" selected>Select Model</option>';
              for (var i = 0; i < data.length; i++) {
                result += '<option value="'+data[i].id+'">'+data[i].model+'</option>';
              }
                $('#model').html(result);
              $('#model').select2();
              $('#models').show();
            });
        });
</script>
@stop
