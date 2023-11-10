<?php
session_start();
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
    <form action="./login.php" method="post">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br><br>

        <input type="submit" value="login">
    </form>

    <h4>or continue with these social media</h4>
    <img src="../../assets/Facebook.svg" alt="facebook">
    <img src="../../assets/Gihub.svg" alt="github">
    <img src="../../assets/Google.svg" alt="google">
    <img src="../../assets/Twitter.svg" alt="twitter">

    <h4>Do not have an account yet? <a href="">Register</a></h4>
</body>
</html>