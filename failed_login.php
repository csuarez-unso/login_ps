<!-- failed_login.php --> 

<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión Fallido</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="cell_phone_style.css"> <!-- Carga estilo de celular -->
</head>
<body>
    <div class="cell-phone">
        <h1>Intento de ingreso fallido!</h1>
        <p>Verifique su usuario y/o contraseña.</p>
        <a href="login.php" class="btn btn-secondary">Volver</a>
    </div>
</body>
</html>
