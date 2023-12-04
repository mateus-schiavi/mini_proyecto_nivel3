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

    $photoPath = '';  // Inicializa a variável $photoPath

    // Processar o upload da foto apenas se um novo arquivo for enviado
    $photoDir = 'uploads/';

    if (isset($_FILES['new_photo']) && $_FILES['new_photo']['error'] === UPLOAD_ERR_OK) {
        $photoPath = $photoDir . basename($_FILES['new_photo']['name']);
        move_uploaded_file($_FILES['new_photo']['tmp_name'], $photoPath);
    } else {
        // Caso contrário, manter o valor existente de $photoPath
        // Certifique-se de definir $photoPath com o valor atual no banco de dados
        $query = "SELECT photo_path FROM users WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $userId);
        $stmt->execute();
        $currentPhotoPath = $stmt->fetchColumn();
        $photoPath = $currentPhotoPath ?: 'default_photo.jpg';
    }

    // Atualizar as informações do usuário no banco de dados, incluindo o caminho da foto, bio e telefone
    $query = "UPDATE users SET name = :name, email = :email, bio = :bio, phone = :phone WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':name', $newName);
    $stmt->bindParam(':email', $newEmail);
    $stmt->bindParam(':bio', $newBio);
    $stmt->bindParam(':phone', $newPhone);
    $stmt->bindParam(':photo_path', $photoPath);
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
        <link rel="stylesheet" href="../css/update.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,300,1,0" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    </head>

    <body>
        <h1>Change Info</h1>
        <form action="./update.php" method="post" enctype="multipart/form-data">
            <label for="new_name">Name:</label>
            <input type="text" name="new_name" id="new_name" class="input-field" value="<?php echo $userName; ?>"
                required placeholder="Enter your name"><br><br>

            <label for="new_email">Email:</label>
            <input type="email" name="new_email" id="new_email" class="input-field" value="<?php echo $userEmail; ?>"
                required placeholder="Enter your email"><br><br>

            <label for="new_bio">Bio:</label>
            <textarea name="new_bio" id="new_bio" class="input-field"><?php echo $userBio; ?></textarea><br><br>

            <label for="new_phone">Phone:</label>
            <input type="text" name="new_phone" id="new_phone" class="input-field"
                value="<?php echo $userPhone; ?>"><br><br>
        </form>

        <a href="./profile.php">Return</a>
    </body>

</html>