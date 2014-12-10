@extends('../admin')
@section('content')
<div class="large-10 columns">
	<div id="icon-edit" class="icon32"><br/></div>
	<h2 class="title">Edit Business Guide</h2><br><br>
		<form id="add_form" class="row custom panel" action = "/updatebusinessguide/{{ $business->id}}" method= "post" enctype="multipart/form-data">
		<div class="row">
			<div class="large-3 column"><label for="title">Company Name</label></div>
			<div class="large-9 column">
				
				<input name="name" type="text" required="required" value="{{ $business->companyname}}">
			</div>
		</div>
		
		<div class="row">
			<div class="large-3 column"><label for="category">Category</label></div>
			<div class="large-9 column">
				<select name='category' id='categories'>
					@foreach($categories as $category)
					<option value="{{ $category->id }}" @if($category->id == $business->categoryid) selected @else  @endif>{{ $category->title }}</option>
					@endforeach
				</select>
			</div>
		</div><br>
		
		<div class="row">
					<div class="large-3 column"><label for="image">Image</label></div>
					<div class="large-5 column" style="background:#E1F5D1">
						<label for="photo">Photo <i>( Width:960px & Height:450px )</i></label>
						<!-- <label for="About">About <i class="text-red"></i></label><br> -->
						<div class="row">
							<div class="large-4 columns">
			                    <div class="file-upload">
									<span class="text-center">Upload</span>
									<input type="file" name="image_file" id="image_file" onchange="fileSelected();"/>
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
					<div class="large-4 columns">
						<div class="previewstyle">
							<img id="oldpreview" class="preview" src="../businesslogo/php/files/{{ $business->image }}" />
						</div>
					</div>
				<input type="hidden" name="hdphoto" value="{{ $business->image }}">
		</div>
		<div class="cleardiv">&nbsp;</div>

		<div class="row">
			<div class="large-3 column"><label for="email">Contact Person</label></div>
			<div class="large-9 column">
				<input name="contact_person" type="text" value="{{$business->contact_person}}">
			</div>
		</div>
		<div class="row">
			<div class="large-3 column"><label for="email">Email</label></div>
			<div class="large-9 column">
				<input name="email" type="text" value="{{$business->email}}">
			</div>
		</div>
		<div class="cleardiv">&nbsp;</div>
		
		<div class="row">
			<div class="large-3 column"><label for="password">Street and No.</label></div>
			<div class="large-9 column">
				<input name="street" type="text" required="required" value="{{$business->street}}">
			</div>
		</div><div class="cleardiv">&nbsp;</div>
		
		<div class="row">
			<div class="large-3 column"><label for="country">Township</label></div>
			<div class="large-9 column">
				<input name="township" type="text" required="required" value="{{$business->township}}">
			</div>
		</div>

		<div class="row">
			<div class="large-3 column"><label for="country">City</label></div>
			<div class="large-9 column">
				<input name="city" type="text" required="required" value="{{$business->city}}">
			</div>
		</div>
		
		<div class="cleardiv">&nbsp;</div>
		<div class="row">
			<div class="large-3 column"><label for="country">Phone</label></div>
			<div class="large-9 column">
				<input name="phone" type="text" required="required" value="{{$business->phone}}">
			</div>
		</div>
		<div class="cleardiv">&nbsp;</div>
		<div class="row">
			<div class="large-3 column"><label for="country">Website</label></div>
			<div class="large-9 column">
				<input name="website" type="text" value="{{$business->website}}">
			</div>
		</div>
		
		<div class="cleardiv">&nbsp;</div>
		<div class="row">
			<div class="large-3 column"><label for="address">Business Days</label></div>
			<div class="large-7 columns">
				<div class="row panel" style="margin:3px;">
					<?php $i=1;?>
					@foreach($days as $day)
						@if($i==1 || $i==5)
						<div class="large-6 column">
						@endif

							<input type="checkbox" name='days[]' value="{{ $day }}" 
							@foreach($business->days as $row)
								@if($row['day'] == $day)
									Checked
								@else
								@endif
							@endforeach
							>
						<label>{{ $day }}</label><br>
						@if($i==4 || $i==7)
						</div>
						@endif
					<?php $i++ ?>
					@endforeach
					<!-- <div class="large-6 column">
						<input type="checkbox" name='days[]' value="Firday"><label>Firday</label><br>
						<input type="checkbox" name='days[]' value="Saturday"><label>Saturday</label><br>
						<input type="checkbox" name='days[]' value="Sunday"><label>Sunday</label><br>
					</div> -->
				</div>
			</div>
			<div class="large-3 column">&nbsp;</div>

		</div>
		<div class="cleardiv">&nbsp;</div>
		<div class="row">
			<div class="large-3 column"><label for="address">Short Description</label></div>
			<div class="large-9 column">
				<textarea name="short_description">{{strip_tags($business->short_description)}}</textarea>
			</div>
		</div>
		<div class="row">
			<div class="large-3 column"><label for="desc">Description</label></div>
			<div class="large-9 column">				
				<textarea name="description" id="tinymce">{{strip_tags($business->description)}}</textarea>
				<span id="hide_error_message" style="color:red; display:none;">These description should be filled .</span>
			</div>
		</div>
		<div class="cleardiv">&nbsp;</div>
		<div class="row">
			<div class="large-3 column">&nbsp;</div>
			<div class="large-3 column">
				<input type = "submit" value = "Save" class="button round" id="btn_create" />
			</div>
			<div class="large-3 column"><a href="/businessguidelist" class="button round">Cancel</a></div>
			<div class="large-3 column">&nbsp;</div>

		</div>
		</form><!--end of form-->	

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

