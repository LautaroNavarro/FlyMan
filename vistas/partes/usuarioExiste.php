<!-- USUARIO EXISTE? !-->

<?php 
session_start();
if (isset($_SESSION['PERSONA'])) {
	$persona = $_SESSION['PERSONA'];
}else{
	$_SESSION["mensaje"] = "Todavia no te has logeado";
	header("location:registro.php");
}
 ?>
