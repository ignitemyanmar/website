@extends('../admin')
@section('content')
<div class="large-10 columns">
	<div id="icon-edit" class="icon32"><br /></div>
	<h2 class="title">Create New Contact Us</h2><br><br>
	<form id="addnew-form" class="row custom addnew-form" action = "/addcontactus" method= "post" enctype="multipart/form-data">		
		
		<div class="row">
			<div class="large-2 column"><label for="title">Title</label></div>
			<div class="large-10 column">
				<input name="title" type="text" required="required" >
			</div>
		</div>
		<br>

		<div class="row">
			<div class="large-2 column"><label for="desc">Address</label></div>
			<div class="large-10 column">
				<input type="text" name="address" required>				
			</div>
		</div>

		<div class="row">
			<div class="large-2 column"><label for="desc">Phone</label></div>
			<div class="large-10 column">
				<input type="text" name="phone" required>				
			</div>
		</div>

		<div class="row">
			<div class="large-2 column"><label for="desc">Email</label></div>
			<div class="large-10 column">
				<input type="email" name="email" required>				
			</div>
		</div>

		

		<div class="row">
			<div class="large-2 column"><label for="desc">Fax</label></div>
			<div class="large-10 column">
				<input type="text" name="fax" required>				
			</div>
		</div>
		
		<div class="row">
			<div class="large-2 column"><label for="desc">Website</label></div>
			<div class="large-10 column">
				<input type="text" name="website" required>				
			</div>
		</div>

		<div class="row">
			<div class="large-2 column">&nbsp;</div>
			<div class="large-10 column">
				<input type = "submit" value = "Save" class="button round" id="btn_create" />
				<br>
			</div>
		</div>
		</form><!--end of form-->	
		<div class="cleardiv">&nbsp;</div>

</div>
@stop