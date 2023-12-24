<?php 
require_once "../modelos/Catalogo.php";

$catalogo=new Catalogo();

$cat_id=isset($_POST["cat_id"])? limpiarCadena($_POST["cat_id"]):"";
$cat_nombre=isset($_POST["cat_nombre"])? limpiarCadena($_POST["cat_nombre"]):"";
$cat_descripcion=isset($_POST["cat_descripcion"])? limpiarCadena($_POST["cat_descripcion"]):"";
$cat_padre=isset($_POST["cat_padre"])? limpiarCadena($_POST["cat_padre"]):"";
$cat_estado=isset($_POST["cat_estado"])? limpiarCadena($_POST["cat_estado"]):"";




switch ($_GET["op"]) {


    case 'padres':
		$rspta=$catalogo->mostrar();
		while ($reg=$rspta->fetch_object()) {
				echo '<option value=' . $reg->cat_id.'>'.$reg->cat_nombre.'</option>';
		}		
		break;


        case 'listar':
            $rspta=$catalogo->listar();
            $data=Array();
    
            while ($reg=$rspta->fetch_object()) {
                $data[] = array(
                    "0" => ($reg->cat_estado) ? 
                    '<button class="btn btn-danger btn-xs" onclick="desactivar('.$reg->cat_id.')"><i class="fa fa-times"></i></button>' : 
                    '<button class="btn btn-primary btn-xs" onclick="activar('.$reg->cat_id.')"><i class="fa fa-check"></i></button>',
                    "1" => $reg->cat_nombre,
                    "2" => $reg->cat_descripcion,
                    "3" => $reg->padre,
                    "4" => ($reg->cat_estado) ? '<span class="badge bg-success">Activado</span>' : '<span class="badge bg-danger">Desactivado</span>'
                );
            }
            $results=array(
                 "sEcho"=>1,//info para datatables
                 "iTotalRecords"=>count($data),//enviamos el total de registros al datatable
                 "iTotalDisplayRecords"=>count($data),//enviamos el total de registros a visualizar
                 "aaData"=>$data); 
            echo json_encode($results);
            break;


}


?>