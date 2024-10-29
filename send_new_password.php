<!-- send_new_password.php --> 

<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envio de Clave</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="cell_phone_style.css"> <!-- Carga estilo de celular -->
</head>
<body>
    <div class="cell-phone">
        <h1>Clave enviada</h1>
        <p>Si la direccion de correo existe, le llegara una nueva clave.</p>
        <a href="index.php" class="btn btn-secondary">Volver</a>
    </div>
</body>
</html>
