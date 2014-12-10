@extends('../master')
@section('content')
{{HTML::style('slider/css/style.css')}}
{{HTML::style('slider/css/elastislide.css')}}
{{HTML::style('css/slider.css')}}
<style type="text/css">
	.panel{background: transparent;}
	.panel h3{margin-bottom: 1rem;}
	.panel h4, h4{margin-top: 0;padding-top: 0;}
	.left_padding_none{padding-left: 0;}
	.right_padding_none{padding-right: 0;}
	ul.pgwSlider > li span, .pgwSlider > ul > li span {
    display: none;}
    .es-carousel {height: 12px;}
    .rg-image-wrapper{max-height: 240px;}
    .list_panel{margin-bottom: 1rem;}
    .list_panel img{border:1px solid #eee; padding: 3px;width: 100%;}
    .br_line{border-bottom: 2px dotted #999;width:95%;margin:auto;padding-bottom: 35px;}
    .cat_title {
		/*text-align: center;*/
		text-transform: uppercase;
		border-bottom: 3px dotted #992418;
		width: 95%;
		margin: auto;
		margin-bottom: 1rem;
	}
	ul.pgwSlider > li span, .pgwSlider > ul > li span {
    display: none;}
	.rg-image {height: 250px;}
</style>
<?php 
	$zawgyi='';
	if($language=="myanmar")
	$zawgyi='zg';
?>
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
{{HTML::style('../slider/css/demo.css')}}
	<div class="row">
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
										<img src="" data-large="../../../bannerphoto/php/files/banner_image1.jpg" data-linkurl="/type/en/seminar" data-description="Criminal law was enacted by English Goverment in 1861 after the independence of Myanmar in 1948" data-price="">
										<!-- <img src="../../../slider/img/pattern.png" alt="" data-linkurl="" data-large="../slider/img/pattern.png" data-description="" data-price=""/> -->
									</a>
								</li>
								<li>
									<a href="#">
										<img src="" data-large="http://mjbc.dev/bannerphoto/php/files/banner_image3.jpg" data-linkurl="/type/en/seminar" data-description="Criminal law was enacted by English Goverment in 1861 after the independence of Myanmar in 1948" data-price="">
									</a>
								</li>

							</ul>
						</div>
					</div>
					<!-- End Elastislide Carousel Thumbnail Viewer -->
				</div><!-- rg-thumbs -->
			</div>
			<!-- rg-gallery -->
		<!-- </div> -->
	</div>
	
	<div class="clear">&nbsp;&nbsp;</div>
	<div class="row {{$zawgyi}}">
		<div class="large-3 medium-3 columns left_padding_none">
			@include('include.leftnav')
		</div>
		
		<div class="large-9 medium-9 columns right_padding_none">
			<h3 class="cat_title">{{$title}}</h3>
			<br>
			@if($response)
				<?php $i=1; ?>
				@foreach($response as $row)
					<div class="row list_panel">
						<div class="large-4 medium-4 columns">
								@if($row->image) 
									<img src="../../news_eventsphoto/php/files/{{$row->image}}"> 
								@else 
									<img src="../../img/img.png"> 
								@endif
						</div>
						@if($language=="japan")
							<div class="large-8 medium-8 columns nopadding">
								<a href="/news&events/{{$row->id}}/{{str_replace(' ','-',$row->name_jp)}}"><h4>{{$row->name_jp}}</h4></a>
								<p style="min-height:80px;">{{substr(strip_tags($row->description_jp),0,350)}} ...</p>
								<div class="clear">&nbsp;</div>
								<a href="/news&events/{{$row->id}}/{{str_replace(' ','-',$row->name_jp)}}"><span class="more">続き</span></a>
							</div>
						@elseif($language=="myanmar")
							<div class="large-8 medium-8 columns nopadding">
								<a href="/news&events/{{$row->id}}/{{str_replace(' ','-',$row->name_mm)}}"><h4>{{$row->name_mm}}</h4></a>
								<p style="min-height:80px;">{{substr(strip_tags($row->description_mm),0,350)}} ...</p>
								<div class="clear">&nbsp;</div>
								<a href="/news&events/{{$row->id}}/{{$row->name_mm}}"><span class="more">အေသးစိတ္ၾကည့္ရန္</span></a>
							</div>
						@else
							<div class="large-8 medium-8 columns nopadding">
								<a href="/news&events/{{$row->id}}/{{str_replace(' ','-',$row->name)}}"><h4>{{$row->name}}</h4></a>
								<p style="min-height:80px;">{{substr(strip_tags($row->description),0,350)}} ...</p>
								<div class="clear">&nbsp;</div>
								<a href="/news&events/{{$row->id}}/{{$row->name}}"><span class="more">Read More</span></a>
							</div>
						@endif
					</div>
					@if($i< count($response))
						<div class="br_line">&nbsp;</div> <br>
					@endif

				<?php $i++; ?>

				@endforeach
				<br>
				{{$response->links()}}
			@endif
			
			
		</div>
	</div>
	<div class="br_line" style="width:100%;">&nbsp;</div>
	<br>

{{HTML::script('slider/js/jquery.tmpl.min.js')}}
{{HTML::script('slider/js/jquery.easing.1.3.js')}}
{{HTML::script('slider/js/jquery.elastislide.js')}}
{{HTML::script('slider/js/gallery.js')}}
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
						infiniteLoop(5000);
					})
				};

			infiniteLoop(5000);
	    });
	    // Slideshow 3
	    
</script>
@stop
