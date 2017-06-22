<?php
include('../inc/config.php');
include('../inc/validar.php');
// Conectar a la base de datos
$link = mysqli_connect ($dbhost, $dbusername, $dbuserpass);
mysqli_select_db($link,$dbname) or die('No se puede seleccionar la base de datos');
$query = mysqli_query($link,"SELECT * FROM delegaciones") or die(mysqli_error());


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
                        <th> Ubicacion </th>
                        <th> Observacion </th>
                  </thead>
                    <tbody>
                    	<?php while($delegacion = mysqli_fetch_array($query)){ ?>
                        <tr class="success">
                            <td> <?php echo $delegacion['nombre']; ?> </td>
                            <td> <?php echo $delegacion['ubicacion']; ?> </td>
                            <td> <?php echo $delegacion['observacion']; ?> </td>
                        </tr>
                        <?php } ?>
                    </tbody>
				</table>
        </div>
      </div>

    </div> <!-- /container -->
  </body>
</html>
