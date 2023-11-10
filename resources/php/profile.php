<?php
session_start();

if(!isset($_SESSION['user_id'])) {
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
    <title>Profile</title>
</head>
<body>
    <h2>Profile</h2>
    <a href="./update_info.php">Edit</a>
    <h4>PHOTO</h4>
    <img src="<?php echo $userPhoto; ?>" alt="User Photo" width="100">
    <h4>NAME <?php echo $userName; ?></h4>
    <h4>BIO <?php echo $userBio; ?></h4>
    <h4>PHONE <?php echo $userPhone; ?></h4>
    <h4>EMAIL <?php echo $userEmail; ?></h4>
    <h4>PASSWORD</h4>

    <a href="./logout.php">Logout</a>
</body>
</html>


