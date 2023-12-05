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
    $name = $_POST['user_name'];

    // Verifique se o email já está em uso
    $query = "SELECT id FROM users WHERE email = ?";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(1, $email); // Use ? placeholder and bind by position
    $stmt->execute();
    $existingUser = $stmt->fetch();

    if ($existingUser) {
        $error_message = "Este email ya existe. Elija otro.";
    } else {
        // Hash de contraseña
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Insira o novo usuário no banco de dados
        $query = "INSERT INTO users (email, password, user_name) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(1, $email); // Use ? placeholder and bind by position
        $stmt->bindParam(2, $hashedPassword); // Bind parameters by position
        $stmt->bindParam(3, $name); // Bind parameters by position
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
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,300,1,0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">

</head>

<body class="bg-gray-100">
    <div class="max-w-lg mx-auto py-8 px-4">
        <h1 class="text-2xl font-bold">Register</h1>

        <?php
        // Exiba uma mensagem de erro, se houver
        if (isset($error_message)) {
            echo "<p>$error_message</p>";
        }
        ?>

        <form class="mt-4" action="./register.php" method="post">
            <label for="email" class="block">Email:</label>
            <input type="email" name="email" id="email" required
                class="border border-gray-300 rounded-md px-3 py-2 mt-1 w-full">

            <label for="password" class="block mt-4">Password:</label>
            <input type="password" name="password" id="password" required
                class="border border-gray-300 rounded-md px-3 py-2 mt-1 w-full">

            <label for="name" class="block mt-4">Name:</label>
            <input type="text" name="name" id="name" required
                class="border border-gray-300 rounded-md px-3 py-2 mt-1 w-full">

            <input type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md mt-4 cursor-pointer"
                value="Sign up">
        </form>

        <h4 class="text-center mt-6">or continue with these social profiles</h4>
        <div class="flex justify-center items-center mt-4">
            <img src="../assets/Google.svg" alt="google-logo" class="mr-2">
            <img src="../assets/Twitter.svg" alt="twitter-logo" class="mr-2">
            <img src="../assets/Gihub.svg" alt="github-logo" class="mr-2">
            <img src="../assets/Facebook.svg" alt="facebook-logo" class="mr-2">
        </div>
    </div>
</body>

</html>
