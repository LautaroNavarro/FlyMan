<?php 

/**
* 
*/
class DaoPasaje{

	private static $conexion;

	private static function setConexion(){
		self::$conexion = Conexion::getConexion();
	}

	public static function selectAll(){
		self::setConexion();
		$lista = [];
		$sel = self::$conexion->query("SELECT * FROM pasajes")->fetchAll();
		foreach ($sel as $tp) {
			$tipoPasaje = DaoTipoPasaje::selectOne($tp['id_tipo_pasaje']);
			$Pasaje = new Pasaje($tp['id'],$tp['estado'],$tipoPasaje);
			array_push($lista,$Pasaje);
		}
		return $lista;
	}
	
	public static function selectAllWhereIdVuelo($id_vuelo){
		self::setConexion();
		$lista = [];
		$sel = self::$conexion->prepare("SELECT * FROM pasajes WHERE id_vuelo = :id");
		$sel->execute(array(":id" => $id_vuelo));
		$row = $sel->fetchAll();
		foreach ($row as $tp) {
			$tipoPasaje = DaoTipoPasaje::selectOne($tp['id_tipo_pasaje']);
			$Pasaje = new Pasaje($tp['id'],$tp['estado'],$tipoPasaje);
			array_push($lista,$Pasaje);
		}
		return $lista;
	}
	public static function selectAllDisponbilesWhereIdVuelo($id_vuelo){
		self::setConexion();
		$lista = [];
		$sel = self::$conexion->prepare("SELECT * FROM pasajes WHERE  id_vuelo = :id AND estado = 'Disponible'");
		$sel->execute(array(":id" => $id_vuelo));
		$row = $sel->fetchAll();
		foreach ($row as $tp) {
			$tipoPasaje = DaoTipoPasaje::selectOne($tp['id_tipo_pasaje']);
			$Pasaje = new Pasaje($tp['id'],$tp['estado'],$tipoPasaje);
			array_push($lista,$Pasaje);
		}
		return $lista;
	}
	public static function selectAllWhereIdpPersona($id_persona){
		self::setConexion();
		$lista = [];
		$sel = self::$conexion->prepare("SELECT * FROM pasajes WHERE id_persona = :id ");
		$sel->execute(array(":id" => $id_persona));
		$row = $sel->fetchAll();
		foreach ($row as $tp) {
			$tipoPasaje = DaoTipoPasaje::selectOne($tp['id_tipo_pasaje']);
			$Pasaje = new Pasaje($tp['id'],$tp['estado'],$tipoPasaje);
			array_push($lista,$Pasaje);
		}
		return $lista;
	}
	public static function selectOneWhereDisponibleAndIdVuelo($idVuelo){
		self::setConexion();
		$sel = self::$conexion->prepare("SELECT * FROM pasajes WHERE id_vuelo = :id AND estado = 'Disponible' LIMIT 1");
		$sel->execute(array(":id" => $idVuelo));
		$row = $sel->fetch();
		if ($row){
			$tipoPasaje = DaoTipoPasaje::selectOne($row['id_tipo_pasaje']);
			$pasaje = new Pasaje($row['id'],$row['estado'],$tipoPasaje);
			return $pasaje;
		}else{
			return false;
		}
	}
	public static function selectOneWhereVueloAndPersona($vuelo,$persona){
		self::setConexion();
		$sel = self::$conexion->prepare("SELECT * FROM pasajes WHERE id_vuelo = :id AND id_persona = :persona");
		$sel->execute(array(":id" => $vuelo, ":persona" => $persona));
		$row = $sel->fetch();
		if ($row){
			$tipoPasaje = DaoTipoPasaje::selectOne($row['id_tipo_pasaje']);
			$pasaje = new Pasaje($row['id'],$row['estado'],$tipoPasaje);
			return $pasaje;
		}else{
			return false;
		}
	}
	public static function selectOne($idPasaje){
		self::setConexion();
		$sel = self::$conexion->prepare("SELECT * FROM pasajes WHERE id = :id");
		$sel->execute(array(":id" => $idPasaje));
		$row = $sel->fetch();
		if ($row){
			$tipoPasaje = DaoTipoPasaje::selectOne($row['id_tipo_pasaje']);
			$pasaje = new Pasaje($row['id'],$row['estado'],$tipoPasaje);
			return $pasaje;
		}else{
			return False;
		}
	}

	public static function insertOne($vuelo, $pasajeOBJ){
		self::setConexion();
		$array = [":estado" => $pasajeOBJ->getEstado(),
				  ":id_vuelo" => $vuelo->getId(),
				  ":id_tipo_pasaje" => $pasajeOBJ->getTipoPasaje()->getId()];
		$sel = self::$conexion->prepare("
			INSERT INTO pasajes(estado, id_vuelo, id_tipo_pasaje) 
			VALUES (:estado, :id_vuelo, :id_tipo_pasaje)");
		return $sel->execute($array);
	}

	public static function insertMany($vuelo, $pasajeOBJVector){
		self::setConexion();
		foreach ($pasajeOBJVector as $pasajeOBJ) {
			$array = [":estado" => $pasajeOBJ->getEstado(),
				  ":id_vuelo" => $vuelo->getId(),
				  ":id_tipo_pasaje" => $pasajeOBJ->getTipoPasaje()->getId(),
				  ":id_reserva" => $vuelo->getReserva()->getId()];
			$sel = self::$conexion->prepare("
			INSERT INTO pasajes(estado, id_vuelo, id_tipo_pasaje, id_reserva) 
			VALUES (:estado, :id_vuelo, :id_tipo_pasaje, :id_reserva)");
			$resultado =  $sel->execute($array);
		}
		return $resultado;
	}

	public static function updateOne($pasajeOBJ){
		self::setConexion();
		$array = [":estado" => $pasajeOBJ->getEstado(),
				  ":id_tipo_pasaje" => $pasajeOBJ->getTipoPasaje()->getId(),
				  ":id" => $pasajeOBJ->getId()];
		$sel = self::$conexion->prepare("
			UPDATE pasajes 
			SET estado = :estado, id_tipo_pasaje = :id_tipo_pasaje
			WHERE id = :id");
		return $sel->execute($array);
	}
	
	public static function buyOne($persona,$pasajeOBJ){
		self::setConexion();
		$array = [":estado" => Pasaje::COMPRADO,
				  ":id_tipo_pasaje" => $pasajeOBJ->getTipoPasaje()->getId(),
				  ":id" => $pasajeOBJ->getId(),
				  ":id_persona" => $persona->getId()];
		$sel = self::$conexion->prepare("
			UPDATE pasajes 
			SET estado = :estado, id_tipo_pasaje = :id_tipo_pasaje, id_persona = :id_persona
			WHERE id = :id");
		return $sel->execute($array);
	}
}

?>