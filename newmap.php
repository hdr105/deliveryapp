<?php
$con = mysqli_connect("localhost","root","","delivery");

// Check connection
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>

<?php
$drop_location = $_POST['drop'];
$curr = $_POST['current'];


?>
<!DOCTYPE html>
<html>
<head>
	<title>sdas</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
<style>
#map {
  height: 100%;
}
#directions-panel{
  background: #20205d;
    color: white;
}

html, body {
  height: 100%;
  margin: 0;
  padding: 0;
}
</style>
<body>
 <input type="hidden" id="start" value="<?php echo $curr; ?>">
 <input type="hidden" id="end" value="<?php echo $drop_location ?>">

 <div  class="col-md-8" id="map"></div>
 
 <div class="col-md-4" id="directions-panel">
 </div>
</body>



<script src="jquery-1.12.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript">

  function onPositionUpdate(position) {
    var lat = position.coords.latitude;
    var lon = position.coords.longitude;
    $.ajax({
      url : "https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyCLZzq31lWF8Oo31xbFTqHchlmXIfzqeAI&latlng="+position.coords.latitude+","+position.coords.longitude+"&sensor=true",
      dataType : "json",
      success : function(data) {
       var area = data.results[2].formatted_address;
       $("#start").val(area);
       console.log(area);

     }
   });
  }

</script>

<script>


  var map, infoWindow;


  function initMap() {
    var directionsService = new google.maps.DirectionsService;
    var directionsDisplay = new google.maps.DirectionsRenderer;
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 6,
      center: {lat: 41.85, lng: -87.65}
    });
    directionsDisplay.setMap(map);

    $(document).ready(function() {
      setInterval( function get_data() {
      navigator.geolocation.getCurrentPosition(onPositionUpdate);
       calculateAndDisplayRoute(directionsService, directionsDisplay);
      },4000);
    });
  } //initMap end



  function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(browserHasGeolocation ?
      'Error: The Geolocation service failed.' :
      'Error: Your browser doesn\'t support geolocation.');
    infoWindow.open(map);
  }

  function calculateAndDisplayRoute(directionsService, directionsDisplay) {



    directionsService.route({
      origin: document.getElementById('start').value,
      destination: document.getElementById('end').value,
      optimizeWaypoints: true,
      provideRouteAlternatives: true,
provideRouteAlternatives: false,
  travelMode: 'DRIVING',
  drivingOptions: {
    departureTime: new Date(/* now, or future date */),
    trafficModel: 'pessimistic'
  },
  unitSystem: google.maps.UnitSystem.IMPERIAL
    }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay.setDirections(response);
            var route = response.routes[0];
            var summaryPanel = document.getElementById('directions-panel');
            summaryPanel.innerHTML = '';
            // For each route, display summary information.
            for (var i = 0; i < route.legs.length; i++) {
              var routeSegment = i + 1;
              summaryPanel.innerHTML += '<b>Route Information: ' + routeSegment +
                  '</b><br> FROM: ';
              summaryPanel.innerHTML += route.legs[i].start_address + '<br> TO:  ';
              summaryPanel.innerHTML += route.legs[i].end_address + '<br> DISTANCE : ';
              summaryPanel.innerHTML += route.legs[i].distance.text + '<br><br>';
            }
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });

  }



</script>
<script
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCLZzq31lWF8Oo31xbFTqHchlmXIfzqeAI&libraries=places&callback=initMap"
async defer>
</script>
</html>

