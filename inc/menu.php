<!-- Bootstrap -->
<script src="../js/bootstrap.min.js"></script>
<link href="../css/font-awesome.css" rel="stylesheet">
<link href="../css/font-awesome.min.css" rel="stylesheet">


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
    <ul class="nav navbar-nav">
      <li class="active"><a href="../inc/inicio.php">Inicio</a></li>
    <?php
    if($_SESSION["permiso"] == 1) { ?>
      <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Tramites<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Listar tramites</a></li>
            <li><a href="../mod_tramites/frm_nuevo_tramite.php">Nuevo tramite</a></li>
            <li><a href="../mod_tipos_tramite/tipos_tramite.php">Listar tipos de tramite</a></li>
            <li><a href="../mod_tipos_tramite/frm_nuevo_tipo_tramite.php">Nuevo tipo de tramite</a></li>
          </ul>
      </li>
    <?php
    }
    ?>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Delegaciones<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="../mod_delegaciones/delegaciones.php">Listar</a></li>
            <li><a href="../mod_delegaciones/frm_nueva_delegacion.php">Nueva</a></li>
          </ul>
        </li>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Clientes<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="../mod_clientes/clientes.php">Listar</a></li>
                <li><a href="../mod_clientes/frm_nuevo_cliente.php">Nuevo</a></li>
              </ul>
            </li>
    </ul>

    <ul class="nav navbar-nav navbar-right">
			<li><a href="../mod_usuarios/form_cambiar_clave.php"><i class="fa fa-key fa-fw"></i> Cambiar clave </a></li>
			<li><a><i class="fa fa-user-circle-o fa-fw"></i> <?php echo $_SESSION['s_nombre_usuario']; ?> </a></li>
			<li><a><i class="fa fa-calendar-o fa-fw"></i>
			<?php
			// Establecer la zona horaria predeterminada a usar. Disponible desde PHP 5.1
			date_default_timezone_set('UTC');
			//Imprimimos la fecha actual dandole un formato
			echo date("d / m / Y");
			?></a></li>
			<li><a href="cerrar.php"><i class="fa fa-sign-out fa-fw"></i> Salir</a></li>
	  </ul>
  </div><!--/.nav-collapse -->
</div><!--/.container-fluid -->
</div>
