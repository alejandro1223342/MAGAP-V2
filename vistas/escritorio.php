<?php
//activamos almacenamiento en el buffer
ob_start();
require_once "../config/session.php";
if (!isset($_SESSION['usu_nombre'])) {
  header("Location: login.html");
}else{

  if ($_SESSION['Escritorio']==1) {


// Incluye el encabezado
require 'header.php';
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="padding: 6px ;">
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              
              <!-- /.card-header -->
              <div class="card-body">
               
            
                  <div class="col-sm-12">
                    <div class="position-relative" style="min-height: 180px; max-width: 100%">
                      <img src="../files/img/FRONTAL.png" alt="Photo 3" class="img-fluid">
                      
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  
      <script src="../vistas/scripts/escritoriosol.js"></script>
  <!-- /.content-wrapper -->
<?php

}else{
  require 'noacceso.php';
 }
 
 require 'footer.php';
  ?>
 
  <?php 
 }
 
 ob_end_flush();
   ?>
 
