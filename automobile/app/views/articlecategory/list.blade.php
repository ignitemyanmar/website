@extends('../admin')
@section('content')
	<style type="text/css">
		iframe {max-width: 150px; max-height: 110px;}
		.previewstyle{max-width: 150px;}
	</style>
		
<div class="large-12 columns">
		<div id="icon-edit" class="icon32"><br /></div>
		<h2 class="title">Article Category List</h2><br><br>
	<form action = "/car-article-category-search" method= "post" class="row">
			<div class="columns large-6">
				<input name="keyword" type="text" placeholder = " Search Category" data-required="true">
			</div>
			<div class="columns large-2">
				<input type = "submit" value = "Search" class="buttonaction" required>
			</div>
			<div class="columns large-4">
				<a href="/car-article-category-create" class="button round right">Add Article Category</a>
			</div>
	</form>
</div>

<div class="columns large-12">
	@if(!$categories)
		<p class="warning">You've not posted any Body yet,</p>
	@else
		<strong>Total Record: {{$count}}</strong> 
    	<form  class="row custom" action = "/deletearticlecategories" method= "post">
			<table width="100%">
				  <thead>
					<tr>
				    	<th width="2%">&nbsp;</th>
					    <th width="65%">Body</th>
					    <th width="30%" style="text-align:center;">Actions</th>
					</tr>
				  </thead>
				  <tbody>
					  	
						 @foreach($categories as $category)
						    <tr valign="top">
						      	<td><input type="checkbox" name="recordstoDelete[]" value="{{ $category['id'] }}" /></td>
							    <td>{{$category['category']}}</td>
							    <td style="text-align:center;">
							    	<a href="/car-article-category-update/{{ $category['id'] }}"  class="buttonaction">Edit</a>
							        <a href="/deletearticlecategory/{{ $category['id'] }}"   class="buttonaction">Delete</a>
								</td>
						    </tr>
					    @endforeach	 
					    <tr><td colspan="8"><ul class="pagination">{{ $categories->links() }}</ul></td></tr>   	   

				  </tbody>
			</table> <!--end of table-->
			
			 <input type="submit" value="Delete" name="delete" class="button round" /> 
		</form>	
		@endif
	</div>

	
@stop