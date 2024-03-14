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
        $sql = "call sp_inspeccion_informes('ins_const',0,0,'$pro_id','$ins_dato1','$ins_dato2','$ins_dato3','$cat_id_1','$cat_id_2','$cat_id_3',0)";

        return ejecutarConsulta($sql);
    }

    public function guardaryeditar_tenencia($pro_id, $ins_dato1, $cat_id_1, $cat_id_2, $cat_id_3, $observaciones)
    {
        $sql = "call sp_inspeccion_informes('ins_ten',0,0,'$pro_id','$ins_dato1',0,0,'$cat_id_1','$cat_id_2','$cat_id_3','$observaciones')";

        return ejecutarConsulta($sql);
    }

    public function editar_tenencia($ins_id, $ins_dato1, $cat_id_1, $cat_id_2, $cat_id_3, $observaciones)
    {
        $sql = "call sp_inspeccion_informes('edit_ten',0,$ins_id,0,'$ins_dato1',0,0,'$cat_id_1','$cat_id_2','$cat_id_3','$observaciones')";

        return ejecutarConsulta($sql);
    }

    public function guardar_motivo($pro_id, $ins_dato1, $ins_dato2, $ins_dato3)
    {
        $sql = "CALL sp_inspeccion_informes('ins_motivo',
        0, 0,'$pro_id', 
        '$ins_dato1', '$ins_dato2', '$ins_dato3',
        0, 0, 0, 0);";
        return ejecutarConsulta($sql);
    }

    public function editar_motivo($ins_id, $ins_dato1, $ins_dato2, $ins_dato3)
    {
        $sql = "call sp_inspeccion_informes('edi_moti',0,'$ins_id',0,'$ins_dato1','$ins_dato2','$ins_dato3','0','0','0','0')";

        return ejecutarConsulta($sql);
    }

    public function guardar_coordenadas($pro_id, $ins_dato1, $ins_dato2)
    {
        $sql = "CALL sp_inspeccion_informes('ins_coor',
        0, 0,'$pro_id', 
        '$ins_dato1', '$ins_dato2',0,
        0, 0, 0, 0);";
        return ejecutarConsulta($sql);
    }

    public function guardar_usosuelo($pro_id, $cat_id_1, $ins_dato1, $cat_id_2, $ins_dato2)
    {
        $sql = "CALL sp_inspeccion_informes('ins_suelos',
        0, 0,'$pro_id', 
        '$ins_dato1', '$ins_dato2',0,
        '$cat_id_1', '$cat_id_2', 0, 0);";
        return ejecutarConsulta($sql);
    }

    public function guardar_agro($pro_id, $cat_id_1, $ins_dato1, $ins_dato2, $cat_id_2,)
    {
        $sql = "CALL sp_inspeccion_informes('ins_agro',
        0, 0,'$pro_id', 
        '$ins_dato1', '$ins_dato2',0,
        '$cat_id_1', '$cat_id_2', 0, 0);";
        return ejecutarConsulta($sql);
    }

    public function guardar_apoyo($pro_id,  $ins_dato1, $cat_id_1, $ins_dato2,)
    {
        $sql = "CALL sp_inspeccion_informes('ins_apoyo',
        0, 0,'$pro_id', 
        '$ins_dato1', '$ins_dato2',0,
        '$cat_id_1', 0, 0, 0);";
        return ejecutarConsulta($sql);
    }

    public function guardar_semovientes($pro_id, $cat_id_1, $ins_dato1, $cat_id_2, $ins_dato2)
    {
        $sql = "CALL sp_inspeccion_informes('ins_semo',
        0, 0,'$pro_id', 
        '$ins_dato1', '$ins_dato2',0,
        '$cat_id_1', '$cat_id_2', 0, 0);";
        return ejecutarConsulta($sql);
    }

    public function guardar_agrologicas($pro_id, $ins_dato1, $ins_dato2, $ins_dato3, $cat_id_1, $cat_id_2, $cat_id_3)
    {
        $sql = "CALL sp_inspeccion_informes('ins_agrolo',
        0, 0,'$pro_id', 
        '$ins_dato1', '$ins_dato2','$ins_dato3',
        '$cat_id_1', '$cat_id_2', '$cat_id_3', 0);";
        return ejecutarConsulta($sql);
    }

    public function guardar_agrologicas2($pro_id, $cat_id_1, $ins_dato1, $ins_dato2, $ins_dato3,)
    {
        $sql = "CALL sp_inspeccion_informes('ins_agrolo2',
        0, 0,'$pro_id', 
        '$ins_dato1', '$ins_dato2','$ins_dato3',
        '$cat_id_1', 0, 0, 0);";
        return ejecutarConsulta($sql);
    }

    /*  public function guardar_infraestructura($pro_id, $cat_id_1)
    {
        foreach ($cat_id_1 as $cat_id_list) {
            $sql = "CALL sp_inspeccion_informes('ins_infra',
            0, 0,'$pro_id', 
            0, 0,0,
            '$cat_id_list', 0, 0, 0);";
            return ejecutarConsulta($sql);
        }
    } */
    public function guardar_infraestructura($pro_id, $cat_id_1)
    {
        foreach ($cat_id_1 as $cat_id_list) {
            $sql = "CALL sp_inspeccion_informes('ins_infra',
            0, 0,'$pro_id', 
            0, 0,0,
            '$cat_id_list', 0, 0, 0);";
            ejecutarConsulta($sql);
        }

        // Si la ejecución de las consultas fue exitosa, devolver verdadero
        return true;
    }






    /* Metodo listar solicitantes*/
    public function listar()
    {
        $sql = "CALL sp_inspeccion_informes('list',0, 0, 
        0, 0, 0, 
        0, 0, 0,
        0, 0)";
        return ejecutarConsultaSP($sql);
    }
    /* Fin metodo listar construcciones */
    public function listar_construcciones()
    {
        $sql = "CALL sp_inspeccion_informes('list_const',0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
        return ejecutarConsultaSP($sql);
    }

    public function listar_coordenadas($pro_id)
    {
        $sql = "CALL sp_inspeccion_informes('list_coor','$pro_id', 0, 0, 0, 0, 0, 0, 0, 0, 0)";
        return ejecutarConsultaSP($sql);
    }

    public function listar_agropecuaria()
    {
        $sql = "CALL sp_inspeccion_informes('list_agro',0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
        return ejecutarConsultaSP($sql);
    }

    public function listar_usosuelos()
    {
        $sql = "CALL `sp_inspeccion_informes`('list_suelo', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
        return ejecutarConsultaSP($sql);
    }

    public function listar_semovientes()
    {
        $sql = "CALL `sp_inspeccion_informes`('list_suelo', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
        return ejecutarConsultaSP($sql);
    }

    public function listar_apoyo()
    {
        $sql = "CALL `sp_inspeccion_informes`('list_apoyo', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
        return ejecutarConsultaSP($sql);
    }


    /* Fin */
    /* Metodos llenar combobox */
    public function explicacion()
    {
        $sql = "CALL sp_catalgo('spa2','0','', '',0)";
        return ejecutarConsultaSP($sql);
    }

    public function vias()
    {
        $sql = "CALL sp_catalgo('spa2','0','', '',0)";
        return ejecutarConsultaSP($sql);
    }

    public function infraestructura()
    {
        $sql = "CALL sp_catalgo('spa2','0','', '',0)";
        return ejecutarConsultaSP($sql);
    }

    public function historia()
    {
        $sql = "CALL sp_catalgo('spa2','0','', '',0)";
        return ejecutarConsultaSP($sql);
    }

    public function obtencion()
    {
        $sql = "CALL sp_catalgo('spa2','0','', '',0)";
        return ejecutarConsultaSP($sql);
    }

    public function construccion()
    {
        $sql = "CALL sp_catalgo('spa2','0','', '',0)";
        return ejecutarConsultaSP($sql);
    }

    public function materiales()
    {
        $sql = "CALL sp_catalgo('spa2','0','', '',0)";
        return ejecutarConsultaSP($sql);
    }

    public function estado_construccion()
    {
        $sql = "CALL sp_catalgo('spa2','0','', '',0)";
        return ejecutarConsultaSP($sql);
    }

    public function concepto()
    {
        $sql = "CALL sp_catalgo('spa2','0','', '',0)";
        return ejecutarConsultaSP($sql);
    }

    public function concepto_suelo()
    {
        $sql = "CALL sp_catalgo('spa2','0','', '',0)";
        return ejecutarConsultaSP($sql);
    }

    public function estado_suelo()
    {
        $sql = "CALL sp_catalgo('spa2','0','', '',0)";
        return ejecutarConsultaSP($sql);
    }

    public function destino_economico()
    {
        $sql = "CALL sp_catalgo('spa2','0','', '',0)";
        return ejecutarConsultaSP($sql);
    }

    public function estado_infraestructura()
    {
        $sql = "CALL sp_catalgo('spa2','0','', '',0)";
        return ejecutarConsultaSP($sql);
    }

    public function tipo_posesion()
    {
        $sql = "CALL sp_catalgo('spa2','0','', '',0)";
        return ejecutarConsultaSP($sql);
    }

    public function apoyo()
    {
        $sql = "CALL sp_catalgo('spa2','0','', '',0)";
        return ejecutarConsultaSP($sql);
    }

    public function concepto_semovientes()
    {
        $sql = "CALL sp_catalgo('spa2','0','', '',0)";
        return ejecutarConsultaSP($sql);
    }

    public function estado_semovientes()
    {
        $sql = "CALL sp_catalgo('spa2','0','', '',0)";
        return ejecutarConsultaSP($sql);
    }

    public function fertilidad()
    {
        $sql = "CALL sp_catalgo('spa2','0','', '',0)";
        return ejecutarConsultaSP($sql);
    }

    public function textura()
    {
        $sql = "CALL sp_catalgo('spa2','0','', '',0)";
        return ejecutarConsultaSP($sql);
    }

    public function profundidad()
    {
        $sql = "CALL sp_catalgo('spa2','0','', '',0)";
        return ejecutarConsultaSP($sql);
    }

    public function clase_suelo()
    {
        $sql = "CALL sp_catalgo('spa2','0','', '',0)";
        return ejecutarConsultaSP($sql);
    }




    /* Fin metodos llenar combobox */

    public function mostrar($pro_id)
    {
        $sql = "call sp_inspeccion_informes('mos',$pro_id,0,0,0,0,0,0,0,0,0)";
        $result = ejecutarConsultaSP($sql);
        return $result->fetch_assoc();
    }

    public function mostrar_ten($pro_id)
    {
        $sql = "call sp_inspeccion_informes('mos_ten',$pro_id,0,0,0,0,0,0,0,0,0)";
        $result = ejecutarConsultaSP($sql);
        return $result->fetch_assoc();
    }

    public function mostrar_motivo($pro_id)
    {
        $sql = "CALL `sp_inspeccion_informes`('mos_motivo',
        $pro_id, 0, '0', 
        '0', '0', '0',
        0, 0, 0, 0);";
        $result = ejecutarConsultaSP($sql);
        return $result->fetch_assoc();
    }

    public function mostrar_caragro($pro_id)
    {
        $sql = "CALL `sp_inspeccion_informes`('mos_caragro',
        $pro_id, 0, '0', 
        '0', '0', '0',
        0, 0, 0, 0);";
        $result = ejecutarConsultaSP($sql);
        return $result->fetch_assoc();
    }
    /* Metodos para eiminar información de las tablas */

    public function eliminar($ins_id)
    {
        $sql = "CALL sp_inspeccion_informes('elim_const',0,$ins_id,0,0,0,0,0,0,0,0)";
        return ejecutarConsulta($sql);
    }
}
