<?php 



/**
* 
*/
class DaoLugar{

	private static $conexion;

	private static function setConexion(){
		self::$conexion = Conexion::getConexion();
	}
	public static function selectAll(){
		self::setConexion();
		$lista = [];
		$sel = self::$conexion->query("SELECT * FROM lugares")->fetchAll();
		foreach ($sel as $tp) {
			$lugar = new Lugar($tp['id'],$tp['nombre']);
			array_push($lista,$lugar);
		}
		return $lista;
	}

	public static function selectOne($idCodigo){
		self::setConexion();
		$sel = self::$conexion->prepare("SELECT * FROM lugares WHERE id = :id");
		$sel->execute(array(":id" => $idCodigo));
		$row = $sel->fetch();
		if ($row){
			$lugar = new Lugar($row['id'],$row['nombre']);
			return $lugar;
		}else{
			return False;
		}
	}

	/**
	 * [inserta regitro en db. Devuelve booleano]
	 * @param  [type] $lugarOBK [OBJ Type Lugar]
	 * @return [type]            [boolean]
	 */
	public static function insertOne($lugarOBJ){
		self::setConexion();
		$array = [":nombre" => $lugarOBJ->getNombre()];
		$sel = self::$conexion->prepare("
			INSERT INTO lugares(nombre) 
			VALUES (:nombre)");
		return $sel->execute($array);
	}

	/**
	 * [Actualiza un registor en DB. Devuelve booleano]
	 * @param  [type] $lugarOBK [OBJ Type Lugar]
	 * @return [type]            [boolean]
	 */
	public static function updateOne($lugarOBJ){
		self::setConexion();
		$array = [":nombre" => $lugarOBJ->getNombre(),
				  ":id" => $lugarOBJ->getId()];
		$sel = self::$conexion->prepare("
			UPDATE lugares 
			SET nombre = :nombre
			WHERE id = :id");
		return $sel->execute($array);
	}
}

?>