<?php 
require_once "../modelos/Documentosol.php";
require "../ajax/upload.php";

$documentosol=new Documentosol();

$doc_id=isset($_POST["doc_id"])? limpiarCadena($_POST["doc_id"]):"";
$cat_id_tipodoc=isset($_POST["cat_id_tipodoc"])? limpiarCadena($_POST["cat_id_tipodoc"]):"";
$doc_nombre=isset($_POST["doc_nombre"])? limpiarCadena($_POST["doc_nombre"]):"";
$nombreSeleccionado = isset($_POST["nombreSeleccionado"]) ? $_POST["nombreSeleccionado"] : "";
$doc_url=isset($_POST["doc_url"])? limpiarCadena($_POST["doc_url"]):"";
$cat_id_estado=isset($_POST["cat_id_estado"])? limpiarCadena($_POST["cat_id_estado"]):"";
$sol_id = isset($_SESSION['sol_id']) ? $_SESSION['sol_id'] : 0;
$sol_identificacion = $_SESSION['sol_identificacion'];


switch ($_GET["op"]) {

    case 'guardaryeditar':
        if (empty($doc_id)) {
            // Manejo de la subida del archivo
            $parentFolderId = '1tL4bVET1g382sIaw3uJHiq__kRg10hMc';
            if (!empty($_FILES['exampleInputFile']['name']) && file_exists($_FILES['exampleInputFile']['tmp_name'])) {
                $doc_path = $_FILES['exampleInputFile']['tmp_name'];
                $fileName = $nombreSeleccionado.'-'.$sol_identificacion;
                // Leer el contenido del archivo
                $fileContent = file_get_contents($doc_path);
                // Verificar si se pudo leer el contenido del archivo
                if ($fileContent != false) {
                    // Subir el contenido del archivo a Google Drive
                    $resultadoSubida = uploadFileToDrive($parentFolderId, $sol_identificacion, $fileName, $fileContent);
                    // Insertar en la base de datos con el resultado de la subida a Drive
                    $rspta = $documentosol->insertar($sol_identificacion, $cat_id_tipodoc,$fileName, $resultadoSubida);

                    echo $rspta ? "Datos registrados correctamente" : "No se pudo registrar los datos";
                } else {
                    echo "Error al leer el contenido del archivo";
                }
            } else {
                echo "No se subió ningún archivo o el archivo temporal no existe";
            }
        } else {
            //echo "Valor de cat_id: " . $cat_id; // Imprime el valor de cat_id

            $rspta = $categoria->editar($cat_id, $cat_nombre, $cat_descripcion, $cat_padre);
            echo $rspta ? "Datos actualizados correctamente" : "No se pudo actualizar los datos";
        }
        break;

	case 'documentos':
		$rspta=$documentosol->documentos();
		while ($reg=$rspta->fetch_object()) {
				echo '<option value=' . $reg->cat_id.'>'.$reg->cat_nombre.'</option>';
		}		
		break;


        case 'listar':
            $rspta=$documentosol->listar();
            $data=Array();
            while ($reg=$rspta->fetch_object()) {
                $data[]=array(
                    "0" =>'<center><button class="btn btn-warning btn-xs" onclick="mostrar(' . $reg->doc_id . ')"><i class="fa fa-pen"></i></button></center>',
                    "1"=>$reg->cat_nombre,
                    "2"=>$reg->doc_url,
                );
            }

		$results=array(
             "sEcho"=>1,//info para datatables
             "iTotalRecords"=>count($data),//enviamos el total de registros al datatable
             "iTotalDisplayRecords"=>count($data),//enviamos el total de registros a visualizar
             "aaData"=>$data); 
		echo json_encode($results);
		break;

		case 'mostrar':
			//echo $_POST["cat_id"];
			$rspta=$documentosol->mostrar($doc_id);
			echo json_encode($rspta);
		break;

}
 ?>