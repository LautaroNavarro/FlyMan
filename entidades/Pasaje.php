<?php 

/**
* 
*/
class Pasaje
{
	private $id;
	private $estado;
	private $tipoPasaje;

	const DISPONIBLE = "Disponible"; 
	const RESERVADO = "Reservado";
	const COMPRADO = "Comprado";
	
	public function __construct(){
		$params = func_get_args();
		$num_params = func_num_args();
		$funcion_constructor ='__construct'.$num_params;
		if (method_exists($this,$funcion_constructor)) {
			call_user_func_array(array($this,$funcion_constructor),$params);
		}
	}
	public function __construct0(){

	}
	public function __construct2($estado,$tipoPasaje){
		$this->estado = $estado;
		$this->tipoPasaje = $tipoPasaje;
	}
	public function __construct3($id, $estado,$tipoPasaje)
	{
		$this->id = $id;
		$this->estado = $estado;
		$this->tipoPasaje = $tipoPasaje;
	}

	public function setId($id){
		$this->id = $id;
	}
	public function setEstado($estado){
		$this->estado = $estado;
	}
	public function getId(){
		return $this->id;
	}
	public function getEstado(){
		return $this->estado;
	}
	public function setTipoPasaje($tipoPasaje){
		$this->tipoPasaje = $tipoPasaje;
	}
	public function getTipoPasaje(){
		return $this->tipoPasaje;
	}
}


 ?>