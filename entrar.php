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
$query = mysqli_query($link,"SELECT username,password FROM usuarios WHERE username = '$username'") or die(mysql_error());
$data = mysqli_fetch_array($query);
if($data['password'] != $password) {
//echo "No a introducido una contrasenia correcta";
header ("Location: index.php?errorpass");
exit();
}else{
$query = mysqli_query($link,"SELECT username,password,rol FROM usuarios WHERE username = '$username'") or die(mysql_error());
$row = mysqli_fetch_array($query);
$username2 = $row['username'];
$_SESSION["s_username"] = $row['username'];

$_SESSION["logeado"] = "SI";
$_SESSION["permiso"] = $row['rol'];
/* Si aceptamos recordar los datos */
if($_POST['recordar']){

						if ($HTTP_X_FORWARDED_FOR == "")
					{
						$ip = getenv(REMOTE_ADDR);
					}
					else
					{
						$ip = getenv(HTTP_X_FORWARDED_FOR);
					}
	$id_extreme = md5(uniqid(rand(), true));
	$id_extreme2 = $username2."%".$id_extreme."%".$ip;
	setcookie('id_extreme', $id_extreme2, time()+7776000,'/');
	$query = mysqli_query("UPDATE usuarios SET id_extreme='".$id_extreme."' WHERE username='".$username2."'") or die(mysql_error());
}

header ("Location: inicio.php");
}
}
}
?>
