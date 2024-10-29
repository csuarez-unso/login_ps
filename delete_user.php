<!-- delete_user.php -->

<?php
session_start();
require 'db.php'; // Conexión a la base de datos

// Verificar si se ha enviado una solicitud de eliminación
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];

    // Eliminar el usuario seleccionado de la base de datos
    $stmt = $pdo->prepare("DELETE FROM users WHERE ID = :id");
    $stmt->execute(['id' => $user_id]);

    // Mensaje de confirmación o redireccionamiento
    $_SESSION['message'] = "Usuario eliminado exitosamente.";
    header("Location: delete_user.php");
    exit();
}

// Obtener todos los usuarios de la base de datos
$stmt = $pdo->query("SELECT ID, Username, Email FROM users ORDER BY Username");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Usuario</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="cell_phone_style.css"> <!-- Incluye tu archivo CSS aquí -->
</head>
<body>
    <div class="cell-phone">
        <div class="container">
            <h2 class="text-danger">Eliminar Usuario</h2>
            
            <!-- Mostrar mensaje si existe -->
            <?php if (isset($_SESSION['message'])): ?>
                <div class="alert alert-success">
                    <?php 
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                    ?>
                </div>
            <?php endif; ?>

            <form action="delete_user.php" method="post" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este usuario?');">
                <div class="form-group">
                    <label for="user_id">Seleccione un usuario para eliminar:</label>
                    <select name="user_id" id="user_id" class="form-control" required>
                        <option value="" disabled selected>Seleccione un usuario</option>
                        <?php foreach ($users as $user): ?>
                            <option value="<?php echo $user['ID']; ?>">
                                <?php echo htmlspecialchars($user['Username']) . " (" . htmlspecialchars($user['Email']) . ")"; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                    <a href="users.php" class="btn btn-secondary">Volver</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
