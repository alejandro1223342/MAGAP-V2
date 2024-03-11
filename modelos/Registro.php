<?php
//incluir la conexion de base de datos
require "../config/Conexion.php";

class Registro
{
    //implementamos nuestro constructor
    public function __construct()
    {

    }

    public function insertar($cat_id_identificacion, $sol_identificacion, $sol_correo, $sol_nombre,
                             $sol_telefono, $sol_direccion, $cat_id_provincia, $cat_id_canton, $cat_id_parroquia,
                             $cat_id_sector, $sol_clave)
    {

        $sql = "call sp_solicitante('ing','$cat_id_identificacion','$sol_identificacion','$sol_correo',
	'$sol_nombre','$sol_telefono','$sol_direccion','$cat_id_provincia','$cat_id_canton',
	'$cat_id_parroquia','$cat_id_sector','$sol_clave')";
        return ejecutarConsulta($sql);
    }

    public function identificacion()
    {
        $sql = "CALL sp_catalgo('spa2','0','', '',1)";
        return ejecutarConsultaSP($sql);
    }

    public function provincia()
    {
        $sql = "CALL sp_catalgo('spa2','0','', '',4)";
        return ejecutarConsultaSP($sql);
    }

    public function canton()
    {
        $sql = "CALL sp_catalgo('spa2','0','', '',5)";
        return ejecutarConsultaSP($sql);
    }

    public function parroquia($padre)
    {
        $sql = "CALL sp_catalgo('spa2','0','', '',$padre)";
        return ejecutarConsultaSP($sql);
    }

    public function sector()
    {
        $sql = "CALL sp_catalgo('spa2','0','', '',7)";
        return ejecutarConsultaSP($sql);

    }
}

