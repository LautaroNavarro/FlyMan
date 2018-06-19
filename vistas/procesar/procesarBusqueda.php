<?php 

require_once("../../carga.php");
session_start();

$parameters = [];
$parameters['p_minimo'] = !empty($_POST['p_minimo']) ? $_POST['p_minimo'] : null;
$parameters['p_maximo']  = !empty($_POST['p_maximo'])  ? $_POST['p_maximo']  : null;
$parameters['origen']  = !empty($_POST['origen'])  ? $_POST['origen']  : null;
$parameters['destino']  = !empty($_POST['destino'])  ? $_POST['destino']  : null;
$parameters['fechaSalida']  = !empty($_POST['fechaSalida'])  ? $_POST['fechaSalida']  : null;
$bandera = false;
foreach ($parameters as $parametro) {
	if ($parametro != null) {
		$bandera = true;
	}
}

if ($bandera == true) {
	ControladorVuelos::buscarPorParameters($parameters);
}else{
	$_SESSION['mensaje'] = "No ingreso ningun campo de busqueda";
	header("location: ../buscarVuelo.php");
}


 ?>