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
    .rg-image-wrapper{max-height: 350px;}
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
	.rg-image {height: 350px;}
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
								@if(count($responses['banner']) >0)
									@foreach($responses['banner'] as $banner)
										<?php $linkurl="/type/en/seminar" ;?>
										<li>
											<a href="#">
												<img src="" data-large="../../bannerphoto/php/files/{{$banner->image}}" data-linkurl="{{$linkurl}}" data-description="{{$banner->title}}" data-price="">
											</a>
										</li>
									@endforeach
								@endif
								
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
	<div class="row">
		<div class="large-3 medium-3 columns left_padding_none">
			@include('include.leftnav')
		</div>
		
		<div class="large-9 medium-9 columns right_padding_none">
			<h3 class="cat_title">Search result for "{{$title}}"</h3>
			<br>
			@if($response)
				<?php $i=1; ?>
				@foreach($response as $row)
					<div class="row list_panel">
						<div class="large-4 medium-4 columns">
								@if($row->image) 
									@if($title=="News / Events")
										<img src="../../news_eventsphoto/php/files/{{$row->image}}"> 
									@else
										<img src="../../seminar_img/php/files/{{$row->image}}"> 
									@endif
								@else 
									<img src="../../img/img.png"> 
								@endif
						</div>
						@if($type=="seminar")
						<div class="large-8 medium-8 columns nopadding">
							<a href="/type/en/{{str_replace('/','-',$type)}}/{{$row->id}}/{{$row->name}}"><h4>{{$row->name}}</h4></a>
							<p style="min-height:80px;">{{substr(strip_tags($row->description),0,350)}} ...</p>
							<div class="clear">&nbsp;</div>
							<a href="/type/en/{{str_replace('/','-',$type)}}/{{$row->id}}/{{$row->name}}"><span class="more">Read More</span></a>
						</div>
						@else
							@if($language=="japan")
								<div class="large-8 medium-8 columns nopadding">
									<a href="/type/en/{{str_replace('/','-',$type)}}/{{$row->id}}/{{$row->name}}"><h4>{{$row->name}}</h4></a>
									<p style="min-height:80px;">{{substr(strip_tags($row->description),0,350)}} ...</p>
									<div class="clear">&nbsp;</div>
									<a href="/type/en/{{str_replace('/','-',$type)}}/{{$row->id}}/{{$row->name}}"><span class="more">Read More</span></a>
								</div>
							@elseif($language=="myanmar")
								<div class="large-8 medium-8 columns nopadding">
									<a href="/type/en/{{str_replace('/','-',$type)}}/{{$row->id}}/{{$row->name}}"><h4>{{$row->name}}</h4></a>
									<p style="min-height:80px;">{{substr(strip_tags($row->description),0,350)}} ...</p>
									<div class="clear">&nbsp;</div>
									<a href="/type/en/{{str_replace('/','-',$type)}}/{{$row->id}}/{{$row->name}}"><span class="more">Read More</span></a>
								</div>
							@else
								<div class="large-8 medium-8 columns nopadding">
									<a href="/type/en/{{str_replace('/','-',$type)}}/{{$row->id}}/{{$row->name}}"><h4>{{$row->name}}</h4></a>
									<p style="min-height:80px;">{{substr(strip_tags($row->description),0,350)}} ...</p>
									<div class="clear">&nbsp;</div>
									<a href="/type/en/{{str_replace('/','-',$type)}}/{{$row->id}}/{{$row->name}}"><span class="more">Read More</span></a>
								</div>
							@endif
							
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
