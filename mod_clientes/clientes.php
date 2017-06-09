<?php
include('../inc/config.php');
include('../inc/validar.php');
// Conectar a la base de datos
$link = mysqli_connect ($dbhost, $dbusername, $dbuserpass);
mysqli_select_db($link,$dbname) or die('No se puede seleccionar la base de datos');
$query = mysqli_query($link,"SELECT * FROM clientes c JOIN tiposclientes tc ON c.fkTipoCliente = tc.idTipoCliente") or die(mysqli_error());


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clientes</title>

    <!-- Bootstrap -->
    <script src="../js/jquery-1.12.3.js"></script>
    <link href="../css/bootstrap.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <style type="text/css">
  body{background: #310000;}
  </style>
  <body>
    <br>
        <div class="container">
          <?php include('../inc/menu.php'); ?>

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <div class="row">
              <table class="table table-hover">
                	<thead>
                  	    <th> Nombre </th>
                        <th> Apellido </th>
                        <th> Documento </th>
                        <th> Registro </th>
                        <th> Tipo </th>
                        <th> Correo </th>
                        <th> Telefono </th>
                  </thead>
                    <tbody>
                    	<?php while($cliente = mysqli_fetch_array($query)){ ?>
                        <tr class="success">
                            <td> <?php echo $cliente['nombre']; ?> </td>
                            <td> <?php echo $cliente['apellido']; ?> </td>
                            <td> <?php echo $cliente['documento']; ?> </td>
                            <td> <?php echo $cliente['registro']; ?> </td>
                            <td> <?php echo $cliente['descripcion']; ?> </td>
                            <td> <?php echo $cliente['correo']; ?> </td>
                            <td> <?php echo $cliente['telefono']; ?> </td>
                        </tr>
                        <?php } ?>
                    </tbody>
				</table>
        </div>
      </div>

    </div> <!-- /container -->
  </body>
</html>
