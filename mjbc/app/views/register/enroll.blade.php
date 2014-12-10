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
								Enroll User List				
								<small></small>
							</h3>
							<ul class="breadcrumb">
								<li>
									<i class="icon-home"></i>
									<a href="/">Home</a> 
									<i class="icon-angle-right"></i>
								</li>
								<li><a href="#">Enroll User List</a></li>
								
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
										<h4><i class="icon-edit"></i>Enroll List</h4>
									</div>
									<div class="portlet-body">
										<div class="clearfix">
											
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
													<th class="span2">Course</th>
													<th class="span2">Name</th>
													<th class="span6">Contact</th>
												</tr>
											</thead>
											<tbody>
												@if($response)
													@foreach($response as $enroll)
														<tr class="">
															<td>{{$enroll->seminar->name}}</td>
															<td>{{$enroll['name']}}</td>
						                                    <td>
						                                    	<label><b>Email:</b>{{$enroll['email']}}</label>
						                                    	<br>
						                                    	<label><b>Address:</b>{{$enroll['address']}}</label>
						                                    	<br>
																<label><b>Phone:</b>{{$enroll['phone']}}</label>
						                                    	<br>
																<label><b>Company Name:</b>{{$enroll['company_name']}}</label>
						                                    	<br>
																<label><b>Department:</b>{{$enroll['department']}}</label>
						                                    	<br>
																<label><b>Nationality:</b>{{$enroll['nationality']}}</label>
															</td>
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