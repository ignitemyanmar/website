@extends('../master')
@section('content')

{{HTML::style('slider/css/style.css')}}
{{HTML::style('slider/css/elastislide.css')}}
{{HTML::style('css/slider.css')}}
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
								@if(count($response['banner']) >0)
									@foreach($response['banner'] as $banner)
										<?php $linkurl="/type/en/seminar" ;?>
										<li>
											<a href="#">
												<img src="" data-large="bannerphoto/php/files/{{$banner->image}}" data-linkurl="{{$linkurl}}" data-description="{{$banner->title}}" data-price="">
											</a>
										</li>
									@endforeach
								@endif
								
							</ul>
						</div>
					</div>
					<!-- End Elastislide Carousel Thumbnail Viewer -->
				</div><!-- rg-thumbs -->
			</div><!-- rg-gallery -->
		<!-- </div> -->
	</div>
	
	<div class="clear">&nbsp;</div>
	<div class="row">
		<div class="large-3 medium-3 columns left_padding_none">
			@include('include.leftnav')
		</div>
		<?php 
			$zawgyi='';
			if($language=='myanmar') $zawgyi="zg";
		?>
		<div class="large-7 medium-7 columns left_padding_none">
			<div class="row">
				@if($response['seminar'])
					@foreach($response['seminar'] as $seminar)
						<div class="large-6 medium-6 columns left_padding_none">
							<a href="/type/en/seminar/{{$seminar->id}}/{{str_replace(' ','-',$seminar->name)}}">
								<h4 class="title {{$zawgyi}}" title="{{$seminar->name}}">{{$seminar->name}}</h4>
								<div class="imageframe">
									@if(count($seminar->images)>0)
											<img src="../../seminar_img/php/files/medium/{{$seminar->images[0]->images}}">
									@else
										<img src="../../img/seminar.png">
									@endif
								</div>
							</a>
							<p style="min-height:100px;" class="{{$zawgyi}}">
								{{substr(strip_tags($seminar->description), 0, 150)}}
							</p>
							<a href="/type/en/seminar/{{$seminar->id}}/{{str_replace(' ','-',$seminar->name)}}"><span class="more right {{$zawgyi}}">{{$more}}</span></a>

						</div>
					@endforeach
				@endif
			</div>
			<hr>
			<div class="clear">&nbsp;</div>
			<div class="clear">&nbsp;</div>
			<h4 class="heading_title {{$zawgyi}}">{{$about_title}}</h4>
			@if($response['aboutus'])
				@if($language=='japan')
					<p>{{substr(strip_tags($response['aboutus']->description_jp),0,320)}}...<a href="/en/about-us" class="links">{{$more}}</a></p>
				@elseif($language=="myanmar")
					<p class="{{$zawgyi}}">{{substr(strip_tags($response['aboutus']->description_mm),0,320)}}...<a href="/en/about-us" class="links">{{$more}}</a></p>
				@else
					<p>{{substr(strip_tags($response['aboutus']->description),0,320)}}...<a href="/en/about-us" class="links">{{$more}}</a></p>
				@endif
			@endif
			<div class="clear">&nbsp;</div>
			<div class="clear">&nbsp;</div>
			<hr>
			

			<h4 class="heading_title {{$zawgyi}}">{{$new_event_title}}</h4>
			@if($response['news_events'])
				@if($language=='japan')
					<p>{{substr(strip_tags($response['news_events'][0]->description_jp),0,320)}}...<a href="/news&events" class="links">{{$more}}</a></p>
				@elseif($language=="myanmar")
					<p class="{{$zawgyi}}">{{substr(strip_tags($response['news_events'][0]->description_mm),0,320)}}...<a href="/news&events" class="links">{{$more}}</a></p>
				@else
					<p>{{substr(strip_tags($response['news_events'][0]->description),0,320)}}...<a href="/news&events" class="links">{{$more}}</a></p>
				@endif
			@endif
			<br>
			<div class="clear">&nbsp;</div>

			<div class="large-12 medium-12 columns list-frame nopadding">
	          	<ul data-orbit data-options="animation:slide;pause_on_hover:false;timer_speed: 100,animation_speed:300;navigation_arrows:true;bullets:false;next_on_click:true;"> 
		            @if(count($response['news_events'])>0)
		            	<?php $i=1; ?>
			            	@foreach($response['news_events'] as $row)
			            		@if($i==1 || $i%4==1)
				            	<li class="related"> 
						            <div class="row" style="background:transparent;">
						        @endif
						                <div class="large-3 medium-3 small-4 columns left" style="padding:10px;">
											<a href="/type/lan/id/title">
						                	<div style="min-height:70px; max-height:70px; over-flow:hidden;">
												<a href="/news&events/{{$row->id}}/{{str_replace(' ','-',$row->name)}}">
												@if(count($row->image)>0)
													@if(file_exists("news_eventsphoto/php/files/".$row->image))
														<img src="news_eventsphoto/php/files/{{$row->image}}" alt="" style="max-height:70px;min-height:70px;width:auto;">
													@else
														<div style="width:70px; height:70px;background:#eee;margin:auto;"></div>
													@endif
												@else
														<div style="width:70px; height:70px;background:#eee;margin:auto;"></div>
												@endif
												</a>
											</div>
				                            </a>
										</div>
										
								@if($i==count($response['news_events']) || $i%4==0)
				            		</div>
					            </li>
						        @endif
		            			<?php $i++; ?>
						            
				            @endforeach

		            @endif
		            
	            </ul>
		  	</div>
		</div>
		<div class="large-2 medium-2 columns nopadding">
			<div class="clear_row">&nbsp;</div>
			<img src="../../img/rightadv.png" style="border:1px solid #ccc;float:right;margin-bottom:1rem;">
			<a href="/type/en/seminar"><img src="../../img/enroll.png"></a>
			<div class="clear_row">&nbsp;</div><br>
			@if(Session::has('message'))
				<div class="alert">{{Session::get('message')}}</div>
			@endif
			<form action="/user/login" method="post" class="register">
				<label class="{{$zawgyi}}">{{$email}}</label>
				<input type="text" name="email" required>
				<label class="{{$zawgyi}}">{{$password}}</label>
				<input type="password" name="password" required>

				<input type="submit" value="{{$login}}" class="register_btn" required>
			</form>
			<h4 class="nav-header" style="margin-bottom:0;">{{$photo}}</h4>
			<ul data-orbit data-options="animation:slide;pause_on_hover:false;timer_speed: 100,animation_speed:300;navigation_arrows:true;bullets:false;next_on_click:true;"> 
	            <li> 
	            	<img src="img/newsimg2.png" alt="" style="padding:2px; border:1px solid #eee;width:100%;">
	            </li>
	            <li> 
	            	<img src="img/climbmountain.png" alt="" style="padding:2px; border:1px solid #eee;width:100%;">
	            </li>
	            <li> 
	            	<img src="img/newsimg3.png" alt="" style="padding:2px; border:1px solid #eee;width:100%;">
	            </li>
	            <li> 
	            	<img src="img/seminar.png" alt="" style="padding:2px; border:1px solid #eee;width:100%;">
	            </li> 
            </ul>
				
				

		</div>
	</div>
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
						infiniteLoop(9000);
					})
				};

			infiniteLoop(9000);
	    });
	    // Slideshow 3
	    
</script>
@stop
