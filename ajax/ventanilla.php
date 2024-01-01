<?php 
session_start();

require_once "../modelos/Ventanilla.php";


$ventanilla=new Ventanilla();

$tra_id=isset($_POST["tra_id"])? limpiarCadena($_POST["tra_id"]):"";
$sol_id=isset($_POST["sol_id"])? limpiarCadena($_POST["sol_id"]):"";
$doc_id=isset($_POST["doc_id"])? limpiarCadena($_POST["doc_id"]):"";

$pro_id=isset($_POST["pro_id"])? limpiarCadena($_POST["pro_id"]):"";
$usu_id =isset($_POST["usu_id"])? limpiarCadena($_POST["usu_id"]):""; 
$cat_id_estado =isset($_POST["cat_id_estado"])? limpiarCadena($_POST["cat_id_estado"]):"";
$cat_id_proceso  =isset($_POST["cat_id_proceso"])? limpiarCadena($_POST["cat_id_proceso"]):"";
$pro_observacion=isset($_POST["pro_observacion"])? limpiarCadena($_POST["pro_observacion"]):"";
$pro_fecha  =isset($_POST["pro_fecha"])? limpiarCadena($_POST["pro_fecha"]):"";
$pro_fechafin =isset($_POST["pro_fechafin"])? limpiarCadena($_POST["pro_fechafin"]):"";
$pro_trasabilidad=isset($_POST["pro_trasabilidad"])? limpiarCadena($_POST["pro_trasabilidad"]):"";

$usu_id = isset($_SESSION['usu_id']) ? $_SESSION['usu_id'] : '';




switch ($_GET["op"]) {


        case 'listar':
            $rspta=$ventanilla->listar();
            $data=Array();
            while ($reg=$rspta->fetch_object()) {
                $data[]=array(
                    "0" =>'<center><button class="btn btn-warning btn-xs" onclick="mostrar(' . $reg->tra_id . ')"><i class="fa fa-pen"></i></button></center>',
                    "1"=>$reg->sol_nombre,
                    "2"=>$reg->sol_telefono,
                    "3"=>$reg->sol_direccion
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
			$rspta=$ventanilla->mostrar($tra_id);
			echo json_encode($rspta);
		break;

        case 'estado':
            $rspta=$ventanilla->estado();
            while ($reg=$rspta->fetch_object()) {
                    echo '<option value=' . $reg->cat_id.'>'.$reg->cat_nombre.'</option>';
            }		
            break;


        case 'guardaryeditar':
            if (empty(!$tra_id)) {
                    $rspta=$ventanilla->insertar($usu_id,$tra_id,$cat_id_estado ,$pro_observacion);
                    echo $rspta ? "Datos registrados correctamente" : "No se pudo registrar los datos";

                    echo "Valor de cat_id: " . $usu_id;
                    echo "Valor de cat_id: ". $tra_id;
                    echo "Valor de cat_id: ".$cat_id_estado ;
                    echo "Valor de cat_id: ".$pro_observacion; // Imprime el valor de cat_id
                }else{
            
                     $rspta=$ventanilla->editar($cat_id,$cat_nombre,$cat_descripcion,$cat_padre);
                    echo $rspta ? "Datos actualizados correctamente" : "No se pudo actualizar los datos";
            }
            break;

}
 ?>