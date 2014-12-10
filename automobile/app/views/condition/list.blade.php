@extends('../admin')
@section('content')
<div class="large-12 columns">
		<div id="icon-edit" class="icon32"><br /></div>
		<h2 class="title">Condition List</h2><br><br>
	<form action = "/car-condition-search" method= "post" class="row">
			<div class="columns large-6">
				<input name="keyword" type="text" placeholder = " Search Condition" data-required="true">
			</div>
			<div class="columns large-2">
				<input type = "submit" value = "Search" class="buttonaction" required>
			</div>
			<div class="columns large-4">
				<a href="/car-condition-create" class="button round right">Add New Condition </a>
			</div>
	</form>
</div>

<div class="columns large-12">
	@if(!$conditions)
		<p class="warning">You've not posted any Condition yet,</p>
	@else

		<strong>Total Record: {{$count}}</strong> 
	
    	<form  class="row custom" action = "/delconditions" method= "post">
			<table width="100%">
				  <thead>
					<tr>
					      <th width="2%">&nbsp;</th>
					      <th width="70%">Condition</th>
					      <th width="20%" style="text-align:center;">Actions</th>
					 </tr>
				  </thead>
				  <tbody>
					  	
						  @foreach($conditions as $condition)
						    <tr valign="top">
						      		<td><input type="checkbox" name="recordstoDelete[]" value="{{ $condition['id'] }}" /></td>
							      	
							      
							      <td>{{$condition['name']}}</td>
							      

							     <td style="text-align:center;">
							      	<a href="/car-condition-update/{{ $condition['id'] }}"  class="buttonaction">Edit</a>
							        <a href="/deletecondition/{{ $condition['id'] }}"   class="buttonaction">Delete</a>
								</td>
						    </tr>
					    @endforeach	 
					    <tr><td colspan="8"><ul class="pagination">{{ $conditions->links() }}</ul></td></tr>   	   

				  </tbody>
			</table> <!--end of table-->
			
			 <input type="submit" value="Delete" name="delete" class="button round" /> 
		</form>	
		@endif
	</div>

	
@stop