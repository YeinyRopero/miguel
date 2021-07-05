
<?php

ini_set('display_errors','1');
error_reporting(E_ALL);

if($_POST["usuario"] and $_POST["clave"]){


$usuario = $_POST["usuario"];
$clave = $_POST["clave"];
	
	include ('conexion.php');

	$sql="SELECT * FROM maps.usuario WHERE username='$usuario' AND password='$clave'";
	$query=pg_query($sql);
	if(pg_num_rows($query)==1){
	$rows=pg_fetch_array($query);
	$id_usuario= $rows["id_usuario"];

	if($rows["id_perfil"]==1){
		echo "<script>location.href='panelAdmin.php';</script>";
	}else if($rows["id_perfil"]==2){
		echo "<script>location.href='panelVendedor.php?id_usuario=$id_usuario';</script>";
	}

	

	}else{
			echo "<script>alert('usuario o contraseña incorrectos');</script>";

	}

}else{

	echo "<script>alert('Todos los campos son Requeridos');</script>";

}
?>

