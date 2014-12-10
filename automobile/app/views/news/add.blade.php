@extends('../admin')
@section('content')
<div class="large-10 columns">
	<div id="icon-edit" class="icon32"><br /></div>
	<h2 class="title">Add News</h2><br><br>
  		<form id="add_form" class="row custom panel addnew-form" action = "/addnews" method= "post" enctype="multipart/form-data">
		<div class="row">
			<div class="large-3 column"><label for="title">Title</label></div>
			<div class="large-9 column">
				<input name="title" type="text" required="required">
			</div>
		</div>
		
		<div class="row">
			<div class="large-3 column"><label for="image">Image</label></div>
			<div class="large-9 column" style="background:#E1F5D1">
				<!--<label for="item">item <i class="text-red"></i></label><br> -->
					<div class="gallery-input">
						<ul>
							<div class="gallery_container">
							</div>
							<div class="script"></div>
							<div class="upload">
								<span>Upload</span>
								<input type="file" id="gallery_upload1" data-url="newsphoto/php/index.php">
							</div>
						</ul>
					</div>
			</div>
		</div><br>

		<div class="row">
			<div class="large-3 column"><label for="title">Type</label></div>
			<div class="large-9 column">
				<select name="type" id='type'>
					<option value="local-news" selected>Local News</option>
					<option value="international-news">Inter News</option>
				</select>
			</div>
		</div><br>

		<div class="row">
			<div class="large-3 columns"><label>Short Description</label></div>
			<div class="large-9 columns">
               	<textarea name="short_description"></textarea>
            </div>
        </div><br>

		<div class="row">
			<div class="large-3 columns"><label>Description</label></div>
			<div class="large-9 columns">
               	<textarea name="description" id="tinymce"></textarea>
            </div>
        </div><br>
		
		<div class="row">
			<div class="large-3 column">&nbsp;</div>
			<div class="large-9 column">
				<br>
				<input type = "submit" value = "Save" class="button round" id="btn_create" />
				<br>
			</div>
			

		</div>
		<div class="cleardiv">&nbsp;</div>
		</form><!--end of form-->	

</div>
<div class="large-2 columns">&nbsp;</div>
{{HTML::script('../../src/select2.min.js')}}
{{HTML::script('../../js/admin/txtedt_dpic_create.js')}}
<script type="text/javascript">
	$(function(){
		$('#type').select2();
	});

</script>
@stop