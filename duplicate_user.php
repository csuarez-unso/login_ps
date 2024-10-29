<!-- duplicate_user.php --> 

<?php
session_start();

// Verifica si hay un mensaje de error en la sesión
$message = isset($_SESSION['message']) ? $_SESSION['message'] : "Error desconocido.";
unset($_SESSION['message']); // Elimina el mensaje de la sesión

// Verifica si hay una sesión iniciada
$isLoggedIn = isset($_SESSION['user_id']); // Cambia 'user_id' por la variable que uses para identificar la sesión
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario Duplicado</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="cell_phone_style.css"> <!-- Carga estilo de celular -->
</head>
<body>
    <div class="cell-phone">
        <h1>¡Error!</h1>
        <div class="alert alert-danger">
            <?php echo $message; ?>
        </div>
        <a href="<?php echo $isLoggedIn ? 'register_user_admin.php' : 'register_user.php'; ?>" class="btn btn-primary">Volver a Registrar</a>
    </div>
</body>
</html>
