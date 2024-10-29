<!-- success_register.php --> 

<?php
session_start();

// Verifica si hay una sesión iniciada
$isLoggedIn = isset($_SESSION['user_id']); // Cambia 'user_id' por la variable que uses para identificar la sesión
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Exitoso</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="cell_phone_style.css"> <!-- Carga estilo de celular -->
</head>
<body>
    <div class="cell-phone">
        <h1>Registro Exitoso!</h1>
        <p>Te registraste correctamente.</p>
        <a href="<?php echo $isLoggedIn ? 'users.php' : 'index.php'; ?>" class="btn btn-primary">Volver</a>
    </div>
</body>
</html>
