<?php
include('config.php');
include('validar.php');

$link = mysqli_connect ($dbhost, $dbusername, $dbuserpass);
mysqli_select_db($link,$dbname) or die('No se puede seleccionar la base de datos');
$sql = "SELECT idDelegacion,nombre FROM delegaciones";
$stmt = mysqli_query($link,$sql);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema Gestor Bariloche</title>

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
<!-- Static navbar -->
<?php include "menu.php"; ?>
<!-- Main component for a primary marketing message or call to action -->
	<div class="jumbotron">
		<h2><img src="../images/menu.png" alt="Getionate" align="middle" style="margin:0px 0px 0px 0px" height="32" width="32"> Sistema de Gestion </h2>
	<div class="row">
		<p>
			<a class="btn btn-lg btn-info" href="../mod_tramites/frm_nuevo_tramite.php" role="button">Nuevo tramite</a>
		</p>
		<ul class="nav nav-tabs">
		  <li class="active"><a href="#">Delegaciones</a></li>
			<?php while($delegacion = mysqli_fetch_array($stmt)){ ?>
		  <li><a href="../mod_tramites/tramites.php?idDelegacion=<?php echo $delegacion['idDelegacion']; ?>"><?php echo $delegacion['nombre']; ?></a></li>
			<?php } ?>
		</ul>
	</div>

	</div>
	<div class="panel-footer">
	<p class="text-center">Matias Benditti - matiasbenditti@gmail.com</p>
</div>
</div> <!-- /container -->
  </body>
</html>
