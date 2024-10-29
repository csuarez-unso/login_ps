<?php
session_start();
require 'db.php'; // Conexión a la base de datos

// Mensaje de éxito si se realizó una acción
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['update_data'])) {
        // Actualiza los datos del usuario
        $user_id = $_POST['user_id'];
        $email = $_POST['email'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];

        $stmt = $pdo->prepare("UPDATE users SET Email = :email, First_Name = :first_name, Last_Name = :last_name WHERE ID = :id");
        $stmt->execute([
            'email' => $email,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'id' => $user_id
        ]);
        $_SESSION['message'] = "Datos del usuario actualizados exitosamente.";
        header("Location: modify_user.php");
        exit();
    }
    elseif (isset($_POST['update_password'])) {
        // Actualiza la clave del usuario
        $user_id = $_POST['user_id'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $stmt = $pdo->prepare("UPDATE users SET Password = :password WHERE ID = :id");
        $stmt->execute(['password' => $password, 'id' => $user_id]);
        $_SESSION['message'] = "Clave del usuario actualizada exitosamente.";
        header("Location: modify_user.php");
        exit();
    }
}

// Obtener todos los usuarios de la base de datos
$stmt = $pdo->query("SELECT ID, Username, Email FROM users ORDER BY Username");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Inicializar datos del usuario
$user_data = null;

// Obtener los datos del usuario seleccionado si se envió el ID del usuario
if (isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];
    $stmt = $pdo->prepare("SELECT Email, First_Name, Last_Name FROM users WHERE ID = :id");
    $stmt->execute(['id' => $user_id]);
    $user_data = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Usuario</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="cell_phone_style.css">
    <script>
        // Muestra el formulario de datos o clave según el botón que se presiona
        function showForm(formType) {
            const userId = document.getElementById("user_id").value;
            if (userId === "") {
                alert("Por favor, selecciona un usuario antes de continuar.");
                return;
            }
            document.getElementById("update-data-form").style.display = formType === 'data' ? 'block' : 'none';
            document.getElementById("update-password-form").style.display = formType === 'password' ? 'block' : 'none';

            // Actualiza el ID del usuario seleccionado en ambos formularios
            document.getElementById("update_user_id").value = userId;
            document.getElementById("update_password_user_id").value = userId;

            // Cargar datos del usuario en el formulario de modificar datos
            if (formType === 'data') {
                document.getElementById("email").value = "<?php echo isset($user_data) ? htmlspecialchars($user_data['Email']) : ''; ?>";
                document.getElementById("first_name").value = "<?php echo isset($user_data) ? htmlspecialchars($user_data['First_Name']) : ''; ?>";
                document.getElementById("last_name").value = "<?php echo isset($user_data) ? htmlspecialchars($user_data['Last_Name']) : ''; ?>";
            }
        }
    </script>
</head>
<body>
    <div class="cell-phone">
        <div class="container">
            <h2 class="text-danger">Modificar Usuario</h2>

            <!-- Mensaje de éxito -->
            <?php if (isset($_SESSION['message'])): ?>
                <div class="alert alert-success">
                    <?php 
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                    ?>
                </div>
            <?php endif; ?>

            <!-- Selección de usuario -->
            <form id="select-user-form" method="post">
                <div class="form-group">
                    <label for="user_id">Seleccione un usuario:</label>
                    <select name="user_id" id="user_id" class="form-control" required onchange="this.form.submit();">
                        <option value="" disabled selected>Seleccione un usuario</option>
                        <?php foreach ($users as $user): ?>
                            <option value="<?php echo $user['ID']; ?>" <?php echo (isset($user_data) && $user['ID'] == $user_id) ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($user['Username']) . " (" . htmlspecialchars($user['Email']) . ")"; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Botones de acción -->
                <button type="button" class="btn btn-info" onclick="showForm('data')">Modificar Datos</button>
                <button type="button" class="btn btn-warning" onclick="showForm('password')">Modificar Clave</button>
                <div class="mt-2">
                    <a href="users.php" class="btn btn-secondary">Volver</a>
                </div>
            </form>

            <!-- Formulario para modificar datos -->
            <form id="update-data-form" action="modify_user.php" method="post" style="display: none;">
                <input type="hidden" name="user_id" id="update_user_id">
                <div class="form-group">
                    <label for="email">Correo electrónico:</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="first_name">Nombre:</label>
                    <input type="text" name="first_name" id="first_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="last_name">Apellido:</label>
                    <input type="text" name="last_name" id="last_name" class="form-control" required>
                </div>
                <button type="submit" name="update_data" class="btn btn-success" onclick="return confirm('¿Deseas guardar los cambios?');">Guardar Cambios</button>
            </form>

            <!-- Formulario para modificar clave -->
            <form id="update-password-form" action="modify_user.php" method="post" style="display: none;">
                <input type="hidden" name="user_id" id="update_password_user_id">
                <div class="form-group">
                    <label for="password">Nueva clave:</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <button type="submit" name="update_password" class="btn btn-success" onclick="return confirm('¿Deseas cambiar la clave?');">Guardar Clave</button>
            </form>
        </div>
    </div>
</body>
</html>
