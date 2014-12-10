@extends('../admin')
@section('content')
<div class="large-10 columns">
	<div id="icon-edit" class="icon32"><br /></div>
	<h2 class="title">Create New Advertisement</h2><br><br>
  		<form id="add_form" class="row custom panel addnew-form" action = "/updateadvertisement/{{$advertisement->id}}" method= "post" enctype="multipart/form-data">
				
		<div class="row">
			<div class="large-3 column"><label for="image">Image</label></div>
			<div class="large-9 column" style="background:#E1F5D1">
				<!--<label for="item">item <i class="text-red"></i></label><br> -->
					<div class="gallery-input">
						<ul>
							<div class="gallery_container">	
										<li class="gallery_photo right">
											<img src="../../advertisementphoto/php/files/thumbnail/{{ $advertisement['image'] }}"></img>
											<input type="hidden" value="{{ $advertisement['image'] }}" name="hdimage"></input></span>
										</li>
							</div>
							<div class="script"></div>
							<div class="upload">
								<span>Upload</span>
								<input type="file" id="gallery_upload1" data-url="../advertisementphoto/php/index.php">
							</div>
						</ul>
					</div>
			</div>
		</div><br>

		<div class="row">
			<div class="large-3 column"><label for="title">Website link</label></div>
			<div class="large-9 column">
				<input name="weblink" type="text" value="{{$advertisement->weblink}}">
			</div>
		</div>

		<div class="row">
			<div class="large-3 column"><label for="title">Position</label></div>
			<div class="large-9 column">
				<select name="position" id='position'>
					<option value="top-advertisement" @if($advertisement->position=='top-advertisement') selected @else @endif>Top Advertisement</option>
					<option value="left-advertisement" @if($advertisement->position=='left-advertisement') selected @else @endif>Left Advertisement</option>
				</select>
			</div>
		</div><br>

		<div class="row">
			<div class="large-3 columns"><label>Description</label></div>
			<div class="large-9 columns">
               	<textarea name="description" id='tinymce'>{{$advertisement->description}}</textarea>
            </div>
        </div><br>
		
		<div class="row">
			<div class="large-2 column">&nbsp;</div>
			<div class="large-10 column">
				<br>
				<input type = "submit" value = "Save" class="button round" id="btn_create" />
				<br>
			</div>
		</div>
		<div class="cleardiv">&nbsp;</div>
		</form><!--end of form-->	
</div>
<div class="large-2 columns">&nbsp;</div>
{{HTML::script('../../src/select2.js')}}
{{HTML::script('../../js/admin/txtedt_dpic_create.js')}}
<script type="text/javascript">
	$(function(){
		$('#position').select2();
	});
</script>
@stop