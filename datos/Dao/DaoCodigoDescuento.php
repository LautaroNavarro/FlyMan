<?php 

/**
* 
*/
class DaoCodigoDescuento{
	private static $conexion;

	private static function setConexion(){
		self::$conexion = Conexion::getConexion();
	}
	

	public static function selectAll(){
		self::setConexion();
		$lista = [];
		$sel = self::$conexion->query("SELECT * FROM codigosdescuento")->fetchAll();
		foreach ($sel as $tp) {
			$codigoDescuento = new CodigoDescuento($tp['id'],$tp['codigo'],$tp['descuento']);
			array_push($lista,$codigoDescuento);
		}
		return $lista;
	}

	public static function selectOne($idCodigo){
		self::setConexion();
		$sel = self::$conexion->prepare("SELECT * FROM codigosdescuento WHERE id = :id");
		$sel->execute(array(":id" => $idCodigo));
		$row = $sel->fetch();
		if ($row){
			$codigoDescuento = new CodigoDescuento($row['id'],$row['codigo'],$row['descuento']);
			return $codigoDescuento;
		}else{
			return False;
		}
	}
	public static function selectOneByVueloId($idCodigoAvion){
		self::setConexion();
		$sel = self::$conexion->prepare("SELECT * FROM codigosdescuento WHERE id_vuelo = :id");
		$sel->execute(array(":id" => $idCodigoAvion));
		$row = $sel->fetch();
		if ($row){
			$codigoDescuento = new CodigoDescuento($row['id'],$row['codigo'],$row['descuento']);
			return $codigoDescuento;
		}else{
			return False;
		}
	}

	/**
	 * [inserta regitro en db. Devuelve booleano]
	 * @param  [type] $codigoObj [OBJ Type CodigoDescuento]
	 * @return [type]            [boolean]
	 */
	public static function insertOne($vuelo,$codigoObj){
		self::setConexion();
		$array = [":codigo" => $codigoObj->getCodigo(),
				  ":descuento" =>$codigoObj->getDescuento(),
				  ":id_vuelo" => $vuelo->getId()];
		$sel = self::$conexion->prepare("
			INSERT INTO codigosdescuento(codigo, descuento, id_vuelo) 
			VALUES (:codigo, :descuento,:id_vuelo)");
		return $sel->execute($array);
	}

	/**
	 * [Actualiza un registor en DB. Devuelve booleano]
	 * @param  [type] $codigoObj [OBJ Type CodigoDescuento]
	 * @return [type]            [boolean]
	 */
	public static function updateOne($codigoObj){
		self::setConexion();
		$array = [":codigo" => $codigoObj->getCodigo(),
				  ":descuento" =>$codigoObj->getDescuento(),
				  ":id" => $codigoObj->getId()];
		$sel = self::$conexion->prepare("
			UPDATE codigosdescuento 
			SET codigo = :codigo, descuento = :descuento 
			WHERE id = :id");
		return $sel->execute($array);
	}
}

?>