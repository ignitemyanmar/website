@extends('../admin')
@section('content')
{{HTML::style('../../css/upload.css')}}
{{HTML::script('../../js/imageupload.js')}}
<link rel="stylesheet" type="text/css" href="../../assets/clockface/css/clockface.css" />
<link rel="stylesheet" type="text/css" href="../../assets/bootstrap-datepicker/css/datepicker.css" />
   <!-- BEGIN PAGE --> 
   <div class="page-content">
      <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->   
               <div class="row-fluid">
                  <div class="span12">
                     <h3 class="page-title">
                        News & Events Update
                        <!-- <small>form wizard sample</small> -->
                     </h3>
                     <ul class="breadcrumb">
                        <li>
                           <i class="icon-home"></i>
                           <a href="/">Home</a> 
                           <span class="icon-angle-right"></span>
                        </li>
                        <li>
                           <a href="/e_searchlist">News & Events List</a>
                           <span class="icon-angle-right"></span>
                        </li>
                        <li><a href="#">News & Events Update</a></li>
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
                              <i class="icon-reorder"></i> News & Events Update <!-- - <span class="step-title">Step 1 of 3</span> -->
                           </h4>
                           
                        </div>
                        <div class="portlet-body form">
                           <form action="/news_events/{{$response['id']}}" class="form-horizontal" method="post" enctype="multipart/form-data">
                              <div class="form-wizard">
                                 
                                 <div class="tab-content">
                                    <div class="tab-pane active" id="tab1">
                                       <div class="control-group">
                                          <label class="control-label">Name</label>
                                          <div class="controls">
                                             <input type="text" class="span6 m-wrap" name="name" required placeholder="News/Event Name" value="{{$response['name']}}" />
                                          </div>
                                       </div>
                                       <div class="control-group">
                                          <label class="control-label">Name (Myanmar)</label>
                                          <div class="controls">
                                             <input type="text" class="span6 m-wrap" name="name_mm"  placeholder="News/Event Name" value="{{$response['name_mm']}}"/>
                                          </div>
                                       </div>

                                       <div class="control-group">
                                          <label class="control-label">Name (Japan) </label>
                                          <div class="controls">
                                             <input type="text" class="span6 m-wrap" name="name_jp"  placeholder="News/Event Name" value="{{$response['name_jp']}}"/>
                                          </div>
                                       </div>

                                       <div class="control-group">
                                          <label class="control-label">Description</label>
                                          <div class="controls">
                                             <textarea class="span8 ckeditor m-wrap" rows="6" name="description">{{$response['description']}}</textarea>
                                          </div>
                                       </div>
                                       
                                       <div class="control-group">
                                          <label class="control-label">Description_mm</label>
                                          <div class="controls">
                                             <textarea class="span8 ckeditor m-wrap" rows="6" name="description_mm">{{$response['description_mm']}}</textarea>
                                          </div>
                                       </div>
                                      
                                       <div class="control-group">
                                          <label class="control-label">Description_jp</label>
                                          <div class="controls">
                                             <textarea class="span8 ckeditor m-wrap" rows="6" name="description_jp">{{$response['description_jp']}}</textarea>
                                          </div>
                                       </div>
                                       
                                       <div class="row-fluid">
                                          <div class="span12">
                                             <div class="span5">
                                                   <div class="control-group">
                                                      <label class="control-label">Start Date</label>
                                                      <div class="controls">
                                                         <input class="m-wrap m-ctrl-medium date-picker" size="16" type="text" name="sdate" value="{{$response['start_date']}}">
                                                      </div>
                                                   </div>
                                             </div>
                                             <div class="span5">
                                                <div class="control-group">
                                                   <label class="control-label">Default datepicker</label>
                                                   <div class="controls">
                                                      <input class="m-wrap m-ctrl-medium date-picker" size="16" type="text" name="edate" value="{{$response['end_date']}}"/>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="span4">&nbsp;</div>
                                       </div>

                                      
                                       <div class="row-fluid">
                                          <div class="span12">
                                             <div class="span5">
                                                <div class="control-group">
                                                   <label class="control-label">Start Time</label>
                                                   <div class="controls">
                                                      <input type="text" id="clockface_1" data-format="hh:mm A" class="m-wrap small span12"  name="stime" value="{{$response['start_time']}}"/>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="span5">
                                                <div class="control-group">
                                                   <label class="control-label">End Time</label>
                                                   <div class="controls">
                                                      <input type="text" id="clockface_2" data-format="hh:mm A" class="m-wrap small span12" name="etime" value="{{$response['end_time']}}"/>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="span2">&nbsp;</div>
                                          </div>
                                       </div>
                                       
                                       <div class="clearfix">&nbsp;</div>
                                       <div class="control-group">
                                          <label class="control-label">Image </label>
                                          <div class="controls images-frame">
                                                <div class="gallery-input">
                                                   <ul>
                                                      <div class="gallery_container">
                                                         <li class="gallery_photo">
                                                             <img src="../../news_eventsphoto/php/files/thumbnail/{{ $response->image}}"></img><span class="icon-cancel-circle">
                                                             <input type="hidden" value="{{ $response->image }}" name="gallery[]"></input></span>
                                                             <script>
                                                                 $(".gallery_photo").click(function(){$(this).remove();});
                                                               </script>
                                                           </li>
                                                         @foreach($response['news_event_images'] as $row)
                                                              <li class="gallery_photo">
                                                                <img src="../../news_eventsphoto/php/files/thumbnail/{{ $row->image}}"></img><span class="icon-cancel-circle">
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
                                                         <input type="file" id="gallery_upload" data-url="../news_eventsphoto/php/index.php">
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
                                             <input type="text" class="span8 m-wrap" name="venue"  placeholder="News/Event Place" value="{{$response['venue']}}"/>
                                          </div>
                                       </div>
                                       <div class="control-group">
                                          <label class="control-label">Venue (Myanmar)</label>
                                          <div class="controls">
                                             <input type="text" class="span8 m-wrap" name="venue_mm"  placeholder="News/Event Place" value="{{$response['venue_mm']}}"/>
                                          </div>
                                       </div>
                                       <div class="control-group">
                                          <label class="control-label">Venue (Japan)</label>
                                          <div class="controls">
                                             <input type="text" class="span8 m-wrap" name="venue_jp"  placeholder="News/Event Place" value="{{$response['venue_jp']}}" />
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
      
   <script type="text/javascript" src="../../assets/ckeditor/ckeditor.js"></script>  
   {{HTML::script('../../src/jquery-ui.js')}}
   {{HTML::script('../../src/jquery.fileupload.js')}}
   {{HTML::script('../../js/admin/itemupload.js')}}
   <script type="text/javascript" src="../assets/clockface/js/clockface.js"></script>
   <script type="text/javascript" src="../assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

   <script type="text/javascript">
      $(function(){
         $('#clockface_1').clockface();
         $('#clockface_2').clockface();
         $('.date-picker').datepicker();
      });
   </script>
@stop