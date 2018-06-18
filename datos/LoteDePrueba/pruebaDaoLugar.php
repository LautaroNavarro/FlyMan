<?php 


/**
* 
*/
class PruebaDaoLugar
{
	
	public static function  Insert(){
		$lugar = new Lugar("Mendoza");
		DaoLugar::insertOne($lugar);
	}
	public static function SelectAll(){
		$lugares = DaoLugar::selectAll();
		foreach ($lugares as $lugar) {
			echo "Lugar: ".$lugar->getNombre()."<br>";
		}
	}
	public static function SelectOne($id){
		$lugar = DaoLugar::selectOne($id);
		echo "".$lugar->getNombre();
	}
	public static function updateOne(){
		$lugar = new Lugar(2,"Japon");
		DaoLugar::updateOne($lugar);
	}
}


?>