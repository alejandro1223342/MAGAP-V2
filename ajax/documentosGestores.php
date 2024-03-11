<?php
require_once "../modelos/DocumentosGestores.php";
require "../ajax/upload.php";
$documentosGestores = new DocumentosGestores();

switch ($_GET["op"]) {
    case 'guardaryeditar':
        $sol_ident = $_POST['sol_ident'];
        $tra_pro = "Trámite " . $_POST['tra_pro'];
        $fileName = $_POST['doc_nombre'];
        $filePDF = $_FILES['pdf'];
        $parentFolderId = '1tL4bVET1g382sIaw3uJHiq__kRg10hMc';
        $doc_id = $_POST['doc_id'];

        switch (true) {
            case (!empty($filePDF['name']) && file_exists($filePDF['tmp_name'])):
                $doc_path = $filePDF['tmp_name'];
                $contenido = $doc_path;

                if ($contenido) {
                    $resultadoSubida = uploadFileToDrive($parentFolderId, $sol_ident, $fileName, $contenido, $tra_pro);
                    $rspta = $documentosGestores->editar($doc_id, $fileName, $resultadoSubida);
                    echo $rspta ? "Datos actualizados correctamente" : "No se pudo actualizar los datos";
                } else {
                    echo "No se subió ningún archivo o el archivo temporal no existe";
                }
                break;
        }
}

