<?php
include '../connection/database.php';
session_start();

if (!isset($_SESSION["identity_code"])) {
    header("Location: loginpashupati.php");
    exit();
}

if ($_SESSION["isadmin"] != 1) {
    header("Location: scribe.php");
    exit();
}
// Method POST It works now

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['update_scribe'])) {
        $scribeId = $_POST['scribeId'];
        $IDImage = 'file-upload-modified' . $scribeId;
        $fileUploadName = $_FILES[$IDImage]['name'];
        $fileUploadTmp = $_FILES[$IDImage]['tmp_name'];


        $targetDirectory = '../assects/images/admin_and_scribe/';
        $targetFilePath = "../assects/images/admin_and_scribe/" . basename($fileUploadName);
        $sqlfileurl = $_POST['imageLocationscribe'];

        if (move_uploaded_file($fileUploadTmp, $targetFilePath)) {

            $sqlfileurl = "assects/images/admin_and_scribe/" . basename($fileUploadName);
        }



        if ($connectionobj->connect_error) {
            die("Connection failed: " . $connectionobj->connect_error);
        }

        // Retrieve the description from the textarea

        $scribeName = $_POST['scribeName'];
        $scribeIdentity = $_POST['scribeIdentity'];
        $password = $_POST['password'];
        date_default_timezone_set('Asia/Kathmandu');
        $currentDate = date("d/m/Y");
        $currentTime = date("h:i A");
        $timeNow = $currentDate . " " . $currentTime;

        // Insert data into the school_notice table
        $sql = "UPDATE manipulators SET name=?, identity_code=?, password=?, image=?, last_update=? WHERE id=?";

        $stmt = $connectionobj->prepare($sql);


        $stmt->bind_param("ssssss", $scribeName, $scribeIdentity, $password, $sqlfileurl, $timeNow, $scribeId);

        if ($stmt->execute()) {
            echo '
            <script>
            alert("Scribe has been updated sucessfully")
            window.location.replace("adminandscribe.php");
            
            </script>';
        } else {
            echo "Error: " . $stmt->error;
        }


    }


    $attempt = 3;
    if (isset($_POST['update_admin'])) {

        // Retrieve the description from the textarea

        $previousPassword = $_POST['previousPassword'];
        $password = $_POST['password'];
        $confrimPassword = $_POST['confrimPassword'];
        $newIdentity = $_POST["newIdentity"];


        $IDImage = 'file-upload-modified';
        $fileUploadName = $_FILES[$IDImage]['name'];
        $fileUploadTmp = $_FILES[$IDImage]['tmp_name'];


        $targetDirectory = '../assects/images/admin_and_scribe/';
        $targetFilePath = "../assects/images/admin_and_scribe/" . basename($fileUploadName);
        $sqlfileurl = $_SESSION["profile_pic"];

        if (move_uploaded_file($fileUploadTmp, $targetFilePath)) {

            $sqlfileurl = "assects/images/admin_and_scribe/" . basename($fileUploadName);
        }



        if ($connectionobj->connect_error) {
            die("Connection failed: " . $connectionobj->connect_error);
        }





        if ($_SESSION["adminPass"] == $previousPassword) {
            // Update data into the admin table
            $sql = "UPDATE manipulators SET identity_code=?, password=?, image=? WHERE id=1";

            $stmt = $connectionobj->prepare($sql);


            $stmt->bind_param("sss", $newIdentity, $password, $sqlfileurl);

            if ($stmt->execute()) {
                $_SESSION["adminPassAttempt"] = 3;
                echo '
    <script>
    alert("Admin details has been updated sucessfully")
    window.location.replace("adminandscribe.php");
    
    </script>';
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
            $connectionobj->close();


        } else {
            $_SESSION["adminPassAttempt"]--;
            if ($_SESSION["adminPassAttempt"] < 1) {
                echo '
            <script>
            alert("I detect untrusted user!!! you have to re-login to access admin features.")
            window.location.replace("logoutpashupatisession.php");
    
            
            </script>';
            } else {

                echo '
            <script>
            alert("Sorry you have done something wrong, you will be logout after ' . $_SESSION["adminPassAttempt"] . ' attempts")
            
            
            </script>';

            }

        }

    }
}


$defaultavatar = "../assects/images/defaults/defaultaltimage.jpg";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Staff | Pashupati</title>
    <script defer src="https://unpkg.com/alpinejs@3.2.3/dist/cdn.min.js"></script>
    <link rel="icon" type="image/x-icon" href="../assects/images/admin_logo.png">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>


</head>

<body>
    <?php include ('../includes/admin_header.php') ?>


    <section class="text-gray-600 body-font">
        <div class="container px-5 py-10 mx-auto">
            <div class="flex flex-col text-center w-full mb-5">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-blue-600">Update Admin and Authors
                </h1>
                <p class="text-sm md:text-base lg:w-2/3 mx-auto leading-relaxed text-base">
                    It's like the dashboard for all your school admin needs. Here, you've got the tools to customize
                    everything from passwords and names to logos and identity codes. It's like being the architect of
                    your school's digital realm, sculpting it to perfection with just a few clicks. So, dive in, tweak
                    those settings, and let's make this digital domain truly yours! 💻🔧
                </p>
            </div>

            <button data-modal-target="authentication-modal2" data-modal-toggle="authentication-modal2"
                class="mt-10 block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
                🛡️ Change Admin Details
            </button>
        </div>
    </section>


    <!-- Modal toggle -->



    <!-- Adding Committe Menber -->

    <div id="authentication-modal2" tabindex="-1" aria-hidden="true"
        class="fadeIn hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Change Administrator Details
                    </h3>
                    <button type="button"
                        class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="authentication-modal2">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5">
                    <form class="space-y-4" action="" method="POST" onsubmit="return validatePassword()"
                        enctype="multipart/form-data">
                        <div><label for="new_file"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">🖼️ Select an logo
                                or
                                passport size photo</label></div>
                        <div class="flex items-center justify-center w-full">


                            <input name="file-upload-modified"
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                id="file_input" type="file" accept="image/*">

                        </div>
                        <div>
                            <label for="adminName"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">🧑🏻 Name</label>
                            <input type="text" name="adminName" value="<?php echo $_SESSION['usr_nam']; ?>"
                                class="font-black bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Pashupati Admininstator" disabled>

                            <label for="previousPassword"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">🔓 Previous
                                Password</label>


                            <input type="text" name="previousPassword"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Current Password" required>

                            <label for="newIdentity"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">🎫 New
                                Identity</label>


                            <input type="text" name="newIdentity" value="<?php echo $_SESSION["identity_code"]; ?>"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="716763872" required>

                            <label for="Password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">🔐 Password</label>
                            <input title="Password must be at least 8 character" minlength="8" type="password"
                                name="password" id="password"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="New Password" required>
                            <label for="Confrim Password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">🔑 Confrim
                                Password</label>
                            <input minlength="8" type="password" name="confrimPassword" id="confirm_password"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Confrim Password" required>

                        </div>


                        <button type="submit" name="update_admin"
                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update
                            Admin</button>

                    </form>
                </div>
            </div>
        </div>
    </div>





    <main>
        <!-- Start block -->
        <section class="bg-gray-50 dark:bg-gray-900 p-3 mt-5 sm:p-5 antialiased">
            <div class="mx-auto max-w-screen-xl px-0 lg:px-12">
                <!-- Start coding here -->
                <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                    <div
                        class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                        <div class="w-full p-1 md:w-1/2">
                            <form class="flex items-center">
                                <label for="simple-search" class="sr-only">Search</label>
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <h2 class="my-2"><b>✍ Scribe or Authors</b></h2>
                                    </div>

                                </div>
                            </form>
                        </div>

                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-4 py-3">🧑🏻 AUTHOR</th>
                                    <th scope="col" class="px-4 py-3">🎫 Identity Code</th>
                                    <th scope="col" class="px-4 py-4">🗓️ Last Changed</th>
                                    <th scope="col" class="px-4 py-3">
                                        <span class="sr-only">Actions</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php


                                $fetchScribe = "SELECT * FROM `manipulators` where id !=1;";
                                $Scribes = mysqli_query($connection, $fetchScribe);
                                $totalScribes = mysqli_num_rows($Scribes);

                                if ($totalScribes > 0) {
                                    while ($row = mysqli_fetch_assoc($Scribes)) {
                                        $ScribesId = $row['id'];
                                        echo '
                                            <tr class="border-b dark:border-gray-700">
                                                <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    <div class="flex items-center mr-3">
                                                        <img src="../' . $row['image'] . '" alt="" class="h-8 w-auto mr-3" onerror="this.src=`' . $defaultavatar . '`">
                                                        ' . $row['name'] . '
                                                    </div>
                                                </th>
                                                <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white  max-w-[10rem] truncate">' . $row['identity_code'] . '</th>
                                                <td class="px-4 py-3">' . $row['last_update'] . '</td>

                                                
                                                <td class="px-4 py-3 flex items-center justify-end">
                                                    <button id="apple-imac-27-dropdown-button" data-dropdown-toggle="apple-imac-27-dropdowncommitte' . $row['id'] . '" class="inline-flex items-center text-sm font-medium hover:bg-gray-100 dark:hover:bg-gray-700 p-1.5 dark:hover-bg-gray-800 text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100" type="button">
                                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                        </svg>
                                                    </button>
                                                    <div id="apple-imac-27-dropdowncommitte' . $ScribesId . '" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                                        <ul class="py-1 text-sm" aria-labelledby="apple-imac-27-dropdown-button">
                                                            <li>
                                                                <button type="button" data-modal-target="updateProductModal' . $ScribesId . '" data-modal-toggle="updateProductModal' . $ScribesId . '" class="flex w-full items-center py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-gray-700 dark:text-gray-200">
                                                                    <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" />
                                                                    </svg>
                                                                    Edit
                                                                </button>
                                                            </li>

                                                            
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                
                                            ';
                                    }
                                }
                                ?>


                            </tbody>
                        </table>
                    </div>
                    <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4"
                        aria-label="Table navigation">

                    </nav>
                </div>
            </div>
        </section>

        <!-- Update modal -->
        <?php
        $fetchScribe = "SELECT * FROM manipulators WHERE id != 1;";
        $Scribes = mysqli_query($connection, $fetchScribe);
        $totalScribes = mysqli_num_rows($Scribes);

        if ($totalScribes > 0) {
            while ($row = mysqli_fetch_assoc($Scribes)) {
                $ScribesId = $row['id'];
                echo '

                        <div id="updateProductModal' . $ScribesId . '" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-2xl max-h-full">
                                <!-- Modal content -->
                                
                                <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                    <!-- Modal header -->
                                    <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Update Scribe</h3>
                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="updateProductModal' . $ScribesId . '">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <form method="post" onsubmit="return validatePassword'.$row['id'].'()" id="UpdateUsers' . $ScribesId . '" enctype="multipart/form-data">
                                        <div class="grid gap-4 mb-4 sm:grid-cols-1">
                                        <div><label for="new_file" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">📁 File (None will be previous)</label></div><br>
                                            <div class="flex items-center justify-center w-full">
                                               
                                            
                                                <input name="file-upload-modified' . $ScribesId . '" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file" accept="image/*">

                                            </div>

                                            <div class="sm:col-span-2">
                                                <label for="scribeName" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">🧑🏻 Name</label>
                                                <input type="text" name="scribeName" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="' . $row['name'] . '" placeholder="Bisswass Niroula">
                                                <label for="identity code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">🎫 Identity Code</label>
                                                <input type="text" name="scribeIdentity" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="' . $row['identity_code'] . '" placeholder="Code whatever you want">
                                                
                                                <label for="Password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">🔐 Password</label>
                            <input title="Password must be at least 8 character" minlength="8" type="password" name="password" id="password'.$row['id'].'"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="New Password" required>
                            <label for="Confrim Password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">🔑 Confrim
                                Password</label>
                            <input minlength="8" type="password" name="confrimPassword" id="confirm_password'.$row['id'].'"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Confrim Password" required>
                                                </div>
                                                <input type="text" name="imageLocationscribe" id="name" class="hidden bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="' . $row['image'] . '" placeholder="9812000000">
                                            <input type="hidden" name="scribeId" value="' . $ScribesId . '" />
                                            
                                        </div>
                                        
                                        <div class="flex items-center space-x-4">
                                            <button name="update_scribe" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update Scribe</button>
                                            
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Read modal -->

                        
                        
                       <script>
                       function validatePassword'.$row['id'].'() {
                        var password = document.getElementById("password'.$row['id'].'").value;
                        var confirm_password = document.getElementById("confirm_password'.$row['id'].'").value;
            
                        if (password != confirm_password) {
                            alert("Passwords do not match!");
                            return false;
                        }
                        return true;
                    }

                       </script>
                        
                        
                        
                        
                        ';
            }
        }
        ?>


    </main>







    <?php include ('../includes/admin_footer.php') ?>

    <script>
        function displayFileName() {
            var fileInput = document.getElementById('file-upload');
            var fileInfoContainer = document.getElementById('file-info');


            if (fileInput.files.length > 0) {
                fileInfoContainer.innerHTML = '         File: ' + fileInput.files[0].name;
                fileInfoContainer.classList.remove('hidden');

            }
        }

        function displayFileNameShow() {
            var fileInput = document.getElementById('dropzone-file');
            var fileInfoContainer = document.getElementById('file-info-modified');

            if (fileInput.files.length > 0) {
                fileInfoContainer.innerHTML = 'File: ' + fileInput.files[0].name;
                fileInfoContainer.classList.remove('hidden');
            }
        }

        //Password Validation
        function validatePassword() {
            var password = document.getElementById("password").value;
            var confirm_password = document.getElementById("confirm_password").value;

            if (password != confirm_password) {
                alert("Passwords do not match!");
                return false;
            }
            return true;
        }

        console.clear();
    </script>



</body>


</html>