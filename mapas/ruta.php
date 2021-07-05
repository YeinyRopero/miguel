<?php 
include ('conexion.php'); 
?>


<div class="container">
  <div class="starter-template">



<form method="post">
  <table class="table">
    <tr>

    <td>Origen:</td>

    <td>
<select class="form-control" name="origen">

  <?php 


$sql="SELECT * FROM maps.ubicacion where id_usuario='$id_usuario'  order by id_ubicacion desc";
$query=pg_query($sql);
$total = pg_num_rows($query);

  if($total>0){
    for ($i = 0;$i<$total; $i++){
    $arreglo1 = pg_fetch_array($query);

    ?>
    <option value="<?php echo "$arreglo1[id_ubicacion]"; ?>"> <?php echo "$arreglo1[name]"; ?> </option>
<?php

} //cierro for
} //cieroo if
?>
</select>


    </td>




<td>Llegada:</td>


    <td>
<select class="form-control" name="llegada">

  <?php 
$sql="SELECT * FROM maps.ubicacion where id_usuario='$id_usuario'";
$query=pg_query($sql);
$total = pg_num_rows($query);

  if($total>0){
    for ($i = 0;$i<$total; $i++){
    $arreglo2 = pg_fetch_array($query);

    ?>
    <option value="<?php echo "$arreglo2[id_ubicacion]"; ?>"> <?php echo "$arreglo2[name]"; ?> </option>
<?php
} //cierro for
} //cieroo if
?>
</select>
    </td>


<td>
  <input type="submit" class="btn btn-primary"  value="Mostrar Ruta"/>
</td>
</tr>
  </table>




</form>

  </div>
</div>
