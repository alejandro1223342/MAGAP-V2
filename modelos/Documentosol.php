<?php
//incluir la conexion de base de datos
require "../config/Conexion.php";

require "../ajax/solicitante.php";

class Documentosol
{
    //implementamos nuestro constructor
    public function __construct()
    {

    }

//metodo insertar regiustro
    public function insertar($sol_iden, $cat_id_tipodoc, $fileName, $doc_url, $tra_pro)
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
                $current_sol_id = $_SESSION['sol_id'];
                $sql_detalle = "CALL sp_tramites('ing','$current_sol_id', '$iddoc');";
                ejecutarConsultaSP($sql_detalle);

                return true;
            } else {
                return false;
            }
        }
    }


    /*
    public function insertar($cat_id_tipodoc,$doc_nombre,$doc_url){
        $sql="call sp_documentosol('ing', 0, '$cat_id_tipodoc', '$doc_nombre', '$doc_url')";
        //return ejecutarConsulta($sql);
        $iddoc = ejecutarConsultaSP($sql)->fetch_row()[0];

        // Verificamos si el session tiene valor

        if (empty($_SESSION['sol_id'])) {
            echo "El session no tiene valor";
            return false;
        }

        // Verificamos si el iddoc tiene valor

        if (is_null($iddoc)) {
            echo "El iddoc no tiene valor";
            return false;
        }

        // Si llegamos a este punto, el session y el iddoc tienen valor

        if (empty($_SESSION['sol_id'])) {
            echo "El array sol_id esta vacio";
            return false;
        }

        foreach($_SESSION['sol_id'] as $current_sol_id){

            echo "El valor de current_sol_id es nulo o vacio";
            $sql2="call sp_tramites('ing','$current_sol_id', '$iddoc')";
            ejecutarConsultaSP($sql2);

        }

        return true;

    }
    */

    public function editar($doc_id, $doc_nombre, $doc_url)
    {
        $sql = "call sp_documentosol('edit','$doc_id','0','$doc_nombre','$doc_url')";
        return ejecutarConsulta($sql);
    }

//metodo para mostrar registros
    public function documentos()
    {
        $sql = "CALL sp_catalgo('spa','0','', '',13)";
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
    public function listar($sol_identificacion, $nombre)
    {
        $doc_nombre = $nombre . '-' . $sol_identificacion;
        $sql = "CALL sp_documentosol('list',$sol_identificacion, 0,'$doc_nombre','');";
        return ejecutarConsultaSP($sql);
    }

    public function procesosFinalizados($sol_identificacion, $tra_pro)
    {
        $sql = "CALL sp_procesos('profin',0, 0,$tra_pro,0,'$sol_identificacion');";
        return ejecutarConsultaSP($sql);
    }

    public function listafin($sol_id)
    {
        $sql = "CALL sp_procesos('listafin',$sol_id, 0,0,0,0);";
        return ejecutarConsultaSP($sql);
    }

    public function notificaciones($sol_identificacion)
    {
        $sql = "CALL sp_documentosol('notify',$sol_identificacion, 0,'','');";
        return ejecutarConsultaSP($sql);
    }

    public function procesoSol($sol_id)
    {
        $sql = "CALL sp_documentosol('prosol',$sol_id, 0,'','');";
        return ejecutarConsultaSP($sql);
    }

//listar y mostrar en selct
    public function select()
    {
        $sql = "SELECT * FROM categoria WHERE condicion=1";
        return ejecutarConsulta($sql);
    }
}

?>
