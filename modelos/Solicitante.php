<?php 
//incluir la conexion de base de datos
require "../config/Conexion.php";
class Solicitante{


	//implementamos nuestro constructor
public function __construct(){

}


public function verificar($usu_login,$usu_clave){
	$sql="call sp_logeo('sol','$usu_login','$usu_clave');";
   // return $sql;
	return ejecutarConsultaSP($sql);	
}

}
?>