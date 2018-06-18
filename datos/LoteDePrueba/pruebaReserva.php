<?php 


/**
* 
*/
class PruebaDaoReserva
{
	
	public static function  Insert(){
		$persona = DaoPersona::selectOne(1);
		$pasaje = DaoPasaje::selectOne(5);
		$reserva = new Reserva($pasaje, date("2001/11/23"));
		DaoReserva::insertOne($persona,$reserva);
	}
	public static function SelectAll(){
		$listaReservas = DaoReserva::selectAll();
		var_dump($listaReservas);
	}
	public static function SelectOne($id){
		$reserva = DaoReserva::selectOne($id);
		var_dump($reserva);
	}
	public static function updateOne(){
		$reserva = DaoReserva::selectOne(2);
		$reserva->setFechaReserva(date("2005/03/02"));
		DaoReserva::updateOne($reserva);
	}
	public static function SelectAllWhereIdPersona(){
		$listaReservas = DaoReserva::selectAllWhereIdPersona(1);
		var_dump($listaReservas);
	}
}

PruebaDaoReserva::Insert();

?>