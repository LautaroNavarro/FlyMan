<?php 


/**
* 
*/
class DaoUsuario 
{
	private static $conexion;

	private static function setConexion(){
		self::$conexion = Conexion::getConexion();
	}

	public static function selectAll(){
		self::setConexion();
		$lista = [];
		$sel = self::$conexion->query("SELECT * FROM usuarios")->fetchAll();
		foreach ($sel as $tp) {
			$usuario = new Usuario($tp['id'],$tp['email'],$tp['password']);
			array_push($lista,$usuario);
		}
		return $lista;
	}

	public static function selectOne($id){
		self::setConexion();
		$sel = self::$conexion->prepare("SELECT * FROM usuarios WHERE id = :id");
		$sel->execute(array(":id" => $id));
		$row = $sel->fetch();
		if ($row){
			$usuario = new Usuario($row['id'],$row['email'],$row['password']);
			return $usuario;
		}else{
			return False;
		}
	}

	/**
	 * [inserta regitro en db. Devuelve booleano]
	 * @param  [type] $codigoObj [OBJ Type CodigoDescuento]
	 * @return [type]            [boolean]
	 */
	public static function insertOne($usuarioOBJ){
		self::setConexion();
		$array = [":email" => $usuarioOBJ->getEmail(),
				  ":password" =>$usuarioOBJ->getPassword()];
		$sel = self::$conexion->prepare("
			INSERT INTO usuarios(email, password) 
			VALUES (:email, :password)");
		$sel->execute($array);
		return self::$conexion->lastInsertId();
	}

	public static function selectUserByEmailAndPassword($email,$password){
		self::setConexion();
		$sel = self::$conexion->prepare("SELECT * FROM usuarios WHERE email = :email AND password = :password");
		$sel->execute(array(":email" => $email , ":password" => $password));
		$row = $sel->fetch();
		if ($row){
			$usuario = new Usuario($row['id'],$row['email'],$row['password']);
			return $usuario;
		}else{
			return False;
		}
	}
}
 
?>