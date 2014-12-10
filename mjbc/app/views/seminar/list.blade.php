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
								Seminar List				
								<small></small>
							</h3>
							<ul class="breadcrumb">
								<li>
									<i class="icon-home"></i>
									<a href="/">Home</a> 
									<i class="icon-angle-right"></i>
								</li>
								<li><a href="/seminarlist">Seminar</a></li>
								
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
										<h4><i class="icon-edit"></i>Seminar List</h4>
									</div>
									<div class="portlet-body">
										<div class="clearfix">
											<div class="btn-group">
												<a href="/seminarcreate">
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
													<th class="span2">Category</th>
													<th class="span2">Language Type</th>
													<th class="span2">Seminar Type</th>
													<th class="span2">Name</th>
													<!-- <th class="span9">Subject</th>
													<th class="span9">Imp_Method</th>
													<th class="span9">Physician</th>
													<th class="span9">Language</th>
													<th class="span9">Tuition Fees</th> -->
													<th class="span9">Description</th>
													<th>Edit</th>
													<th>Delete</th>
												</tr>
											</thead>
											<tbody>
												@if($response)
													@foreach($response as $seminar)
														<tr class="">
															<td>{{$seminar->category}}</td>
															<td>{{$seminar->language_name}}</td>
															<td>{{$seminar->seminar_type}}</td>
															<td>{{$seminar->name}}</td>
															<!-- <td>{{$seminar->subject}}</td>
															<td>{{$seminar->implementation_method}}</td>
															<td>{{$seminar->physician}}</td>
															<td>{{$seminar->language}}</td>
															<td>{{$seminar->tuition_fees}}</td> -->
															<td>
																<div id="container">
																	<div id="scrollbox" >
																		<div class="content">
																			<p><b>Subject :</b> {{$seminar->subject}}</p>
																			<p><b>Style :</b> {{$seminar->implementation_method}}</p>
																			<p><b>physician :</b> {{$seminar->physician}}</p>
																			<p><b>language :</b> {{$seminar->language}}</p>
																			<p><b>tuition_fees :</b> {{$seminar->tuition_fees}}</p>
																			<p>{{strip_tags($seminar->description)}}</p>
																		</div>
																	</div>
																</div>
															</td>
															<td><a class="edit" href="/seminar-update/{{$seminar->id}}">Edit</a></td>
															<td><a class="delete" href="/deleteseminar/{{$seminar->id}}">Delete</a></td>
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