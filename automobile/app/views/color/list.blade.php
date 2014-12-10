@extends('../admin')
@section('content')
<div class="large-12 columns">
		<div id="icon-edit" class="icon32"><br /></div>
		<h2 class="title">Color List</h2><br><br>
	<form action = "/searchcolor" method= "post" class="row">
			<div class="columns large-6">
				<input name="keyword" type="text" placeholder = " Search Color" data-required="true">
			</div>
			<div class="columns large-2">
				<input type = "submit" value = "Search" class="buttonaction" required>
			</div>
			<div class="columns large-4">
				<a href="/car-color-create" class="button round right">Add Color </a>
			</div>
	</form>
</div>

<div class="columns large-12">
	@if(!$colors)
		<p class="warning">You've not posted any Color yet,</p>
	@else

		<strong>Total Record: {{$count}}</strong> 
	
    	<form  class="row custom" action = "/delcolors" method= "post">
			<table width="100%">
				  <thead>
					<tr>
					      <th width="2%">&nbsp;</th>
					      <th width="68%">Color Name</th>
					      <th width="30%" style="text-align:center;">Actions</th>
					 </tr>
				  </thead>
				  <tbody>
					  	
						 @foreach($colors as $color)
						    <tr valign="top">
						      	<td><input type="checkbox" name="recordstoDelete[]" value="{{ $color['id'] }}" /></td>
							    <td>{{$color['name']}}</td>
							    <td style="text-align:center;">
							      	<a href="/car-color-update/{{ $color['id'] }}"  class="buttonaction">Edit</a>
							        <a href="/deletecolor/{{ $color['id'] }}"   class="buttonaction">Delete</a>
								</td>
						    </tr>
					    @endforeach	 
					    <tr><td colspan="8"><ul class="pagination">{{ $colors->links() }}</ul></td></tr>   	   

				  </tbody>
			</table> <!--end of table-->
			
			 <input type="submit" value="Delete" name="delete" class="button round" /> 
		</form>	
		@endif
	</div>

	
@stop