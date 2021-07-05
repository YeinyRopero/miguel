<html>

<head >       
<title>Inicio</title>    
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">  
<script src="js/jquery.js"></script> 

<?php

include('conexion.php');

$sql="SELECT * FROM maps.perfil_usuario  order by id_perfil desc";
$query=pg_query($sql);
$total = pg_num_rows($query);
  
?>

</head>

<body>
<h1>Agregar nuevos usuarios </h1>
<br>

<form id="formulario">
<center>
<table width="100%" class="table table-hover">
<tr><th>Username</th><td><input type="text" maxlength="50" class="form-control" name="username"/></td></tr>
<tr><th>Password</th><td><input type="text" maxlength="50" class="form-control" name="password"/></td></tr>
<tr><th>Name</th><td><input  type="text" maxlength="50" class="form-control" name="name_usuario"/></td></tr>
<tr><th>Last Name</th><td><input type="text" maxlength="50" class="form-control" name="lastname"/></td></tr>
<tr><th>Direction</th><td><input type="text" maxlength="50" class="form-control" name="direction"/></td></tr>
<tr><th>Telephone</th><td><input type="number" class="form-control" maxlength="50" name="telephone"/></td></tr>
<tr><th>Email</th><td><input type="email" class="form-control" maxlength="50" name="email"/></td></tr>


<tr><th>Tipo de usuario</th>
<td><select class="form-control" name="tipo_usuario">
	<?php 
	if($total>0){
		for ($i = 0;$i<$total; $i++){
    $arreglo = pg_fetch_array($query);
    ?>
    <option value="<?php echo "$arreglo[id_perfil]"; ?>"><?php echo "$arreglo[descripcion]"; ?></option>
<?php
} //cierro for
} //cieroo if
?>

</select></td></tr>

<tr><td colspan="2"><input type="button" class="btn btn-primary" onclick="guardar()"  value="Guardar Usuario"/></td></tr>


</table>
</center>
</form>






	<script>
	function guardar(){
	var datos=$("#formulario").serialize();
	$.post( "guardardatosusuarios.php",datos, function( data ) {
 	$( "#enviar" ).html( data );
	});
	}
	</script>

	<div id="enviar"></div>



</body>
</html>