<?php 

/**
* 
*/
class PruebaDaoUsuarios
{
	
	public static function  Insert(){
		$usuario = new Usuario("momomo@gmail.com","Dragonballz");
		$lastId = DaoUsuario::insertOne($usuario);
	}
	public static function SelectAll(){
		$listaUsuarios = DaoUsuario::selectAll();
		foreach ($listaUsuarios as $usuario ) {
			echo "Usuario: " . $usuario->getEmail()."<br>";
		}
	}
	public static function SelectOne($id){
		$usuario = DaoUsuario::selectOne($id);
		echo "Usuario: ". $usuario->getEmail();
	}

}



?>