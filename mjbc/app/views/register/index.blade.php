@extends('../master')
@section('content')
{{HTML::style('../slider/css/demo.css')}}
	<style type="text/css">
		label{font-size: 13px;}label span{ padding-left: 4px;}
		.alert{	color: #B94A48;
				background-color: #F2DEDE;
				border-color: #EED3D7;
				padding: 8px;
				margin-left: .8rem;
				width: 63%;
				}
	</style>
	<div class="row">
		<div class="large-3 medium-3 columns left_padding_none">
			@include('include.leftnav')
		</div>
		<div class="large-9 medium-9 columns right_padding_none">
			<h3 style="margin-left:.8rem;">Course Enroll</h3>
			<!-- <div class="br_line">&nbsp;</div> -->
			@if(Session::has('message'))
				<div class="alert">{{Session::get('message')}}</div>
			@endif
			<div class="row">
				<div class="large-8 columns nopadding">
					<form action="/registration" class="add-newform" method="get">
		                <div class="row">
		                  <div class="large-12 columns">
		                  	<input type="text" name='course' placeholder="Name" value="{{$course['name']}}" readonly="">
		                  	<input type="hidden" name='course_id' value="{{$course['id']}}">
		                  </div>
		                </div>
		                <div class="row">
		                  <div class="large-12 columns"><input type="text" name='name' placeholder="Name" required></div>
		                </div>
		                <div class="row">
		                  <div class="large-12 columns"><input type="text" name='email' placeholder="Email Address"></div>
		                </div>
		                <!-- <div class="row">
		                  <div class="large-12 columns"><input type="text" name='password' placeholder="Password"></div>
		                </div> -->
		                <div class="row">
		                  <div class="large-12 columns"><input type="text" name='phone' placeholder="Phone" required></div>
		                </div>

		                <div class="row">
		                    <div class="large-12 columns">
		                  		<h5 style="color:#000;font-weight:normal;">Gender</h5>
		                  	</div>
		                </div>
		                <div class="row">
		                  	<div class="large-4 columns left_padding_none">
		                		<label><input type="radio" name="gender" value="Male" checked><span>Male</span></label>
		                  	</div>
		                  	<div class="large-4 columns left_padding_none">
		                		<label><input type="radio" name="gender" value="Female"><span>Female</span></label>
		                  	</div>
		                    <div class="large-6 columns">&nbsp;</div>
		                </div>
		                <div class="row">
		                  <div class="large-12 columns"><input type="text" name='company_name' placeholder="Company Name"></div>
		                </div>
		                <div class="row">
		                  <div class="large-12 columns"><input type="text" name='department' placeholder="Department"></div>
		                </div>

		                <div class="row">
		                  <div class="large-12 columns"><input type="text" name='address' placeholder="Address" required></div>
		                </div>

		                <div class="row">
		                  <div class="large-12 columns"><input type="text" name='nationality' placeholder="Nationality"></div>
		                </div>

		                <div class="row">
		                  <div class="large-12 columns right"><input type="submit" class="btn search btn-primary ayar-wagaung" value="Enroll"></div>
		                </div>
		            </form>
            	</div>
				<div class="large-4 columns">&nbsp;</div>
			</div>
			<div class="br_line">&nbsp;</div><br><br>
		</div>
	</div>
	<br>
	<script type="text/javascript">

	</script>
@stop
