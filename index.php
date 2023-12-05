<?php
session_start();
?>
<!-- index page -->
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

        <!-- Se você quiser manter suas fontes e estilos personalizados, adicione os links aqui -->

    </head>

    <body class="bg-gray-100 flex items-center justify-center h-screen">

        <main class="max-w-lg mx-auto p-4">
            <section class="bg-white p-8 rounded-lg shadow-md">
                <header>
                    <img src="./assets/devchallenges.svg" alt="">
                </header>
                <h1 class="text-2xl font-bold mt-4">Join thousands of Learners <br>from around the world</h1>
                <p class="text-gray-600">Master web development by making real-life <br> projects. There are multiple
                    paths for you to <br> choose
                </p>
                <form class="mt-6 text-center" action="./php/login.php" method="post">
                    <div class="flex items-center border-b border-gray-300 py-2">
                        <input placeholder="Email" type="email" name="email" id="email" required
                            class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path
                                d="M10 12a2 2 0 100-4 2 2 0 000 4zm0 2a6 6 0 100-12 6 6 0 000 12zM4 10a8 8 0 1116 0 8 8 0 01-16 0z" />
                        </svg>
                    </div>
                    <div class="flex items-center border-b border-gray-300 py-2 mt-4">
                        <input placeholder="Password" type="password" name="password" id="password" required
                            class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 3a2 2 0 00-1.42.586c-.36.36-.59.854-.65 1.372H4a2 2 0 00-2 2v9.5a2 2 0 002 2h12a2 2 0 002-2V7a2 2 0 00-2-2h-4.93a3.7 3.7 0 00-.65-1.372A2 2 0 0010 3zm0 2a1 1 0 011 1v1h-2V6a1 1 0 011-1zm-5.94 6h12.92a1 1 0 01.894 1.447l-1.4 3.5a1 1 0 01-.895.553H8.447a1 1 0 01-.895-.553l-1.4-3.5A1 1 0 014.06 11z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="text-right mt-6">
                        <input type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded cursor-pointer"
                            value="Start coding now">
                    </div>
                </form>

                <h4 class="text-center mt-6">or continue with these social profiles</h4>
                <div class="flex justify-center items-center mt-4">
                    <img src="./assets/Google.svg" alt="google-logo" class="mr-2">
                    <img src="./assets/Twitter.svg" alt="twitter-logo" class="mr-2">
                    <img src="./assets/Gihub.svg" alt="github-logo" class="mr-2">
                    <img src="./assets/Facebook.svg" alt="facebook-logo" class="mr-2">
                </div>

                <h4 class="text-center mt-6">Don't have an account yet?<br> <a href="../php/register.php"
                        class="text-blue-500">Register</a></h4>
            </section>
        </main>

    </body>

</html>