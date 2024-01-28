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
        $proceso = 1;
        $fileName = $_POST['doc_nombre'] . '-' . $sol_identificacion;
        if (!empty($_FILES['pdf']['name']) && file_exists($_FILES['pdf']['tmp_name'])) {
            $doc_path = $_FILES['pdf']['tmp_name'];
            $fileContent = $doc_path;

            if ($fileContent) {
                if (empty($doc_id)) {
                    // Si el doc_id está vacío, se inserta un nuevo registro
                    $resultadoSubida = uploadFileToDrive($parentFolderId, $sol_identificacion, $fileName, $fileContent);
                    $rspta = $documentosol->insertar($sol_identificacion, $cat_id_tipodoc, $fileName, $resultadoSubida, $proceso);
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

    case 'notify':
        $rspta = $documentosol->notificaciones($sol_identificacion);
        $resultados = array();
        // Recorre los resultados y agrega cada fila al array
        while ($fila = $rspta->fetch_assoc()) {
            $resultados[] = $fila;
        }
        echo json_encode($resultados);
        break;

    case 'procesoSol':
        $rspta = $documentosol->procesoSol($sol_id);
        $resultados = array();
        // Recorre los resultados y agrega cada fila al array
        while ($fila = $rspta->fetch_assoc()) {
            $resultados[] = $fila;
        }
        echo json_encode($resultados);
        break;

    /*case 'listar':
        $rspta = $documentosol->listar($sol_identificacion);
        $data = array();
        while ($reg = $rspta->fetch_object()) {
            $doc_id = $reg->doc_id;
            $data[] = array(
                "0" => '<button class="btn btn-primary" onclick="mostrar(' . $doc_id . ')"><i class="fa fa-pen"></i></button>',
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
        break;*/

    case 'listar_predefinido':
        $datosTabla = array(
            array('doc_nombre' => 'COPIA DE CEDULA'),
            array('doc_nombre' => 'PLANIMETRICO'),
            array('doc_nombre' => 'ADJUDICACION DE TIERRAS')
        );
        $data = array();

        // Agregar una fila predefinida por cada tipo de documento
        $data[] = array(
            "0" => '<label class="btn btn-file">
                <input class="d-none" name="pdf" id="pdf" type="file" accept="application/pdf">
                <i class="fa fa-file-pdf fa-2x text-danger"></i></label>',
            "1" => '',
            "2" => 'COPIA DE CEDULA',
            "3" => '',
            "4" => '',
            "5" => '',
            "6" => '',
            "7" => '',
            "8" => '<button class="btn btn-success btn-xs" onclick="guardar(event)">Guardar <i class="fa fa-save" style="margin-left: 5px;"></i></button>',
        );

        $data[] = array(
            "0" => '<label class="btn btn-file">
                <input class="d-none" name="pdf" id="pdf" type="file" accept="application/pdf">
                <i class="fa fa-file-pdf fa-2x text-danger"></i></label>',
            "1" => '',
            "2" => 'PLANIMETRICO',
            "3" => '',
            "4" => '',
            "5" => '',
            "6" => '',
            "7" => '',
            '<button class="btn btn-success btn-xs" onclick="guardar(event)">Guardar <i class="fa fa-save" style="margin-left: 5px;"></i></button>',
        );

        $data[] = array(
            "0" => '<label class="btn btn-file">
                <input class="d-none" name="pdf" id="pdf" type="file" accept="application/pdf">
                <i class="fa fa-file-pdf fa-2x text-danger"></i></label>',
            "1" => '',
            "2" => 'ADJUDICACION DE TIERRAS',
            "3" => '',
            "4" => '',
            "5" => '',
            "6" => '',
            "7" => '',
            '<button class="btn btn-success btn-xs" onclick="guardar(event)">Guardar <i class="fa fa-save" style="margin-left: 5px;"></i></button>',
        );

        // Iterar sobre los datos
        foreach ($datosTabla as $key => $fila) {
            $doc_nombre = $fila['doc_nombre'];
            // Llenar los valores según la consulta
            $rspta = $documentosol->listar($sol_identificacion, $doc_nombre);
            while ($reg = $rspta->fetch_object()) {
                switch ($doc_nombre) {
                    case 'COPIA DE CEDULA':
                        // Operador ternario para decidir el contenido de la columna "0"
                        $inputContent = ($reg->doc_tabla == 28) ? '<label class="btn btn-file">
                        <input class="d-none" name="pdf" id="pdf" type="file" accept="application/pdf">
                        <i class="fa fa-file-pdf fa-2x text-danger"></i></label>' : '';
                        // Operador ternario para decidir el contenido de la columna "8"
                        $buttonContent = ($reg->doc_tabla == 28) ? '<button class="btn btn-success btn-xs" onclick="guardar(event)">Guardar <i class="fa fa-save" style="margin-left: 5px;"></i></button> <button class="btn btn-info btn-xs">Ver PDF<i class="fa fa-eye" style="margin-left: 5px"></i></button>' : '<button class="btn btn-info"><i class="fa fa-eye"></i></button>';
                        $estadoColor = '';
                        switch ($reg->doc_tabla) {
                            case 28:
                                $estadoColor = 'badge-danger'; // Rojo
                                break;
                            case 18:
                                $estadoColor = 'badge-success'; // Verde
                                break;
                            default:
                                $estadoColor = 'badge-primary'; // Azul
                        }

                        $estado = '<span class="badge ' . $estadoColor . '">' . $reg->doc_estado . '</span>';
                        // Sobrescribir valores predefinidos con los datos de la consulta
                        $data[$key] = array(
                            "0" => $inputContent,
                            "1" => $reg->doc_id,
                            "2" => 'COPIA DE CEDULA',
                            "3" => $reg->doc_fechareg,
                            "4" => $reg->doc_url,
                            "5" => $estado,
                            "6" => $reg->doc_descripcion,
                            "7" => $reg->doc_gestor,
                            "8" => $buttonContent,
                        );
                        break;

                    case 'PLANIMETRICO':
                        // Operador ternario para decidir el contenido de la columna "0"
                        $inputContent = ($reg->doc_tabla == 28) ? '<label class="btn btn-file">
                        <input class="d-none" name="pdf" id="pdf" type="file" accept="application/pdf">
                        <i class="fa fa-file-pdf fa-2x text-danger"></i></label>' : '';
                        // Operador ternario para decidir el contenido de la columna "8"
                        $buttonContent = ($reg->doc_tabla == 28) ? '<button class="btn btn-success btn-xs" onclick="guardar(event)">Guardar <i class="fa fa-save" style="margin-left: 5px;"></i></button> <button class="btn btn-info btn-xs">Ver PDF<i class="fa fa-eye" style="margin-left: 5px"></i></button>' : '<button class="btn btn-info"><i class="fa fa-eye"></i></button>';
                        $estadoColor = '';
                        switch ($reg->doc_tabla) {
                            case 28:
                                $estadoColor = 'badge-danger'; // Rojo
                                break;
                            case 18:
                                $estadoColor = 'badge-success'; // Verde
                                break;
                            default:
                                $estadoColor = 'badge-primary'; // Azul
                        }

                        $estado = '<span class="badge ' . $estadoColor . '">' . $reg->doc_estado . '</span>';
                        // Sobrescribir valores predefinidos con los datos de la consulta
                        $data[$key] = array(
                            "0" => $inputContent,
                            "1" => $reg->doc_id,
                            "2" => 'PLANIMETRICO',
                            "3" => $reg->doc_fechareg,
                            "4" => $reg->doc_url,
                            "5" => $estado,
                            "6" => $reg->doc_descripcion,
                            "7" => $reg->doc_gestor,
                            "8" => $buttonContent,
                        );
                        break;
                    case 'ADJUDICACION DE TIERRAS':
                        // Operador ternario para decidir el contenido de la columna "0"
                        $inputContent = ($reg->doc_tabla == 28) ? '<label class="btn btn-file">
                        <input class="d-none" name="pdf" id="pdf" type="file" accept="application/pdf">
                        <i class="fa fa-file-pdf fa-2x text-danger"></i></label>' : '';
                        // Operador ternario para decidir el contenido de la columna "8"
                        $buttonContent = ($reg->doc_tabla == 28) ? '<button class="btn btn-success btn-xs" onclick="guardar(event)">Guardar <i class="fa fa-save" style="margin-left: 5px;"></i></button> <button class="btn btn-info btn-xs">Ver PDF<i class="fa fa-eye" style="margin-left: 5px"></i></button>' : '<button class="btn btn-info"><i class="fa fa-eye"></i></button>';
                        $estadoColor = '';
                        switch ($reg->doc_tabla) {
                            case 28:
                                $estadoColor = 'badge-danger'; // Rojo
                                break;
                            case 18:
                                $estadoColor = 'badge-success'; // Verde
                                break;
                            default:
                                $estadoColor = 'badge-primary'; // Azul
                        }

                        $estado = '<span class="badge ' . $estadoColor . '">' . $reg->doc_estado . '</span>';

                        // Sobrescribir valores predefinidos con los datos de la consulta
                        $data[$key] = array(
                            "0" => $inputContent,
                            "1" => $reg->doc_id,
                            "2" => 'ADJUDICACION DE TIERRAS',
                            "3" => $reg->doc_fechareg,
                            "4" => $reg->doc_url,
                            "5" => $estado,
                            "6" => $reg->doc_descripcion,
                            "7" => $reg->doc_gestor,
                            "8" => $buttonContent,
                        );
                        break;
                    // Otros casos aquí...
                }
            }
        }

        $results = array(
            "sEcho" => 1, // Info para datatables
            "iTotalRecords" => count($data), // Enviamos el total de registros al datatable
            "iTotalDisplayRecords" => count($data), // Enviamos el total de registros a visualizar
            "aaData" => $data
        );
        echo json_encode($results);
        break;


    case 'mostrar':
        //echo $_POST["cat_id"];
        $rspta = $documentosol->mostrar($doc_id);
        echo json_encode($rspta);
        break;

}
