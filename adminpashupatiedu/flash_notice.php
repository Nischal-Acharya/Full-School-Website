<?php
include '../connection/database.php';
session_start();

// Check if the user is not logged in
if (!isset($_SESSION["identity_code"])) {
    header("Location: loginpashupati.php");
    exit();
}

// Check if the user is not an admin
if ($_SESSION["isadmin"] != 1) {
    header("Location: scribe.php");
    exit();
}
try {

    $flash_query = "SELECT * FROM flash_notice WHERE id = 1";

    $flash_result = mysqli_query($connection, $flash_query);



    if ($flash_result) {

        $flash_notice = mysqli_fetch_assoc($flash_result);

    } else {
        echo "Error executing the query: " . mysqli_error($connection);
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
} finally {

    mysqli_close($connection);
}

// Update flash Notice
if (isset($_POST['update_flash_notice'])) {
    $fileUploadName = $_FILES['file-upload']['name'];
    $fileUploadTmp = $_FILES['file-upload']['tmp_name'];
    $sqlfileurl = $_POST["image_name"];


    $targetDirectory = '../assects/images/flashNotice/';
    $targetFilePath = "../assects/images/flashNotice/" . basename($fileUploadName);
    

    if (move_uploaded_file($fileUploadTmp, $targetFilePath)) {

        $sqlfileurl = "assects/images/flashNotice/" . basename($fileUploadName);
    }

    if ($connectionobj->connect_error) {
        die("Connectionobj failed: " . $connectionobj->connect_error);
    }


    $targetDirectory = '../assects/images/flashNotice/';
    $targetFilePath = "../assects/images/flashNotice/" . basename($fileUploadName);
    

    if (move_uploaded_file($fileUploadTmp, $targetFilePath)) {

        $sqlfileurl = "assects/images/flashNotice/" . basename($fileUploadName);
    }

 
    if ($connectionobj->connect_error) {
        die("Connection failed: " . $connectionobj->connect_error);
    }

    // Retrieve the description from the textarea
    $flash_title = $_POST['flash_title'];
    $flash_message = $_POST['flash_message'];
    $trun_flash_notice = $_POST['trun_flash_notice'];





    // Insert data into the flash_notice table
    $sql = "UPDATE flash_notice SET title=?, message=?, trun_flash=?, image_url=? WHERE id=1";

    $stmt = $connectionobj->prepare($sql);


    $stmt->bind_param("ssss", $flash_title, $flash_message, $trun_flash_notice, $sqlfileurl);

    if ($stmt->execute()) {
        echo '
        <script>
        alert("Flash Notice has been updated sucessfully")
        window.location.replace("flash_notice.php");
        
        </script>';
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $connectionobj->close();
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Pashupati</title>
    <link rel="icon" type="image/x-icon" href="../assects/images/admin_logo.png">

    <script defer src="https://unpkg.com/alpinejs@3.2.3/dist/cdn.min.js"></script>
    <style>

    </style>
</head>

<body>
    <?php include ('../includes/admin_header.php') ?>

    <section class="text-gray-600 body-font">
        <div class="container px-5 py-10 mx-auto">
            <div class="flex flex-col text-center w-full mb-5">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-blue-600">Update Flash Notice</h1>
                <p class="text-sm md:text-base lg:w-2/3 mx-auto leading-relaxed text-base">

                    Elevate user engagement on the homepage by tailoring flash notices to convey important information.
                    Seamlessly update these messages to create a dynamic and interactive user experience, ensuring that
                    your audience stays informed and engaged with the latest updates and announcements.
                </p>
            </div>
        </div>
    </section>

    <section class="text-gray-600 body-font" id="joinUsSection">
        <div class="container mx-auto flex md:flex-row flex-col items-center">
            <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">

                <div
                    class="max-w-4xl mt-5 mb-3 p-6 mx-auto bg-indigo-600 rounded-md shadow-md dark:bg-gray-800 mt-0 mb-10 max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <h5 id="flash_subject_prev"
                            class="mb-3 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            <?php echo $flash_notice['title']; ?>
                        </h5>
                    </a>
                    <a href="#">
                        <img class="rounded-t-lg" src="../<?php echo $flash_notice['image_url']; ?>" alt="" />
                    </a>
                    <div class="">
                        <p id="flash_message_prev" class="my-3 font-normal text-gray-700 dark:text-gray-400">
                            <?php echo $flash_notice['message']; ?>
                        </p>
                        <a href="#"
                            class="mb-5 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Close
                        </a>
                    </div>
                </div>

            </div>
            <div
                class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
                <main>
                    <section
                        class="max-w-4xl p-6 mx-auto bg-blue-600 rounded-md shadow-md dark:bg-gray-800 mt-10 mb-10">
                        <h1 class="text-xl font-bold text-white capitalize dark:text-white">Flash Notice</h1>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                                <div>
                                    <label class="text-white dark:text-gray-200">Trun
                                        Flash</label>
                                    <select name="trun_flash_notice"
                                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">

                                        <option <?php if ($flash_notice['trun_flash'] == "1") {
                                            echo 'selected';
                                        } ?>
                                            value="1">ON</option>
                                        <option <?php if ($flash_notice['trun_flash'] == "0") {
                                            echo 'selected';
                                        } ?>
                                            value="0">OFF</option>

                                    </select>
                                </div>

                                <div>
                                    <label class="text-white dark:text-gray-200">Subject <span
                                            style="color: red;">*</span></label>
                                    <input name="flash_title" value="<?php echo $flash_notice['title']; ?>"
                                        id="flash_subject" type="text"
                                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                </div>



                                <div>
                                    <label class="block text-sm font-medium text-white">
                                        Banner Image
                                    </label>
                                    <div
                                        class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                        <div class="space-y-1 text-center">
                                            <svg class="mx-auto h-12 w-12 text-white" stroke="currentColor" fill="none"
                                                viewBox="0 0 48 48" aria-hidden="true">
                                                <path
                                                    d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>

                                            <div class="flex text-sm text-gray-600">
                                                <label for="file-upload"
                                                    class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                    <span class="">Upload a file</span>
                                                    <input name="image_name" class="hidden" type="text" value="<?php echo $flash_notice['image_url']; ?>">
                                                    <input type="file" accept="image/*" name="file-upload"
                                                        id="file-upload" type="file" class="sr-only"
                                                        onchange="displayFileName()">
                                                </label>
                                                <p id="file-info" class="pl-1 text-white">or drag and drop</p>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <label class="text-white dark:text-gray-200">Message
                                        <span style="color: red;">*</span></label>
                                    <textarea name="flash_message" id="flash_message" rows="4" id="textarea"
                                        type="textarea"
                                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"><?php echo $flash_notice['message']; ?></textarea>
                                </div>
                            </div>



                            <div class="flex justify-end mt-6">
                                <button name="update_flash_notice" type="submit"
                                    class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-pink-500 rounded-md hover:bg-pink-700 focus:outline-none focus:bg-gray-600">Save</button>
                            </div>
                        </form>
                    </section>


                </main>

            </div>
        </div>
    </section>

    <!--section end-->






    <?php include ('../includes/admin_footer.php') ?>
</body>
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
</script>
<script>
    setInterval(preview, 1000);

    function preview() {
        var sub = document.getElementById("flash_subject").value;
        var mes = document.getElementById("flash_message").value;
        document.getElementById("flash_subject_prev").innerHTML = sub;
        document.getElementById("flash_message_prev").innerHTML = mes;
    }
    console.clear();
</script>


</html>