<?php
include('../inc/config.php');
include('../inc/validar.php');

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nueva delegacion</title>

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
	<form name="form1" method="post" action="nueva_delegacion.php">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h5 class="text-center">Nueva delegacion</h5>
                    <form class="form form-signup" role="form">

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="fa fa-user-circle-o" aria-hidden="true"></span>
                            </span>
                            <input name="nombre" type="text" id="nombre" class="form-control" placeholder="Nombre" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="fa fa-user-circle-o" aria-hidden="true"></span>
                            </span>
                            <input name="ubicacion" type="text" id="ubicacion" class="form-control" placeholder="Ubicacion" />
                        </div>
                    </div>

                    <div class="form-group">
                       <label for="comment">Observacion:</label>
                       <textarea class="form-control" rows="5" id="observacion" name="observacion"></textarea>
                  </div>

                </div>
                <input type="submit" name="Submit" value="Guardar"  class="btn btn-sm btn-primary btn-block">
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
<?php
if(isset($_GET['errortipo'])){
echo "
<div class='alert alert-danger-alt alert-dismissable'>
                <span class='glyphicon glyphicon-certificate'></span>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
                    ×</button>El tipo particular no puede tener registro.</div>
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
