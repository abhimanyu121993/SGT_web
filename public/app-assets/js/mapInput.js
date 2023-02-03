// function initialize() {
//     alert();
//     $('form').on('keyup keypress', function(e) {
//         var keyCode = e.keyCode || e.which;
//         if (keyCode === 13) {
//             e.preventDefault();
//             return false;
//         }
//     });
//     const locationInputs = document.getElementsByClassName("map-input");

//     const autocompletes = [];
//     const geocoder = new google.maps.Geocoder;
//     for (let i = 0; i < locationInputs.length; i++) {

//         const input = locationInputs[i];
//         const fieldKey = input.id.replace("-input", "");
//         const isEdit = document.getElementById(fieldKey + "-latitude").value != '' && document.getElementById(fieldKey + "-longitude").value != '';

//         const latitude = parseFloat(document.getElementById(fieldKey + "-latitude").value) || -33.8688;
//         const longitude = parseFloat(document.getElementById(fieldKey + "-longitude").value) || 151.2195;

//         const map = new google.maps.Map(document.getElementById(fieldKey + '-map'), {
//             center: {lat: latitude, lng: longitude},
//             zoom: 13
//         });
//         const marker = new google.maps.Marker({
//             map: map,
//             position: {lat: latitude, lng: longitude},
//         });

//         marker.setVisible(isEdit);

//         const autocomplete = new google.maps.places.Autocomplete(input);
//         autocomplete.key = fieldKey;
//         autocompletes.push({input: input, map: map, marker: marker, autocomplete: autocomplete});
//     }

//     for (let i = 0; i < autocompletes.length; i++) {
//         const input = autocompletes[i].input;
//         const autocomplete = autocompletes[i].autocomplete;
//         const map = autocompletes[i].map;
//         const marker = autocompletes[i].marker;

//         google.maps.event.addListener(autocomplete, 'place_changed', function () {
//             marker.setVisible(false);
//             const place = autocomplete.getPlace();

//             geocoder.geocode({'placeId': place.place_id}, function (results, status) {
//                 if (status === google.maps.GeocoderStatus.OK) {
//                     const lat = results[0].geometry.location.lat();
//                     const lng = results[0].geometry.location.lng();
//                     setLocationCoordinates(autocomplete.key, lat, lng);
//                 }
//             });

//             if (!place.geometry) {
//                 window.alert("No details available for input: '" + place.name + "'");
//                 input.value = "";
//                 return;
//             }

//             if (place.geometry.viewport) {
//                 map.fitBounds(place.geometry.viewport);
//             } else {
//                 map.setCenter(place.geometry.location);
//                 map.setZoom(17);
//             }
//             marker.setPosition(place.geometry.location);
//             marker.setVisible(true);

//         });
//     }
// }

// function setLocationCoordinates(key, lat, lng) {
//     const latitudeField = document.getElementById(key + "-" + "latitude");
//     const longitudeField = document.getElementById(key + "-" + "longitude");
//     latitudeField.value = lat;
//     longitudeField.value = lng;
// }

function initialize(){
    var lati=parseFloat($('#lattitude').val());
    var long=parseFloat($('#longitude').val());
   initmap(lati,long);
var input = document.getElementById('address');
var autocomplete = new google.maps.places.Autocomplete(input);
autocomplete.addListener('place_changed', function () {
    var place = autocomplete.getPlace();
   initmap(place.geometry['location'].lat(),place.geometry['location'].lng());
});



    }


    function initmap(lati,long){
        const map = new google.maps.Map(document.getElementById('address-map-container'), {
            center: {lat: lati, lng: long},
            zoom: 50
        });
        const marker = new google.maps.Marker({
            map: map,
            position: {lat: lati, lng: long},
            draggable: true,
            title: "Drag me!"
        });
        google.maps.event.addListener(marker, 'dragend', function (event) {
            $('#lattitude').val(this.getPosition().lat());
            $('#longitude').val(this.getPosition().lng());
            // updateMarkerStatus('Drag ended');
            geocodePosition(marker.getPosition());
            initmap(this.getPosition().lat(),this.getPosition().lng());
        });
        $('#lattitude').val(lati);
        $('#longitude').val(long);
    }

    function geocodePosition(pos) {
        
        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({
          latLng: pos
        }, function(responses) {
          if (responses && responses.length > 0) {
            $('#address').val(responses[0].formatted_address);
          } else {
            alert('address not found');
          }
        });
      }