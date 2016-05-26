<?php
include('config.php');
$link = mysqli_connect($dbhost, $dbusername, $dbuserpass);
mysqli_select_db($link,$dbname) or die('No se puede seleccionar la base de datos');

$query = mysqli_query($link,"SELECT * FROM delegaciones") or die ('No hay delegaciones');

 ?>

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
      <li class="active"><a href="inicio.php">Inicio</a></li>
      <?php while($delegaciones =mysqli_fetch_array($query)) {?>
          <li><a href="tablaRegistros.php?delegacion=<?php echo $delegaciones['nombre'];?>"><?php echo $delegaciones['nombre']; ?></a></li>
      <?php }?>
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


</div> <!-- /container -->
