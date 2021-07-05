<html> 
<head >       
<title>Inicio</title>    
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">  
 <script src="js/gmaps/gmaps.js"></script>
<script src="js/jquery.js"></script>
<script type="text/javascript"
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2HCweqc36z8ruMHkZCMVrb6reGCSKzao&libraries=geometry">
</script>


<form id="formulario">
<center>
<table width="100%" class="table table-hover">
<tr><th>Name</th><td><input type="text" maxlength="50" class="form-control" name="name" /></td></tr>
<tr><th>Direction</th><td><input type="text"  maxlength="50" class="form-control" name="direction" /></td></tr>
<tr><th>Description</th><td><input type="text" maxlength="50" class="form-control" name="description" /></td></tr>
<tr><th>Telephone</th><td><input type="number" maxlength="50" class="form-control" name="telephone" /></td></tr>
<tr><th>Latitud</th><td><input type="number" maxlength="50" class="form-control" name="latitud" /></td></tr>
<tr><th>Longitud</th><td><input type="number" maxlength="50" class="form-control" name="longitud" /></td></tr>
<tr><th>Tipo de ubicacion</th>
<td><select class="form-control" name="tipo_ubicacion">
	  <option value="1">Empresa</option>
  		<option value="2">Persona natural</option>

</select></td></tr>

<tr><td colspan="2"><input type="button" class="btn btn-primary" onclick="guardar()"  value="Guardar Ubicación"/></td></tr>


</table>
</center>
</form>




<script type="text/javascript">  
function guardar(){
var datos=$("#formulario").serialize();         
$.post("guardardatosubicacion.php",datos,function(data) {  
$("#enviar").html(data); 
});
}


</script>


<div id="enviar"></div> 


</body>
</html>