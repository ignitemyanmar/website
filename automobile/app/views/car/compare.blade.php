@extends('../master')
@section('content')
<style type="text/css">
  table{border-top-left-radius: 5px;border-top-right-radius: 5px; border-spacing: 0;
    border-collapse: separate; width: 100%; background: transparent; border: none;}
  table thead, table tfoot {
    background: none repeat scroll 0% 0% rgba(0,0,0,.5); height: 3rem; text-align: center;}
  tr{padding: 0; cell-spacing:0;}table tr:nth-of-type(2n) {
    background: none repeat scroll 0% 0% rgba(0,0,0,.4);}
  .carinfo-for-small .columns, td, th{border: 1px solid rgba(120,120,120,.2); height: 2rem;color: white;}
  td:last-child, th:last-child{border-right: 2px solid rgba(20,20,20,.4);}
  tbody th{ text-align: right; font-family: "Ayar Wagaung";}
  th.text-center{color: white; font-family: "Ayar Wagaung";font-size:1rem;}
  table tr th{font-size: 1rem;}
  table tr td, table tr th, table thead tr th {color:white;}
</style>
  <div class="large-9 columns">
    <div class="row" style="padding:6px 5px;">
      <div class="content-title">
        <span class="icon-logo"></span>
          Compare Page
        <span class="bottom-line"></span>

      </div>
      <div class="clear">&nbsp;</div> 
        @if($totalcompare > 3)
          <div class="large-12 columns alert">
              <a class="close" id="alertbtn">×</a>
              <h4 class="compare_errorcount">Sorry max ads for Compare = 3</h4>
          </div>
        @endif
        @if(count($cars)>0)       
          <table class="row" style="width:100%">
            <thead>
                <tr>
                    <th class="text-center">Count ads = {{ $count }}</th>
                    @foreach($cars as $car)
                    <th class="text-center">{{ $car['model']. ' ' . $car['make']}}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
              <tr>
                <th>Category</th>
                @foreach($cars as $car)
                  <td>{{ $car['category']}}</td>
                @endforeach
              </tr>
              <tr>
                <th>Price</th>
                @foreach($cars as $car)
                  <td>{{ $car['price']}}<span style="margin-left:1rem;" class="text-orange">သိန္း</span></td>
                @endforeach
              </tr>
              <tr>
                <th>Year</th>
                @foreach($cars as $car)
                  <td>{{ $car['year']}}</td>
                @endforeach
              </tr>
              <tr>
                <th>Mileage,km  </th>
                @foreach($cars as $car)
                  <td>{{ $car['mileage']}}</td>
                @endforeach
              </tr>
              <tr>
                <th>Engine size,l </th>
                @foreach($cars as $car)
                  <td>{{ $car['enginepower']}}</td>
                @endforeach
              </tr>
              <tr>
                <th>Fuel</th>
                @foreach($cars as $car)
                  <td>{{ $car['fuel']}}</td>
                @endforeach
              </tr>
              <tr>
                <th>Body Type</th>
                @foreach($cars as $car)
                  <td>{{ $car['body']}}</td>
                @endforeach
              </tr>
              <tr>
                <th>Transmission</th>
                @foreach($cars as $car)
                  <td>{{ $car['transmission']}}</td>
                @endforeach
              </tr>
              <tr>
                <th>Exterior Color</th>
                @foreach($cars as $car)
                  <td>{{ $car['color']}}</td>
                @endforeach
              </tr>
              <tr>
                <th>Engine size,l </th>
                @foreach($cars as $car)
                  <td>{{ $car['enginepower']}}</td>
                @endforeach
              </tr>
              <tr>
                <th>Equipments</th>
                @foreach($cars as $car)
                  <td valign="top">
                    @if(count($car['equipments'])>0)
                      @foreach($car['equipments'] as $equipment)
                        - {{ $equipment['name'] }}<br>
                      @endforeach
                    @endif
                  </td>
                @endforeach
              </tr>
              <tr>
                <th>Seller</th>
                @foreach($cars as $car)
                  <td>
                    @if(count($car['dealer'])>0)
                      {{ $car['dealer']['name']}}<br>
                      {{ $car['dealer']['companyname']}}<br>
                      {{ $car['dealer']['phone']}}<br>
                      {{ $car['dealer']['email']}}<br>
                      {{ $car['dealer']['address']}}
                    @else
                      -
                    @endif
                  </td>
                @endforeach
              </tr>      
            </tbody>
          </table>
        @endif  
    </div>
    <!--  -->
    <div style="clear:both">&nbsp;<br><br><br></div>
  </div>
{{HTML::script('../js/search/search-car.js')}}
{{HTML::script('../../js/compare.js')}}
@stop
