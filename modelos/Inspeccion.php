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

    public function guardar_construccion($pro_id, $ins_dato1, $ins_dato2, $ins_dato3, $cat_id_1, $cat_id_2, $cat_id_3)
    {
        $sql = "call sp_inspeccion('ins_const',0,0,'$pro_id','$ins_dato1','$ins_dato2','$ins_dato3','$cat_id_1','$cat_id_2','$cat_id_3',0)";

        return ejecutarConsulta($sql);
    }

    public function guardaryeditar_tenencia($pro_id, $ins_dato1, $cat_id_1, $cat_id_2, $cat_id_3, $observaciones)
    {
        $sql = "call sp_inspeccion('ins_ten',0,0,'$pro_id','$ins_dato1',0,0,'$cat_id_1','$cat_id_2','$cat_id_3','$observaciones')";

        return ejecutarConsulta($sql);
    }


    /* Metodo listar solicitantes*/
    public function listar()
    {
        $sql = "CALL sp_inspeccion('list',0, 0, 
        0, 0, 0, 
        0, 0, 0,
        0, 0)";
        return ejecutarConsultaSP($sql);
    }
    /* Fin metodo listar construcciones */
    public function listar_construcciones()
    {
        $sql = "CALL sp_inspeccion('list_const',0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
        return ejecutarConsultaSP($sql);
    }

    public function listar_infraestructura()
    {
        $sql = "CALL sp_inspeccion('list_agro',0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
        return ejecutarConsultaSP($sql);
    }


    /* Fin */
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

    public function tipo_posesion()
    {
        $sql = "CALL sp_catalgo('spa','0','', '',0)";
        return ejecutarConsultaSP($sql);
    }
    /* Fin metodos llenar combobox */

    public function mostrar($pro_id)
    {
        $sql = "call sp_inspeccion('mos',$pro_id,0,0,0,0,0,0,0,0,0)";
        $result = ejecutarConsultaSP($sql);
        return $result->fetch_assoc();
    }

    public function mostrar_ten($pro_id)
    {
        $sql = "call sp_inspeccion('mos_ten',$pro_id,0,0,0,0,0,0,0,0,0)";
        $result = ejecutarConsultaSP($sql);
        return $result->fetch_assoc();
    }

    /* Metodos para eiminar información de las tablas */

    public function eliminar($ins_id)
    {
        $sql = "CALL sp_inspeccion('elim_const',0,$ins_id,0,0,0,0,0,0,0,0)";
        return ejecutarConsulta($sql);
    }
}
