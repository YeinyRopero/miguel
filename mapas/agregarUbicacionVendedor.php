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
      #mapa2 {
        height: 100%;
        width: 100%;
      }
    </style>



<script type="text/javascript">  


function guardar(){ //enviar datos del formulario
var datos=$("#formulario").serialize();         
$.post("guardardatosubicacionvendedor.php",datos,function(data) {  
$("#enviar").html(data); 
});
} // cierre funcion guardar



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
        map = new google.maps.Map($("#mapa2").get(0), myOptions);
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

         }); // cierre eventos javascript
      } // cierre funcion initialize

    $(document).ready(function() {
        initialize();
    });

} // cierre funcion mostrarMapa



</script>






</head>





<body> 
<h3>Agregar nueva ubicacion</h3>



<TABLE width="100%" class="table" >  <!-- tabla general -->
     <TR> 
          <TD width="600" height="300">


<form id="formulario">
<center>
<table width="100%" class="table table-hover">
<tr><th>Name</th><td><input type="text" maxlength="50" class="form-control" name="name" /></td></tr>
<tr><th>Direction</th><td><input type="text"  maxlength="50" class="form-control" name="direction" /></td></tr>
<tr><th>Description</th><td><input type="text" maxlength="50" class="form-control" name="description" /></td></tr>
<tr><th>Telephone</th><td><input type="number" maxlength="50" class="form-control" name="telephone" /></td></tr>
<tr><th>Latitud</th><td><input  type="number" maxlength="50" class="form-control"  id="lat" name="latitud" /></td></tr>
<tr><th>Longitud</th><td><input type="number" maxlength="50" class="form-control" id="lng" name="longitud" /></td></tr>

<tr><th>Tipo de ubicacion</th>
<td><select class="form-control" name="tipo_ubicacion">

  <?php 
include('conexion.php');

$sql="SELECT * FROM maps.perfil_ubicacion ";
$query=pg_query($sql);
$total = pg_num_rows($query);

  if($total>0){
    for ($i = 0;$i<$total; $i++){
    $arreglo = pg_fetch_array($query);
    ?>
    <option value="<?php echo "$arreglo[tipo_ubicacion]"; ?>"> <?php echo "$arreglo[descripcion]"; ?> </option>
<?php
} //cierro for
} //cieroo if


  $id_usuario = $_GET['id_usuario'];


$sql="SELECT * FROM maps.usuario where id_usuario='$id_usuario' ";
$query=pg_query($sql);
$arreglo = pg_fetch_array($query);

?>


<tr><th>vendedor</th><td><input type='hidden' name="id_usuario" class="form-control"  value="<?php echo "$arreglo[id_usuario]"; ?>"/> <?php echo "$arreglo[name_usuario]"; ?> </td></tr>










<tr><td colspan="2"><input type="button" class="btn btn-primary" onclick="guardar()"  value="Guardar Ubicación"/></td></tr>


</table>
</center>
</form>



           </TD> 
          <TD width="800" height="300"> 
    <div id="mapa2">   <!-- contenedor del mapa --> 
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

<div id="enviar"></div> 

</body>
</html>


<!-- http://stackoverflow.com/questions/5968559/retrieve-latitude-and-longitude-of-a-draggable-pin-via-google-maps-api-v3 -->