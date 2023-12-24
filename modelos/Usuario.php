<?php 
//incluir la conexion de base de datos
require "../config/Conexion.php";

class Usuario{


	//implementamos nuestro constructor
public function __construct(){

}


public function verificar($usu_login,$usu_clave){
	$sql="call sp_logeo('usu','$usu_login','$usu_clave');";
   // return $sql;
	return ejecutarConsultaSP($sql);	
}

//metodo para listar permmisos marcados de un usuario especifico
public function listarmarcados($usu_id){	
	$sql="call sp_permisos('$usu_id');";
	//$sql="SELECT * FROM usuario_permiso WHERE idusuario=$usu_id";
	return ejecutarConsultaSP($sql);
}

}
?>