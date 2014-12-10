@extends('../master')
@section('content')
{{HTML::style('../../css/form_style.css')}}
{{HTML::style('../../css/upload.css')}}
<style type="text/css">
  textarea, .file-upload{margin-left: 0;}
</style>
<div class="large-9 columns">
	<div class="row" style="padding:6px 5px;">
	  <div class="content-title">
      <span class="icon-logo"></span>
        Course Enroll
      <span class="bottom-line"></span>
    </div>
    <div class="large-12 columns list-frame">
        @if(Session::has('message'))<div><p style="color:red; padding .5rem 1rem;margin-left:1rem;"> * {{Session::get('message')}}</p></div>
        @endif
        <form action="/users/register" method="post" class="addnew-form custom" enctype="multipart/form-data">
          <div class="row">
            <div class="large-3 columns" ><br>
              <label for="title">Name</label>
            </div>
            <div class="large-9 columns"><br>
                <input type="text" name="name" required>
            </div>
          </div>

          <!-- <div class="row">
            <div class="large-3 small-4 columns" ><br>
              <label for="title">Name</label>
            </div>
            <div class="large-9 small-8 columns"><br>
                <input type="text" name="dealername" required>
            </div>
          </div> -->

          <div class="row">
            <div class="large-3 small-4 columns" ><br>
              <label for="title">Company Name</label>
            </div>
            <div class="large-9 small-8 columns"><br>
                <input type="text" name="companyname" required>
            </div>
          </div>


          <div class="row">
            <div class="large-3 columns" ><br>
              <label for="title">Email</label>
            </div>
            <div class="large-9 columns"><br>
                <input type="email" name="email" id='email' required>
            </div>
          </div>
          <div class="row">
            <div class="large-3 columns">&nbsp;</div>
            <div class="large-9 columns"><div id="emailerror" style="color:red; padding .5rem 1rem;" class="helvetica_neue"></div></div>
          </div>


          <div class="row">
            <div class="large-3 columns" ><br>
              <label for="title">Password</label>
            </div>
            <div class="large-9 columns"><br>
                <input type="password" name="password" id="password" required>
            </div>
          </div>

          <div class="row">
            <div class="large-3 columns" ><br>
              <label for="title">Comfirm Password</label>
            </div>
            <div class="large-9 columns"><br>
                <input type="password" name="cpassword" id="cpassword">
            </div>
          </div>
          <div class="row">
            <div class="large-3 columns">&nbsp;</div>
            <div class="large-9 columns"><div id="errormessage" style="color:red; padding .5rem 1rem; "></div></div>
          </div>
          
          <div class="row">
            <div class="large-3 small-4 columns" ><br>
              <label for="title">Address</label>
            </div>
            <div class="large-9 small-8 columns"><br>
                <input type="text" name="address">
            </div>
          </div>

            <!-- <div class="row">
              <div class="large-3 small-4 columns" ><br>
                <label for="title">Website</label>
              </div>
              <div class="large-9 small-8 columns"><br>
                  <input type="text" name="website">
              </div>
            </div> -->

            <div class="row">
              <div class="large-3 small-4 columns" ><br>
                <label for="title">Contact Phone</label>
              </div>
              <div class="large-9 small-8 columns"><br>
                  <input type="text" name="phone" required>
              </div>
            </div>

            <div class="row">
              <div class="large-3 small-4 columns" ><br>
                <label for="title">Other Info</label>
              </div>
              <div class="large-9 small-8 columns"><br>
                  <textarea name="otherinfo"></textarea>
              </div>
            </div>

            <div class="row">
                  <div class="large-3 column"><label for="image">Image</label></div>
                  <div class="large-9 column">
                    <label for="photo" style="margin-left:0;">Logo <i>( max-width:450px & max-eight:300px )</i></label>
                    <!-- <label for="About">About <i class="text-red"></i></label><br> -->
                    <div class="row"  style="">
                      <div class="large-4 columns">
                        <div class="file-upload">
                          <span class="text-center">Upload</span>
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
            </div>
            
            <div class="row">
              <div class="large-3 small-4 columns" ><br>
                &nbsp;
              </div>
              <div class="large-9 small-8 columns"><br>
                  <input type="submit" value="Save" id='register' class="btn search btn-primary round">
              </div>
            </div>
          
        </form>
	  </div>
  </div>        
</div>

{{HTML::script('../../js/imageupload.js')}}

<script type="text/javascript">
        $(function(){
        	$('#city').select2();
        	$('#country').select2();
          $('#register').click(function(e){
            password=$('#password').val();
            cpassword=$('#cpassword').val();
            if(password != cpassword){
              $('#errormessage').html("* Password don't match");
              $('#cpassword').focus();
              return false;
            }
          })
        });
</script>
@stop
