<?php
//ini_set('display_errors','1');
//error_reporting(E_ALL);

include('conexion.php');

$id_usuario = $_POST['id_usuario'];

$sql="DELETE FROM maps.usuario WHERE id_usuario='$id_usuario'";
$query=pg_query($sql);

if($query){
echo "<script>
alert('Exito al eliminar');
location.href='panelAdmin.php';
</script>";

}else{
echo "<script>alert('Error al eliminar')</script>";
}


?>