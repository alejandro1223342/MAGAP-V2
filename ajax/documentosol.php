<?php
require_once "../modelos/Documentosol.php";
require "../ajax/upload.php";

$documentosol = new Documentosol();

$doc_id = isset($_POST["doc_id"]) ? limpiarCadena($_POST["doc_id"]) : "";
$cat_id_tipodoc = isset($_POST["cat_id_tipodoc"]) ? limpiarCadena($_POST["cat_id_tipodoc"]) : "";
$doc_nombre = isset($_POST["doc_nombre"]) ? limpiarCadena($_POST["doc_nombre"]) : "";
$nombreSeleccionado = $_POST["nombreSeleccionado"] ? limpiarCadena($_POST["nombreSeleccionado"]) : "";
$doc_url = isset($_POST["doc_url"]) ? limpiarCadena($_POST["doc_url"]) : "";
$cat_id_estado = isset($_POST["cat_id_estado"]) ? limpiarCadena($_POST["cat_id_estado"]) : "";
$sol_id = isset($_SESSION['sol_id']) ? $_SESSION['sol_id'] : 0;
$sol_identificacion = $_SESSION['sol_identificacion'];


switch ($_GET["op"]) {

    case 'guardaryeditar':
        $parentFolderId = '1tL4bVET1g382sIaw3uJHiq__kRg10hMc';
        $fileName = $nombreSeleccionado . '-' . $sol_identificacion;

        if (!empty($_FILES['exampleInputFile']['name']) && file_exists($_FILES['exampleInputFile']['tmp_name'])) {
            $doc_path = $_FILES['exampleInputFile']['tmp_name'];
            $fileContent = $doc_path;

            if ($fileContent != false) {
                if (empty($doc_id)) {
                    // Si el doc_id está vacío, se inserta un nuevo registro
                    $resultadoSubida = uploadFileToDrive($parentFolderId, $sol_identificacion, $fileName, $fileContent);
                    $rspta = $documentosol->insertar($sol_identificacion, $cat_id_tipodoc, $fileName, $resultadoSubida);
                    echo $rspta ? "Datos registrados correctamente" : "Este documento ya ha sido registrado";
                } else {
                    // Si hay doc_id, se asume edición; se actualiza el contenido del archivo
                    $resultadoSubida = uploadFileToDrive($parentFolderId, $sol_identificacion, $fileName, $fileContent);
                    $rspta = $documentosol->editar($doc_id, $fileName, $resultadoSubida);
                    echo $rspta ? "Datos actualizados correctamente" : "No se pudo actualizar los datos";
                }
            } else {
                echo "Error al leer el contenido del archivo";
            }
        } else {
            echo "No se subió ningún archivo o el archivo temporal no existe";
        }
        break;


    case 'documentos':
        $rspta = $documentosol->documentos();
        while ($reg = $rspta->fetch_object()) {
            echo '<option value=' . $reg->cat_id . '>' . $reg->cat_nombre . '</option>';
        }
        break;


    case 'listar':
        $rspta = $documentosol->listar($sol_identificacion);
        $data = array();
        while ($reg = $rspta->fetch_object()) {
            $doc_id = $reg->doc_id;
            $data[] = array(
                "0" => '<button class="btn btn-primary" onclick="mostrar('.$doc_id.')"><i class="fa fa-pen"></i></button>',
                "1" => $reg->cat_nombre,
                "2" => $reg->doc_fechareg,
                "3" => $reg->doc_url,
                "4" => '<button class="btn btn-info"><i class="fa fa-eye"></i></button>'
            );
        }

        $results = array(
            "sEcho" => 1,//info para datatables
            "iTotalRecords" => count($data),//enviamos el total de registros al datatable
            "iTotalDisplayRecords" => count($data),//enviamos el total de registros a visualizar
            "aaData" => $data);
        echo json_encode($results);
        break;

    case 'mostrar':
        //echo $_POST["cat_id"];
        $rspta = $documentosol->mostrar($doc_id);
        echo json_encode($rspta);
        break;

}
