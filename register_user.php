<!-- register_user.php --> 

<?php
session_start();
require 'db.php'; // Establece la conexión con la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];

    // Determina si el usuario es administrador
    $is_admin = isset($_POST['is_admin']) ? 1 : 0; // 1 si está tildado, 0 si no

    // Validaciones de la contraseña
    if (strlen($password) < 8 || 
        !preg_match('/[a-z]/', $password) || 
        !preg_match('/[A-Z]/', $password) || 
        !preg_match('/[0-9]/', $password) || 
        !preg_match('/[\W_]/', $password)) {
        $_SESSION['message'] = "La contraseña debe tener al menos 8 caracteres, una mayúscula, un número y un símbolo.";
        header("Location: duplicate_user.php");
        exit();
    }

    // Verifica si el correo electrónico o el nombre de usuario ya existen
    $stmt = $pdo->prepare("SELECT * FROM users WHERE Email = :email OR Username = :username");
    $stmt->execute(['email' => $email, 'username' => $username]);
    $existing_user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($existing_user) {
        $_SESSION['message'] = "El usuario o el correo electrónico ya están en uso.";
        header("Location: duplicate_user.php");
        exit();
    }

    // Registra nuevo usuario
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    $stmt = $pdo->prepare("INSERT INTO users (Username, Password, First_Name, Last_Name, Email, Is_Admin) VALUES (:username, :password, :first_name, :last_name, :email, :is_admin)");
    $stmt->execute([
        'username' => $username,
        'password' => $hashed_password,
        'first_name' => $first_name,
        'last_name' => $last_name,
        'email' => $email,
        'is_admin' => $is_admin // Se incluye el valor del checkbox
    ]);

    // Redirige a la página de éxito de registro
    header("Location: success_register.php");
    exit();
}
// Verifica si hay una sesión iniciada
$isLoggedIn = isset($_SESSION['user_id']); // Cambia 'user_id' por la variable que uses para identificar la sesión
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="cell_phone_style.css"> <!-- Carga estilo de celular -->
</head>
<body>
    <div class="cell-phone">
        <h2 class="<?php echo $isLoggedIn ? 'text-danger' : ''; ?>">Registro de Usuario</h2> <!-- Título en rojo solo si hay sesión -->
        <form action="register_user.php" method="post"> <!-- Asegurarse de que el formulario apunte a este mismo archivo -->
            <div class="form-group">
                <label for="username">Nombre de usuario:</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="Ingrese su usuario" required>
            </div>
            <div class="form-group">
                <label for="email">Correo electrónico:</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Ingrese su correo" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Ingrese su contraseña" required>
            </div>
            <div class="form-group">
                <label for="first_name">Nombre:</label>
                <input type="text" id="first_name" name="first_name" class="form-control" placeholder="Ingrese su nombre" required>
            </div>
            <div class="form-group">
                <label for="last_name">Apellido:</label>
                <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Ingrese su apellido" required>
            </div>
            <?php if ($isLoggedIn): // Solo muestra el checkbox si hay sesión ?>
                <div class="form-group">
                    <input type="checkbox" id="is_admin" name="is_admin" class="form-check-input">
                    <label for="is_admin" class="form-check-label">Es Admin?</label> <!-- Checkbox para indicar si es admin -->
                </div>
            <?php endif; ?>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-success">Registrar</button>
                <a href="<?php echo $isLoggedIn ? 'users.php' : 'index.php'; ?>" class="btn btn-primary">Volver</a>
            </div>
        </form>
    </div>
</body>
</html>
