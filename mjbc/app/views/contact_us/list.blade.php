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
								Contact Us List				
								<small></small>
							</h3>
							<ul class="breadcrumb">
								<li>
									<i class="icon-home"></i>
									<a href="/">Home</a> 
									<i class="icon-angle-right"></i>
								</li>
								<li><a href="#">Contact Us List</a></li>
								
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
										<h4><i class="icon-edit"></i>Contact Us List</h4>
									</div>
									<div class="portlet-body">
										<div class="clearfix">
											<div class="btn-group">
												<a href="/contactuscreate">
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
													<th class="span15">Name</th>
													<th class="span5">Name_mm</th>
													<th class="span5">Name_jp</th>
													<th class="span9">Address</th>
													<th class="span5">Address_mm</th>
													<th class="span5">Address_jp</th>
													<th class="span9">Email</th>
													<th class="span9">Phone</th>
													<th class="span9">Location</th>
													<!-- <th class="span9">Download File</th> -->
													<th>Edit</th>
													<th>Delete</th>
												</tr>
											</thead>
											<tbody>
												@if($response)
													@foreach($response as $arr_contactus)
														<tr class="">
															<td>{{$arr_contactus->name}}</td>
															<td>{{$arr_contactus->name_mm}}</td>
															<td>{{$arr_contactus->name_jp}}</td>
															<td>{{$arr_contactus->address}}</td>
															<td>{{$arr_contactus->address_mm}}</td>
															<td>{{$arr_contactus->address_jp}}</td>
															<td>{{$arr_contactus->email}}</td>
															<td>{{$arr_contactus->phone}}</td>
															<td>{{$arr_contactus->location}}</td>
															<td><a class="edit btn green-stripe" href="/contactus-update/{{$arr_contactus->id}}">Edit</a></td>
															<td><a class="delete btn red-stripe" href="/deletecontactus/{{$arr_contactus->id}}">Delete</a></td>
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