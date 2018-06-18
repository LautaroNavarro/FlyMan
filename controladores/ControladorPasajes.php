<?php 


class ControladorPasajes
{
	public static function selectAllWhereIdpPersona($idPersona){
		return DaoPasaje::selectAllWhereIdpPersona($idPersona);
	}
	public static function selectAllPasajes(){
		return DaoPasaje::selectAll();
	}
	public static function selectOneWhereVueloAndPersona($vuelo,$persona){
		return DaoPasaje::selectOneWhereVueloAndPersona($vuelo,$persona);
	}
	public static function selectPasajeById($idPasaje){
		return DaoPasaje::insertOne($idPasaje);
	}
	public static function selectAllDisponbilesWhereIdVuelo($idVuelo){
		return DaoPasaje::selectAllDisponbilesWhereIdVuelo($idVuelo);
	}
	public static function selectOneDisponibleWhereIdVuelo($idVuelo){
		return DaoPasaje::selectOneWhereDisponibleAndIdVuelo($idVuelo);
	}
	public static function selectPasajesPersona($idPersona){
		return DaoPasaje::selectAllWhereIdpPersona($idPersona);
	}
	public static function comprarPasaje($persona, $id_pasaje){
		$pasaje = DaoPasaje::selectOne($id_pasaje);
		if ($pasaje->getEstado() == Pasaje::DISPONIBLE) {
			DaoPasaje::buyOne($persona, $pasaje);
			$_SESSION['mensaje'] = "Pasaje comprado con exito";
			header("location: ../buscarVuelo.php");
		}else{
			$_SESSION['mensaje'] = "Lo sentimos, el pasaje ya fue reservado o comprado";
			header("location: ../vuelos.php");
		}
	}
}


 ?>