<?php

session_start();
require_once '../database/login_db.php';

// Verifica se o usuário já está logado
if (isset($_SESSION["user_id"])) {
    header("Location: personalInfo.php");
    exit();
}

// Processa o formulário de login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Verifica a senha usando password_verify
        if (password_verify($password, $row["password"])) {
            $_SESSION["user_id"] = $row["id"];
            header("Location: index.php");
            exit();
        } else {
            $error_message = "Senha incorreta";
        }
    } else {
        $error_message = "Usuário não encontrado";
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
    </head>

    <body>

        <h1>Login</h1>

        <?php if (isset($error_message)): ?>
        <p style="color: red;"><?php echo $error_message; ?></p>
        <?php endif; ?>

        <form action="login.php" method="post">
            <label for="email">Email:</label>
            <input type="email" name="email" required>

            <label for="password">Senha:</label>
            <input type="password" name="password" required>

            <button type="submit">Entrar</button>
        </form>

    </body>

</html>