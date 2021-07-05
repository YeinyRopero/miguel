<?php
ini_set('display_errors','1');
error_reporting(E_ALL);

	include ('conexion.php');

	$id_usuario = $_POST["id_usuario"];
	$username = $_POST["username"];
	$password = $_POST["password"];
	$name_usuario = $_POST["name_usuario"];	
	$last_name = $_POST["last_name"];
	$direction = $_POST["direction"];
	$telephone = $_POST["telephone"];
	$email = $_POST["email"];

$sql="update  maps.usuario set username='".$username."',password='".$password."',name_usuario='".$name_usuario."'  
,last_name='".$last_name."',direction='".$direction."',telephone='".$telephone."',email='".$email."'where id_usuario='".$id_usuario."'";

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