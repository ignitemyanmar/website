@extends('../admin')
@section('content')
	<div class="columns large-12">
		<div id="icon-users" class="icon32"><br /></div>
		<h2 class="title">Car Article List</h2>
		<br><br>
		<form action = "/car-article-search" method= "post" class="row">
				<div class="columns large-6">
					<input name="keyword" type="text" placeholder = "Search article" data-required="true">
				</div>
				<div class="columns large-2">
					<input type = "submit" value = "Search" class="buttonaction">
				</div>
				<div class="columns large-4">
					<a href="/car-article-create" class="button round">Add New Article</a>
				</div>	
		</form>
	</div>
<div class="columns large-12">
    <form  class="row custom" action = "/delarticleinfo" method= "post">
		<table class="row">
			<thead>
				<tr>
			      <th >&nbsp;</th>
			      <th >Photo</th>
			      <th >Title</th>
			      <th >Category</th>
			      <th >Publish</th>
			      <th >Short description</th>
			      <th  style="text-align:center;">Actions</th>
			    </tr>
			</thead>
		  	<tbody>
				@if(count($response)==0)
					There is no record in database.
				@else
					Total Record : {{$totalcount}}
				@endif

				@foreach($response as $car_article)
			    	<tr valign="top">
				      		<td><input type="checkbox" name="recordstoDelete[]" value="{{ $car_article['id'] }}" /></td>
					        <td><div class="previewstyle">  
				                <img src="../articlephoto/php/files/{{$car_article['image']}}" width="120px;">
				                </div>
				        	</td>
				        		      
					        <td>{{$car_article['title']}}</td>
					        <td>{{$car_article['category']}}</td>
					        <td>@if($car_article['status'] ==1) Yes @else No @endif</td>
					        <td> 
					      		<div class="container">
				                    <div class="scrollbox" >
				                        <div class="content" >
										 <p>{{ strip_tags($car_article['short_description']) }}</p>   
				                        </div>
				                    </div>
				                </div>
					        </td>
					        
					        <td style="text-align:center;">
						      	<a href="/car-article-update/{{ $car_article['id'] }}"  class="buttonaction">Edit</a><br><br>
						        <a href="/deletearticle/{{ $car_article['id'] }}"   class="buttonaction">Delete</a>
					        </td>
				    </tr>
				    <tr><td colspan="8"><hr></td></tr>	    
		   		@endforeach	
		    <tr><td colspan="8"><ul class="pagination">{{ $response->links() }}</ul></td></tr>   	   
		  </tbody>
		</table><!--end of table-->
		
	</form>	
	
</div>
@stop