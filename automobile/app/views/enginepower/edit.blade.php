@extends('../admin')
@section('content')
<div class="large-10 columns">
	<div id="icon-edit" class="icon32"><br /></div>
	<h2 class="title">Edit Engine</h2><br><br>
  		<form id="add_form" class="row custom" action = "/updateengine/{{$engine->id}}" method= "post" enctype="multipart/form-data">
		
				<div class="row">
					<div class="large-2 column"><label for="title">Engine Name</label></div>
					<div class="large-10 column">
						<input name="name" type="text" required="required" value="{{ $engine->name}}">
					</div>
				</div>
				
				<div class="cleardiv">&nbsp;</div>
				<div class="row">
					<div class="large-2 column">&nbsp;</div>
					<div class="large-10 column">
						<br>
						<a href="/car-enginelist" class="button round"> Cancel </a>
						<input type = "submit" value = "Save " class="button round" id="btn_create" />
						<br>
					</div>
				</div>
				<div class="cleardiv">&nbsp;</div><br>
		</form><!--end of form-->	

</div>
@stop