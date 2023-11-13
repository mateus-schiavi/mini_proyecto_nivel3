<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="./css/index.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,300,1,0" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">

    </head>

    <body>

        <main>
            <section>
                <header>
                    <img src="./assets/devchallenges.svg" alt="">
                </header>
                <h1>Join thousands of Learners <br>from around the world</h1>
                <p>Master web development by making real-life <br> projects. There are multiple
                    paths for you to <br> choose
                </p>
                <form class="form" action="./php/login.php" method="post">
                    <span class="material-symbols-outlined mail" style="color: #828282;">
                        mail
                    </span>
                    <input placeholder="Email" type="email" name="email" id="email" required><br><br>
                    <span class="material-symbols-outlined lock" style="color: #828282;">
                        lock
                    </span>
                    <input placeholder="Password" type="password" name="password" id="password" required><br><br>

                    <input type="submit" value="Start coding now">
                </form>

                <h4>or continue with these social profile</h4>
                <div>
                <img src="./assets/Google.svg" alt="google-logo">
                <img src="./assets/Twitter.svg" alt="twitter-logo">
                <img src="./assets/Gihub.svg" alt="github-logo">
                <img src="./assets/Facebook.svg" alt="facebook-logo">
                </div>

                <h4>Don't have an account yet?<br> <a href="./php/register.php">Register</a></h4>
            </section>
        </main>

    </body>

</html>