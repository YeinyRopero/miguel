<?php
ini_set('display_errors','1');
error_reporting(E_ALL);

	include ('conexion.php');

	if($_POST['username'] and $_POST['password'] and $_POST['name_usuario'] and  $_POST['lastname'] and $_POST['direction'] and $_POST['telephone'] and $_POST['tipo_usuario'] and $_POST['email']){


	$username = $_POST["username"];
	$password = $_POST["password"];
	$name_usuario = $_POST["name_usuario"];	
	$lastname = $_POST["lastname"];
	$direction = $_POST["direction"];
	$telephone = $_POST["telephone"];
	$email = $_POST["email"];
	$tipo_usuario=$_POST["tipo_usuario"];


$sql = "INSERT INTO maps.usuario(username,password,name_usuario,last_name,direction,telephone,email,id_perfil)
VALUES ('$username','$password','$name_usuario','$lastname','$direction','$telephone','$email','$tipo_usuario');";


$query=pg_query($sql);

if($query){
echo "<script>
alert('Exito al guardar datos');
location.href='panelAdmin.php';
</script>";
}
}else{
echo "<script>alert('Todos los campos son necesario')</script>";
}

?>