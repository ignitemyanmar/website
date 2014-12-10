@extends('../master')
@section('content')
	<div class="large-9 columns">
    <div class="row">
      <div class="content-title">
          <span class="icon-logo"></span>
            News ( <a href="/news/{{$type}}" class="zawgyi-one">{{ $type }}</a> )
          <span class="bottom-line"></span>
      </div>
      <!-- <p class="title">News ( <a href="/news/{{$type}}" class="zawgyi-one">{{ $type }}</a> )</p> -->
        <div class="large-12 columns list-frame nopadding" id="news">
          @if($news)
                <div class="row " id='article'>
                    <h2><a href=''>{{$news->name}}</a></h2>
                    <div class="large-8 columns nopadding newsdtimage">
                      <?php $imgfile='newsphoto/php/files/'.$news->image; ?>
                      @if($news->image !=''&& File::exists($imgfile))<img src="../../newsphoto/php/files/{{$news->image}}" width="90%" style="max-height:400px; width:auto; ">@else <div class="placeholder">&nbsp;</div>@endif
                    </div>
                    <div class="large-4 columns">&nbsp;</div>
                    <div class="clear">&nbsp;</div>
                    <br><p>{{$news->short_description}}</p>
                    <p>{{$news->description}}</p>
                    <hr class="dottedline">
                    <div class="clear">&nbsp;</div>
                </div>
            @endif            
        </div>
    </div>
    <div class="clear">&nbsp;</div>
    
  </div>
@stop
