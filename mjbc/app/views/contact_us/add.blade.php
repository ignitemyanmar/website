@extends('../admin')
@section('content')
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
                     
                     <h3 class="page-title">
                        Contact Us Create
                        <!-- <small>form wizard sample</small> -->
                     </h3>
                     <ul class="breadcrumb">
                        <li>
                           <i class="icon-home"></i>
                           <a href="/">Home</a> 
                           <i class="icon-angle-right"></i>
                        </li>
                        <li>
                           <a href="/contactuslist">Contact Us List</a>
                           <i class="icon-angle-right"></i>
                        </li>
                        <li><a href="#">Contact Us Create</a></li>
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
                              <i class="icon-reorder"></i> Contact Us Create <!-- - <span class="step-title">Step 1 of 3</span> -->
                           </h4>
                           
                        </div>
                        <div class="portlet-body form">
                           <form action="/addcontactus" class="form-horizontal" method="post" enctype="multipart/form-data">
                              <div class="form-wizard">
                                 
                                 <div class="tab-content">
                                    <div class="tab-pane active" id="tab1">
                                       <div class="control-group">
                                          <label class="control-label">Name </label>
                                          <div class="controls">
                                             <input type="text" class="span6 m-wrap" name="name" required placeholder="Name" />
                                          </div>
                                       </div>
                                       <div class="control-group">
                                          <label class="control-label">Address</label>
                                          <div class="controls">
                                             <input type="text" class="span6 m-wrap" name="address" required placeholder="Yangon" />
                                          </div>
                                       </div>
                                       <div class="control-group">
                                          <label class="control-label">Name_mm</label>
                                          <div class="controls">
                                             <input type="text" class="span6 m-wrap" name="name_mm"  placeholder="Name" />
                                          </div>
                                       </div>
                                       <div class="control-group">
                                          <label class="control-label">Address_mm</label>
                                          <div class="controls">
                                             <input type="text" class="span6 m-wrap" name="address_mm"  placeholder="Yangon" />
                                          </div>
                                       </div>
                                      <div class="control-group">
                                          <label class="control-label">Name_jp </label>
                                          <div class="controls">
                                             <input type="text" class="span6 m-wrap" name="name_jp"  placeholder="Name" />
                                          </div>
                                       </div>
                                       <div class="control-group">
                                          <label class="control-label">Address_jp</label>
                                          <div class="controls">
                                             <input type="text" class="span6 m-wrap" name="address_jp"  placeholder="Yangon" />
                                          </div>
                                       </div>
                                       <div class="control-group">
                                          <label class="control-label">Email</label>
                                          <div class="controls">
                                             <input type="email" class="span6 m-wrap" name="email" required placeholder="Yangon" />
                                          </div>
                                       </div>
                                       <div class="control-group">
                                          <label class="control-label">Phone</label>
                                          <div class="controls">
                                             <input type="text" class="span6 m-wrap" name="phone" required placeholder="Yangon" />
                                          </div>
                                       </div>
                                       <div class="control-group">
                                          <label class="control-label">Location</label>
                                          <div class="controls">
                                             <input type="text" class="span6 m-wrap" name="location"  placeholder="Yangon" />
                                          </div>
                                       </div>
                                       <div class="clearfix">&nbsp;</div>
                                    </div>
                                 </div>
                                 <div class="form-actions clearfix">
                                    <a href="/contactuslist" class="btn button-previous">
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