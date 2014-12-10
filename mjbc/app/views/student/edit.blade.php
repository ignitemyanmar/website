@extends('../admin')
@section('content')
{{HTML::style('../../src/select2.css')}}
{{HTML::style('../../css/upload.css')}}
{{HTML::script('../../js/imageupload.js')}}
<style type="text/css">
   .select2-container {min-width: 50%;}
   .select2-container .select2-choice{background: transparent;}
   .require{ color: red; font-weight: bold;font-size: 18px;margin-right: -12px;}
</style>
<link rel="stylesheet" type="text/css" href="../../assets/chosen-bootstrap/chosen/chosen.css" />
<link rel="stylesheet" type="text/css" href="../../assets/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" />
<link rel="stylesheet" type="text/css" href="../../assets/clockface/css/clockface.css" />
<link rel="stylesheet" type="text/css" href="../../assets/bootstrap-daterangepicker/daterangepicker.css" />
   <!-- BEGIN PAGE --> 
   <div class="page-content">
      <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->   
               <div class="row-fluid">
                  <div class="span12">
                     <!-- BEGIN STYLE CUSTOMIZER -->
                     <div class="color-panel hidden-phone">
                        <div class="color-mode-icons icon-color"></div>
                        <div class="color-mode-icons icon-color-close"></div>
                        <div class="color-mode">
                           <p>THEME COLOR</p>
                           <ul class="inline">
                              <li class="color-black current color-default" data-style="default"></li>
                              <li class="color-blue" data-style="blue"></li>
                              <li class="color-brown" data-style="brown"></li>
                              <li class="color-purple" data-style="purple"></li>
                              <li class="color-white color-light" data-style="light"></li>
                           </ul>
                           <label class="hidden-phone">
                           <input type="checkbox" class="header" checked value="" />
                           <span class="color-mode-label">Fixed Header</span>
                           </label>                    
                        </div>
                     </div>
                     <!-- END BEGIN STYLE CUSTOMIZER -->   
                     <h3 class="page-title">
                        Update Profile
                        <!-- <small>form wizard sample</small> -->
                     </h3>
                     <ul class="breadcrumb">
                        <li>
                           <i class="icon-home"></i>
                           <a href="/">Home</a> 
                           <span class="icon-angle-right"></span>
                        </li>
                        <li>
                           <a href="/studentlist">Student List</a>
                           <span class="icon-angle-right"></span>
                        </li>
                        <li><a href="#">Update Profile</a></li>
                     </ul>
                  </div>
               </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
               <div class="row-fluid">
                  <div class="span12">
                     <div class="portlet box blue" id="form_wizard_1">
                        <div class="portlet-title">
                           <h4>
                              <i class="icon-reorder"></i> Update Profile <!-- - <span class="step-title">Step 1 of 3</span> -->
                           </h4>
                           
                        </div>
                        <div class="portlet-body form">
                           <form action="/updateregister/{{$response['student']['id']}}" class="form-horizontal" method="post" enctype="multipart/form-data">
                              <div class="form-wizard">
                                 
                                 <div class="tab-content">
                                    <div class="tab-pane active" id="tab1">
                                       <h3 class="block">Student information</h3>
                                       <div class="control-group">
                                          <label class="control-label" for="user">User </label>
                                          <div class="controls">
                                             <select name="user" id='user' class="m-wrap span8 chosen">
                                                   @foreach($response['user'] as $objuser)
                                                      <option value="{{$objuser->id}}" @if($objuser->id==$response['student']['user_id'])selected @endif>{{$objuser->name}}</option>
                                                   @endforeach 
                                             </select>    
                                          </div>
                                       </div>
                                       <div class="control-group">
                                          <label class="control-label">Name </label>
                                          <div class="controls">
                                             <input type="text" class="span8 m-wrap" name="name" required value="{{$response['student']['name']}}" />
                                          </div>
                                       </div>
                                       <div class="control-group">
                                          <label class="control-label">Name_mm</label>
                                          <div class="controls">
                                             <input type="text" class="span8 m-wrap" name="name_mm"  value="{{$response['student']['name_mm']}}" />
                                          </div>
                                       </div>
                                       <div class="control-group">
                                          <label class="control-label">Name_jp </label>
                                          <div class="controls">
                                             <input type="text" class="span8 m-wrap" name="name_jp"  value="{{$response['student']['name_jp']}}"/>
                                          </div>
                                       </div>
                                       <div class="control-group">
                                          <label class="control-label">Email </label>
                                          <div class="controls">
                                             <input type="mail" class="span8 m-wrap" required name="email" value="{{$response['student']['email']}}" />
                                          </div>
                                       </div>
                                       <div class="control-group">
                                          <label class="control-label">Password </label>
                                          <div class="controls">
                                             <input type="password" class="span8 m-wrap" required name="password"  placeholder="" />
                                          </div>
                                       </div>
                                       <div class="control-group">
                                          <label class="control-label">Phone </label>
                                          <div class="controls">
                                             <input type="text" class="span8 m-wrap" name="phone" required value="{{$response['student']['phone']}}" />
                                          </div>
                                       </div>
                                       <div class="control-group">
                                          <label class="control-label" >Gender</label>
                                          <div class="controls">
                                             <select name="gender" id='gender' required class="m-wrap span8 chosen">
                                                   <option value="male" @if($response['student']['gender']=='male') selected @endif>Male</option>
                                                   <option value="female" @if($response['student']['gender']=='female') selected @endif>Female</option>
                                             </select>    
                                          </div>
                                       </div>
                                       <div class="control-group">
                                          <label class="control-label">NRC No. </label>
                                          <div class="controls">
                                             <input type="text" class="span8 m-wrap" name="nrc" required value="{{$response['student']['nrc_no']}}" />
                                          </div>
                                       </div>
                                       <div class="row-fluid">
                                          <div class="span4">
                                             <div class="control-group">
                                                <label class="control-label" >Birth_Day</label>
                                                <div class="controls">
                                                   <select name="b_day" id='b_day' required class="m-wrap  span6 chosen">
                                                         @for($i=1; $i <= 31; $i++)
                                                            <option value="{{$i}}" @if($response['student']['birth_day']== $i) selected @endif>{{$i}}</option>
                                                         @endfor
                                                   </select>    
                                                </div>
                                             </div>
                                          </div>
                                          <div class="span4">
                                             <div class="control-group">
                                                <label class="control-label" >Birth_Month</label>
                                                <div class="controls">
                                                   <select name="b_month" id='b_month' required class="m-wrap span6 chosen">
                                                         @for($i=1; $i <= 12; $i++)
                                                            <option value="{{$i}}"@if($response['student']['birth_month']==$i) selected @endif>{{$i}}</option>
                                                         @endfor
                                                   </select>    
                                                </div>
                                             </div>
                                          </div>
                                          <div class="span4">
                                             <div class="control-group">
                                                <label class="control-label" >Birth_Year</label>
                                                <div class="controls">
                                                   <select name="b_year" id='b_year' required class="m-wrap span6 chosen">
                                                         @for($i=1900; $i <= 2014; $i++)
                                                            <option value="{{$i}}"@if($response['student']['birth_year']==$i) selected @endif>{{$i}}</option>
                                                         @endfor
                                                   </select>    
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="control-group">
                                          <label class="control-label">Image <b class="require">(*)</b></label>
                                          <div class="controls images-frame">
                                                <div class="gallery-input">
                                                   <ul>
                                                      <div class="gallery_container">
                                                         <li class="gallery_photo">
                                                             <img src="../../student_img/php/files/thumbnail/{{$response['student']['image']}}"></img><span class="icon-cancel-circle">
                                                             <input type="hidden" value="{{$response['student']['image']}}" name="gallery[]"></input></span>
                                                             <script>
                                                                 $(".gallery_photo").click(function(){$(this).remove();});
                                                               </script>
                                                           </li>
                                                        
                                                      </div>
                                                      <div class="script"></div>
                                                      <div class="upload">
                                                         <span>+</span>
                                                         <input type="file" id="gallery_upload" data-url="../../student_img/php/index.php">
                                                      </div>
                                                   </ul>
                                                </div>
                                                
                                          </div>
                                       </div>
                                       <br>
                                       <div class="control-group">
                                          <label class="control-label">Nationality </label>
                                          <div class="controls">
                                             <input type="text" class="span8 m-wrap" required name="nationality"  value="{{$response['student']['nationality']}}" />
                                          </div>
                                       </div>
                                       <div class="clearfix">&nbsp;</div>
                                    </div>
                                 </div>
                                 <div class="form-actions clearfix">
                                    <a href="/consultancylist" class="btn button-previous">
                                    <i class="m-icon-swapleft"></i> Back 
                                    </a>
                                    <button type="submit" class="btn green button-submit">Save<i class="m-icon-swapright m-icon-white"></i></button>
                                 </div>
                              </div>
                              <div id='arrayinfo'></div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            <!-- END PAGE CONTENT-->         
         </div>
      <!-- END PAGE CONTAINER-->
   </div>
<!-- END PAGE -->  
   <!-- {{HTML::script('../../src/select2.min.js')}} -->
   <script type="text/javascript" src="../../assets/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
   <script type="text/javascript" src="../../assets/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script>
   <script type="text/javascript" src="../../assets/ckeditor/ckeditor.js"></script>  
   {{HTML::script('../../src/jquery-ui.js')}}
   {{HTML::script('../../src/select2.min.js')}}
   
   {{HTML::script('../../src/jquery.fileupload.js')}}
   {{HTML::script('../../js/admin/itemupload.js')}}
   <script type="text/javascript" src="../../assets/clockface/js/clockface.js"></script>
   
@stop