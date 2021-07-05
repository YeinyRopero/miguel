<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
<script src="bootstrap/js/bootstrap.min.js"></script>



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
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="panelAdmin.php">Home</a></li>
        
  
			 <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usuario <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#listarUsuario" onclick="listarUsuario()">Listar</a></li>
                <li><a href="#agregarUsuario" onclick="agregarUsuario()">Insertar</a></li>
              </ul>
            </li>


 			<li class="dropdown">
              <a href="#" class="dropdown-toggle"  data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Ubicación <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#listarUbicacion" onclick="listarUbicacion()">Listar</a></li>
                <li><a href="#agregarUbicacion" onclick="agregarUbicacion()">Insertar</a></li>
              </ul>
            </li>


            <li><a href="#" data-toggle="modal"  data-target=".bs-example-modal-sm">About</a></li>


            </ul>

             <ul class="nav navbar-nav navbar-right">
                <li><a href="cerrar.php">Salir</a></li>
            </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>



<!--Se encarga de mostrar el mensaje flotante al presionar el boton "about" -->
    
    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <center>
     <p><h3> Geolocalización empresarial </h3><br>

      1.1<br><br>

    Creado por<br><br>

    Yeiny Marcela <br>
    Miguel Bayona <br>

     </p>

    </center>
    </div>
  </div>
</div>