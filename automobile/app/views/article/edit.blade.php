@extends('../admin')
@section('content')
<div class="large-10 columns">
	<div id="icon-edit" class="icon32"><br /></div>
	<h2 class="title">Edit Car Article</h2><br><br>
	<form id="addnew-form" class="row custom addnew-form" action = "/updatearticle/{{ $article->id }}" method= "post" enctype="multipart/form-data">		
		<div class="row">
			<div class="large-2 column"><label for="title">Title</label></div>
			<div class="large-10 column">
				<input name="title" type="text" required="required" value="{{ $article->title }}">
			</div>
		</div>

		<div class="row">
			<div class="large-2 column"><label for="title">Category</label></div>
			<div class="large-10 column">
				<select name='category' id='categories'>
					@foreach($categories as $category)
					<option value="{{ $category->id }}" @if($category->id== $article->categoryid) selected @endif>{{ $category->category }}</option>
					@endforeach
				</select>
			</div>
		</div><br>

		<div class="row">
					<div class="large-2 column"><label for="image">Image</label></div>
					<div class="large-5 column" style="background:#E1F5D1">
						<label for="photo">Photo <i>( Width:960px & Height:450px )</i></label>
						<!-- <label for="About">About <i class="text-red"></i></label><br> -->
						<div class="row">
							<div class="large-4 columns">
			                    <div class="file-upload">
									<span class="text-center">Select to Upload Cover image</span>
									<input type="file" name="image_file" id="image_file" onchange="fileSelected();" />
								</div>
		                   	</div>
		                   	<div class="large-8 columns">
									                                       
			                    <div id="error">You should select valid image files only!</div>
			                    <div id="error2">An error occurred while uploading the file</div>
			                    <div id="abort">The upload has been canceled by the user or the browser dropped the connection</div>
			                    <div id="warnsize">Your file is very big. We can't accept it. Please select more small file</div>

			                    <div id="progress_info">
			                        <div id="progress"></div>
			                        <div id="progress_percent">&nbsp;</div>
			                        <div class="clear_both"></div>
			                        <div>
			                            <div id="speed">&nbsp;</div>
			                            <div id="remaining">&nbsp;</div>
			                            <div id="b_transfered">&nbsp;</div>
			                            <div class="clear_both"></div>
			                        </div>
			                        <div id="upload_response"></div>
			                    </div>
			                
				                <div class="previewstyle">
				                	<img id="preview" class="" />
				                </div> 
			                </div>
						</div>
					</div>
					<div class="large-5 columns">
						<div class="previewstyle">
							<img id="oldpreview" class="preview" src="../articlephoto/php/files/{{ $article->image }}" />
						</div>
					</div>
				<input type="hidden" name="hdphoto" value="{{ $article->image }}">
		</div>
		
		<br>
		<div class="row">
			<div class="large-2 column"><label for="title">Publish</label></div>
			<div class="large-2 column">
				<div class="switch large round">
				  <input id="np" name="status" @if($article -> title == 0) checked='checked' @else checked='' @endif value="0" type="radio">
				  <label for="np" onclick="">No</label>

				  <input id="np1" name="status" value="1" type="radio" @if($article->title==1) checked='checked' @else checked='' @endif>
				  <label for="np1" onclick="">Yes</label>

				  <span></span>
				</div>
			</div>
			<div class="large-8 column">&nbsp;</div>

		</div>

		<div class="row">
			<div class="large-2 columns"><label>Short Description</label></div>
			<div class="large-10 columns">
               	<textarea name="short_description">{{strip_tags($article->short_description)}}</textarea>
            </div>
        </div><br>

		<div class="row">
			<div class="large-2 column"><label for="desc">Description</label></div>
			<div class="large-10 column">				
				<textarea name="description" id="tinymce">{{ $article->description }}</textarea>
				<span id="hide_error_message" style="color:red; display:none;">These description should be filled .</span>
			</div>
		</div>
		<div class="cleardiv">&nbsp;</div>

		<div class="row">
			<div class="large-2 column">&nbsp;</div>
			<div class="large-10 column">
				<input type = "submit" value = "Save" class="button round" id="btn_create" />
				<br>
			</div>
		</div>
		</form><!--end of form-->	
		<div class="cleardiv">&nbsp;</div>

</div>
{{HTML::script('../src/select2.min.js')}}
{{HTML::script('../../js/imageupload.js')}}
{{HTML::script('../../js/admin/txtedt_dpic_create.js')}}
<script type="text/javascript">
        $(function(){
        	$('#categories').select2();
        });
</script>
@stop