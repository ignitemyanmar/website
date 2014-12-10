@extends('../master')
@section('content')
	<div class="large-9 columns">
    <div class="row panel" style="padding:6px 5px;">
            <p class="title">ကားရွာရန္</p>
            <div class="large-12 columns list-frame">
              <form action="/buy-cars/search-cars" method="get">
              <div class="large-4 columns">
                <label for="categories"><b>Categories</b></label>
                <select name='categories' id='categories' class="left">
                  <option value="Select Category">Select Category</option>
                  <option value="ျမန္မာျပည္တြင္ေရာက္ရွိေနေသာ ကားမ်ား">ျမန္မာျပည္တြင္ေရာက္ရွိေနေသာ ကားမ်ား</option>
                  <option value="ဆိပ္ကမ္းေရာက္ တန္ဖုိးျဖင့္ေရာင္းမည့္ကားမ်ား">ဆိပ္ကမ္းေရာက္ တန္ဖုိးျဖင့္ေရာင္းမည့္ကားမ်ား</option>
                  <option value="စလစ္မ်ား">စလစ္မ်ား</option>
                <option value="အပ္ႏွံရမည့္ ယဥ္အုိယဥ္ေဟာင္းမ်ား">အပ္ႏွံရမည့္ ယဥ္အုိယဥ္ေဟာင္းမ်ား</option>
                </select>
              </div>
              <div class="large-4 columns">
                  <label for="make"><b>Brand</b></label>
                  <div id='makeloading' class="loading" style="display:none">&nbsp;</div>
                  <div id='makeframe'>
                    <select name='make' id='make' class="left">
                      <option value="Select Make">Select Brand</option>
                    </select>
                  </div>
              </div>
              <div class="large-4 columns">
                <label for="Models"><b>Models</b></label>
                <div id='modelloading' class="loading" style="display:none">&nbsp;</div>
                <div id="modelframe">
                  <select name='models' id='model' class="left">
                    <option value="Select Model">Select Model</option>
                  </select>
                </div>
                <div class="clear">&nbsp;</div>
                <input type="submit" value="Search" class="button search right">
              </div>
              </form>
            </div>
      </div>
      <div class="clear"></div>

    <div class="row panel" style="padding:6px 5px;">
          <p class="title">ေရာင္းရန္ကားမ်ား</p>
          <!-- <div class="line">&nbsp;</div> -->
          <div class="row">
            <div class="large-2 columns"><div class="show-for-large-up">Image</div><div class="hide-for-large-up"><b>Sort By</b></div><br></div>
            <div class="large-4 small-12 columns"><a class="button_list">Make</a><a class="button_list">Model</a><a class="button_list">Body</a><a class="button_list">Drive</a></div>
            <div class="large-1 small-2 columns"><a class="button_list">Type</a></div>
            <div class="large-1 small-2 columns"><a class="button_list">Color</a></div>
            <div class="large-1 small-2 columns"><a class="button_list">Year</a></div>
            <div class="large-1 small-2 columns"><a class="button_list">Trans</a></div>
            <div class="large-1 small-2 columns"><a class="button_list">Fuel</a></div>
            <div class="large-1 small-2 columns"><a class="button_list">Price</a></div>
            <div class="hide-for-large-up show-for-small"><b>&nbsp;</b><br></div>
            <div class="line">&nbsp;</div>
          </div>
          <div class="clear">&nbsp;</div>
          @if(count($cars)>0)
            @foreach($cars as $row)
              <div class="row carinfo-for-small">
                <div class="large-2 small-12 columns car-list-frame">
                  <div class="carimg top">
                      @if($row->status =='feature') <span></span>@endif
                      <a href="/buy-car/{{str_replace(' ','-',$row->category)}}/{{ $row->id}}/{{str_replace(' ','-',$row->make)}}/{{str_replace(' ','-',$row->model)}}">
                        <img src="../../carphoto/php/files/{{$row->image}}" class="car_listimg" width='100px'>
                      </a>
                  </div>  
                </div>  
                <div class="large-4 columns">
                    <div >
                      <a href="#"><span id="carlist_title">{{$row->make.' '. $row->model}}</span></a><br>
                      <span id="carlist1">   {{$row->mileage}} km :: {{$row->body}} ::</span><br>
                    </div>

                    <div style="height:25px;">
                      <span style="float:right;">
                        <a href="" class="button1">Save</a><br>
                      </span>

                    </div>

                    <div>
                      <span id="carlist_date">
                        <!-- Expiries date: {{ $row->updated_at }} -->
                      </span>
                    </div>  
                </div>
                <div class="large-1 columns">
                  <span class="hide-for-large-up">Body: {{ $row->body}}</span>
                  <span class='show-for-large-up'>{{ $row->body}}</span>
                </div>
                <div class="large-1 columns">
                  <span class="hide-for-large-up">Color: {{ $row->color}}</span>
                  <span class='show-for-large-up'>{{ $row->color}}</span>
                </div>
                <div class="large-1 columns">
                  <span class="hide-for-large-up">Year: {{ $row->year}}</span>
                  <span class='show-for-large-up'>{{ $row->year}}</span>
                </div>
                <div class="large-1 columns">
                  <span class="hide-for-large-up">Transmission: {{ $row->transmission}}</span>
                  <span class='show-for-large-up'><span>@if($row->transmission=='Automatic') A @elseif($row->transmission=="Manual") M @else A-M @endif</span>
                </div>
                <div class="large-1 columns">
                  <span class="hide-for-large-up">Fuel: {{ $row->fuel}}</span>
                  <span class='show-for-large-up'>{{ $row->fuel}}</span>
                </div>
                <div class="large-1 columns nopadding-for-large">
                  <span class="hide-for-large-up">Price: {{ $row->price}}</span>
                  <span class='show-for-large-up'>{{ $row->price}} K</span></div>
                
                <div class="clear">&nbsp;<br><br></div>
              </div>
              <div class="line">&nbsp;</div>
            @endforeach
            <div class="pagination"> {{ $cars->links() }}</div>
          @endif
    </div>
		<div style="clear:both">&nbsp;<br><br><br></div>
	</div>
{{HTML::script('../js/search/search-car.js')}}

<script type="text/javascript">
  $(function(){
    $('#categories').select2();
    $('#make').select2();
    $('#model').select2();
  });
</script>
@stop
