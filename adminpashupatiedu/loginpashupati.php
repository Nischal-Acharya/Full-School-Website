<?php
session_start();
include '../connection/database.php';

$showAlert = false; // Flag to determine if the alert should be shown

if (isset($_POST['submit'])) {
    $identity_code = $_POST['identity_code'];
    $password = $_POST['password'];

    $validate_query = mysqli_query($connection, "SELECT * FROM manipulators WHERE identity_code = '$identity_code' AND password = '$password';");
    $row = mysqli_fetch_array($validate_query);

    if (is_array($row)) {
        $_SESSION["isadmin"] = $row["id"];
        $_SESSION["identity_code"] = $row["identity_code"];
        $_SESSION["usr_nam"] = $row["name"];
        $_SESSION["profile_pic"] = $row["image"];
        $_SESSION["adminPass"] = $row["password"];
        $_SESSION["adminPassAttempt"] = 3;

        $validate_query = mysqli_query($connection, "SELECT * FROM manipulators WHERE identity_code = '$identity_code' AND password = '$password';");
       
    } else {
        $showAlert = true; // Set the flag to true if the user enters wrong details
    }

    if (isset($_SESSION["identity_code"])) {
        header("Location:index.php");
        exit(); // Ensure script execution stops after redirection
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Pashupati</title>
    <script defer src="https://unpkg.com/alpinejs@3.2.3/dist/cdn.min.js"></script>
    <link rel="icon" type="image/x-icon" href="../assects/images/admin_logo.png">

    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>

    <main>
        <section class="bg-gray-50 dark:bg-gray-900">
            <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
                <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                    <img class="w-80 h-22 mr-2" src="../assects/images/defaults/header_logo.png" alt="logo">

                </a>
                <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                            Login with Admin or Scribe
                        </h1>
                        <form class="space-y-4 md:space-y-6" action="" method="POST">
                            <div>
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Identity Code</label>
                                <input type="text" name="identity_code" id="text" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Example: 75•••••4" required="">
                            </div>
                            <div>
                                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                            </div>
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative alertbox hidden" role="alert">
                                <span class="block sm:inline">Please Provide Valid details.</span>
                                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                    <svg onclick="closealert()" class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <title>Close</title>
                                        <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                                    </svg>
                                </span>
                            </div>
                            <input type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" value="Access" name="submit">
                            <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                                Forgot your password? Please contact to Engineer Teachers
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </main>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var alertBox = document.querySelector('.alertbox');

            function closealert() {
                alertBox.style.display = 'none';
            }

            // Your existing logic for session start and other scripts

            // Add the following code to show the alert box if PHP sets a flag
            <?php
            if (isset($showAlert) && $showAlert) {
                echo 'alertBox.style.display = "block";';
            }
            ?>

            // Add event listener for the close button
            var closeButton = document.querySelector('.alertbox svg');
            if (closeButton) {
                closeButton.addEventListener('click', closealert);
            }
        });
    </script>

</body>


</html>