@extends('../master')
@section('content')
{{HTML::style('../../css/slider.css')}}
	<div class="large-9 columns left_padding_none">
    <div class="row">
        <div class="large-12 columns left_padding_none">
        <div class="content-title">
            <span class="icon-logo"></span>
              Car Articles ( @if($type=="အျခားႏုိင္ငံထုတ္ကားမ်ား") အြခားနိုင်ငံထုတ်ကားများ @else {{ $type }} @endif)
            <span class="bottom-line"></span>
        </div>
        </div>
        <div class="large-12 columns list-frame left_padding_none" id="article">
          @if(count($article)>0)
            <?php $i=1; $count=count($article); ?>
            @foreach($article as $row)
              <div class="row">
                  <h2><a href='/articles/{{str_replace(' ', '-', $row->category)}}/{{str_replace(' ', '-', $row->title)}}'>{{$row->title}}</a></h2>
                  <div class="large-6 columns nopadding">
                    <img src="../articlephoto/php/files/{{$row->image}}">
                  </div>
                  <div class="large-6 columns">
                    <p>{{strip_tags($row->short_description)}}</p>
                  </div>
                  <div class="clear">&nbsp;</div>
                  @if($i<$count)
                  <hr>
                  @endif
              </div>
              <?php $i++; ?>
            @endforeach 
          @endif 
            <div class="pagination"> {{ $article->links() }}</div>
        </div>
    </div>
    <br><br>

    <div style="clear:both">&nbsp;<br><br><br></div>
    
  </div>
{{HTML::script('../js/responsiveslides.min.js')}}
{{HTML::script('../src/select2.min.js')}}
<!-- {{HTML::script('../js/jquery-1.7.1.min.js')}} -->
<script type="text/javascript">
        $(function(){
        	$('#categories').select2();
        	$('#make').select2();
        	$('#model').select2();
          var offset = 0;

        <!-- //for back to top scroll links    -->
          $(window).scroll(function(){
            var e=$(window).scrollTop();
            e>40?$("body").addClass("scrolled"):$("body").removeClass("scrolled");
          });

            $(".to-top").click(function(){$("html, body").animate({scrollTop:0},"slow")
          });
          
          setTimeout( function(){
            $('#lb_backdrop').css("opacity","0");
            $('#lb_backdrop').hide();
            },1100);
          setTimeout( function(){
            $('#container').css("opacity","1");
              $('#loading').css("opacity","0")
              },800);
      });

    </script>
    

@stop
