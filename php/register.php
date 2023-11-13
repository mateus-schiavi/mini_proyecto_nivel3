<?php

session_start();

// Verificar si el usuário está logado, si sí redirigirlo para la página de perfil
if (isset($_SESSION['user_id'])) {
    header('Location: profile.php');
    exit();
}

// Conexión a la base de datos
require '../database/login_db.php'; 

// Si el formulário de registro fue enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtenga los datos del formulário
    $email = $_POST['email'];
    $password = $_POST['password'];
    $name = $_POST['name'];


    // Verifique se o email já está em uso
    $query = "SELECT id FROM users WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $existingUser = $stmt->fetch();

    if ($existingUser) {
        $error_message = "Este email ya existe. Elija otro.";
    } else {
        // Hash de contraseña
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Insira o novo usuário no banco de dados
        $query = "INSERT INTO users (email, password, name) VALUES (:email, :password, :name)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':name', $name);
        $stmt->execute();

        // Redirigir el usuário a la página de perfil
        header('Location: profile.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="../css/register.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,300,1,0" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">

    </head>

    <body>
        <div>
            <h1>Register</h1>
        </div>

        <?php
    // Exiba uma mensagem de erro, se houver
    if (isset($error_message)) {
        echo "<p>$error_message</p>";
    }
    ?>

        <form action="register.php" method="post">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required><br><br>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required><br><br>

            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required><br><br>

            <input type="submit" value="Sign up">
        </form>
        <h4>or continue with these social profile</h4>
        <div>
            <img src="../assets/Google.svg" alt="google-logo">
            <img src="../assets/Twitter.svg" alt="twitter-logo">
            <img src="../assets/Gihub.svg" alt="github-logo">
            <img src="../assets/Facebook.svg" alt="facebook-logo">
        </div>

    </body>

</html>