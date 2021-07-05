<?php
ini_set('display_errors','1');
error_reporting(E_ALL);

	include ('conexion.php');

	$id_ubicacion = $_POST["id_ubicacion"];
	$name = $_POST["name"];
	$telephone = $_POST["telephone"];
	$direction = $_POST["direction"];	
	$description = $_POST["description"];
	$latitud = $_POST["latitud"];
	$longitud = $_POST["longitud"];

	

$sql="update  maps.ubicacion set name='".$name."',telephone='".$telephone."',direction='".$direction."'  
,description='".$description."',latitud='".$latitud."',longitud='".$longitud."' where id_ubicacion='".$id_ubicacion."'";

$query=pg_query($sql);

if($query){
echo "<script>
alert('Exito al modificar');
location.href='panelAdmin.php';
</script>";

}else
{
echo "<script>alert('Error al modificar')</script>";
}

?>