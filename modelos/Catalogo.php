<?php
//incluir la conexion de base de datos
require "../config/Conexion.php";
class Catalogo
{


	//implementamos nuestro constructor
	public function __construct()
	{
	}

	//metodo insertar registro
	public function insertar($cat_nombre, $cat_descripcion, $cat_padre)
	{
		$sql = "call sp_catalgo('ing','0','$cat_nombre','$cat_descripcion',$cat_padre)";

		return ejecutarConsulta($sql);
	}


	public function mostrar()
	{
		$sql = "CALL sp_catalgo('spa','0','', '',0)";
		return ejecutarConsultaSP($sql);
	}

	public function listar()
	{
		$sql = "CALL sp_catalgo('list','0','', '',0)";
		return ejecutarConsultaSP($sql);
	}

	public function desactivar($cat_id)
	{
		$sql = "CALL sp_catalgo('des','$cat_id','', '',0)";
		return ejecutarConsulta($sql);
	}
	public function activar($cat_id)
	{
		$sql = "CALL sp_catalgo('act','$cat_id','', '',0)";
		return ejecutarConsulta($sql);
	}
}
