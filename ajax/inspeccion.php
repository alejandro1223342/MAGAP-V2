<?php
require_once "../modelos/Inspeccion.php";

$inspeccion = new Inspeccion();

/*Construcciones*/
$ins_id = isset($_POST["ins_id"]) ? limpiarCadena($_POST["ins_id"]) : "";
$pro_id = isset($_POST["pro_id"]) ? limpiarCadena($_POST["pro_id"]) : "";
$cat_construccion = isset($_POST["cat_construccion"]) ? limpiarCadena($_POST["cat_construccion"]) : "";
$cat_materiales = isset($_POST["cat_materiales"]) ? limpiarCadena($_POST["cat_materiales"]) : "";
$cat_estado_construccion = isset($_POST["cat_estado_construccion"]) ? limpiarCadena($_POST["cat_estado_construccion"]) : "";
$superficie = isset($_POST["superficie"]) ? limpiarCadena($_POST["superficie"]) : "";
$edad_const = isset($_POST["edad_const"]) ? limpiarCadena($_POST["edad_const"]) : "";
$tiempo_ocupacion = isset($_POST["tiempo_ocupacion"]) ? limpiarCadena($_POST["tiempo_ocupacion"]) : "";
/*Fin*/

/*Estado de Tenencia*/
$pro_id_tenencia = isset($_POST["pro_id_tenencia"]) ? limpiarCadena($_POST["pro_id_tenencia"]) : "";
$cat_tenencia = isset($_POST["cat_tenencia"]) ? limpiarCadena($_POST["cat_tenencia"]) : "";
$cat_historia = isset($_POST["cat_historia"]) ? limpiarCadena($_POST["cat_historia"]) : "";
$cat_tipo_posesion = isset($_POST["cat_tipo_posesion"]) ? limpiarCadena($_POST["cat_tipo_posesion"]) : "";
$tiempo_posesion = isset($_POST["tiempo_posesion"]) ? limpiarCadena($_POST["tiempo_posesion"]) : "";
$tenencia_observaciones = isset($_POST["tenencia_observaciones"]) ? limpiarCadena($_POST["tenencia_observaciones"]) : "";


/*Fin*/

switch ($_GET["op"]) {

        /* Listar solicitantes */
    case 'listar':
        $rspta = $inspeccion->listar();
        $data = array();

        while ($reg = $rspta->fetch_object()) {
            $data[] = array(
                "0" => '<center><button class="btn btn-primary btn-xs" onclick=" mostrar(' . $reg->pro_id . '); mostrar2(' . $reg->pro_id . ')"><i class="fa fa-eye"></i></button></center>',
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
                "0" => '<center><button class="btn btn-danger btn-xs" id="btn_eliminar" onclick=" eliminar_construcciones(' . $reg->ins_id . ')"><i class="fa fa-times"></i></button></center>',
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
                "0" => '<center><button class="btn btn-danger btn-xs" onclick=" eliminar(' . $reg->ins_id . ')"><i class="fa fa-times"></i></button></center>',
                "1" => $reg->concepto,
                "2" => $reg->unidad_medida,
                "3" => $reg->cantidad,
                "4" => $reg->estado
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

    case 'tipo_posesion':
        $rspta = $inspeccion->tipo_posesion();
        while ($reg = $rspta->fetch_object()) {
            echo '<option value=' . $reg->cat_id . '>' . $reg->cat_nombre . '</option>';
        }
        break;

        /* Fin selects */

    case 'mostrar':

        $rspta = $inspeccion->mostrar($_GET["pro"]);

        echo json_encode($rspta);
        break;

    case 'mostrar_ten':

        $rspta = $inspeccion->mostrar_ten($_GET["pro"]);

        echo json_encode($rspta);
        break;

        /* Eliminar informacion de las tablas */
    case 'eliminar':
        $rspta = $inspeccion->eliminar($ins_id);
        echo "Valor de ins_id: " . $ins_id;

        echo $rspta ? "Datos eliminados correctamente" : "No se pudo eliminar los datos";
        break;
        /* Fin  */

        /* Guardar Construcciones*/
    case 'guardar_construccion':


        if (empty($ins_id)) {
            $rspta = $inspeccion->guardar_construccion(
                $pro_id_cons,
                $cat_construccion,
                $cat_materiales,
                $cat_estado_construccion,
                $superficie,
                $edad_const,
                $tiempo_ocupacion,

            );
            echo $rspta ? "Datos registrados correctamente" : "No se pudo registrar los datos";
        }
        break;
        /* Guardar Estado de tenencias */
    case 'guardaryeditar_tenencia':


        if (empty($ins_id)) {

            $rspta = $inspeccion->guardaryeditar_tenencia(
                $pro_id_tenencia,
                $cat_tenencia,
                $cat_historia,
                $cat_tipo_posesion,
                $tiempo_posesion,
                $tenencia_observaciones,
            );
            echo $rspta ? "Datos registrados correctamente" : "No se pudo registrar los datos";
        }
        break;

        /*Fin*/
}
