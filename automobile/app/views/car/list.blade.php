@extends('../admin')
@section('content')
<div class="large-12 columns">
    <div id="icon-users" class="icon32"><br /></div>
        <h2 class="title">Car List  <a href="/car-create" class="button round" style="float:right;">Add New Car</a></h2>
	<table class="" style="width:100% ;cell-spacing:0;">
        <thead>
            <tr>
                <th>&nbsp;</th>
                <th>Image</th>
                <th>Make</th>
                <th>Model</th>
                <th>Category</th>
                <th>Info</th>
                <th>Status</th>
                <th width="20%">To Change</th>
                <th style="text-align:center;">Actions</th>
            </tr>
        </thead>
        <tbody>
        @if(count($cars)>0) 
            <?php $i=1; ?>
            @foreach ($cars as $car)
                <tr>
                    <td><input type="checkbox" name="recordstoDelete[]" value="{{ $car['id'] }}" /></td>
                    <td>
                        <div class="previewstyle">
                            <img src="carphoto/php/files/{{ $car->image }}">
                        </div>
                    </td>
                    <td>{{ $car->make }}</td>
                    <td>{{ $car->model }}</td>
                    <td>{{ $car->category }}</td>
                    <td>
                        <div class="container">
                            <div class="scrollbox" >
                                <div class="content">
                                 <p><b>Condition :</b>{{ $car->condition }}<br>
                                    <b>Body :</b>{{ $car->body }}<br>
                                    <b>Color :</b>{{ $car->color }}<br>
                                    <b>Price :</b>{{ $car->price }}<br>
                                    <b>Fuel :</b>{{ $car->fuel }}<br>
                                 </p>   
                                </div>
                            </div>
                        </div>
                    </td>                    
                    <td style="text-transform: capitalize;">{{ $car->status }}</td>                    
                    <td valign="bottom">
                        <a href="#" data-dropdown="drop{{$i}}" class="button dropdown" style="padding:2px 6px 2px 0; font-size:12px; width:100%; min-width:90px;">
                              <span  style="font-size:.8rem;">Change Status</span>
                        </a><br> 
                        <ul id="drop{{$i}}" data-dropdown-content class="f-dropdown"> 
                          <li><a href="car-status-change/premium/{{$car->id}}">Premium</a></li> 
                          <li><a href="car-status-change/feature/{{$car->id}}">Feature</a></li> 
                          <li><a href="car-status-change/sell/{{$car->id}}">Sell</a></li> 
                        </ul>
                    </td>                    
                   <td  valign="bottom">
                    <a href="/car-update/{{ $car->id }}"  class="buttonaction">Edit</a>
                    @if(Auth::user()->role==8)<a href='/deletecar/{{$car->id}}' class="buttonaction" >Delete</a>@endif
                  </td>
                </tr>
                <?php $i++; ?>
            @endforeach
        @endif
        </tbody>
    </table>
    {{ $cars->links() }}
    </div>
    <div class="clear">&nbsp;<br><br></div>
@stop