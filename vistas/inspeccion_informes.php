<?php
ob_start();
session_start();

if (!isset($_SESSION['usu_nombre'])) {
    header("Location: login.html");
} else {
    if ($_SESSION['Inspección'] == 1) {
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
                                                        <div class="step col-md-1" data-target="#motivo-part">

                                                            <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                                                                <span class="bs-stepper-circle">1</span>
                                                            </button>
                                                        </div>
                                                        <hr style="width: calc(100% / 11); margin: 0;">

                                                        <!-- Coordenadas -->
                                                        <div class="step col-md-1" data-target="#coordenadas-part">
                                                            <button type="button" class="step-trigger" role="tab" aria-controls="coordenadas-part" id="coordenadas-part-trigger">
                                                                <span class="bs-stepper-circle">2</span>
                                                            </button>
                                                        </div>
                                                        <hr style="width: calc(100% / 11); margin: 0;">

                                                        <!-- Infraestructura -->

                                                        <div class="step col-md-1" data-target="#infraestructura-part">
                                                            <button type="button" class="step-trigger" role="tab" aria-controls="infraestructura-part" id="infraestructura-part-trigger">
                                                                <span class="bs-stepper-circle">3</span>
                                                            </button>
                                                        </div>
                                                        <hr style="width: calc(100% / 11); margin: 0;">

                                                        <!-- Estado de Tenencia -->

                                                        <div class="step col-md-1" data-target="#tenencia-part">
                                                            <button type="button" class="step-trigger" role="tab" aria-controls="tenencia-part" id="tenencia-part-trigger">
                                                                <span class="bs-stepper-circle">4</span>
                                                            </button>
                                                        </div>
                                                        <hr style="width: calc(100% / 11); margin: 0;">



                                                        <!-- Construcciones -->
                                                        <div class="step col-md-1" data-target="#construcciones-part">
                                                            <button type="button" class="step-trigger" role="tab" aria-controls="construcciones-part" id="construcciones-part-trigger">
                                                                <span class="bs-stepper-circle">5</span>
                                                            </button>
                                                        </div>
                                                        <hr style="width: calc(100% / 11); margin: 0;">

                                                        <!-- Infraestructura Agropecuaria -->
                                                        <div class="step col-md-1" data-target="#agropecuaria-part">
                                                            <button type="button" class="step-trigger" role="tab" aria-controls="agropecuaria-part" id="agropecuaria-part-trigger">
                                                                <span class="bs-stepper-circle">6</span>
                                                            </button>
                                                        </div>
                                                        <hr style="width: calc(100% / 11); margin: 0;">
                                                        <!-- Características Afrologicas -->
                                                        <div class="step col-md-1" data-target="#caracterreno-part">
                                                            <button type="button" class="step-trigger" role="tab" aria-controls="caracterreno-part" id="caracterreno-part-trigger">
                                                                <span class="bs-stepper-circle">7</span>
                                                            </button>
                                                        </div>
                                                        <hr style="width: calc(100% / 11); margin: 0;">

                                                        <!-- Uso Actual del Suelo -->
                                                        <div class="step col-md-1" data-target="#usosuelo-part">
                                                            <button type="button" class="step-trigger" role="tab" aria-controls="usosuelo-part" id="coordenadas-part-trigger">
                                                                <span class="bs-stepper-circle">8</span>
                                                            </button>
                                                        </div>
                                                        <hr style="width: calc(100% / 11); margin: 0;">

                                                        <!-- Semovientes -->
                                                        <div class="step col-md-1" data-target="#semovientes-part">
                                                            <button type="button" class="step-trigger" role="tab" aria-controls="semovientes-part" id="coordenadas-part-trigger">
                                                                <span class="bs-stepper-circle">9</span>
                                                            </button>
                                                        </div>
                                                        <hr style="width: calc(100% / 11); margin: 0;">

                                                        <!-- Acciones de Apoyo -->
                                                        <div class="step col-md-1" data-target="#apoyo-part">
                                                            <button type="button" class="step-trigger" role="tab" aria-controls="apoyo-part" id="coordenadas-part-trigger">
                                                                <span class="bs-stepper-circle">10</span>
                                                            </button>
                                                        </div>




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
                                                                                    <input class="form-control" type="text" name="tra_id" id="tra_id">
                                                                                    <input class="form-control" type="text" name="ins_id" id="ins_id">

                                                                                    <div class="col-md-4">
                                                                                        <div class="form-group">
                                                                                            <label for="">APELLIDOS Y NOMBRES:</label>
                                                                                            <input type="text" class="form-control" name="nombres" id="nombres" placeholder="APELLIDOS Y NOMBRES" readonly>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-4">
                                                                                        <div class="form-group">
                                                                                            <label for="">CÉDULA (S) DE CIUDADANÍA No (S):</label>
                                                                                            <input type="text" class="form-control" name="identificacion" id="identificacion" placeholder="CÉDULA (S) DE CIUDADANÍA No (S):" readonly>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-4">
                                                                                        <div class="form-group">

                                                                                            <label>Provincia</label>
                                                                                            <input type="text" class="form-control" name="provincia" id="provincia" placeholder="Provincia" readonly>

                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-md-4">
                                                                                        <div class="form-group">
                                                                                            <label for="">Cantón</label>
                                                                                            <input type="text" class="form-control" name="canton" id="canton" placeholder="Cantón" readonly>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-md-4">
                                                                                        <div class="form-group">
                                                                                            <label for="">Parroquia</label>
                                                                                            <input type="text" class="form-control" name="parroquia" id="parroquia" placeholder="Parroquia" readonly>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-md-4">
                                                                                        <div class="form-group">
                                                                                            <label for="">Sector</label>
                                                                                            <input type="text" class="form-control" name="sector" id="sector" placeholder="Sector" readonly>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-md-4">
                                                                                        <div class="form-group">
                                                                                            <label for="">Nombre del Predio ó N° de Lote</label>
                                                                                            <input type="text" class="form-control" name="predio" id="predio" placeholder="Nombre del Predio ó N° de Lote">
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-md-4">
                                                                                        <div class="form-group">
                                                                                            <label for="">Superficie</label>
                                                                                            <input type="text" class="form-control" name="superficie" id="superficie" placeholder="Superficie">
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-md-4">
                                                                                        <div class="form-group">
                                                                                            <label for="">Distancia a la cabecera Parroquial(*)</label>
                                                                                            <input type="number" class="form-control" name="cabecera_parroquial" id="cabecera_parroquial" placeholder="Distancia a la cabecera Parroquial">
                                                                                        </div>
                                                                                    </div>


                                                                                    <!-- Agregar sobre este comentario si se agrega nuevo contenido -->

                                                                                </div>
                                                                                <!-- Botones de Acción -->
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group">
                                                                                            <button class="btn btn-primary" type="submit" id="btnGuardar_motivo">
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
                                                            <button class="btn btn-primary" onclick="stepper.next()">Siguiente</button>
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
                                                                                    <input class="form-control" type="text" name="tra_id_coor" id="tra_id_coor">
                                                                                    <input class="form-control" type="text" name="ins_id_coor" id="ins_id_coor">

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
                                                                        <h3 class="card-title">Infraestructura, Vías de Acceso y Destino Económico
                                                                        </h3>
                                                                    </div>
                                                                    <form action="" name="form_infraestructura" id="form_infraestructura" method="POST">
                                                                        <div class="card-body">
                                                                            <div class="row">
                                                                                <input class="form-control" type="text" name="pro_id_infra" id="pro_id_infra">

                                                                                <div class="col-md-4">
                                                                                    <div class="form-group">
                                                                                        <label for="">Infraestructura</label>
                                                                                        <div class="select2-purple">
                                                                                            <select class="select2" multiple="multiple" data-placeholder="Infraestructura" data-dropdown-css-class="select2-purple" style="width: 100%;" name='cat_infraestructura[]'>

                                                                                            </select>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-4">
                                                                                    <div class="form-group">
                                                                                        <label for="">Vías de Acceso</label>
                                                                                        <div class="select2-purple">
                                                                                            <select class="select2" multiple="multiple" data-placeholder="Vías de Acceso" data-dropdown-css-class="select2-purple" style="width: 100%;" name='cat_vias[]'>

                                                                                            </select>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-4">
                                                                                    <div class="form-group">
                                                                                        <label for="">Destino Económico </label>
                                                                                        <div class="select2-purple">
                                                                                            <select class="select2" multiple="multiple" data-placeholder="Destino Económico" data-dropdown-css-class="select2-purple" style="width: 100%;" name='cat_destinoeco[]'>
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

                                                                                <div class="col-md-4">
                                                                                    <div class="form-group">
                                                                                        <label for="">Observaciones:</label>
                                                                                        <input type="text" class="form-control" name="tenencia_observaciones" id="tenencia_observaciones" placeholder="Descripción">
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
                                                                                    <input class="form-control" type="text" name="pro_id_agro" id="pro_id_agro">

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
                                                                                            <input type="text" class="form-control" name="medida" id="medida" placeholder="Unidad de Medida">
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-md-4">
                                                                                        <div class="form-group">
                                                                                            <label for="">Cantidad</label>
                                                                                            <input type="text" class="form-control" name="cantidad" id="cantidad" placeholder="Cantidad">
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

                                                                                    <div class="col-md-4">
                                                                                        <div class="form-group">
                                                                                            <label for="">Observaciones</label>
                                                                                            <input type="text" class="form-control" name="observaciones_agro" id="observaciones_agro" placeholder="Observaciones">
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
                                                                                <input class="form-control" type="text" name="pro_id_agrologicas" id="pro_id_agrologicas">

                                                                                <div class="col-md-4">
                                                                                    <div class="form-group">
                                                                                        <label for="">Plana %:</label>
                                                                                        <input type="number" class="form-control" name="plana" id="plana" placeholder="Descripción">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-4">
                                                                                    <div class="form-group">
                                                                                        <label for="">Ondulada %:</label>
                                                                                        <input type="number" class="form-control" name="ondulada" id="ondulada" placeholder="Descripción">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-4">
                                                                                    <div class="form-group">
                                                                                        <label for="">Quebara %:</label>
                                                                                        <input type="number" class="form-control" name="quebrada" id="quebrada" placeholder="Descripción">
                                                                                    </div>
                                                                                </div>


                                                                                <div class="col-md-4">
                                                                                    <div class="form-group">

                                                                                        <label>Fertilidad:</label>
                                                                                        <select class="form-control select2" style="width: 100%;" name="cat_id_fertilidad" id="cat_id_fertilidad">

                                                                                            <!-- Resto de opciones -->
                                                                                        </select>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-4">
                                                                                    <div class="form-group">

                                                                                        <label>Textura:</label>
                                                                                        <select class="form-control select2" style="width: 100%;" name="cat_id_textura" id="cat_id_textura">

                                                                                            <!-- Resto de opciones -->
                                                                                        </select>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-4">
                                                                                    <div class="form-group">

                                                                                        <label>Profunidad:</label>
                                                                                        <select class="form-control select2" style="width: 100%;" name="cat_id_profundidad" id="cat_id_profundidad">

                                                                                            <!-- Resto de opciones -->
                                                                                        </select>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-4">
                                                                                    <div class="form-group">

                                                                                        <label>Clase:</label>
                                                                                        <select class="form-control select2" style="width: 100%;" name="cat_id_clase" id="cat_id_clase">

                                                                                            <!-- Resto de opciones -->
                                                                                        </select>
                                                                                    </div>
                                                                                </div>



                                                                                <div class="col-md-4">
                                                                                    <div class="form-group">
                                                                                        <label for="">Pluviosidad:</label>
                                                                                        <input type="number" class="form-control" name="pluviosidad" id="pluviosidad" placeholder="Descripción">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-4">
                                                                                    <div class="form-group">
                                                                                        <label for="">TEMP. MEDIA (ºC):</label>
                                                                                        <input type="number" class="form-control" name="temperatura" id="temperatura" placeholder="Descripción">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-4">
                                                                                    <div class="form-group">
                                                                                        <label for="">ALTITUD (m.s.n.m.):</label>
                                                                                        <input type="number" class="form-control" name="altitud_agro" id="altitud_agro" placeholder="Descripción">
                                                                                    </div>
                                                                                </div>


                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <button class="btn btn-primary" type="submit" id="btnGuardar_caragro">
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

                                                        <!-- Uso Actual del Suelo -->
                                                        <div id="usosuelo-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                                                            <div class="form-group">

                                                                <div class="card">
                                                                    <div class="card-header">
                                                                        <h3 class="card-title">Uso Actual del Suelo <button class="btn btn-success" onclick="mostrarform_suelos(true)"><i class="fa fa-plus-circle"></i> Agregar</button>
                                                                            <button class="btn btn-danger" id="btnRegresar_suelos" type="button"><i class="fa fa-arrow-circle-left"></i> Regresar</button>
                                                                        </h3>
                                                                    </div>
                                                                    <form action="" name="form_usosuelo" id="form_usosuelo" method="POST">
                                                                        <input class="form-control" type="text" name="pro_id_usosuelo" id="pro_id_usosuelo">

                                                                        <section class="content" id="formulariousosuelo">
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
                                                                                            <input type="number" class="form-control" name="superficie_suelo" id="sueprficie_suelo" placeholder="Descripción">
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
                                                                                    <!-- Agregar sobre este comentario si se agrega nuevo contenido -->

                                                                                </div>
                                                                                <!-- Botones de Acción -->
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group">
                                                                                            <button class="btn btn-primary" type="submit" id="btnGuardar_suelo">
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

                                                                                <table id="tblusosuelo" class="table table-bordered table-striped" style="width: 100%; ">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th></th>
                                                                                            <th>Concepto</th>
                                                                                            <th>Superficie</th>
                                                                                            <th>Estado</th>
                                                                                            <th>Edad de Cultivos</th>
                                                                                        </tr>
                                                                                    </thead>

                                                                                </table>
                                                                            </div>
                                                                        </div>

                                                                    </form>



                                                                </div>

                                                            </div>

                                                            <button class="btn btn-secondary" onclick="stepper.previous()">Previous</button>

                                                            <button class="btn btn-primary" onclick="stepper.next()">Next</button>
                                                        </div>

                                                        <!-- Semovientes -->

                                                        <div id="semovientes-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">

                                                            <div class="form-group">

                                                                <div class="card">
                                                                    <div class="card-header">
                                                                        <h3 class="card-title">Semovientes <button class="btn btn-success" onclick="mostrarform_semovientes(true)"><i class="fa fa-plus-circle"></i> Agregar</button>
                                                                            <button class="btn btn-danger" id="btnRegresar_semovientes" type="button"><i class="fa fa-arrow-circle-left"></i> Regresar</button>
                                                                        </h3>
                                                                    </div>
                                                                    <form action="" name="form_semovientes" id="form_semovientes" method="POST">
                                                                        <input class="form-control" type="text" name="pro_id_semovientes" id="pro_id_semovientes">

                                                                        <section class="content" id="formularisemovientes">
                                                                            <div class="card-body">
                                                                                <div class="row">
                                                                                    <!-- Contenido del primer formulario -->

                                                                                    <div class="col-md-4">
                                                                                        <div class="form-group">

                                                                                            <label>Concepto:</label>
                                                                                            <select class="form-control select2" style="width: 100%;" name="cat_concepto_semo" id="cat_concepto_semo">

                                                                                                <!-- Resto de opciones -->
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-4">
                                                                                        <div class="form-group">
                                                                                            <label for="">PREGUNTAR 1</label>
                                                                                            <input type="number" class="form-control" name="semovientes_uno" id="semovientes_uno" placeholder="Descripción">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-4">
                                                                                        <div class="form-group">

                                                                                            <label>PREGUNTAR 2</label>
                                                                                            <select class="form-control select2" style="width: 100%;" name="cat_estado_semo" id="cat_estado_semo">

                                                                                                <!-- Resto de opciones -->
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>


                                                                                    <div class="col-md-4">
                                                                                        <div class="form-group">
                                                                                            <label for="">PREGUNTAR 3</label>
                                                                                            <input type="number" class="form-control" name="semovientes_dos" id="semovientes_dos" placeholder="Descripción">
                                                                                        </div>
                                                                                    </div>





                                                                                    <!-- Agregar sobre este comentario si se agrega nuevo contenido -->

                                                                                </div>
                                                                                <!-- Botones de Acción -->
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group">
                                                                                            <button class="btn btn-primary" type="submit" id="btnGuardar_semo">
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

                                                                                <table id="tblsemovientes" class="table table-bordered table-striped" style="width: 100%; ">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th></th>
                                                                                            <th>Concepto</th>
                                                                                            <th>Superficie</th>
                                                                                            <th>Estado</th>
                                                                                            <th>Edad de Semovientes</th>
                                                                                        </tr>
                                                                                    </thead>

                                                                                </table>
                                                                            </div>
                                                                        </div>

                                                                    </form>



                                                                </div>

                                                            </div>

                                                            <button class="btn btn-secondary" onclick="stepper.previous()">Previous</button>

                                                            <button class="btn btn-primary" onclick="stepper.next()">Next</button>
                                                        </div>

                                                        <!-- Acciones de apoyo -->
                                                        <div id="apoyo-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                                                            <div class="form-group">
                                                                <div class="card">
                                                                    <div class="card-header">
                                                                        <h3 class="card-title">Acciones de Apoyo <button class="btn btn-success" onclick="mostrarform_apoyo(true)"><i class="fa fa-plus-circle"></i> Agregar</button>
                                                                            <button class="btn btn-danger" id="btnRegresar_apoyo" type="button"><i class="fa fa-arrow-circle-left"></i> Regresar</button>
                                                                        </h3>
                                                                    </div>
                                                                    <form action="" name="form_accionesapoyo" id="form_accionesapoyo" method="POST">

                                                                        <section class="content" id="formularioapoyo">
                                                                            <div class="card-body">
                                                                                <div class="row">
                                                                                    <input class="form-control" type="text" name="pro_id_apoyo" id="pro_id_apoyo">

                                                                                    <!-- Contenido del primer formulario -->
                                                                                    <div class="col-md-4">
                                                                                        <div class="form-group">

                                                                                            <label for="">Apellido y Nombres de Asistentes</label>
                                                                                            <input type="text" class="form-control" name="nombres_apoyo" id="nombres_apoyo" placeholder="Apellidos y Nombres">
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-md-4">
                                                                                        <div class="form-group">
                                                                                            <label>En Calidad de:(*)</label>
                                                                                            <select class="form-control select2" style="width: 100%;" name="cat_asistentes" id="cat_asistentes">

                                                                                                <!-- Resto de opciones -->
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>


                                                                                    <div class="col-md-4">
                                                                                        <div class="form-group">

                                                                                            <label for="">Apellidos y Nombres de Test. o Colin.</label>
                                                                                            <input type="text" class="form-control" name="colindates" id="colindates" placeholder="Apellidos y Nombres">
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-md-4">
                                                                                        <div class="form-group">
                                                                                            <label>Conclusiones y Recomendaciones:(*)-PREGUNTAR</label>
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
                                                                                            <button class="btn btn-primary" type="submit" id="btnGuardar_apoyo">
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

                                                                        <div class="table-responsive">

                                                                            <table id="tblaccionesapoyo" class="table table-bordered table-striped" style="width: 100%; ">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th></th>
                                                                                        <th>Asistentes o Colindantes</th>
                                                                                        <th>En calidad de:</th>
                                                                                        <th>Colindantes</th>
                                                                                    </tr>
                                                                                </thead>

                                                                            </table>
                                                                        </div>
                                                                    </div>

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
    <script src="scripts/inspeccion_informes.js"></script>
    <!--   <script src="../public/js/select2.full.min.js"></script>
-->
<?php
}
ob_end_flush();
?>