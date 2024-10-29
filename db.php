<!-- db.php --> 

<?php
// Configuración de la conexión a la base de datos
$host = 'localhost';
$dbname = 'ps_db';
$username = 'root_ps';
$password = 'root123';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error al conectar a la base de datos: " . $e->getMessage());
}
?>
