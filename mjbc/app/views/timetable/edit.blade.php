@extends('../admin')
@section('content')
{{HTML::style('../../css/upload.css')}}
{{HTML::script('../../js/imageupload.js')}}
<style type="text/css">
   .require{ color: red; font-weight: bold;font-size: 18px;margin-right: -12px;}
   #date-container{width: 70%}
</style>
<link rel="stylesheet" type="text/css" href="../../assets/chosen-bootstrap/chosen/chosen.css" />
<link rel="stylesheet" type="text/css" href="../../assets/clockface/css/clockface.css" />
<link rel="stylesheet" type="text/css" href="../../assets/bootstrap-datepicker/css/datepicker.css" />  <!-- BEGIN PAGE --> 
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
                        TimeTable Edit
                        <!-- <small>form wizard sample</small> -->
                     </h3>
                     <ul class="breadcrumb">
                        <li>
                           <i class="icon-home"></i>
                           <a href="/">Home</a> 
                           <span class="icon-angle-right"></span>
                        </li>
                        <li>
                           <a href="/timetablelist"> TimeTable List</a>
                           <span class="icon-angle-right"></span>
                        </li>
                        <li><a href="#"> TimeTable Edit</a></li>
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
                              <i class="icon-reorder"></i> TimeTable Edit <!-- - <span class="step-title">Step 1 of 3</span> -->
                           </h4>
                           
                        </div>
                        <div class="portlet-body form">
                           <form action="/updatetimetable/{{$response['timetable']['id']}}" class="form-horizontal" method="post" enctype="multipart/form-data">
                              <div class="form-wizard">
                                 
                                 <div class="tab-content">
                                    <div class="tab-pane active" id="tab1">
                                       <h3 class="block"> TimeTable information</h3>
                                          
                                          <div class="row-fluid">
                                             <div class="control-group">
                                                <label class="control-label" for="seminar">Seminar </label>
                                                <div class="controls">
                                                   <select name="s_name" id='seminar' class="m-wrap span7 chosen">
                                                      @if($response['seminar'])
                                                         @foreach($response['seminar'] as $objseminar)
                                                            <option value="{{$objseminar->id}}"@if($objseminar->id==$response['timetable']['seminar_id'])selected @endif>{{$objseminar->name.' ('.$objseminar->code_no.')'}}</option>
                                                         @endforeach
                                                      @endif  
                                                   </select>    
                                                </div>
                                             </div>
                                       </div>
                                       <div class="control-group">
                                          <label class="control-label">Venue</label>
                                          <div class="controls">
                                             <input type="text" class="span7 m-wrap" name="venue" required value="{{$response['timetable']['venue']}}" />
                                          </div>
                                       </div>
                                       <div class="control-group">
                                          <label class="control-label">Lecturer</label>
                                          <div class="controls">
                                             <input type="text" class="span7 m-wrap" name="lecturer" value="{{$response['timetable']['lecturer']}}"  />
                                          </div>
                                       </div>
                                       
                                       <div class="row-fluid">
                                          <div class="span12">
                                             <div class="span5">
                                                   <div class="control-group">
                                                      <label class="control-label">Start Date</label>
                                                      <div class="controls">
                                                         <input class="m-wrap m-ctrl-medium date-picker" size="16" type="text" name="sdate" value="{{$response['timetable']['start_date']}}">
                                                      </div>
                                                   </div>
                                             </div>
                                             <div class="span5">
                                                <div class="control-group">
                                                   <label class="control-label">Default datepicker</label>
                                                   <div class="controls">
                                                      <input class="m-wrap m-ctrl-medium date-picker" size="16" type="text" name="edate" value="{{$response['timetable']['end_date']}}"/>
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
                                                      <input type="text" id="clockface_1" value="{{$response['timetable']['start_time']}}" data-format="hh:mm A" class="m-wrap small span12"  name="stime" />
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="span5">
                                                <div class="control-group">
                                                   <label class="control-label">End Time</label>
                                                   <div class="controls">
                                                      <input type="text" id="clockface_2" value="{{$response['timetable']['end_time']}}" data-format="hh:mm A" class="m-wrap small span12" name="etime" />
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="span2">&nbsp;</div>
                                          </div>
                                       </div>
                                       
                                       <div class="row-fluid">
                                          <div class="span2"><label class="control-label">Days</label></div>
                                          <div class="span6">
                                             <div class="row panel" style="margin:3px;">
                                                <?php $i=1;?>
                                                @foreach($days as $day)
                                                   @if($i==1 || $i==4 )
                                                   <div class="span3">
                                                   @endif
                                                      <?php $same=false; ?>
                                                      @foreach($response['timetable']['days'] as $rows)
                                                         @if($rows == $day)
                                                            <?php $same=true; ?>
                                                         @endif
                                                      @endforeach
                                                      <label><input type="checkbox" name='days[]' value="{{ $day }}" @if($same) checked @else  @endif>
                                                      {{ $day}}</label><br>
                                                   @if($i==3 || $i==5 )
                                                   </div>
                                                   @endif
                                                <?php $i++ ?>
                                                @endforeach
                                             </div>
                                          </div>
                                          <div class="span4">&nbsp;</div>
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
   <script type="text/javascript" src="../../assets/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
   <script type="text/javascript" src="../../assets/ckeditor/ckeditor.js"></script>  
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