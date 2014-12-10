@extends('../master')
@section('content')
  <div class="large-9 columns">
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
    </div>
    <div class="clear">&nbsp;</div>

    <div class="row">
      <div class="large-12 columns list-frame">
        @if(isset($businessguide))
            <div class="row">
              <div class="large-12 columns">
                <h4><b>{{$businessguide->companyname}}</b></h4>
              </div>
              <div class="clear"></div>

              <div class="large-3 small-4 columns"><label>Address</label></div>
              <div class="large-9 small-8 columns"><span>{{ $businessguide->street. ', '.$businessguide->township.', '. $businessguide->city }}</span></div>
              <div class="clear"></div>

              <div class="large-3 small-4 columns"><label>Contact Person</label></div>
              <div class="large-9 small-8 columns"><span>{{ $businessguide->contact_person}}</span></div>
              <div class="clear"></div>

              <div class="large-3 small-4 columns"><label>Phone</label></div>
              <div class="large-9 small-8 columns"><span>{{ $businessguide->phone}}</span></div>
              <div class="clear"></div>

              <div class="large-3 small-4 columns"><label>Email</label></div>
              <div class="large-9 small-8 columns"><span>{{ $businessguide->email}}</span></div>
              <div class="clear"></div>

              <div class="large-3 small-4 columns"><label>Website</label></div>
              <div class="large-9 small-8 columns"><span>{{ $businessguide->website}}</span></div>
              <div class="clear"></div>

              <div class="large-3 small-4 columns"><label>Business Days</label></div>
              <div class="large-9 small-8 columns">
                  @if(count($businessguide->days) >0)
                    @foreach($businessguide->days as $day)
                      <span> - {{ $day->day }}</span><br><br>
                    @endforeach
                  @endif
              </div>
              <div class="clear"></div>

              <div class="large-12 columns group">
                <p>{{$businessguide->short_description}}</p>
                <p>{{$businessguide->short_description}}</p>
              </div>
            </div>
            <div class="clear">&nbsp;</div>
        @endif
      </div>
    </div>
  </div>
@stop
