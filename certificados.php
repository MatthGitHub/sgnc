<?php
include('config.php');
if($_SESSION["logeado"] != "SI"){
	header ("Location: index.php");
	exit;
}
$delegacion = $_GET['deleg'];
$nroRegistro = $_GET['nroRegistro'];


$link = mysqli_connect($dbhost, $dbusername, $dbuserpass);
mysqli_select_db($link,$dbname) or die('No se puede seleccionar la base de datos');
//Busco todos los escribanos
$query = mysqli_query($link,"SELECT * FROM escribanos") or die ('No hay delegaciones');

// Busco el escribano --------------------------------------------------------------------------------------------------------------
$escribano = mysqli_query($link,"SELECT CONCAT(nombre,' ',apellido) AS nombre FROM escribanos WHERE nroRegistro = $nroRegistro");
$escribano = mysqli_fetch_array($escribano);
$escribano = $escribano['nombre'];


// Busco todos los certificados que corresponen al nro de registro y a la delegacion
$certificados = mysqli_query($link,"SELECT c.idCertificados,c.nomenclatura,tc.descripcion,c.fechaEntrada,c.fechaSalida,c.vencimiento,c.numEntrada,u.descripcion AS urgencia,c.observaciones,c.libreDeuda
																		FROM certificados c
																		JOIN tiposCertificados tc ON c.idTipoCertificado = tc.idTipoCertificado
																		JOIN delegaciones d on tc.iDelegacion = d.iDelegacion
																		JOIN urgencias u ON c.idUrgencia = u.idUrgencia
																		WHERE d.nombre = '$delegacion' AND c.nroRegistro = $nroRegistro");

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
								<?php if($delegacion == 'RPI'){ ?>
										<li class ="active"><a href="#"> RPI </a></li>
										<li><a href="grilla_escribanos.php?deleg=Catastro"> Catastro </a></li>
										<li><a href="grilla_escribanos.php?deleg=Rentas"> Rentas </a></li>
										<li><a href="grilla_escribanos.php?deleg=Municipalidad"> Municipalidad </a></li>
										<li><a href="grilla_escribanos.php?deleg=Aguas"> Aguas </a></li>
										<li><a href="grilla_escribanos.php?deleg=Expensas"> Expensas </a></li>
								<?php }
								if($delegacion == 'Catastro'){ ?>
									<li><a href="grilla_escribanos.php?deleg=RPI"> RPI </a></li>
									<li class ="active"><a href="#"> Catastro </a></li>
									<li><a href="grilla_escribanos.php?deleg=Rentas"> Rentas </a></li>
									<li><a href="grilla_escribanos.php?deleg=Municipalidad"> Municipalidad </a></li>
									<li><a href="grilla_escribanos.php?deleg=Expensas"> Aguas </a></li>
									<li><a href="grilla_escribanos.php?deleg=Expensas"> Expensas </a></li>
								<?php }
								if($delegacion == 'Rentas'){ ?>
									<li><a href="grilla_escribanos.php?deleg=RPI"> RPI </a></li>
									<li><a href="grilla_escribanos.php?deleg=Catastro"> Catastro </a></li>
									<li class ="active"><a href="#"> Rentas </a></li>
									<li><a href="grilla_escribanos.php?deleg=Municipalidad"> Municipalidad </a></li>
									<li><a href="grilla_escribanos.php?deleg=Aguas"> Aguas </a></li>
									<li><a href="grilla_escribanos.php?deleg=Expensas"> Expensas </a></li>
								<?php }
								if($delegacion == 'Municipalidad'){ ?>
									<li><a href="grilla_escribanos.php?deleg=RPI"> RPI </a></li>
									<li><a href="grilla_escribanos.php?deleg=Catastro"> Catastro </a></li>
									<li><a href="grilla_escribanos.php?deleg=Rentas"> Rentas </a></li>
									<li class ="active"><a href="#"> Municipalidad </a></li>
									<li><a href="grilla_escribanos.php?deleg=Aguas"> Aguas </a></li>
									<li><a href="grilla_escribanos.php?deleg=Expensas"> Expensas </a></li>
								<?php }
								if($delegacion == 'Aguas'){ ?>
									<li><a href="grilla_escribanos.php?deleg=RPI"> RPI </a></li>
									<li><a href="grilla_escribanos.php?deleg=Catastro"> Catastro </a></li>
									<li><a href="grilla_escribanos.php?deleg=Rentas"> Rentas </a></li>
									<li><a href="grilla_escribanos.php?deleg=Municipalidad"> Municipalidad </a></li>
									<li class ="active"><a href="#"> Aguas </a></li>
									<li><a href="grilla_escribanos.php?deleg=Expensas"> Expensas </a></li>
								<?php }
								if($delegacion == 'Expensas'){ ?>
									<li><a href="grilla_escribanos.php?deleg=RPI"> RPI </a></li>
									<li><a href="grilla_escribanos.php?deleg=Catastro"> Catastro </a></li>
									<li><a href="grilla_escribanos.php?deleg=Rentas"> Rentas </a></li>
									<li><a href="grilla_escribanos.php?deleg=muni"> Municipalidad </a></li>
									<li><a href="grilla_escribanos.php?deleg=Aguas"> Aguas </a></li>
									<li class ="active"><a href="#"> Expensas </a></li>
								<?php } ?>

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
				<div class="row">
					<h3> <?php echo $delegacion." - ".$escribano; ?> </h3>
				              <table class="table table-hover">
				                	<thead>
				                    		<th> Nomenclatura </th>
				                        <th> escribano </th>
				                        <th> Tipo Certificado </th>
				                        <th> Fecha entrada </th>
																<th> Fecha Salida </th>
																<th> Vencimiento </th>
																<th> N° de Entrada </th>
																<th> Urgencia </th>
																<th> Observaciones </th>
																<th> Libre de Deuda </th>
				                        <?php if($_SESSION["permiso"] == 1) {?> <th> Eliminar </th> <?php }?>

				                    </thead>
				                    <tbody>
				                    	<?php while($certificadosArray = mysqli_fetch_array($certificados)){ ?>
				                        <tr class="success">
				                            <td> <?php echo $certificadosArray['nomenclatura']; ?> </td>
				                            <td> <?php echo $certificadosArray['nroRegistro']; ?> </td>
				                            <td> <?php echo $certificadosArray['descripcion']; ?> </td>
				                            <td> <?php echo $certificadosArray['fechaEntrada']; ?> </td>
																		<td> <?php echo $certificadosArray['fechaSalida']; ?> </td>
																		<td> <?php echo $certificadosArray['vencimiento']; ?> </td>
																		<td> <?php echo $certificadosArray['numEntrada']; ?> </td>
																		<td> <?php echo $certificadosArray['urgencia']; ?> </td>
																		<td> <?php echo $certificadosArray['observaciones']; ?> </td>
																		<td> <?php echo $certificadosArray['libreDeuda']; ?> </td>
				                            <?php if($_SESSION["permiso"] == 1) {?>
				                            <td>  <a href="eliminar.php?id=<?php echo $cliente['idCliente'];?>&tipo=cliente " role="button"  class="btn btn-danger btn-primary btn-block"> Eliminar </a></td>
											<?php }?>

				                        </tr>
				                        <?php } ?>
				                    </tbody>
								</table>

				</div>
      </div>

    </div> <!-- /container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <p align="center"> by M. Benditti. </p>
  </body>
</html>
