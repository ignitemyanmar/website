@extends('../master')
@section('content')
  <style type="text/css">
  .delete{float: left;padding:0.2em .6em; font-size: 13px; margin-right: 3px;}
  .edit{float: left;padding:0.2em .9em; font-size: 13px;}
  .profile_logo{position:relative; 
              height:150px;
              width:150px;
              overflow:hidden;background:rgba(0,0,0,.4);
              /*display: inline-block;*/}
  .profile_logo img{position: absolute; 
                top:-100%;bottom: -100%;left: 0;right: 0;margin: auto;}
  .list-frame .large-3{padding: 0;}
  .list-frame .large-3:after{content: ":";float: right;margin-top: -1.8rem;}
  </style>
	<div class="large-9 columns">
    @if($userinfo)
      <div class="row" style="padding:6px 5px;">
        <div class="content-title">
          <span class="icon-logo"></span>
            Your Profile
          <span class="bottom-line"></span>
        </div>
        <div class="large-8 columns">
          <div class="row">
            <div class="large-12 columns list-frame">
              <div class="row">
                <div class="large-3 columns">
                  <label>User Name</label>
                </div>
                <div class="large-9 columns">
                  <label>{{ $userinfo->first_name ." ". $userinfo->last_name}} </label>
                </div>
              </div>
              <div class="row">
                <div class="large-3 columns">
                  <label>Dealer Name</label>
                </div>
                <div class="large-9 columns">
                  <label>@if(count($userinfo->dealer)>0) {{ $userinfo->dealer->name .' ( '. $userinfo->dealer->companyname .' )' }}@else - @endif</label>
                </div>
              </div>
              <div class="row">
                <div class="large-3 columns">
                  <label>Phone</label>
                </div>
                <div class="large-9 columns">
                  <label>@if(count($userinfo->dealer)>0) {{ $userinfo->dealer->phone}} @endif</label>
                </div>
              </div>
              <div class="row">
                <div class="large-3 columns">
                  <label>Email</label>
                </div>
                <div class="large-9 columns">
                  <label>{{ $userinfo->email}}</label>
                </div>
              </div>

              @if(count($userinfo->dealer)>0)
                <div class="row">
                  <div class="large-3 columns">
                    <label>Adress</label>
                  </div>
                  <div class="large-9 columns">
                    <label>{{ $userinfo->dealer->address}}</label>
                  </div>
                </div>
                <div class="row">
                  <div class="large-3 columns">
                    <label>Country</label>
                  </div>
                  <div class="large-9 columns">
                    <label>{{ $userinfo->dealer->country}}</label>
                  </div>
                </div>
                <div class="row">
                  <div class="large-3 columns">
                    <label>Other Info</label>
                  </div>
                  <div class="large-9 columns">
                    <label>{{ $userinfo->dealer->description}}</label>
                  </div>
                </div>
              @else
               
                <div class="row">
                  <div class="large-3 columns">
                    <label>Adress</label>
                  </div>
                  <div class="large-9 columns">
                    <label>-</label>
                  </div>
                </div>
              @endif
            </div>
          </div>
        </div>
        <div class="large-4 columns">
          <div class="profile_logo">
            <img src="../businesslogo/php/files/@if(count($userinfo->dealer)>0){{ $userinfo->dealer->logo}}@endif ">
          </div>
        </div>
      </div>
      <div class="clear">&nbsp;</div>
      <div class="row" style="padding:6px 5px;">
        <div class="content-title">
          <span class="icon-logo"></span>
            မိမိတင်ထားေသာကားများ
          <span class="bottom-line"></span>
        </div>
          <!-- <p class="title"></p> -->
          <!-- <div class="line">&nbsp;</div> -->
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
          <!-- <div class="clear">&nbsp;</div> -->
          @if(count($cars)>0)
            @foreach($cars as $row)
            <div class="list-frame1">
              <div class="row carinfo-for-small ayar-wagaung">
                <div class="large-2 small-12 columns car-list-frame">
                  <?php
                    $label=''; 
                    if($row->status =='feature') {
                      $label='top';
                    }
                    if($row->status =='sold') {
                      $label='sold';
                    }
                  ?>
                  <div class="carimg {{$label}}">
                       <span></span>
                      <a href="/buy-car/{{str_replace(' ','-',$row->category)}}/{{ $row->id}}/{{str_replace(' ','-',$row->make)}}/{{str_replace(' ','-',$row->model)}}">
                        <img src="../../carphoto/php/files/{{$row->image}}" class="car_listimg" width='100px'>
                      </a>
                  </div> 
                  <br>
                  <a href="/sell-car/delete/{{$row->id}}" class="btn search btn-primary delete">
                    <span>Delete</span>
                  </a> 
                  <a href="/sell-car/update-vehicle/{{$row->id}}" class="btn search btn-primary edit">
                    <span>Edit</span>
                  </a>
                </div>  
                <div class="large-4 columns ayar-wagaung" style="min-height:62px;">
                    <div>
                      <a href="/buy-car/{{str_replace(' ','-',$row->category)}}/{{ $row->id}}/{{str_replace(' ','-',$row->make)}}/{{str_replace(' ','-',$row->model)}}">
                      <span id="carlist_title" class=''>{{$row->make.' '. $row->model}}</span></a><br>
                      <span id="carlist1">   {{$row->mileage}} km - {{$row->body}} </span><br>
                    </div>
                    
                    <div class="right">
                        <a href="/savevehicle?carinfo={{str_replace(' ','-',$row->category)}}/{{ $row->id}}/{{str_replace(' ','-',$row->make)}}/{{str_replace(' ','-',$row->model)}}" class="btn search btn-primary savevehicle">Save</a><br>
                    </div>
                    <div>
                      <span id="carlist_date">
                        Created date: {{ $row->created_at}}<br>
                        Updated date: {{ $row->updated_at}}
                      </span>
                    </div> 
                    <!-- <div class="sold_btn">
                        <a href="/savevehicle?carinfo={{str_replace(' ','-',$row->category)}}/{{ $row->id}}/{{str_replace(' ','-',$row->make)}}/{{str_replace(' ','-',$row->model)}}" class="btn search btn-primary">Sold</a><br>
                    </div> -->
                    <div><span class="view left" style="margin-top:12px; background:rgba(0,0,0,.4); border-radius:none; border:1px solid #fff;">View {{$row->viewcount}}</span></div>
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
                  <span class='show-for-large-up'>{{ $row->price}} <b class="text-orange">သိန်း</b>@if($row->slip==0) <b>+</b> စလစ်  @endif <br><br> @if($row->negotiate==1) ( ညိှနူိင်း ) @else ( ေရာင်းမည် ) @endif</span></div>
                </span>
                @if($row->status !='sold')
                <div class="large-12 columns right">
                  <div  style="position:absolute;bottom:0; right:20px;">
                    <div class="right"><span style="padding:9px;font-size:14px;"><br><br>ေရာင်းြပီးလျင် <b style="color:#F9941D">sold</b> ကုိ နှိပ်ရန် </span>@if(strtolower($row->status) !='sold')<a href="/car-status-change/{{$row->id}}" class="btn search btn-primary ">Sold</a><br>@endif</div>
                  </div>
                </div>
                @endif
                  <!-- <div class="clear">&nbsp;<br><br></div> -->
              </div>
            </div>

            @endforeach
              <div class="clear">&nbsp;</div>

            <div class="pagination"> {{ $cars->links() }}</div>
          @endif
    </div>
    @else
      <div class="row" style="padding:6px 5px;">
        <div class="content-title">
          <span class="icon-logo"></span>
            Your Profile
          <span class="bottom-line"></span>
        </div>
        <p> Please <a href='#login'>Login</a> or <a href="/users/register">Register.</a> </p>
      </div>
    @endif
  </div>
  
@stop
