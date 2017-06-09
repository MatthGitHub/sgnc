<?php
include('config.php');
if($_SESSION["logeado"] != "SI"){
	header ("Location: index.php");
	exit;
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema Gestor Bariloche</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.css" rel="stylesheet">

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
					<?php include "menu.php"; ?>
      <div class="jumbotron">
				<ul class="nav nav-tabs">
				  <li class="active"><a href="#">Home</a></li>
				  <li><a href="#">Menu 1</a></li>
				  <li><a href="#">Menu 2</a></li>
				  <li><a href="#">Menu 3</a></li>
				</ul>
      </div>

    </div> <!-- /container -->

    	<p align="center"> by M. Benditti. </p>
  </body>
</html>
