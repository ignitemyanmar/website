@extends('../master')
@section('content')
	<div class="large-9 columns">
		<div class="row">
		  	<div class="large-12 list-frame columns">
          <div class="content-title">
            <span class="icon-logo"></span>
              Contact Us
            <span class="bottom-line"></span>
          </div>
          @foreach($contact as $row)
  		    <div class="row ayar-wagaung" style="margin:5px;">
            <img src="../../img/titlebgsm.png">
            <span> {{$row->address}} </span><div class="clearfix"></div>
            <img src="../../img/titlebgsm.png"><span> {{$row->phone}}</span><div class="clearfix"></div> 
  		      @if($row->fax)<img src="../../img/titlebgsm.png"><span> {{$row->fax}}</span> <br><br>@endif
            <img src="../../img/titlebgsm.png"> <a href='/'>{{$row->website}}</a>
  		    </div><br>
          @endforeach
  		  </div>
        <div class="clear">&nbsp;</div><br><br>
        <div class="large-12 columns list-frame nopadding">
          <div class="content-title">
            <span class="icon-logo"></span>
              Send an email. All fields with an * are required.
            <span class="bottom-line"></span>
          </div>
            <form action="/" class="add-newform" method="get" style="margin:5px;">
                <div class="row">
                  <div class="large-3 columns"><label class="right">Name  <span style="color:red">*&nbsp;</span></label>
                  </div>
                  <div class="large-5 columns"><input type="text" name='name'></div>
                  <div class="large-4 columns">&nbsp;</div>
                </div>
                <div class="row">
                  <div class="large-3 columns"><label class="right">email  <span style="color:red">*&nbsp;</span></label>
                  </div>
                  <div class="large-5 columns"><input type="text" name='name'></div>
                  <div class="large-4 columns">&nbsp;</div>
                </div>
                <div class="row">
                  <div class="large-3 columns"><label class="right">Subject  <span style="color:red">*&nbsp;</span></label>
                  </div>
                  <div class="large-5 columns"><input type="text" name='name'></div>
                  <div class="large-4 columns">&nbsp;</div>
                </div>
                <div class="row">
                  <div class="large-3 columns"><label class="right">Message  <span style="color:red">*&nbsp;</span></label>
                  </div>
                  <div class="large-5 columns"><textarea name="message" style="min-height:240px;margin-left:0;"></textarea></div>
                  <div class="large-4 columns">&nbsp;</div>
                </div>
                <div class="row">
                  <div class="large-3 columns">&nbsp;</div>
                  <div class="large-5 columns"><input type="submit" class="btn search btn-primary ayar-wagaung" value="Send email"></div>
                  <div class="large-4 columns">&nbsp;</div>
                </div>
            </form>
        </div>
		</div>
		<br><br>

		<div style="clear:both">&nbsp;<br><br><br></div>
		
	</div>
@stop
