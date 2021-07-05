<!doctype html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
 <script src="js/gmaps/gmaps.js"></script>
<script src="js/jquery.js"></script>
<script type="text/javascript"
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2HCweqc36z8ruMHkZCMVrb6reGCSKzao&libraries=geometry">
</script>

  <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #mapa {
        height: 50%;
      }
    </style>

   

<script type="text/javascript">
 
 var map = null;
    var infoWindow = null;
    function openInfoWindow(marker) {
        var markerLatLng = marker.getPosition();
        infoWindow.setContent([
            '<strong>La posicion del marcador es:</strong><br/>',
            markerLatLng.lat(),
            ', ',
            markerLatLng.lng(),
            '<br/>Arrástrame y haz click para actualizar la posición.'
        ].join(''));
        infoWindow.open(map, marker);
    }

  
    

    function initialize() {
        var myLatlng = new google.maps.LatLng(8.2333,-73.3500);
        var myOptions = {
          zoom: 16,
          center: myLatlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        map = new google.maps.Map($("#mapa").get(0), myOptions);
        infoWindow = new google.maps.InfoWindow();
        var marker = new google.maps.Marker({
            position: myLatlng,
            draggable: true,
            map: map,
            title:"Tomar latitud y longitud"
        });
        
          google.maps.event.addListener(marker, 'click', function(){



          

            openInfoWindow(marker);
  

        });

    }
    $(document).ready(function() {
        initialize();
    });

  



</script>




  </head>
  <body>
    <div id="mapa"></div>
  </body>
</html>