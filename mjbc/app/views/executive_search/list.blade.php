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
								Executive Search				
								<small></small>
							</h3>
							<ul class="breadcrumb">
								<li>
									<i class="icon-home"></i>
									<a href="/">Home</a> 
									<i class="icon-angle-right"></i>
								</li>
								<li><a href="/e_searchlist">Executive Search List</a></li>
								
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
										<h4><i class="icon-edit"></i>Executive Search List</h4>
									</div>
									<div class="portlet-body">
										<div class="clearfix">
											<div class="btn-group">
												<a href="/e_searchcreate">
												<button id="" class="btn green">
			                                    Add New <i class="icon-plus"></i>
												</button>
												</a>
											</div>
											<div class="btn-group pull-right">
												<button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="icon-angle-down"></i>
												</button>
												<ul class="dropdown-menu">
													<li><a href="#">Print</a></li>
													<li><a href="#">Save as PDF</a></li>
													<li><a href="#">Export to Excel</a></li>
												</ul>
											</div>
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
													<th class="span9">Image</th>
													<th class="span9">Name</th>
													<!-- <th class="span9">Name_mm</th> -->
													<!-- <th class="span9">Name_jp</th> -->
													<th class="span9">Description</th>
													<!-- <th class="span9">Description_mm</th> -->
													<!-- <th class="span9">Description_jp</th> -->
													<th class="span9">Start Date</th>
													<th class="span9">End Date</th>
													<th class="span9">Start Time</th>
													<th class="span9">End Time</th>
													<th class="span9">Venue</th>
													<!-- <th class="span9">Download File</th> -->
													<th>Edit</th>
													<th>Delete</th>
												</tr>
											</thead>
											<tbody>
												@if($response)
													@foreach($response as $arr_news)
														<tr class="">
															<td><img src="../../news_photo/php/files/{{$arr_news->image}}"  style="max-width:100px;max-height:100px;" /></td>
															<td>{{$arr_news->name}}</td>
															<!-- <td>{{$arr_news->name_mm}}</td> -->
															<!-- <td>{{$arr_news->name_jp}}</td> -->
															<td>
																<div id="container">
																	<div id="scrollbox" >
																		<div id="content">
																			<p>{{strip_tags($arr_news->description)}}</p>
																		</div>
																	</div>
																</div>
															</td>
															<!-- <td>
																<div id="container">
																	<div id="scrollbox" >
																		<div id="content">
																		</div>
																	</div>
																</div>
															</td>
															<td>
																<div id="container">
																	<div id="scrollbox" >
																		<div id="content">
																		</div>
																	</div>
																</div>
															</td> -->
															<td>{{$arr_news->start_date}}</td>
															<td>{{$arr_news->end_date}}</td>
															<td>{{$arr_news->start_time}}</td>
															<td>{{$arr_news->end_time}}</td>
															<td>{{$arr_news->venue}}</td>
															<td><a class="edit" href="/e_search-update/{{$arr_news->id}}">Edit</a></td>
															<td><a class="delete" href="/deletee_search/{{$arr_news->id}}">Delete</a></td>
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