@extends('../master')
@section('content')
      {{HTML::style('../../css/form_style.css')}}
      {{HTML::style('../../css/upload.css')}}
  <style type="text/css">
    .addnew-form .gallery-input {
      background: transparent;
    }
    div.switch label {
      line-height: 2.1rem;
    }
    div.switch.round label {
        left: 2%;
        color: #F00;
    }
    div.switch input:last-of-type:checked + label, div.switch input:last-of-type:checked + span + label {
        left: auto;
        right: -27%;
        margin-top: 5px;
    }
    div.switch {background-color: transparent;}
    div.switch span:last-child {box-shadow: none;}
  
  </style>
	<div class="large-9 columns">
		<div class="row">
            <!-- <p class="title">ကားအသစ္တင္ရန္</p> -->
        <div class="large-12 columns list-frame">
          <div class="content-title">
            <span class="icon-logo"></span>
              ကားအချက်အလက် ြပင်ရန်
            <span class="bottom-line"></span>
          </div>
        @if(Auth::check())
        <form id="upload_form" class="row custom addnew-form" action = "/updatecar/{{$response['car']->id}}" method= "post" enctype="multipart/form-data">
            <div class="row">
              <div class="large-3 column"><label for="email">Category<span class='require'>(*)</span></label></div>
              <div class="large-5 column">
                <select name="category" id='categories'>
                  <option value="ျမန္မာျပည္တြင္ေရာက္ရွိေနေသာ ကားမ်ား" @if($response['car']->category=='ျမန္မာျပည္တြင္ေရာက္ရွိေနေသာ ကားမ်ား') selected @else @endif>ျမန္မာျပည္တြင္ေရာက္ရွိေနေသာ ကားမ်ား</option>
                  <option value="ဆိပ္ကမ္းေရာက္ တန္ဖုိးျဖင့္ေရာင္းမည့္ကားမ်ား" @if($response['car']->category=='ဆိပ္ကမ္းေရာက္ တန္ဖုိးျဖင့္ေရာင္းမည့္ကားမ်ား') selected @else @endif>ဆိပ္ကမ္းေရာက္ တန္ဖုိးျဖင့္ေရာင္းမည့္ကားမ်ား</option>
                  <option value="စလစ္မ်ား" @if($response['car']->category=='စလစ္မ်ား') selected @else @endif>စလစ္မ်ား</option>
                  <option value="အပ္ႏွံရမည့္ ယဥ္အုိယဥ္ေဟာင္းမ်ား" @if($response['car']->category=='အပ္ႏွံရမည့္ ယဥ္အုိယဥ္ေဟာင္းမ်ား') selected @else @endif>အပ္ႏွံရမည့္ ယဥ္အုိယဥ္ေဟာင္းမ်ား</option>
                </select>
                <input type="hidden" name='updatecar' value="{{Auth::user()->id}}">
              </div>
              <div class="large-4 column">&nbsp;</div>

            </div>
            <div class="cleardiv">&nbsp;</div>
            <div class="row">
                <div class="large-3 column"><label for="price">Price<span class='require'>(*)</span></label></div>
                <div class="large-2 column">
                  <input name="price" type="text" required="required" value="{{$response['car']->price}}" onKeyPress="return isNumberKey(event);" maxlength="5">
                  <span class="right post_fix_label">သိန္း</span>
                  <!-- <input name="price" type="text" onKeyPress="return isNumberKey(event);" required="required" maxlength="9"> -->
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
            <!-- <div class="row">
              <div class="large-3 column"><label for="price">Price<span class='require'>(*)</span></label></div>
              <div class="large-3 column">
                <input name="price" type="text" required="required" value="{{$response['car']->price}}" onKeyPress="return isNumberKey(event);" maxlength="9">
              </div>
              <div class="large-7 column">&nbsp;</div>
            </div> -->
            <div class="row">
              <div class="large-3 column"><label for="licenseno">နံပါတ်<span class='require'>(*)</span></label></div>
              <div class="large-2 column">
                <input type="checkbox" name='licenseno' class="chkclass" value="red" @if($response['car']->licenseno == 'red') checked @else @endif>
                <span class='radiolabel'>အနီ</span>
              </div>
              <div class="large-7 column">
                <input type="checkbox" name='licenseno' class="chkclass" value="black" @if($response['car']->licenseno == 'black') checked @else @endif>
                <span class='radiolabel'>အနက္</span>
              </div>
            </div>
            <div class="row">
              <div class="large-3 column"><label for="ownerbook">Owner Book<span class='require'>(*)</span></label></div>
              <div class="large-2 column">
                <input type="checkbox" name='ownerbook' class="chkownerbook" value="finish" @if($response['car']->ownerbook == 'finish') checked @else @endif>
                <span class='radiolabel'>ထြက္ျပီး</span>
              </div>
              <div class="large-7 column">
                <input type="checkbox" name='ownerbook' class="chkownerbook" value="unfinish" @if($response['car']->ownerbook == 'unfinish') checked @else @endif>
                <span class='radiolabel'>မျပီးေသး</span>
              </div>
            </div>
            <div class="row">
              <div class="large-3 column"><label for="no">နံပါတ်(အက္ခရာ)</label></div>
              <div class="large-3 column">
                <input type="text" name="car_no" value="{{$response['car']->carno}}">
              </div>
              <div class="large-6 column">&nbsp;
              </div>
            </div>

            <div class="row">
              <div class="large-3 column"><label for="email">ကားအၝတ်တံဆိပ် (Makes)<span class='require'>(*)</span></label></div>
              <div class="large-5 column">
                <select name="makeid" id='make'>
                  @foreach($response['make'] as $make)
                    <option value="{{ $make->id }}"
                    @if($make->id== $response['car']->makeid) selected @else @endif>{{ $make->make }}</option>
                  @endforeach
                </select>
              </div>
              <div class="large-4 column">&nbsp;</div>

            </div>
            <div class="cleardiv">&nbsp;</div>


            <div class="row">
              <div class="large-3 column"><label for="email">ကားအမျုိးအစား (Models)<span class='require'>(*)</span></label></div>
              <div class="large-5 column">
                <div id='models'>
                  <select name="modelid" id='model' required>
                    <option value="">Select Model</option>
                    @foreach($response['model'] as $model)
                    <option value="{{$model->id}}" @if($model->id== $response['car']->modelid) selected @else @endif>{{$model->model}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="large-4 column">&nbsp;</div>

            </div>
            <div class="cleardiv">&nbsp;</div>


            <div class="row">
              <div class="large-3 column"><label for="email">ကားေဘာ်ဒီ အမျုိးအစား (Body Type)<span class='require'>(*)</span></label></div>
              <div class="large-5 column">
                <select name="bodyid" id='bodies'>
                  @foreach($response['body'] as $body)
                    <option value="{{ $body->id }}" @if($body->id== $response['car']->bodyid) selected @else @endif>{{ $body->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="large-4 column">&nbsp;</div>

            </div>
            <div class="cleardiv">&nbsp;</div>
            <div class="row">
              <div class="large-3 column"><label for="email">Year (made)<span class='require'>(*)</span></label></div>
              <div class="large-5 column">
                <?php $now_year=date('Y')+1; ?>
                <select name="year" id='year'>
                  @for($i=$now_year; $i>=1988 ; $i--)
                  <option value="{{$i}}" @if($i== $response['car']->year) selected @else @endif>{{$i}}</option>
                  @endfor
                </select>
              </div>
              <div class="large-4 column">&nbsp;</div>

            </div><br>

            <div class="row">
              <div class="large-3 column"><label for="email">Transmission (ဂီယာ)</label></div>
              <div class="large-5 column">
                <select name="transmission" id='transmission'>
                  <option value="Automatic" @if($response['car']->transmission=='Automatic') selected @else @endif>Automatic</option>
                  <option value="Manual" @if($response['car']->transmission=='Manual') selected @else @endif>Manual</option>
                  <option value="Auto-Manual" @if($response['car']->transmission=='Auto-Manual') selected @else @endif>Auto-Manual</option>
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
                    <option value="Left" @if($response['car']->handdrive=='Left') selected @else @endif >Left</option>
                    <option value="Right" @if($response['car']->handdrive=='Right') selected @else @endif>Right</option>
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
                        <option value="{{$enginepower['id']}}"
                          @if($enginepower['id']== $response['car']->enginepower_id) selected @else @endif
                        >{{$enginepower['name']}}</option>
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
                  <option value="CNG" @if($response['car']->fuel=='CNG') selected @else @endif>CNG</option>
                  <option value="Diesel" @if($response['car']->fuel=='Diesel') selected @else @endif>Diesel</option>
                  <option value="Gasoline" @if($response['car']->fuel=='Gasoline') selected @else @endif>Gasoline</option>
                  <option value="Octane" @if($response['car']->fuel=='Octane') selected @else @endif>Octane</option>
                  <option value="Others" @if($response['car']->fuel=='Others') selected @else @endif>Others</option>
                </select>
              </div>
              <div class="large-4 column">&nbsp;</div>

            </div>
            <div class="cleardiv">&nbsp;</div>


            <div class="row">
              <div class="large-3 column"><label for="price">Mileage (ေမာင်းနှင်ြပီးကီလုိ)</label></div>
              <div class="large-3 column">
                <input name="mileage" type="text" value="{{ $response['car']->mileage }}" maxlength="11">
              </div>
              <div class="large-6 column"><span class='post_fix_label' style="left:-11px;">(km)</span></div>
            </div>

            <div class="row">
              <div class="large-3 column"><label for="email">Condition (ကားအေြခအေန)</label></div>
              <div class="large-5 column">
                <select name="conditionid" id='condition'>
                  @foreach($response['condition'] as $condition)
                    <option value="{{ $condition->id }}" @if($response['car']->conditionid==$condition->id) selected @else @endif>{{ $condition->name }}</option>
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
                    <option value="{{ $color->id }}" @if($response['car']->conditionid==$color->id) selected @else @endif>{{ $color->name }}</option>
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
                      <option value="{{$i}}" @if($response['car']->seater== $i) selected @else @endif>{{$i}}</option>
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
                      <option value="{{$i}}" @if($response['car']->seater== $i) selected @else @endif>{{$i}}</option>
                    @endfor
                  </select>
                </div>
                <div class="large-4 column">&nbsp;</div>
              </div><br>

            

            <div class="row">
              <div class="large-3 column"><label for="email">City (က.ည.န လုိင်စင်ြမို့)</label></div>
              <div class="large-5 column">
                <select name="cityid" id='city'>
                  @foreach($response['city'] as $city)
                    <option value="{{ $city->id }}" @if($city->id== $response['car']->cityid) selected @else @endif>{{ $city->name }}</option>
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

            <div class="">
            <div class="row">
              <div class="large-3 column"><label for="email">ပါဝင်ေသာ ပစ္စည်းများ</label></div>
              <div class="large-9 columns" style="padding-left:1.4rem;">
                <div class="row">
                  <?php $i=1; $count= count($response['ingredient']);?>
                  @foreach($response['ingredient'] as $ingredient)
                     @if($i==1 || $i%3==0)
                      <div class="row">
                    @endif
                    <div class="large-4 column left">
                      <input type="checkbox" name='ingredient[]' value="{{ $ingredient->id }}"
                        @for($l=0; $l < count($response['caringredients']); $l++)
                            @if($response['caringredients'][$l] == $ingredient['id'])
                              checked
                            @else
                            @endif
                          @endfor
                      >
                      <label>{{ $ingredient->name }}</label><br>
                    </div>
                    @if($i%3==0 || $i==$count)
                    </div>
                    @endif
                  <?php $i++ ?>
                  @endforeach
                  
                </div>
              </div>

            </div><br><hr>

            <div class="row">
                  <div class="large-3 column"><label for="title">image</label></div>
                  <div class="large-9 column">
                    <label for="photo">Image <i>( Width:900px & Height:600px) OR (3:2) size</i></label>
                    <div class="row">
                      <div class="large-4 columns">
                                  <div class="file-upload">
                          <span> Upload</span>
                          <input type="file" name="image_file" id="image_file" onchange="fileSelected();" />
                        </div>
                                </div>
                                <div class="large-4 columns">
                                                                 
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
                              </div>
                                  
                              <div class="large-4 columns">
                                <div class="previewstyle">
                                  <img id="oldpreview" class="preview" src="../../carphoto/php/files/{{ $response['car']->image }}" />
                                </div>  
                              </div>
                    </div>
                  </div>
                  <input type="hidden" name="hdphoto" value="{{ $response['car']->image }}">
            </div>
            <br>

            <div class="row">
              <div class="large-3 columns"><label>ေြပာြကားချင်သည့်အချက်အလက်များ</label></div>
              <div class="large-9 columns">
                <textarea name="description" id="tinymce">{{ $response['car']->description}}</textarea>
              </div>

            </div><br>

            <div class="row">
              <div class="columns large-3">
                <label for="text">Gallery</label>
              </div>
              <div class="columns large-9">
                <div class="gallery-input">
                  <ul>  
                    <div class="gallery_container">
                      @foreach($response['car']->images as $row)
                          <li class="gallery_photo">
                            <img src="../../carphoto/php/files/thumbnail/{{ $row->image}}"></img><span class="icon-cancel-circle">
                            <input type="hidden" value="{{ $row->image }}" name="gallery[]"></input></span>
                            <script>
                                $(".gallery_photo").click(function(){$(this).remove();});
                              </script>
                          </li>
                      @endforeach
                    </div>
                    <div class="script"></div>
                    <div class="upload">
                      <span>Upload</span>
                      <input type="file" id="gallery_upload" data-url="../../carphoto/php/index.php" multiple >
                    </div>
                  </ul>
                </div>
              </div>
            </div>

            
            <div class="row">
              <div class="large-3 column">&nbsp;</div>
              <div class="large-7 column">
                <input type = "submit" value = "Save" class="btn search btn-primary right" id="btn_create" />
              </div>
              <div class="large-2 column"><a href="/sell-car/my-vehicles"><button class="btn search btn-primary">Cancle</button></a></div>

            </div>
        </form><!--end of form--> 
        @else
          <p> Please <a href='#login'>Login</a> or <a href="">Register.</a> </p>
        @endif
        </div>
      </div><div class="clear"></div>
	</div><div class="clear">&nbsp;</div>


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
              
          $('#categories').select2();
          $('#make').select2();
          $('#model').select2();
          $('#bodies').select2();
          $('#transmission').select2();
          $('#fuel').select2();
          $('#color').select2();
          $('#handdrive').select2();
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
