<?php
require "../config/Conexion.php";
require "../ajax/usuario.php";

class DocumentosGestores
{
    public function __construct()
    {

    }

    public function insertarGestor($sol_iden, $cat_id_tipodoc, $fileName, $doc_url, $tra_pro, $sol_id)
    {
        $sql_check = "Call sp_documentosol('compDoc', $tra_pro + 2, 0, '$fileName', '0')";
        $result_check = ejecutarConsultaSP($sql_check);
        $row_check = $result_check->fetch_assoc();

        if ($row_check['count_id'] > 0) {
            // El id con ese nombre ya existe, no se puede insertar
            return false;
        } else {
            // El id con ese nombre no existe, se puede realizar la inserción
            $sql = "CALL sp_documentosol('ing', '$sol_iden', $cat_id_tipodoc, '$fileName', '$doc_url')";
            $result = ejecutarConsultaSP($sql);
            if ($result !== false) {
                $iddoc = $result->fetch_row()[0];
                $current_sol_id = $sol_id;
                $sql_detalle = "CALL sp_tramites('ing','$current_sol_id', '$iddoc');";
                ejecutarConsultaSP($sql_detalle);
                return true;
            } else {
                return false;
            }
        }
    }

    public function editar($doc_id, $doc_nombre, $doc_url)
    {
        $sql = "call sp_documentosol('edit','$doc_id','0','$doc_nombre','$doc_url')";
        return ejecutarConsulta($sql);
    }

    public function editarGestor($doc_id, $doc_nombre, $doc_url)
    {
        $sql = "call sp_documentosol('edit','$doc_id','0','$doc_nombre','$doc_url')";
        return ejecutarConsulta($sql);
    }

    public function procesoActual($cedula)
    {
        $sql = "CALL sp_tramite_actual(0,'$cedula');";
        return ejecutarConsultaSP($sql);
    }

    public function obtenerIDSol($cedula)
    {
        $sql = "call sp_solicitante('id','0','$cedula','0',
	            '0','0','0','0','0','0','0','0')";
        $result = ejecutarConsultaSP($sql);
        $row = $result->fetch_assoc();
        return $row['sol_id'];
    }

}