<?php
include('../inc/config.php');
include('../inc/validar.php');

if((!empty($_POST['delegacion']))&&(!empty($_POST['nombre']))){
  $delegacion = $_POST['delegacion'];
  $nombre = $_POST['nombre'];
  $descripcion = $_POST['descripcion'];
  $costo = $_POST['costo'];

  // Conectar a la base de datos
  $link = mysqli_connect ($dbhost, $dbusername, $dbuserpass);
  mysqli_select_db($link,$dbname) or die('No se puede seleccionar la base de datos');

  $sql = "INSERT INTO tipostramites (nombre,descripcion,costo,fkDelegacion) VALUES ('$nombre','$descripcion',$costo,$delegacion)";
  $myError = mysqli_query($link, $sql);

  if(!$myError){
    header("Location: frm_nuevo_tipo_tramite.php?errordb");
    exit();
  }
  header("Location: frm_nuevo_tipo_tramite.php?sucess");
  exit();
}else{
  header("Location: frm_nuevo_tipo_tramite.php?errordata");
  exit();
}

?>
