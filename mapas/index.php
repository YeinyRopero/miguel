<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <title>Ingresar</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.js"></script>





</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Geolocalización Empresarial</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right" id="formulario">
            <div class="form-group">
              <input type="text" name="usuario" placeholder="Username" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" name="clave" placeholder="Password" class="form-control">
            </div>
            <button type="button" onclick="enviar()" class="btn btn-success">Sign in</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>





    <script src="js/jquery.js"></script>

<script>
function enviar(){
var datos=$("#formulario").serialize();
$.post( "validar.php",datos, function( data ) {
  $( "#enviar" ).html( data );
});
}
</script>

<div id="enviar"></div>





        </td>
      </tr>
</div>
  </table>



</body>
</html>


