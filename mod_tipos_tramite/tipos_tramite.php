<?php
include('../inc/config.php');
include('../inc/validar.php');

// Conectar a la base de datos
$link = mysqli_connect ($dbhost, $dbusername, $dbuserpass);
mysqli_select_db($link,$dbname) or die('No se puede seleccionar la base de datos');
$query = mysqli_query($link,"SELECT tt.nombre as nombre,tt.descripcion,tt.costo,d.nombre as delegacion FROM tipostramites tt JOIN delegaciones d ON tt.fkDelegacion = d.idDelegacion") or die(mysqli_error($link));


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Tipos tramites </title>

    <!-- Bootstrap -->
		<script src="../js/jquery-1.12.3.js"></script>
		<link href="../css/bootstrap.css" rel="stylesheet">

  </head>
  <style type="text/css">
	body{background: #310000;}
	</style>
  <body>
    <br>
    <div class="container">
        <?php include("../inc/menu.php"); ?>
      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
<div class="row"><h3> </h3>
              <table class="table table-hover">
                	<thead>
                    	<th> Nombre </th>
                      <th> Descripcion </th>
          						<th> Costo </th>
          						<th> Delegacion </th>
                    </thead>
                    <tbody>
                    	<?php while($lotes = mysqli_fetch_array($query)){ ?>
                        <tr class="success">
                            <td> <?php echo $lotes['nombre']; ?> </td>
                            <td> <?php echo $lotes['descripcion']; ?> </td>
	                          <td> <?php echo $lotes['costo']; ?> </td>
                            <td> <?php echo $lotes['delegacion']; ?> </td>
                        </tr>
                        <?php } ?>
                    </tbody>
				</table>

</div>
      </div>

    </div> <!-- /container -->

  </body>
</html>
