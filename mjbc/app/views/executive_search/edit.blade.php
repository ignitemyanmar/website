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
                        Executive Search Edit
                        <!-- <small>form wizard sample</small> -->
                     </h3>
                     <ul class="breadcrumb">
                        <li>
                           <i class="icon-home"></i>
                           <a href="/">Home</a> 
                           <span class="icon-angle-right"></span>
                        </li>
                        <li>
                           <a href="/e_searchlist">Executive Search List</a>
                           <span class="icon-angle-right"></span>
                        </li>
                        <li><a href="#">Executive Search Edit</a></li>
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
                              <i class="icon-reorder"></i> Executive Search Edit <!-- - <span class="step-title">Step 1 of 3</span> -->
                           </h4>
                           
                        </div>
                        <div class="portlet-body form">
                           <form action="/updatee_search/{{$response->id}}" class="form-horizontal" method="post" enctype="multipart/form-data">
                              <div class="form-wizard">
                                 
                                 <div class="tab-content">
                                    <div class="tab-pane active" id="tab1">
                                       <h3 class="block">Executive Search information</h3>
                                       <div class="control-group">
                                          <label class="control-label">Name </label>
                                          <div class="controls">
                                             <input type="text" class="span6 m-wrap" name="name" required value="{{$response->name}}" />
                                          </div>
                                       </div>
                                       <div class="control-group">
                                          <label class="control-label">Description</label>
                                          <div class="controls">
                                             <textarea class="span8 ckeditor m-wrap" rows="6" name="description">{{$response->description}}</textarea>
                                          </div>
                                       </div>
                                       <div class="control-group">
                                          <label class="control-label">Name_mm</label>
                                          <div class="controls">
                                             <input type="text" class="span6 m-wrap" name="name_mm"  placeholder="Consultancy Name" value="{{$response->name_mm}}"/>
                                          </div>
                                       </div>
                                       <div class="control-group">
                                          <label class="control-label">Description_mm</label>
                                          <div class="controls">
                                             <textarea class="span8 ckeditor m-wrap" rows="6" name="description_mm" >{{$response->description_mm}}</textarea>
                                          </div>
                                       </div>
                                      <div class="control-group">
                                          <label class="control-label">Name_jp </label>
                                          <div class="controls">
                                             <input type="text" class="span6 m-wrap" name="name_jp"  placeholder="Consultancy Name" value="{{$response->name_jp}}"/>
                                          </div>
                                       </div>
                                       <div class="control-group">
                                          <label class="control-label">Description_jp</label>
                                          <div class="controls">
                                             <textarea class="span8 ckeditor m-wrap" rows="6" name="description_jp">{{$response->description_jp}}</textarea>
                                          </div>
                                       </div>
                                        <div class="row-fluid">
                                          <div class="span12">
                                             <div class="span4">
                                                   <div class="control-group">
                                                      <label class="control-label">Start Date</label>
                                                      <div class="controls">
                                                         <div class="input-append date " >
                                                            <input  id="calendar_2" name="sdate" type="text" value="{{$response->start_date}}"/><span class="add-on"><i class="icon-calendar"></i></span>
                                                         </div>
                                                      </div>
                                                   </div>
                                             </div>
                                             <div class="span4">
                                                   <div class="control-group">
                                                      <label class="control-label">End Date</label>
                                                      <div class="controls">
                                                         <div class="input-append date " >
                                                            <input  id="calendar_1" name="edate" type="text" value="{{$response->end_date}}"/><span class="add-on"><i class="icon-calendar"></i></span>
                                                         </div>
                                                      </div>
                                                   </div>
                                             </div>
                                          </div>
                                             <div class="span4">&nbsp;</div>
                                       </div>
                                       <div class="row-fluid">
                                          <div class="span12">
                                             <div class="span4">
                                                   <div class="control-group">
                                                      <label class="control-label"> Start Time</label>
                                                      <div class="controls">
                                                         <div class="input-append">
                                                            <input type="text" id="clockface_2" value="{{$response->start_time}}" name="stime" class="m-wrap small" readonly="" />
                                                            <button class="btn" type="button" id="clockface_2_toggle-btn">
                                                            <i class="icon-time"></i>
                                                            </button>
                                                         </div>
                                                      </div>
                                                   </div>
                                             </div>
                                             <div class="span4">
                                                <div class="control-group">
                                                   <label class="control-label"> End Time</label>
                                                   <div class="controls">
                                                      <div class="input-append">
                                                         <input type="text" id="clockface_endtime" value="{{$response->end_time}}" name="etime" class="m-wrap small" readonly="" />
                                                         <button class="btn" type="button" id="endtime-btn">
                                                         <i class="icon-time"></i>
                                                         </button>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="span4">&nbsp;</div>
                                          </div>
                                       </div>
                                       
                                       <div class="control-group">
                                          <label class="control-label">Image <b class="require">(*)</b></label>
                                          <div class="controls images-frame">
                                                <div class="gallery-input">
                                                   <ul>
                                                      <div class="gallery_container">
                                                         <li class="gallery_photo">
                                                             <img src="../../news_photo/php/files/thumbnail/{{ $response->image}}"></img><span class="icon-cancel-circle">
                                                             <input type="hidden" value="{{ $response->image }}" name="gallery[]"></input></span>
                                                             <script>
                                                                 $(".gallery_photo").click(function(){$(this).remove();});
                                                               </script>
                                                           </li>
                                                        @foreach($response['news_event_images'] as $row)
                                                              <li class="gallery_photo">
                                                                <img src="../../news_photo/php/files/thumbnail/{{ $row->image}}"></img><span class="icon-cancel-circle">
                                                                <input type="hidden" value="{{ $row->image }}" name="gallery[]"></input></span>
                                                                <script>
                                                                    $(".gallery_photo").click(function(){$(this).remove();});
                                                                  </script>
                                                              </li>
                                                          @endforeach
                                                      </div>
                                                      <div class="script"></div>
                                                      <div class="upload">
                                                         <span>+</span>
                                                         <input type="file" id="gallery_upload" data-url="../../news_photo/php/index.php">
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
                                       <br>
                                       <div class="control-group">
                                          <label class="control-label">Venue </label>
                                          <div class="controls">
                                             <input type="text" class="span6 m-wrap" name="venue"  placeholder="News/Event Place" value="{{ $response->venue}}" />
                                          </div>
                                       </div>

                                       <div class="clearfix">&nbsp;</div>
                                    </div>
                                 </div>
                                 <div class="form-actions clearfix">
                                    <a href="/e_searchlist" class="btn button-previous">
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
   {{HTML::script('../../js/calendar-1.5.js')}}
   <link type="text/css" rel="stylesheet" href="../../js/themes/sky-blue/calendar.css" />
      <script type="text/javascript">
      var cal_2 = new Calendar({
         element: 'calendar_1',
         // weekNumbers: true,
         startDay: 1,
         dateFormat: 'm/d/Y',
         onSelect: function (element, selectedDate, date, cell) {
            document.getElementById('date_1').innerHTML = selectedDate;
         }
      });
      var cal_2 = new Calendar({
         element: 'calendar_2',
         // weekNumbers: true,
         startDay: 1,
         dateFormat: 'm/d/Y',
         onSelect: function (element, selectedDate, date, cell) {
            document.getElementById('date_1').innerHTML = selectedDate;
         }
      });
      </script>
   <script type="text/javascript" src="../../assets/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
   <script type="text/javascript" src="../../assets/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script>
   <script type="text/javascript" src="../../assets/ckeditor/ckeditor.js"></script>  
   {{HTML::script('../../src/jquery-ui.js')}}
   {{HTML::script('../../src/select2.min.js')}}
   
   {{HTML::script('../../src/jquery.fileupload.js')}}
   {{HTML::script('../../js/admin/itemupload.js')}}
   <script type="text/javascript" src="../../assets/clockface/js/clockface.js"></script>
   
@stop