@extends('../admin')
@section('content')
<div class="large-12 columns">
		<div id="icon-edit" class="icon32"><br /></div>
		<h2 class="title">Business Category List</h2><br><br>
	<form action = "/business-category-search" method= "post" class="row">
			<div class="columns large-6">
				<input name="keyword" type="text" placeholder = " Search Business Category" data-required="true">
			</div>
			<div class="columns large-2">
				<input type = "submit" value = "Search" class="buttonaction" required>
			</div>
			<div class="columns large-4">
				<a href="/business-category-create" class="button round right">Add Business Category</a>
			</div>
	</form>
</div>

<div class="columns large-12">
	@if(!$businesscategories)
		<p class="warning">You've not posted any Business Categorys yet,</p>
	@else
		<strong>Total Record: {{$count}}</strong> 
		<form  class="row custom" action = "/delbusinesscategories" method= "post">
			<table width="100%">
				  <thead>
					<tr>
					      <th width="2%">&nbsp;</th>
					      <th width="65%">Business Category</th>
					      <th width="30%" style="text-align:center;">Actions</th>
					 </tr>
				  </thead>
				  <tbody>
					  	
						  @foreach($businesscategories as $bz_category)
						    <tr valign="top">
						      	<td><input type="checkbox" name="recordstoDelete[]" value="{{ $bz_category['id'] }}" /></td>
							    <td>{{$bz_category['title']}}</td>
							    <td style="text-align:center;">
							      	<a href="/business-category-update/{{ $bz_category['id'] }}"  class="buttonaction">Edit</a>
							        <a href="/deletebusinesscategory/{{ $bz_category['id'] }}"   class="buttonaction">Delete</a>
								</td>
						    </tr>
					    @endforeach	 
					    <tr><td colspan="8"><ul class="pagination">{{ $businesscategories->links() }}</ul></td></tr>   	   

				  </tbody>
			</table> <!--end of table-->
			
			 <input type="submit" value="Delete" name="delete" class="button round" /> 
		</form>	
	@endif
</div>
@stop