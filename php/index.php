<?php
session_start();

// Verifica se o usuário está logado
if (isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Login</title>
</head>
<body>

    <h1>Bem-vindo ao Sistema de Login</h1>

    <p>Por favor, <a href="login.php">faça login</a> para acessar suas informações.</p>

</body>
</html>
