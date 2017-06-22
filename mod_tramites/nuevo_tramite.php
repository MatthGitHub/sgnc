<?php
include('../inc/config.php');
include('../inc/validar.php');

if((!empty($_POST['delegacion']))&&(!empty($_POST['tipos']))&&(!empty($_POST['cliente']))){
  $delegacion = $_POST['delegacion'];
  $tipo = $_POST['tipos'];
  $cliente = $_POST['cliente'];
  $obs = $_POST['observacion'];
  $recargo = $_POST['recargo'];
  if(empty($recargo)){
    $recargo = 0;
  }

  $fecha = Date('Y-m-d');

  // Conectar a la base de datos
  $link = mysqli_connect ($dbhost, $dbusername, $dbuserpass);
  mysqli_select_db($link,$dbname) or die('No se puede seleccionar la base de datos');

  $sql = "INSERT INTO tramites (fecha,observacion,recargo,fkCliente,fkTipoTramite) VALUES ('$fecha','$obs',$recargo,$cliente,$tipo)";
  $myError = mysqli_query($link, $sql);

  if(!$myError){
    header("Location: frm_nuevo_tramite.php?errordb");
    exit();
  }
  header("Location: frm_nuevo_tramite.php?sucess");
  exit();
}else{
  header("Location: frm_nuevo_tramite.php?errordata");
  exit();
}

?>
