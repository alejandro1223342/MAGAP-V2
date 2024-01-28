<?php
// Activamos almacenamiento en el buffer
ob_start();
session_start();
if (!isset($_SESSION['sol_nombre'])) {
    header("Location: loginsol.html");
} else {
if ($_SESSION['Escritorio'] == 1) {
// Incluye el encabezado
require 'headersol.php';
?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Contenido principal -->
    <div class="content-wrapper">
        <!-- Encabezado de la página -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="text-center">Guía de Requisitos</h1>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contenido principal -->
        <section class="content">
            <div class="container-fluid">
                <!-- Guía de Requisitos -->
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title text-center">Requisitos</h3>
                            </div>
                            <div class="card-body text-left"> <!-- Alinea el texto a la izquierda dentro del card -->
                                <ul>
                                    <li>Requisito 1</li>
                                    <li>Requisito 2</li>
                                    <li>Requisito 3</li>
                                    <li>Requisito 4</li>
                                    <li>Requisito 5</li>
                                    <li>Requisito 6</li>
                                    <li>Requisito 7</li>
                                    <li>Requisito 8</li>
                                    <!-- Agrega más requisitos según sea necesario -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-6 d-flex justify-content-center">
                        <button type="button" id="btnProceso" name="btnProceso" class="btn btn-success btn-lg">Iniciar Proceso</button>
                    </div>
                </div>

        </section>
    </div>
</div>
<?php
} else {
    require 'noacceso.php';
}

require 'footer.php';
?>
<script src="scripts/escritoriosol.js"></script>
<?php
}

ob_end_flush();
?>
