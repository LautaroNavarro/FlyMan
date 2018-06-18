<?php 

/**
* 
*/
class Persona 
{
	private $id;
	private $nombre;
	private $apellido;
	private $fechaNacimiento;
	private $numeroTarjeta;
	private $nacionalidad;
	private $usuario;
	private $pasajes;
	private $reservas;

	public function __construct(){
		$params = func_get_args();
		$num_params = func_num_args();
		$funcion_constructor ='__construct'.$num_params;
		if (method_exists($this,$funcion_constructor)) {
			call_user_func_array(array($this,$funcion_constructor),$params);
		}
	}
	function __construct0(){
	}
	function __construct7($nombre,$apellido,$fechaNacimiento,$numeroTarjeta,$nacionalidad,$usuario,$reservas){
		$this->nombre = $nombre;
		$this->apellido = $apellido;
		$this->fechaNacimiento = $fechaNacimiento;
		$this->numeroTarjeta = $numeroTarjeta;
		$this->nacionalidad = $nacionalidad;
		$this->usuario = $usuario;
		$this->reservas = $reservas;
	}
	function __construct8($id,$nombre,$apellido,$fechaNacimiento,$numeroTarjeta,$nacionalidad,$usuario,$reservas){
		$this->id = $id;
		$this->nombre = $nombre;
		$this->apellido = $apellido;
		$this->fechaNacimiento = $fechaNacimiento;
		$this->numeroTarjeta = $numeroTarjeta;
		$this->nacionalidad = $nacionalidad;
		$this->usuario = $usuario;
		$this->reservas = $reservas;
	}
	function __construct9($id,$nombre,$apellido,$fechaNacimiento,$numeroTarjeta,$nacionalidad,$usuario,$reservas,$pasajes){
		$this->id = $id;
		$this->nombre = $nombre;
		$this->apellido = $apellido;
		$this->fechaNacimiento = $fechaNacimiento;
		$this->numeroTarjeta = $numeroTarjeta;
		$this->nacionalidad = $nacionalidad;
		$this->usuario = $usuario;
		$this->reservas = $reservas;
		$this->pasajes = $pasajes;
	}

	public function setPasajes($pasajes){
		$this->pasajes = $pasajes;
	}
	public function getPasajes(){
		return $this->pasajes;
	}

	public function setReservas ($reservas){
		$this->reservas = $reservas;
	}
	public function getReservas(){
		return $this->reservas;
	}
	public function setUsuario($usuario){
		$this->usuario = $usuario; 
	}
	public function getUsuario() {
		return $this->usuario; 
	}
	public function setId($id){
		$this->id = $id; 
	}
	public function getId() {
		return $this->id; 
	}
	public function setNombre($nombre){
		$this->nombre = $nombre; 
	}
	public function getNombre() {
		return $this->nombre; 
	}
	public function setApellido($apellido) {
		$this->apellido = $apellido; 
	}
	public function getApellido() {
		return $this->apellido; 
	}
	public function setFechaNacimiento($fechaNacimiento) {
		$this->fechaNacimiento = $fechaNacimiento; 
	}
	public function getFechaNacimiento() {
		return $this->fechaNacimiento; 
	}
	public function setNumeroTarjeta($numeroTarjeta) {
		$this->numeroTarjeta = $numeroTarjeta; 
	}
	public function getNumeroTarjeta() {
		return $this->numeroTarjeta; 
	}
	public function setNacionalidad($nacionalidad) {
		$this->nacionalidad = $nacionalidad; 
	}
	public function getNacionalidad() {
		return $this->nacionalidad; 
	}
}


 ?>