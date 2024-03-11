<?php
ob_start();
require_once "../config/session.php";
if (!isset($_SESSION['usu_nombre'])) {
    header("Location: login.html");
} else {

    if ($_SESSION['Reportes'] == 1) {
        require 'header.php';
        ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header" style="padding: 6px ;">
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-dark">
                                <div class="card-header">
                                    <h3 class="card-title">Seguimiento de Trámites</h3>
                                    <div class="card-tools">
                                        <!-- Buttons, labels, and many other things can be placed here! -->
                                        <!-- Here is a label for example -->
                                        <span class="badge badge-primary">Información</span>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="tbReportes" class="table table-striped" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th>Cargar</th>
                                            <th></th>
                                            <th>Tipo de Documento</th>
                                            <th>Fecha de Registro</th>
                                            <th></th>
                                            <th>Estado</th>
                                            <th>Observación</th>
                                            <th>Gestor</th>
                                            <th>Acción</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer bg-dark">
                                    Trámites Finalizados
                                </div>
                                <!-- /.card-footer -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <script src="../vistas/scripts/reportes.js"></script>

        <?php
    } else {
        require 'noacceso.php';
    }

    require 'footer.php';
}

ob_end_flush();
?>