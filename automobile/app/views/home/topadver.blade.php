<?php
	$topadvertisement=Advertisement::whereposition('top-advertisement')->get();
?>
@if(isset($topadvertisement))
  @foreach($topadvertisement as $topadver)
    <li><!-- width :780 -->
      <img src="../../../../advertisementphoto/php/files/{{$topadver->image}}" style="max-height:134px;over-flow:hidden; width:100%;margin-top:4px;">
    </li>
  @endforeach
@endif