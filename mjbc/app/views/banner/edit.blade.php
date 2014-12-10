@extends('../admin')
@section('content')
{{HTML::style('../../css/upload.css')}}
{{HTML::style('../../assets/chosen-bootstrap/chosen/chosen.css')}}

<!-- BEGIN PAGE -->
		<div class="page-content">
			<!-- BEGIN PAGE CONTAINER-->
			<div class="container-fluid">
				<!-- BEGIN PAGE HEADER-->
				<div class="row-fluid">
					<div class="span12">
						<h3 class="page-title">
							Edit banner				
							<small></small>
						</h3>
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="/">Home</a> 
								<i class="icon-angle-right"></i>
							</li>
							<li><a href="/banner">Banner List</a><i class="icon-angle-right"></i></li>
							<li><a href="#">Edit Banner</a></li>
						</ul>
						<!-- END PAGE TITLE & BREADCRUMB-->
					</div>
				</div>
				<!-- END PAGE HEADER-->
				<div id="dashboard">
					<!-- BEGIN DASHBOARD STATS -->
						<div class="row-fluid">
						   <div class="span12">
						      <!-- BEGIN SAMPLE FORM PORTLET-->   
						      <div class="portlet box blue">
						         <div class="portlet-title">
						            <h4><i class="icon-reorder"></i>Update Banner</h4>
						         </div>
						         <div class="portlet-body form">
						            <!-- BEGIN FORM-->
						            <form class="form-horizontal" action = "/banner/{{$response->id}}" method= "post" enctype="multipart/form-data">
						                <div class="control-group">
						                  <label class="control-label">Category</label>
						                  <div class="controls">
						                  	<?php $category=array('Seminar','News & Events','Executive Search','Consultancy'); ?>
						                    <select name="category" class="chosen span6">
						                    	@foreach($category as $row)
							                    	<option value="{{$row}}" @if($row==$response->category) selected @endif>{{$row}}</option>
						                    	@endforeach
						                    </select>
						                  </div>
						                </div>

						                <div class="control-group">
						                  <label class="control-label">Image</label>
											<div class="controls images-frame">
                                                <div class="gallery-input">
                                                   <ul>
                                                      <div class="gallery_container1">
                                                      	<li class="gallery_photo right">
															<img src="../../bannerphoto/php/files/thumbnail/{{ $response['image'] }}"></img>
															<span class="icon-cancel-circle"></span><input type="hidden" value="{{ $response['image'] }}" name="hdimage"></input></span>
															<script>
														      $(".gallery_photo").click(function(){$(this).remove();$(".upload1").show();$(".upload1 span").html("+");});
														    </script>
														</li>
                                                      </div>
                                                      <div class="script"></div>
                                                      <div class="upload1" style="display:none">
                                                         <span>+</span>
                                                         <input type="file" id="gallery_upload1" data-url="../../bannerphoto/php/index.php">
                                                      </div>
                                                   </ul>
                                                </div>
	                                        </div>
						                </div>

						                <div class="control-group">
						                  <label class="control-label">Caption</label>
						                  <div class="controls">
						                    <input type="text" name="title" class="span12" value="{{$response->title}}">
						                  </div>
						                </div>

						                <div class="control-group">
						                  <label class="control-label">Caption (Myanmar)</label>
						                  <div class="controls">
						                    <input type="text" name="title_mm" class="span12" value="{{$response->title_mm}}">
						                  </div>
						                </div>

						                <div class="control-group">
						                  <label class="control-label">Caption (Japan)</label>
						                  <div class="controls">
						                    <input type="text" name="title_jp" class="span12" value="{{$response->title_jp}}">
						                  </div>
						                </div>
						              
						                <div class="form-actions">
						                  <button type="submit" class="btn blue">Submit</button>
						                  <a href="/banner"><button type="button" class="btn">Cancel</button></a>
						                </div>
						            </form>
						            <!-- END FORM-->           
						         </div>
						      </div>
						      <!-- END SAMPLE FORM PORTLET-->
						   </div>
						</div>
					<!-- END DASHBOARD STATS -->
					
				</div>
			</div>
			<!-- END PAGE CONTAINER-->		
		</div>
	<!-- END PAGE -->	
{{HTML::script('../../../src/jquery-ui.js')}}
{{HTML::script('../../../src/jquery.fileupload.js')}}
{{HTML::script('../../js/admin/txtedt_dpic_create.js')}}
{{HTML::script('../../assets/chosen-bootstrap/chosen/chosen.jquery.min.js')}}

@stop