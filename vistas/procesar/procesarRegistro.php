<?php 

require_once("../../carga.php");

session_start();
if (empty($_POST['nombre']) or
	empty($_POST['apellido'])  or
	empty($_POST['fecha_nacimiento'])  or
	empty($_POST['numero_tarjeta']) or
	empty($_POST['nacionalidad'])  or
	empty($_POST['correo'])  or
	empty($_POST['password'])){
	$_SESSION['mensaje'] = "Datos invalidos, por favor vuelva a intentarlo";
	header("location: ../registro.php");
}else{
	$vector = [$_POST['nombre'],
			  $_POST['apellido'],
			  $_POST['fecha_nacimiento'],
			  $_POST['numero_tarjeta'],
			  $_POST['nacionalidad'],
			  $_POST['correo'],
			  $_POST['password'] ];
	ControladorUsuario::registrarUsuario($vector);		  
}


 ?>