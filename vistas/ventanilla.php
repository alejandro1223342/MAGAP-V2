<?php
ob_start();
session_start();

if (!isset($_SESSION['usu_nombre'])) {
  header("Location: login.html");
} else {
  if ($_SESSION['Ventanilla'] == 1) {
    require 'header.php';
?>
    <div class="content-wrapper">
      <section class="content-header" style="padding: 4px ;"></section>

      <section class="content">
        <div class="container-fluid">
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lista de Solicitantes</h3>
              </div>
              <!-- /.card-header -->

                <div class="card-body">
                        <table id="tbllistado" class="table table-bordered table-striped">
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
                
                <!-- Main content -->
     <form action="" name="formulario" id="formulario" method="POST">

    <section class="content" id="formularioregistros">
    <div class="container-fluid">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Solicitante:</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <!--<label for="">Nombres y Apellidos:</label>
                            <input type="text" class="form-control" name="sol_nombre" id="sol_nombre" placeholder="Nombre">-->
                            <input type="hidden" name="sol_iden" id="sol_iden">
                        </div>
                    </div>

                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <!--<label for="">Descripción</label>
                            <input type="text" class="form-control" name="cat_descripcion" id="cat_descripcion" placeholder="Descripción"> -->
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <!--<label>Categoría</label>
                            <select class="form-control select2" style="width: 100%; height: 40px;"  name="cat_id_estado" id="cat_id_estado">  
                            </select>-->
                        </div>
                    </div>
                    <div class="col-md-12">
                        <!-- Otro campo de formulario -->
                        <table id="tabla_pdf" class="table table-striped  dt-responsive nowrap"
                               style="width:100%">
                            <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th>ID</th>
                                <th>Documento</th>
                                <th>Fecha</th>
                                <th>Observación</th>
                                <th></th>
                                <th>Acción</th>
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
                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>
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
  <script src="scripts/ventanilla.js"></script>
<!--   <script src="../public/js/select2.full.min.js"></script>
 -->
<?php
}
ob_end_flush();
?>
