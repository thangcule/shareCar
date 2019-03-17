@extends('layouts.app_default')
	
@section('content')
<style>
	.alert-danger {
		margin-top: 0px;
		margin-bottom: 20px; 
	}
</style>
	<div class="Layout-content">
	    <div class="Home u-flex">
            <div class="HomeBlock-inner" >
                <div class="HomeBlock-media HomeBlock-media--primary HomeBlock-form" style="margin-left: 20%; width: 60%;">
					<h2 class="HomeBlock-title">Find a ride</h2>
					<form action="/ride/find" method="POST">
						{{ csrf_field() }}

						<input type="text" placeholder="Leaving from" name="pick_up" id="pick_up" class="bla-input" value="<?= !empty(old('pick_up')) ? old('pick_up') : '' ?>">
                        {!! $errors->first('p_address', '<div class="alert alert-danger">:message</div>') !!}

						<input type="text" placeholder="Going to" name="drop_off" id="drop_off" class="bla-input" value="<?= !empty(old('drop_off')) ? old('drop_off') : '' ?>">
                        {!! $errors->first('d_address', '<div class="alert alert-danger">:message</div>') !!}

						<div class="input-group date" id="date" style="width: 100%;">
							<div class="bla-datetime-input">
		                    	Date and time <br>
		                    	<input type="text" name="start_date"/ value="{{old('start_date')}}" id="start_date">
							</div>
		                    <span class="input-group-addon" style="display: none;">
		                    	<span class="glyphicon glyphicon-calendar"></span>
		                    </span>
		                </div>
                        {!! $errors->first('start_date', '<div class="alert alert-danger">:message</div>') !!}
				        <script type="text/javascript">
				        	var f = "{{old('start_date')}}".split("-");
			                $('#date').datetimepicker({
			                	format: 'DD-MM-YYYY', 
			                	date: new Date(f[2], f[1] - 1, f[0])
			                });
				            $('.bla-datetime-input').click(function () {
				                $('.glyphicon-calendar').trigger('click');
				            })
				        </script>
				   

						<input type="hidden" name="p_address" id="p_address" value="{{old('p_address')}}">
					    <input type="hidden" name="p_lat" id="p_lat" value="{{old('p_lat')}}">
					    <input type="hidden" name="p_lng" id="p_lng" value="{{old('p_lng')}}">
					    <input type="hidden" name="d_address" id="d_address" value="{{old('d_address')}}">
					    <input type="hidden" name="d_lat" id="d_lat" value="{{old('p_lat')}}">
					    <input type="hidden" name="d_lng" id="d_lng" value="{{old('p_lng')}}">

				        <button class="bla-btn">Search</button>
					</form>
                </div>
            </div>
	    </div>
	</div>
	<script>
		$(document).keypress(
			function(event){
				if (event.which == '13') {
					event.preventDefault();
				}
		});
		var pick_up, drop_off;
		function init_map() {
		    pick_up = new google.maps.places.Autocomplete($('#pick_up')[0]);
		    drop_off = new google.maps.places.Autocomplete($('#drop_off')[0]);
		    pick_up.addListener('place_changed', function() {
		    	if (pick_up.gm_accessors_.place.Tc != undefined) {
				    $('#p_address').val(pick_up.gm_accessors_.place.Tc.formattedPrediction); // full address
			        $('#p_lat').val(pick_up.gm_accessors_.place.Tc.place.geometry.viewport.l.l);
			        $('#p_lng').val(pick_up.gm_accessors_.place.Tc.place.geometry.viewport.j.j);
			    } else {
			    	$('#p_address').val(pick_up.gm_accessors_.place.Yc.formattedPrediction); // full address
			        $('#p_lat').val(pick_up.gm_accessors_.place.Yc.place.geometry.viewport.la.l);
			        $('#p_lng').val(pick_up.gm_accessors_.place.Yc.place.geometry.viewport.ea.j);
			    }
		    });
		    drop_off.addListener('place_changed', function() {
		    	if (drop_off.gm_accessors_.place.Tc != undefined) {
				    $('#d_address').val(drop_off.gm_accessors_.place.Tc.formattedPrediction); // full address
			        $('#d_lat').val(drop_off.gm_accessors_.place.Tc.place.geometry.viewport.l.l);
			        $('#d_lng').val(drop_off.gm_accessors_.place.Tc.place.geometry.viewport.j.j);
			    } else {
			    	$('#d_address').val(drop_off.gm_accessors_.place.Yc.formattedPrediction); // full address
			        $('#d_lat').val(drop_off.gm_accessors_.place.Yc.place.geometry.viewport.la.l);
			        $('#d_lng').val(drop_off.gm_accessors_.place.Yc.place.geometry.viewport.ea.j);
			    }
		    });
		}
	</script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCskL3zcYoYUJ7t3UITgsuIzC8fyYjy3rc&libraries=places&language=vi&callback=init_map"></script>
@stop