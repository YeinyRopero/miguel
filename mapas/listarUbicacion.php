<html>  
<head>  
<TITLE>Listar usuarios</TITLE>  
 <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
  <script src="js/jquery.js"></script>
</head>  

<body>  

<body>
<h1>Ubicaciones registradas </h1>
<br>

<script type="text/javascript">
        $(document).ready(function () {
            (function ($) {
                $('#filtrar').keyup(function () {
                    var rex = new RegExp($(this).val(), 'i');
                    $('.buscar tr').hide();
                    $('.buscar tr').filter(function () {
                        return rex.test($(this).text());
                    }).show();
                })
            }(jQuery));
        });
      </script>    

 <div class="input-group"> <span class="input-group-addon">Buscar</span>
    <input id="filtrar" type="text" class="form-control" placeholder="Ingresa el nombre de la ubicación que deseas Buscar...">
  </div>
<br>

<div align='center'>  
<table width="100%" class="table table-hover ">
<th> Id </th>
<th> Name</th>
<th> Telephone</th>
<th> Description</th>
<th> Tipo de Ubicacion</th>
<th> Latitud</th>
<th> Longitud</th>
<th> Vendedor</th>
<th> Acciones</th></tr>
<tbody class="buscar">

<?php 
ini_set('display_errors','1');
error_reporting(E_ALL);

include ('conexion.php');

$sql="SELECT * FROM maps.ubicacion u, maps.perfil_ubicacion p, maps.usuario us
      WHERE u.tipo_ubicacion=p.tipo_ubicacion 
      and u.id_usuario=us.id_usuario";
      
$query=pg_query($sql);
$total = pg_num_rows($query);


if($total>0){
  for ($i = 0;$i<$total; $i++){

    $arreglo = pg_fetch_array($query);

    echo "<tr><td>".$arreglo['id_ubicacion']."</td>
          <td>".$arreglo['name']."</td>
          <td>".$arreglo['telephone']."</td>
          <td>".$arreglo['description']."</td>
          <td>".$arreglo['descripcion']."</td>
          <td>".$arreglo['latitud']."</td>
          <td>".$arreglo['longitud']."</td>
          <td>".$arreglo['name_usuario']."</td>
          <td><a onclick='eliminar(".$arreglo['id_ubicacion'].")'> Eliminar </a>
          <a onclick='modificar(".$arreglo['id_ubicacion'].")'> Modificar</a></td>
        </tr>";

  }
}
?>


<script >
function eliminar(id){
$.post( "eliminarUbicacion.php",{'id_ubicacion':id}, function( data ) {
  $( "#datosAEnviar" ).html( data );
});
}

function modificar(id){
$.post( "modificarUbicacion.php",{'id_ubicacion':id}, function( data ) {
  $( "#panelAdmin" ).html( data );
});
}
</script>

<div id="datosAEnviar"></div>

</tbody>
</table>
</center>
</div>  
</body>  

</html> 