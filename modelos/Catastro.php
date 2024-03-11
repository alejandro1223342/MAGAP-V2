<?php
//incluir la conexion de base de datos
require "../config/Conexion.php";


class Catastro
{


    //implementamos nuestro constructor
    public function __construct()
    {

    }

    public function listar()
    {
        $sql = "call sp_catastro ('list', 0, 0, 0, 0, 0)";
        return ejecutarConsultaSP($sql);
    }

    public function estado()
    {
        $sql = "CALL sp_catalgo('spa','0','', '',15)";
        return ejecutarConsultaSP($sql);
    }

    public function mostrar($tra_id)
    {
        $sql = "call sp_catastro('mos','$tra_id',0,0,0,0)";
        $result = ejecutarConsultaSP($sql);
        return $result->fetch_assoc();

        //$row=ejecutarConsultaSP($sql);
        //$sql="SELECT * FROM usuario where usu_id=usu_id";
        //return $row->fetch_row();
        //ejecutarConsultaSimpleFila($sql));
    }

    public function tabla($id)
    {
        $sql = "call sp_catastro('listedi',0,0,'$id',0,0)";
        return ejecutarConsulta($sql);
    }


    public function insertar($usu_id, $tra_id, $cat_id_estado, $pro_observacion)
    {

        $sql = "call sp_ventanilla('ing',0, '$usu_id', '$tra_id', '$cat_id_estado','$pro_observacion')";

        return ejecutarConsulta($sql);
    }

    /*public function guardardocumento($usu_id, $tra_id, $cat_id_estado, $pro_observacion)
    {
        // Ejecutar la consulta y obtener el resultado
        $sql = "CALL sp_procesos('cat', 0, $usu_id, $tra_id, $cat_id_estado, '$pro_observacion')";
        $result = ejecutarConsulta($sql);
        $row = $result->fetch_assoc();

        // Verificar si la columna existe en el resultado
        $jsonColumn = 'JSON_OBJECT(\'cat_id_estado\', @cat_id_estado, \'pro_observacion\', @pro_observacion)';
        if (array_key_exists($jsonColumn, $row)) {
            // Decodificar el objeto JSON
            $jsonData = json_decode($row[$jsonColumn], true);

            // Verificar si el JSON se decodificó correctamente
            if ($jsonData !== null) {
                // Acceder a los datos
                $cat_id_estado = $jsonData['cat_id_estado'];
                $pro_observacion = $jsonData['pro_observacion'];

                // Devolver los datos como un JSON
                header('Content-Type: application/json');
                echo json_encode(['cat_id_estado' => $cat_id_estado, 'pro_observacion' => $pro_observacion]);
                exit;
            }
        }

        // Manejar el caso donde la columna o el JSON no son válidos
        // Devolver un JSON indicando un error o un valor predeterminado según sea necesario
        header('Content-Type: application/json');
        echo json_encode(['error' => 'No se pudo decodificar el JSON']);
        exit;
    }*/


    public function guardardocumento($tra_id, $cat_id_estado, $pro_observacion)
    {
        // Ejecutar la consulta y obtener el resultado
        $sql = "CALL sp_procesos('doc', 0, 0, $tra_id, $cat_id_estado, '$pro_observacion')";
        $result = ejecutarConsulta($sql);
        $row = $result->fetch_assoc();

        // Verificar si la columna existe en el resultado
        $jsonColumn = 'JSON_OBJECT(\'cat_id_estado\', cat_id_estado, \'pro_observacion\', pro_observacion)';
        if (array_key_exists($jsonColumn, $row)) {
            // Decodificar el objeto JSON
            $jsonData = json_decode($row[$jsonColumn], true);

            // Verificar si el JSON se decodificó correctamente
            if ($jsonData !== null) {
                // Acceder a los datos
                $cat_id_estado = $jsonData['cat_id_estado'];
                $pro_observacion = $jsonData['pro_observacion'];

                // Devolver los datos como un JSON
                header('Content-Type: application/json');
                echo json_encode(['cat_id_estado' => $cat_id_estado, 'pro_observacion' => $pro_observacion]);
                exit;
            }
        }

        // Devolver un JSON indicando un error o un valor predeterminado según sea necesario
        header('Content-Type: application/json');
        echo json_encode(['error' => 'No se pudo decodificar el JSON']);
        exit;
    }

    public function aprobardocumento($usu_id, $tra_id, $cat_id_estado, $pro_observacion)
    {
        // Ejecutar la consulta y obtener el resultado
        $sql = "CALL sp_procesos('cat', 0, $usu_id, $tra_id, $cat_id_estado, '$pro_observacion')";
        return ejecutarConsulta($sql);
    }

}

