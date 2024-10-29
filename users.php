<!-- users.php --> 

<?php
session_start();
require 'db.php';

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracion Usuarios</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="cell_phone_style.css"> <!-- Carga estilo de celular -->
</head>
<body>
    <div class="cell-phone">
        <div class="container">
            <h2 class="text-danger">Administración de Usuarios</h2>
            <h3>Seleccione una opción:</h3>
            <!-- Botones de administración de usuarios -->
            <a href="register_user.php" class="btn btn-primary btn-block mb-4">Alta Usuarios</a>
            <a href="modify_user.php" class="btn btn-warning btn-block mb-4">Modificación Usuarios</a>
            <a href="delete_user.php" class="btn btn-danger btn-block mb-4">Baja Usuarios</a>
            <!-- Botón de volver -->
            <a href="success_login.php" class="btn btn-secondary btn-block mb-2">Volver</a>
        </div>
        <!-- Botón de cerrar sesión -->
        <a href="logout.php" class="btn btn-secondary logout-button btn-block">Cerrar sesión</a>
    </div>
</body>
</html>
