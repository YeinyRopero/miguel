<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <title>Geolocalización empresarial </title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
  


	<script src="js/jquery.js"></script>
   <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #panelAdmin {
        width: 900px; 
        height: 500px;
      }
    </style>

</head>
<?php include('menu.php') ?>

<body>


 


<script>
function agregarUsuario(){
	$("#panelAdmin").load("agregarUsuario.php");
}

function agregarUbicacion(){
	$("#panelAdmin").load("agregarUbicacion.php");
}

function listarUsuario(){
  $("#panelAdmin").load("listarUsuario.php");
}

function listarUbicacion(){
  $("#panelAdmin").load("listarUbicacion.php");
}
</script>



<div class="container">
  <div class="starter-template">



<br><br><br><br>


  <div id="panelAdmin"></div>
  


  </div>
</div>



</body>
</html>





   