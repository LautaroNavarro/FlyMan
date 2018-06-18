<?php 


/**
* 
*/
class Lugar 
{
	private $id;
	private $nombre;

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
	public function __construct2($id,$nombre)
	{
		$this->id = $id;
		$this->nombre = $nombre;
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

}


 ?>