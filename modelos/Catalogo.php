<?php 
//incluir la conexion de base de datos
require "../config/Conexion.php";
class Catalogo{


	//implementamos nuestro constructor
public function __construct(){

}


public function mostrar(){
	$sql="CALL sp_catalgo('spa','0','', '',0)";
	return ejecutarConsultaSP($sql);
}

public function listar(){
	$sql="CALL sp_catalgo('list','0','', '',0)";
	return ejecutarConsultaSP($sql);
}

}