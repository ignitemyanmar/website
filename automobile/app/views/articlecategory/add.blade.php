@extends('../admin')
@section('content')
<div class="large-10 columns">
	<div id="icon-edit" class="icon32"><br /></div>
	<h2 class="title">Create New Category</h2><br><br>
  		<form id="add_form" class="row custom" action = "/addarticlecategory" method= "post" enctype="multipart/form-data">
		
		<div class="row">
			<div class="large-2 column"><label for="name">Article Category</label></div>
			<div class="large-10 column">
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
		<div class="cleardiv">&nbsp;</div><br>
		</form><!--end of form-->	

</div>
@stop