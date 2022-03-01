let map;

function initMap() {
    var mapElement = document.getElementById("place-map");
    var dataLatLng = mapElement.getAttribute('data-latlng');
    var ArrLatLng = dataLatLng.split(',');
    var latVal = parseFloat(ArrLatLng[0]);
    var lngVal = parseFloat(ArrLatLng[1]);
    var position = { lat: latVal, lng: lngVal };
    map = new google.maps.Map(mapElement, {
        center: position,
        zoom: 13
    });
    var marker = new google.maps.Marker({
        position: position,
        map: map,
        draggable: true,
        animation: google.maps.Animation.DROP,
        title: 'Punto de entrega'
      });

    marker.addListener('dragend', function(e){
        var lat = e.latLng.lat(); 
        var lng = e.latLng.lng();
        var latlngElement = document.getElementById('latlng');
    
        latlngElement.value = lat + ', ' + lng;
    });
}
jQuery(function($){
    $("#state").change(function(e){
        var sid = $(this).val();
        var apiURL = $(this).attr('data-service');
        var _token = $('[name="_token"]').val();
        $.ajax({
            url: apiURL,
            type: 'get',
            dataType: 'json',
            data: { _token: _token, sid: sid },
            success: function(response){
                if(response){
                    $("#city > option:not(.no-replace)").remove();
                    $.each(response,function(index,value){
                        $('#city').append('<option value="'+value.id+'">'+value.name+'</option>');
                    });
                }
            }
        })
    });
});