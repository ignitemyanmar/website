@extends('../admin')
@section('content')
	<div class="columns large-12">
		<div id="icon-users" class="icon32"><br /></div>
		<h2 class="title">Contact Us List</h2>
		<br><br>
		<form action = "/contact-us-search" method= "post" class="row">
				<div class="columns large-6">
					<input name="keyword" type="text" placeholder = "Search contactus" data-required="true">
				</div>
				<div class="columns large-2">
					<input type = "submit" value = "Search" class="buttonaction">
				</div>
				<div class="columns large-4">
					<a href="/contact-us-create" class="button round">Add Contact Us</a>
				</div>	
		</form>
	</div>
<div class="columns large-12">
    <form  class="row custom" action = "/delcontactusinfo" method= "post">
		<table width="100%">
			<thead>
				<tr>
			      <th width="2%">&nbsp;</th>
			      <th width="8%">Title</th>
			      <th width="25%">Address</th>
			      <th width="10%">Phone</th>
			      <th width="10%">Email</th>
			      <th width="5%">Fax</th>
			      <th width="10%">Website</th>
			      <th width="20%" style="text-align:center;">Actions</th>
			    </tr>
			</thead>
		  	<tbody>
				@if(count($response)==0)
					There is no record in database.
				@else
					Total Record : {{$totalcount}}
				@endif

				@foreach($response as $contact_us)
			    	<tr valign="top">
				      		<td><input type="checkbox" name="recordstoDelete[]" value="{{ $contact_us['id'] }}" /></td>	      
					        <td>{{$contact_us['title']}}</td>
					        <td>{{$contact_us['address']}}</td>
					        <td>{{$contact_us['phone']}}</td>
					        <td>{{$contact_us['email']}}</td>
					        <td>{{$contact_us['fax']}}</td>
					        <td>{{$contact_us['website']}}</td>
					      
					       
					        <td style="text-align:center;">
						      	<a href="/contact-us-update/{{ $contact_us['id'] }}"  class="buttonaction">Edit</a>
						        <a href="/deletecontactus/{{ $contact_us['id'] }}"   class="buttonaction">Delete</a>
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