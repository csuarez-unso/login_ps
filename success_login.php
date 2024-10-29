<!-- success_login.php --> 

<?php
session_start();
require 'db.php';

// Obtener información del usuario
$stmt = $pdo->prepare("SELECT Is_Admin FROM users WHERE ID = :id");
$stmt->execute(['id' => $_SESSION['user_id']]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
$isAdmin = $user['Is_Admin'] == 1; // Verificar si es admin
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión Exitoso</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="cell_phone_style.css"> <!-- Carga estilo de celular -->
</head>
<body>
    <div class="cell-phone">
        <img src="logo.png" alt="Logo" class="img-fluid">
        <h1>Ingresaste correctamente!</h1>
        <p>Bienvenido, <strong><?php echo htmlspecialchars( $_SESSION['username']); ?></strong></p> <!-- Mostrar el identificador -->
        <?php if ($isAdmin): ?>
            <div class="fixed-bottom-button">
                <a href="logs.php" class="btn btn-danger">Logs</a><br><br>
                <a href="users.php" class="btn btn-danger">Administracion Usuarios</a>
            </div>
        <?php endif; ?>
        <a href="logout.php" class="btn btn-secondary logout-button btn-block">Cerrar sesión</a>
    </div>
</body>
</html>
