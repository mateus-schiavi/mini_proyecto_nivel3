<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit;
}

require_once '../database/login_db.php';

// Obtener información del usuario desde la base de datos
$email = $_SESSION['email'];
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo 'User not found';
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Información Personal</title>
</head>
<body>
    <h2>Información Personal</h2>
    <p>Nombre: <?php echo $user['name']; ?></p>
    <p>Bio: <?php echo $user['bio']; ?></p>
    <p>Teléfono: <?php echo $user['phone']; ?></p>
    <p>Email: <?php echo $user['email']; ?></p>
    <a href="change_info.php">Cambiar Información</a>
    <br>
    <a href="logout.php">Cerrar Sesión</a>
</body>
</html>
