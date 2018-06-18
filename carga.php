<?php 
//CONTROLADORES
require_once("controladores/ControladorUsuario.php");
require_once("controladores/ControladorLugares.php");
require_once("controladores/ControladorVuelos.php");
require_once("controladores/ControladorPasajes.php");

//Modelo
require_once("cargaModelos.php");

//Conexion
require_once("datos/Conexion.php");

//Dao
require_once("datos/Dao/DaoCodigoDescuento.php");
require_once("datos/Dao/DaoLugar.php");
require_once("datos/Dao/DaoPasaje.php");
require_once("datos/Dao/DaoPersona.php");
require_once("datos/Dao/DaoReserva.php");
require_once("datos/Dao/DaoTipoPasaje.php");
require_once("datos/Dao/DaoUsuario.php");
require_once("datos/Dao/DaoVuelo.php");

 ?>