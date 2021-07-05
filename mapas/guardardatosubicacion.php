<?php
ini_set('display_errors','1');  
error_reporting(E_ALL);


include ("conexion.php");

if($_POST['name'] and $_POST['direction'] and $_POST['description'] and  $_POST['telephone'] and $_POST['latitud'] and $_POST['longitud'] and $_POST['tipo_ubicacion'] ){


$name = $_POST["name"];
$direction = $_POST["direction"];
$description = $_POST["description"];
$telephone = $_POST["telephone"];
$latitud = $_POST["latitud"];
$longitud = $_POST["longitud"];
$tipo_ubicacion = $_POST["tipo_ubicacion"];
$id_usuario = $_POST["id_usuario"];





$sql="INSERT INTO maps.ubicacion(name,telephone,direction,description,tipo_ubicacion,latitud,longitud,id_usuario) 
VALUES ('$name','$telephone','$direction','$description','$tipo_ubicacion','$latitud','$longitud','$id_usuario');";

$query=pg_query($sql);

if($query){
echo "<script>
alert('Exito al guardar datos');
location.href='panelAdmin.php';
</script>";

}

}
else{
echo "<script>alert('Todos los campos son necesario')</script>";
}



?>