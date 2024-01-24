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
                            <h3 class="card-title">Suba sus Documentos según los requisitos solicitados
                            </h3>
                        </div>
                        <!-- /.card-header -->

                        <!-- Main content -->
                        <form action="" name="formulario" id="formulario" method="POST" enctype="multipart/form-data">
                            <section class="content" id="formularioregistros">
                                <div class="container-fluid">
                                    <div class="card card-default">
                                        <div class="card-header">
                                            <h3 class="card-title">Solo se admite formato PDF</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Tipo de Documento(*)</label>
                                                        <select class="form-control select2"
                                                                style="width: 100%; height: 40px;" name="cat_id_tipodoc"
                                                                id="cat_id_tipodoc">
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div id="information-part" class="content" role="tabpanel"
                                                         aria-labelledby="information-part-trigger">
                                                        <div class="form-group">
                                                            <label for="exampleInputFile">Documento:</label>
                                                            <div class="input-group">
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input"
                                                                           id="exampleInputFile"
                                                                           accept="application/pdf">
                                                                    <label class="custom-file-label"
                                                                           for="exampleInputFile"></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <button class="btn btn-primary" type="submit" id="btnGuardar"><i
                                                                    class="fa fa-save"></i> Guardar
                                                        </button>
                                                        <button class="btn btn-danger" onclick="cancelarform()"
                                                                type="button"><i class="fa fa-arrow-circle-left"></i>
                                                            Cancelar
                                                        </button>
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
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

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
