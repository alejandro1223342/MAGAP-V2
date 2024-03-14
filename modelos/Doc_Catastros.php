<?php
//incluir la conexion de base de datos
require "../config/Conexion.php";

require "../ajax/usuario.php";

class Doc_Catastros
{
    //implementamos nuestro constructor
    public function __construct()
    {

    }

    public function insertar($usu_cedula, $cat_id_tipodoc, $fileName, $doc_url, $tra_pro)
    {
        $sql_check = "Call sp_documentosol('compDoc', $tra_pro + 2, 0, '$fileName', '0')";
        $result_check = ejecutarConsultaSP($sql_check);
        $row_check = $result_check->fetch_assoc();

        if ($row_check['count_id'] > 0) {
            // El id con ese nombre ya existe, no se puede insertar
            return false;
        } else {
            // El id con ese nombre no existe, se puede realizar la inserción
            $sql = "CALL sp_documentosol('ing', '$usu_cedula', $cat_id_tipodoc, '$fileName', '$doc_url')";
            $result = ejecutarConsultaSP($sql);

            if ($result !== false) {
                $iddoc = $result->fetch_row()[0];
                $current_sol_id = $_SESSION['sol_id'];
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

//metodo para mostrar registros
    public function documentos()
    {
        $sql = "CALL sp_catalgo('spa','0','', '',32)";
        return ejecutarConsultaSP($sql);
    }

    public function mostrar($doc_id)
    {
        $sql = "SELECT doc_id, SUBSTRING_INDEX(doc_nombre, '-', 1) AS doc_nombre, doc_url, doc_fechareg
                FROM documentos
                WHERE doc_id = $doc_id;";

        $result = ejecutarConsultaSP($sql);
        return $result->fetch_assoc();

    }

//listar registros
    public function listar()
    {
        $sql = "call sp_catastro ('listCheck', 0, 0, 0, 0, 0)";
        return ejecutarConsultaSP($sql);
    }

    public function listarPredefinido($usu_cedula, $nombre)
    {
        $doc_nombre = $nombre . '-' . $usu_cedula;
        $sql = "CALL sp_documentosol('listGestor','$usu_cedula', 0,'$doc_nombre','');";
        return ejecutarConsultaSP($sql);
    }

    public function aprobardocumento($usu_id, $tra_id, $cat_id_estado, $pro_observacion)
    {
        // Ejecutar la consulta y obtener el resultado
        $sql = "CALL sp_procesos('catCheck', 0, $usu_id, $tra_id, $cat_id_estado, '$pro_observacion')";
        return ejecutarConsulta($sql);
    }

//listar y mostrar en selct
    public function select()
    {
        $sql = "SELECT * FROM categoria WHERE condicion=1";
        return ejecutarConsulta($sql);
    }
}

?>
