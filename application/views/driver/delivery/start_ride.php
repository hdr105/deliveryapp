
<!DOCTYPE html>
<html>
<head>
	<title>Map</title>
  <script> var base_url =  '<?php echo base_url(); ?>'; </script>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCLZzq31lWF8Oo31xbFTqHchlmXIfzqeAI&libraries=places&callback=initMap" async defer></script>

  <script type="text/javascript">

    let dvl_id = "";
    let map = "";
    let infoWindow = "";

    let directionsService = "";
    let directionsDisplay = "";

    let lat = 56.1304;
    let lng = 106.3468;

    let zoom = 15;
    let image1 = "";
    let image2 = "";
    let marker = "";
    let icons = "";
    var markers = [];
    let startmarker = "";

    let _lat = "";
    let _lng = "";


    $(document).ready(function() {

      navigator.geolocation.getCurrentPosition(onPositionUpdate);
    });

    function onPositionUpdate(position) {
      var lat = position.coords.latitude;
      var lng = position.coords.longitude;

      console.log(lat,lng);

      $("#start_lat").val(lat);
      $("#start_lng").val(lng);

    }

    

    function initMap() {

      var rendOpts= {preserveViewport: true,suppressMarkers: true};
      directionsService = new google.maps.DirectionsService();
      directionsDisplay = new google.maps.DirectionsRenderer(rendOpts);
      image1= base_url+'assets/img/markers/marker1.png';
      image2= base_url+'assets/img/markers/marker2.png';


      map = new google.maps.Map(document.getElementById('map'), {
        zoom: zoom,
        center: {lat: lat , lng: lng }
      });
    //debugger;
    directionsDisplay.setMap(map);
    

  }

  function moveToLocation( lastlat, lastlng ){
    var center = new google.maps.LatLng(lastlat, lastlng);
    map.panTo(center);
                //debugger;

              }
              function get_data() {
                navigator.geolocation.getCurrentPosition(onPositionUpdate);
                calculateAndDisplayRoute(directionsService, directionsDisplay);
                dvl = $("#delivery_id").val();
                _lat = $("#start_lat").val();
                _lng = $("#start_lng").val();

                 console.log(_lat,_lng, dvl);
                 

                 $.ajax({
                  method:'post',
                  url:"<?php echo base_url('driver_dashboard/update_location');?>",
                  dataType:'json',
                  data:{lat:_lat,lng:_lng,dvl_id:dvl},
                  success:function(data)
                  { 
                    console.log("updated location ");
                  }
                });
              }


              $(document).ready(function() {
                setInterval( get_data,3000);
                setInterval( recenter,6000);
                  setTimeout(recenter, 5000);

               

                                  

              });

              function handleLocationError(browserHasGeolocation, infoWindow, pos) {
                infoWindow.setPosition(pos);
                infoWindow.setContent(browserHasGeolocation ?
                  'Error: The Geolocation service failed.' :
                  'Error: Your browser doesn\'t support geolocation.');
                infoWindow.open(map);
              }

              function calculateAndDisplayRoute(directionsService, directionsDisplay) {

                origin_latlng = new google.maps.LatLng(parseFloat($("#start_lat").val()), parseFloat($("#start_lng").val()) );

                dest_latlng = new google.maps.LatLng(parseFloat($("#drop_lat").val()), parseFloat($("#drop_lng").val()) );

                directionsService.route({
                  origin: origin_latlng,
                  destination: dest_latlng,
                  optimizeWaypoints: false,
                  provideRouteAlternatives: false,
                  travelMode: 'DRIVING',


      // unitSystem: google.maps.UnitSystem.IMPERIAL
    }, function(response, status) {
      if (status === 'OK') {
        directionsDisplay.setDirections(response);

        var route = response.routes[0];
        deleteMarkers();
        makeMarker( route.legs[0].start_location, image1, route.legs[0].start_address,true );
        makeMarker( route.legs[0].end_location, image2, route.legs[0].end_address,false );
        var summaryPanel = document.getElementById('directions-panel');
            // For each route, display summary information.
            for (var i = 0; i < route.legs.length; i++) {
              var routeSegment = i + 1;

              $("#directions-panel").html(`
                <div class='row'>
                <div class='col-md-12'><h2>Route Information</h2></div>
                </div>
                <div class='row'>
                <div class='col-md-12'><b>From: </b> `+route.legs[i].start_address+` </div>
                </div><div class='row'>
                <div class='col-md-12'><b>To: </b> `+route.legs[i].end_address+` </div>
                </div>
                </div><div class='row'>
                <div class='col-md-12'><b>Distance: </b> `+route.legs[i].distance.text+` </div>
                </div><div class='row'>
                <div class='col-md-12'><b>Duration: </b> `+route.legs[i].duration.text+` </div>
                </div><div class='row'>
                <div class='col-md-12 text-center'><button class="btn btn-lg btn-info" onclick="recenter()">ReCenter</button></div>
                </div>

                `);

            }
          } else {
            //window.alert('Directions request failed due to ' + status);
          }
        });



              }

              function makeMarker( position, icon, title, start ) {
                //deleteMarkers();

                marker = new google.maps.Marker({
                  position: position,
                  map: map,
                  icon: icon,
                  title: title,
                  
                });

                if (start) {
                  startmarker = marker;
                }

                markers.push(marker);




  // map.setZoom(18);
  // map.setCenter(marker.getPosition());

}

function recenter(){
  try{map.setCenter(startmarker.getPosition());}catch(err){console.log(err)}
  
}

function setMapOnAll(map) {
  for (var i = 0; i < markers.length; i++) {
    markers[i].setMap(map);
  }
}

  // Removes the markers from the map, but keeps them in the array.
  function clearMarkers() {
    setMapOnAll(null);
  }

      // Deletes all markers in the array by removing references to them.
      function deleteMarkers() {
        clearMarkers();
        markers = [];
      }


    </script>
  </head>
  <style>
  #map {
    height: 100%;
  }
  #directions-panel{
    height: 100%;
    background: #20205d;
    color: white;
    font-size: 20px; 
  }

  html, body {
    height: 100%;
    margin: 0;
    padding: 0;
  }
</style>
<body>
 <input type="hidden" id="start_lat" value="">
 <input type="hidden" id="start_lng" value="">

 <input type="hidden" id="drop_lat" value="<?php echo $delivery->dvl_drop_lat ?>">
 <input type="hidden" id="drop_lng" value="<?php echo $delivery->dvl_drop_long; ?>">
 <input type="hidden" id="delivery_id" value="<?php echo $delivery->dvl_id; ?>">

 <div  class="col-md-8" id="map"></div>
 
 <div class="col-md-4" id="directions-panel">
 </div>



</body>
</html>

