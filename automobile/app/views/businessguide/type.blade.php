@extends('../master')
@section('content')
  <div class="large-9 columns left_padding_none">
    <div class="row">
      <div class="content-title">
          <span class="icon-logo"></span>
            Business Guide
          <span class="bottom-line"></span>
      </div>
      <div class="large-12 columns list-frame">
          <div class="row nopadding">
              <form action="/business-guide/search" method="get">
                <div class="large-6 columns nopadding">&nbsp;</div>
                <div class="large-4 columns nopadding" style="margin-top:6px;">
                  <input type="text" name="search" placeholder style="height:29px;padding:2px 5px; font-size:14px;">
                </div>
                <div class="large-2 columns">
                  <input type="submit" value="Search" class="btn search btn-primary" style="float:left;margin-top:6px;">
                </div>
              </form>
          </div>
        </div> 
      <div class="large-12 columns list-frame">
        @if(isset($businessguide))
          <?php $i=1; $count=count($businessguide); ?>
          @foreach($businessguide as $row)
            @if($i==1 || $i%2==1)
            <div class="row">
            @endif
              <div class="large-6 columns group">
                <h4><a href='/business-guide/{{str_replace(' ','-',$row->category)}}/{{str_replace(' ','-',$row->companyname)}}'>{{$row->companyname}}</a></h4><hr style="margin-top:0; border:none; border-bottom:dotted #ccc;">
                <div class="address">{{$row->street.', '. $row->township.', '.$row->city}}</div><br>
                <div class="description" style="height:3.2rem; over-flow:hidden;">{{$row->short_description}}</div><br>
                <div class="links">
                  @if($row->phone!='' && $row->phone !='-')
                  <span class="phone">
                    <a class="phone" href="#">{{$row->phone}}</a> 
                  </span>  
                  @endif
                  @if($row->website !='' && $row->website !='-')<a class="website" title="Visit company website" href="#">{{$row->website}}</a>@endif
                  @if($row->email !='' && $row->email !='-')<a class="enquiry" title="Send Enquiry" href="#">{{$row->email}}</a>@endif
                </div>
              </div>
            @if($i==$count || $i%2==0)
            </div>
            <div class="large-12 columns">
              <hr style="border:none;border-bottom:dashed #ccc thin; ">
            </div>
            @endif
            <?php $i++;?>
          @endforeach
          <div class="pagination">{{$businessguide->links()}}</div>
        @endif
      </div>
    </div>
    
    <br><br>
    <div style="clear:both">&nbsp;<br><br><br></div>
  </div>
@stop
