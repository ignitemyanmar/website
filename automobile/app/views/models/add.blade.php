@extends('../admin')
@section('content')
<div class="large-6 columns">
	<div id="icon-edit" class="icon32"><br /></div>
	<h2 class="title">Add New Type By Make</h2><br><br>
  		<form id="add_form" class="row custom panel" action = "/addmodel" method= "post" enctype="multipart/form-data">
		<div class="row">
				<div class="large-2 column"><label for="title">Makeid</label></div>
				<div class="large-10 column">
					<select name="make" id='makes'>
						@foreach($makes as $make)
						<option value="{{ $make->id }}">{{$make->make}} </option>
						@endforeach
					</select>				
				</div>
		</div>
		<br>
		<div class="row">
			<div class="large-2 column"><label for="title">Model</label></div>
			<div class="large-10 column">
				<input name="model" type="text" required="required" >
			</div>
		</div>
	
		<div class="row">
			<div class="large-2 column">&nbsp;</div>
			<div class="large-10 column">
				<br>
				<input type = "submit" value = "Save" class="button round" id="btn_create" />
				<br>
			</div>
			

		</div>
		<div class="cleardiv">&nbsp;</div><br>
		</form><!--end of form-->	
</div>
<div class="large-6 columns">&nbsp;</div>
<script type="text/javascript">
	$(function()
	{
		$('#makes').select2();
	});
	
</script>
@stop