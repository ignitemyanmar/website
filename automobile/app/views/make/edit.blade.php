@extends('../admin')
@section('content')
<div class="large-6 columns">
	<div id="icon-edit" class="icon32"><br /></div>
	<h2 class="title">Edit Car Make</h2><br><br>
  		<form id="add_form" class="row custom panel addnew-form" action = "/updatecarmake/{{$make->id}}" method= "post" enctype="multipart/form-data">
				<div class="row">
					<div class="large-2 column"><label for="title">Make</label></div>
					<div class="large-10 column">
						<input name="make" type="text" required="required" value="{{$make->make }}">
					</div>
				</div>
				
				<div class="cleardiv">&nbsp;</div>
				<div class="row">
					<div class="large-2 column"><label for="image">Gallery</label></div>
					<div class="large-10 column" style="background:#E1F5D1">
						<!--<label for="item">item <i class="text-red"></i></label><br> -->
							<div class="gallery-input">
								<ul>
									<div class="gallery_container">	
												<li class="gallery_photo right">
													<img src="../../makephoto/php/files/thumbnail/{{ $make['image'] }}"></img>
													<input type="hidden" value="{{ $make['image'] }}" name="hdimage"></input></span>
												</li>
									</div>
									<div class="script"></div>
									<div class="upload">
										<span>Upload</span>
										<input type="file" id="gallery_upload1" data-url="../makephoto/php/index.php">
									</div>
								</ul>
							</div>
					</div>
				</div><br>
			
				<div class="row">
					<div class="large-2 column">&nbsp;</div>
					<div class="large-10 column">
						<br>
						<a href="/car-makelist" class="button round"> Cancel </a>
						<input type = "submit" value = "Save " class="button round" id="btn_create" />
						<br>
					</div>
					

				</div>
				<div class="cleardiv">&nbsp;</div><br>
		</form><!--end of form-->	

</div>
<div class="large-6 columns">&nbsp;</div>
{{HTML::script('../../js/admin/txtedt_dpic_create.js')}}
@stop