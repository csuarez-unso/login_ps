<!-- validate_login.php --> 

<?php
session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $identifier = $_POST['identifier'];
    $password = $_POST['password'];

    // Consulta para encontrar al usuario por nombre de usuario o correo electrónico
    $stmt = $pdo->prepare("SELECT * FROM users WHERE Email = :identifier OR Username = :identifier");
    $stmt->execute(['identifier' => $identifier]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['Password'])) {
        // Iniciar sesión para el usuario
        $_SESSION['user_id'] = $user['ID'];
        $_SESSION['username'] = $user['Username'];
        
        // Actualizar la fecha de último inicio de sesión
        $updateStmt = $pdo->prepare("UPDATE users SET last_login = NOW() WHERE ID = :id");
        $updateStmt->execute(['id' => $user['ID']]);

        // Redirigir a la página de éxito del inicio de sesión
        header("Location: success_login.php");
        exit();
    } else {
        // Redirigir a la página de error de inicio de sesión
        header("Location: failed_login.php");
        exit();
    }
}
?>
