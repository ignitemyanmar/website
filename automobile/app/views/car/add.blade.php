@extends('../admin')
@section('content')
<style type="text/css">
	.require {
	    color: #F00;
	    margin-right: -21px;
	    float: right;
	    margin-left: -2rem;
	}
	div.switch span:last-child {box-shadow: none;}
</style>
<div class="large-10 columns">
	<div id="icon-edit" class="icon32"><br /></div>
	<h2 class="title">Create New Car</h2><br><br>
		<form id="upload_form" class="row custom panel addnew-form" action = "/addnewcar" method= "post" enctype="multipart/form-data">
		
		<div class="row">
			<div class="large-3 column"><label for="email">Category<span class="require">(*)</span></label></div>
			<div class="large-9 column">
				<select name="category" id='categories'>
					<option value="ျမန္မာျပည္တြင္ေရာက္ရွိေနေသာ ကားမ်ား">ျမန္မာျပည္တြင္ေရာက္ရွိေနေသာ ကားမ်ား</option>
					<option value="ဆိပ္ကမ္းေရာက္ တန္ဖုိးျဖင့္ေရာင္းမည့္ကားမ်ား">ဆိပ္ကမ္းေရာက္ တန္ဖုိးျဖင့္ေရာင္းမည့္ကားမ်ား</option>
					<option value="စလစ္မ်ား">စလစ္မ်ား</option>
					<option value="အပ္ႏွံရမည့္ ယဥ္အုိယဥ္ေဟာင္းမ်ား">အပ္ႏွံရမည့္ ယဥ္အုိယဥ္ေဟာင္းမ်ား</option>
					<option value=""></option>
				</select>
			</div>
		</div>
		<div class="cleardiv">&nbsp;</div>
		
		 <div class="row">
            <div class="large-3 column"><label for="price">Price<span class='require'>(*)</span></label></div>
            <div class="large-2 column">
              <input name="price" type="text" onKeyPress="return isNumberKey(event);" required="required" maxlength="9">
            </div>
            <div class="large-1 column text-right nopadding"><label>စလစ္</label></div>
            <div class="large-2 column">
              <div class="switch round">
                <input id="np" name="slip" type="radio" checked value="1">
                <label for="np" onclick="">ပါျပီး</label>

                <input id="np1" name="slip" type="radio" value="0">
                <label for="np1" onclick="">မပါ</label>
                <span></span>
              </div>
            </div>
            <div class="large-2 column text-right"><label>ညိွႏႈိင္း</label></div>
            <div class="large-2 column">
              <div class="switch round">
                <input id="np2" name="negotiate" type="radio" checked value="1">
                <label for="np2" onclick="">ရ</label>

                <input id="np3" name="negotiate" type="radio" value="0">
                <label for="np3" onclick="">မရ</label>
                <span></span>
              </div>
            </div>
          </div>
     	<div class="row">
          <div class="large-3 column"><label for="licenseno">နံပါတ်<span class='require'>(*)</span></label></div>
          <div class="large-2 column">
            <input type="checkbox" name='licenseno' class="chkclass" value="red" checked>
            <span class='radiolabel'>အနီ</span>
          </div>
          <div class="large-7 column">
            <input type="checkbox" name='licenseno' class="chkclass" value="black">
            <span class='radiolabel'>အနက္</span>
          </div>
        </div>

       	<div class="row">
            <div class="large-3 column"><label for="ownerbook">Owner Book<span class='require'>(*)</span></label></div>
            <div class="large-2 column">
              <input type="checkbox" name='ownerbook' class="chkownerbook" value="finish" checked/>
              <span class='radiolabel'>ထြက္ျပီး</span>
            </div>
            <div class="large-7 column">
              <!-- <input type="radio" name='ownerbook' value="unfinish"> -->
              <input type="checkbox" name='ownerbook' class="chkownerbook" value="unfinish"/>
              <span class='radiolabel'>မျပီးေသး</span>
            </div>
        </div>
		
		
		<div  style="display:none;" id='cif_info'>
			<div class="row">
				<div class="large-3 column"><label for="no">နံပါတ္</label></div>
				<div class="large-2 column">
					<label>အနီ</label><input type="radio" name='cif_no' value="red" checked>
				</div>
				<div class="large-7 column">
					<label>အနက္</label><input type="radio" name='cif_no' value="black">
				</div>
			</div>

			<div class="row">
				<div class="large-3 column"><label for="email">ခန္႕မွန္းၾကာျမင့္ခ်ိန္ (ရက္)</label></div>
				<div class="large-9 column">
					<input type="text" name='longday'>
				</div>
			</div>
			<div class="cleardiv">&nbsp;</div>
		</div>

		<div class="row">
			<div class="large-3 column"><label for="email">ကားအမွတ္တံဆိပ္ (Makes)<span class="require">(*)</span></label></div>
			<div class="large-9 column">
				<select name="makeid" id='make'>
					@foreach($response['make'] as $make)
						<option value="{{ $make->id }}">{{ $make->make }}</option>
					@endforeach
					
				</select>
			</div>
		</div>
		<div class="cleardiv">&nbsp;</div>


		<div class="row">
			<div class="large-3 column"><label for="email">ကားအမ်ိဳးအစား (Models)<span class="require">(*)</span></label></div>
			<div class="large-9 column">
				<div id='models'>
					<select name="modelid" id='model' required>
					</select>
				</div>
				<div id='loading' style="display:none;">Loading....</div>
			</div>
		</div>
		<div class="cleardiv">&nbsp;</div>


		<div class="row">
			<div class="large-3 column"><label for="email">ကားေဘာ္ဒီအမ်ိဳးအစား (Body Type) <span class="require">(*)</span></label></div>
			<div class="large-9 column">
				<select name="bodyid" id='bodies'>
					@foreach($response['body'] as $body)
						<option value="{{ $body->id }}">{{ $body->name }}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="cleardiv">&nbsp;</div>

		<div class="row">
			<div class="large-3 column"><label for="email">Year (made) <span class="require">(*)</span></label></div>
			<div class="large-9 column">
				<?php $year=2008; $now_year=date('Y')+1; ?>
				<select name="year" id='year' required>
					<option value="">Select Year</option>
					@for($i=$now_year; $i>=$year ; $i--)
					<option value="{{$i}}">{{$i}}</option>
					@endfor
				</select>
			</div>
		</div><br>

		<div class="row">
			<div class="large-3 column"><label for="email">Transmission (ဂီယာ) <span class="require">(*)</span></label></div>
			<div class="large-9 column">
				<select name="transmission" id='transmission'>
					<option value="Automatic">Automatic</option>
					<option value="Manual">Manual</option>
					<option value="Auto-Manual">Auto-Manual</option>
				</select>
			</div>
		</div>
		<div class="cleardiv">&nbsp;</div>

		<div class="row">
	      <div class="large-3 column"><label for="price">Engine Power <span class="require">(*)</span></label></div>
	      <div class="large-9 column">
	        <select name="enginepower" id='engine' required>
	          <option value="">Select Engine Power</option>
	          @if($response['enginepowers'])
		          @foreach($response['enginepowers'] as $enginepower)
		          	<option value="{{$enginepower['id']}}">{{$enginepower['name']}}</option>
		          @endforeach
	          @endif
	        </select>
	      </div>
	    </div><br>

		<div class="row">
			<div class="large-3 column"><label for="email">Fuel (ေလာင္စာ) <span class="require">(*)</span></label></div>
			<div class="large-9 column">
				<select name="fuel" id='fuel'>
					<option value="CNG">CNG</option>
					<option value="Diesel">Diesel</option>
					<option value="Gasoline">Gasoline</option>
					<option value="Octane">Octane</option>
					<option value="Others">Others</option>
				</select>
			</div>
		</div>
		<div class="cleardiv">&nbsp;</div>


		<div class="row">
			<div class="large-3 column"><label for="price">Mileage (ေမာင္းႏွင္ၿပီးကီလို)</label></div>
			<div class="large-9 column">
				<input name="mileage" type="text">
			</div>
		</div>

		<div class="row">
			<div class="large-3 column"><label for="email">Condition (ကားအေျခအေန)</label></div>
			<div class="large-9 column">
				<select name="conditionid" id='condition'>
					@foreach($response['condition'] as $condition)
						<option value="{{ $condition->id }}">{{ $condition->name }}</option>
					@endforeach
				</select>
			</div>
		</div><br>

		<div class="row">
			<div class="large-3 column"><label for="email">Color</label></div>
			<div class="large-9 column">
				<select name="colorid" id='color'>
					@foreach($response['color'] as $color)
						<option value="{{ $color->id }}">{{ $color->name }}</option>
					@endforeach
				</select>
			</div>
		</div><br>

		

		<div class="row">
			<div class="large-3 column"><label for="email">City (က.ည.န လိုင္စင္ၿမိဳ႕)</label></div>
			<div class="large-9 column">
				<select name="cityid" id='city'>
					@foreach($response['city'] as $city)
						<option value="{{ $city->id }}">{{ $city->name }}</option>
					@endforeach
				</select>
			</div>
		</div><br>

		<div class="row" style="display:none" id='cif_no'>
			<div class="large-3 column"><label for="email">ကားအကၡရာ</label></div>
			<div class="large-9 column">
				<input type="text" name='carno'>
			</div>
		</div><br>

		<div class="row">
			<div class="large-3 column"><label for="email">Country</label></div>
			<div class="large-9 column">
				<select name="country" id='country'>
					<option value="Myanmar">Myanmar</option>
				</select>
			</div>
		</div><br><hr>

		<div class="">
		<div class="row">
			<div class="large-3 column"><label for="email">ပါဝင္ေသာပစၥည္းမ်ား</label></div>
			<div class="large-9 columns">
				<div class="row">
					<?php $i=1; $count= count($response['ingredient']);?>
					@foreach($response['ingredient'] as $ingredient)
						@if($i==1 || $i%5==0)
						<div class="large-4 column">
						@endif
							<input type="checkbox" name='ingredient[]' value="{{ $ingredient->id }}">
							<label>{{ $ingredient->name }}</label><br>
						@if($i%4==0 || $i==$count)
						</div>
						@endif
					<?php $i++ ?>
					@endforeach
					
				</div>
			</div>
			
		</div><br><hr>

		<div class="row">
			<div class="large-3 column"><label for="image">Image <span class="require">(*)</span></label></div>
			<div class="large-9 column">
				<!--<label for="item">item <i class="text-red"></i></label><br> -->
					<div class="row">
							<div class="large-4 columns">
								<div class="file-upload">
										<span class="text-center">Upload</span>
										<input type="file" name="image_file" id="image_file" onchange="fileSelected('uploadfiles/');" required=""/>
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
										<img id="preview" class="preview" />
									</div>
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
							</div>
					</div>
			</div>
		</div>
		<br>

		<div class="row">
			<div class="large-3 columns"><label>ေျပာၾကားခ်င္သည့္ အခ်က္အလက္မ်ား</label></div>
			<div class="large-9 columns">
               	<textarea name="description" id="tinymce"></textarea>
            </div>
        </div><br>

	    <div class="row">
			<div class="large-3 column"><label for="image">Gallery</label></div>
			<div class="large-9 column">
				<!--<label for="item">item <i class="text-red"></i></label><br> -->

					<div class="gallery-input">
						<ul>
							<div class="gallery_container">
							</div>
							<div class="script"></div>
							<div class="upload">
								<span>upload</span>
								<input type="file" id="gallery_upload" data-url="../carphoto/php/index.php" multiple >
							</div>
						</ul>
					</div>
			</div>
		</div><br>
		<div class="row">
			<div class="large-3 column"><label for="email">Status</label></div>
			<div class="large-9 column">
				<select name="status" id='status'>
					<option value="premium">Premium</option>
					<option value="feature">Feature</option>
					<option value="sold">Sold</option>
					<option value="sell">Sell</option>
				</select>
			</div>
		</div><br>

		<!-- <div class="row">
			<div class="large-3 column"><label for="title">Publish</label></div>
			<div class="large-2 column">
				<div class="switch large round">
				  <input id="np" name="publish" checked="" value="0" type="radio">
				  <label for="np" onclick="">No</label>

				  <input id="np1" name="publish" value="1" type="radio">
				  <label for="np1" onclick="">Yes</label>

				  <span></span>
				</div>
			</div>
			<div class="large-7 column">&nbsp;</div>
		</div> -->

		<div class="row">
			<div class="large-3 column">&nbsp;</div>
			<div class="large-3 column">
				<input type = "submit" value = "Save" class="button round" id="btn_create" />
			</div>
			<div class="large-6 column"><a href="/carlist" class="button round">Cancle</a></div>

		</div>
		</form><!--end of form-->	
</div>
<div class="large-2 columns">&nbsp;</div>

{{HTML::script('../src/select2.min.js')}}
{{HTML::script('../../js/imageupload.js')}}
{{HTML::script('../../js/admin/txtedt_dpic_create.js')}}
<script type="text/javascript">
        $(function(){
        	$("input:checkbox.chkclass").click(function(){
	            $("input:checkbox.chkclass").not($(this)).removeAttr("checked");
	            $(this).attr("checked", $(this).attr("checked"));    
	        });
	        $("input:checkbox.chkownerbook").click(function(){
	            $("input:checkbox.chkownerbook").not($(this)).removeAttr("checked");
	            $(this).attr("checked", $(this).attr("checked"));    
	        });
        	$('#models').hide();
        	var make = $('#make').val();
        	loadmodel();
            $.get('/modellist/'+make,function(data){
              var result = '<option value="Select model" selected>Select Model</option>';
              for (var i = 0; i < data.length; i++) {
                result += '<option value="'+data[i].id+'">'+data[i].model+'</option>';
              }
              	$('#model').html(result);
          		$('#model').select2();
          		$('#models').show();
            });	
        	$('#categories').select2();
        	$('#make').select2();
        	$('#model').select2();
        	$('#bodies').select2();
        	$('#transmission').select2();
        	$('#engine').select2();
        	$('#fuel').select2();
        	$('#color').select2();
        	$('#condition').select2();
        	$('#year').select2();
        	$('#city').select2();
        	$('#country').select2();
        	$('#status').select2();
    	});

    	function loadmodel(){
    		var make = $('#make').val();
            $.get('/modellist/'+make,function(data){
              var result = '<option value="">Select Model</option>';
              for (var i = 0; i < data.length; i++) {
                result += '<option value="'+data[i].id+'">'+data[i].model+'</option>';
              }
              	$('#model').html(result);
          		$('#model').select2();
          		$('#models').show();
            });
    	}

    	$('#make').change(function(){
          $('#models').hide();
          var make = $('#make').val();
            $.get('/modellist/'+make,function(data){
              var result = '<option value="">Select Model</option>';
              for (var i = 0; i < data.length; i++) {
                result += '<option value="'+data[i].id+'">'+data[i].model+'</option>';
              }
              	$('#model').html(result);
          		$('#model').select2();
          		$('#models').show();
            });
        });


</script>
@stop