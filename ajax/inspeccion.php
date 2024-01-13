<?php
require_once "../modelos/Inspeccion.php";

$inspeccion = new Inspeccion();


//Cambiar
$cat_id = isset($_POST["cat_id"]) ? limpiarCadena($_POST["cat_id"]) : "";
$cat_nombre = isset($_POST["cat_nombre"]) ? limpiarCadena($_POST["cat_nombre"]) : "";
$cat_descripcion = isset($_POST["cat_descripcion"]) ? limpiarCadena($_POST["cat_descripcion"]) : "";
$cat_padre = isset($_POST["cat_padre"]) ? limpiarCadena($_POST["cat_padre"]) : "";
$cat_estado = isset($_POST["cat_estado"]) ? limpiarCadena($_POST["cat_estado"]) : "";




switch ($_GET["op"]) {


    case 'padres':
        $rspta = $inspeccion->mostrar();
        while ($reg = $rspta->fetch_object()) {
            echo '<option value=' . $reg->cat_id . '>' . $reg->cat_nombre . '</option>';
        }
        break;






    case 'listar':
        $rspta = $inspeccion->listar();
        $data = array();

        while ($reg = $rspta->fetch_object()) {
            $data[] = array(
                "0" => '<center><button class="btn btn-primary btn-xs" onclick="mostrarform(true)(' . $reg->tra_id . ')"><i class="fa fa-eye"></i></button></center>',
                "1" => $reg->sol_identificacion,
                "2" => $reg->sol_nombre,
                "3" => $reg->sol_telefono,
                "4" => $reg->sol_direccion
            );
        }
        $results = array(
            "sEcho" => 1, //info para datatables
            "iTotalRecords" => count($data), //enviamos el total de registros al datatable
            "iTotalDisplayRecords" => count($data), //enviamos el total de registros a visualizar
            "aaData" => $data
        );
        echo json_encode($results);
        break;

    case 'desactivar':
        $rspta = $inspeccion->desactivar($cat_id);
        echo $rspta ? "Datos desactivados correctamente" : "No se pudo desactivar los datos";
        break;

    case 'activar':
        $rspta = $inspeccion->activar($cat_id);
        echo $rspta ? "Datos activados correctamente" : "No se pudo activar los datos";
        break;


    case 'guardaryeditar':
        if (empty($cat_id)) {
            $rspta = $inspeccion->insertar($cat_nombre, $cat_descripcion, $cat_padre);
            echo $rspta ? "Datos registrados correctamente" : "No se pudo registrar los datos";
        } else {
            echo "Valor de cat_id: " . $cat_id; // Imprime el valor de cat_id

            /* $rspta = $inspeccion->editar($cat_id, $cat_nombre, $cat_descripcion, $cat_padre);
            echo $rspta ? "Datos actualizados correctamente" : "No se pudo actualizar los datos"; */
        }
        break;
}
