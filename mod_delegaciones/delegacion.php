<?php
include('../inc/config.php');
include('../inc/validar.php');

$idDelegacion = $_GET['idDelegacion'];
// Conectar a la base de datos
$link = mysqli_connect ($dbhost, $dbusername, $dbuserpass);
mysqli_select_db($link,$dbname) or die('No se puede seleccionar la base de datos');
$sql = "SELECT nombre FROM delegaciones WHERE idDelegacion = $idDelegacion";
$stmt = mysqli_query($link,$sql);
$nombre = mysqli_fetch_array($stmt);
$nombre = $nombre['nombre'];


$query = mysqli_query($link,"SELECT idTramite,fecha,recargo,c.nombre+' '+c.apellido AS cliente,tt.nombre AS tramite,observacion
                              FROM tramites t JOIN tipostramites tt ON t.fkTipoTramite = tt.idTipoTramite
                              JOIN clientes c ON c.idCliente = t.fkCliente
                              WHERE tt.fkDelegacion = $idDelegacion") or die(mysqli_error($link));


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Delegaciones </title>

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
<div class="row"><h3> <?php echo $nombre; ?></h3>
              <table class="table table-hover">
                	<thead>
                    	<th> Numero de tramite </th>
                      <th> Fecha </th>
          						<th> Recargo </th>
          						<th> Cliente </th>
                      <th> Tramite </th>
                      <th> Observacion </th>
                      <th> Detalle </th>
                    </thead>
                    <tbody>
                    	<?php while($lotes = mysqli_fetch_array($query)){ ?>
                        <tr class="success">
                            <td> <?php echo $lotes['idTramite']; ?> </td>
                            <td> <?php echo $lotes['fecha']; ?> </td>
	                          <td> <?php echo $lotes['cliente']; ?> </td>
                            <td> <?php echo $lotes['tramite']; ?> </td>
                            <td> <?php echo $lotes['observacion']; ?> </td>
                            <td> <button type="submit" id="idTicket" name="idTicket" class="btn btn-sm btn-primary"  onclick="location.href='detalle_ticket_responder.php?idTicket=<?php echo $tickets['id_ticket']; ?>';"><i class="fa fa-address-book-o fa-fw"></i></button> </td>
                        </tr>
                        <?php } ?>
                    </tbody>
				</table>

</div>
      </div>

    </div> <!-- /container -->

  </body>
</html>
