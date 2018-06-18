<?php 

class Conexion{

	private static $conexion;

	private function __construct(){

	}
	public static function getConexion(){
		if (self::$conexion == null) {
			self::$conexion = new PDO(
			"mysql:host=localhost; dbname=flyman",
			"root",
			"");
			return self::$conexion;
		}else{
			return self::$conexion;
		}
	}
}
 ?>