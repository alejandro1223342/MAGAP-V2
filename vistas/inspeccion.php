<?php
ob_start();
session_start();

if (!isset($_SESSION['usu_nombre'])) {
    header("Location: login.html");
} else {
    if ($_SESSION['Inspeccion'] == 0) {
        require 'header.php';
?>
        <div class="content-wrapper">
            <section class="content-header" style="padding: 4px ;"></section>
            <section class="content">
                <div class="container-fluid">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Solicitantes</h3>
                        </div>
                        <div class="table-responsive">

                            <div class="card-body">
                                <table id="tblsolicitantes" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Identificación</th>
                                            <th>Solicitante</th>
                                            <th>Telefono</th>
                                            <th>Dirección</th>
                                        </tr>
                                    </thead>

                                </table>
                            </div>
                        </div>
                        <!-- PRIMER INFORME -->

                        <section class="content" id="informe_tecnico">
                            <div class="container-fluid">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">INFORME TÉCNICO DE INSPECCIÓN </h3>

                                    </div>
                                    <!-- Primer panel dentro del formulario -->

                                    <div class="card-body">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">Motivo
                                                </h3>
                                            </div>
                                            <form action="" name="form_motivo" id="form_motivo" method="POST">

                                                <section class="content" id="formulario_informe">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <!-- Contenido del primer formulario -->

                                                            <div class="col-md-4">
                                                                <div class="form-group">

                                                                    <label>Explicación(*)</label>
                                                                    <select class="form-control select2" style="width: 100%;" name="cat_explicacion" id="cat_explicacion">
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Descripción</label>
                                                                    <textarea class="form-control" name="descripcion" id="descripcion" placeholder="Descripción"></textarea>
                                                                </div>
                                                            </div>
                                                            <!-- Agregar sobre este comentario si se agrega nuevo contenido -->

                                                        </div>
                                                        <!-- Botones de Acción -->
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <button class="btn btn-primary" type="submit" id="btnGuardar">
                                                                        <i class="fa fa-save"></i> Guardar
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Botones de Acción -->


                                                    </div>


                                                </section>
                                            </form>

                                        </div>
                                        <!-- Fin del primer panel -->


                                        <!-- Segundo panel dentro del formulario -->
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">Ubicación del Predio y Vías de Acceso
                                                </h3>
                                            </div>
                                            <form action="" name="form_ubicacion" id="form_ubicacion" method="POST">

                                                <section class="content" id="formulario_informe">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <!-- Contenido del primer formulario -->
                                                            <input class="form-control" type="text" name="pro_id" id="pro_id">

                                                            <div class="col-md-4">
                                                                <div class="form-group">

                                                                    <label for="">Provincia</label>
                                                                    <input type="text" class="form-control" name="provincia" id="provincia" placeholder="Nombre">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="">Cantón</label>
                                                                    <input type="text" class="form-control" name="canton" id="canton" placeholder="Descripción">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="">Parroquia</label>
                                                                    <input type="text" class="form-control" name="parroquia" id="parroquia" placeholder="Descripción">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="">Sector</label>
                                                                    <input type="text" class="form-control" name="sector" id="sector" placeholder="Descripción">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="">Nombre del Predio ó N° de Lote</label>
                                                                    <input type="text" class="form-control" name="predio" id="predio" placeholder="Descripción">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="">Superficie</label>
                                                                    <input type="text" class="form-control" name="superficie" id="superficie" placeholder="Descripción">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="">Distancia a la cabecera Parroquial(*)</label>
                                                                    <input type="number" class="form-control" name="cabecera_parroquial" id="cabecera_parroquial" placeholder="Descripción">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="">Vías de Acceso</label>
                                                                    <div class="select2-purple">
                                                                        <select class="select2" multiple="multiple" data-placeholder="Vías de Acceso" data-dropdown-css-class="select2-purple" style="width: 100%;" name='cat_vias' id='cat_vias'>

                                                                        </select>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="">Infraestructura</label>
                                                                    <div class="select2-purple">
                                                                        <select class="select2" multiple="multiple" data-placeholder="Infraestructura" data-dropdown-css-class="select2-purple" style="width: 100%;" name='cat_infraestructura' id='cat_infraestructura'>

                                                                        </select>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="">Distancia a la cabecera Parroquial(*)</label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" name="latitud[]" placeholder="Latitud">
                                                                        <input type="text" class="form-control" name="longitud[]" placeholder="Longitud">
                                                                        <div class="input-group-append">
                                                                            <button class="btn btn-primary btn-add">Agregar</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Agregar sobre este comentario si se agrega nuevo contenido -->

                                                        </div>
                                                        <!-- Botones de Acción -->
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <button class="btn btn-primary" type="submit" id="btnGuardar">
                                                                        <i class="fa fa-save"></i> Guardar
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Botones de Acción -->


                                                    </div>


                                                </section>
                                            </form>

                                        </div>
                                        <!-- Fin del segundo panel -->

                                        <!-- Tercer panel dentro del formulario -->

                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">Estado de Tenencia <button class="btn btn-success" onclick="mostrarform_tenen(true)"><i class="fa fa-plus-circle"></i> Agregar</button>
                                                    <button class="btn btn-danger" id="btnRegresar_tenencia" type="button"><i class="fa fa-arrow-circle-left"></i> Regresar</button>
                                                </h3>
                                            </div>
                                            <form action="" name="form_tenencia" id="form_tenencia" method="POST">

                                                <section class="content" id="formtenencia">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <!-- Contenido del primer formulario -->
                                                            <input class="form-control" type="text" name="pro_id_tenencia" id="pro_id_tenencia">

                                                            <div class="col-md-4">
                                                                <div class="form-group">

                                                                    <label>Forma de Tenecia:</label>
                                                                    <select class="form-control" style="width: 100%;" name="cat_tenencia" id="cat_tenencia" data-live-search="true">

                                                                        <!-- Resto de opciones -->
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Historia de Tenencia:</label>
                                                                    <select class="form-control select2" style="width: 100%;" name="cat_historia" id="cat_historia">

                                                                        <!-- Resto de opciones -->
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>El predio se obtuvo mediante:</label>
                                                                    <select class="form-control select2" style="width: 100%;" name="cat_tipo_posesion" id="cat_tipo_posesion">

                                                                        <!-- Resto de opciones -->
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="">Tiempo de posesión:</label>
                                                                    <input type="number" class="form-control" name="tiempo_posesion" id="tiempo_posesion" placeholder="Descripción">
                                                                </div>
                                                            </div>



                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="">Observaciones:</label>
                                                                    <textarea class="form-control" name="tenencia_observaciones" id="tenencia_observaciones" placeholder="Descripción"></textarea>
                                                                </div>
                                                            </div>
                                                            <!-- Agregar sobre este comentario si se agrega nuevo contenido -->

                                                        </div>
                                                        <!-- Botones de Acción -->
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <button class="btn btn-primary" type="submit" id="btnGuardar_Tenencia">
                                                                        <i class="fa fa-save"></i> Guardar Estado
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Botones de Acción -->


                                                    </div>


                                                </section>
                                            </form>

                                        </div>

                                        <!-- Fin del tercer panel -->

                                        <!-- Cuarto panel dentro del formulario -->

                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">Construcciones <button class="btn btn-success" onclick="mostrarform_const(true)"><i class="fa fa-plus-circle"></i> Agregar</button>
                                                    <button class="btn btn-danger" id="btnRegresar" type="button"><i class="fa fa-arrow-circle-left"></i> Regresar</button>
                                                </h3>
                                            </div>


                                            <form action="" name="form_construccion" id="form_construccion" method="POST">

                                                <section class="content" id="formulariocons">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <!-- Contenido del primer formulario -->
                                                            <input class="form-control" type="text" name="pro_id_cons" id="pro_id_cons">

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Construcción(*)</label>
                                                                    <select class="form-control " style="width: 100%;" name="cat_construccion" id="cat_construccion">
                                                                        <!-- Resto de opciones -->
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Materiales(*)</label>
                                                                    <select class="form-control select2" style="width: 100%;" name="cat_materiales" id="cat_materiales">
                                                                        <!-- Resto de opciones -->
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="">Estado</label>
                                                                    <select class="form-control select2" style="width: 100%;" name="cat_estado_construccion" id="cat_estado_construccion">
                                                                        <!-- Resto de opciones -->
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="">Superficie (.ha)</label>
                                                                    <input type="text" class="form-control" name="superficie" id="superficie" placeholder="Descripción">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="">Edad de Const.</label>
                                                                    <input type="text" class="form-control" name="edad_const" id="edad_const" placeholder="Descripción">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="">Tiempo de Ocupación</label>
                                                                    <input type="text" class="form-control" name="tiempo_ocupacion" id="tiempo_ocupacion" placeholder="Descripción">
                                                                </div>
                                                            </div>
                                                            <!-- Agregar sobre este comentario si se agrega nuevo contenido -->

                                                        </div>
                                                        <!-- Botones de Acción -->
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <button class="btn btn-primary" type="submit" id="btnGuardar_const">
                                                                        <i class="fa fa-save"></i> Guardar
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Botones de Acción -->


                                                    </div>


                                                </section>
                                            </form>

                                            <div class="card-body">
                                                <!-- Contenido del primer formulario -->
                                                <div class="table-responsive">
                                                    <table id="tblconstruccion" class="table table-bordered table-striped " style="width: 100%; ">
                                                        <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th>Construcción</th>
                                                                <th>Materiales</th>
                                                                <th>Estado</th>
                                                                <th>Superficie</th>
                                                                <th>Edad</th>
                                                                <th>Ocupación</th>
                                                            </tr>
                                                        </thead>

                                                    </table>

                                                </div>
                                                <section class="content-header" style="padding: 6px ;"></section>

                                            </div>

                                        </div>
                                        <!-- Fin del cuarto panel -->

                                        <!-- Quinto panel dentro del formulario -->

                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">Infraestructura Agropecuaria
                                                </h3>
                                            </div>
                                            <form action="" name="form_infraestructura" id="form_infraestructura" method="POST">

                                                <section class="content" id="formulario_informe">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <!-- Contenido del primer formulario -->

                                                            <div class="col-md-4">
                                                                <div class="form-group">

                                                                    <label>Concepto(*)</label>
                                                                    <select class="form-control select2" style="width: 100%;" name="cat_concepto" id="cat_concepto">

                                                                        <!-- Resto de opciones -->
                                                                    </select>
                                                                </div>
                                                            </div>


                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="">Unidad de Medida</label>
                                                                    <input type="text" class="form-control" name="medida" id="medida" placeholder="Descripción">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="">Cantidad</label>
                                                                    <input type="text" class="form-control" name="cantidad" id="cat_descripcion" placeholder="Descripción">
                                                                </div>
                                                            </div>



                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="">Estado</label>
                                                                    <select class="form-control select2" style="width: 100%;" name="cat_estado_infraestructura" id="cat_estado_infraestructura">
                                                                        <!-- Resto de opciones -->
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <!-- Agregar sobre este comentario si se agrega nuevo contenido -->

                                                        </div>
                                                        <!-- Botones de Acción -->
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <button class="btn btn-primary" type="submit" id="btnGuardar">
                                                                        <i class="fa fa-save"></i> Guardar
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Botones de Acción -->
                                                        <div class="card-body">
                                                            <div class="table-responsive">

                                                                <table id="tblinfraestructura" class="table table-bordered table-striped" style="width: 100%; ">
                                                                    <thead>
                                                                        <tr>
                                                                            <th></th>
                                                                            <th>Concepto</th>
                                                                            <th>Unid. de Medida</th>
                                                                            <th>Cantidad</th>
                                                                            <th>Estado</th>

                                                                        </tr>
                                                                    </thead>
                                                                </table>
                                                            </div>
                                                        </div>

                                                    </div>


                                                </section>
                                            </form>

                                        </div>

                                        <!-- Fin del quinto panel -->

                                        <!-- Sexto panel dentro del formulario -->
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">Caracteristicas Agrológicas del Terreno
                                                </h3>
                                            </div>
                                            <form action="" name="form_agrologicas" id="form_agrologicas" method="POST">

                                                <section class="content" id="formulario_informe">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <!-- Contenido del primer formulario -->

                                                            <div class="col-md-4">
                                                                <div class="form-group">

                                                                    <label>Características del Suelo:</label>
                                                                    <select class="form-control select2" style="width: 100%;" name="cat_id_provincia" id="cat_id_provincia">

                                                                        <!-- Resto de opciones -->
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Seleccione:</label>
                                                                    <select class="form-control select2" style="width: 100%;" name="cat_id_provincia" id="cat_id_provincia">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Clase:</label>
                                                                    <select class="form-control select2" style="width: 100%;" name="cat_id_provincia" id="cat_id_provincia">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="">Pluviosidad:</label>
                                                                    <input type="number" class="form-control" name="cat_descripcion" id="cat_descripcion" placeholder="Descripción">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="">Temperatura media:</label>
                                                                    <input type="number" class="form-control" name="cat_descripcion" id="cat_descripcion" placeholder="Descripción">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="">Altitud:</label>
                                                                    <input type="number" class="form-control" name="cat_descripcion" id="cat_descripcion" placeholder="Descripción">
                                                                </div>
                                                            </div>

                                                            <!-- Agregar sobre este comentario si se agrega nuevo contenido -->

                                                        </div>
                                                        <!-- Botones de Acción -->
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <button class="btn btn-primary" type="submit" id="btnGuardar">
                                                                        <i class="fa fa-save"></i> Guardar
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Botones de Acción -->

                                                    </div>


                                                </section>
                                            </form>

                                        </div>


                                        <!-- Fin del sexto panel -->

                                        <!-- Septimo panel dentro del formulario -->

                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">Uso Actual del Suelo
                                                </h3>
                                            </div>
                                            <form action="" name="form_usosuelo" id="form_usosuelo" method="POST">

                                                <section class="content" id="formulario_informe">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <!-- Contenido del primer formulario -->

                                                            <div class="col-md-4">
                                                                <div class="form-group">

                                                                    <label>Concepto:</label>
                                                                    <select class="form-control select2" style="width: 100%;" name="cat_concepto_suelo" id="cat_concepto_suelo">

                                                                        <!-- Resto de opciones -->
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="">Superficie (.ha)</label>
                                                                    <input type="number" class="form-control" name="sueperficie" id="sueperficie" placeholder="Descripción">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">

                                                                    <label>Estado:</label>
                                                                    <select class="form-control select2" style="width: 100%;" name="cat_estado_suelo" id="cat_estado_suelo">

                                                                        <!-- Resto de opciones -->
                                                                    </select>
                                                                </div>
                                                            </div>


                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="">Edad de Cultivos</label>
                                                                    <input type="number" class="form-control" name="edad_cultivos" id="edad_cultivos" placeholder="Descripción">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="">Destino Económico</label>
                                                                    <div class="select2-purple">
                                                                        <select class="select2" multiple="multiple" data-placeholder="Destino Económico" data-dropdown-css-class="select2-purple" style="width: 100%;" name="cat_destino_economico" id="cat_destino_economico">


                                                                        </select>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="">Observaciones:</label>
                                                                    <textarea class="form-control" name="suelo_observaciones" id="suelo_observaciones" placeholder="Descripción"></textarea>
                                                                </div>
                                                            </div>

                                                            <!-- Agregar sobre este comentario si se agrega nuevo contenido -->

                                                        </div>
                                                        <!-- Botones de Acción -->
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <button class="btn btn-primary" type="submit" id="btnGuardar">
                                                                        <i class="fa fa-save"></i> Guardar
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Botones de Acción -->
                                                        <div class="table-responsive">

                                                            <table id="tblusosuelo" class="table table-bordered table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th></th>
                                                                        <th>Concepto</th>
                                                                        <th>Superficie</th>
                                                                        <th>Estado</th>
                                                                        <th>Edad de Cultivos</th>
                                                                        <th>Destino Economico</th>
                                                                        <th>Observaciones</th>
                                                                    </tr>
                                                                </thead>

                                                            </table>
                                                        </div>
                                                    </div>


                                                </section>
                                            </form>

                                        </div>

                                        <!-- Fin del septimo panel -->

                                        <!-- Octavo panel dentro del formulario -->

                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">Acciones de Apoyo
                                                </h3>
                                            </div>
                                            <form action="" name="form_accionesapoyo" id="form_accionesapoyo" method="POST">

                                                <section class="content" id="formulario_informe">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <!-- Contenido del primer formulario -->
                                                            <div class="col-md-6">
                                                                <div class="form-group">

                                                                    <label for="">Apellido y Nombres de Asistentes a la Inspección</label>
                                                                    <input type="text" class="form-control" name="nombres" id="nombres" placeholder="Descripción">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>En Calidad de:(*)</label>
                                                                    <select class="form-control select2" style="width: 100%;" name="cat_asistentes" id="cat_colindantes">

                                                                        <!-- Resto de opciones -->
                                                                    </select>
                                                                </div>
                                                            </div>


                                                            <div class="col-md-6">
                                                                <div class="form-group">

                                                                    <label for="">Apellidos y Nombres de Testigos o Colindantes</label>
                                                                    <input type="text" class="form-control" name="colindates" id="colindates" placeholder="Descripción">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Conclusiones y Recomendaciones:(*)</label>
                                                                    <select class="form-control select2" style="width: 100%;" name="cat_conclusiones" id="cat_coclusiones">

                                                                        <!-- Resto de opciones -->
                                                                    </select>
                                                                </div>
                                                            </div>


                                                            <!-- Agregar sobre este comentario si se agrega nuevo contenido -->

                                                        </div>
                                                        <!-- Botones de Acción -->
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <button class="btn btn-primary" type="submit" id="btnGuardar">
                                                                        <i class="fa fa-save"></i> Guardar
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="table-responsive">

                                                            <table id="tblaccionesapoyo" class="table table-bordered table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th></th>
                                                                        <th>Asistentes</th>
                                                                        <th>En calidad de:</th>
                                                                        <th>Colindantes</th>
                                                                        <th>Conclusiones</th>

                                                                    </tr>
                                                                </thead>

                                                            </table>
                                                        </div>
                                                        <!-- Botones de Acción -->

                                                    </div>


                                                </section>
                                            </form>

                                        </div>

                                        <!-- Fin del octavo panel -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <button class="btn btn-danger">
                                                        Crear PDF <i class="fa fa-file-pdf"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </section>
            <!-- FIN PRIMER INFORME -->
            <!-- SEGUNDO INFORME -->
            <!-- FIN DE SEGUNDO INFORME -->
        </div>
        </div>

    <?php
    } else {
        require 'noacceso.php';
    }
    require 'footer.php';
    ?>
    <script src="scripts/inspeccion.js"></script>
    <!--   <script src="../public/js/select2.full.min.js"></script>
-->
<?php
}
ob_end_flush();
?>