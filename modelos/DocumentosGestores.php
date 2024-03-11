<?php
require "../config/Conexion.php";
class DocumentosGestores
{
    public function __construct()
    {

    }

    public function insertar($sol_iden, $fileName, $doc_url, $tra_pro)
    {
        $sql_check = "Call sp_documentosol('compDoc', $tra_pro + 2, 0, '$fileName', '0')";
        $result_check = ejecutarConsultaSP($sql_check);
        $row_check = $result_check->fetch_assoc();

        if ($row_check['count_id'] > 0) {
            // El id con ese nombre ya existe, no se puede insertar
            return false;
        } else {
            // El id con ese nombre no existe, se puede realizar la inserción
            $sql = "CALL sp_documentosol('ingGestor', '$sol_iden','$fileName', '$doc_url')";
            $result = ejecutarConsultaSP($sql);
            if ($result !== false) {
                $iddoc = $result->fetch_row()[0];
                $current_sol_id = $_SESSION['usu_id'];
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
}
