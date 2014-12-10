@extends('../admin')
@section('content')
	<div class="columns large-12">
		<div id="icon-users" class="icon32"><br /></div>
		<h2 class="title">Business Guide List</h2>
		<br><br>
		<form action = "/businessguide-search" method= "post" class="row">
				<div class="columns large-6">
					<input name="keyword" type="text" placeholder = "Search businessguide" data-required="true">
				</div>
				<div class="columns large-2">
					<input type = "submit" value = "Search" class="buttonaction">
				</div>
				<div class="columns large-4">
					<a href="/businessguide-create" class="button round">Add Business Guide</a>
				</div>	
		</form>
	</div>
<div class="columns large-12">
    <form  class="row custom" action = "/delbusinessguide" method= "post">
		<table width="100%">
			<thead>
				<tr>
			      <th width="2%">&nbsp;</th>
			      <th width="10%">Logo</th>
			      <th width="10%">Company Name</th>
			      <th width="10%">Contact Person</th>
			      <th width="10%">Email</th>
			      <th width="10%">Website</th>
			      <th width="30%">Description</th>
			      <th width="30%" style="text-align:center;">Actions</th>
			    </tr>
			</thead>
		  	<tbody>
				@if(count($response)==0)
					There is no record in database.
				@else
					Total Record : {{$totalcount}}
				@endif

				@foreach($response as $business_guide)
			    	<tr valign="top">
				      		<td><input type="checkbox" name="recordstoDelete[]" value="{{ $business_guide['id'] }}" /></td>
					        <td><div class="previewstyle">  
				                <img src="../businesslogo/php/files/{{$business_guide['image']}}" >
				                </div>
				        	</td>
				        		      
					        <td>{{$business_guide['companyname']}}</td>
					       
					        <!-- <td>{{$business_guide['companylogo']}}</td> -->
					        <td>{{$business_guide['contact_person']}}</td>
					        <td>{{$business_guide['email']}}</td>
					        
					       
					        <td>{{$business_guide['website']}}</td>
					        
					        <td> 
					      		<div id="container">
				                    <div id="scrollbox" >
				                        <div id="content" >
										 <p>{{ strip_tags($business_guide['description']) }}</p>   
				                        </div>
				                    </div>
				                </div>
					        </td>
					        
					        <td style="text-align:center;">
						      	<a href="/businessguide-update/{{ $business_guide['id'] }}"  class="buttonaction">Edit</a><br><br>
						        <a href="/deletebusinessguide/{{ $business_guide['id'] }}"   class="buttonaction">Delete</a>
					        </td>
				    </tr>
				    <tr><td colspan="8"><hr></td></tr>	    
		   		@endforeach	
		    <tr><td colspan="8"><ul class="pagination">{{ $response->links() }}</ul></td></tr>   	   
		  </tbody>
		</table><!--end of table-->
			<input type="submit" value="Delete" name="delete" class="button round" /> 
		
	</form>	
	
</div>
@stop