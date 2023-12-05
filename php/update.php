<?php
session_start();

require_once '../database/login_db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_SESSION['user_id'];
    $newName = $_POST['new_name'];
    $newEmail = $_POST['new_email'];
    $newBio = $_POST['new_bio'];
    $newPhone = $_POST['new_phone'];

    // Atualizar as informações do usuário no banco de dados, excluindo a parte da foto
    $query = "UPDATE users SET user_name = :user_name, email = :email, bio = :bio, phone = :phone WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':user_name', $newName);
    $stmt->bindParam(':email', $newEmail);
    $stmt->bindParam(':bio', $newBio);
    $stmt->bindParam(':phone', $newPhone);
    $stmt->bindParam(':id', $userId);
    
    if (!$stmt->execute()) {
        // Handle the error, log it, or show an appropriate message to the user
        die('Error updating user information');
    }

    header('Location: profile.php');
    exit();
}

$userId = $_SESSION['user_id'];
$query = "SELECT user_name, email, bio, phone FROM users WHERE id = :id";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':id', $userId);
$stmt->execute();
$userInfo = $stmt->fetch();
$userName = $userInfo['user_name'];
$userEmail = $userInfo['email'];
$userBio = $userInfo['bio'];
$userPhone = $userInfo['phone'];
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Restante do seu código permanece o mesmo -->
</head>

<body class="flex justify-center items-center h-screen">
    <div class="max-w-md w-full">
        <h1 class="text-2xl mb-4">Change Info</h1>
        <form action="./update.php" method="post">
            <label for="new_name">Name:</label>
            <input type="text" name="new_name" id="new_name" class="input-field w-full mb-4 px-3 py-2 border rounded-md"
                value="<?php echo $userName; ?>" required placeholder="Enter your name"><br><br>

            <label for="new_email">Email:</label>
            <input type="email" name="new_email" id="new_email" class="input-field w-full mb-4 px-3 py-2 border rounded-md"
                value="<?php echo $userEmail; ?>" required placeholder="Enter your email"><br><br>

            <label for="new_bio">Bio:</label>
            <textarea name="new_bio" id="new_bio" class="input-field w-full mb-4 px-3 py-2 border rounded-md"><?php echo $userBio; ?></textarea><br><br>

            <label for="new_phone">Phone:</label>
            <input type="text" name="new_phone" id="new_phone" class="input-field w-full mb-4 px-3 py-2 border rounded-md"
                value="<?php echo $userPhone; ?>"><br><br>

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update Info</button>
        </form>

        <a href="./profile.php" class="block mt-4 text-blue-500">Return</a>
    </div>
</body>

</html>
