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
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Usuarios<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Listar</a></li>
              <li><a href="#">Nuevo</a></li>
            </ul>
          </li>
    <?php
    }
    ?>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Delegaciones<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Listar</a></li>
            <li><a href="#">Nuevo</a></li>
          </ul>
        </li>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Clientes<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="../mod_clientes/clientes.php">Listar</a></li>
                <li><a href="#">Nuevo</a></li>
              </ul>
            </li>
    </ul>
  </div><!--/.nav-collapse -->
</div><!--/.container-fluid -->
</div>
