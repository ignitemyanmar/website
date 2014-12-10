@extends('../admin')
@section('content')
<style type="text/css">
   .padding-5{padding: 5px;}
</style>
<!-- BEGIN PAGE -->  
   <div class="page-content">
      <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->   
               <div class="row-fluid">
                  <div class="span12">
                     <h3 class="page-title">
                        Add New Seminar Type
                        <!-- <small>form wizard sample</small> -->
                     </h3>
                     <ul class="breadcrumb">
                        <li>
                           <i class="icon-home"></i>
                           <a href="/">Home</a> 
                           <i class="icon-angle-right"></i>
                        </li>
                        <li>
                           <a href="/seminartypelist">Seminar Type List</a>
                           <i class="icon-angle-right"></i>
                        </li>
                        <li><a href="#">Add Seminar Type</a></li>
                     </ul>
                  </div>
               </div>
            <!-- END PAGE HEADER-->

            <!-- BEGIN PAGE CONTENT-->
               <div class="row-fluid">
                  <div class="responsive span10" data-tablet="span8" data-desktop="span8">
                     <form id="addnew-form" class="form-horizontal" action = "/addseminartype" method= "post" enctype="multipart/form-data">    
                        <div class="portlet box light-grey">
                           <div class="portlet-title">
                              <h4><i class="icon-user"></i>Seminar Type Information</h4>
                              <div class="actions">
                              </div>
                           </div>
                           <div class="portlet-body">
                           <div class="clear">&nbsp;</div>
                              <div class="row-fluid">
                                 <div class="span10">
                                    <div class="control-group">
                                       <label class="control-label" for="title">Seminar Type Name</label>
                                       <div class="controls">
                                          <input name="name" class="m-wrap span10" placeholder="PM" type="text">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row-fluid">
                                 <div class="span10">
                                    <div class="control-group">
                                       <label class="control-label" for="title">Seminar Type (Myanmar)</label>
                                       <div class="controls">
                                          <input name="name_mm" class="m-wrap span10" placeholder="PM" type="text">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row-fluid">
                                 <div class="span10">
                                    <div class="control-group">
                                       <label class="control-label" for="title">Seminar Type (Japan)</label>
                                       <div class="controls">
                                          <input name="name_jp" class="m-wrap span10" placeholder="PM" type="text">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="cleardiv">&nbsp;</div>
                              
                               <div class="controls">
                                 <a href="seminarlist" class="btn"><i class="m-icon-swapleft"></i> Cancel</a>
                                 <button type="submit" value = "Save" class="btn green button-submit" id="btn_create" />
                                    Save <i class="m-icon-swapright m-icon-white"></i>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
                  
               </div>
            <!-- END PAGE CONTENT-->         
         </div>
      <!-- END PAGE CONTAINER-->
   </div>
<!-- END PAGE -->  
@stop