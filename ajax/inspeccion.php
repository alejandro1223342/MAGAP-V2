<?php
require_once "../modelos/Inspeccion.php";

$inspeccion = new Inspeccion();

/* $cat_id = isset($_POST["cat_id"]) ? limpiarCadena($_POST["cat_id"]) : "";
$cat_nombre = isset($_POST["cat_nombre"]) ? limpiarCadena($_POST["cat_nombre"]) : "";
$cat_descripcion = isset($_POST["cat_descripcion"]) ? limpiarCadena($_POST["cat_descripcion"]) : "";
$cat_padre = isset($_POST["cat_padre"]) ? limpiarCadena($_POST["cat_padre"]) : "";
$cat_estado = isset($_POST["cat_estado"]) ? limpiarCadena($_POST["cat_estado"]) : ""; */




switch ($_GET["op"]) {

        /* Listar solicitantes */
    case 'listar':
        $rspta = $inspeccion->listar();
        $data = array();

        while ($reg = $rspta->fetch_object()) {
            $data[] = array(
                "0" => '<center><button class="btn btn-primary btn-xs" onclick=" mostrar(' . $reg->pro_id . ')"><i class="fa fa-eye"></i></button></center>',
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
        /* Listar construcciones */
    case 'listar_construcciones':
        $rspta = $inspeccion->listar_construcciones();
        $data = array();

        while ($reg = $rspta->fetch_object()) {
            $data[] = array(
                "0" => '<center><button class="btn btn-danger btn-xs" onclick=" eliminar(' . $reg->ins_id . ')"><i class="fa fa-times"></i></button></center>',
                "1" => $reg->construccion,
                "2" => $reg->materiales,
                "3" => $reg->estado,
                "4" => $reg->ins_dato1,
                "5" => $reg->ins_dato2,
                "6" => $reg->ins_dato3

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
        /* Listar infraestructuras */
    case 'listar_infraestructura':
        $rspta = $inspeccion->listar_infraestructura();
        $data = array();

        while ($reg = $rspta->fetch_object()) {
            $data[] = array(
                "0" => '<center><button class="btn btn-primary btn-xs" onclick=" mostrar(' . $reg->pro_id . ')"><i class="fa fa-eye"></i></button></center>',
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


        /* Selects */
    case 'explicacion':
        $rspta = $inspeccion->explicacion();
        while ($reg = $rspta->fetch_object()) {
            echo '<option value=' . $reg->cat_id . '>' . $reg->cat_nombre . '</option>';
        }
        break;

    case 'vias':
        $rspta = $inspeccion->vias();
        while ($reg = $rspta->fetch_object()) {
            echo '<option value=' . $reg->cat_id . '>' . $reg->cat_nombre . '</option>';
        }
        break;

    case 'infraestructura':
        $rspta = $inspeccion->infraestructura();
        while ($reg = $rspta->fetch_object()) {
            echo '<option value=' . $reg->cat_id . '>' . $reg->cat_nombre . '</option>';
        }
        break;

    case 'historia':
        $rspta = $inspeccion->historia();
        while ($reg = $rspta->fetch_object()) {
            echo '<option value=' . $reg->cat_id . '>' . $reg->cat_nombre . '</option>';
        }
        break;

    case 'obtencion':
        $rspta = $inspeccion->obtencion();
        while ($reg = $rspta->fetch_object()) {
            echo '<option value=' . $reg->cat_id . '>' . $reg->cat_nombre . '</option>';
        }
        break;

    case 'construccion':
        $rspta = $inspeccion->construccion();
        while ($reg = $rspta->fetch_object()) {
            echo '<option value=' . $reg->cat_id . '>' . $reg->cat_nombre . '</option>';
        }
        break;

    case 'materiales':
        $rspta = $inspeccion->materiales();
        while ($reg = $rspta->fetch_object()) {
            echo '<option value=' . $reg->cat_id . '>' . $reg->cat_nombre . '</option>';
        }
        break;

    case 'estado_construccion':
        $rspta = $inspeccion->estado_construccion();
        while ($reg = $rspta->fetch_object()) {
            echo '<option value=' . $reg->cat_id . '>' . $reg->cat_nombre . '</option>';
        }
        break;

    case 'concepto':
        $rspta = $inspeccion->concepto();
        while ($reg = $rspta->fetch_object()) {
            echo '<option value=' . $reg->cat_id . '>' . $reg->cat_nombre . '</option>';
        }
        break;

    case 'concepto_suelo':
        $rspta = $inspeccion->concepto_suelo();
        while ($reg = $rspta->fetch_object()) {
            echo '<option value=' . $reg->cat_id . '>' . $reg->cat_nombre . '</option>';
        }
        break;

    case 'estado_suelo':
        $rspta = $inspeccion->estado_suelo();
        while ($reg = $rspta->fetch_object()) {
            echo '<option value=' . $reg->cat_id . '>' . $reg->cat_nombre . '</option>';
        }
        break;

    case 'destino_economico':
        $rspta = $inspeccion->destino_economico();
        while ($reg = $rspta->fetch_object()) {
            echo '<option value=' . $reg->cat_id . '>' . $reg->cat_nombre . '</option>';
        }
        break;

    case 'estado_infraestructura':
        $rspta = $inspeccion->estado_infraestructura();
        while ($reg = $rspta->fetch_object()) {
            echo '<option value=' . $reg->cat_id . '>' . $reg->cat_nombre . '</option>';
        }
        break;

        /* Fin selects */

    case 'mostrar':

        $rspta = $inspeccion->mostrar($_GET["pro"]);

        echo json_encode($rspta);
        break;
}
