<?php 

/**
* 
*/
class DaoReserva
{
	private static $conexion;

	private static function setConexion(){
		self::$conexion = Conexion::getConexion();
	}

	public static function selectAll(){
		self::setConexion();
		$lista = [];
		$sel = self::$conexion->query("SELECT * FROM reservas")->fetchAll();
		foreach ($sel as $tp) {
			$pasaje = DaoPasaje::selectOne($tp['id_pasaje']);
			$reserva = new Reserva($tp['id'],$pasaje,$tp['fecha_reserva']);
			array_push($lista,$reserva);
		}
		return $lista;
	}
	public static function selectAllWhereIdPersona($idPersona){
		self::setConexion();
		$lista = [];
		$sel = self::$conexion->prepare("SELECT * FROM reservas WHERE id_persona = :id_persona");
		$sel->execute(array(":id_persona" => $idPersona));
		$row =  $sel->fetchAll();
		foreach ($row as $tp) {
			$pasaje = DaoPasaje::selectOne($tp['id_pasaje']);
			$reserva = new Reserva($tp['id'],$pasaje,$tp['fecha_reserva']);
			array_push($lista,$reserva);
		}
		return $lista;
	}
	public static function selectOne($idCodigo){
		self::setConexion();
		$sel = self::$conexion->prepare("SELECT * FROM reservas WHERE id = :id");
		$sel->execute(array(":id" => $idCodigo));
		$row = $sel->fetch();
		if ($row){
			$pasaje = DaoPasaje::selectOne($row['id_pasaje']);
			$reserva = new Reserva($row['id'], $pasaje ,$row['fecha_reserva']);
			return $reserva;
		}else{
			return False;
		}
	}

	public static function insertOne($persona, $reservaOBJ){
		self::setConexion();
		$array = [":id_persona" => $persona->getId(),
				  ":fecha_reserva" => $reservaOBJ->getFechaReserva(),
				  ":id_pasaje" => $reservaOBJ->getPasaje()->getId()];
		$pasaje = DaoPasaje::selectOne($reservaOBJ->getPasaje()->getId());
		$pasaje->setEstado(Pasaje::RESERVADO);
		DaoPasaje::updateOne($pasaje);
		$sel = self::$conexion->prepare("
			INSERT INTO reservas(id_persona, fecha_reserva, id_pasaje) 
			VALUES (:id_persona,:fecha_reserva,:id_pasaje)");
		return $sel->execute($array);
	}

	public static function updateOne($reservaOBJ){
		self::setConexion();
		$array = [":fecha_reserva" => $reservaOBJ->getFechaReserva(),
				  ":id_pasaje" => $reservaOBJ->getPasaje()->getId(),
				  ":id" => $reservaOBJ->getId()];
		$sel = self::$conexion->prepare("
			UPDATE reservas 
			SET fecha_reserva = :fecha_reserva,
				id_pasaje = :id_pasaje
			WHERE id = :id");
		return $sel->execute($array);
	}
}

 ?>