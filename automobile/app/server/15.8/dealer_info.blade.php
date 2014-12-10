@extends('../master')
@section('content')
{{HTML::style('../../css/form_style.css')}}
{{HTML::style('../../css/upload.css')}}
<div class="large-9 columns">
  <div class="row" style="padding:6px 5px;">
    <div class="content-title">
      <span class="icon-logo"></span>
        မိမိအချက်အလက်များ
      <span class="bottom-line"></span>
    </div>
    <div class="large-12 columns list-frame">
      @if(Auth::check())
        <form action="/users/profile-update/{{ Auth::user()->id}}" method="post" class="addnew-form custom"  enctype="multipart/form-data">
          <h4><b>General information</b></h4>
          <div class="row">
            <div class="large-3 columns" ><br>
              <label for="title">First Name</label>
            </div>
            <div class="large-5 columns"><br>
                <input type="text" name="firstname" value="{{Auth::user()->first_name}}">
            </div>
            <div class="large-4 column">&nbsp;</div>

          </div>
          <div class="row">
            <div class="large-3 columns" ><br>
              <label for="title">Last Name</label>
            </div>
            <div class="large-5 columns"><br>
                <input type="text" name="lastname" value="{{Auth::user()->last_name}}">
            </div>
            <div class="large-4 column">&nbsp;</div>

          </div>

          <div class="row">
            <div class="large-3 columns" ><br>
              <label for="title">Email</label>
            </div>
            <div class="large-5 columns"><br>
                <input type="text" name="email" value="{{Auth::user()->email}}">
            </div>
            <div class="large-4 column">&nbsp;</div>

          </div>
          <h4><b>Dealer Information</b></h4>
          @if(count($user->dealer) >0)
            <div class="row">
              <div class="large-3 small-4 columns" ><br>
                <label for="title">Name</label>
              </div>
              <div class="large-5 small-8 columns"><br>
                  <input type="text" name="dealername" value="{{ $user->dealer->name }}">
              </div>
              <div class="large-4 column">&nbsp;</div>

            </div>

            <div class="row">
              <div class="large-3 small-4 columns" ><br>
                <label for="title">Company Name</label>
              </div>
              <div class="large-5 small-8 columns"><br>
                  <input type="text" name="companyname" value="{{ $user->dealer->companyname }}">
              </div>
              <div class="large-4 column">&nbsp;</div>

            </div>

            <div class="row">
              <div class="large-3 small-4 columns" ><br>
                <label for="title">Website</label>
              </div>
              <div class="large-5 small-8 columns"><br>
                  <input type="text" name="website" value="{{ $user->dealer->website }}">
              </div>
              <div class="large-4 column">&nbsp;</div>

            </div>

            <div class="row">
              <div class="large-3 small-4 columns" ><br>
                <label for="title">Phone</label>
              </div>
              <div class="large-5 small-8 columns"><br>
                  <input type="text" name="phone" value="{{ $user->dealer->phone }}">
              </div>
              <div class="large-4 column">&nbsp;</div>

            </div>

            <div class="row">
              <div class="large-3 small-4 columns" ><br>
                <label for="title">Fax</label>
              </div>
              <div class="large-5 small-8 columns"><br>
                  <input type="text" name="fax" value="{{ $user->dealer->fax }}">
              </div>
              <div class="large-4 column">&nbsp;</div>

            </div>

            <div class="row">
              <div class="large-3 small-4 columns" ><br>
                <label for="title">Other Info</label>
              </div>
              <div class="large-9 small-8 columns"><br>
                  <textarea name="otherinfo">{{ $user->dealer->description }}</textarea>
              </div>

            </div>

            <div class="row">
                  <div class="large-3 column"><label for="image">Image</label></div>
                  <div class="large-9 column">
                    <label for="photo">Logo <i>( max-width:450px & max-eight:300px )</i></label>
                    <!-- <label for="About">About <i class="text-red"></i></label><br> -->
                    <div class="row">
                      <div class="large-4 columns">
                        <div class="file-upload">
                          <span class="text-center">Upload</span>
                          <input type="file" name="image_file" id="image_file" onchange="fileSelected();"/>
                        </div>
                      </div>
                      <div class="large-4 columns">
                                                         
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
                      <div class="large-4 columns"><span class="ayar-wagaung right">Current Photo</span>
                          <div class="previewstyle">
                              <img id="oldpreview" class="preview" src="../../businesslogo/php/files/{{ $user->dealer->logo }}" />
                              <input type="hidden" name="hdphoto" value="{{ $user->dealer->logo }}">
                          </div>  
                      </div>
                    </div>
                  </div>

            </div>

            <div class="row">
              <div class="large-3 small-4 columns" ><br>
                <label for="title">Address</label>
              </div>
              <div class="large-5 small-8 columns"><br>
                  <input type="text" name="address" value="{{ $user->dealer->address }}">
              </div>
              <div class="large-4 column">&nbsp;</div>

            </div>

            <div class="row">
              <div class="large-3 small-4 columns" ><br>
                <label for="title">City</label>
              </div>
              <div class="large-5 small-8 columns"><br>
                  <select name="city" id="city">
                    <option value="yangon">Yangon</option>
                    <option value="mandalay">mandalay</option>
                    <option value="naypyitaw">Nay Pyi Taw</option>
                  </select>
              </div>
              <div class="large-4 column">&nbsp;</div>

            </div>

            <div class="row">
              <div class="large-3 small-4 columns" ><br>
                <label for="title">Country</label>
              </div>
              <div class="large-5 small-8 columns"><br>
                  <select name="country" id="country">
                    <option value="myanmar">Myanmar</option>
                  </select>
              </div>
              <div class="large-4 column">&nbsp;</div>

            </div>

            <div class="row">
              <div class="large-3 small-4 columns" ><br>
                <label for="title">Zip Code</label>
              </div>
              <div class="large-5 small-8 columns"><br>
                  <input type="text" name="zipcode" value="{{ $user->dealer->zipcode }}">
              </div>
              <div class="large-4 column">&nbsp;</div>

            </div>

            <div class="row">
              <div class="large-3 small-4 columns" ><br>
                &nbsp;
              </div>
              <div class="large-5 small-8 columns"><br>
                  <input type="submit" value="Edit Profile" class="btn search btn-primary">
              </div>
              <div class="large-4 column">&nbsp;</div>

            </div>
          @else
            <div class="row">
              <div class="large-3 small-4 columns" ><br>
                <label for="title">Name</label>
              </div>
              <div class="large-5 small-8 columns"><br>
                  <input type="text" name="dealername">
              </div>
              <div class="large-4 column">&nbsp;</div>

            </div>

            <div class="row">
              <div class="large-3 small-4 columns" ><br>
                <label for="title">Company Name</label>
              </div>
              <div class="large-5 small-8 columns"><br>
                  <input type="text" name="companyname">
              </div>
              <div class="large-4 column">&nbsp;</div>

            </div>

            <div class="row">
              <div class="large-3 small-4 columns" ><br>
                <label for="title">Website</label>
              </div>
              <div class="large-5 small-8 columns"><br>
                  <input type="text" name="website">
              </div>
              <div class="large-4 column">&nbsp;</div>

            </div>

            <div class="row">
              <div class="large-3 small-4 columns" ><br>
                <label for="title">Phone</label>
              </div>
              <div class="large-5 small-8 columns"><br>
                  <input type="text" name="phone">
              </div>
              <div class="large-4 column">&nbsp;</div>

            </div>

            <div class="row">
              <div class="large-3 small-4 columns" ><br>
                <label for="title">Fax</label>
              </div>
              <div class="large-5 small-8 columns"><br>
                  <input type="text" name="fax">
              </div>
              <div class="large-4 column">&nbsp;</div>

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
                    <label for="photo">Logo <i>( max-width:450px & max-eight:300px )</i></label>
                    <!-- <label for="About">About <i class="text-red"></i></label><br> -->
                    <div class="row">
                      <div class="large-4 columns">
                        <div class="file-upload">
                          <span class="text-center">Upload</span>
                          <input type="file" name="image_file" id="image_file" onchange="fileSelected();"/>
                        </div>
                      </div>
                      <div class="large-4 columns">
                                                         
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
                      <div class="large-4 columns"><span class="ayar-wagaung right">Current Photo</span>
                          <div class="previewstyle">
                              <input type="hidden" name="hdphoto" value="">
                          </div>  
                      </div>
                    </div>
                  </div>

            </div>

            <div class="row">
              <div class="large-3 small-4 columns" ><br>
                <label for="title">Address</label>
              </div>
              <div class="large-5 small-8 columns"><br>
                  <input type="text" name="address">
              </div>
              <div class="large-4 column">&nbsp;</div>

            </div>

            <div class="row">
              <div class="large-3 small-4 columns" ><br>
                <label for="title">City</label>
              </div>
              <div class="large-5 small-8 columns"><br>
                  <select name="city" id="city">
                    <option value="yangon">Yangon</option>
                    <option value="mandalay">mandalay</option>
                    <option value="naypyitaw">Nay Pyi Taw</option>
                  </select>
              </div>
              <div class="large-4 column">&nbsp;</div>

            </div>

            <div class="row">
              <div class="large-3 small-4 columns" ><br>
                <label for="title">Country</label>
              </div>
              <div class="large-5 small-8 columns"><br>
                  <select name="country" id="country">
                    <option value="myanmar">Myanmar</option>
                  </select>
              </div>
              <div class="large-4 column">&nbsp;</div>

            </div>

            <div class="row">
              <div class="large-3 small-4 columns" ><br>
                <label for="title">Zip Codes</label>
              </div>
              <div class="large-5 small-8 columns"><br>
                  <input type="text" name="zipcode">
              </div>
              <div class="large-4 column">&nbsp;</div>

            </div>

            <div class="row">
              <div class="large-3 small-4 columns" ><br>
                &nbsp;
              </div>
              <div class="large-5 small-8 columns"><br>
                  <input type="submit" value="Save" class="btn search btn-primary">
              </div>
              <div class="large-4 column">&nbsp;</div>

            </div>
          @endif
        </form>
      @else
        <p> Please <a href='#login'>Login</a> or <a href="/users/register">Register.</a> </p>
      @endif

    </div>
  </div>        
</div>
{{HTML::script('../../js/imageupload.js')}}
<script type="text/javascript">
        $(function(){
          $('#city').select2();
          $('#country').select2();
        });
</script>
    

@stop
