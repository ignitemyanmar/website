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
                        Consultancy Create
                        <!-- <small>form wizard sample</small> -->
                     </h3>
                     <ul class="breadcrumb">
                        <li>
                           <i class="icon-home"></i>
                           <a href="/">Home</a> 
                           <span class="icon-angle-right"></span>
                        </li>
                        <li>
                           <a href="/consultancylist">Consultancy List</a>
                           <span class="icon-angle-right"></span>
                        </li>
                        <li><a href="#">Consultancy Create</a></li>
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
                              <i class="icon-reorder"></i> Consultancy Create <!-- - <span class="step-title">Step 1 of 3</span> -->
                           </h4>
                           
                        </div>
                        <div class="portlet-body form">
                           <form action="/addconsultancy" class="form-horizontal" method="post" enctype="multipart/form-data">
                              <div class="form-wizard">
                                 
                                 <div class="tab-content">
                                    <div class="tab-pane active" id="tab1">
                                       <h3 class="block">Consultancy information</h3>
                                       <div class="control-group">
                                          <label class="control-label">Name </label>
                                          <div class="controls">
                                             <input type="text" class="span6 m-wrap" name="name" required placeholder="Consultancy Name" />
                                          </div>
                                       </div>
                                       <div class="control-group">
                                          <label class="control-label">Description</label>
                                          <div class="controls">
                                             <textarea class="span8 ckeditor m-wrap" rows="6" name="description"></textarea>
                                          </div>
                                       </div>
                                       <div class="control-group">
                                          <label class="control-label">Name_mm</label>
                                          <div class="controls">
                                             <input type="text" class="span6 m-wrap" name="name_mm"  placeholder="Consultancy Name" />
                                          </div>
                                       </div>
                                       <div class="control-group">
                                          <label class="control-label">Description_mm</label>
                                          <div class="controls">
                                             <textarea class="span8 ckeditor m-wrap" rows="6" name="description_mm"></textarea>
                                          </div>
                                       </div>
                                      <div class="control-group">
                                          <label class="control-label">Name_jp </label>
                                          <div class="controls">
                                             <input type="text" class="span6 m-wrap" name="name_jp"  placeholder="Consultancy Name" />
                                          </div>
                                       </div>
                                       <div class="control-group">
                                          <label class="control-label">Description_jp</label>
                                          <div class="controls">
                                             <textarea class="span8 ckeditor m-wrap" rows="6" name="description_jp"></textarea>
                                          </div>
                                       </div>

                                       <div class="control-group">
                                          <label class="control-label">Image </label>
                                          <div class="controls images-frame">
                                                <div class="gallery-input">
                                                   <ul>
                                                      <div class="gallery_container">
                                                      </div>
                                                      <div class="script"></div>
                                                      <div class="upload">
                                                         <span>+</span>
                                                         <input type="file" id="gallery_upload" data-url="../consultancy_photo/php/index.php">
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
                                          <div class="span2 "><label class="control-label">Download File</label></div>
                                          <!-- <label class="control-label">Download File <b class="require">(*)</b></label> -->
                                          <div class="span10 " >
                                             <label for="File">File <span style="color:red;">(PDF format only)</span></label>
                                             <div>
                                                                         
                                                     <div class="file-upload">
                                                <span> + Select to Upload File </span>
                                                   <!-- <input type="file" name="pdf_file" id="pdf_file" onchange="pdf_fileSelected();" /> -->
                                                   <!-- <input type="file" id="gallery_upload" data-url="../consultancy_photo/php/index.php"> -->
                                                   <input name="pdf_file" id="pdf_file" type="file" size="" aria-required="true"/>
                                                </div>
                                                      <div id="fileinfos">
                                                         <div id="filename"></div>
                                                         <div id="filesize"></div>
                                                     </div>
                                                     <div id="warnsize" style="display:none;">Your file is very big. We can't accept it. Please select more small file</div>
                                                 </div>
                                                 
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
   <script type="text/javascript">
   var fileInput = document.getElementsByName("pdf_file");
    for(var i = 0, len = fileInput.length; i < len; i++) {
    fileInput[i].addEventListener('change', 
        function(e) {
            if(this.files[0].name.match(/\.pdf$/) == null) {
                alert('Files can only be PDF.');
                return;
            }
            else{
               var oFile = document.getElementById('pdf_file').files[0];
               document.getElementById('filename').innerHTML = oFile.name;
            }
        },
        false
    );
 }
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