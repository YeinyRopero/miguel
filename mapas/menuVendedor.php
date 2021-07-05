<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
<script src="bootstrap/js/bootstrap.min.js"></script>

 <?php $id_usuario = $_GET['id_usuario']; ?>


<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-3">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="panelVendedor.php?id_usuario=<?php echo $id_usuario?>">Geolocalización empresarial - panel vendedor</a>
        </div>
    
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse-3">
          <ul class="nav navbar-nav navbar-right">

            <li><a class="btn btn-default btn-outline btn-circle collapsed"  data-toggle="collapse" href="#nav-collapse3" aria-expanded="false" aria-controls="nav-collapse3">Buscar</a></li>
            <li><a href="#agregarUbicacionVendedor" onclick="agregarUbicacionVendedor()">Agregar ubicación</a></li>
            <li><a href="#" data-toggle="modal" data-target=".bs-example-modal-sm">Información</a></li>
            <li><a href="http://127.0.0.1:8080/mapas/">Salir</a></li>

           
          </ul>
          <div class="collapse nav navbar-nav nav-collapse slide-down" id="nav-collapse3">
            <form class="navbar-form navbar-right"  method="post" action="panelVendedor.php?id_usuario=<?php echo $id_usuario?>">
              <div class="form-group">
                <input type="text"  name="filtrar"  class="form-control" placeholder="Buscar" /> 
              </div>
              <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button> 
            </form>
          </div>

        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->



    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
    	<center>
     <p><h3> Geolocalización empresarial </h3><br>

     	Versión 1.1<br><br>

		Creado por<br><br>

		Yeiny Marcela <br>
		Miguel Bayona <br>

     </p>



		</center>
    </div>
  </div>
</div>


