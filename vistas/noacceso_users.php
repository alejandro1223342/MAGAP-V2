<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sesión Finalizada</title>

    <link rel="stylesheet" href="../public/css/adminlte.min.css">
    <script src="../public/js/adminlte.js" defer></script>
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>MAG</b>-Imbabura</a>
    </div>
    <!-- /.login-logo -->

    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Debe Iniciar Sesión para Continuar</p>

            <!-- Agregar un botón para volver -->
            <button type="button" class="btn btn-primary btn-block" onclick="volver()">Aceptar</button>
        </div>
        <!-- /.login-card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->

<script>
    // Función para redirigir al usuario
    function volver() {
        // Redirigir al archivo login.html
        window.location.href = 'index.php';
    }
</script>
