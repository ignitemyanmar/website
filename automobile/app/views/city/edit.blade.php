@extends('../admin')
@section('content')
<div class="large-10 columns">
	<div id="icon-edit" class="icon32"><br /></div>
	<h2 class="title">Edit City Name</h2><br><br>
  		<form id="add_form" class="row custom" action = "/updatecity/{{$city->id}}" method= "post" enctype="multipart/form-data">
		
		
				<div class="row">
					<div class="large-2 column"><label for="title">City Name</label></div>
					<div class="large-10 column">
						<input name="name" type="text" required="required" >
					</div>
				</div>
				
				<div class="cleardiv">&nbsp;</div>
			
				
				<div class="row">
					<div class="large-12 column">
						<label for="status" style="display:none;">Status</label>
						<input type="text" name = 'status' value="0" style="display:none;">
					</div>
				</div>
				<div class="row">
					<div class="large-2 column">&nbsp;</div>
					<div class="large-10 column">
						<br>
						<a href="/citylist" class="button round"> Cancel </a>
						<input type = "submit" value = "Save " class="button round" id="btn_create" />
						<br>
					</div>
					

				</div>
				<div class="cleardiv">&nbsp;</div><br>
		</form><!--end of form-->	

</div>
@stop