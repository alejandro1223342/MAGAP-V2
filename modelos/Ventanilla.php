<?php 
//incluir la conexion de base de datos
require "../config/Conexion.php";


class Ventanilla{


	//implementamos nuestro constructor
public function __construct(){

}

public function listar(){
	$sql="call sp_ventanilla ('list', 0, 0, 0, 0, 0)";
	return ejecutarConsultaSP($sql);
}

public function estado(){
	$sql="CALL sp_catalgo('spa','0','', '',15)";
	return ejecutarConsultaSP($sql);
}


public function mostrar($tra_id){
	$sql="call sp_ventanilla('mos','$tra_id',0,0,0,0)";
	$result = ejecutarConsultaSP($sql);
	return $result->fetch_assoc();

	//$row=ejecutarConsultaSP($sql);
	//$sql="SELECT * FROM usuario where usu_id=usu_id";
	//return $row->fetch_row();
	//ejecutarConsultaSimpleFila($sql));
}

	public function tabla($id)
	{
		$sql = "call sp_documentosol('listedi',0,0,'$id',0)";
		return ejecutarConsulta($sql);
	}


public function insertar($usu_id,$tra_id,$cat_id_estado,$pro_observacion){

	$sql="call sp_ventanilla('ing',0, '$usu_id', '$tra_id', '$cat_id_estado','$pro_observacion')";
		
	return ejecutarConsulta($sql);
}

	public function guardardocumento($usu_id, $tra_id)
	{
		$sql = "CALL sp_procesos('ven', 0, $usu_id, $tra_id, 0, 0)";
		return ejecutarConsulta($sql);
	}

}

