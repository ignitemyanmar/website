@extends('../master')
@section('content')
{{HTML::style('slider/css/style.css')}}
{{HTML::style('slider/css/elastislide.css')}}
{{HTML::style('css/slider.css')}}

<style type="text/css">
	.left_padding_none{padding-left: 0;}
	.right_padding_none{padding-right: 0;}
	ul.pgwSlider > li span, .pgwSlider > ul > li span {
    display: none;}
    .es-carousel {height: 12px;}
    .rg-image-wrapper{max-height: 240px;}
    table{border:1px solid #901C12;}
    table thead tr th{text-align: center; background: #9E2A20;color:white;}
    table thead tr th,table tr td {border-color:rgba(0, 0, 0, .2);}
    table tbody tr td, table tr td, table tfoot tr td {
	    display: table-cell;
	    line-height: 1.125rem;
	    font-size: 13px;
	    min-width: 45px;
	    padding: 0.5625rem 0.225rem;
	}

    .oddrow td{background: #FDE9D9;}
    .evenrow td{background: #fff;}
    ul.pgwSlider > li span, .pgwSlider > ul > li span {
    display: none;}
    .rg-image {height: 250px;}
    .red{background: #FF0000 !important;}
    .yellow{background: #FFCC00 !important;}
    .green{background: #33EB5A !important;}
    table{border-collapse: collapse;}
    table thead tr th{
	    padding: 0.5rem 0.1rem 0.625rem;
	    font-family: "Zawgyi-One" !important;
	}
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
								<li>
									<a href="#">
										<img src="" data-large="img/banner.png" data-description="Criminal law was enacted by English Goverment in 1861 after the independence of Myanmar in 1948" data-price="">
										<!-- <img src="../slider/img/pattern.png" alt="" data-linkurl="" data-large="../slider/img/pattern.png" data-description="" data-price=""/> -->
									</a>
								</li>
								<li>
									<a href="#">
										<img src="" data-large="img/ban1.jpg" data-description="Criminal law was enacted by English Goverment in 1861 after the independence of Myanmar in 1948" data-price="">
										<!-- <img src="../slider/img/pattern.png" alt="" data-linkurl="" data-large="../slider/img/pattern.png" data-description="" data-price=""/> -->
									</a>
								</li>

								<li>
									<a href="#">
										<img src="" data-large="img/banner.png" data-description="Criminal law was enacted by English Goverment in 1861 after the independence of Myanmar in 1948" data-price="">
										<!-- <img src="../slider/img/pattern.png" alt="" data-linkurl="" data-large="../slider/img/pattern.png" data-description="" data-price=""/> -->
									</a>
								</li>
								<li>
									<a href="#">
										<img src="" data-large="img/ban1.jpg" data-description="Criminal law was enacted by English Goverment in 1861 after the independence of Myanmar in 1948" data-price="">
										<!-- <img src="../slider/img/pattern.png" alt="" data-linkurl="" data-large="../slider/img/pattern.png" data-description="" data-price=""/> -->
									</a>
								</li>
								<li>
									<a href="#">
										<img src="" data-large="img/banner.png" data-description="Criminal law was enacted by English Goverment in 1861 after the independence of Myanmar in 1948" data-price="">
										<!-- <img src="../slider/img/pattern.png" alt="" data-linkurl="" data-large="../slider/img/pattern.png" data-description="" data-price=""/> -->
									</a>
								</li>
								<li>
									<a href="#">
										<img src="" data-large="img/ban1.jpg" data-description="Criminal law was enacted by English Goverment in 1861 after the independence of Myanmar in 1948" data-price="">
										<!-- <img src="../slider/img/pattern.png" alt="" data-linkurl="" data-large="../slider/img/pattern.png" data-description="" data-price=""/> -->
									</a>
								</li>
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
	
	<div class="clear">&nbsp;&nbsp;</div>
	<div class="row">
		<div class="large-3 medium-3 columns left_padding_none">
			@include('include.leftnav')
		</div>
		<?php 
			$language=Session::get('language') ? Session::get('language') : "english"; 
			if($language=="japan"){
				$title="訓練計画";
				$trainingcourses="トレーニングコース";
				$venue="会場";
				$trainingcoursecode="トレーニングコースのコード";
				$mmfont="";
			}elseif($language=="myanmar"){
				$title="သင္တန္း အခ်ိန္စာရင္း";	
				$trainingcourses="သင္တန္း ဘာသာရပ္";
				$venue="ေနရာ";
				$trainingcoursecode="ဘာသာရပ္ ကုဒ္နံပါတ္";
				$mmfont="Zawgyi-One";

			}else{
				$title="Training Schedule";
				$trainingcourses="Training Courses";
				$venue="Venue";
				$trainingcoursecode="Trainging Course Code";
				$mmfont="";
			}
		?>
		<div class="large-9 medium-9 columns right_padding_none">
			<h4 class="heading_title {{$mmfont}}">{{$title}}</h4>
			<table cellspacing="0" border="1">
				<thead>
					<?php 
						// $months=array(7,8,9,10,11,12,1,2); 
						$months=array();
						$Ms_prev_year=0;
						$Ms_this_year=0;
						$Ms_next_year=0;
						$currentmonth=(int) date('m'); 
						$k=2;
						for($j=2; $j>0; $j--){
							$prev_month=$currentmonth-$k;
							if($prev_month<1){
								$prev_month=12+$prev_month;
							}
							if($prev_month>10){
								$Ms_prev_year+=1;
							}else{
								$Ms_this_year+=1;
							}
							$months[2-$j]=$prev_month;
							$k--;
						}
						// $Ms_this_year=0;
						for($i=0; $i<6; $i++){
							$month=$currentmonth+$i;
							if($month>12){
								$month=$month-12;
								$Ms_next_year+=1;
							}else{
								$Ms_this_year+=1;
							}
							$months[$i+2]=$month;
						}
						$prevyear=date('Y')-1; 
						$currentyear=date('Y'); 
						if($currentmonth<4)
						$nextyear=$currentyear;
						else
						$nextyear=date('Y')+1;

						if($currentmonth==12){
							$Ms_this_year=3;
							$Ms_prev_year=0;
							// $currentyear=$currentyear
						}
					?>
					<tr>
						<th rowspan="2" style="white-space: nowrap;">{{$trainingcourses}}</th>
						<th rowspan="2">{{$venue}}</th>
						<th rowspan="2">{{$trainingcoursecode}}</th>
						<!-- <th rowspan="2">Days</th> -->
						@if($Ms_this_year==8)
						<th colspan="8">{{$currentyear}}</th>
						@else
							<th colspan="{{$Ms_this_year>5 ? (8-$Ms_this_year) : $Ms_this_year }}">@if($Ms_prev_year) {{$currentyear-1}} @else {{$currentyear}} @endif</th>
							<th colspan="{{$Ms_next_year>0 ? $Ms_next_year : $Ms_this_year }}">@if($Ms_next_year){{$nextyear}} @else {{$currentyear}} @endif</th>	
						@endif
						
					</tr>
					
					<tr>
						@foreach($months as $month)
							<th style="min-width:30px;">{{$month}}</th>
						@endforeach
					</tr>
				</thead>
				<tbody>
					@if($response)
						<?php $i=1; ?>
						@foreach($response as $row)
							<?php $j=0; ?>
							@if($row['courses'])
								@foreach($row['courses'] as $schedule)
									<tr class="evenrow">
										@if($j==0)<td rowspan="{{count($row['courses'])}}">{{$row->name}}</td>@endif
										@if($schedule['time_table']) 
											<td><p style="white-space: nowrap;text-overflow: ellipsis;width: 60px;white-space: nowrap;overflow: hidden;cursor:pointer;" title="{{$schedule['time_table'][0]['venue']}}">{{$schedule['time_table'][0]['venue']}}</p></td>
										@else
											<td>---</td>
										@endif
										<td><p title="{{$schedule['name']}}" style="cursor:pointer;">{{$schedule['code_no']}}</p></td>
										@if($schedule['time_table'])
											<?php $hasschdule=''; $schedulemonth='';?>
											@foreach($months as $month)
												@foreach($schedule['time_table'] as $timetable)
													@if($month==(int) substr($timetable['start_date'],5,2))
														<?php 
															$hasschdule=substr($timetable['start_date'],8,2).'-'.substr($timetable['end_date'],8,2); 
															$schedulemonth=$timetable['start_date'];
														?>
													@endif
												@endforeach

												
												@if($month==(int) substr($schedulemonth,5,2))
													<td @if($month < $currentmonth) class="red" @elseif($month == $currentmonth) class="green" @else class="yellow" @endif >
														{{$hasschdule}}
													</td>
												@else
													<td>&nbsp;&nbsp;</td>
												@endif
												
											@endforeach
										@else
											@foreach($months as $month)
											<td>&nbsp;&nbsp;</td>
											@endforeach
										@endif
										
									</tr>
									<?php $j++; ?>
								@endforeach
								
							@endif
							<?php $j++;$i++; ?>
						@endforeach
					@endif

					
				</tbody>
			</table>
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
						infiniteLoop(5000);
					})
				};

			infiniteLoop(5000);
	    });
	    // Slideshow 3
	    
</script>
@stop
