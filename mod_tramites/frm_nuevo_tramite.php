<?php
include('../inc/config.php');
include('../inc/validar.php');

$link = mysqli_connect ($dbhost, $dbusername, $dbuserpass);
mysqli_select_db($link,$dbname) or die('No se puede seleccionar la base de datos');

$sql = "SELECT * FROM tipostramites";
$tipostramites = mysqli_query($link,$sql);

$sql = "SELECT * FROM clientes";
$clientes = mysqli_query($link,$sql);


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nuevo tramite</title>

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
          <?php include('../inc/menu.php'); ?>
      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">


<div class="container">
	<form name="form1" method="post" action="insertar_proveedor.php">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h5 class="text-center">Nuevo tramite</h5>
                    <form class="form form-signup" role="form">

                      <div class="form-group">
                          <span class="input-group-addon"><i class="fa fa-id-card-o fa-fw"></i> Tipo </span>
                          <div class="col-xs-15 selectContainer">
                              <select class="form-control" id="tipoDoc" name="tipoDoc">
                                  <?php while($tipo = mysqli_fetch_array($tipostramites)){ ?>
                                  <option value=<?php echo $tipo['idTipoTramite']; ?>><?php echo $tipo['nombre']; ?></option>
                                  <?php } ?>
                              </select>
                          </div>
                      </div>

                      <div class="form-group">
                          <span class="input-group-addon"><i class="fa fa-id-card-o fa-fw"></i> Cliente </span>
                          <div class="col-xs-15 selectContainer">
                              <select class="form-control" id="tipoDoc" name="tipoDoc">
                                  <?php while($cliente = mysqli_fetch_array($clientes)){ ?>
                                  <option value=<?php echo $cliente['idCliente']; ?>><?php echo $cliente['nombre']; ?></option>
                                  <?php } ?>
                              </select>
                          </div>
                      </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-home"></span>
                            </span>
                            <input name="direccion" type="text" id="direccion" class="form-control" placeholder="Direccion" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span>
                            </span>
                            <input name="telefono" type="text" id="telefono" class="form-control" placeholder="Telefono" />
                        </div>
                    </div>

                </div>
                <input type="submit" name="Submit" value="Registrar"  class="btn btn-sm btn-primary btn-block">
 </form>
            </div>
                     <?php
if(isset($_GET['sucess'])){
echo "
<div class='alert alert-success-alt alert-dismissable'>
                <span class='glyphicon glyphicon-certificate'></span>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
                    ×</button>Listo! Tu registro fue hecho satisfactoriamente.</div>
";
}else{
echo "";
}
?>
<?php
if(isset($_GET['errordat'])){
echo "
<div class='alert alert-warning-alt alert-dismissable'>
                <span class='glyphicon glyphicon-certificate'></span>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
                    ×</button>Ha habido un error al insertar los valores.</div>
";
}else{
echo "";
}
?>
<?php
if(isset($_GET['errordb'])){
echo "
<div class='alert alert-danger-alt alert-dismissable'>
                <span class='glyphicon glyphicon-certificate'></span>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
                    ×</button>Error, no ha introducido todos los datos.</div>
";
}else{
echo "";
}
?>
        </div>
    </div>
</div>
</form>
</div>



      </div>

    </div> <!-- /container -->
  </body>
</html>
