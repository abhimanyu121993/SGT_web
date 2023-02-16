// function initialize(){
//     var lati=parseFloat($('#lattitude').val());
//     var long=parseFloat($('#longitude').val());
//    initmap(lati,long);
// var input = document.getElementById('address');
// var autocomplete = new google.maps.places.Autocomplete(input);
// autocomplete.addListener('place_changed', function () {
//     var place = autocomplete.getPlace();
//    initmap(place.geometry['location'].lat(),place.geometry['location'].lng());
// });



//     }


    function initmap(lati,long,title){
        const map = new google.maps.Map(document.getElementById('address-map-container'), {
            center: {lat: lati, lng: long},
            zoom: 20
        });
        const marker = new google.maps.Marker({
            map: map,
            position: {lat: lati, lng: long},
            draggable: false,
            title: title
        });
        // const marker2 = new google.maps.Marker({
        //     map: map,
        //     position: {lat: lati+0.2, lng: long+0.2},
        //     draggable: true,
        //     title: "Drag me!"
        // });
        // google.maps.event.addListener(marker, 'dragend', function (event) {
        //     $('#lattitude').val(this.getPosition().lat());
        //     $('#longitude').val(this.getPosition().lng());
        //     // updateMarkerStatus('Drag ended');
        //     geocodePosition(marker.getPosition());
        //     initmap(this.getPosition().lat(),this.getPosition().lng());
        // });
        // $('#lattitude').val(lati);
        // $('#longitude').val(long);
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