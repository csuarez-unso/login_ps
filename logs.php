<!-- logs.php --> 

<?php
session_start();
require 'db.php';

// Obtener los últimos 5 registros de usuarios
$stmt = $pdo->prepare("SELECT Username, last_login FROM users WHERE Is_Admin = 0 ORDER BY last_login DESC LIMIT 5");
$stmt->execute();
$recent_users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logs</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="cell_phone_style.css"> <!-- Carga estilo de celular -->
</head>
<body>
    <div class="cell-phone">
        <div class="container">
            <h2 class="text-danger">Logs</h2>
            <h3>Últimos 5 ingresos</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>Ultimo Ingreso</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($recent_users as $user): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($user['Username']); ?></td>
                            <td><?php echo htmlspecialchars($user['last_login']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <a href="success_login.php" class="btn btn-secondary">Volver</a>
        </div>
        <a href="logout.php" class="btn btn-secondary logout-button btn-block">Cerrar sesión</a>
    </div>
</body>
</html>
