@extends('../admin')
@section('content')
<div class="large-10 columns">
	<div id="icon-edit" class="icon32"><br /></div>
	<h2 class="title">Add New Business Category</h2><br><br>
  		<form id="add_form" class="row custom panel" action = "/addbusinesscategory" method= "post" enctype="multipart/form-data">
			<div class="row">
				<div class="large-3 column"><label for="title">Business Category</label></div>
				<div class="large-9 column">
					<input name="category" type="text" required="required" >
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
			<div class="cleardiv">&nbsp;</div>
		</form><!--end of form-->	
</div>
@stop