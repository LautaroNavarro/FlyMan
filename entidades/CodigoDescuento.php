<?php 

/**
* 
*/
class CodigoDescuento
{
	private $id;
	private $codigo;
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
	public function __construct2($codigo,$descuento)
	{
		$this->codigo = $codigo;
		$this->descuento = $descuento;
	}
	public function __construct3($id,$codigo,$descuento)
	{
		$this->id = $id;
		$this->codigo = $codigo;
		$this->descuento = $descuento;
	}

	public function getId(){
		return $this->id;
	}
	public function getCodigo(){
		return $this->codigo;
	}
	public function getDescuento(){
		return $this->descuento;
	}
	public function setId($id){
		$this->id = $id;
	}
	public function setCodigo($codigo){
		$this->codigo = $codigo;
	}
	public function setDescuento($descuento){
		$this->descuento = $descuento;
	}
}


 ?>