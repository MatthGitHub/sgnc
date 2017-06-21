<?php
include("../inc/config.php");
include("../inc/validar.php");

if(isset($_POST["idDelegacion"]))
	{
		$delegacion = $_POST['idDelegacion'];

		$opciones = '<option value="0"> Elige un servicio </option>';

		$link = mysqli_connect ($dbhost, $dbusername, $dbuserpass);
		mysqli_select_db($link,$dbname) or die('No se puede seleccionar la base de datos');
		$strConsulta = "SELECT idTipoTramite,nombre FROM tipostramites WHERE fkDelegacion = $delegacion";
		$result = $link->query($strConsulta);


		while( $fila = $result->fetch_array() )	{
			$opciones.='<option value="'.$fila["idTipoTramite"].'">'.$fila["nombre"].'</option>';
			}

		echo $opciones;
	}
	?>
