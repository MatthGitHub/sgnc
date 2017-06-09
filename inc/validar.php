<?php
if($_SESSION["logeado"] != "SI"){
  mysqli_close();
  session_destroy();
	header ("Location: ../index.php");
	exit();
}

?>
