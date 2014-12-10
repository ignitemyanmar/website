@extends('../admin')
@section('content')
<div class="large-12 columns">
		<div id="icon-edit" class="icon32"><br /></div>
		<h2 class="title">Engine Power List</h2><br><br>
	<form action = "/searchenginepower" method= "post" class="row">
			<div class="columns large-6">
				<input name="keyword" type="text" placeholder = " Search Engine Power" data-required="true">
			</div>
			<div class="columns large-2">
				<input type = "submit" value = "Search" class="buttonaction" required>
			</div>
			<div class="columns large-4">
				<a href="/car-engine-create" class="button round right">Add Engine Power </a>
			</div>
	</form>
</div>

<div class="columns large-12">
	@if(Session::has('message'))
		<?php $message=Session::get('message'); ?>
		@if($message['status']==0)
			<p class="warning">{{$message['info']}}</p>
		@else
			<p>{{$message['info']}}</p>
		@endif
	@endif
	
	@if($count==0)
		<p class="warning">You've not posted any Engine Power yet,</p>
	@else

		<strong>Total Record: {{$count}}</strong> 
	
    	<form  class="row custom" action = "/delenginepowers" method= "post">
			<table width="100%">
				  <thead>
					<tr>
					      <th width="2%">&nbsp;</th>
					      <th width="68%">Engine Power Name</th>
					      <th width="30%" style="text-align:center;">Actions</th>
					 </tr>
				  </thead>
				  <tbody>
					  	
						 @foreach($enginepowers as $enginepower)
						    <tr valign="top">
						      	<td><input type="checkbox" name="recordstoDelete[]" value="{{ $enginepower['id'] }}" /></td>
							    <td>{{$enginepower['name']}}</td>
							    <td style="text-align:center;">
							      	<a href="/car-engine-update/{{ $enginepower['id'] }}"  class="buttonaction">Edit</a>
							        <a href="/deleteengine/{{ $enginepower['id'] }}"   class="buttonaction">Delete</a>
								</td>
						    </tr>
					    @endforeach	 
					    <tr><td colspan="8"><ul class="pagination">{{ $enginepowers->links() }}</ul></td></tr>   	   

				  </tbody>
			</table> <!--end of table-->
			
			 <input type="submit" value="Delete" name="delete" class="button round" /> 
		</form>	
		@endif
	</div>

	
@stop