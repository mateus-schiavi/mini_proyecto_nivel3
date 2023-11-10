<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

require_once '../../database/login_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userNumber = $_SESSION['user_id'];
    $userName = $_POST['new_name'];
    $userEmail = $_POST['new_email'];

    $query = 'UPDATE usuarios SET name = :name, email = :email WHERE id = :id';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':name', $userName);
    $stmt->bindParam(':email', $userEmail);
    $stmt->bindParam(':id', $userNumber);
    $stmt->execute();

    header('Location: user_profile.php');
    exit();
}

$userNumber = $_SESSION['user_id'];
$query = 'SELECT name, email FROM usuarios WHERE id = :id';
$stmt = $pdo->prepare($query);
$stmt->bindParam(':id', $userNumber);
$stmt->execute();
$userInfo = $stmt->fetch();
$userName = $userInfo['name'];
$userEmail = $userInfo['email'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Your Profile</title>
</head>

<body>
    <h1>Update Profile</h1>
    <form action="update_info.php" method="post">
        <label for="new_name">Name:</label>
        <input type="text" name="new_name" id="new_name" value="<?php echo $userName; ?>" required><br><br>

        <label for="new_email">Email:</label>
        <input type="email" name="new_email" id="new_email" value="<?php echo $userEmail ?>" required><br><br>

        <input type="submit" value="Save">
    </form>

    <a href="profile.php">Return</a>
</body>

</html>