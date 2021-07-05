<!doctype html> 
<html>
<head>
  <meta charset="UFT-8">
  <title>Geolocalización empresarial</title>
  
<script src="js/gmaps/gmaps.js"></script>
<script src="js/jquery.js"></script>
<script type="text/javascript"
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2HCweqc36z8ruMHkZCMVrb6reGCSKzao&libraries=geometry">
</script>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="bootstrap/js/bootstrap.min.js">


  <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #mapa {/*estlos del mapa*/
        height: 80%;
        width: 80%;
        margin: 0 auto;     
      }
      #header{/*estlos de la cabeza*/
        height: 10%;
      }

    </style>


</head>
<body>
  <div id="header">
        <?php include('menuVendedor.php'); ?> <!--Incluimos el menu-->
  </div>



<div id="mapa"></div> <!-- contiene el mapa -->

<div>
    <?php include('ruta.php'); ?> <!-- incluimos lista desplegables de llegada y origen -->
</div>

<script type="text/javascript">
$(document).ready(function(){ /*leiamos la funcion con al palabra reservada document*/
 map = new GMaps({ /*instanciamos una funcion reservada en archivo descargado*/
    div: '#mapa',
    lat: 8.2333, /*parametros donde va a estar ubicado ocaña en el mapa*/
    lng: -73.3500,
  });
}); //cierre funcion

function agregarUbicacionVendedor(){
  <?php $id_usuario = $_GET['id_usuario']; ?> //capturamos el id_usuario
  $("#mapa").load("agregarUbicacionVendedor.php?id_usuario=<?php echo $id_usuario?>");
}  
</script>






<?php 

include ('conexion.php');

$id_usuario = $_GET['id_usuario']; //capturamos el id_usuario que viene de validar

if($_POST['filtrar']){ 
  $filtrar = $_POST["filtrar"];
  $sql="SELECT * FROM maps.ubicacion where id_usuario='$id_usuario' and name like '%".$filtrar."%'";
  }else{
   $sql="SELECT * FROM maps.ubicacion where id_usuario='$id_usuario'";
}

$query=pg_query($sql);
$total = pg_num_rows($query);

if($total>0){
for ($i =0;   $i< $total;    $i++){ 
 
 $arreglo = pg_fetch_array($query);
  $name = $arreglo["name"];
  $tel = $arreglo["telephone"];
  $dir = $arreglo["direction"];
  $des = $arreglo["description"];

?>

<script type="text/javascript">
 $(document).ready(function(){ // imprimimos los marcadores
  map.addMarker({
  lat: <?php echo "$arreglo[latitud]"; ?>, //imprimimos latitud en cada vuelta del ciclo
  lng: <?php echo "$arreglo[longitud]"; ?>, // imprimimos longitud en cada vuelta del ciclo
  title: 'Yeiny',
  infoWindow: {
  content: '<p><br><b><?php echo "$name";?></b><hr><br><b>Telefono:</b> <?php echo "$tel";?><br><b>Dirección:</b> <?php echo "$dir";?><br><b>Descripcion:</b> <?php echo "$des";?></p>'
} // cierre del la ventana donde se muestra informacion
}); // cierre del marcador

 }); // cierre de la funcion
  </script>
<?php 
} // cierre del ciclo

}else{ 
  echo "<script>
alert('No existe la ubicación');
location.href='panelVendedor.php?id_usuario=$id_usuario';
</script>";
} //cierre del if
?>







<?php 
if($_POST['origen'] and $_POST['llegada']){ 

$origen = $_POST["origen"];
$llegada = $_POST["llegada"];

  $sql="SELECT * FROM maps.ubicacion where id_usuario='$id_usuario' and id_ubicacion='$origen'";
  $query=pg_query($sql);
  $origen = pg_fetch_array($query);


  $sql="SELECT * FROM maps.ubicacion where id_usuario='$id_usuario' and id_ubicacion='$llegada'";
  $query=pg_query($sql);
  $llegada = pg_fetch_array($query);


  ?>
<script type="text/javascript">
 $(document).ready(function(){ // imprimimos la ruta
map.drawRoute({ 
  origin: [<?php echo "$origen[latitud]"; ?>, <?php echo "$origen[longitud]"; ?> ],
  destination: [<?php echo "$llegada[latitud]"; ?>, <?php echo "$llegada[longitud]"; ?>],
  travelMode: 'driving',
  strokeColor: '#131540',
  strokeOpacity: 0.6,
  strokeWeight: 6
});

}); // cierre de la funcion

</script>
<?php 
} 
?>

</body>
</html>

