<?php 

/**
* 
*/
class Vuelo	
{
	private $id;
	private $fechaSalida;
	private $fechaLlegada;
	private $origen;
	private $destino;
	private $pasajes;
	private $codigoDescuento;
	private $precio;
	
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
	public function __construct7($fechaSalida,$fechaLlegada,$origen,$destino,$pasajes,$codigoDescuento,$precio){
		$this->fechaSalida = $fechaSalida;
		$this->fechaLlegada = $fechaLlegada;
		$this->origen = $origen;
		$this->destino = $destino;
		$this->pasajes = $pasajes; 
		$this->codigoDescuento = $codigoDescuento;
		$this->precio = $precio;
	}
	public function __construct8($id,$fechaSalida,$fechaLlegada,$origen,$destino,$pasajes,$codigoDescuento,$precio){
		$this->id = $id;	
		$this->fechaSalida = $fechaSalida;
		$this->fechaLlegada = $fechaLlegada;
		$this->origen = $origen;
		$this->destino = $destino;
		$this->pasajes = $pasajes; 
		$this->codigoDescuento = $codigoDescuento;
		$this->precio = $precio;
	}
	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}
	public function getFechaSalida(){
		return $this->fechaSalida;
	}

	public function setFechaSalida($fechaSalida){
		$this->fechaSalida = $fechaSalida;
	}

	public function getFechaLlegada(){
		return $this->fechaLlegada;
	}

	public function setFechaLlegada($fechaLlegada){
		$this->fechaLlegada = $fechaLlegada;
	}

	public function getOrigen(){
		return $this->origen;
	}

	public function setOrigen($origen){
		$this->origen = $origen;
	}

	public function getDestino(){
		return $this->destino;
	}

	public function setDestino($destino){
		$this->destino = $destino;
	}

	public function getPasajes(){
		return $this->pasajes;
	}

	public function setPasajes($pasajes){
		$this->pasajes = $pasajes;
	}

	public function getCodigoDescuento(){
		return $this->codigoDescuento;
	}

	public function setCodigoDescuento($codigoDescuento){
		$this->codigoDescuento = $codigoDescuento;
	}

	public function getPrecio(){
		return $this->precio;
	}

	public function setPrecio($precio){
		$this->precio = $precio;
	}
}


 ?>