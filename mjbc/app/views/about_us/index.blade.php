@extends('../master')
@section('content')

<?php 
	$language=Session::get('language') ? Session::get('language') : "english"; 
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
				@foreach($response as $row)
					@if($language=="japan")
						<h3>{{$row->name_jp}}</h3>
						{{$row->description_jp}}
					@elseif($language=="english")
						<h3>{{$row->name}}</h3>
						{{$row->description}}
					@else
						<h3>{{$row->name_mm}}</h3>
						{{$row->description_mm}}
					@endif
					<br><br>
				@endforeach
			@endif
			<div class="br_line">&nbsp;</div><br><br>
		</div>
	</div>
	<br>
@stop
