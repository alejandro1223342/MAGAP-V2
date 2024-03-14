<?php
require_once "../modelos/Doc_Catastros.php";
require "../ajax/upload.php";

$doc_catastros = new Doc_Catastros();

$doc_id = isset($_POST["doc_id"]) ? limpiarCadena($_POST["doc_id"]) : "";
$cat_id_tipodoc = isset($_POST["cat_id_tipodoc"]) ? limpiarCadena($_POST["cat_id_tipodoc"]) : "";
$doc_nombre = isset($_POST["doc_nombre"]) ? limpiarCadena($_POST["doc_nombre"]) : "";
$nombreSeleccionado = $_POST["nombreSeleccionado"] ? limpiarCadena($_POST["nombreSeleccionado"]) : "";
$doc_url = isset($_POST["doc_url"]) ? limpiarCadena($_POST["doc_url"]) : "";
$cat_id_estado = isset($_POST["cat_id_estado"]) ? limpiarCadena($_POST["cat_id_estado"]) : "";
$usu_id = $_SESSION['usu_id'];


switch ($_GET["op"]) {

    case 'documentos':
        $rspta = $doc_catastros->documentos();
        while ($reg = $rspta->fetch_object()) {
            echo '<option value=' . $reg->cat_id . '>' . $reg->cat_nombre . '</option>';
        }
        break;


    case 'listarCheck':
        $rspta = $doc_catastros->listar();
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

    case 'mostrar':
        //echo $_POST["cat_id"];
        $rspta = $doc_catastros->mostrar($doc_id);
        echo json_encode($rspta);
        break;

    case 'listarPredefinido':
        $sol_identificacion = $_GET['cedula'];
        $datosTabla = array(
            array('doc_nombre' => 'CHECKLIST'),
        );
        $data = array();

        // Agregar una fila predefinida por cada tipo de documento
        $data[] = array(
            "0" => '<label class="btn btn-file">
            <input class="d-none" name="pdf" id="pdf" type="file" accept="application/pdf">
            <i class="fa fa-file-pdf fa-2x text-danger"></i></label>',
            "1" => '',
            "2" => 'CHECKLIST',
            "3" => '',
            "4" => '',
            "5" => '',
            "6" => '',
            "7" => '',
            "8" => '<button class="btn btn-success btn-xs" onclick="guardar(event)">Guardar <i class="fa fa-save" style="margin-left: 5px;"></i></button>',
            "9" => '',
        );

        // Iterar sobre los datos
        foreach ($datosTabla as $key => $fila) {
            $doc_nombre = $fila['doc_nombre'];
            $rspta = $doc_catastros->listarPredefinido($sol_identificacion, $doc_nombre);

            while ($reg = $rspta->fetch_object()) {
                // Check if doc_tabla is 36
                if ($reg->doc_tabla == 36) {
                    // Use the predefined arrays based on doc_nombre when doc_tabla is 36
                    switch ($doc_nombre) {
                        case 'CHECKLIST':
                            // Agregar una fila predefinida por cada tipo de documento
                            $data[$key] = array(
                                "0" => '<label class="btn btn-file">
                                        <input class="d-none" name="pdf" id="pdf" type="file" accept="application/pdf">
                                        <i class="fa fa-file-pdf fa-2x text-danger"></i></label>',
                                "1" => '',
                                "2" => 'CHECKLIST',
                                "3" => '',
                                "4" => '',
                                "5" => '',
                                "6" => '',
                                "7" => '',
                                "8" => '<button class="btn btn-success btn-xs" onclick="guardar(event)">Guardar <i class="fa fa-save" style="margin-left: 5px;"></i></button>',
                                "9" => '',
                            );
                            break;
                        // Otros casos aquí...
                    }
                } else {
                    // Rest of your switch statement...
                    switch ($doc_nombre) {
                        case 'CHECKLIST':
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
                                "2" => 'CHECKLIST',
                                "3" => $reg->doc_fechareg,
                                "4" => $reg->doc_url,
                                "5" => $estado,
                                "6" => $reg->doc_descripcion,
                                "7" => $reg->doc_gestor,
                                "8" => $buttonContent,
                                "9" => $reg->tra_pro,
                            );
                            break;
                    }
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

    case 'aprobardocumento':
        $datosTabla = json_decode($_POST['tabla_pdf'], true);
        // Obtener el primer elemento del array
        $primerRegistro = reset($datosTabla);

        if ($primerRegistro !== false) {
            $tra_id = $primerRegistro['tra_id'];
            $estado = $primerRegistro['estado'];
            $observacion = $primerRegistro['observacion'];

            // Llama a la función para guardar el documento
            $rspta = $doc_catastros->aprobardocumento($usu_id, $tra_id, $estado, $observacion);

            if ($rspta) {
                echo "Todo se registró correctamente";
            } else {
                echo "Hubo un problema al registrar el primer documento";
            }
        } else {
            echo "No se encontraron elementos en el array";
        }
        break;
}
