<?php 


/**
* 
*/
class PruebaDaoPersona
{
	
	public static function  Insert(){
		$lugar = DaoLugar::selectOne(1);
		$usuario = DaoUsuario::selectOne(2);
		$persona = new Persona("Lautaro","Navarro",date("1998/12/29"),"1234567890123456",$lugar,$usuario);
		DaoPersona::insertOne($persona);
	}
	public static function SelectAll(){
		$listaPersonas = DaoPersona::selectAll();
		var_dump($listaPersonas);
	}	
	public static function SelectOne($id){
		$persona = DaoPersona::selectOne($id);
		echo "Nombre: " . $persona->getNombre();
		echo "<br>Lugar de recidencia: ". $persona->getNacionalidad()->getNombre();
	}
	public static function  updateOne(){
		$persona = DaoPersona::selectOne(1);
		$persona->setApellido("Franchezco");
		DaoPersona::updateOne($persona);
	}

}

PruebaDaoPersona::SelectAll();

?>