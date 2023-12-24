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
                <h3 class="card-title">Usuarios <button class="btn btn-success" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i>Agregar</button></h3>
              </div>
              <!-- /.card-header -->

                <div class="card-body">
                        <table id="listadoregistros" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Nombre</th>
                            <th>Usuario</th>
                            <th>Cédula</th>
                            <th>Telefono</th>
                            <th>Email</th>
                            <th>Cargo</th>
                            <th>Estado</th>


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
                <h3 class="card-title">Registro de Usuarios</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nombres y Apellidos(*)</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nro Identificación" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Cédula(*)</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Otro campo" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Telefono(*)</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nro Identificación" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Correo(*)</label>
                            <input type="email" class="form-control" id="exampleInputPassword1" placeholder="Otro campo" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Cargo(*)</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nro Identificación" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Login(*)</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Otro campo" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Clave(*)</label>
                            <input type="password" class="form-control" id="exampleInputEmail1" placeholder="Nro Identificación" required>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-3">
                    <div class="card card-success">
                        <div class="card-header">
                          <h3 class="card-title">Permisos</h3>
                        </div>
                            <div class="card-body">
                              <!-- Minimal style -->
                              <div class="row">
                                <div class="col-sm-6">
                                  <!-- checkbox -->
                                  <div class="form-group clearfix">
                                    <div class="icheck-primary d-inline">
                                      <input type="checkbox" id="permiso" checked>
                                      <label for="checkboxPrimary1">

                                      </label>
                                    </div>
                                    
                                  </div>
                                </div>
                      
                              </div>
                            
                            </div>
                  </div>
                </div>
                  <!-- iCheck -->
            
              <!-- /.card-body -->
              
            </div>
            <!-- /.card -->
              

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
