@extends('../master')
@section('content')
  <div class="large-9 columns left_padding_none">
    <div class="row car_search_row">
      <div class="large-12 columns">
          <div class="row nopadding">
            <form action="/buy-cars/search-cars" method="get">
              <div class="large-2 columns nopadding" style="margin-top:6px;">
                <span class="search-label">ကားၡာရန်</span>
              </div>
              <div class="large-3 columns nopadding">
                <select name='categories' id='categories' class="left">
                  <option value="Select Category">Select Category</option>
                  <option value="ျမန္မာျပည္တြင္ေရာက္ရွိေနေသာ ကားမ်ား">ျမန္မာျပည္တြင္ေရာက္ရွိေနေသာ ကားမ်ား</option>
                  <option value="ဆိပ္ကမ္းေရာက္ တန္ဖုိးျဖင့္ေရာင္းမည့္ကားမ်ား">ဆိပ္ကမ္းေရာက္ တန္ဖုိးျဖင့္ေရာင္းမည့္ကားမ်ား</option>
                  <option value="စလစ္မ်ား">စလစ္မ်ား</option>
                <option value="အပ္ႏွံရမည့္ ယဥ္အုိယဥ္ေဟာင္းမ်ား">အပ္ႏွံရမည့္ ယဥ္အုိယဥ္ေဟာင္းမ်ား</option>
                </select>
              </div>
              <div class="large-3 columns nopadding">
                <div id='makeframe'>
                  <select name='make' id='make' class="left">
                    <option value="Select Make">Select Brand</option>
                  </select>
                </div>
              </div>
              <div class="large-3 columns nopadding">
                <div id="modelframe">
                  <select name='models' id='model' class="left">
                    <option value="Select Model">Select Model</option>
                  </select>
                </div>
              </div>
              <div class="large-1 columns">
                <input type="submit" value="Search" class="btn search btn-primary right">
              </div>
            </form>
          </div>
      </div>
    </div>
    <div class="clearfix"></div>

    <div class="row car_search_row">
      <div class="content-title">
        <span class="icon-logo"></span>
          ေရာင်းရန်ကားများ
        <span class="bottom-line"></span>
      </div>
      <div class="row listheader">
        <div class="large-2 columns"><div class="show-for-large-up ayar-wagaung">Image</div><div class="hide-for-large-up"><b>Sort By</b></div></div>
        <div class="large-4 small-12 columns"><a class="button_list">Make</a><a class="button_list">Model</a><a class="button_list">Mileage</a><a class="button_list">Body Type</a></div>
        <!-- <div class="large-1 small-2 columns"><a class="button_list">Type</a></div> -->
        <div class="large-1 small-2 columns"><a class="button_list">Color</a></div>
        <div class="large-1 small-2 columns"><a class="button_list">Year</a></div>
        <div class="large-1 small-2 columns"><a class="button_list">Trans</a></div>
        <div class="large-1 small-2 columns"><a class="button_list">Fuel</a></div>
        <div class="large-2 small-2 columns"><a class="button_list">Price</a></div>
        <div class="hide-for-large-up show-for-small"><b>&nbsp;</b><br></div>
        <!-- <div class="line">&nbsp;</div> -->
      </div>
      @if(count($cars)>0)
        @foreach($cars as $row)
        <div class="list-frame1">
          <div class="row carinfo-for-small ayar-wagaung">
            <div class="large-2 small-12 columns car-list-frame">
              <?php
                $label=''; 
                if(strtolower($row->status)=='feature') {
                  $label='top';
                }
                if(strtolower($row->status)=='sold') {
                  $label='sold';
                }
              ?>
              <div class="carimg {{$label}}">
                   <span></span>
                  <a href="/buy-car/{{str_replace(' ','-',$row->category)}}/{{ $row->id}}/{{str_replace(' ','-',$row->make)}}/{{str_replace(' ','-',$row->model)}}">
                    <img src="../../carphoto/php/files/thumbnail/{{$row->image}}" class="car_listimg" width='100px'>
                  </a>
              </div>  
            </div>  
            <div class="large-4 columns ayar-wagaung" style="min-height:5rem;">
                <div>
                  <a href="/buy-car/{{str_replace(' ','-',$row->category)}}/{{ $row->id}}/{{str_replace(' ','-',$row->make)}}/{{str_replace(' ','-',$row->model)}}"><span id="carlist_title" class=''>{{$row->make.' '. $row->model}}</span></a><br>
                  <span id="carlist1">   {{$row->mileage}} km - {{$row->body}} </span><br>
                </div>

                <div class="right">
                    <a href="/savevehicle?carinfo={{str_replace(' ','-',$row->category)}}/{{ $row->id}}/{{str_replace(' ','-',$row->make)}}/{{str_replace(' ','-',$row->model)}}" class="btn search btn-primary savevehicle">Save</a><br>
                </div>
                <div><span class="view vcount left">View {{$row->viewcount}}</span></div>
            </div>
            <div class="large-1 columns nopadding">
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
            <div class="large-1 columns nopadding-for-large">
              <span class="hide-for-large-up">Fuel: {{ $row->fuel}}</span>
              <span class='show-for-large-up'>{{ $row->fuel}}</span>
            </div>
            <div class="large-2 columns">
              <span class="hide-for-large-up">Price: {{ $row->price}}</span>
              <span class='show-for-large-up'>{{ $row->price}} <b class="text-orange">သိန်း</b> @if($row->slip==0) <b>+</b> စလစ်  @endif <br><br> @if($row->negotiate==1) ( ညိှနူိင်း ) @else ( ေရာင်းမည် ) @endif</span></div>
            </span>
              <!-- <div class="clear">&nbsp;<br><br></div> -->
          </div>
        </div>

        @endforeach
          <div class="clear">&nbsp;</div>

        <div class="pagination"> {{ $cars->links() }}</div>
      @endif
    </div>
    <div style="clear:both">&nbsp;<br><br><br></div>
  </div>
{{HTML::script('../js/search/search-car.js')}}
{{HTML::script('../../js/compare.js')}}
@stop
