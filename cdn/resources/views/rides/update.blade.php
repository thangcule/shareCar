@extends('layouts.app_default')
@section('content')
<div class="Layout-content">
    <div class="Home u-flex">
        <div class="HomeBlock-inner">
    	    <input id="start" type="text" class="form-control location" size="50" value="{{$pick_up->address}}">
		    <input type="hidden" name="pick_up" id="pick_up" value="" data-lat="{{$pick_up->lat}}" data-lng="{{$pick_up->lng}}">
		    <input id="end" type="text" class="form-control location" size="50" value="{{$stopover->address}}">
		    <input type="hidden" name="drop_off" id="drop_off" value=""  data-lat="{{$drop_off->lat}}" data-lng="{{$drop_off->lng}}">
		    <input type="text" class="waypoints form-control location" value="{{$stopover->address}}">
		    <input type="hidden" name="stopover" id="stopover" value=""  data-lat="{{$stopover->lat}}" data-lng="{{$stopover->lng}}">
        	<div id="map" style="height: 360px; width: 360px;" style="margin: 50px;"></div>
        </div>
    </div>
</div>

<!--     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyARmsylpiu9pd8KbasyR3xvosPKmwn14vM&libraries=places&language=vi&callback=init_map"></script> -->
@stop