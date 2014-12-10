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
								About Us List				
								<small></small>
							</h3>
							<ul class="breadcrumb">
								<li>
									<i class="icon-home"></i>
									<a href="/">Home</a> 
									<i class="icon-angle-right"></i>
								</li>
								<li><a href="/aboutuslist">About Us</a></li>
								
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
										<h4><i class="icon-edit"></i>About Us List</h4>
									</div>
									<div class="portlet-body">
										<div class="clearfix">
											<div class="btn-group">
												<a href="/aboutuscreate">
												<button id="" class="btn green">
			                                    Add New <i class="icon-plus"></i>
												</button>
												</a>
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
													<th class="span9">Name</th>
													<th class="span9">Name_mm</th>
													<th class="span9">Name_jp</th>
													<th class="span9">Description</th>
													<th class="span9">Description_mm</th>
													<th class="span9">Description_jp</th>
													<!-- <th class="span9">Download File</th> -->
													<th>Edit</th>
													<th>Delete</th>
												</tr>
											</thead>
											<tbody>
												@if($response)
													@foreach($response as $arr_aboutus)
														<tr class="">
															<td>{{$arr_aboutus->name}}</td>
															<td>{{$arr_aboutus->name_mm}}</td>
															<td>{{$arr_aboutus->name_jp}}</td>
															<td>
																<div id="container">
																	<div id="scrollbox" >
																		<div id="content">
																			<p>{{strip_tags($arr_aboutus->description)}}</p>
																		</div>
																	</div>
																</div>
															</td>
															<td>
																<div id="container">
																	<div id="scrollbox" >
																		<div id="content">
																			<p>{{strip_tags($arr_aboutus->description_mm)}}</p>
																		</div>
																	</div>
																</div>
															</td>
															<td>
																<div id="container">
																	<div id="scrollbox" >
																		<div id="content">
																			<p>{{strip_tags($arr_aboutus->description_jp)}}</p>
																		</div>
																	</div>
																</div>
															</td>
															<td><a class="edit btn green-stripe" href="/aboutus-update/{{$arr_aboutus->id}}">Edit</a></td>
															<td><a class="delete btn red-stripe" href="/deleteaboutus/{{$arr_aboutus->id}}">Delete</a></td>
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