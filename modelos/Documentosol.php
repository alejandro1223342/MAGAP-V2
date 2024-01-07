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


    public function insertar($sol_iden, $cat_id_tipodoc, $fileName, $doc_url)
    {
		$sql = "call sp_documentosol('ing', '$sol_iden', $cat_id_tipodoc, '$fileName', '$doc_url')";
        //return ejecutarConsulta($sql);
        $row = ejecutarConsultaSP($sql);

        if ($row == false) {
            return $row;
        } else {
            $iddoc = $row->fetch_row()[0];

            $num_elementos = 0;
            $sw = true;

            while ($num_elementos < count($_SESSION['sol_id'])) {

                //echo "El valor de current_sol_id es nulo o vacio";

                $current_sol_id = $_SESSION['sol_id'];

                $sql_detalle = "CALL sp_tramites('ing','$current_sol_id', '$iddoc');";
                echo $sql_detalle;

                ejecutarConsultaSP($sql_detalle) or $sw = false;
                $num_elementos = $num_elementos + 1;

            }

            return $sw;
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

    public function editar($cat_id, $cat_nombre, $cat_descripcion, $cat_padre)
    {
        $sql = "call sp_catalgo('mod','$cat_id','$cat_nombre','$cat_descripcion',$cat_padre)";
        /*$sql="UPDATE categoria SET nombre='$nombre',descripcion='$descripcion'
        WHERE idcategoria='$idcategoria'";*/
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
        $sql = "SELECT * FROM documentos where doc_id=doc_id";

        //$sql="call sp_documentosol('listedi','$doc_id',0,0,0,0)";
        $result = ejecutarConsultaSP($sql);
        return $result->fetch_assoc();

        //$row=ejecutarConsultaSP($sql);
        //$sql="SELECT * FROM usuario where usu_id=usu_id";
        //return $row->fetch_row();
        //ejecutarConsultaSimpleFila($sql));
    }

//listar registros
    public function listar($sol_identificacion)
    {
        $sql = "CALL sp_documentosol('list',$sol_identificacion, 0,'','')";
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
