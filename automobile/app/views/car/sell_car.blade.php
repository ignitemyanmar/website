@extends('../master')
@section('content')
	<div class="large-9 columns left_padding_none">
		<div class="row">
			<p class="title">ကားအသစ္ထည့္သြင္းရန္</p>
		  	<div class="large-12 columns nopadding">
		    <div class="row ">
		      
		    </div>
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
