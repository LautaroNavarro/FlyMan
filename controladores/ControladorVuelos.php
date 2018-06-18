<?php 


class ControladorVuelos
{
	public static function selectOneByIdPasaje($idpasaje){
		return DaoVuelo::selectOneByIdPasaje($idpasaje);
	}
	public static function selectAllVuelos(){
		return DaoVuelo::selectAll();
	}
	public static function selectOneVuelo($idVuelo){
		return DaoVuelo::selectOne($idVuelo);
	}
	public static function selectVuelosWhereIdPersona($idPersona){
		return DaoVuelo::selectVuelosWhereIdPersona($idPersona);
	}
}


 ?>