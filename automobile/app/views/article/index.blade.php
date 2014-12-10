@extends('../master')
@section('content')
{{HTML::style('../../css/slider.css')}}
<div class="large-9 columns">
    <div class="row nopadding">
        <div class="content-title">
            <span class="icon-logo"></span>
              Car Articles
            <span class="bottom-line"></span>
        </div>
        @if(count($article)>0)
        <?php $i=1; $counts=count($article);?>
        <div class="large-12 columns list-frame nopadding" id="article">
            @foreach($article as $row)
                <div class="row">
                    <h2><a href='/articles/{{str_replace(' ', '-', $row->category)}}/{{str_replace(' ', '-', $row->title)}}'>{{$row->title}}</a></h2>
                    <div class="large-6 columns image-frame nopadding">
                        <img src="../articlephoto/php/files/{{$row->image}}">
                    </div>
                    <div class="large-6 columns">
                    <!-- <div class="clear">&nbsp;</div> -->
                    <p>{{strip_tags($row->short_description)}}</p>
                    
                    &nbsp;</div>
                    <div class="clear">&nbsp;</div>
                      <!-- <a  id="readmore" class="btn" href="articles/{{str_replace(' ', '-', $row->category)}}/{{str_replace(' ', '-', $row->title)}}">{{$row->title}}</a> -->
                </div>
                @if($i<$counts)
                <hr>
                @endif
                <?php $i++; ?>
            @endforeach
            <div class="pagination"> {{ $article->links() }}</div>
            
        </div>
        @endif
    </div>
    <br><br>

    <div style="clear:both">&nbsp;<br><br><br></div>
    
  </div>
@stop
