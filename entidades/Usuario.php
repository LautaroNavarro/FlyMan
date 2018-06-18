<?php 

/**
* 
*/
class Usuario 
{
	private $id;
	private $email;
	private $password;

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
	public function __construct2($email, $password){
		$this->email = $email;
		$this->password = md5($password);
	}
	public function __construct3($id,$email, $password){
		$this->id = $id;
		$this->email = $email;
		$this->password = md5($password);
	}

	public function getId(){
		return $this->id;
	}
	public function setEmail($email){
		$this->email = $email;
	}
	public function setPassword($password){
		$this->password = md5($password);
	}

	public function getEmail(){
		return $this->email;
	}
	public function getPassword(){
		return $this->password;
	}

}


 ?>