<?php 
	$language=Session::has('language') ? Session::get('language') : 'english';
	$zawgyi='';
	if($language=='english')
		$responsenav=SeminarType::with(array('seminars'))->get();
	elseif($language=='japan')
		$responsenav=SeminarType::with(array('seminars'))->get();
	else
	{
		$zawgyi='zg';
		$responsenav=SeminarType::with(array('seminars'))->get();
	}
?>
<ul class="side-nav @if($language=='mm') mm @endif"> 
	<dl class="accordion {{$zawgyi}}" data-accordion> 
		@if($responsenav)
			<?php $i=1; ?>
			@foreach($responsenav as $nav)
				<dd> 
					@if($language=='myanmar')
						<a href="/type/en/seminar" id="#panel{{$i}}">
							<li class="nav-header" title="{{$nav->name_mm}}">{{$nav->name_mm}}</li>
						</a> 
					@elseif($language=='japan')
						<a href="/type/en/seminar" id="#panel{{$i}}">
							<li class="nav-header" title="{{$nav->name_jp}}">{{$nav->name_jp}}</li>
						</a> 
					@else
						<a href="/type/en/seminar" id="#panel{{$i}}">
							<li class="nav-header" title="{{$nav->name}}">{{$nav->name}}</li>
						</a> 
					@endif
					@if($nav->seminars)
						<div id="panel{{$i}}" class="content @if($i<3) active @endif" @if($i==1) style="display:block !important;" @endif>
							@if($i==1)
								@if($language=='myanmar')
									<li class="schedule"><a href="/schedule">သင္တန္း အခ်ိန္စာရင္း</a></li> 
								@elseif($language=="english")
									<li class="schedule"><a href="/schedule">Training Schedule</a></li> 
								@else
									<li class="schedule"><a href="/schedule">訓練計画</a></li> 
								@endif 
							@endif
						@foreach($nav->seminars as $rows)
							@if($language=='myanmar')
								@if($rows->language_id==2)
									<li class="Zawgyi-One"><span></span><a href="/type/en/seminar/{{$rows->id}}/{{$rows->name}}" title="{{$rows->name}}">{{$rows->name}}</a></li> 
								@endif
							@elseif($language=="english")
								@if($rows->language_id==3)
									<li><span></span><a href="/type/en/seminar/{{$rows->id}}/{{$rows->name}}" title="{{$rows->name}}">{{$rows->name}}</a></li> 
								@endif
							@else
								@if($rows->language_id==1)
									<li><span></span><a href="/type/en/seminar/{{$rows->id}}/{{$rows->name}}" title="{{$rows->name}}">{{$rows->name}}</a></li> 
								@endif
							@endif

						@endforeach
						</div>
					@endif 
				</dd> 
				<?php $i++; ?>
			@endforeach
		@endif
	</dl>
</ul>