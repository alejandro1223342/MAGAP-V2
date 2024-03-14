<?php
require_once "../modelos/Inspeccion_informes.php";

$inspeccion = new Inspeccion();

/*Construcciones*/
$ins_id = isset($_POST["ins_id"]) ? limpiarCadena($_POST["ins_id"]) : "";
$pro_id = isset($_POST["pro_id"]) ? limpiarCadena($_POST["pro_id"]) : "";
$pro_id_cons = isset($_POST["pro_id_cons"]) ? limpiarCadena($_POST["pro_id_cons"]) : "";
$cat_construccion = isset($_POST["cat_construccion"]) ? limpiarCadena($_POST["cat_construccion"]) : "";
$cat_materiales = isset($_POST["cat_materiales"]) ? limpiarCadena($_POST["cat_materiales"]) : "";
$cat_estado_construccion = isset($_POST["cat_estado_construccion"]) ? limpiarCadena($_POST["cat_estado_construccion"]) : "";
$superficie = isset($_POST["superficie"]) ? limpiarCadena($_POST["superficie"]) : "";
$edad_const = isset($_POST["edad_const"]) ? limpiarCadena($_POST["edad_const"]) : "";
$tiempo_ocupacion = isset($_POST["tiempo_ocupacion"]) ? limpiarCadena($_POST["tiempo_ocupacion"]) : "";
/*Fin*/

/*Estado de Tenencia*/
$pro_id_tenencia = isset($_POST["pro_id_tenencia"]) ? limpiarCadena($_POST["pro_id_tenencia"]) : "";
$cat_tenencia = isset($_POST["cat_tenencia"]) ? limpiarCadena($_POST["cat_tenencia"]) : "";
$cat_historia = isset($_POST["cat_historia"]) ? limpiarCadena($_POST["cat_historia"]) : "";
$cat_tipo_posesion = isset($_POST["cat_tipo_posesion"]) ? limpiarCadena($_POST["cat_tipo_posesion"]) : "";
$tiempo_posesion = isset($_POST["tiempo_posesion"]) ? limpiarCadena($_POST["tiempo_posesion"]) : "";
$tenencia_observaciones = isset($_POST["tenencia_observaciones"]) ? limpiarCadena($_POST["tenencia_observaciones"]) : "";
$ins_tenencia = isset($_POST["ins_tenencia"]) ? limpiarCadena($_POST["ins_tenencia"]) : "";

/* Motivo */
$predio = isset($_POST["predio"]) ? limpiarCadena($_POST["predio"]) : "";
$superficie = isset($_POST["superficie"]) ? limpiarCadena($_POST["superficie"]) : "";
$cabecera_parroquial = isset($_POST["cabecera_parroquial"]) ? limpiarCadena($_POST["cabecera_parroquial"]) : "";

/*COORDENADAS UTM*/
$pro_id_coor = isset($_POST["pro_id_coor"]) ? limpiarCadena($_POST["pro_id_coor"]) : "";
$latitud = isset($_POST["latitud"]) ? limpiarCadena($_POST["latitud"]) : "";
$longitud = isset($_POST["longitud"]) ? limpiarCadena($_POST["longitud"]) : "";

/*INFRA AGROPECUARIA*/
$pro_id_agro = isset($_POST["pro_id_agro"]) ? limpiarCadena($_POST["pro_id_agro"]) : "";
$cat_concepto = isset($_POST["cat_concepto"]) ? limpiarCadena($_POST["cat_concepto"]) : "";
$medida = isset($_POST["medida"]) ? limpiarCadena($_POST["medida"]) : "";
$cantidad = isset($_POST["cantidad"]) ? limpiarCadena($_POST["cantidad"]) : "";

$cat_estado_infraestructura = isset($_POST["cat_estado_infraestructura"]) ? limpiarCadena($_POST["cat_estado_infraestructura"]) : "";
$observaciones_agro = isset($_POST["observaciones_agro"]) ? limpiarCadena($_POST["observaciones_agro"]) : "";

/*USO SUELO*/
$pro_id_usosuelo = isset($_POST["pro_id_usosuelo"]) ? limpiarCadena($_POST["pro_id_usosuelo"]) : "";
$cat_concepto_suelo = isset($_POST["cat_concepto_suelo"]) ? limpiarCadena($_POST["cat_concepto_suelo"]) : "";
$superficie_suelo = isset($_POST["superficie_suelo"]) ? limpiarCadena($_POST["superficie_suelo"]) : "";
$cat_estado_suelo = isset($_POST["cat_estado_suelo"]) ? limpiarCadena($_POST["cat_estado_suelo"]) : "";
$edad_cultivos = isset($_POST["edad_cultivos"]) ? limpiarCadena($_POST["edad_cultivos"]) : "";

/*ACCIONES DE APOYO*/
$pro_id_apoyo = isset($_POST["pro_id_apoyo"]) ? limpiarCadena($_POST["pro_id_apoyo"]) : "";
$nombres_apoyo = isset($_POST["nombres_apoyo"]) ? limpiarCadena($_POST["nombres_apoyo"]) : "";
$cat_asistentes = isset($_POST["cat_asistentes"]) ? limpiarCadena($_POST["cat_asistentes"]) : "";
$colindates = isset($_POST["colindates"]) ? limpiarCadena($_POST["colindates"]) : "";


/*SEMOVIENTES*/
$pro_id_semovientes = isset($_POST["pro_id_semovientes"]) ? limpiarCadena($_POST["pro_id_semovientes"]) : "";
$cat_concepto_semo = isset($_POST["cat_concepto_semo"]) ? limpiarCadena($_POST["cat_concepto_semo"]) : "";
$semovientes_uno = isset($_POST["semovientes_uno"]) ? limpiarCadena($_POST["semovientes_uno"]) : "";
$cat_estado_semo = isset($_POST["cat_estado_semo"]) ? limpiarCadena($_POST["cat_estado_semo"]) : "";
$semovientes_dos = isset($_POST["semovientes_dos"]) ? limpiarCadena($_POST["semovientes_dos"]) : "";

/* CARACTERISTICAS AGROLOGICAS*/
$pro_id_agrologicas = isset($_POST["pro_id_agrologicas"]) ? limpiarCadena($_POST["pro_id_agrologicas"]) : "";
$plana = isset($_POST["plana"]) ? limpiarCadena($_POST["plana"]) : "";
$ondulada = isset($_POST["ondulada"]) ? limpiarCadena($_POST["ondulada"]) : "";
$quebrada = isset($_POST["quebrada"]) ? limpiarCadena($_POST["quebrada"]) : "";
$cat_id_fertilidad = isset($_POST["cat_id_fertilidad"]) ? limpiarCadena($_POST["cat_id_fertilidad"]) : "";
$cat_id_textura = isset($_POST["cat_id_textura"]) ? limpiarCadena($_POST["cat_id_textura"]) : "";
$cat_id_profundidad = isset($_POST["cat_id_profundidad"]) ? limpiarCadena($_POST["cat_id_profundidad"]) : "";
$cat_id_clase = isset($_POST["cat_id_clase"]) ? limpiarCadena($_POST["cat_id_clase"]) : "";
$pluviosidad = isset($_POST["pluviosidad"]) ? limpiarCadena($_POST["pluviosidad"]) : "";
$temperatura = isset($_POST["temperatura"]) ? limpiarCadena($_POST["temperatura"]) : "";
$altitud_agro = isset($_POST["altitud_agro"]) ? limpiarCadena($_POST["altitud_agro"]) : "";

/*Infraestructura, Vías de Acceso y Destino Económico*/
$pro_id_infra = isset($_POST["pro_id_infra"]) ? limpiarCadena($_POST["pro_id_infra"]) : "";
$cat_infraestructura = isset($_POST["cat_infraestructura"]) ? $_POST["cat_infraestructura"] : array();
$cat_vias = isset($_POST["cat_vias"]) ? ($_POST["cat_vias"]) : array();
$cat_destinoeco = isset($_POST["cat_destinoeco"]) ? ($_POST["cat_destinoeco"]) : array();


/*Fin*/

switch ($_GET["op"]) {

        /* Listar solicitantes */
    case 'listar':
        $rspta = $inspeccion->listar();
        $data = array();

        while ($reg = $rspta->fetch_object()) {
            $data[] = array(
                "0" => '<center><button class="btn btn-primary btn-xs" onclick=" mostrar(' . $reg->pro_id . '); mostrar2(' . $reg->pro_id . '); mostrar3(' . $reg->pro_id . '); mostrar4(' . $reg->pro_id . ')"><i class="fa fa-eye"></i></button></center>',
                "1" => $reg->sol_identificacion,
                "2" => $reg->sol_nombre,
                "3" => $reg->sol_telefono,
                "4" => $reg->sol_direccion
            );
        }
        $results = array(
            "sEcho" => 1, //info para datatables
            "iTotalRecords" => count($data), //enviamos el total de registros al datatable
            "iTotalDisplayRecords" => count($data), //enviamos el total de registros a visualizar
            "aaData" => $data
        );
        echo json_encode($results);
        break;
        /* Listar construcciones */
    case 'listar_construcciones':
        $rspta = $inspeccion->listar_construcciones();
        $data = array();

        while ($reg = $rspta->fetch_object()) {
            $data[] = array(
                "0" => '<center><button class="btn btn-danger btn-xs" id="btn_eliminar" onclick=" eliminar_construcciones(' . $reg->ins_id . ')"><i class="fa fa-times"></i></button></center>',
                "1" => $reg->construccion,
                "2" => $reg->materiales,
                "3" => $reg->estado,
                "4" => $reg->ins_dato1,
                "5" => $reg->ins_dato2,
                "6" => $reg->ins_dato3

            );
        }
        $results = array(
            "sEcho" => 1, //info para datatables
            "iTotalRecords" => count($data), //enviamos el total de registros al datatable
            "iTotalDisplayRecords" => count($data), //enviamos el total de registros a visualizar
            "aaData" => $data
        );
        echo json_encode($results);
        break;

        /* Listar coordenadas */

    case 'listar_coordenadas':
        $rspta = $inspeccion->listar_coordenadas($pro_id_coor);
        $data = array();

        while ($reg = $rspta->fetch_object()) {
            $data[] = array(
                "0" => '<center><button class="btn btn-danger btn-xs" id="btn_eliminarcoor" onclick=" eliminar_coor(' . $reg->ins_id . ')"><i class="fa fa-times"></i></button></center>',
                "1" => $reg->pro_id_coor,
                "2" => $reg->latitud,
                "3" => $reg->longitud,
            );
        }
        $results = array(
            "sEcho" => 1, //info para datatables
            "iTotalRecords" => count($data), //enviamos el total de registros al datatable
            "iTotalDisplayRecords" => count($data), //enviamos el total de registros a visualizar
            "aaData" => $data
        );
        echo json_encode($results);
        break;
        /* Listar infraestructuras */
    case 'listar_agropecuaria':
        $rspta = $inspeccion->listar_agropecuaria();
        $data = array();

        while ($reg = $rspta->fetch_object()) {
            $data[] = array(
                "0" => '<center><button class="btn btn-danger btn-xs" onclick=" eliminar(' . $reg->ins_id . ')"><i class="fa fa-times"></i></button></center>',
                "1" => $reg->concepto,
                "2" => $reg->unidad_medida,
                "3" => $reg->cantidad,
                "4" => $reg->estado
            );
        }
        $results = array(
            "sEcho" => 1, //info para datatables
            "iTotalRecords" => count($data), //enviamos el total de registros al datatable
            "iTotalDisplayRecords" => count($data), //enviamos el total de registros a visualizar
            "aaData" => $data
        );
        echo json_encode($results);
        break;

    case 'listar_usosuelos':
        $rspta = $inspeccion->listar_usosuelos();
        $data = array();

        while ($reg = $rspta->fetch_object()) {
            $data[] = array(
                "0" => '<center><button class="btn btn-danger btn-xs" onclick=" eliminar(' . $reg->ins_id . ')"><i class="fa fa-times"></i></button></center>',
                "1" => $reg->concepto,
                "2" => $reg->superficie,
                "3" => $reg->estado,
                "4" => $reg->edad,
            );
        }
        $results = array(
            "sEcho" => 1, //info para datatables
            "iTotalRecords" => count($data), //enviamos el total de registros al datatable
            "iTotalDisplayRecords" => count($data), //enviamos el total de registros a visualizar
            "aaData" => $data
        );
        echo json_encode($results);
        break;

    case 'listar_apoyo':
        $rspta = $inspeccion->listar_apoyo();
        $data = array();

        while ($reg = $rspta->fetch_object()) {
            $data[] = array(
                "0" => '<center><button class="btn btn-danger btn-xs" onclick=" eliminar(' . $reg->ins_id . ')"><i class="fa fa-times"></i></button></center>',
                "1" => $reg->asistente,
                "2" => $reg->tipo,
                "3" => $reg->testigo
            );
        }
        $results = array(
            "sEcho" => 1, //info para datatables
            "iTotalRecords" => count($data), //enviamos el total de registros al datatable
            "iTotalDisplayRecords" => count($data), //enviamos el total de registros a visualizar
            "aaData" => $data
        );
        echo json_encode($results);
        break;

    case 'listar_semovientes':
        $rspta = $inspeccion->listar_semovientes();
        $data = array();

        while ($reg = $rspta->fetch_object()) {
            $data[] = array(
                "0" => '<center><button class="btn btn-danger btn-xs" onclick=" eliminar(' . $reg->ins_id . ')"><i class="fa fa-times"></i></button></center>',
                "1" => $reg->concepto,
                "2" => $reg->superficie,
                "3" => $reg->estado,
                "4" => $reg->edad,
            );
        }
        $results = array(
            "sEcho" => 1, //info para datatables
            "iTotalRecords" => count($data), //enviamos el total de registros al datatable
            "iTotalDisplayRecords" => count($data), //enviamos el total de registros a visualizar
            "aaData" => $data
        );
        echo json_encode($results);
        break;


        /* Selects */
    case 'explicacion':
        $rspta = $inspeccion->explicacion();
        while ($reg = $rspta->fetch_object()) {
            echo '<option value=' . $reg->cat_id . '>' . $reg->cat_nombre . '</option>';
        }
        break;

    case 'vias':
        $rspta = $inspeccion->vias();
        while ($reg = $rspta->fetch_object()) {
            echo '<option value=' . $reg->cat_id . '>' . $reg->cat_nombre . '</option>';
        }
        break;

    case 'infraestructura':
        $rspta = $inspeccion->infraestructura();
        while ($reg = $rspta->fetch_object()) {
            echo '<option value=' . $reg->cat_id . '>' . $reg->cat_nombre . '</option>';
        }
        break;

    case 'historia':
        $rspta = $inspeccion->historia();
        while ($reg = $rspta->fetch_object()) {
            echo '<option value=' . $reg->cat_id . '>' . $reg->cat_nombre . '</option>';
        }
        break;

    case 'obtencion':
        $rspta = $inspeccion->obtencion();
        while ($reg = $rspta->fetch_object()) {
            echo '<option value=' . $reg->cat_id . '>' . $reg->cat_nombre . '</option>';
        }
        break;

    case 'construccion':
        $rspta = $inspeccion->construccion();
        while ($reg = $rspta->fetch_object()) {
            echo '<option value=' . $reg->cat_id . '>' . $reg->cat_nombre . '</option>';
        }
        break;

    case 'materiales':
        $rspta = $inspeccion->materiales();
        while ($reg = $rspta->fetch_object()) {
            echo '<option value=' . $reg->cat_id . '>' . $reg->cat_nombre . '</option>';
        }
        break;

    case 'estado_construccion':
        $rspta = $inspeccion->estado_construccion();
        while ($reg = $rspta->fetch_object()) {
            echo '<option value=' . $reg->cat_id . '>' . $reg->cat_nombre . '</option>';
        }
        break;

    case 'concepto':
        $rspta = $inspeccion->concepto();
        while ($reg = $rspta->fetch_object()) {
            echo '<option value=' . $reg->cat_id . '>' . $reg->cat_nombre . '</option>';
        }
        break;

    case 'concepto_suelo':
        $rspta = $inspeccion->concepto_suelo();
        while ($reg = $rspta->fetch_object()) {
            echo '<option value=' . $reg->cat_id . '>' . $reg->cat_nombre . '</option>';
        }
        break;

    case 'estado_suelo':
        $rspta = $inspeccion->estado_suelo();
        while ($reg = $rspta->fetch_object()) {
            echo '<option value=' . $reg->cat_id . '>' . $reg->cat_nombre . '</option>';
        }
        break;

    case 'destino_economico':
        $rspta = $inspeccion->destino_economico();
        while ($reg = $rspta->fetch_object()) {
            echo '<option value=' . $reg->cat_id . '>' . $reg->cat_nombre . '</option>';
        }
        break;

    case 'estado_infraestructura':
        $rspta = $inspeccion->estado_infraestructura();
        while ($reg = $rspta->fetch_object()) {
            echo '<option value=' . $reg->cat_id . '>' . $reg->cat_nombre . '</option>';
        }
        break;

    case 'tipo_posesion':
        $rspta = $inspeccion->tipo_posesion();
        while ($reg = $rspta->fetch_object()) {
            echo '<option value=' . $reg->cat_id . '>' . $reg->cat_nombre . '</option>';
        }
        break;

    case 'apoyo':
        $rspta = $inspeccion->apoyo();
        while ($reg = $rspta->fetch_object()) {
            echo '<option value=' . $reg->cat_id . '>' . $reg->cat_nombre . '</option>';
        }
        break;

    case 'concepto_semovientes':
        $rspta = $inspeccion->concepto_semovientes();
        while ($reg = $rspta->fetch_object()) {
            echo '<option value=' . $reg->cat_id . '>' . $reg->cat_nombre . '</option>';
        }
        break;

    case 'estado_semovientes':
        $rspta = $inspeccion->estado_semovientes();
        while ($reg = $rspta->fetch_object()) {
            echo '<option value=' . $reg->cat_id . '>' . $reg->cat_nombre . '</option>';
        }
        break;

    case 'destino_economico':
        $rspta = $inspeccion->destino_economico();
        while ($reg = $rspta->fetch_object()) {
            echo '<option value=' . $reg->cat_id . '>' . $reg->cat_nombre . '</option>';
        }
        break;

    case 'fertilidad':
        $rspta = $inspeccion->fertilidad();
        while ($reg = $rspta->fetch_object()) {
            echo '<option value=' . $reg->cat_id . '>' . $reg->cat_nombre . '</option>';
        }
        break;

    case 'textura':
        $rspta = $inspeccion->textura();
        while ($reg = $rspta->fetch_object()) {
            echo '<option value=' . $reg->cat_id . '>' . $reg->cat_nombre . '</option>';
        }
        break;

    case 'profundidad':
        $rspta = $inspeccion->profundidad();
        while ($reg = $rspta->fetch_object()) {
            echo '<option value=' . $reg->cat_id . '>' . $reg->cat_nombre . '</option>';
        }
        break;

    case 'clase_suelo':
        $rspta = $inspeccion->clase_suelo();
        while ($reg = $rspta->fetch_object()) {
            echo '<option value=' . $reg->cat_id . '>' . $reg->cat_nombre . '</option>';
        }
        break;




        /* Fin selects */

    case 'mostrar':

        $rspta = $inspeccion->mostrar($_GET["pro"]);

        echo json_encode($rspta);
        break;

    case 'mostrar_ten':

        $rspta = $inspeccion->mostrar_ten($_GET["pro"]);

        echo json_encode($rspta);
        break;

    case 'mostrar_motivo':

        $rspta = $inspeccion->mostrar_motivo($_GET["pro"]);

        echo json_encode($rspta);
        break;

    case 'mostrar_caragro':

        $rspta = $inspeccion->mostrar_caragro($_GET["pro"]);

        echo json_encode($rspta);
        break;

        /* Eliminar informacion de las tablas */
    case 'eliminar':
        $rspta = $inspeccion->eliminar($ins_id);
        echo "Valor de ins_id: " . $ins_id;

        echo $rspta ? "Datos eliminados correctamente" : "No se pudo eliminar los datos";
        break;
        /* Fin  */

        /* Guardar Motivo */
    case 'guardar_motivo':


        if (empty($ins_id)) {

            $rspta = $inspeccion->guardar_motivo(
                $pro_id,
                $predio,
                $superficie,
                $cabecera_parroquial,

            );
            echo $rspta ? "Datos registrados correctamente" : "No se pudo registrar los datos";
        } else {
            $rspta = $inspeccion->editar_motivo($ins_id, $predio, $superficie, $cabecera_parroquial);

            echo $rspta ? "Datos actualizados correctamente" : "No se pudo actualizar Login existente";
        }
        break;

    case 'guardar_coordenadas':


        if (empty($ins_id)) {

            $rspta = $inspeccion->guardar_coordenadas(
                $pro_id_coor,
                $latitud,
                $longitud,
            );
            echo $rspta ? "Datos registrados correctamente" : "No se pudo registrar los datos";
        }
        break;

        /* Guardar Construcciones*/
    case 'guardar_construccion':


        if (empty($ins_id)) {
            $rspta = $inspeccion->guardar_construccion(
                $pro_id_cons,
                $cat_construccion,
                $cat_materiales,
                $cat_estado_construccion,
                $superficie,
                $edad_const,
                $tiempo_ocupacion,

            );
            echo $rspta ? "Datos registrados correctamente" : "No se pudo registrar los datos";
        }
        break;

        /*Guardar Infraestructura Agropecuaria*/
    case 'guardar_agro':


        if (empty($ins_id)) {
            $rspta = $inspeccion->guardar_agro(
                $pro_id_agro,
                $cat_concepto,
                $medida,
                $cantidad,
                $cat_estado_infraestructura,
            );
            echo $rspta ? "Datos registrados correctamente" : "No se pudo registrar los datos";
        }
        break;


        /* Guardar Estado de tenencias */
    case 'guardaryeditar_tenencia':


        if (empty($ins_tenencia)) {

            $rspta = $inspeccion->guardaryeditar_tenencia(
                $pro_id_tenencia,
                $cat_tenencia,
                $cat_historia,
                $cat_tipo_posesion,
                $tiempo_posesion,
                $tenencia_observaciones
            );
            echo $rspta ? "Datos registrados correctamente" : "No se pudo registrar los datos";
        } else {
            echo "Entró en el bloque else";

            $rspta = $inspeccion->editar_tenencia($ins_tenencia, $cat_tenencia, $cat_historia, $cat_tipo_posesion, $tiempo_posesion, $tenencia_observaciones);

            echo $rspta ? "Datos actualizados correctamente" : "No se pudo actualizar Login existente";
        }
        break;

    case 'guardar_usosuelo':


        if (empty($ins_tenencia)) {

            $rspta = $inspeccion->guardar_usosuelo(
                $pro_id_usosuelo,
                $cat_concepto_suelo,
                $superficie_suelo,
                $cat_estado_suelo,
                $edad_cultivos,

            );
            echo $rspta ? "Datos registrados correctamente" : "No se pudo registrar los datos";
        } else {
            echo "Entró en el bloque else";

            $rspta = $inspeccion->editar_usosuelo($ins_tenencia, $cat_tenencia, $cat_historia, $cat_tipo_posesion, $tiempo_posesion, $tenencia_observaciones);

            echo $rspta ? "Datos actualizados correctamente" : "No se pudo actualizar Login existente";
        }
        break;

    case 'guardar_apoyo':


        if (empty($ins_tenencia)) {

            $rspta = $inspeccion->guardar_apoyo(
                $pro_id_apoyo,
                $nombres_apoyo,
                $cat_asistentes,
                $colindates,

            );
            echo $rspta ? "Datos registrados correctamente" : "No se pudo registrar los datos";
        }
        break;

    case 'guardar_semovientes':


        if (empty($ins_tenencia)) {

            $rspta = $inspeccion->guardar_semovientes(
                $pro_id_semovientes,
                $cat_concepto_semo,
                $semovientes_uno,
                $cat_estado_semo,
                $semovientes_dos

            );
            echo $rspta ? "Datos registrados correctamente" : "No se pudo registrar los datos";
        }
        break;


    case 'guardar_agrologicas':
        if (empty($ins_tenencia)) {
            $rspta1 = $inspeccion->guardar_agrologicas(
                $pro_id_agrologicas,
                $plana,
                $ondulada,
                $quebrada,
                $cat_id_fertilidad,
                $cat_id_textura,
                $cat_id_profundidad
            );

            $rspta2 = $inspeccion->guardar_agrologicas2(
                $pro_id_agrologicas,  // Si es necesario
                $cat_id_clase,
                $pluviosidad,
                $temperatura,
                $altitud_agro
            );
        }
        if ($rspta1 && $rspta2) {
            echo "Datos registrados correctamente";
        } else {
            echo "No se pudo registrar los datos";
        }
        break;

    case 'guardar_infraestructura':


        if (empty($ins_tenencia)) {

            $rspta1 = $inspeccion->guardar_infraestructura(
                $pro_id_infra,
                $cat_infraestructura,


            );

            $rspta2 = $inspeccion->guardar_infraestructura(
                $pro_id_infra,
                $cat_vias,


            );

            $rspta3 = $inspeccion->guardar_infraestructura(
                $pro_id_infra,
                $cat_destinoeco,


            );

            if ($rspta1 && $rspta2 && $rspta3) {
                echo "Datos registrados correctamente";
            } else {
                echo "No se pudo registrar los datos";
            }
            break;
        }
        break;

        /*Fin*/
}
