<?php 



/**
* 
*/
class DaoTipoPasaje{

	private static $conexion;

	private static function setConexion(){
		self::$conexion = Conexion::getConexion();
	}

	public static function selectAll(){
		self::setConexion();
		$lista = [];
		$sel = self::$conexion->query("SELECT * FROM tipospasajes")->fetchAll();
		foreach ($sel as $tp) {
			$tipoPasaje = new TipoPasaje($tp['id'],$tp['nombre'],$tp['descuento']);
			array_push($lista,$tipoPasaje);
		}
		return $lista;
	}

	public static function selectOne($idTipoPasaje){
		self::setConexion();
		$sel = self::$conexion->prepare("SELECT * FROM tipospasajes WHERE id = :id");
		$sel->execute(array(":id" => $idTipoPasaje));
		$row = $sel->fetch();
		if ($row){
			$tipoPasaje = new TipoPasaje($row['id'],$row['nombre'],$row['descuento']);
			return $tipoPasaje;
		}else{
			return False;
		}
	}

	/**
	 * [inserta regitro en db. Devuelve booleano]
	 * @param  [type] $tipoPasajeOBJ [OBJ Type TipoPasaje]
	 * @return [type]            [boolean]
	 */
	public static function insertOne($tipoPasajeOBJ){
		self::setConexion();
		$array = [":nombre" => $tipoPasajeOBJ->getNombre(),
				  ":descuento" => $tipoPasajeOBJ->getDescuento()];
		$sel = self::$conexion->prepare("
			INSERT INTO tipospasajes(nombre, descuento) 
			VALUES (:nombre,:descuento)");
		return $sel->execute($array);
	}

	/**
	 * [Actualiza un registor en DB. Devuelve booleano]
	 * @param  [type] $tipoPasajeOBJ [OBJ Type TipoPasaje]
	 * @return [type]            [boolean]
	 */
	public static function updateOne($tipoPasajeOBJ){
		self::setConexion();
		$array = [":nombre" => $tipoPasajeOBJ->getNombre(),
				  ":descuento" =>$tipoPasajeOBJ->getDescuento(),
				  ":id" => $tipoPasajeOBJ->getId()];
		$sel = self::$conexion->prepare("
			UPDATE tipospasajes 
			SET nombre = :nombre, descuento = :descuento
			WHERE id = :id");
		return $sel->execute($array);
	}
}

?>