<?php
// Configura los datos de tu cuenta
include('config.php');

// Conectar a la base de datos
$link = mysqli_connect ($dbhost, $dbusername, $dbuserpass);
mysqli_select_db($link,$dbname) or die('No se puede seleccionar la base de datos');

if ($_POST['username']) {
//Comprobacion del envio del nombre de usuario y password
$username=htmlentities($_POST['username']);
$password=md5($_POST['password']);
if ($password==NULL) {
header ("Location: index.php?nopass");
exit();
}else{
$query = mysqli_query($link,"SELECT nombreUsuario,clave FROM usuarios WHERE nombreUsuario = '$username'") or die(mysqli_error($link));
$data = mysqli_fetch_array($query);
if($data['clave'] != $password) {
//echo "No a introducido una contrasenia correcta";
header ("Location: index.php?errorpass");
exit();
}else{
$query = mysqli_query($link,"SELECT nombreUsuario,clave,fkRol FROM usuarios WHERE nombreUsuario = '$username'") or die(mysqli_error($link));
$row = mysqli_fetch_array($query);
$username2 = $row['nombreUsuario'];
$_SESSION["s_nombre_usuario"] = $row['nombreUsuario'];

$_SESSION["logeado"] = "SI";
$_SESSION["permiso"] = $row['fkRol'];

header ("Location: inicio.php");
}
}
}
?>
