@extends('../master')
@section('content')
<div class="large-9 columns left_padding_none">
    <div class="row">
      <div class="content-title">
          <span class="icon-logo"></span>
            News
          <span class="bottom-line"></span>
      </div>
        <!-- <div class="clear">&nbsp;</div> -->
        <div class="large-12 columns list-frame nopadding" id="article">
        @if(count($news) >0 )
          <?php $i=1; $count=count($news); ?>
          @foreach($news as $row)
             <div class="row">
              <h4><a href="/news/{{str_replace(' ', '-', $row->type)}}/{{str_replace(' ', '-', $row->name)}}"> {{$row->name}}</a></h4>
              <div class="large-6 columns nopadding newsimage">
                <?php $imgfile='newsphoto/php/files/'.$row->image; ?>
                @if($row->image !=''&& File::exists($imgfile))<img src="../newsphoto/php/files/{{$row->image}}">@else <div class="placeholder">&nbsp;</div>@endif
              </div>
              <div class="large-6 columns">
                <p>
                  {{substr(strip_tags($row->description), 0, 1000)}}...
                </p>
              </div>
              <div class="clear">&nbsp;</div>
              @if($i<$count)
                <hr>
              @endif
            </div>
            <?php $i++; ?>
          @endforeach
           <div class="pagination"> {{ $news->links() }}</div>
        @endif
      </div>
    </div>
    <br><br>
    <div style="clear:both">&nbsp;<br><br><br></div>
    
  </div>
@stop
