@extends('../admin')
@section('content')
	<style type="text/css">
		iframe {max-width: 150px; max-height: 110px;}
		.previewstyle{max-width: 150px;}
	</style>
		
<div class="large-12 columns">
		<div id="icon-edit" class="icon32"><br /></div>
		<h2 class="title">Car new List</h2><br><br>
	<form action = "/news-search" method= "post" class="row">
			<div class="columns large-6">
				<input name="keyword" type="text" placeholder = " Search Carnew" data-required="true">
			</div>
			<div class="columns large-2">
				<input type = "submit" value = "Search" class="buttonaction" required>
			</div>
			<div class="columns large-4">
				<a href="/news-create" class="button round right">Add News </a>
			</div>
	</form>
</div>

<div class="columns large-12">
	@if(!$news)
		<p class="warning">You've not posted any Car new yet,</p>
	@else

		<strong>Total Record: {{$count}}</strong> 
	
    	<form  class="row custom" action = "/deletenews" method= "post">
			<table width="100%">
				  <thead>
					<tr>
					      <th width="2%">&nbsp;</th>
					      <th width="10%">Image</th>
					      <th width="10%">Title</th>
					      <th width="10%">Type</th>
					      <th width="20%">Shot_desc</th>
					      <th width="20%">Description</th>
					      <th width="30%" style="text-align:center;">Actions</th>
					 </tr>
				  </thead>
				  <tbody>
						  @foreach($news as $new)
						    <tr valign="top">
						      	<td><input type="checkbox" name="recordstoDelete[]" value="{{ $new['id'] }}" /></td>
							    <td><div class="previewstyle"><img src="../newsphoto/php/files/thumbnail/{{$new['image']}}"></div></td>
							    <td>{{$new['name']}}</td>
							    <td>{{$new['type']}}</td>
							    <td>
							    	<div class="container">
					                    <div class="scrollbox" >
					                        <div class="content" >
											 <p>{{$new['short_description']}}</p>
											</div>
										</div>
									</div>
								</td>
							    <td>
							    	<div class="container">
					                    <div class="scrollbox" >
					                        <div class="content" >
											 <p>{{$new['description']}}</p>
										 	</div>
									 	</div>
								 	</div>
							 	</td>
							    <td style="text-align:center;">
							      	<a href="/news-update/{{ $new['id'] }}"  class="buttonaction">Edit</a>
							        <a href="/deletenews/{{ $new['id'] }}"   class="buttonaction">Delete</a>
								</td>
						    </tr>
						    <tr><td colspan="8"></td></tr>	
					    @endforeach	 
					    <tr><td colspan="8"><ul class="pagination">{{ $news->links() }}</ul></td></tr>   	   
				  </tbody>
			</table> <!--end of table-->
			
			 <input type="submit" value="Delete" name="delete" class="button round" /> 
		</form>	
		@endif
	</div>

@stop