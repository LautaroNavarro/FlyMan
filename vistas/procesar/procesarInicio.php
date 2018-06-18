<?php 

require_once("../../carga.php");

session_start();
if (empty($_POST['email']) or
	empty($_POST['password'])){
	$_SESSION['mensaje'] = "Datos invalidos, por favor vuelva a intentarlo";
	header("location: ../registro.php");
}else{
	$email = $_POST['email'];
	$password = $_POST['password'];
	ControladorUsuario::iniciarSesion($email,$password);		  
}


 ?>