<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require '../database/login_db.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = 'SELECT * FROM users WHERE email = :email';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_bio'] = $user['bio'];
        $_SESSION['user_phone'] = $user['phone'];

        header('Location: ./profile.php');
        exit();
    } else {
        $error_message = 'Invalid User or Password. Try Again';
        header('Location: index.php');
    }
}
?>