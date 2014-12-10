@extends('../admin')
@section('content')
<div class="large-8 columns">
	<div id="icon-edit" class="icon32"><br /></div>
	<h2 class="title">Create New Condition</h2><br><br>
  		<form id="add_form" class="row custom panel" action = "/addcondition" method= "post" enctype="multipart/form-data">
		<div class="row">
			<div class="large-3 column"><label for="name">Condition Name</label></div>
			<div class="large-9 column">
				<input name="name" type="text" required="required" >
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
<div class="large-4 columns">&nbsp;</div>
@stop