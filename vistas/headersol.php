<?php 
if (strlen(session_id())<1) 
  session_start();

  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MAGAP</title>
    
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
     <!-- Bootstrap -->
   <!-- Font Awesome -->
  <link rel="stylesheet" href="../public/css/all.min.css">
  <link rel="stylesheet" href="../public/css/fontawesome.css">

  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../public/css/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../public/css/adminlte.min.css">
 
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../public/css/tempusdominus-bootstrap-4.min.css">
  <!-- JQVMap -->
 <!--  <link rel="stylesheet" href="../public/css/jqvmap.min.css"> -->
<!-- Select2 -->
<link rel="stylesheet" href="../public/css/select2.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../public/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../public/css/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../public/css/summernote-bs4.min.css">

  <!-- DATATABLES -->

  <link rel="stylesheet" href="../public/datatables/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../public/datatables/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../public/datatables/css/buttons.bootstrap4.min.css">

   <!-- BS Stepper -->
   <link rel="stylesheet" href="../public/css/bs-stepper.min.css">
    <!-- MODAL -->
    <link rel="stylesheet" href="../public/css/modal-iframe.css">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
    <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="../files/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div> 
        

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a  class="nav-link">ADJUDICACION</a>
      </li>
  
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown user-menu">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="d-none d-md-inline"><?php echo $_SESSION['sol_nombre']; ?></span>
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header"><?php echo $_SESSION['sol_nombre']; ?></span>
                        <div class="dropdown-divider"></div>
                        <a href="../ajax/solicitante.php?op=salir" class="dropdown-item">
                            <i class="fas fa-sign-out-alt mr-2"></i> Cerrar Sesión
                        </a>
                    </div>
                </li>
      </ul>

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="escritoriosol.php" class="brand-link">
      <img src="../files/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">MENU</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      

    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


               <?php 

                if ($_SESSION['Documentos']==1) {
                  echo '<li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-table"></i>
                    <p>
                      Documentos
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="documentosol.php" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Subir Documentos</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="doc_sol.php" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Ver Documentos</p>
                      </a>
                    </li>
                    <!--<li class="nav-item">
                      <a href="pages/tables/jsgrid.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>jsGrid</p>
                      </a>
                    </li>-->
                  </ul>
                </li>';
                }
                        ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>



    </div>
</body>
</html>