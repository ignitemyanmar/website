@extends('../admin')
@section('content')
	<link rel="stylesheet" href="assets/data-tables/DT_bootstrap.css" />
	<link rel="shortcut icon" href="favicon.ico" />
	<!-- BEGIN PAGE -->
		<div class="page-content">
			<!-- BEGIN PAGE CONTAINER-->
			<div class="container-fluid">
				<!-- BEGIN PAGE HEADER-->
					<div class="row-fluid">
						<div class="span12">
							<!-- BEGIN PAGE TITLE & BREADCRUMB-->			
							<h3 class="page-title">
								Banner List
							</h3>
							<ul class="breadcrumb">
								<li>
									<i class="icon-home"></i>
									<a href="/">Home</a> 
									<i class="icon-angle-right"></i>
								</li>
								<li><a href="#">Banner List</a></li>
								
							</ul>
							<!-- END PAGE TITLE & BREADCRUMB-->
						</div>
					</div>
				<!-- END PAGE HEADER-->
				<div id="dashboard">
					<!-- BEGIN PAGE -->
						<div class="row-fluid">
							<div class="span12">
								<!-- BEGIN EXAMPLE TABLE PORTLET-->
								<div class="portlet box blue">
									<div class="portlet-title">
										<h4><i class="icon-th-list"></i>Banner List</h4>
									</div>
									<div class="portlet-body">
										<div class="clearfix">
			                                <div class="btn-group">
			                                    <a href="/banner-create">
			                                    <button id="" class="btn green">
			                                    Add New <i class="icon-plus"></i>
			                                    </button>
			                                    </a>
			                                </div>
										</div>
										@if(Session::has('message'))
											<?php $message=Session::get('message'); ?>
											@if($message['status']==0)
											<div class="alert alert-error">
											@else
											<div class="alert alert-success">
											@endif
												<button class="close" data-dismiss="alert"></button>
												<strong>Info ! </strong>{{$message['info']}}
											</div>
										@endif
										<table class="table table-striped table-hover table-bordered" id="sample_editable_1">
											<thead>
												<tr>
													<th class="span3">Image</th>
													<th>Category</th>
													<th>Caption</th>
													<th>Caption (Myanmar)</th>
													<th>Caption (Japan)</th>
													<th class="span1">Edit</th>
													<th class="span1">Delete</th>
												</tr>
											</thead>
											<tbody>
												@if($response)
													@foreach($response as $arr_banner)
														<tr class="">
															<td><img src="../bannerphoto/php/files/thumbnail/{{ $arr_banner->image}}"></td>
															<td>{{$arr_banner->category}}</td>
															<td>{{$arr_banner->title}}</td>
															<td>{{$arr_banner->title_mm}}</td>
															<td>{{$arr_banner->title_jp}}</td>
															<td><a class="btn small green-stripe edit" href="/banner/{{$arr_banner->id}}">Edit</a></td>
															<td><a class="btn small red-stripe delete" href="/banner-delete/{{$arr_banner->id}}">Delete</a></td>
														</tr>	
													@endforeach
												@endif
												
												
											</tbody>
										</table>
									</div>
								</div>
								<!-- END EXAMPLE TABLE PORTLET-->
							</div>
						</div>
						
					<!-- END PAGE -->
					
				</div>
			</div>
			<!-- END PAGE CONTAINER-->		
		</div>
		<!-- END PAGE -->	
	<script type="text/javascript" src="assets/data-tables/jquery.dataTables.js"></script>
	<script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>
	<script>
		jQuery(document).ready(function() {			
			// initiate layout and plugins
			App.setPage("table_editable");
			// App.init();
		});
	</script>
@stop