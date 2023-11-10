<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM users WHERE id='$user_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "Erro ao obter informações do usuário.";
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Informações Pessoais</title>
</head>
<body>
    <div class="container">
        <h2>Informações Pessoais de <?php echo $user['name']; ?></h2>

        <p>Email: <?php echo $user['email']; ?></p>
        <p>Biografia: <?php echo $user['bio']; ?></p>
        <p>Telefone: <?php echo $user['phone']; ?></p>

        <p><a href="dashboard.php">Voltar para o Dashboard</a></p>
    </div>
</body>
</html>
