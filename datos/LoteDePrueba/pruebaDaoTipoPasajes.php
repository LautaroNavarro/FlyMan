<?php 




/**
* 
*/
class PruebaDaoTipoPasajes
{
	
	public static function  Insert(){
		$tipoPasaje = new TipoPasaje("Segunda Clase", "200");
		DaoTipoPasaje::insertOne($tipoPasaje);
	}
	public static function  SelectAll(){
		$listaTipoPasajes = DaoTipoPasaje::selectAll();
		foreach ($listaTipoPasajes as $tipoPasaje) {
			echo "Tipo Pasaje:" . $tipoPasaje->getNombre()."<br>";
		}
	}
	public static function  SelectOne($idPasaje){
		$pasaje = DaoTipoPasaje::selectOne($idPasaje);
		echo "Tipo Pasaje: " . $pasaje->getNombre();
	}
	public static function  updateOne(){
		$tipoPasaje = new TipoPasaje(3,"Low cost", "250");
		DaoTipoPasaje::updateOne($tipoPasaje);

	}
}


?>