<?php
ob_start();
session_start();

if (!isset($_SESSION['usu_nombre'])) {
  header("Location: login.html");
} else {
  if ($_SESSION['Acceso'] == 1) {
    require 'header.php';
?>
    <div class="content-wrapper">
      <section class="content-header" style="padding: 4px ;"></section>

      <section class="content">
        <div class="container-fluid">
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">Catálogo <button class="btn btn-success" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i>Agregar</button></h3>
              </div>
              <!-- /.card-header -->

                <div class="card-body">
                        <table id="tbllistado" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Categoría</th>
                            <th>Estados</th>
                        </tr>
                        </thead>
                        
                        </table>
                </div>
                
                <!-- Main content -->
    <form id="formularioregistros">

    <section class="content" action="" name="formulario" id="formulario" method="POST">
    <div class="container-fluid">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Registro de Catálogos</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nombre</label>
                            <input type="text" class="form-control" name="cat_nombre" id="cat_nombre" placeholder="Nombre" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Descripción</label>
                            <input type="text" class="form-control" name="cat_descripcion" id="cat_descripcion" placeholder="Descripción" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Categoría</label>
                            <select class="form-control select2" style="width: 100%; height: 40px;"  name="cat_padre" id="cat_padre">  
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- Otro campo de formulario -->
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
  <script src="scripts/catalogo.js"></script>
<!--   <script src="../public/js/select2.full.min.js"></script>
 -->
<?php
}
ob_end_flush();
?>
