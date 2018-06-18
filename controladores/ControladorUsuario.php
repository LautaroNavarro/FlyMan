<?php 


class ControladorUsuario
{
	public static function registrarUsuario($vectorDatos){
		$persona = self::mapearDatosPersona($vectorDatos);
		$usuario = self::mapearDatosUsuario($vectorDatos);
		$id = DaoUsuario::insertOne($usuario);
		if ($id == 0) {
			$_SESSION["Introdujo un correo existente"];
			header('location: ../registro.php');
		}else{
		$usuario = DaoUsuario::selectOne($id);
		$persona->setUsuario($usuario);
		$id = DaoPersona::insertOne($persona);
		if ($id == 0) {
			$_SESSION["Introdujo un correo existente"];
			header('location: ../registro.php');
		}else{
		$persona = DaoPersona::selectOne($id);
		header('location: ../login.php');
		}}
	}

	public static function iniciarSesion($email,$password){
		$password = md5($password);
		$usuario = DaoUsuario::selectUserByEmailAndPassword($email,$password);
		if ($usuario) {
			$_SESSION['PERSONA'] = DaoPersona::selectOneByIdUsuario($usuario->getId());
			header("location: ../vuelos.php");
		}else{
			$_SESSION['mensaje'] = "Usuario o contraseña incorrectos";
			header("../login.php");
		}
	}

	private static function mapearDatosPersona($vectorDatos){
		$persona = new Persona();
		$persona->setNombre($vectorDatos[0]);
		$persona->setApellido($vectorDatos[1]);
		$persona->setFechaNacimiento($vectorDatos[2]);
		$persona->setNumeroTarjeta($vectorDatos[3]);
		$persona->setNacionalidad(DaoLugar::selectOne($vectorDatos[4]));
		return $persona;
	}
	private static function mapearDatosUsuario($vectorDatos){
		$usuario = new Usuario($vectorDatos[5],$vectorDatos[6]);
		return $usuario;
	}
}


 ?>