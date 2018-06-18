<?php 


/**
* 
*/
class PruebaDaoCodigoDescuento
{
	
	public static function  Insert(){
		$codigo = password_hash("123asd2sd",PASSWORD_BCRYPT);
		$vuelo = DaoVuelo::selectOne(2);
		$codigoDescuento = new CodigoDescuento($codigo,30);
		DaoCodigoDescuento::insertOne($vuelo,$codigoDescuento);
	}
	public static function SelectAll(){
		$listaCodigos = DaoCodigoDescuento::selectAll();
		var_dump($listaCodigos);
	}
	public static function SelectOne($id){
		$codigoDescuento = DaoCodigoDescuento::selectOne($id);
		var_dump($codigoDescuento);
	}
	public static function updateOne(){
		$vuelo = DaoCodigoDescuento::selectOne(1);
		$vuelo->setDescuento(65);
		DaoCodigoDescuento::updateOne($vuelo);
	}
}



?>