<?php
ob_start();
session_start();

if (!isset($_SESSION['sol_nombre'])) {
    header("Location: loginsol.html");
} else {
    if ($_SESSION['Documentos'] == 1) {
        require 'headersol.php';
        ?>
        <div class="content-wrapper">
            <section class="content-header" style="padding: 4px ;"></section>

            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Documentos Habilitantes
                            </h3>
                        </div>
                        <!-- /.card-header -->

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

                        <div id="loading-indicator" style="display: none;">
                            Subiendo archivo...
                        </div>


                        <div class="card-body">
                            <table id="tbllistado" class="table table-striped" style="width:100%">
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
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
        </div>
        <!-- /.row -->
        </div>
        </section>

        </div>

        <?php
    } else {
        require 'noacceso.php';
    }
    require 'footer.php';
    ?>
    <script src="scripts/documentosol.js"></script>
    <!--   <script src="../public/js/select2.full.min.js"></script>
     -->
    <?php
}
ob_end_flush();
?>
