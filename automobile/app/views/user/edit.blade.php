@extends('../admin')
@section('content')
<div class="large-10 columns">
	<div id="icon-edit" class="icon32"><br /></div>
	<h2 class="title">Create New User</h2><br><br>
  		<form id="add_form" class="row custom" action = "/updateuser/{{$user->id}}" method= "post">
		
		<div class="row">
			<div class="large-2 column"><label for="title">First Name</label></div>
			<div class="large-10 column">
				<input name="firstname" type="text" required="required"  value="{{$user->first_name}}">
			</div>
		</div>

		<div class="row">
			<div class="large-2 column"><label for="title">Last Name</label></div>
			<div class="large-10 column">
				<input name="lastname" type="text" required="required"  value="{{$user->last_name}}">
			</div>
		</div>
		
		<div class="row">
			<div class="large-2 column"><label for="email">email</label></div>
			<div class="large-10 column">
				<input name="email" type="text" required="required" value="{{$user->email}}">
			</div>
		</div>
		<div class="cleardiv">&nbsp;</div>
		
		<div class="row">
			<div class="large-2 column"><label for="password">Password</label></div>
			<div class="large-10 column">
				<input name="password" type="password" required="required" >
			</div>
		</div>

		<div class="row">
			<div class="large-2 column"><label for="password">User Level</label></div>
			<div class="large-10 column">
				<select name="role">
					<option value="8" @if($user->role == 8 ) selected @else  @endif>Administrator</option>
					<option value="0" @if($user->role == 0 ) selected @else  @endif>Staff</option>
				</select> 
			</div>
		</div>
		<div class="row">
			<div class="large-2 column">&nbsp;</div>
			<div class="large-3 column">
				<br>
				<input type = "submit" value = "Save" class="button round" id="btn_create" />
				<br>
			</div>
			<div class="large-7 column">&nbsp;</div>

		</div>
		</form><!--end of form-->	

</div>

@stop