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
      <li><a href="grilla_escribanos.php?deleg=RPI"> RPI</a></li>
      <li><a href="grilla_escribanos.php?deleg=Catastro"> Catastro </a></li>
      <li><a href="grilla_escribanos.php?deleg=Rentas"> Rentas </a></li>
      <li><a href="grilla_escribanos.php?deleg=Municipalidad"> Municipalidad </a></li>
      <li><a href="grilla_escribanos.php?deleg=Aguas"> Aguas </a></li>
      <li><a href="grilla_escribanos.php?deleg=Expensas"> Expensas </a></li>
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
