<html>  
<head>  
<TITLE>Listar usuarios</TITLE>  
 <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
  <script src="js/jquery.js"></script>
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">


</head>  

<h1>Usuarios registrados </h1>
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
    <input id="filtrar" type="text" class="form-control" placeholder="Ingresa el nombre del usuario que deseas Buscar...">
  </div>
<br>


<body>  
<div align='center'>  
<table width="100%" class="table table-hover">
<th> ID </th><th> Username</th><th> Password</th><th> Name</th><th> Last Name</th><th> Direction</th>
<th> Telephone</th><th> Email</th><th>Tipo perfil</th><th> Acciones</th></tr>
<tbody class="buscar">

<?php 

include ('conexion.php');

$sql="SELECT * FROM maps.usuario u, maps.perfil_usuario p 
      Where u.id_perfil = p.id_perfil";

$query=pg_query($sql);
$total = pg_num_rows($query);


if($total>0){
  for ($i = 0;$i<$total; $i++){

    $arreglo = pg_fetch_array($query);

    echo "<tr><td>".$arreglo['id_usuario']."</td>
          <td>".$arreglo['username']."</td>
          <td>".$arreglo['password']."</td>
          <td>".$arreglo['name_usuario']."</td>
          <td>".$arreglo['last_name']."</td>
          <td>".$arreglo['direction']."</td>
          <td>".$arreglo['telephone']."</td>
          <td>".$arreglo['email']."</td>
          <td>".$arreglo['descripcion']."</td>
          <td><a onclick='eliminar(".$arreglo['id_usuario'].")'> Eliminar </a>
          <a onclick='modificar(".$arreglo['id_usuario'].")'> Modificar</a></td>
        </tr>";

  }
}
?>


<script >
function eliminar(id){
$.post( "eliminarUsuario.php",{'id_usuario':id}, function( data ) {
  $( "#datosAEnviar" ).html( data );
});
}

function modificar(id){
$.post( "modificarUsuario.php",{'id_usuario':id}, function( data ) {
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