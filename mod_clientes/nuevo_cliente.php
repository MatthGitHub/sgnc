<?php
include('../inc/config.php');
include('../inc/validar.php');

if((!empty($_POST['nombre']))&&(!empty($_POST['apellido']))&&(!empty($_POST['tipo']))){
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $tipo = $_POST['tipo'];
  $documento = $_POST['documento'];
  $correo = $_POST['correo'];
  $telefono = $_POST['telefono'];
  $registro = $_POST['registro'];






  // Conectar a la base de datos
  $link = mysqli_connect ($dbhost, $dbusername, $dbuserpass);
  mysqli_select_db($link,$dbname) or die('No se puede seleccionar la base de datos');

  $sql = "INSERT INTO clientes (nombre,apellido,documento,registro,correo,telefono,fkTipoCliente) VALUES ('$nombre','$apellido','$documento',$registro,'$correo','$telefono',$tipo)";
  $myError = mysqli_query($link, $sql);


  //echo "Error:".$myError." Nombre:".$nombre." Apellido:".$apellido." Tipo:".$tipo." Doc:".$documento." Correo:".$correo." Tel:".$telefono." Registro:".$registro;
  //exit();

  if(!$myError){
    header("Location: frm_nuevo_cliente.php?errordb");
    exit();
  }
  header("Location: frm_nuevo_cliente.php?sucess");
  exit();
}else{
  header("Location: frm_nuevo_cliente.php?errordata");
  exit();
}

?>
