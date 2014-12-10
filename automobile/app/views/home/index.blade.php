@extends('../master')
@section('content')
{{HTML::style('css/slider.css')}}
<!-- {{HTML::style('slider/css/responsiveslides.css')}} -->
{{HTML::style('slider/css/style.css')}}
{{HTML::style('slider/css/elastislide.css')}}
<style type="text/css">
	ul.pgwSlider > li span, .pgwSlider > ul > li span {
    display: none;}
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

		<div class="large-9 columns left_padding_none">
			<div class="row car_search_row">
				<div class="large-12 columns">
				  	<div class="row nopadding">
				  		<form action="/buy-cars/search-cars" method="get">
					  		<div class="large-2 small-4 columns nopadding" style="margin-top:6px;">
					  			<span class="search-label">ကားၡာရန်</span>
					  		</div>
					  		<div class="large-3 small-8 columns nopadding">
							  	<select name='categories' id='categories' class="left" style="width:100%;">
					  				<option value="Select Category">Select Category</option>
					  				<option value="ျမန္မာျပည္တြင္ေရာက္ရွိေနေသာ ကားမ်ား">ျမန္မာျပည္တြင္ေရာက္ရွိေနေသာ ကားမ်ား</option>
					  				<option value="ဆိပ္ကမ္းေရာက္ တန္ဖုိးျဖင့္ေရာင္းမည့္ကားမ်ား">ဆိပ္ကမ္းေရာက္ တန္ဖုိးျဖင့္ေရာင္းမည့္ကားမ်ား</option>
					  				<option value="စလစ္မ်ား">စလစ္မ်ား</option>
									<option value="အပ္ႏွံရမည့္ ယာဥ္အုိယာဥ္ေဟာင္းမ်ား">အပ္ႏွံရမည့္ ယာဥ္အုိယာဥ္ေဟာင္းမ်ား</option>
					  			</select>
				  			</div>
				  			<div class="show-for-small-only">
				  				<div class="clearfix">&nbsp;</div>
				  			</div>

				  			<div class="small-4 columns show-for-small-only">&nbsp;</div>
					  		<div class="large-3 small-8 columns nopadding">
					  			<div id='makeframe'>
						  			<select name='make' id='make' class="left">
						  				<option value="Select Make">Select Brand</option>
						  			</select>
					  			</div>
				  			</div>
				  			<div class="show-for-small-only">
				  				<div class="clearfix">&nbsp;</div>
				  			</div>
				  			
				  			<div class="small-4 columns show-for-small-only">&nbsp;</div>
					  		<div class="large-3 small-8 columns nopadding">
					  			<div id="modelframe">
						  			<select name='models' id='model' class="left">
						  				<option value="Select Model">Select Model</option>
						  			</select>
					  			</div>
				  			</div>
				  			<div class="show-for-small-only">
				  				<div class="clearfix">&nbsp;</div>
				  			</div>

					  		<div class="large-1 small-12 columns">
						  		<input type="submit" value="Search" class="btn search btn-primary right">
					  		</div>
				  		</form>
			  		</div>

		  		</div>
			</div>
			<div class="clear">&nbsp;
			</div>
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
										<?php $i=0; ?>
										@foreach($response['slider'] as $slide)
										<?php 
											$labeltitle=$slide->make .' '.$slide->model; 
											$car_price="Price : ".$slide->price ;
											$linkurl="buy-car/". str_replace(' ','-',$slide->category). "/".  $slide->id ."/". str_replace(' ','-',$slide->make)."/".str_replace(' ','-',$slide->model);
										?>
										<li>
											<a href="#">
											    @if($slide->image=='')
													<img src="../slider/img/pattern.png" alt="{{$labeltitle}}" data-linkurl="{{$linkurl}}" data-large="../slider/img/pattern.png" data-description="{{$labeltitle}}" data-price="{{$car_price}}"/>
											    @else
													<img src="../carphoto/php/files/{{$slide->image}}" alt="{{$labeltitle}}" data-linkurl="{{$linkurl}}" data-large="../carphoto/php/files/{{$slide->image}}" data-description="{{$labeltitle}}" data-price="{{$car_price .' သိန္း' }}"/>
											    @endif
											</a>
										</li>
										<?php $i++; ?>
										@endforeach
										<!-- <li><a href="#"><img src="images/thumbs/1.jpg" data-large="images/1.jpg" alt="image01" data-description="From off a hill whose concave womb reworded" /></a></li> -->
									</ul>
								</div>
							</div>
							<!-- End Elastislide Carousel Thumbnail Viewer -->
						</div><!-- rg-thumbs -->
					</div><!-- rg-gallery -->
				<!-- </div> -->
			</div>
			<div class="clear">&nbsp;</div>
			<div class="clear">&nbsp;</div>
			
			<div class="row " style="padding:6px">
				<div class="content-title">
			  		<span class="icon-logo"></span>
			  		ေနာက်ဆုံးတင်ထားေသာကားများ
			  		<span class="bottom-line"></span>

		  		</div>
			  	<div class="large-12 medium-12 columns list-frame">
			  		<?php $i=1; $counts=count($response['latest']) ?>
			  		@foreach($response['latest'] as $latest)
				  		@if($i==1 || $i%3==1)
				  		<div class="row">
				  		@endif
					  		<div class="large-4 medium-4 small-12 car-list columns  left">
						    	<div class="car-list-frame carimg top">
						            @if($latest->make && $latest->model)
						            <a href="buy-car/{{str_replace(' ','-',$latest->category)}}/{{ $latest->id}}/{{str_replace(' ','-',$latest->make)}}/{{str_replace(' ','-',$latest->model)}}" class=" expsumo_left">
				                    @else
						            <a href="#" class=" expsumo_left">
				                    @endif
				                        <img src="../carphoto/php/files/{{ $latest->image}}"><!-- style="width:100%;max-width:100%; height:auto;" -->
						            </a>
					            </div>
					            <div class="clear"></div>
					            <div class="info">
						            <a href="buy-car/{{str_replace(' ','-',$latest->category)}}/{{ $latest->id}}/{{str_replace(' ','-',$latest->make)}}/{{str_replace(' ','-',$latest->model)}}">
							    		<span>{{ $latest->make.' '. $latest->model}}</span>
						    		</a>
						    		<span class="view">View {{$latest->viewcount}}</span>
					    		</div>
					            <div class="clear" style="height:14px;"></div>

				            </div>
					    @if($i==$counts || $i%3==0)
					    </div>
				  		@endif
				  		<?php $i++; ?>
			  		@endforeach
			    </div>
			</div>    
			<div class="clear">&nbsp;</div>
			<div class="clear">&nbsp;</div>

			<div class="row " style="padding:6px">
			  	<div class="content-title">
			  		<span class="icon-logo"></span>
			  		Browsed by Brand
			  		<span class="bottom-line"></span>
		  		</div>
			  	
			  	<div class="large-12 medium-12 columns list-frame">
			  		@if($response['make'])
			          	<ul class="example-orbit-content" data-orbit data-options="animation:slide;pause_on_hover:true;animation_speed:300;navigation_arrows:true;bullets:false;next_on_click:true;"> 
				            <?php $i=1; $count=count($response['make']); ?>
				            @foreach($response['make'] as $rows)
				            @if($i==1 || $i%5==1)
				            <li> 
				            	<div class="row">
					            <div class="large-1 columns" style="padding:10px;">&nbsp;</div>

				            @endif
					                <div class="large-2 small-4 columns left  related" style="padding:10px;">
										<a href="buy-car/brands/{{str_replace(' ','-',$rows['make'])}}">
					                	<div style="min-height:118px; max-height:118px; over-flow:hidden;">
											<img src="makephoto/php/files/{{ $rows->image}}" style="min-height:118px;">
										</div>
		                                </a>
									</div>
				            @if($i==$count || $i%5==0)
					            	<div class="large-1 columns" style="padding:10px;">&nbsp;</div>
				            	</div>
				            </li> 
				            @endif
				            <?php $i++; ?>
				            @endforeach
				            
			            </ul>
		            @endif
			  	</div>

			</div>

			<div class="clear">&nbsp;</div>
			<!-- for feature cars -->
      		@if(count($response['feature'])>0)
				<div class="row " style="padding:6px">
					<div class="content-title">
			  		<span class="icon-logo"></span>
			  		Feature Cars
			  		<span class="bottom-line"></span>

		  		</div>
			      	<!-- <div class="orbit-container">  -->
			      	<div class="large-12 columns list-frame">
				          	<ul class="example-orbit-content" data-orbit data-options="animation:slide;pause_on_hover:true;animation_speed:300;navigation_arrows:true;bullets:false;next_on_click:true;"> 
					            <?php $i=1; $count=count($response['feature']); ?>
					            @foreach($response['feature'] as $feature)
					            @if($i==1 || $i%6==1)
					            <li> 
					            	<div class="row">
					            @endif
						                <div class="large-2 small-4 columns left  related">
											<a href="buy-car/{{str_replace(' ','-',$feature->category)}}/{{ $feature->id}}/{{str_replace(' ','-',$feature->make)}}/{{str_replace(' ','-',$feature->model)}}">
											<span></span>
						                	<div style="min-height:98px;">
												<!-- <div class="imgframe"> -->
													<img src="carphoto/php/files/{{ $feature->image}}">
												<!-- </div> -->
											</div>
											<div class="expimg_text label label-info">
												<div class="expautos_images_text expimg_strong initialism" style="width:100px;">
			                        	            {{ $feature->make.' '. $feature->model}}     
			                	                </div>
			                       				<div class="expautos_images_price">
			                       					<center>{{ $feature->price}} K<br></center>
			                   					</div>
			                                </div>
			                                </a>
										</div>
					            @if($i==$count || $i%6==0)
					            	</div>
					            </li> 
					            @endif
					            <?php $i++; ?>
					            @endforeach
					            
				            </ul>
			      	</div>
			    </div>
            @endif
			<div class="clear">&nbsp;</div>
		</div>
{{HTML::script('js/search/search-car.js')}}
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
						infiniteLoop(8000);
					})
				};

			infiniteLoop(8000);
	    });
	    // Slideshow 3
	    
</script>

@stop
