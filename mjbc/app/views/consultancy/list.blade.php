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
							<!-- BEGIN PAGE TITLE & BREADCRUMB-->			
							<h3 class="page-title">
								Consultancy List				
								<small></small>
							</h3>
							<ul class="breadcrumb">
								<li>
									<i class="icon-home"></i>
									<a href="/">Home</a> 
									<i class="icon-angle-right"></i>
								</li>
								<li><a href="/consultancylist">Consultancy</a></li>
								
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
										<h4><i class="icon-edit"></i>Consultancy List</h4>
									</div>
									<div class="portlet-body">
										<div class="clearfix">
											<div class="btn-group">
												<a href="/consultancycreate">
												<button id="" class="btn green">
			                                    Add New <i class="icon-plus"></i>
												</button>
												</a>
											</div>
											<!-- <div class="btn-group pull-right">
												<button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="icon-angle-down"></i>
												</button>
												<ul class="dropdown-menu">
													<li><a href="#">Print</a></li>
													<li><a href="#">Save as PDF</a></li>
													<li><a href="#">Export to Excel</a></li>
												</ul>
											</div> -->
										</div>
										@if(Session::has('message'))
											<?php $message=Session::get('message'); ?>
											<div class="alert alert-info">
												<button class="close" data-dismiss="alert"></button>
												<strong>Info ! </strong>{{$message}}
											</div>
										@endif
										<table class="table table-striped table-hover table-bordered" id="sample_editable_1">
											<thead>
												<tr>
													<!-- <th>Image</th> -->
													<th class="span2">Image</th>
													<th class="span9">Name</th>
													<th class="span5">Name_mm</th>
													<th class="span5">Name_jp</th>
													<th class="span9">Description</th>
													<th class="span5">Description_mm</th>
													<th class="span5">Description_jp</th>
													<!-- <th class="span9">Download File</th> -->
													<!-- <th class="span9">Download File</th> -->
													<th>Edit</th>
													<th>Delete</th>
												</tr>
											</thead>
											<tbody>
												@if($response)
													@foreach($response as $arr_consultancy)
														<tr class="">
															<td><img src="../../consultancy_photo/php/files/{{$arr_consultancy->image}}" alt="Photo" style="max-width:100px;max-height:100px;" /></td>
															<td>{{$arr_consultancy->name}}</td>
															<td>{{$arr_consultancy->name_mm}}</td>
															<td>{{$arr_consultancy->name_jp}}</td>
															<td>
																<div id="container">
																	<div id="scrollbox" >
																		<div id="content">
																			<p>{{strip_tags($arr_consultancy->description)}}</p>
																		</div>
																	</div>
																</div>
															</td>
															<td>
																<div id="container">
																	<div id="scrollbox" >
																		<div id="content">
																			<p>{{strip_tags($arr_consultancy->description_mm)}}</p>
																		</div>
																	</div>
																</div>
															</td>
															<td>
																<div id="container">
																	<div id="scrollbox" >
																		<div id="content">
																			<p>{{strip_tags($arr_consultancy->description_jp)}}</p>
																		</div>
																	</div>
																</div>
															</td>
															<!-- <td><a href="/../../pdffiles/{{$arr_consultancy->download_file}}"> {{$arr_consultancy->download_file}}</a></td> -->
															<td><a class="edit" href="/consultancy-update/{{$arr_consultancy->id}}">Edit</a></td>
															<td><a class="delete" href="/deleteconsultancy/{{$arr_consultancy->id}}">Delete</a></td>
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