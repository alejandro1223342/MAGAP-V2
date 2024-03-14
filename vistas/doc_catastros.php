<?php
ob_start();
session_start();

if (!isset($_SESSION['usu_nombre'])) {
    header("Location: login.html");
} else {
    if ($_SESSION['Catastros'] == 1) {
        require 'header.php';
        ?>
        <div class="content-wrapper">
            <section class="content-header" style="padding: 4px ;"></section>

            <section class="content">
                <div class="container-fluid">
                    <div class="card card-navy mb-0">
                        <div class="card-header">
                            <h3 class="card-title">Lista de Solicitantes</h3>
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body p-1">
                            <table id="tbllistado" class="table table-bordered table-striped" style="width:100%">
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
                        <!-- /.card-body -->

                        <!-- Main content -->
                        <form action="" name="formulario" id="formulario" method="POST">
                            <section class="content" id="formularioregistros">
                                <div class="container-fluid">
                                    <div class="card card-gray-dark">
                                        <div class="card-header">
                                            <h3 class="card-title">Documentos</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="hidden" name="sol_iden" id="sol_iden">
                                                    </div>
                                                </div>
                                            </div>

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

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="hidden" name="proA" id="proA">
                                                    <input type="hidden" name="traA" id="traA">
                                                    <table id="tabla_pdf"
                                                           class="table table-head-fixed table-bordered table-striped"
                                                           style="width:100%">
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
                                                        <tbody>
                                                        <!-- Aquí se cargarán los datos desde la base de datos -->
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <button class="btn btn-primary" type="submit" id="btnGuardar" onclick="aprobar(event)">
                                                            <i class="fa fa-save"></i> Guardar
                                                        </button>

                                                        <button class="btn btn-danger" onclick="cancelarform()"
                                                                type="button">
                                                            <i class="fa fa-arrow-circle-left"></i> Cancelar
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php
    } else {
        header("Location: login.html");
    }
    require 'footer.php';
    ?>
    <script src="scripts/doc_catastros.js"></script>
    <!--   <script src="../public/js/select2.full.min.js"></script>
     -->
    <?php
}
ob_end_flush();
?>
