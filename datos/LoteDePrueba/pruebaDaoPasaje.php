<?php 
include("../../carga.php");

/**
* 
*/
class PruebaDaoPasajes
{
	
	public static function  Insert(){
		$tipoPasaje = DaoTipoPasaje::selectOne(2);
		$pasaje = new Pasaje(Pasaje::DISPONIBLE,$tipoPasaje);
		$vuelo = DaoVuelo::selectOne(1);
		DaoPasaje::insertOne($vuelo,$pasaje);
	}
	public static function SelectAll(){
		$listaPasajes = DaoPasaje::selectAll();
		var_dump($listaPasajes);
	}
	public static function SelectOne($id){
		$pasaje = DaoPasaje::selectOne($id);
		var_dump($pasaje);
	}
	public static function updateOne(){
		$pasaje = DaoPasaje::selectOne(1);
		$pasaje->setEstado(Pasaje::RESERVADO);
		DaoPasaje::updateOne($pasaje);
	}
	public static function buyOne(){
		$persona = DaoPersona::selectOne(1);
		$pasaje = DaoPasaje::selectOne(1);
		DaoPasaje::buyOne($persona,$pasaje);
	}
	public static function selectAllDisponbilesWhereIdVuelo(){
		$listaPasajes = DaoPasaje::selectAllDisponbilesWhereIdVuelo(1);
		var_dump($listaPasajes);
	}
}
PruebaDaoPasajes::selectAllDisponbilesWhereIdVuelo();

?>
