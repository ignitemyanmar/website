@extends('../master')
@section('content')
{{HTML::style('../../css/slider.css')}}
	<div class="large-9 columns">
    <div class="row">
      <?php 
        if($type=="အေမရိကန္-ႏုိင္ငံထုတ္ကားမ်ား") $type="အေမရိကန်နိုင်ငံထုတ်ကားများ";
        elseif($type=="ဂ်ပန္ႏုိင္ငံထုတ္ကားမ်ာ") $type="ဂျပန်နိုင်ငံထုတ်ကားများ";
        elseif($type=="ဂ်ာမနီႏုိင္ငံ-ထုတ္ကားမ်ား") $type="ဂျာမနီနိုင်ငံထုတ်ကားများ";
        elseif($type=="အဂၤလန္ႏုိင္ငံထုတ္ကားမ်ား") $type="အဂႅလန်နိုင်ငံထုတ်ကားများ";
        else $type="အြခားနိုင်ငံထုတ်ကားများ";
        ?>
      <p class="title">Car Articles ( @if($type=="အျခားႏုိင္ငံထုတ္ကားမ်ား") အြခားနိုင်ငံထုတ်ကားများ @else {{ $type }} @endif)</p>
        <div class="large-12 columns list-frame nopadding"  id="article">
          @if($article)
                <div class="row">
                    <h2><a href=''>{{$article->title}}</a></h2>
                    <div class="large-8 columns image-frame nopadding">
                      <img src="../../../articlephoto/php/files/{{$article->image}}">
                    </div>
                    <div class="large-4 columns">&nbsp;</div>
                    <div class="clear"></div>
                    <br><p>{{$article->short_description}}</p>
                    <?php 
                      $description=preg_replace("/<span[^>]+\>/i", "", $article->description);
                     ?>
                    <p>{{$description}}</p>
                    <hr class="dottedline">
                </div>
                <div class="clear">&nbsp;</div>
            @endif            
        </div>
    </div>
    <div class="clear">&nbsp;</div>
    
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
