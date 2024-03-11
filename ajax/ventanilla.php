<?php
session_start();
require_once "../modelos/Ventanilla.php";


$ventanilla = new Ventanilla();

$tra_id = isset($_POST["tra_id"]) ? limpiarCadena($_POST["tra_id"]) : "";
$sol_id = isset($_POST["sol_id"]) ? limpiarCadena($_POST["sol_id"]) : "";
$doc_id = isset($_POST["doc_id"]) ? limpiarCadena($_POST["doc_id"]) : "";

$pro_id = isset($_POST["pro_id"]) ? limpiarCadena($_POST["pro_id"]) : "";
$usu_id = isset($_POST["usu_id"]) ? limpiarCadena($_POST["usu_id"]) : "";
$cat_id_estado = isset($_POST["cat_id_estado"]) ? limpiarCadena($_POST["cat_id_estado"]) : "";
$cat_id_proceso = isset($_POST["cat_id_proceso"]) ? limpiarCadena($_POST["cat_id_proceso"]) : "";
$pro_observacion = isset($_POST["pro_observacion"]) ? limpiarCadena($_POST["pro_observacion"]) : "";
$pro_fecha = isset($_POST["pro_fecha"]) ? limpiarCadena($_POST["pro_fecha"]) : "";
$pro_fechafin = isset($_POST["pro_fechafin"]) ? limpiarCadena($_POST["pro_fechafin"]) : "";
$pro_trasabilidad = isset($_POST["pro_trasabilidad"]) ? limpiarCadena($_POST["pro_trasabilidad"]) : "";

$usu_id = isset($_SESSION['usu_id']) ? $_SESSION['usu_id'] : '';


switch ($_GET["op"]) {

    case 'listar':
        $rspta = $ventanilla->listar();
        $data = array();
        while ($reg = $rspta->fetch_object()) {
            $data[] = array(
                "0" => '<button class="btn btn-primary btn-xs" onclick="mostrarTabla(' . $reg->s_ident . ')"><i class="fa fa-eye"></i></button>',
                "1" => $reg->sol_identificacion,
                "2" => $reg->sol_nombre,
                "3" => $reg->sol_telefono,
                "4" => $reg->sol_direccion,
            );
        }

        $results = array(
            "sEcho" => 1,//info para datatables
            "iTotalRecords" => count($data),//enviamos el total de registros al datatable
            "iTotalDisplayRecords" => count($data),//enviamos el total de registros a visualizar
            "aaData" => $data);
        echo json_encode($results);
        break;

    /*case 'mostrar':
        $rspta = $ventanilla->mostrar($tra_id);
        echo json_encode($rspta);
        break;*/

    case 'tabla':
        $s_ident = isset($_GET['s_ident']) ? $_GET['s_ident'] : '';
        $rspta = $ventanilla->tabla($s_ident);
        $data = array();
        if ($rspta) {
            while ($row = $rspta->fetch_object()) {
                $data[] = array(
                    "0" => '<button class="btn btn-secondary btn-xs"><i class="fa fa-eye"></i> Ver</button>',
                    "1" => '',
                    "2" => $row->tra_iden,
                    "3" => $row->doc_nombre,
                    "4" => $row->doc_fechareg,
                    "5" => '<input class="form-control" type="text" name="pro_observacion" id="pro_observacion" maxlength="100" placeholder="Observación" readonly>',
                    "6" => $row->doc_url,
                    "7" => '<button class="btn btn-success btn-xs" onclick="guardar(event)">Guardar <i class="fa fa-save" style="margin-left: 5px;"></i></button>',
                    "8" => "<input type='text' name='s_ident' id='s_ident' value='" . $s_ident . "' style='display:none;'>"

                );
            }
        }
        $results = array(
            "sEcho" => 1,
            "iTotalRecords" => count($data),
            "iTotalDisplayRecords" => count($data),
            "aaData" => $data
        );
        echo json_encode($results);
        break;

    case 'estado':
        $rspta = $ventanilla->estado();
        while ($reg = $rspta->fetch_object()) {
            echo '<option value=' . $reg->cat_id . '>' . $reg->cat_nombre . '</option>';
        }
        break;

    case 'guardardocumento':
        $cat_id_estado = $_POST['cat_id_estado'];
        $tra_id = $_POST['tra_id'];
        $pro_observacion = $_POST['pro_observacion'];
        $rspta = $ventanilla->guardardocumento($tra_id, $cat_id_estado, $pro_observacion);
        break;

    case 'aprobardocumento':
        $datosTabla = json_decode($_POST['tabla_pdf'], true);
        // Toma solo el primer tra_id del array
        $primerTraId = reset($datosTabla)['tra_id'];
        $rspta = $ventanilla->aprobardocumento($usu_id, $primerTraId);
        if ($rspta) {
            echo "El documento se registró correctamente";
        } else {
            echo "Hubo un problema al registrar el documento";
        }
        break;

}