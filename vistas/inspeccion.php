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
                            <h3 class="card-title">LISTA DE INFORMES
                            </h3>
                        </div>
                        <div class="table-responsive">

                            <div class="card-body">

                                <table id="tblsolicitantes" class="table table-bordered table-striped" style="width: 100%; ">
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

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card card-default">
                                            <div class="card-header">
                                                <h3 class="card-title">INFORME TÉCNICO DE INSPECCIÓN

                                                </h3>
                                            </div>
                                            <div class="card-body p-0">
                                                <div class="bs-stepper">
                                                    <div class="bs-stepper-header" role="tablist">
                                                        <!-- your steps here -->
                                                        <div class="step" data-target="#motivo-part">
                                                            <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                                                                <span class="bs-stepper-circle">1</span>
                                                            </button>
                                                        </div>
                                                        <div class="line"></div>

                                                        <!-- Coordenadas -->
                                                        <div class="step" data-target="#coordenadas-part">
                                                            <button type="button" class="step-trigger" role="tab" aria-controls="coordenadas-part" id="coordenadas-part-trigger">
                                                                <span class="bs-stepper-circle">2</span>
                                                            </button>
                                                        </div>
                                                        <div class="line"></div>

                                                        <!-- Infraestructura -->

                                                        <div class="step" data-target="#infraestructura-part">
                                                            <button type="button" class="step-trigger" role="tab" aria-controls="coordenadas-part" id="coordenadas-part-trigger">
                                                                <span class="bs-stepper-circle">3</span>
                                                            </button>
                                                        </div>
                                                        <div class="line"></div>

                                                        <!-- Estado de Tenencia -->

                                                        <div class="step" data-target="#tenencia-part">
                                                            <button type="button" class="step-trigger" role="tab" aria-controls="coordenadas-part" id="coordenadas-part-trigger">
                                                                <span class="bs-stepper-circle">4</span>
                                                            </button>
                                                        </div>
                                                        <div class="line"></div>



                                                        <!-- Construcciones -->
                                                        <div class="step" data-target="#construcciones-part">
                                                            <button type="button" class="step-trigger" role="tab" aria-controls="construcciones-part" id="construcciones-part-trigger">
                                                                <span class="bs-stepper-circle">5</span>
                                                            </button>
                                                        </div>
                                                        <div class="line"></div>

                                                        <!-- Infraestructura Agropecuaria -->
                                                        <div class="step" data-target="#agropecuaria-part">
                                                            <button type="button" class="step-trigger" role="tab" aria-controls="coordenadas-part" id="coordenadas-part-trigger">
                                                                <span class="bs-stepper-circle">6</span>
                                                            </button>
                                                        </div>
                                                        <div class="line"></div>
                                                        <!-- Características Afrologicas -->
                                                        <div class="step" data-target="#caracterreno-part">
                                                            <button type="button" class="step-trigger" role="tab" aria-controls="coordenadas-part" id="coordenadas-part-trigger">
                                                                <span class="bs-stepper-circle">7</span>
                                                            </button>
                                                        </div>
                                                        <div class="line"></div>


                                                    </div>
                                                    <div class="bs-stepper-content">
                                                        <!-- your steps content here -->
                                                        <div id="motivo-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">

                                                            <div class="form-group">

                                                                <div class="card">
                                                                    <div class="card-header">
                                                                        <h3 class="card-title">Motivo - Adjudicación
                                                                        </h3>
                                                                    </div>

                                                                    <form action="" name="form_motivo" id="form_motivo" method="POST">
                                                                        <section>
                                                                            <div class="card-body">
                                                                                <div class="row">
                                                                                    <!-- Contenido del primer formulario -->
                                                                                    <input class="form-control" type="text" name="pro_id" id="pro_id">
                                                                                    <div class="col-md-4">
                                                                                        <div class="form-group">
                                                                                            <label for="">APELLIDOS Y NOMBRES:</label>
                                                                                            <input type="text" class="form-control" name="nombres" id="nombres" placeholder="APELLIDOS Y NOMBRES">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-4">
                                                                                        <div class="form-group">
                                                                                            <label for="">CÉDULA (S) DE CIUDADANÍA No (S):</label>
                                                                                            <input type="text" class="form-control" name="identificacion" id="identificacion" placeholder="CÉDULA (S) DE CIUDADANÍA No (S):">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-4">
                                                                                        <div class="form-group">

                                                                                            <label>Provincia</label>
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



                                                                    </form>
                                                                </div>

                                                            </div>
                                                            <button class="btn btn-primary" onclick="stepper.next()">Next</button>
                                                        </div>

                                                        <!-- Coordenadas -->
                                                        <div id="coordenadas-part" class="content" role="tabpanel" aria-labelledby="coordenadas-part-trigger">
                                                            <div class="form-group">

                                                                <div class="card">
                                                                    <div class="card-header">
                                                                        <h3 class="card-title">Coordenadas Verificadas UTM <button class="btn btn-success" onclick="mostrarform_coor(true)"><i class="fa fa-plus-circle"></i> Agregar</button>
                                                                            <button class="btn btn-danger" id="btnRegresar_coor" type="button"><i class="fa fa-arrow-circle-left"></i> Regresar</button>
                                                                        </h3>
                                                                    </div>

                                                                    <form action="" name="form_coordenadas" id="form_coordenadas" method="POST">
                                                                        <section class="content" id="formulariocoor">
                                                                            <div class="card-body">
                                                                                <div class="row">
                                                                                    <input class="form-control" type="text" name="pro_id_coor" id="pro_id_coor">

                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label for="">Latitud(*)</label>
                                                                                            <input type="text" class="form-control" name="latitud" id="latitud" placeholder="Latitud">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label for="">Longitud(*)</label>
                                                                                            <input type="text" class="form-control" name="longitud" id="longitud" placeholder="Latitud">
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="row">
                                                                                        <div class="col-md-12">
                                                                                            <div class="form-group">
                                                                                                <button class="btn btn-primary" type="submit" id="btnGuardar_coor">
                                                                                                    <i class="fa fa-save"></i> Guardar
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>



                                                                                </div>
                                                                            </div>
                                                                        </section>

                                                                    </form>

                                                                    <div class="card-body">
                                                                        <!-- Contenido del primer formulario -->
                                                                        <div class="table-responsive">
                                                                            <table id="tblcoordenadas" class="table table-bordered table-striped " style="width: 100%; ">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th></th>
                                                                                        <th>Latitud</th>
                                                                                        <th>Longitud</th>

                                                                                    </tr>
                                                                                </thead>

                                                                            </table>

                                                                        </div>
                                                                        <section class="content-header" style="padding: 6px ;"></section>
                                                                    </div>



                                                                </div>
                                                            </div>




                                                            <button class="btn btn-secondary" onclick="stepper.previous()">Previous</button>
                                                            <button class="btn btn-primary" onclick="stepper.next()">Next</button>

                                                        </div>


                                                        <!-- Infraestructura -->
                                                        <div id="infraestructura-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                                                            <div class="form-group">
                                                                <div class="card">

                                                                    <div class="card-header">
                                                                        <h3 class="card-title">Infraestructura y Vías de Acceso
                                                                        </h3>
                                                                    </div>
                                                                    <form action="" name="form_infraestructura" id="form_infraestructura" method="POST">
                                                                        <div class="card-body">
                                                                            <div class="row">

                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label for="">Infraestructura</label>
                                                                                        <div class="select2-purple">
                                                                                            <select class="select2" multiple="multiple" data-placeholder="Infraestructura" data-dropdown-css-class="select2-purple" style="width: 100%;" name='cat_infraestructura' id='cat_infraestructura'>

                                                                                            </select>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label for="">Vías de Acceso</label>
                                                                                        <div class="select2-purple">
                                                                                            <select class="select2" multiple="multiple" data-placeholder="Vías de Acceso" data-dropdown-css-class="select2-purple" style="width: 100%;" name='cat_vias' id='cat_vias'>

                                                                                            </select>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <button class="btn btn-primary" type="submit" id="btnGuardar_infraestructura">
                                                                                            <i class="fa fa-save"></i> Guardar
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>


                                                                    </form>

                                                                </div>
                                                            </div>


                                                            <button class="btn btn-secondary" onclick="stepper.previous()">Previous</button>
                                                            <button class="btn btn-primary" onclick="stepper.next()">Next</button>
                                                        </div>


                                                        <!-- Estado de Tenencia -->

                                                        <div id="tenencia-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                                                            <div class="form-group">
                                                                <div class="card">
                                                                    <div class="card-header">
                                                                        <h3 class="card-title">Estado de Tenencia
                                                                        </h3>
                                                                    </div>
                                                                    <form action="" name="form_tenencia" id="form_tenencia" method="POST">

                                                                        <div class="card-body">
                                                                            <div class="row">
                                                                                <!-- Contenido del primer formulario -->
                                                                                <input class="form-control" type="text" name="pro_id_tenencia" id="pro_id_tenencia">
                                                                                <input class="form-control" type="text" name="ins_tenencia" id="ins_tenencia">


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


                                                                    </form>

                                                                </div>

                                                            </div>

                                                            <div class="form-group">
                                                                <div class="card">
                                                                    <div class="card-header">
                                                                        <h3 class="card-title">Observaciones
                                                                        </h3>
                                                                    </div>
                                                                    <form action="" name="form_tenencia" id="form_tenencia" method="POST">

                                                                        <div class="card-body">
                                                                            <div class="row">
                                                                                <!-- Contenido del primer formulario -->







                                                                            </div>

                                                                        </div>
                                                                    </form>

                                                                </div>

                                                            </div>

                                                            <button class="btn btn-secondary" onclick="stepper.previous()">Previous</button>
                                                            <button class="btn btn-primary" onclick="stepper.next()">Next</button>
                                                        </div>

                                                        <!-- Construcciones -->
                                                        <div id="construcciones-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                                                            <div class="form-group">
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


                                                            </div>
                                                            <button class="btn btn-secondary" onclick="stepper.previous()">Previous</button>
                                                            <button class="btn btn-primary" onclick="stepper.next()">Next</button>
                                                        </div>



                                                        <!-- Infraestructura Agropecuaria -->
                                                        <div id="agropecuaria-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                                                            <div class="form-group">
                                                                <div class="card">
                                                                    <div class="card-header">
                                                                        <h3 class="card-title">Infraestructura Agropecuaria <button class="btn btn-success" onclick="mostrarform_agro(true)"><i class="fa fa-plus-circle"></i> Agregar</button>
                                                                            <button class="btn btn-danger" id="btnRegresar_agro" type="button"><i class="fa fa-arrow-circle-left"></i> Regresar</button>
                                                                        </h3>
                                                                    </div>
                                                                    <form action="" name="form_agropecuaria" id="form_agropecuaria" method="POST">

                                                                        <section class="content" id="formularioagro">

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
                                                                                            <button class="btn btn-primary" type="submit" id="btnGuardar_agro">
                                                                                                <i class="fa fa-save"></i> Guardar
                                                                                            </button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <!-- Botones de Acción -->


                                                                            </div>




                                                                        </section>

                                                                        <div class="card-body">
                                                                            <div class="table-responsive">

                                                                                <table id="tblagropecuario" class="table table-bordered table-striped" style="width: 100%; ">
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

                                                                    </form>

                                                                </div>

                                                            </div>


                                                            <div class="form-group">
                                                                <div class="card">
                                                                    <div class="card-header">
                                                                        <h3 class="card-title">Observaciones
                                                                        </h3>
                                                                    </div>
                                                                    <form action="" name="form_tenencia" id="form_tenencia" method="POST">

                                                                        <div class="card-body">
                                                                            <div class="row">
                                                                                <!-- Contenido del primer formulario -->







                                                                            </div>

                                                                        </div>
                                                                    </form>

                                                                </div>

                                                            </div>

                                                            <button class="btn btn-secondary" onclick="stepper.previous()">Previous</button>

                                                            <button class="btn btn-primary" onclick="stepper.next()">Next</button>
                                                        </div>

                                                        <!-- Características Agrologicas -->

                                                        <div id="caracterreno-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                                                            <div class="form-group">
                                                                <div class="card">
                                                                    <div class="card-header">
                                                                        <h3 class="card-title">Caracteristicas Agrológicas del Terreno
                                                                        </h3>
                                                                    </div>

                                                                    <form action="" name="form_agrologicas" id="form_agrologicas" method="POST">
                                                                        <div class="card-body">

                                                                            <div class="row">
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

                                                                                        <label>Características del Suelo:</label>
                                                                                        <select class="form-control select2" style="width: 100%;" name="cat_id_provincia" id="cat_id_provincia">

                                                                                            <!-- Resto de opciones -->
                                                                                        </select>
                                                                                    </div>
                                                                                </div>

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

                                                                                        <label>Características del Suelo:</label>
                                                                                        <select class="form-control select2" style="width: 100%;" name="cat_id_provincia" id="cat_id_provincia">

                                                                                            <!-- Resto de opciones -->
                                                                                        </select>
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
                                                                                        <label for="">Pluviosidad:</label>
                                                                                        <input type="number" class="form-control" name="cat_descripcion" id="cat_descripcion" placeholder="Descripción">
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
                                                                                        <label for="">Pluviosidad:</label>
                                                                                        <input type="number" class="form-control" name="cat_descripcion" id="cat_descripcion" placeholder="Descripción">
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
                                                                                        <label for="">Pluviosidad:</label>
                                                                                        <input type="number" class="form-control" name="cat_descripcion" id="cat_descripcion" placeholder="Descripción">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </form>

                                                                </div>



                                                            </div>



                                                            <button class="btn btn-secondary" onclick="stepper.previous()">Previous</button>

                                                            <button class="btn btn-primary" onclick="stepper.next()">Next</button>
                                                        </div>






                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- /.card -->
                                    </div>
                                </div>



                            </div>
                        </section>

                        <!-- SEGUNDO INFORME -->
                        <section class="content" id="plan_manejo">
                            <div class="container-fluid">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">PLAN RURAL

                                        </h3>

                                    </div>
                                    <!-- Primer panel dentro del formulario -->

                                    <div class="card-body">

                                        <!-- Fin del primer panel -->


                                        <!-- Segundo panel dentro del formulario -->

                                        <!-- Fin del segundo panel -->

                                        <!-- Tercer panel dentro del formulario -->



                                        <!-- Fin del tercer panel -->

                                        <!-- Cuarto panel dentro del formulario -->


                                        <!-- Fin del cuarto panel -->

                                        <!-- Quinto panel dentro del formulario -->



                                        <!-- Fin del quinto panel -->

                                        <!-- Sexto panel dentro del formulario -->



                                        <!-- Fin del sexto panel -->

                                        <!-- Septimo panel dentro del formulario -->


                                        <!-- Fin del septimo panel -->

                                        <!-- Octavo panel dentro del formulario -->


                                        <!-- Fin del octavo panel -->

                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- FIN SEGUNDO INFORME -->

                        <!-- TERCER INFORME -->

                        <section class="content" id="informe_rural">
                            <div class="container-fluid">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">INFORME RURAL

                                        </h3>

                                    </div>
                                    <!-- Primer panel dentro del formulario -->

                                    <div class="card-body">

                                        <!-- Fin del primer panel -->


                                        <!-- Segundo panel dentro del formulario -->

                                        <!-- Fin del segundo panel -->

                                        <!-- Tercer panel dentro del formulario -->



                                        <!-- Fin del tercer panel -->

                                        <!-- Cuarto panel dentro del formulario -->


                                        <!-- Fin del cuarto panel -->

                                        <!-- Quinto panel dentro del formulario -->


                                        <!-- Fin del quinto panel -->

                                        <!-- Sexto panel dentro del formulario -->

                                        <!-- Fin del sexto panel -->

                                        <!-- Septimo panel dentro del formulario -->


                                        <!-- Fin del septimo panel -->

                                        <!-- Octavo panel dentro del formulario -->



                                        <!-- Fin del octavo panel -->

                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- FIN TERCER INFORME -->
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