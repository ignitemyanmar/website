@extends('../admin')
@section('content')
	<style type="text/css">
		iframe {max-width: 150px; max-height: 110px;}
		.previewstyle{max-width: 150px;}
	</style>
		
<div class="large-12 columns">
		<div id="icon-edit" class="icon32"><br /></div>
		<h2 class="title">Advertisement List</h2><br><br>
	<form action = "/advertisement-search" method= "post" class="row">
			<div class="columns large-6">
				<input name="keyword" type="text" placeholder = " Search Advertisement" data-required="true">
			</div>
			<div class="columns large-2">
				<input type = "submit" value = "Search" class="buttonaction" required>
			</div>
			<div class="columns large-4">
				<a href="/advertisement-create" class="button round right">Add New Advertisement </a>
			</div>
	</form>
</div>

<div class="columns large-12">
	@if(!$advertisements)
		<p class="warning">You've not posted any Advertisement yet,</p>
	@else

		<strong>Total Record: {{$count}}</strong> 
	
    	<form  class="row custom" action = "/deladvertisements" method= "post">
			<table width="100%">
				  <thead>
					<tr>
					      <th width="2%">&nbsp;</th>
					      <th width="10%">Image</th>
					      <th width="30%">Position</th>
					      <th width="20%">Weblink</th>
					      <th width="30%" style="text-align:center;">Actions</th>
					 </tr>
				  </thead>
				  <tbody>
						  @foreach($advertisements as $advertisement)
						    <tr valign="top">
						      	<td><input type="checkbox" name="recordstoDelete[]" value="{{ $advertisement['id'] }}" /></td>
							    <td><div class="previewstyle"><img src="../advertisementphoto/php/files/thumbnail/{{$advertisement['image']}}" width="120px"></div></td>
							    <td>{{$advertisement['position']}}</td>
							    <td>{{$advertisement['weblink']}}</td>
							    <td style="text-align:center;">
							      	<a href="/advertisement-update/{{ $advertisement['id'] }}"  class="buttonaction">Edit</a>
							        <a href="/deleteadvertisement/{{ $advertisement['id'] }}"   class="buttonaction">Delete</a>
								</td>
						    </tr>
						    <tr><td colspan="8"></td></tr>	
					    @endforeach	 
					    <tr><td colspan="8"><ul class="pagination">{{ $advertisements->links() }}</ul></td></tr>   	   
				  </tbody>
			</table> <!--end of table-->
			
			 <input type="submit" value="Delete" name="delete" class="button round" /> 
		</form>	
		@endif
	</div>

@stop