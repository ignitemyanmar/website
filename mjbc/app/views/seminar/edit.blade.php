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
                        Seminar Edit
                        <!-- <small>form wizard sample</small> -->
                     </h3>
                     <ul class="breadcrumb">
                        <li>
                           <i class="icon-home"></i>
                           <a href="/">Home</a> 
                           <span class="icon-angle-right"></span>
                        </li>
                        <li>
                           <a href="/consultancylist">Seminar List</a>
                           <span class="icon-angle-right"></span>
                        </li>
                        <li><a href="#">Seminar Edit</a></li>
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
                              <i class="icon-reorder"></i> Seminar Edit <!-- - <span class="step-title">Step 1 of 3</span> -->
                           </h4>
                           
                        </div>
                        <div class="portlet-body form">
                           <form action="/updateseminar/{{$response['seminar']['id']}}" class="form-horizontal" method="post" enctype="multipart/form-data">
                              <div class="form-wizard">
                                 

                                 <div class="tab-content">
                                    <div class="tab-pane active" id="tab1">
                                       <h3 class="block">Seminar information</h3>
                                          <div class="row-fluid">
                                             <div class="span12">
                                                <div class="control-group">
                                                   <label class="control-label" for="seminartype">Category</label>
                                                   <div class="controls">
                                                      <?php $categories=array('Seminar','Consultancy','Executive Search'); ?>
                                                      <select name="category" class="m-wrap span8 chosen">
                                                         @foreach($categories as $category)
                                                            <option value="{{$category}}" @if($category==$response['seminar']['category']) selected @endif>{{$category}}</option>
                                                         @endforeach   
                                                      </select>    
                                                   </div>
                                                </div>
                                             </div>
                                          </div>

                                          <div class="control-group">
                                             <label class="control-label" for="seminartype">Seminar Type</label>
                                             <div class="controls">
                                                <select name="seminartype" id='seminartype' class="m-wrap span8 chosen">
                                                   @foreach($response['seminartype'] as $objseminartype)
                                                      <option value="{{$objseminartype->id}}" @if($objseminartype->id==$response['seminar']['seminar_type_id'])selected @endif>{{$objseminartype->name}}</option>
                                                   @endforeach   
                                                </select>    
                                             </div>
                                          </div>

                                          <div class="row-fluid">
                                             <div class="span12">
                                                <div class="control-group">
                                                   <label class="control-label" for="seminar">Language</label>
                                                   <div class="controls">
                                                      <select name="languageid" id='language' class="m-wrap span8 chosen">
                                                         @if($response['language'])
                                                            @foreach($response['language'] as $language)
                                                               <option value="{{$language->id}}" @if($language->id==$response['seminar']['language_id']) selected @endif>{{$language->name}}</option>
                                                            @endforeach
                                                         @endif  
                                                      </select>    
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="control-group">
                                             <label class="control-label">Seminar Name</label>
                                             <div class="controls">
                                                <input type="text" class="span12 m-wrap" name="name" required placeholder="Seminar Name" value="{{$response['seminar']['name']}}" />
                                             </div>
                                          </div>
                                       <div class="control-group">
                                          <label class="control-label">Code No</label>
                                          <div class="controls">
                                             <input type="text" class="span12 m-wrap" name="codeno" required placeholder="Code No" value="{{$response['seminar']['code_no']}}"/>
                                          </div>
                                       </div>
                                       <div class="control-group">
                                          <label class="control-label">Training Name (Content)</label>
                                          <div class="controls">
                                             <input type="text" class="span12 m-wrap" name="t_name" required placeholder="Training Name" value="{{$response['seminar']['training_name']}}"/>
                                          </div>
                                       </div>
                                      <!--  <div class="control-group">
                                          <label class="control-label">Training Needs</label>
                                          <div class="controls">
                                             <input type="text" class="span6 m-wrap" name="t_needs" required placeholder="Training Needs" value="{{$response['seminar']['training_needs']}}" />
                                          </div>
                                       </div> -->

                                       <div class="control-group">
                                          <label class="control-label">Training Needs</label>
                                          <div class="controls">
                                             <textarea class="span8 ckeditor m-wrap" rows="6" name="t_needs">{{$response['seminar']['training_needs']}}</textarea>
                                          </div>
                                       </div>

                                       <div class="control-group">
                                          <label class="control-label">Subjects (Participants)</label>
                                          <div class="controls">
                                             <input type="text" class="span12 m-wrap" name="subject" required placeholder="Subjects" value="{{$response['seminar']['subject']}}"/>
                                          </div>
                                       </div>
                                       <div class="control-group">
                                          <label class="control-label">Constant Members (Capacity)</label>
                                          <div class="controls">
                                             <input type="text" class="span12 m-wrap" name="member" required placeholder="Constant Members" value="{{$response['seminar']['constant_members']}}"/>
                                          </div>
                                       </div>
                                       <div class="control-group">
                                          <label class="control-label">Tuition Fees</label>
                                          <div class="controls">
                                             <input type="text" class="span12 m-wrap" name="tuitionfees" required placeholder="Fees" value="{{$response['seminar']['tuition_fees']}}"/>
                                          </div>
                                       </div>
                                       <div class="control-group">
                                          <label class="control-label">Implementation_Methods (style)</label>
                                          <div class="controls">
                                             <input type="text" class="span12 m-wrap" name="implement" required placeholder="Methods" value="{{$response['seminar']['implementation_method']}}" />
                                          </div>
                                       </div>
                                      
                                       <div class="control-group">
                                          <label class="control-label">Physician (Target)</label>
                                          <div class="controls">
                                             <input type="text" class="span12 m-wrap" name="physician" required placeholder="Physician" value="{{$response['seminar']['physician']}}"/>
                                          </div>
                                       </div>

                                       <div class="control-group">
                                          <label class="control-label">Language</label>
                                          <div class="controls">
                                             <input type="text" class="span12 m-wrap" name="language" required placeholder="Myanmar" value="{{$response['seminar']['language']}}"/>
                                          </div>
                                       </div>
                                       <br>
                                      <div class="control-group">
                                          <label class="control-label">Description</label>
                                          <div class="controls">
                                             <textarea class="span8 ckeditor m-wrap" rows="6" name="description">{{$response['seminar']['description']}}</textarea>
                                          </div>
                                       </div>
                                       <div class="control-group">
                                          <label class="control-label">Image <b class="require">(*)</b></label>
                                          <div class="controls images-frame">
                                                <div class="gallery-input">
                                                   <ul>
                                                      <div class="gallery_container">
                                                        @foreach($response['seminarimg'] as $row)
                                                            @if($row->seminar_id == $response['seminar']['id'])
                                                            <li class="gallery_photo">
                                                                <img src="../../seminar_img/php/files/thumbnail/{{ $row->images}}"></img><span class="icon-cancel-circle">
                                                                <input type="hidden" value="{{ $row->images}}" name="gallery[]"></input></span>
                                                                <script>
                                                                    $(".gallery_photo").click(function(){$(this).remove();});
                                                                  </script>
                                                            </li>
                                                            @endif
                                                        @endforeach
                                                         
                                                      </div>
                                                      <div class="script"></div>
                                                      <div class="upload">
                                                         <span>+</span>
                                                         <input type="file" id="gallery_upload" data-url="../../seminar_img/php/index.php">
                                                      </div>
                                                   </ul>
                                                </div>
                                                <div class="span12 responsive">
                                                   <span class="label label-important">NOTE!</span>
                                                   <span>Maximun images is 5.</span>
                                                   <span>File size must be maximum width and height(980px X 600px) & minimun width and height(150px X 80px).</span>
                                                </div>
                                          </div>
                                    </div>
                                       <div class="clearfix">&nbsp;</div>
                                    </div>
                                 </div>
                                 <div class="form-actions clearfix">
                                    <a href="/seminarlist" class="btn button-previous">
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