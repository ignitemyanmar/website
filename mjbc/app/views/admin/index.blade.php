@extends('../admin')
@section('content')
    {{HTML::style('../../../css/hover/component.css')}}
    {{HTML::style('../../../css/hover/default.css')}}
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
								Dashboard				
								<small></small>
							</h3>
							<ul class="breadcrumb">
								<li>
									<i class="icon-home"></i>
									<a href="/">Home</a> 
									<i class="icon-angle-right"></i>
								</li>
								<li><a href="/dashboard">Dashboard</a></li>
								
							</ul>
							<!-- END PAGE TITLE & BREADCRUMB-->
						</div>
					</div>
				<!-- END PAGE HEADER-->
				<div id="dashboard">
					<!-- BEGIN DASHBOARD STATS -->
					
					<!-- <div class="row-fluid">
						<ul class="grid cs-style-3">
							<li class="span4">
								<figure>
									<img src="../img/bgphone.png" alt="img04">
									<figcaption>
										<h3>Settings</h3>
										<span>Jacob Cummings</span>
										<a href="http://dribbble.com/shots/1116685-Settings">Take a look</a>
									</figcaption>
								</figure>
							</li>
							<li class="span4">
								<figure>
									<img src="../img/bgphone.png" alt="img01">
									<figcaption>
										<h3>Camera</h3>
										<span>Jacob Cummings</span>
										<a href="http://dribbble.com/shots/1115632-Camera">Take a look</a>
									</figcaption>
								</figure>
							</li>
							<li class="span4">
								<figure>
									<img src="../img/bgphone.png" alt="img01">
									<figcaption>
										<h3>Camera</h3>
										<span>Jacob Cummings</span>
										<a href="http://dribbble.com/shots/1115632-Camera">Take a look</a>
									</figcaption>
								</figure>
							</li>
						</ul>

					</div> -->
					
					<div class="row-fluid">
						<div class="responsive span6" data-tablet="span6" data-desktop="span3">
							<div class="dashboard-stat orange">
								<div class="visual">
									<i class="icon-comments"></i>
								</div>
								<div class="details">
									<div class="number">
										35
									</div>
									<div class="desc">									
										New Feedbacks
									</div>
								</div>
								<a class="more" href="#">
								View more <i class="m-icon-swapright m-icon-white"></i>
								</a>						
							</div>
						</div>
						<div class="responsive span6" data-tablet="span6" data-desktop="span3">
							<div class="dashboard-stat light-green">
								<div class="visual">
									<i class="icon-shopping-cart"></i>
								</div>
								<div class="details">
									<div class="number">80</div>
									<div class="desc">New Orders</div>
								</div>
								<a class="more" href="#">
								View more <i class="m-icon-swapright m-icon-white"></i>
								</a>						
							</div>
						</div>
						<div class="responsive span6 fix-offset" data-tablet="span6  fix-offset" data-desktop="span3">
							<div class="dashboard-stat red">
								<div class="visual">
									<i class="icon-bar-chart"></i>
								</div>
								<div class="details">
									<div class="number">100</div>
									<div class="desc">Balance Low Items</div>
								</div>
								<a class="more" href="#">
								View more <i class="m-icon-swapright m-icon-white"></i>
								</a>						
							</div>
						</div>
						<div class="responsive span6" data-tablet="span6" data-desktop="span3">
							<div class="dashboard-stat light blue">
								<div class="visual">
									<i class="icon-bar-chart"></i>
								</div>
								<div class="details">
									<div class="number">1300</div>
									<div class="desc">Total Items</div>
								</div>
								<a class="more" href="#">
								View more <i class="m-icon-swapright m-icon-white"></i>
								</a>						
							</div>
						</div>
					</div>
					
					<!-- END DASHBOARD STATS -->
					
				</div>
			</div>
			<!-- END PAGE CONTAINER-->		
		</div>
		<!-- END PAGE -->	
  <script src="assets/js/jquery.blockui.js"></script>
  {{HTML::script('../js/hover/modernizr.custom.js')}}
  {{HTML::script('../js/hover/toucheffects.js')}}
@stop