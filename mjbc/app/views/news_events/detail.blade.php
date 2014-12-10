@extends('../master')
@section('content')
{{HTML::style('slider/css/style.css')}}
{{HTML::style('slider/css/elastislide.css')}}
{{HTML::style('css/slider.css')}}
{{HTML::style('../slider/css/demo.css')}}

<style type="text/css">
	ul{font-size: 14px;color: #333;}
	.panel{background: transparent;}
	.panel h3{margin-bottom: 1rem;}
	h4,h3, .side-nav{margin-top: 0;padding-top: 0;}
	.left_padding_none{padding-left: 0;}
	.right_padding_none{padding-right: 0;}
	ul.pgwSlider > li span, .pgwSlider > ul > li span {
    display: none;}
    .es-carousel {height: 12px;}
    /*.rg-image-wrapper{max-height: 240px;}*/
    .list_panel{margin-bottom: 1rem;}
    .list_panel img{border:1px solid #eee; padding: 3px;width: 100%;}
    .br_line{border-bottom: 2px dotted #999;width:95%;margin:auto;padding-bottom: 35px;}
    .cat_title {
		border-left: none;
		border-right: none;
		text-align: center;
		text-transform: uppercase;
		font-size: 21px;
		border-bottom: 3px dotted #992418;
		width: 95%;
		margin: auto;
		padding-bottom: 10px;
	}
	ul.pgwSlider > li span, .pgwSlider > ul > li span {
    display: none;}
    #contentdetail{border:1px solid #ccc;}
    #contentdetail .row{padding: 9px 0 3px;}
    #contentdetail .row:nth-of-type(odd){background: #DfDfDf;}
    #contentdetail .row:nth-of-type(even){background: #eee;}
    #contentdetail .row .large-3:after{content: ":";font-weight: bold; position: absolute;right: 10px;}

    .rg-image img{min-width: 45%;}
</style>


<script id="img-wrapper-tmpl" type="text/x-jquery-tmpl">	
	<div class="rg-image-wrapper">
			<div class="rg-image-nav">
				<a href="#" class="rg-image-nav-prev">Previous Image</a>
				<a href="#" class="rg-image-nav-next">Next Image</a>
			</div>
			
		<div class="rg-image"></div>
		<div class="rg-loading"></div>
		<div class="rg-caption-wrapper">
			<div class="rg-caption" style="display:none;">
				<p></p>
				<span class="carprice"></span>
			</div>
		</div>
	</div>
</script>
	<div class="row">
		<div class="large-3 medium-3 columns left_padding_none">
			@include('include.leftnav')
		</div>
		<div class="large-9 medium-9 columns right_padding_none">
			@if($response)
				<div class="row">
					@if($language=="japan")
						<h3>{{$response->name_jp}}</h3>
					@elseif($language=="myanmar")
						<h3 class="Zawgyi-One">{{$response->name_mm}}</h3>
					@else
						<h3>{{$response->name}}</h3>
					@endif
					
					<!-- <div class="large-12 columns nopadding"> -->
					<div id="rg-gallery" class="rg-gallery">
						<div class="rg-thumbs">
							<!-- Elastislide Carousel Thumbnail Viewer -->
							<div class="es-carousel-wrapper">
								<div class="es-nav">
									<span class="es-nav-prev">Previous</span>
									<span class="es-nav-next">Next</span>
								</div>
								<div class="es-carousel">
									<ul>

										<li>
											<a href="#">
												<img src="" data-large="../../../../img/banner.png" data-description="" data-price="">
											</a>
										</li>
										<li>
											<a href="#">
												<img src="" data-large="../../../../img/ban1.jpg" data-description="" data-price="">
											</a>
										</li>
										<li>
											<a href="#">
												<img src="" data-large="../../../../img/banner.png" data-description="" data-price="">
											</a>
										</li>
										<li>
											<a href="#">
												<img src="" data-large="../../../../img/ban1.jpg" data-description="" data-price="">
											</a>
										</li>
										<!-- <img src="../slider/img/pattern.png" alt="" data-linkurl="" data-large="../slider/img/pattern.png" data-description="" data-price=""/> -->
										<!-- <li><a href="#"><img src="images/thumbs/1.jpg" data-large="images/1.jpg" alt="image01" data-description="From off a hill whose concave womb reworded" /></a></li> -->
									</ul>
								</div>
							</div>
							<!-- End Elastislide Carousel Thumbnail Viewer -->
						</div><!-- rg-thumbs -->
					</div>
						<!-- rg-gallery -->
					<!-- </div> -->
				</div>

				@if($language=="japan")
					{{$response->description_jp}}
				@elseif($language=="myanmar")
					{{$response->description_mm}}
				@else
					{{$response->description}}
				@endif
			
			@endif
			<!-- <p>Criminal law was enacted by English Goverment in 1861 after the independence of Myanmar in 1948.  Criminal law was enacted by English Goverment in 1861 after the independence of Myanmar in 1948.  Criminal law was enacted by English Goverment in 1861 after the independence of Myanmar in 1948.  Criminal law was enacted by English Goverment in 1861 after the independence of Myanmar in 1948.</p>
			<p>Criminal law was enacted by English Goverment in 1861 after the independence of Myanmar in 1948.  Criminal law was enacted by English Goverment in 1861 after the independence of Myanmar in 1948.  Criminal law was enacted by English Goverment in 1861 after the independence of Myanmar in 1948.  Criminal law was enacted by English Goverment in 1861 after the independence of Myanmar in 1948.</p>
			<p>Criminal law was enacted by English Goverment in 1861 after the independence of Myanmar in 1948.  Criminal law was enacted by English Goverment in 1861 after the independence of Myanmar in 1948.  Criminal law was enacted by English Goverment in 1861 after the independence of Myanmar in 1948.  Criminal law was enacted by English Goverment in 1861 after the independence of Myanmar in 1948.</p>
			<p>Criminal law was enacted by English Goverment in 1861 after the independence of Myanmar in 1948.  Criminal law was enacted by English Goverment in 1861 after the independence of Myanmar in 1948.  Criminal law was enacted by English Goverment in 1861 after the independence of Myanmar in 1948.  Criminal law was enacted by English Goverment in 1861 after the independence of Myanmar in 1948.</p>
				 -->
			<div class="br_line">&nbsp;</div><br><br>
		</div>
	</div>
	<br>
	<!-- <div class="row">
		<div class="large-12 columns nopadding">
			<p><b>Held on September, 26, 2014</b><br>
			Own companies that are considering expanding and companies operating in Myanmar-like requirements of the current management methods that take advantage of the Myanmar human resources has completed its successful. 
		</div>
	</div>
	<br> -->
{{HTML::script('../../slider/js/jquery.tmpl.min.js')}}
{{HTML::script('../../slider/js/jquery.easing.1.3.js')}}
{{HTML::script('../../slider/js/jquery.elastislide.js')}}
{{HTML::script('../../slider/js/gallery.js')}}
<script type="text/javascript">
        $(function(){
        	function infiniteLoop(time){
					function f(){
						$('.rg-image-nav-next').click() // click the next button
						timer=setTimeout(f,time)
					}
					f()
					$(window).one('click',function(){
						clearTimeout(timer); // get me out of here
						infiniteLoop(115000);
					})
				};

			infiniteLoop(115000);
	    });
	    // Slideshow 3
</script>
@stop
