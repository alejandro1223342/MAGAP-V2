<?php
//incluir la conexion de base de datos
require "../config/Conexion.php";
class Inspeccion
{


    //implementamos nuestro constructor
    public function __construct()
    {
    }

    //metodo insertar registro



    /* Metodo listar solicitantes*/
    public function listar()
    {
        $sql = "CALL sp_inspeccion('list',0)";
        return ejecutarConsultaSP($sql);
    }
    /* Fin metodo listar solicitantes */
    public function listar_construcciones()
    {
        $sql = "CALL sp_inspeccion('list_const',0)";
        return ejecutarConsultaSP($sql);
    }

    /* Metodos llenar combobox */
    public function explicacion()
    {
        $sql = "CALL sp_catalgo('spa','0','', '',0)";
        return ejecutarConsultaSP($sql);
    }

    public function vias()
    {
        $sql = "CALL sp_catalgo('spa','0','', '',0)";
        return ejecutarConsultaSP($sql);
    }

    public function infraestructura()
    {
        $sql = "CALL sp_catalgo('spa','0','', '',0)";
        return ejecutarConsultaSP($sql);
    }

    public function historia()
    {
        $sql = "CALL sp_catalgo('spa','0','', '',0)";
        return ejecutarConsultaSP($sql);
    }

    public function obtencion()
    {
        $sql = "CALL sp_catalgo('spa','0','', '',0)";
        return ejecutarConsultaSP($sql);
    }

    public function construccion()
    {
        $sql = "CALL sp_catalgo('spa','0','', '',0)";
        return ejecutarConsultaSP($sql);
    }

    public function materiales()
    {
        $sql = "CALL sp_catalgo('spa','0','', '',0)";
        return ejecutarConsultaSP($sql);
    }

    public function estado_construccion()
    {
        $sql = "CALL sp_catalgo('spa','0','', '',0)";
        return ejecutarConsultaSP($sql);
    }

    public function concepto()
    {
        $sql = "CALL sp_catalgo('spa','0','', '',0)";
        return ejecutarConsultaSP($sql);
    }

    public function concepto_suelo()
    {
        $sql = "CALL sp_catalgo('spa','0','', '',0)";
        return ejecutarConsultaSP($sql);
    }

    public function estado_suelo()
    {
        $sql = "CALL sp_catalgo('spa','0','', '',0)";
        return ejecutarConsultaSP($sql);
    }

    public function destino_economico()
    {
        $sql = "CALL sp_catalgo('spa','0','', '',0)";
        return ejecutarConsultaSP($sql);
    }

    public function estado_infraestructura()
    {
        $sql = "CALL sp_catalgo('spa','0','', '',0)";
        return ejecutarConsultaSP($sql);
    }
    /* Fin metodos llenar combobox */

    public function mostrar($pro_id)
    {
        $sql = "call sp_inspeccion('mos',$pro_id)";
        $result = ejecutarConsultaSP($sql);
        return $result->fetch_assoc();
    }
}
