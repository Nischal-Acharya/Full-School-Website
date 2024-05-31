<?php
include '../connection/database.php';
session_start();

if (!isset($_SESSION["identity_code"])) {
    header("Location: loginpashupati.php");
    exit();
}


// Method POST It works now

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['publish_notice'])) {

        $fileUploadName = $_FILES['file-upload']['name'];
        $fileUploadTmp = $_FILES['file-upload']['tmp_name'];
        $fullServerPath = "";

        $targetDirectory = '../assects/images/notices_files/';
        $targetFilePath = "../assects/images/notices_files/" . basename($fileUploadName);
        $sqlfileurl = "";

        if (move_uploaded_file($fileUploadTmp, $targetFilePath)) {

            $sqlfileurl = "assects/images/notices_files/" . basename($fileUploadName);
        }

        date_default_timezone_set('Asia/Kathmandu');
        $currentDate = date("d/m/Y");
        $currentTime = date("h:i A");

        if ($connectionobj->connect_error) {
            die("Connection failed: " . $connectionobj->connect_error);
        }

        // Retrieve the description from the textarea
        $description = $_POST['description'];
        $about_notice = $_POST['about_notice'];
        $posted_by = $_SESSION["usr_nam"];
        $logo = $_SESSION["profile_pic"];
        $last_modified_default = "Not Modified";

        // Insert data into the school_notice table
        $sql = "INSERT INTO school_notice (logo, notice_description, posted_by, date, time, image_url, about, last_modified) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $connectionobj->prepare($sql);


        $stmt->bind_param("ssssssss", $logo, $description, $posted_by, $currentDate, $currentTime, $sqlfileurl, $about_notice, $last_modified_default);

        if ($stmt->execute()) {
            echo '
            <script>
            alert("Notice has been published sucessfully")
            //window.location.replace("add_notice.php");
            
            </script>';
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $connectionobj->close();
    }

    if (isset($_POST['notice_delete'])) {
        $noticeId = $_POST["notice_id"];
        mysqli_query($connection, "DELETE FROM `school_notice` WHERE id = $noticeId;");
        echo '
            <script>
            window.location.replace("add_notice.php");
            
            </script>';
        exit;
    }

    if (isset($_POST['update_notice'])) {
        $noticeId = $_POST["notice_id"];
        $IDImage = 'file-upload-modified' . $noticeId;
        $fileUploadName = $_FILES[$IDImage]['name'];
        $fileUploadTmp = $_FILES[$IDImage]['tmp_name'];


        $targetDirectory = '../assects/images/notices_files/';
        $targetFilePath = "../assects/images/notices_files/" . basename($fileUploadName);
        $sqlfileurl = $_POST["image_name"];

        if (move_uploaded_file($fileUploadTmp, $targetFilePath)) {

            $sqlfileurl = "assects/images/notices_files/" . basename($fileUploadName);
        }

        date_default_timezone_set('Asia/Kathmandu');
        $currentDate = date("d/m/Y");
        $currentTime = date("h:i A");

        if ($connectionobj->connect_error) {
            die("Connection failed: " . $connectionobj->connect_error);
        }

        // Retrieve the description from the textarea
        $description = $_POST['notice_description'];
        $about_notice = $_POST['about_notice'];

        $last_modified_default = $currentTime . " " . $currentDate;

        // Insert data into the school_notice table
        $sql = "UPDATE school_notice SET notice_description=?, about=?, image_url=?, last_modified=? WHERE id=?";

        $stmt = $connectionobj->prepare($sql);


        $stmt->bind_param("sssss", $description, $about_notice, $sqlfileurl, $last_modified_default, $noticeId);

        if ($stmt->execute()) {
            echo '
            <script>
            alert("Notice has been updated sucessfully")
            window.location.replace("add_notice.php");
            
            </script>';
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $connectionobj->close();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scribe | Pashupati</title>
    <script defer src="https://unpkg.com/alpinejs@3.2.3/dist/cdn.min.js"></script>
    <link rel="icon" type="image/x-icon" href="../assects/images/admin_logo.png">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>


</head>

<body>
    <?php include ('../includes/admin_header.php') ?>

    <main>
        <section class="max-w-4xl p-6 mx-auto bg-green-700 rounded-md shadow-md dark:bg-gray-800 mt-10">
            <h1 class="text-xl font-bold text-white capitalize dark:text-white">Publish Notice</h1>
            <form action="" method="post" enctype="multipart/form-data">

                <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-1">



                    <div id="file-upload-container"
                        class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <div id="upload-container">
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
                                        <input type="file" name="file-upload" id="file-upload" type="file"
                                            class="sr-only" onchange="displayFileName()">
                                    </label>
                                    <p id="file-info" class="pl-1 text-white">or drag and drop</p>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="text-white dark:text-gray-200">Subject <span style="color: red;">*</span></label>
                        <input name="about_notice" required id="passwordConfirmation" type="text"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    </div>

                    <div>
                        <label class="text-white dark:text-gray-200" for="passwordConfirmation">Write about notice...
                            <span style="color: red;">*</span></label>
                        <textarea name="description" required minlength="40" id="textarea" type="textarea"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"></textarea>
                    </div>

                </div>

                <div class="flex justify-end mt-6">
                    <button type="submit" name="publish_notice"
                        class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-pink-500 rounded-md hover:bg-pink-700 focus:outline-none focus:bg-gray-600">Publish</button>
                </div>
            </form>
        </section>
























        <!-- Start block -->
        <section class="bg-gray-50 dark:bg-gray-900 p-3 mt-5 sm:p-5 antialiased">
            <div class="mx-auto max-w-screen-xl px-0 lg:px-12">
                <!-- Start coding here -->
                <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                    <div
                        class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                        <div class="w-full md:w-1/2">
                            <form class="flex items-center">
                         
                                <div class="relative w-full">
                                    
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        
                                    </div>
                                    <input disabled type="text" id="simple-search" readonly value="📓 Recent notice is shown in top (DESC)"
                                        class="font-black bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Recent notice is shown in top (DESC)" required="">
                                </div>
                            </form>
                        </div>

                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-4 py-3">Subject</th>
                                    <th scope="col" class="px-4 py-4">Published On</th>
                                    <th scope="col" class="px-4 py-3">Last Modified</th>
                                    <th scope="col" class="px-4 py-3">
                                        <span class="sr-only">Actions</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php


                                $fetch_notice_data = "SELECT * FROM `school_notice` ORDER BY id DESC;";
                                $notices = mysqli_query($connection, $fetch_notice_data);
                                $totalNotice = mysqli_num_rows($notices);

                                if ($totalNotice > 0) {
                                    while ($row = mysqli_fetch_assoc($notices)) {
                                        $noticeId = $row['id'];
                                        echo '
                                            <tr class="border-b dark:border-gray-700">
                                                <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white  max-w-[10rem] truncate">' . $row['about'] . '</th>
                                                <td class="px-4 py-3">' . $row['time'] . ' ' . $row['date'] . '</td>

                                                <td class="px-4 py-3">' . $row['last_modified'] . '</td>
                                                <td class="px-4 py-3 flex items-center justify-end">
                                                    <button id="apple-imac-27-dropdown-button" data-dropdown-toggle="apple-imac-27-dropdown' . $row['id'] . '" class="inline-flex items-center text-sm font-medium hover:bg-gray-100 dark:hover:bg-gray-700 p-1.5 dark:hover-bg-gray-800 text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100" type="button">
                                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                        </svg>
                                                    </button>
                                                    <div id="apple-imac-27-dropdown' . $noticeId . '" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                                        <ul class="py-1 text-sm" aria-labelledby="apple-imac-27-dropdown-button">
                                                            <li>
                                                                <button type="button" data-modal-target="updateProductModal' . $noticeId . '" data-modal-toggle="updateProductModal' . $noticeId . '" class="flex w-full items-center py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-gray-700 dark:text-gray-200">
                                                                    <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" />
                                                                    </svg>
                                                                    Edit
                                                                </button>
                                                            </li>

                                                            <li>
                                                                <button type="button" data-modal-target="deleteModal' . $row['id'] . '" data-modal-toggle="deleteModal' . $row['id'] . '" class="flex w-full items-center py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 text-red-500 dark:hover:text-red-400">
                                                                    <svg class="w-4 h-4 mr-2" viewbox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd" fill="currentColor" d="M6.09922 0.300781C5.93212 0.30087 5.76835 0.347476 5.62625 0.435378C5.48414 0.523281 5.36931 0.649009 5.29462 0.798481L4.64302 2.10078H1.59922C1.36052 2.10078 1.13161 2.1956 0.962823 2.36439C0.79404 2.53317 0.699219 2.76209 0.699219 3.00078C0.699219 3.23948 0.79404 3.46839 0.962823 3.63718C1.13161 3.80596 1.36052 3.90078 1.59922 3.90078V12.9008C1.59922 13.3782 1.78886 13.836 2.12643 14.1736C2.46399 14.5111 2.92183 14.7008 3.39922 14.7008H10.5992C11.0766 14.7008 11.5344 14.5111 11.872 14.1736C12.2096 13.836 12.3992 13.3782 12.3992 12.9008V3.90078C12.6379 3.90078 12.8668 3.80596 13.0356 3.63718C13.2044 3.46839 13.2992 3.23948 13.2992 3.00078C13.2992 2.76209 13.2044 2.53317 13.0356 2.36439C12.8668 2.1956 12.6379 2.10078 12.3992 2.10078H9.35542L8.70382 0.798481C8.62913 0.649009 8.5143 0.523281 8.37219 0.435378C8.23009 0.347476 8.06631 0.30087 7.89922 0.300781H6.09922ZM4.29922 5.70078C4.29922 5.46209 4.39404 5.23317 4.56282 5.06439C4.73161 4.8956 4.96052 4.80078 5.19922 4.80078C5.43791 4.80078 5.66683 4.8956 5.83561 5.06439C6.0044 5.23317 6.09922 5.46209 6.09922 5.70078V11.1008C6.09922 11.3395 6.0044 11.5684 5.83561 11.7372C5.66683 11.906 5.43791 12.0008 5.19922 12.0008C4.96052 12.0008 4.73161 11.906 4.56282 11.7372C4.39404 11.5684 4.29922 11.3395 4.29922 11.1008V5.70078ZM8.79922 4.80078C8.56052 4.80078 8.33161 4.8956 8.16282 5.06439C7.99404 5.23317 7.89922 5.46209 7.89922 5.70078V11.1008C7.89922 11.3395 7.99404 11.5684 8.16282 11.7372C8.33161 11.906 8.56052 12.0008 8.79922 12.0008C9.03791 12.0008 9.26683 11.906 9.43561 11.7372C9.6044 11.5684 9.69922 11.3395 9.69922 11.1008V5.70078C9.69922 5.46209 9.6044 5.23317 9.43561 5.06439C9.26683 4.8956 9.03791 4.80078 8.79922 4.80078Z" />
                                                                    </svg>
                                                                    Delete
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
        $fetch_notice_data = "SELECT * FROM `school_notice` ORDER BY id DESC;";
        $notices = mysqli_query($connection, $fetch_notice_data);
        $totalNotice = mysqli_num_rows($notices);

        if ($totalNotice > 0) {
            while ($row = mysqli_fetch_assoc($notices)) {
                $noticeId = $row['id'];
                echo '

                        <div id="updateProductModal' . $noticeId . '" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-2xl max-h-full">
                                <!-- Modal content -->
                                
                                <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                    <!-- Modal header -->
                                    <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Update Notice</h3>
                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="updateProductModal' . $noticeId . '">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <form method="post" id="UpdateNotice' . $noticeId . '" enctype="multipart/form-data">
                                        <div class="grid gap-4 mb-4 sm:grid-cols-1">
                                        <div><label for="new_file" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">File (None will be previous)</label></div><br>
                                            <div class="flex items-center justify-center w-full">
                                               
                                            
                                                <input name="file-upload-modified' . $noticeId . '" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">

                                            </div>

                                            <div class="sm:col-span-2">
                                                <label for="subject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Subject</label>
                                                <input type="text" name="about_notice" id="name" value="' . $row['about'] . '" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Tomorrow our school will be closed">
                                                <input type="text" name="image_name" id="name" value="' . $row['image_url'] . '" class="hidden bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Tomorrow our school will be closed">
                                            </div>
                                            <input type="hidden" name="notice_id" value="' . $noticeId . '" />
                                            <div class="sm:col-span-2"><label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label><textarea name="notice_description" id="description" rows="5" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write a notice here...">' . $row['notice_description'] . '</textarea></div>
                                        </div>
                                        
                                        <div class="flex items-center space-x-4">
                                            <button name="update_notice" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update notice</button>
                                            
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Read modal -->

                        <!-- Delete modal -->
                        <div id="deleteModal' . $noticeId . '" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <!-- Modal content -->
                                <form method="post" id="deleteModal' . $noticeId . '">
                                <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                    <button type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="deleteModal' . $noticeId . '">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                    <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this item?</p>
                                    <div class="flex justify-center items-center space-x-4">
                                        <button data-modal-toggle="deleteModal' . $noticeId . '" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                                        <input type="hidden" name="notice_id" value="' . $noticeId . '" />
                                        <button  name="notice_delete" type="submit" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">Yes, I am sure</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                        
                       
                        
                        
                        
                        
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

        

    console.clear();

    </script>



</body>


</html>