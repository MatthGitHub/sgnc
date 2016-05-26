<?php
include('config.php');
if($_SESSION["logeado"] != "SI"){
	header ("Location: index.php");
	exit;
}
$link = mysqli_connect($dbhost, $dbusername, $dbuserpass);
mysqli_select_db($link,$dbname) or die('No se puede seleccionar la base de datos');

$query = mysqli_query($link,"SELECT * FROM escribanos") or die ('No hay delegaciones');


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema Gestor Bariloche</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <style type="text/css">
  body{background: #000;}
  </style>
  <body>
    <br>
        <div class="container">
					<!-- Static navbar -->
					<div class="navbar navbar-default" role="navigation">
					<div class="container-fluid">
					  <div class="navbar-header">
					    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					      <span class="sr-only">Toggle navigation</span>
					      <span class="icon-bar"></span>
					      <span class="icon-bar"></span>
					      <span class="icon-bar"></span>
					    </button>
					    <a class="navbar-brand" href="#">Bienvenido </a>
					  </div>
					  <div class="navbar-collapse collapse">
					    <ul class="nav nav-tabs">
					      <li><a href="inicio.php">Inicio</a></li>
								<li class ="active"><a href="#"> RPI </a></li>
								<li><a href=""> Catastro </a></li>
								<li><a href=""> Rentas </a></li>
								<li><a href=""> Municipalidad </a></li>
								<li><a href=""> Aguas </a></li>
								<li><a href=""> Expensas </a></li>
					    <ul class="nav navbar-nav navbar-right">
					       <li><a href=""> <?php echo $_SESSION["s_username"]; ?> </a></li>
					       <li><a href="">Fecha:
					        <?php
					        // Establecer la zona horaria predeterminada a usar. Disponible desde PHP 5.1
					        date_default_timezone_set('UTC');
					        //Imprimimos la fecha actual dandole un formato
					        echo date("d / m / Y");
					        ?></a></li>
					      <li><a href="cerrar.php">Salir</a></li>
					    </ul>
					  </div><!--/.nav-collapse -->
					</div><!--/.container-fluid -->
					</div>
      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h2>Registro de la propiedad de inmuebles</h2>
					<ul class="nav nav-tabs">
						<?php while($escribanos= mysqli_fetch_array($query)){ ?>
						<li><a href="inicio.php"><button type="button" class="btn btn-warning"><?php echo $escribanos['nroRegistro']; ?></button></a></li>
						<?php } ?>
					</ul>
      </div>

    </div> <!-- /container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <p align="center"> by M. Benditti. </p>
  </body>
</html>
