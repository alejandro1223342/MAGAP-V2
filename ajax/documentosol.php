<?php 
require_once "../modelos/Documentosol.php";

$documentosol=new Documentosol();

$doc_id=isset($_POST["doc_id"])? limpiarCadena($_POST["doc_id"]):"";
$cat_id_tipodoc=isset($_POST["cat_id_tipodoc"])? limpiarCadena($_POST["cat_id_tipodoc"]):"";
$doc_nombre=isset($_POST["doc_nombre"])? limpiarCadena($_POST["doc_nombre"]):"";
$doc_url=isset($_POST["doc_url"])? limpiarCadena($_POST["doc_url"]):"";
$cat_id_estado=isset($_POST["cat_id_estado"])? limpiarCadena($_POST["cat_id_estado"]):"";
$sol_id = isset($_SESSION['sol_id']) ? $_SESSION['sol_id'] : 0;
$sol_identificacion = $_SESSION['sol_identificacion'];


switch ($_GET["op"]) {

	

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