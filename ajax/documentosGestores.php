<?php
require_once "../modelos/DocumentosGestores.php";
require "../ajax/upload.php";
$documentosGestores = new DocumentosGestores();

$cat_id_tipodoc = isset($_POST["cat_id_tipodoc"]) ? limpiarCadena($_POST["cat_id_tipodoc"]) : "";
$doc_ide = isset($_POST["doc_id"]) ? limpiarCadena($_POST["doc_id"]) : "";
$cedula_sol = isset($_POST["cedula_sol"]) ? limpiarCadena($_POST["cedula_sol"]) : "";
$usu_nombre = $_SESSION['usu_nombre'];

switch ($_GET["op"]) {
    case 'guardaryeditar':
        $sol_ident = $_POST['sol_ident'];
        $tra_pro = "Trámite " . $_POST['tra_pro'];
        $fileName = $_POST['doc_nombre'];
        $filePDF = $_FILES['pdf'];
        $parentFolderId = '1tL4bVET1g382sIaw3uJHiq__kRg10hMc';
        $doc_id = $_POST['doc_id'];

        if ((!empty($filePDF['name']) && file_exists($filePDF['tmp_name']))) {
            $doc_path = $filePDF['tmp_name'];
            $contenido = $doc_path;
            if ($contenido) {
                $resultadoSubida = uploadFileToDrive($parentFolderId, $sol_ident, $fileName, $contenido, $tra_pro);
                $rspta = $documentosGestores->editar($doc_id, $fileName, $resultadoSubida);
                //echo json_encode(array('success' => $rspta ? true : false, 'message' => $rspta ? "Datos actualizados correctamente" : "No se pudo actualizar los datos"));
            } else {
                echo json_encode(array('success' => false, 'message' => "No se subió ningún archivo o el archivo temporal no existe"));
            }
        }
        break;


    case 'gestores':
        $proceso_drive = !empty($_POST["proA"]) ? "Trámite " . intval($_POST["proA"]) : "Trámite 1";
        $parentFolderId = '1tL4bVET1g382sIaw3uJHiq__kRg10hMc';
        $fileName = $_POST['doc_nombre'] . '-' . $cedula_sol;
        $sol_id = $documentosGestores->obtenerIDSol($cedula_sol);

        if (!empty($_FILES['pdf']['name']) && file_exists($_FILES['pdf']['tmp_name'])) {
            $doc_path = $_FILES['pdf']['tmp_name'];
            $fileContent = $doc_path;
            if ($fileContent) {
                if (empty($doc_ide)) {
                    // Si el doc_id está vacío, se inserta un nuevo registro
                    $resultadoSubida = driveGestores($parentFolderId, $cedula_sol, $fileName, $fileContent, $proceso_drive, $usu_nombre);
                    $rspta = $documentosGestores->insertarGestor($cedula_sol, $cat_id_tipodoc, $fileName, $resultadoSubida, $_POST["proA"], $sol_id);
                    echo $rspta ? "Datos registrados correctamente" : "Este documento ya ha sido registrado";
                } else {
                    // Si hay doc_id, se asume edición; se actualiza el contenido del archivo
                    $resultadoSubida = driveGestores($parentFolderId, $cedula_sol, $fileName, $fileContent, $proceso_drive, $usu_nombre);
                    $rspta = $documentosGestores->editarGestor($doc_ide, $fileName, $resultadoSubida);
                    echo $rspta ? "Datos actualizados correctamente" : "No se pudo actualizar los datos";
                }
            } else {
                echo "Error al leer el contenido del archivo";
            }
        } else {
            echo "No se subió ningún archivo o el archivo temporal no existe";
        }
        break;

    case 'procesoSol':
        $cedula = isset($_GET['cedula']) ? $_GET['cedula'] : '';
        $rspta = $documentosGestores->procesoActual($cedula);
        if ($rspta) {
            $row = $rspta->fetch_assoc();
            echo json_encode(array(
                'tra_pro' => intval($row['tra_pro']),
                'tra_id' => intval($row['tra_id'])
            ));
        } else {
            echo json_encode(array('error' => 'Error al ejecutar la consulta.'));
        }
        break;
}

