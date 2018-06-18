<?php 

/**
* 
*/
class DaoPersona 
{
	private static $conexion;

	private static function setConexion(){
		self::$conexion = Conexion::getConexion();
	}

	public static function selectAll(){
		self::setConexion();
		$lista = [];
		$sel = self::$conexion->query("SELECT * FROM personas")->fetchAll();
		foreach ($sel as $tp) {
			$nacionalidad = DaoUsuario::selectOne($tp['id_recidencia']);
			$usuario = DaoLugar::selectOne($tp['id_usuario']);
			$reservas = DaoReserva::selectAllWhereIdPersona($tp['id']);
			$pasajes = DaoPasaje::selectAllWhereIdpPersona($tp['id']);
			$persona = new Persona($tp['id'],
								   $tp['nombre'],
								   $tp['apellido'],
								   $tp['fecha_nacimiento'],
								   $tp['numero_tarjeta'],
								   $usuario,
								   $nacionalidad,
								   $reservas,
								   $pasajes
								   );
			array_push($lista,$persona);
		}
		return $lista;
	}

	public static function selectOne($idCodigo){
		self::setConexion();
		$sel = self::$conexion->prepare("SELECT * FROM personas WHERE id = :id");
		$sel->execute(array(":id" => $idCodigo));
		$tp = $sel->fetch();
		if ($tp){
			$usuario = DaoUsuario::selectOne($tp['id_usuario']);
			$nacionalidad = DaoLugar::selectOne($tp['id_recidencia']);
			$reservas = DaoReserva::selectAllWhereIdPersona($tp['id']);
			$pasajes = DaoPasaje::selectAllWhereIdpPersona($tp['id']);
			$persona = new Persona($tp['id'],
								   $tp['nombre'],
								   $tp['apellido'],
								   $tp['fecha_nacimiento'],
								   $tp['numero_tarjeta'],
								   $usuario,
								   $nacionalidad,
								   $reservas,
								   $pasajes
								   );			
			return $persona;
		}else{
			return False;
		}
	}
	public static function selectOneByIdUsuario($idUsuario){
		self::setConexion();
		$sel = self::$conexion->prepare("SELECT * FROM personas WHERE id_usuario = :id_usuario");
		$sel->execute(array(":id_usuario" => $idUsuario));
		$tp = $sel->fetch();
		if ($tp){
			$usuario = DaoUsuario::selectOne($tp['id_usuario']);
			$nacionalidad = DaoLugar::selectOne($tp['id_recidencia']);
			$reservas = DaoReserva::selectAllWhereIdPersona($tp['id']);
			$pasajes = DaoPasaje::selectAllWhereIdpPersona($tp['id']);
			$persona = new Persona($tp['id'],
								   $tp['nombre'],
								   $tp['apellido'],
								   $tp['fecha_nacimiento'],
								   $tp['numero_tarjeta'],
								   $usuario,
								   $nacionalidad,
								   $reservas,
								   $pasajes
								   );			
			return $persona;
		}else{
			return False;
		}
	}
	/**
	 * [inserta regitro en db. Devuelve booleano]
	 * @param  [type] 
	 * @return [type]            [boolean]
	 */
	public static function insertOne($personaOBJ){
		self::setConexion();
		$array = [":nombre" => $personaOBJ->getNombre(),
				  ":apellido" => $personaOBJ->getApellido(),
				  ":fecha_nacimiento" => $personaOBJ->getFechaNacimiento(),
				  ":numero_tarjeta" => $personaOBJ->getNumeroTarjeta(),
				  ":id_recidencia" => $personaOBJ->getNacionalidad()->getId(),
				  ":id_usuario" => $personaOBJ->getUsuario()->getId()
				];
		$sel = self::$conexion->prepare("
			INSERT INTO personas(nombre,apellido,fecha_nacimiento,numero_tarjeta,id_recidencia,id_usuario) 
			VALUES (:nombre,:apellido,:fecha_nacimiento,:numero_tarjeta,:id_recidencia,:id_usuario)");
		$sel->execute($array);
		return self::$conexion->lastInsertId();
	}

	/**
	 * [Actualiza un registor en DB. Devuelve booleano]
	 * @param  [type] $lugarOBK [OBJ Type Lugar]
	 * @return [type]            [boolean]
	 */
	public static function updateOne($personaOBJ){
		self::setConexion();
		$array = [":id" => $personaOBJ->getId(),
				  ":nombre" => $personaOBJ->getNombre(),
				  ":apellido" => $personaOBJ->getApellido(),
				  ":fecha_nacimiento" => $personaOBJ->getFechaNacimiento(),
				  ":numero_tarjeta" => $personaOBJ->getNumeroTarjeta(),
				  ":id_recidencia" => $personaOBJ->getNacionalidad()->getId()];
		$sel = self::$conexion->prepare("
			UPDATE personas 
			SET nombre = :nombre ,
				apellido = :apellido,
				fecha_nacimiento = :fecha_nacimiento,
				numero_tarjeta = :numero_tarjeta,
				id_recidencia = :id_recidencia
			WHERE id = :id");
		return $sel->execute($array);
	}
}





 ?>