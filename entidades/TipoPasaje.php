<?php 


/**
* 
*/
class TipoPasaje 
{
	private $id;
	private $nombre;
	private $descuento;

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
	public function __construct1($nombre)
	{
		$this->nombre = $nombre;
	}
	public function __construct2($nombre,$descuento)
	{
		$this->nombre = $nombre;
		$this->descuento = $descuento;
	}
	public function __construct3($id,$nombre,$descuento)
	{
		$this->id = $id;
		$this->nombre = $nombre;
		$this->descuento = $descuento;
	}

	public function setId($id){
		$this->id = $id;
	}
	public function getId(){
		return $this->id;
	}
	public function setNombre($nombre){
		$this->nombre = $nombre;
	}
	public function getNombre(){
		return $this->nombre;
	}
	public function setDescuento($descuento){
		$this->descuento = $descuento;
	}
	public function getDescuento(){
		return $this->descuento;
	}
}


 ?>