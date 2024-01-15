<?php
session_start();
require_once "../modelos/Solicitante.php";

$solicitante = new Solicitante();

$sol_id = isset($_POST["sol_id"]) ? limpiarCadena($_POST["sol_id"]) : "";
$sol_nombre = isset($_POST["sol_nombre"]) ? limpiarCadena($_POST["sol_nombre"]) : "";
$cat_id_identificacion = isset($_POST["cat_id_identificacion"]) ? limpiarCadena($_POST["cat_id_identificacion"]) : "";
$sol_identificacion = isset($_POST["sol_identificacion"]) ? limpiarCadena($_POST["sol_identificacion"]) : "";
$sol_telefono = isset($_POST["sol_telefono"]) ? limpiarCadena($_POST["sol_telefono"]) : "";
$sol_direccion = isset($_POST["sol_direccion"]) ? limpiarCadena($_POST["sol_direccion"]) : "";
$cat_id_provincia = isset($_POST["cat_id_provincia"]) ? limpiarCadena($_POST["cat_id_provincia"]) : "";
$cat_id_canton = isset($_POST["cat_id_canton"]) ? limpiarCadena($_POST["cat_id_canton"]) : "";
$cat_id_parroquia = isset($_POST["cat_id_parroquia"]) ? limpiarCadena($_POST["cat_id_parroquia"]) : "";
$cat_id_sector = isset($_POST["cat_id_sector"]) ? limpiarCadena($_POST["cat_id_sector"]) : "";
$sol_clave = isset($_POST["sol_clave"]) ? limpiarCadena($_POST["sol_clave"]) : "";
$sol_fechareg = isset($_POST["sol_fechareg"]) ? limpiarCadena($_POST["sol_fechareg"]) : "";
$sol_estado = isset($_POST["sol_estado"]) ? limpiarCadena($_POST["sol_estado"]) : "";

switch ($_GET["op"]) {

	case 'verificar':

		//validar si el usuario tiene acceso al sistema
		$logina = $_POST['logina'];
		$clavea = $_POST['clavea'];

		//Hash SHA256 en la contraseña
		$clavehash = hash("SHA256", $clavea);
		$rspta = $solicitante->verificar($logina, $clavehash);
		$fetch = $rspta->fetch_object();
		// echo $rspta;
		if (isset($fetch)) {
			# Declaramos la variables de sesion
			$_SESSION['sol_id'] = $fetch->sol_id;
			$_SESSION['sol_nombre'] = $fetch->sol_nombre;
			//$_SESSION['usu_login']=$fetch->usu_login;
			$_SESSION['sol_correo'] = $fetch->sol_correo;
			$_SESSION['sol_identificacion'] = $fetch->sol_identificacion;

			//determinamos lo accesos al usuario
			$_SESSION['Escritorio'] = 1;
			$_SESSION['Documentos'] = 1;
			/*$_SESSION['Activos'] = 1;
$_SESSION['Generación'] = 1;
$_SESSION['Acceso'] = 1;
$_SESSION['Reportes'] = 1;
$_SESSION['Custodios'] = 1;*/
		}
		echo json_encode($fetch);

		//echo $_SESSION['usu_cedula'];

		break;

	case 'salir':
		//limpiamos la variables de la secion
		session_unset();

		//destruimos la sesion
		session_destroy();
		//redireccionamos al usu_login
		header("Location: ../vistas/indexsol.php");
		break;
}
