<?php 

/**
* 
*/
class Reserva
{
	private $id;
	private $pasaje;
	private $fechaReserva;
	public function __construct(){
		$params = func_get_args();
		$num_params = func_num_args();
		$funcion_constructor ='__construct'.$num_params;
		if (method_exists($this,$funcion_constructor)) {
			call_user_func_array(array($this,$funcion_constructor),$params);
		}
	}
	public function __construct2($pasaje, $fechaReserva)
	{
		$this->pasaje = $pasaje;
		$this->fechaReserva = $fechaReserva;
	}
	public function __construct3($id,  $pasaje, $fechaReserva)
	{
		$this->id = $id;
		$this->pasaje = $pasaje;
		$this->fechaReserva = $fechaReserva;
	}

	public function setFechaReserva($fechaReserva){
		$this->fechaReserva = $fechaReserva;
	}
	public function getFechaReserva (){
		return $this->fechaReserva;
	}
	public function setId($id){
		$this->id = $id;
	}
	public function setPasaje($pasajes){
		$this->pasajes = $pasajes;
	}
	public function getId (){
		return $this->id;
	}
	public function getPasaje(){
		return $this->pasaje;
	}
}


 ?>