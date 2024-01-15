<!DOCTYPE html>
<html lang="es-mx">

<head>
    <meta charset="UTF-8">
    <title>MAG | Registro Usuario</title>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css'>
    <link rel="stylesheet" href="../public/css/style.css">

</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-11 col-sm-10 col-md-10 col-lg-6 col-xl-5 text-center p-0 mt-3 mb-2">
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                    <h2 id="heading">Bienvenido. Debes Crear una Cuenta</h2>
                    <p>Por Favor llena todos los datos antes de avanzar.</p>
                    <form id="msform">
                        <!-- progressbar -->
                        <ul id="progressbar">
                            <li class="active" id="account"><strong>Identificación</strong></li>
                            <li id="personal"><strong>Datos</strong></li>
                            <li id="payment"><strong>Dirección</strong></li>
                            <li id="confirm"><strong>Cuenta</strong></li>
                        </ul>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <br> <!-- fieldsets -->
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Datos de Identificación:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Paso 1 - 4</h2>
                                    </div>
                                </div>
                                <div class="fieldlabels">
                                    <label>Identificación(*)</label>
                                    <select class="form-control select2" style="width: 100%;" name="cat_id_identificacion" id="cat_id_identificacion">
                                        <!-- Opciones del select pueden ser llenadas dinámicamente mediante JavaScript o PHP -->
                                    </select>
                                </div>

                                <div class="fieldlabels">
                                    <label>Nro Identificación(*)</label>
                                    <input type="text" class="form-control" name="sol_identificacion" id="sol_identificacion" placeholder="Nro Identificación">
                                </div>

                                <div class="fieldlabels">
                                    <label>Correo Electrónico(*)</label>
                                    <input type="email" class="form-control" name="sol_correo" id="sol_correo" placeholder="Correo Electrónico">
                                </div>
                            </div>
                            <input type="button" name="next" class="next action-button" value="Siguiente" />

                        </fieldset>
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Datos Personales:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Paso 2 - 4</h2>
                                    </div>
                                </div>
                                <div class="fieldlabels">
                                    <label>Nombres y Apellidos(*)</label>
                                    <input type="text" class="form-control" name="sol_nombre" id="sol_nombre" placeholder="Nombres y Apellidos">
                                </div>

                                <div class="fieldlabels">
                                    <label>Teléfono(*)</label>
                                    <input type="text" class="form-control" name="sol_telefono" id="sol_telefono" placeholder="Teléfono">
                                </div>
                                <div class="fieldlabels">
                                    <label>Contraseña de Usuario(*)</label>
                                    <input class="form-control" type="hidden" name="claveu" id="claveu">
                                    <input type="password" class="form-control" name="sol_clave" id="sol_clave" placeholder="Contraseña">
                                </div>

                            </div>
                            <input type="button" name="next" class="next action-button" value="Siguiente" />
                            <input type="button" name="previous" class="previous action-button-previous" value="Regresar" />
                        </fieldset>
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Dirección/Localidad:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Paso 3 - 4</h2>
                                    </div>
                                </div>
                                <div class="fieldlabels">
                                    <label>Dirección(*)</label>
                                    <input type="text" class="form-control" name="sol_direccion" id="sol_direccion" placeholder="Direccion">
                                </div>

                                <div class="fieldlabels">
                                    <label>Provincia(*)</label>
                                    <select class="form-control select2" style="width: 100%;" name="cat_id_provincia" id="cat_id_provincia">
                                    </select>
                                </div>

                                <div class="fieldlabels">
                                    <label>Cantón(*)</label>
                                    <select class="form-control select2" style="width: 100%;" name="cat_id_canton" id="cat_id_canton">
                                    </select>
                                </div>

                                <div class="fieldlabels">
                                    <label>Parroquia(*)</label>
                                    <select class="form-control select2" style="width: 100%;" name="cat_id_parroquia" id="cat_id_parroquia">
                                    </select>
                                </div>

                                <div class="fieldlabels">
                                    <label>Sector(*)</label>
                                    <select class="form-control select2" style="width: 100%;" name="cat_id_sector" id="cat_id_sector">
                                    </select>
                                </div>
                            </div>
                            <input type="button" name="next" id="btnGuardar" class="next action-button" value="Submit" />
                            <input type="button" name="previous" class="previous action-button-previous" value="Regresar" />
                        </fieldset>
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Finalizado:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Paso 4 - 4</h2>
                                    </div>
                                </div>
                                <br><br>
                                <h2 class="purple-text text-center"><strong>ÉXITO !</strong></h2> <br>
                                <div class="row justify-content-center">
                                    <div class="col-3"><img src="../files/img/img.png" class="fit-image"></div>
                                </div>
                                <br><br>
                                <div class="row justify-content-center">
                                    <div class="col-7 text-center">
                                        <h5 class="purple-text text-center">Cuenta Creada. Inicia Sesión !</h5>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- partial -->

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src="../vistas/scripts/register.js"></script>

</body>

</html>