<?php 

/**
* 
*/
 
class DaoVuelo	
{
	private static $conexion;

	private static function setConexion(){
		self::$conexion = Conexion::getConexion();
	}
	public static function selectVuelosWhereIdPersona($id_persona){
		self::setConexion();
		$lista = [];
		$sel = self::$conexion->prepare("SELECT * FROM pasajes WHERE id_persona = :id");
		$sel->execute(array(":id" => $id_persona));
		$row = $sel->fetchAll();
		foreach ($row as $tp) {
			$vuelo = DaoVuelo::selectOne($tp['id_vuelo']);
			array_push($lista,$vuelo);
		}
		return $lista;
	}
	public static function selectAll(){
		self::setConexion();
		$lista = [];
		$sel = self::$conexion->query("SELECT * FROM vuelos")->fetchAll();
		foreach ($sel as $tp) {
			$vuelo = new Vuelo();
			$vuelo->setId($tp['id']);
			$vuelo->setFechaSalida($tp['fecha_salida']);
			$vuelo->setFechaLlegada($tp['fecha_llegada']);
			$vuelo->setPrecio($tp['precio']);
			$vuelo->setOrigen(DaoLugar::selectOne($tp['id_origen']));
			$vuelo->setDestino(DaoLugar::selectOne($tp['id_destino']));
			$vuelo->setPasajes(DaoPasaje::selectAllWhereIdVuelo($tp['id']));
			$vuelo->setCodigoDescuento(DaoCodigoDescuento::selectOneByVueloId($tp['id']));
			array_push($lista,$vuelo);
		}
		return $lista;
	}
	public static function selectOneByIdPasaje($idPasaje){
		self::setConexion();
		$sel = self::$conexion->prepare("SELECT * FROM vuelos AS v JOIN pasajes AS p ON  (v.id = p.id_vuelo) WHERE p.id = :id");
		$sel->execute(array(":id" => $idPasaje));
		$row = $sel->fetch();
		if ($row){
			$vuelo = new Vuelo();
			$vuelo->setId($row['id_vuelo']);
			$vuelo->setFechaSalida($row['fecha_salida']);
			$vuelo->setFechaLlegada($row['fecha_llegada']);
			$vuelo->setPrecio($row['precio']);
			$vuelo->setOrigen(DaoLugar::selectOne($row['id_origen']));
			$vuelo->setDestino(DaoLugar::selectOne($row['id_destino']));
			return $vuelo;
		}else{
			return False;
		}
	}
	public static function selectOne($idVuelo){
		self::setConexion();
		$sel = self::$conexion->prepare("SELECT * FROM vuelos WHERE id = :id");
		$sel->execute(array(":id" => $idVuelo));
		$row = $sel->fetch();
		if ($row){
			$vuelo = new Vuelo();
			$vuelo->setId($row['id']);
			$vuelo->setFechaSalida($row['fecha_salida']);
			$vuelo->setFechaLlegada($row['fecha_llegada']);
			$vuelo->setPrecio($row['precio']);
			$vuelo->setOrigen(DaoLugar::selectOne($row['id_origen']));
			$vuelo->setDestino(DaoLugar::selectOne($row['id_destino']));
			$vuelo->setPasajes(DaoPasaje::selectAllWhereIdVuelo($row['id']));
			$vuelo->setCodigoDescuento(DaoCodigoDescuento::selectOneByVueloId($row['id']));
			return $vuelo;
		}else{
			return False;
		}
	}

	/**
	 * [insertOne description]
	 * @param  [type] $vuelo     [description]
	 * @param  [type] $pasajeOBJ [description]
	 * @return [type]            [description]
	 */
	public static function insertOne($vueloOBJ){
		self::setConexion();
		$array = [":precio" => $vueloOBJ->getPrecio(),
				  ":fecha_salida" => $vueloOBJ->getFechaSalida(),
				  ":fecha_llegada" => $vueloOBJ->getFechaLlegada(),
				  ":id_origen" => $vueloOBJ->getOrigen()->getId(),
				  ":id_destino" => $vueloOBJ->getDestino()->getId()];
		$sel = self::$conexion->prepare("
			INSERT INTO vuelos(precio, fecha_salida, fecha_llegada, id_origen, id_destino) 
			VALUES (:precio, :fecha_salida, :fecha_llegada, :id_origen, :id_destino)");
		return $sel->execute($array);
	}

	/**
	 * [Actualiza un registor en DB. Devuelve booleano]
	 * @param  [type] $tipoPasajeOBJ [OBJ Type TipoPasaje]
	 * @return [type]            [boolean]
	 */
	public static function updateOne($vueloOBJ){
		self::setConexion();
		$array = [":precio" => $vueloOBJ->getPrecio(),
				  ":fecha_salida" => $vueloOBJ->getFechaSalida(),
				  ":fecha_llegada" => $vueloOBJ->getFechaLlegada(),
				  ":id_origen" => $vueloOBJ->getOrigen()->getId(),
				  ":id_destino" => $vueloOBJ->getDestino()->getId(),
				  ":id" => $vueloOBJ->getId()];
		$sel = self::$conexion->prepare("
			UPDATE vuelos 
			SET precio = :precio, fecha_salida = :fecha_salida, fecha_llegada = :fecha_llegada,
			id_origen = :id_origen, id_destino = :id_destino
			WHERE id = :id");
		return $sel->execute($array);
	}
}

 ?>