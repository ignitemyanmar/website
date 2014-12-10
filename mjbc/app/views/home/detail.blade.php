@extends('../master')
@section('content')
{{HTML::style('slider/css/style.css')}}
{{HTML::style('slider/css/elastislide.css')}}
{{HTML::style('css/slider.css')}}
{{HTML::style('../slider/css/demo.css')}}
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
<?php 
	$zawgyi='';
	if($language=="myanmar")
	$zawgyi='zg';
?>
	<div class="row {{$zawgyi}}">
		<div class="large-3 medium-3 columns left_padding_none">
			@include('include.leftnav')
		</div>
		<div class="large-9 medium-9 columns right_padding_none">
			@if($response)
				<div class="row">
					<h3>{{$response->name}}</h3>
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
										@if($response->images)
											@foreach($response->images as $row)
												<li>
													<a href="#">
														@if(file_exists("seminar_img/php/files/$row->images"))
														<img src="" data-large="../../../../seminar_img/php/files/{{$row->images}}" data-description="" data-price="">
														@else
														<img src="../../../../bannerphoto/php/files/banner_image1.jpg" alt="" data-linkurl="" data-large="../../../../bannerphoto/php/files/banner_image1.jpg" data-description="" data-price=""/>
														@endif
													</a>
												</li>
											@endforeach
										@else
											<li>
												<a href="#">
													<img src="../../../../bannerphoto/php/files/banner_image1.jpg" alt="" data-linkurl="" data-large="../../../../bannerphoto/php/files/banner_image1.jpg" data-description="" data-price=""/>
												</a>
											</li>
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

				<div id="contentdetail">
					@if(count($response->time_table)>0)
						<div class="row">
							<div class="large-3 columns"><b>Time/Venue </b></div>
							<div class="large-9 columns">
								<p>{{$response->time_table[0]->start_time}}-{{$response->time_table[0]->end_time}} 　Venue: {{$response->time_table[0]->venue}} 　</p>
							</div>
						</div>

						<div class="row">
							<div class="large-3 columns"><b>Date </b></div>
							<div class="large-9 columns">
								<p>{{$response->time_table[0]->start_date}} - {{$response->time_table[0]->end_date}}</p>
							</div>
						</div>
					@endif
					<div class="row">
						<div class="large-3 columns"><b>Participants </b></div>
						<div class="large-9 columns">
							<p>{{$response->subject}}</p>
						</div>
					</div>

					<div class="row">
						<div class="large-3 columns"><b>Capacity</b></div>
						<div class="large-9 columns">
							<p>{{$response->constant_members}}</p>
						</div>
					</div>

					<div class="row">
						<div class="large-3 columns"><b>Fee</b></div>
						<div class="large-9 columns">
							<p>{{$response->tuition_fees}}</p>
						</div>
					</div>

					<div class="row">
						<div class="large-3 columns"><b>Targets</b></div>
						<div class="large-9 columns">
							<p>{{$response->physician}}</p>
						</div>
					</div>

					<div class="row">
						<div class="large-3 columns"><b>Style</b></div>
						<div class="large-9 columns">
							<p>{{$response->implementation_method}}</p>
						</div>
					</div>

					<div class="row">
						<div class="large-3 columns"><b>Language</b></div>
						<div class="large-9 columns">
							<p>{{$response->language}}</p>
						</div>
					</div>
					@if(count($response->time_table)>0)
					<div class="row">
						<div class="large-3 columns"><b>Lecturer</b></div>
						<div class="large-9 columns">
							<p>{{str_replace(',','<br>',$response->time_table[0]->lecturer)}}</p>
						</div>
					</div>
					@endif

					<div class="row">
						<div class="large-3 columns"><b>Training Needs : </b></div>
						<div class="large-9 columns">
							{{$response->training_needs}}
						</div>
					</div>

					<div class="row">
						<div class="large-3 columns"><b>Contents </b></div>
						<div class="large-9 columns">
							{{$response->description}}
						</div>
					</div>
				</div>
				<br>
				<a href="/user/register/{{$response->id}}/{{str_replace(' ','-',$response->name)}}" class="button search">
				@if($language=='english')
					Enroll Now
				@elseif($language=='japan')
					今すぐ入会
				@else
					စာရင္းသြင္းမည္
				@endif

				</a>
			
			@else 
				@if($language=='english')
					<h3>There is no translation with English yet.</h3>
				@elseif($language=='japan')
					<h3>英語との翻訳はまだありません。</h3>
				@else
					<h3>ျမန္မာဘာသာစကားျဖင့္ ဘာသာျပန္ထားျခင္း မရွိေသးပါ။</h3>
				@endif
			@endif
			<div class="br_line">&nbsp;</div><br><br>
		</div>
	</div>
	<br>
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
