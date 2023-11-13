<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

$userName = $_SESSION['user_name'];
$userEmail = $_SESSION['user_email'];
$userBio = $_SESSION['user_bio'];
$userPhoto = $_SESSION['user_photo'];
$userPhone = $_SESSION['user_phone'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Personal Information</title>
        <link rel="stylesheet" href="../css/register.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,300,1,0" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">

    </head>
    <body>

        <h3>Profile</h3>

        <a href="./update.php">Edit</a>

        <h4>PHOTO</h4>
        <img src="<?php echo $userPhoto; ?>" alt="User Photo">
        <h4>NAME: <?php echo $userName; ?></h4>
        <h4>BIO: <?php echo $userBio; ?></h4>
        <h4>PHONE: <?php echo $userPhone; ?></h4>
        <h4>EMAIL: <?php echo $userEmail; ?></h4>
        <h4>PASSWORD</h4>

        <a href="../index.php">Logout</a>

    </body>

</html>