<?php
ini_set('display_errors','1');  
error_reporting(E_ALL);
?>
<html>  
<head >       
<title>Inicio</title>    
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">  
 <script src="js/gmaps/gmaps.js"></script>
<script src="js/jquery.js"></script>
<script type="text/javascript"
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2HCweqc36z8ruMHkZCMVrb6reGCSKzao&libraries=geometry">
</script>


<!-- Estilos css-->
  <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #mostrarMapa {
        height: 70%;

      }
      #formulario{
        height: 100%;
        width: 90%;

      }
      #mapa {
        height: 100%;
        width: 100%;
      }
    </style>

<?php

include('conexion.php');

$id_ubicacion = $_POST['id_ubicacion'];

$sql="SELECT * FROM maps.ubicacion WHERE id_ubicacion='$id_ubicacion'";
$query=pg_query($sql);
$total = pg_num_rows($query);
$arreglo = pg_fetch_array($query);

?>

<script>
function modifcarGuardar(){
var datos=$('#modificar').serialize();
$.post( "guardarModificarUbicacion.php",datos, function( data ) {
  $( "#llega" ).html( data );
});
}


function mostrarMapa(){ // muestra el mapa
 var map = null;
    var infoWindow = null;
    function openInfoWindow(marker) { //imprime valores de latitud y longitud en cuadro de texto
        var markerLatLng = marker.getPosition();
        infoWindow.setContent([
            '<strong>La posicion del marcador es:</strong><br/>',
            markerLatLng.lat(),
            ', ',
            markerLatLng.lng(),
            '<br/>Arrástrame para actualizar la posición.'
        ].join(''));
        infoWindow.open(map, marker);
   
    } // cierre de funcion openInfoWindow

  
    function initialize() {  //propiedades del mapa
        var myLatlng = new google.maps.LatLng(8.2333,-73.3500); 
        var myOptions = { 
          zoom: 15,
          center: myLatlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        } //cierre propiedades del mapa
        map = new google.maps.Map($("#mapa").get(0), myOptions);
        infoWindow = new google.maps.InfoWindow();
        var marker = new google.maps.Marker({ //propiedades del marcador
            position: myLatlng,
            draggable: true, //para dejarlo mover
            map: map,
            title:"Tomar latitud y longitud"
        });
        
          google.maps.event.addListener(marker, 'dragend', function(){  

            openInfoWindow(marker); // muestra el marcador

        document.getElementById("lat").value = this.getPosition().lat();
        document.getElementById("lng").value = this.getPosition().lng();

         
        }); //cierre eventos de javascript

    } // cierre funcion initialize

    $(document).ready(function() {
        initialize();
    });

} // cierre funcion mostrarMapa



</script>

</head>


<body>
<h1>Modifica datos de la ubicación </h1>
<br>


<TABLE width="100%" class="table" > 
     <TR> 
          <TD width="600" height="300">


<form id="modificar">
<center>
<table width="100%" class="table table-hover">
<tr><th>Id ubicacion</th><td><input name="id_ubicacion" class="form-control"  value="<?php echo $id_ubicacion;?>"/></td>
</tr>

<tr><th>Name</th><td><input  name="name" class="form-control" maxlength="50" value="<?php echo $arreglo['name'];?>"/></td></tr>
<tr><th>Telephone</th><td><input  name="telephone" class="form-control" maxlength="50" value="<?php echo $arreglo['telephone'];?>"/></td></tr>
<tr><th>Direction</th><td><input  name="direction" class="form-control" maxlength="50" value="<?php echo $arreglo['direction'];?>"/></td></tr>
<tr><th>Description</th><td><input  name="description" class="form-control" maxlength="50" value="<?php echo $arreglo['description'];?>"/></td></tr>
<tr><th>Latitud</th><td><input  name="latitud" class="form-control" maxlength="50" id="lat" value="<?php echo $arreglo['latitud'];?>"/></td></tr>
<tr><th>Longitud</th><td><input  name="longitud" class="form-control" maxlength="50" id="lng" value="<?php echo $arreglo['longitud'];?>"/></td></tr>





<tr><td colspan="2"><input type="button" class="btn btn-primary" onclick="modifcarGuardar()"  value="Modificar"/></td></tr>





</table>
</center>
</form>

		
 <TD width="800" height="300"> 
    <div id="mapa">  
      <br><br><br><br>
      <div class="alert alert-info">
      <strong>Info!</strong> Para conseguir la latitud y la longitud de la ubicacion que deseas guardar te puedes guiar dando click en el boton de abajo
      </div>
      <center>
        <button type="button" class="btn btn-info" onclick="mostrarMapa()">Mostrar mapa</button>
      </center>
    </div>


 </TD> 
</TR> 
</TABLE>

<div id="llega"></div>


</body>
</html>
