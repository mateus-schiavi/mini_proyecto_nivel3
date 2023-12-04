<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

$userName = $_SESSION['user_name'];
$userEmail = $_SESSION['user_email'];
$userBio = $_SESSION['user_bio'];
$userPhone = $_SESSION['user_phone'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Information</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Se preferir, você pode adicionar o arquivo CSS local do Tailwind se o tiver instalado localmente -->
    <!-- <link href="caminho/para/seu/arquivo/tailwind.css" rel="stylesheet"> -->
    <!-- Seus estilos personalizados -->
    <link rel="stylesheet" href="../css/register.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,300,1,0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <div class="container mx-auto p-4 relative">

        <div class="flex justify-between items-center mb-4">
            <h3 class="text-3xl font-bold">Profile</h3>
            <a href="./update.php" class="inline-block px-4 py-2 rounded-lg bg-white border border-blue-500 text-blue-500">Edit</a>
        </div>

        <div class="mt-4">
            <h4 class="text-xl font-semibold mb-2">NAME: <?php echo $userName; ?></h4>
            <hr class="mb-2">
            <h4 class="mb-2">BIO: <?php echo $userBio; ?></h4>
            <hr class="mb-2">
            <h4 class="mb-2">PHONE: <?php echo $userPhone; ?></h4>
            <hr class="mb-2">
            <h4 class="mb-2">EMAIL: <?php echo $userEmail; ?></h4>
            <hr class="mb-2">
            <h4 class="mb-2">PASSWORD: <?php echo str_repeat('*', 9); ?></h4>
        </div>

        <a href="../index.php" class="block mt-6 text-red-500 hover:underline">Logout</a>
    </div>

    <!-- Ícone no canto superior esquerdo -->
    <img src="../assets/devchallenges.png" alt="Ícone" class="h-6 w-6 fixed top-0 left-0 mt-4 ml-4 z-50">

</body>

</html>

