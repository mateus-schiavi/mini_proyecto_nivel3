<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "login_db";

$conn = mysqli_connect($host, $user, $password, $db);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}
?>
