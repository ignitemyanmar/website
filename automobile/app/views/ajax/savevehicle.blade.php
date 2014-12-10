<style type="text/css">
	.checkbox,input[type="checkbox"]{margin: 0;padding: 0px;}
</style>
@if(isset($carinfo) && count($carinfo)>0)
	<?php $i=1; $count=count($carinfo); ?>
	<form action="/compare-vehicles" method="get">
		@foreach($carinfo as $save_car)
			@if($i==1 || $i%2==1)
			<div class="row">
			@endif
				<div class="large-6 medium-6 small-12 columns">
					<div class="checkbox">
			            <input name="compare[]" class="compare" value="{{$save_car->id}}" type="checkbox">
			            <span class="ayar-wagaung">Select</span>
			        </div>
					<img src="../../../../carphoto/php/files/{{$save_car->options->image}}" class="car_listimg" style="max-width:100%;margin-bottom:1.2rem;">
					
				</div>
			@if($i==$count || $i%2==0)
			</div>
			@endif
			<?php $i++; ?>
		@endforeach
		<div id="comparelink" style="clear:both;">
		    <button class="btn search  btn-primary" id="comparebtn" type="submit">Compare</button>
		    <a class="btn search btn-primary"  id='remove-save-vehicle'>Remove</a>
		</div>
	</form>
	<div class="clearfix">&nbsp;</div>
	<script type="text/javascript">
	$(function(){
		    $('#remove-save-vehicle').click(function(e){
		            var selected = new Array();
		              // $("input:checkbox[name=compare]:checked").each(function() {
		              $("input[type=checkbox]:checked").each(function() {
		                   selected.push($(this).val());
		              });
		              if(selected.length ==0){
		                return false;
		              }
		              $.ajax({
		                type: "GET",
		                url: '/removevehicle',
		                data: {parameter:selected}
		              }).done(function( result ) {
		                if(result.length > 0){
		                  $("#savevehicle").html(result);
		                    return false;
		                }else{
		                  $("#savevehicle").html('');

		                  return false;
		                }
		              });
		    });
	});
	</script>
@endif
