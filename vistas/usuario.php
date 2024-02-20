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
                        <table id="tbllistado" class="table table-bordered table-striped" style="width: 100%">
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
    <form action="" name="formulario" id="formulario" method="POST">

    <section class="content" id="formularioregistros">
    <div class="container-fluid">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Registro de Usuarios</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <input type= "hidden" class="form-control" type="text" name="usu_id" id="usu_id">
    
                        <label>Nombres y Apellidos(*)</label>
                            <input type="text" class="form-control" name="usu_nombre" id="usu_nombre" placeholder="Nombres y apellidos" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Cédula(*)</label>
                            <input type="text" class="form-control"name="usu_cedula" id="usu_cedula" placeholder="Cédula" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Telefono(*)</label>
                            <input type="text" class="form-control" name="usu_telefono" id="usu_telefono" placeholder="Télefono" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Correo Electrónico(*)</label>
                            <input type="email" class="form-control" name="usu_correo" id="usu_correo" placeholder="Correo Electrónico" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Cargo(*)</label>
                            <input type="text" class="form-control" name="usu_cargo" id="usu_cargo" placeholder="Cargo" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Login(*)</label>
                            <input type="text" class="form-control" name="usu_login" id="usu_login" placeholder="Login" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Clave(*)</label>
                            <input class="form-control" type="hidden" name="claveu" id="claveu">
                            <input type="password" class="form-control" name="usu_clave" id="usu_clave" placeholder="Clave" required>
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
                                <div class="col-sm-12">
                                  <!-- checkbox -->
                                  <div class="form-group clearfix">
                                    <div class="icheck-primary d-inline">
                                   <ul id="permiso" style="list-style: none;">
 
<!--                                       <input type="checkbox" checked id="permiso">
 -->                                    <label>

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
  <script src="scripts/usuario.js"></script>
<!--   <script src="../public/js/select2.full.min.js"></script>
 -->
<?php
}
ob_end_flush();
?>
