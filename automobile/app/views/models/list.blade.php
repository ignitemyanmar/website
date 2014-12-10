@extends('../admin')
@section('content')
	<style type="text/css">
		iframe {max-width: 150px; max-height: 110px;}
		.previewstyle{max-width: 150px;}
	</style>
		
<div class="large-12 columns">
		<div id="icon-edit" class="icon32"><br /></div>
		<h2 class="title">Model List</h2><br><br>
	<form action = "/searchmodels" method= "post" class="row">
			<div class="columns large-6">
				<input name="keyword" type="text" placeholder = " Search TypeByMake" data-required="true">
			</div>
			<div class="columns large-2">
				<input type = "submit" value = "Search" class="buttonaction" required>
			</div>
			<div class="columns large-4">
				<a href="/car-model-create" class="button round right">Add New Model </a>
			</div>
	</form>
</div>

<div class="columns large-12">
	@if(!$models)
		<p class="warning">You've not posted any Type By Make yet,</p>
	@else

		<strong>Total Record: {{$count}}</strong> 
	
    	<form  class="row custom" action = "/delmodels" method= "post">
			<table width="100%">
				  <thead>
					<tr>
					      <th width="2%">&nbsp;</th>
					      <th width="35%">Model</th>
					      <th width="35%">Make</th>
					      <th width="20%" style="text-align:center;">Actions</th>
					 </tr>
				  </thead>
				  <tbody>
						  @foreach($models as $model)
						    <tr valign="top">
					      		<td><input type="checkbox" name="recordstoDelete[]" value="{{ $model['id'] }}" /></td>
							    <td>{{$model['model']}}</td>
							    <td>{{$model['make']}}</td>
							    <td style="text-align:center;">
							      	<a href="/car-model-update/{{ $model['id'] }}"  class="buttonaction">Edit</a>
							        <a href="/deletemodel/{{ $model['id'] }}"   class="buttonaction">Delete</a>
								</td>
						    </tr>
						    <tr><td colspan="4"></td></tr>	
					    @endforeach	 
					    <tr><td colspan="4"><ul class="pagination">{{ $models->links() }}</ul></td></tr>   	   
				  </tbody>
			</table> <!--end of table-->
			
			 <input type="submit" value="Delete" name="delete" class="button round" /> 
		</form>	
		@endif
	</div>

	{{HTML::script('../js/responsiveslides.min.js')}}
@stop