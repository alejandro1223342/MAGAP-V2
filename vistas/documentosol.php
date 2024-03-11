<?php
ob_start();
require_once "../config/session.php";

if (!isset($_SESSION['sol_nombre'])) {
    header("Location: loginsol.html");
} else {
    if ($_SESSION['Documentos'] == 1) {
        require 'headersol.php';
        ?>

        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content" style="padding: 4px ;">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Inicio del card -->
                        <div class="card" style="margin: 10px;"> <!-- Ajusta el margen según tu preferencia -->
                            <div class="card-header with-border">
                                <h3 class="card-title">Trámites Finalizados</h3>
                                <div class="card-tools pull-right">
                                    <!-- Puedes agregar herramientas adicionales aquí -->
                                </div>
                            </div><!-- /.card-header -->

                            <!-- Centro -->
                            <div class="card-body">
                                <div id ="tablafin" class="table-responsive">
                                    <table id="tbproceso" class="table table-striped" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th>Solicitante</th>
                                            <th>Trámite</th>
                                            <th>Fecha</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <!-- Contenido de la tabla -->
                                        </tbody>
                                    </table>
                                </div>

                                <div class="panel-body" id="formulariofin" name="formulariofin">
                                        <div class="form-group col-lg-12 col-md-12 col-xs-12">
                                            <div id="my-modal" class="modal">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h2 id ="modal-title"></h2>
                                                        <span class="close">&times;</span>
                                                    </div>
                                                    <div class="modal-body">
                                                        <iframe id="modal-iframe" width="100%" height="600"
                                                                allow="autoplay"></iframe>
                                                    </div>
                                                </div>
                                            </div>

                                            <table id="tabla_docs" name="tabla_docs" class="table table-striped" style="width:100%">
                                                <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Documento</th>
                                                    <th>Fecha de Registro</th>
                                                    <th></th>
                                                    <th>Estado</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <!-- Aquí se cargarán los datos desde la base de datos -->
                                                </tbody>
                                            </table>
                                        </div>
                                    <button class="btn btn-danger" onclick="cancelar()" type="button"><i
                                                class="fa fa-arrow-circle-left"></i> Cancelar
                                    </button>
                                </div><!-- /.panel-body -->
                            </div><!-- /.card-body -->
                        </div><!-- /.card -->
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->

        <?php
        require 'footer.php';
        ?>
        <script src="scripts/documentosol.js"></script>
        <!-- <script src="../public/js/select2.full.min.js"></script> -->
        <?php
    } else {
        require 'noacceso.php';
    }
    ob_end_flush();
}
?>
