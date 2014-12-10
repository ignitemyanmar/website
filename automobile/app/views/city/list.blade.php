@extends('../admin')
@section('content')
	<style type="text/css">
		iframe {max-width: 150px; max-height: 110px;}
		.previewstyle{max-width: 150px;}
	</style>
		
<div class="large-10 columns">
		<div id="icon-edit" class="icon32"><br /></div>
		<h2 class="title">City List</h2><br><br>
	<form action = "/searchcity" method= "post" class="row">
			<div class="columns large-6">
				<input name="keyword" type="text" placeholder = " Search City" data-required="true">
			</div>
			<div class="columns large-2">
				<input type = "submit" value = "Search" class="buttonaction" required>
			</div>
			<div class="columns large-4">
				<a href="/car-city-create" class="button round right">Add New City </a>
			</div>
	</form>
</div>

<div class="columns large-10">
	@if(!$cities)
		<p class="warning">You've not posted any City yet,</p>
	@else

		<strong>Total Record: {{$count}}</strong> 
	
    	<form  class="row custom" action = "/delcities" method= "post">
			<table width="100%">
				  <thead>
					<tr>
					      <th width="2%">&nbsp;</th>
					      <th width="68%">City Name</th>
					      <th width="30%" style="text-align:center;">Actions</th>
					 </tr>
				  </thead>
				  <tbody>
					  	
						  @foreach($cities as $city)
						    <tr valign="top">
						      	<td><input type="checkbox" name="recordstoDelete[]" value="{{ $city['id'] }}" /></td>
							    <td>{{$city['name']}}</td>
							    <td style="text-align:center;">
							      	<a href="/car-city-update/{{ $city['id'] }}"  class="buttonaction">Edit</a>
							        <a href="/deletecity/{{ $city['id'] }}"   class="buttonaction">Delete</a>
								</td>
						    </tr>
					    @endforeach	 
					    <tr><td colspan="4"><ul class="pagination">{{ $cities->links() }}</ul></td></tr>   	   

				  </tbody>
			</table> <!--end of table-->
			
			 <input type="submit" value="Delete" name="delete" class="button round" /> 
		</form>	
		@endif
	</div>

	{{HTML::script('../js/responsiveslides.min.js')}}
@stop