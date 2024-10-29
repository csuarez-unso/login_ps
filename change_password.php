<!-- change_password.php --> 

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar Contraseña</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="cell_phone_style.css"> <!-- Carga estilo de celular -->
</head>
<body>
    <div class="cell-phone">
        <h1>Cambiar Contraseña</h1>
        <form action="send_new_password.php" method="post">
            <div class="form-group">
                <label for="email">Correo electrónico:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-warning">Enviar nueva contraseña</button>
            <a href="index.php" class="btn btn-secondary">Volver</a>
            </div>
        </form>
    </div>
</body>
</html>
