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
                                </tr>
                                </thead>
                            </table>

                        </div>

                        <form action="" name="editar" id="editar" method="POST" enctype="multipart/form-data">
                            <section class="content" id="editar_documento">
                                <div class="container-fluid">
                                    <div class="card card-default">
                                        <div class="card-header">
                                            <h3 class="card-title">Subida de Documentos</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="exampleInputFile">Documento:</label>
                                                        <input type="text" name="nombre_tipodoc" id="nombre_tipodoc">
                                                        <input type="text" name="doc_id" id="doc_id"/>
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="editInputFile" accept="application/pdf">
                                                            <label class="custom-file-label" for="exampleInputFile"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <button class="btn btn-primary" type="submit" id="btnEditar"><i class="fa fa-save"></i> Guardar</button>
                                                        <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </form>



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
