<?php 


/**
* 
*/
class PruebaDaoVuelos
{
	
	public static function  Insert(){
		$vuelo = new Vuelo();
		$vuelo->setFechaSalida(date("2018/06/14"));
		$vuelo->setFechaLlegada(date("2018/06/15"));
		$vuelo->setPrecio(4899);
		$vuelo->setOrigen(DaoLugar::selectOne(3));
		$vuelo->setDestino(DaoLugar::selectOne(4));
		DaoVuelo::insertOne($vuelo);
	}
	public static function SelectAll(){
		$listaVuelos = DaoVuelo::selectAll();
		var_dump($listaVuelos);
	}
	public static function SelectOne($id){
		$vuelo = DaoVuelo::selectOne($id);
		var_dump($vuelo);

	}
	public static function updateOne(){
		$vuelo = DaoVuelo::selectOne(1);
		$vuelo->setFechaSalida(date("1998/2/2"));
		DaoVuelo::updateOne($vuelo);

	}
}

PruebaDaoVuelos::SelectAll();
?>