<?php 
require_once("../../carga.php");
session_start();

if (isset($_POST['id_pasaje']) and isset($_SESSION['PERSONA'])) {
	ControladorPasajes::comprarPasaje($_SESSION['PERSONA'],$_POST['id_pasaje']);
}

 ?>