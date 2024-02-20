<?php 
require_once "../modelos/Registro.php";

$registro=new Registro();

$sol_id=isset($_POST["sol_id"])? limpiarCadena($_POST["sol_id"]):"";
$cat_id_identificacion=isset($_POST["cat_id_identificacion"])? limpiarCadena($_POST["cat_id_identificacion"]):"";
$sol_identificacion=isset($_POST["sol_identificacion"])? limpiarCadena($_POST["sol_identificacion"]):"";
$sol_correo=isset($_POST["sol_correo"])? limpiarCadena($_POST["sol_correo"]):"";
$sol_nombre=isset($_POST["sol_nombre"])? limpiarCadena($_POST["sol_nombre"]):"";
$sol_telefono=isset($_POST["sol_telefono"])? limpiarCadena($_POST["sol_telefono"]):"";
$sol_direccion=isset($_POST["sol_direccion"])? limpiarCadena($_POST["sol_direccion"]):"";
$cat_id_provincia=isset($_POST["cat_id_provincia"])? limpiarCadena($_POST["cat_id_provincia"]):"";
$cat_id_canton=isset($_POST["cat_id_canton"])? limpiarCadena($_POST["cat_id_canton"]):"";
$cat_id_parroquia=isset($_POST["cat_id_parroquia"])? limpiarCadena($_POST["cat_id_parroquia"]):"";
$cat_id_sector=isset($_POST["cat_id_sector"])? limpiarCadena($_POST["cat_id_sector"]):"";
$sol_clave=isset($_POST["sol_clave"])? limpiarCadena($_POST["sol_clave"]):"";
$sol_fechareg=isset($_POST["sol_fechareg"])? limpiarCadena($_POST["sol_fechareg"]):"";
$sol_estado=isset($_POST["sol_estado"])? limpiarCadena($_POST["sol_estado"]):"";
$claveu=isset($_POST["claveu"])? limpiarCadena($_POST["claveu"]):"";

switch ($_GET["op"]) {

    case 'guardaryeditar':

        if ($claveu==$sol_clave){
            $usu_clavehash=$sol_clave;
            }
        else{
            $usu_clavehash=hash("SHA256", $sol_clave);
            }

	if (empty($sol_id)) {
		$rspta=$registro->insertar($cat_id_identificacion,$sol_identificacion ,$sol_correo,$sol_nombre,
        $sol_telefono,$sol_direccion,$cat_id_provincia,  $cat_id_canton,$cat_id_parroquia,  
        $cat_id_sector,$usu_clavehash);
        echo $rspta ? "Datos registrados correctamente" : "No se pudo registrar los datos";
	}
		break;

    case 'identificacion':
		$rspta=$registro->identificacion();
		while ($reg=$rspta->fetch_object()) {
				echo '<option value=' . $reg->cat_id.'>'.$reg->cat_nombre.'</option>';
		}		
		break;

         case 'provincia':
            $rspta=$registro->provincia();
            while ($reg=$rspta->fetch_object()) {
                     echo '<option value=' . $reg->cat_id.'>'.$reg->cat_nombre.'</option>';
            }		
                break;
    
        case 'canton':
            $rspta=$registro->canton();
            while ($reg=$rspta->fetch_object()) {
                    echo '<option value=' . $reg->cat_id.'>'.$reg->cat_nombre.'</option>';
            }		
                break;
    
        case 'parroquia':
            $rspta=$registro->parroquia($cat_id_canton);
            while ($reg=$rspta->fetch_object()) {
                    echo '<option value=' . $reg->cat_id.'>'.$reg->cat_nombre.'</option>';
            }		
                break;
    
        case 'sector':
            $rspta=$registro->sector();
            while ($reg=$rspta->fetch_object()) {
                    echo '<option value=' . $reg->cat_id.'>'.$reg->cat_nombre.'</option>';
            }		
                break; 



}
