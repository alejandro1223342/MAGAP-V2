<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MAGAP | Página de Registro</title>
   <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../public/css/all.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../public/css/daterangepicker.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../public/css/icheck-bootstrap.min.css">
   <!-- Bootstrap Color Picker -->
   <link rel="stylesheet" href="../public/css/bootstrap-colorpicker.min.css">

     <!-- BS Stepper -->
  <link rel="stylesheet" href="../public/css/bs-stepper.min.css">
 
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../public/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../public/css/select2.min.css">
   <!-- Theme style -->
   <link rel="stylesheet" href="../public/css/adminlte.min.css">

</head>
<body class="hold-transition register-page">
  <br></br>
      <!-- /.row -->
      <div class="row">
          <div class="col-md-12">
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Registro de Usuarios</h3>
              </div>
              <form action="" name="formulario" id="formulario" method="POST">

              <div class="card-body p-0">
                <div class="bs-stepper">
                  <div class="bs-stepper-header" role="tablist">
                    <!-- your steps here -->
                    <div class="step" data-target="#parte_uno">
                      <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                      <span class="bs-stepper-label">Paso</span> 
                      <span class="bs-stepper-circle">1</span>
                      </button>

                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#parte_dos">
                      <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                      <span class="bs-stepper-label">Paso</span>  
                      <span class="bs-stepper-circle">2</span>
                      </button>
                    </div>
                    <div class="line"></div>

                    <div class="step" data-target="#parte_tres">
                      <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                      <span class="bs-stepper-label">Paso</span>  
                      <span class="bs-stepper-circle">3</span>
                      </button>
                    </div>
                    <div class="line"></div>

                    <div class="step" data-target="#parte_cuatro">
                      <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                      <span class="bs-stepper-label">Paso</span>  
                      <span class="bs-stepper-circle">4</span>
                      </button>
                    </div>
                  </div>

 
                  <div class="bs-stepper-content">
                    <!-- your steps content here -->
                    <div id="parte_uno" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                      <div class="form-group">
                          <label>Identificación(*)</label>
                          <select class="form-control select2" style="width: 100%;" name="cat_id_identificacion" id="cat_id_identificacion" >
                            
                          </select>
                      </div>
                      <div class="form-group">
                        <label>Nro Identificación(*)</label>
                        <input type="text" class="form-control" name="sol_identificacion" id="sol_identificacion" placeholder="Nro Identificación" >
                      </div>
                  
                      <div class="form-group">
                        <label>Correo Electrónico(*)</label>
                        <input type="email" class="form-control" name="sol_correo" id="sol_correo" placeholder="Correo Electrónico">
                      </div>
                      
                      <button class="btn btn-primary btn-next">
                            Siguiente <i class="fas fa-arrow-right"></i>
                      </button>


                      <button class="btn btn-danger" onclick="cancelarform()">
                        <i class="fas fa-times"></i> Cancelar 
                      </button>
                    </div>
                    <!-- Paso 2 -->
                    <div id="parte_dos" class="content" role="tabpanel" aria-labelledby="information-part-trigger">

                      <div class="form-group">
                        <label>Nombres y Apellidos(*)</label>
                        <input type="text" class="form-control" name="sol_nombre" id="sol_nombre" placeholder="Nombres y Apellidos">
                      </div>

                      <div class="form-group">
                        <label>Teléfono(*)</label>
                        <input type="text" class="form-control" name="sol_telefono" id="sol_telefono" placeholder="Teléfono">
                      </div>

                      <button class="btn btn-primary btn-prev">
                        <i class="fas fa-arrow-left"></i> Anterior 
                      </button>
                      <button class="btn btn-primary btn-next">
                            Siguiente <i class="fas fa-arrow-right"></i>
                      </button>
                    </div>

                    <!-- Paso 3 -->
                    <div id="parte_tres" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                    
                    <div class="form-group ">
                        <label>Dirección(*)</label>
                        <input type="text" class="form-control" name="sol_direccion" id="sol_direccion" placeholder="Teléfono" >
                      </div>

                      <div class="form-group">
                      <label>Provincia(*)</label>
                      <select class="form-control select2" style="width: 100%;" name="cat_id_provincia" id="cat_id_provincia" >
    
                        <!-- Resto de opciones -->
                      </select>
                    </div>


                      <div class="form-group">
                          <label>Cantón(*)</label>
                          <select class="form-control select2" style="width: 100%;" name="cat_id_canton" id="cat_id_canton" >
                           
                          </select>
                      </div>

                      <div class="form-group">
                          <label>Parroquia(*)</label>
                          <select class="form-control select2" style="width: 100%;" name="cat_id_parroquia" id="cat_id_parroquia" >
                            
                          </select>
                      </div>

                      <div class="form-group">
                          <label>Sector(*)</label>
                          <select class="form-control select2" style="width: 100%;" name="cat_id_sector" id="cat_id_sector" >
                           
                          </select>
                      </div>

                      <button class="btn btn-primary btn-prev">
                        <i class="fas fa-arrow-left"></i> Anterior 
                      </button>
                      <button class="btn btn-primary btn-next">
                            Siguiente <i class="fas fa-arrow-right"></i>
                      </button>
                    </div>
                    <!-- Paso 4 -->
                    <div id="parte_cuatro" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                      <div class="form-group">
                      <div class="form-group">
                        <label>Contraseña de Usuario(*)</label>
                        <input class="form-control" type="hidden" name="claveu" id="claveu">
                        <input type="password" class="form-control" name="sol_clave" id="sol_clave" placeholder="Contraseña">
                      </div>
                      </div>
                      <button class="btn btn-primary btn-prev">
                        <i class="fas fa-arrow-left"></i> Anterior 
                      </button>
                      <button type="submit" class="btn btn-success" id="btnGuardar">
                      <i class="fas fa-save"></i> Guardar 
                      </button>
                    </div>
                  </div>
                  </form>

                </div>
              </div>
              <!-- /.card-body -->
             
            </div>
            <!-- /.card -->
          </div>

<!-- jQuery -->
<script src="../public/js/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../public/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="../public/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../public/js/moment.min.js"></script>
<script src="../public/js/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="../public/js/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../public/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../public/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="../public/js/bootstrap-switch.min.js"></script>
<!-- AdminLTE App -->
<script src="../public/js/adminlte.min.js"></script>
<!-- BS-Stepper -->
<script src="../public/js/bs-stepper.min.js"></script>

<!-- Bootbox -->
<script src="../public/js/bootbox.all.min.js"></script>
<script src="../public/js/bootbox.min.js"></script>

<!-- Combobox -->
<script src="scripts/registro.js"></script>



</body>
</html>
