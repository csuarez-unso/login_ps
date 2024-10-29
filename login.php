<!-- login.php --> 

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="cell_phone_style.css"> <!-- Carga estilo de celular -->
</head>
<body>
    <div class="cell-phone">
        <h1>Bienvenido</h1>
        <h4>Ingresa tus datos para continuar:</h4>
        <form action="validate_login.php" method="post">
            <div class="form-group">
                <label for="identifier">Nombre de usuario / correo:</label>
                <input type="text" id="identifier" name="identifier" class="form-control"  placeholder="Ingrese su usuario o correo" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" class="form-control"  placeholder="Ingrese su contraseña" required>
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                <a href="index.php" class="btn btn-secondary">Volver</a>
            </div>
        </form>
        <br><p><a href="change_password.php" style="color: red;">¿Olvido la contraseña?</a></p>
    </div>
</body>
</html>
