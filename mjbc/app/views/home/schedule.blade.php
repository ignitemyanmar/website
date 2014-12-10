@extends('../master')
@section('content')
{{HTML::style('slider/css/style.css')}}
{{HTML::style('slider/css/elastislide.css')}}
{{HTML::style('css/slider.css')}}
<?php 
	$language=Session::get('language') ? Session::get('language') : "english"; 
	if($language=="japan"){
		$title="訓練計画";
		$trainingcourses ="トレーニングコース";
		$venue="会場";
		$trainingcoursecode="トレーニングコースのコード";
	}elseif($language=="myanmar"){
		$title="Training Schedule";	
	}else{
		$title="သင္တန္း အခ်ိန္စာရင္း";
	}
?>
<style type="text/css">
	.left_padding_none{padding-left: 0;}
	.right_padding_none{padding-right: 0;}
	ul.pgwSlider > li span, .pgwSlider > ul > li span {
    display: none;}
    .es-carousel {height: 12px;}
    .rg-image-wrapper{max-height: 240px;}
    table{border:1px solid #901C12;}
    table thead tr th,td, th{text-align: center; background: #9E2A20;color:white;font-family: "Zawgyi-One" !important;}
    table thead tr th,table tr td {border-color:rgba(0, 0, 0, .2);font-family: "Zawgyi-One" !important;}
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
		<div class="large-9 medium-9 columns right_padding_none">
			<h4 class="heading_title">{{$title}}</h4>
			<table cellspacing="0" border="1">
				<thead>
					<?php 
						// $months=array(7,8,9,10,11,12,1,2); 
						$months=array();
						$currentmonth=(int) date('m'); 
						$monthsforcurrent=0;
						$monthsfornext=0;
						$k=2;
						for($j=2; $j>0; $j--){
							$prev_month=$currentmonth-$k;
							if($prev_month<1)
								$prev_month=12+$prev_month;
							$months[2-$j]=$prev_month;
							$k--;
							$monthsforcurrent++;
						}
						
						for($i=0; $i<6; $i++){
							$month=$currentmonth+$i;
							if($month>12){
								$month=$month-12;
								$monthsfornext++;
							}
							$months[$i+2]=$month;
						}
						
						$prevyear=date('Y')-1; 
						$currentyear=date('Y'); 
						if($currentmonth<4)
						$nextyear=$currentyear;
						else
						$nextyear=date('Y')+1;
					?>

					<tr>
					$trainingcourses ="トレーニングコース";
					$venue="会場";
					$trainingcoursecode="トレーニングコースのコード";

						<th rowspan="2" style="white-space: nowrap;">{{$trainingcourses}}</th>
						<th rowspan="2">{{$venue}}</th>
						<th rowspan="2">Training Course's Codes</th>
						<th rowspan="2">Days {{$monthsforcurrent.'--'.$monthsfornext}}</th>
						<th colspan="6">{{$currentyear}}</th>
						<th colspan="2">{{$nextyear}}</th>
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
							<tr class="@if($i%2==0) evenrow @else oddrow @endif">
								<td rowspan="">{{$row->name}}</td>
								@if($row->time_table)
									<td><p style="white-space: nowrap;text-overflow: ellipsis;width: 60px;white-space: nowrap;overflow: hidden;cursor:pointer;" title="{{$row->time_table[0]->venue}}">{{$row->time_table[0]->venue}}</p></td> 
								@else
									<td><p style="white-space: nowrap;text-overflow: ellipsis;width: 60px;white-space: nowrap;overflow: hidden;cursor:pointer;" title="---">---</p></td>
								@endif
								<td>{{$row->code_no}}</td>
								@foreach($row->time_table as $timetable)
									<?php 
										$date1=date_create($timetable->start_date);
										$date2=date_create($timetable->end_date);
										$diff=date_diff($date1,$date2);
										$diffdays=$diff->format("%a");
									?>
									<td>[{{$diffdays+1}}]</td>
									<!-- <td>{{substr($timetable->start_date,8,2).'-'.substr($timetable->end_date,8,2)}}</td> -->
									@foreach($months as $month)
										@if($month==(int) substr($timetable->start_date,5,2))
											<td @if($month < $currentmonth) class="red" @elseif($month == $currentmonth) class="green" @else class="yellow" @endif>{{substr($timetable->start_date,8,2).'-'.substr($timetable->end_date,8,2)}}</td>
										@else
											<td>&nbsp;&nbsp;</td>
										@endif
									@endforeach
								<?php $j++; ?>
								@endforeach
							</tr>
								
						<?php $i++; ?>
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
