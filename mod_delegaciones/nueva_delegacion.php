<?php
include('../inc/config.php');
include('../inc/validar.php');

if(!empty($_POST['nombre'])){
  $nombre = $_POST['nombre'];
  $ubicacion = $_POST['ubicacion'];
  $obs = $_POST['observacion'];

  // Conectar a la base de datos
  $link = mysqli_connect ($dbhost, $dbusername, $dbuserpass);
  mysqli_select_db($link,$dbname) or die('No se puede seleccionar la base de datos');

  $sql = "INSERT INTO delegaciones (nombre,ubicacion,observacion) VALUES ('$nombre','$ubicacion','$obs')";

  $myError = mysqli_query($link, $sql);


  //echo "Error:".$myError." Nombre:".$nombre." Apellido:".$apellido." Tipo:".$tipo." Doc:".$documento." Correo:".$correo." Tel:".$telefono." Registro:".$registro;
  //exit();

  if(!$myError){
    header("Location: frm_nueva_delegacion.php?errordb");
    exit();
  }
  header("Location: frm_nueva_delegacion.php?sucess");
  exit();
}else{
  header("Location: frm_nueva_delegacion.php?errordata");
  exit();
}

?>
