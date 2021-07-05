<?php
//ini_set('display_errors','1');
//error_reporting(E_ALL);

include('conexion.php');

$id_ubicacion = $_POST['id_ubicacion'];

$sql="DELETE FROM maps.ubicacion WHERE id_ubicacion='$id_ubicacion'";
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