<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $bio = $_POST['bio'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (name, bio, phone, email, password) VALUES ('$name', '$bio', '$phone', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Usuário criado com sucesso";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Registro</title>
</head>
<body>
    <h2>Registro</h2>
    <form method="post" action="">
        <label for="name">Nome:</label>
        <input type="text" name="name" required>

        <label for="bio">Bio:</label>
        <textarea name="bio" rows="4" required></textarea>

        <label for="phone">Telefone:</label>
        <input type="text" name="phone" required>

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="password">Senha:</label>
        <input type="password" name="password" required>

        <input type="submit" value="Registrar">
    </form>
    <p>Já possui uma conta? <a href="login.php">Faça login aqui</a></p>
</body>
</html>
