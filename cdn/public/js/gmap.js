/*  
Require HTML before use
   <input type="hidden" name="p_address" id="p_address" value="{{$ride['pick_up']->address}}">
    <input type="hidden" name="p_lat" id="p_lat" value="{{$ride['pick_up']->lat}}">
    <input type="hidden" name="p_lng" id="p_lng" value="{{$ride['pick_up']->lng}}">
    <input type="hidden" name="d_address" id="d_address" value="{{$ride['drop_off']->address}}">
    <input type="hidden" name="d_lat" id="d_lat" value="{{$ride['drop_off']->lat}}">
    <input type="hidden" name="d_lng" id="d_lng" value="{{$ride['drop_off']->lng}}"> 
    <input type="hidden" name="s_address" id="s_address" value="{{$ride['stopover']->address}}">
    <input type="hidden" name="s_lat" id="s_lat" value="{{$ride['stopover']->lat}}">
    <input type="hidden" name="s_lng" id="s_lng" value="{{$ride['stopover']->lng}}">
 */
$(document).keypress(
	function(event){
		if (event.which == '13') {
			event.preventDefault();
		}
});
var map, autocomplete, directionsService, directionsDisplay, marker;
var p_address, d_address, s_address;

function init_map() {
    directionsService = new google.maps.DirectionsService();
    directionsDisplay = new google.maps.DirectionsRenderer();
    map = new google.maps.Map($('#map')[0], {
        center: {
            lat: 21.0042379,
            lng: 105.8442391
        },
        zoom: 6
    });
    directionsDisplay.setMap(map);

    marker = new google.maps.Marker({
        map: map,
        anchorPoint: new google.maps.Point(0, -29)
    });
    // auto complete
    p_address = new google.maps.places.Autocomplete($('#p_address')[0]);
    d_address = new google.maps.places.Autocomplete($('#d_address')[0]);
    s_address = new google.maps.places.Autocomplete($('#s_address')[0]);
    place_changed(p_address, "#p_address");
    place_changed(d_address, "#d_address");
    place_changed(s_address, "#s_address");
    set_route();
}
// point in {start, end, waypoint}
function place_changed(point, id) {
    point.setFields(['address_components', 'geometry', 'icon', 'name']);
    var find_in_map = function() {
        var place = point.getPlace();
        if (!place.geometry) {
            alert("Location '" + place.name + "' invalid");
            return;
        }
        // Enter autocomplete address => save address_data
        set_location_data(point, id);

        if (id == "#p_address") {  
            set_maker(place);
        } 
        else set_route();
    }
    point.addListener('place_changed', find_in_map);
}
function set_maker(place) {
    map.setCenter(place.geometry.location);
    map.setZoom(8);
    marker.setPosition(place.geometry.location);
    marker.setVisible(true);
}
function set_route() {
    marker.setVisible(false);
    var request = {
        origin: document.getElementById('p_address').value,
        destination: document.getElementById('d_address').value,
        travelMode: 'DRIVING'
    };
    if ($('#s_lat').val() != "") 
        request.waypoints = [{
             location : document.getElementById('s_address').value
        }];

    directionsService.route(request, function(result, status) {
        directionsDisplay.setDirections(result);
    });
}


function set_location_data(point, id) {
    if (point.gm_accessors_.place.Tc != undefined) {
        $(id).val(point.gm_accessors_.place.Tc.formattedPrediction); // full address
        $(id[0]+id[1]+'_lat').val(point.gm_accessors_.place.Tc.place.geometry.viewport.l.l);
        $(id[0]+id[1]+'_lng').val(point.gm_accessors_.place.Tc.place.geometry.viewport.j.j);
    } else {
        $(id).val(point.gm_accessors_.place.Yc.formattedPrediction); // full address
        $(id[0]+id[1]+'_lat').val(point.gm_accessors_.place.Yc.place.geometry.viewport.la.l);
        $(id[0]+id[1]+'_lng').val(point.gm_accessors_.place.Yc.place.geometry.viewport.ea.j);
    }

}
$('#p_address, #d_address, #s_address').on('keydown', function(event) {
    var key = event.keyCode || event.charCode;
    if (key == 8 || key == 46) {
        unset_location_data('#'+this.id);
        if (this.id == "s_address") set_route();
    }
});
function unset_location_data(id) {
    $(id[0]+id[1]+'_lat').val('');
    $(id[0]+id[1]+'_lng').val('');
}    
   