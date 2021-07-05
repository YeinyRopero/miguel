<h1>Modificar datos del usuario</h1>
<br>


<?php
ini_set('display_errors','1');
error_reporting(E_ALL);

include('conexion.php');

$id_usuario = $_POST['id_usuario'];



$sql="SELECT * FROM maps.usuario WHERE id_usuario='$id_usuario'";

$query=pg_query($sql);
$total = pg_num_rows($query);
$arreglo = pg_fetch_array($query);

?>
<form id="modificar">
<center>
<table width="100%" class="table table-hover">
<tr><th>Id del usuario</th><td><input name="id_usuario" class="form-control"  value="<?php echo $id_usuario;?>"/></td>
</tr>
<tr><th>Username</th><td><input  name="username" class="form-control" maxlength="50" value="<?php echo $arreglo['username'];?>"/></td></tr>
<tr><th>Password</th><td><input  name="password" class="form-control" maxlength="50" value="<?php echo $arreglo['password'];?>"/></td></tr>
<tr><th>Name</th><td><input  name="name_usuario" class="form-control" maxlength="50" value="<?php echo $arreglo['name_usuario'];?>"/></td></tr>
<tr><th>Last name</th><td><input  name="last_name" class="form-control" maxlength="50" value="<?php echo $arreglo['last_name'];?>"/></td></tr>
<tr><th>Direction</th><td><input  name="direction" class="form-control" maxlength="50" value="<?php echo $arreglo['direction'];?>"/></td></tr>
<tr><th>Telephone</th><td><input  name="telephone" class="form-control" maxlength="50" value="<?php echo $arreglo['telephone'];?>"/></td></tr>
<tr><th>Email</th><td><input  name="email" class="form-control" maxlength="50" value="<?php echo $arreglo['email'];?>"/></td></tr>






<tr><td colspan="2"><input type="button" class="btn btn-primary" onclick="modifcarGuardar()"  value="Modificar"/></td></tr>





</table>
</center>
</form>

		
<script>
function modifcarGuardar(){
var datos=$('#modificar').serialize();
$.post( "guardarModificarUsuario.php",datos, function( data ) {
  $( "#llega" ).html( data );
});
}</script>

<div id="llega"></div>
