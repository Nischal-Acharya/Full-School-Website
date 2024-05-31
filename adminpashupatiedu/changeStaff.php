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

    if (isset($_POST['add_committe'])) {

       
        $IDImage = 'file-upload-modified';
        $fileUploadName = $_FILES[$IDImage]['name'];
        $fileUploadTmp = $_FILES[$IDImage]['tmp_name'];

        $targetDirectory = '../assects/images/pta/';
        $targetFilePath = "../assects/images/pta/" . basename($fileUploadName);
        $sqlfileurl = "";

        if (move_uploaded_file($fileUploadTmp, $targetFilePath)) {

            $sqlfileurl = "assects/images/pta/" . basename($fileUploadName);
        }



        if ($connectionobj->connect_error) {
            die("Connection failed: " . $connectionobj->connect_error);
        }

        // Retrieve the description from the textarea
        $committeName = $_POST['committeName'];
        $committePosition = $_POST['committePosition'];
        $committePhone = $_POST["staffContact"];


        // Insert data into the school_notice table
        $sql = "INSERT INTO management_committee (name, position, contact_no, image_src) VALUES (?, ?, ?, ?)";

        $stmt = $connectionobj->prepare($sql);


        $stmt->bind_param("ssss", $committeName, $committePosition, $committePhone, $sqlfileurl);

        if ($stmt->execute()) {
            echo '
            <script>
            alert("New committe has been added sucessfully")
            //window.location.replace("changeStaff.php");
            
            </script>';
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $connectionobj->close();
    }
    if (isset($_POST['add_staff'])) {

       
        $IDImage = 'file-upload-modified';
        $fileUploadName = $_FILES[$IDImage]['name'];
        $fileUploadTmp = $_FILES[$IDImage]['tmp_name'];

        $targetDirectory = '../assects/images/staff/';
        $targetFilePath = "../assects/images/staff/" . basename($fileUploadName);
        $sqlfileurl = "";

        if (move_uploaded_file($fileUploadTmp, $targetFilePath)) {

            $sqlfileurl = "assects/images/staff/" . basename($fileUploadName);
        }



        if ($connectionobj->connect_error) {
            die("Connection failed: " . $connectionobj->connect_error);
        }

        // Retrieve the description from the textarea
        $staffName = $_POST['staffName'];
        $staffPost = $_POST['staffPost'];
        $staffQualification = $_POST['staffQualification'];
        $staffPhone = $_POST["staffContact"];


        // Insert data into the school_notice table
        $sql = "INSERT INTO staffs (name, post, contact, qualification, image_src) VALUES (?, ?, ?, ?, ?)";

        $stmt = $connectionobj->prepare($sql);


        $stmt->bind_param("sssss", $staffName, $staffPost, $staffPhone, $staffQualification, $sqlfileurl);

        if ($stmt->execute()) {
            echo '
            <script>
            alert("New Staff has been added sucessfully")
            //window.location.replace("changeStaff.php");
            
            </script>';
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $connectionobj->close();
    }

    if (isset($_POST['committe_delete'])) {
        $committeId = $_POST['comitteDelete_id'];
        mysqli_query($connection, "DELETE FROM `management_committee` WHERE id = $committeId;");
        echo '
            <script>
            window.location.replace("changeStaff.php");            
            </script>';
        exit;
    }
    if (isset($_POST['staffDelete'])) {
        $staffId = $_POST['staffDelete_id'];
        mysqli_query($connection, "DELETE FROM `staffs` WHERE id = $staffId;");
        echo '
            <script>
            window.location.replace("changeStaff.php");            
            </script>';
        exit;
    }

    if (isset($_POST['update_committe'])) {
        $committeId = $_POST['committeId'];
        $IDImage = 'file-upload-modified' . $committeId;
        $fileUploadName = $_FILES[$IDImage]['name'];
        $fileUploadTmp = $_FILES[$IDImage]['tmp_name'];


        $targetDirectory = '../assects/images/pta/';
        $targetFilePath = "../assects/images/pta/" . basename($fileUploadName);
        $sqlfileurl = $_POST['imageLocationcommitte'];

        if (move_uploaded_file($fileUploadTmp, $targetFilePath)) {

            $sqlfileurl = "assects/images/pta/" . basename($fileUploadName);
        }



        if ($connectionobj->connect_error) {
            die("Connection failed: " . $connectionobj->connect_error);
        }

        // Retrieve the description from the textarea

        $committeName = $_POST['comitteName'];
        $committePost = $_POST['comittepost'];
        $committePhone = $_POST["comittePhone"];



        // Insert data into the school_notice table
        $sql = "UPDATE management_committee SET name=?, position=?, contact_no=?, image_src=? WHERE id=?";

        $stmt = $connectionobj->prepare($sql);


        $stmt->bind_param("sssss", $committeName, $committePost, $committePhone, $sqlfileurl, $committeId);

        if ($stmt->execute()) {
            echo '
            <script>
            alert("Committe has been updated sucessfully")
            window.location.replace("changeStaff.php");
            
            </script>';
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $connectionobj->close();
    }


    if (isset($_POST['update_staffs'])) {
        $staffId = $_POST['staffId'];
        $IDImage = 'file-upload-modified' . $staffId;
        $fileUploadName = $_FILES[$IDImage]['name'];
        $fileUploadTmp = $_FILES[$IDImage]['tmp_name'];


        $targetDirectory = '../assects/images/staff/';
        $targetFilePath = "../assects/images/staff/" . basename($fileUploadName);
        $sqlfileurl = $_POST['imageLocation'];

        if (move_uploaded_file($fileUploadTmp, $targetFilePath)) {

            $sqlfileurl = "assects/images/staff/" . basename($fileUploadName);
        }



        if ($connectionobj->connect_error) {
            die("Connection failed: " . $connectionobj->connect_error);
        }

        // Retrieve the description from the textarea

        $staffName = $_POST['staffName'];
        $staffPost = $_POST['staffPost'];
        $staffPhone = $_POST["staffPhone"];
        $staffqualification = $_POST["staffqualification"];



        // Insert data into the school_notice table
        $sql = "UPDATE staffs SET name=?, post=?, qualification=?, contact=?, image_src=? WHERE id=?";

        $stmt = $connectionobj->prepare($sql);


        $stmt->bind_param("ssssss", $staffName, $staffPost, $staffqualification, $staffPhone, $sqlfileurl, $staffId);

        if ($stmt->execute()) {
            echo '
            <script>
            alert("Staff has been updated sucessfully")
            //window.location.replace("changeStaff.php");
            
            </script>';
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $connectionobj->close();
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
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-blue-600">Update Committe and Staffs
                </h1>
                <p class="text-sm md:text-base lg:w-2/3 mx-auto leading-relaxed text-base">
                    🎉 Welcome to this page dedicated to managing and updating staff and committee details! 📝 It
                    provides a user-friendly interface for making necessary changes to personnel information and
                    committee structures. Your input is valuable in ensuring that the records remain accurate and
                    relevant. Please feel free to utilize the available features to keep everything up-to-date. 🚀
                </p>
            </div>

            <button data-modal-target="authentication-modal2" data-modal-toggle="authentication-modal2"
                class="mt-10 block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
                Add Committe Member
            </button>
        </div>
    </section>


    <!-- Modal toggle -->


    <!-- Adding Staff -->
    <div id="authentication-modal" tabindex="-1" aria-hidden="true"
        class="fadeIn hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Add Staffs
                    </h3>
                    <button type="button"
                        class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="authentication-modal">
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
                    <form class="space-y-4" action="" method="POST" enctype="multipart/form-data">
                        <div><label for="new_file"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Passport Size image for better preview</label></div>
                        <div class="flex items-center justify-center w-full">


                            <input name="file-upload-modified"
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                id="file_input" type="file" accept="image/*">

                        </div>
                        <div>
                            <label for="staffName"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                            <input type="text" name="staffName"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Thir Kumar Dahal" required>
                            <label for="staffPost"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Post</label>
                            <input type="text" name="staffPost"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Teacher" required>
                            <label for="staffContact"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone no.</label>
                            <input type="text" name="staffContact"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="9804545454" required>
                            <label for="staffqualification"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Qualification</label>
                            <input type="text" name="staffQualification"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="PHD" required>
                        </div>


                        <button type="submit" name="add_staff"
                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add
                            Staff</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Adding Committe Menber -->

    <div id="authentication-modal2" tabindex="-1" aria-hidden="true"
        class="fadeIn hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Add Committe Member
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
                    <form class="space-y-4" action="" method="POST" enctype="multipart/form-data">
                        <div><label for="new_file"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Passport Size image for better preview</label></div>
                        <div class="flex items-center justify-center w-full">


                            <input name="file-upload-modified"
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                id="file_input" type="file" accept="image/*">

                        </div>
                        <div>
                            <label for="committeName"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                            <input type="text" name="committeName"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Thir Kumar Dahal" required>
                            <label for="staffPost"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Post</label>
                            <input type="text" name="committePosition"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Teacher" required>
                            <label for="committeContact"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone no.</label>
                            <input type="text" name="staffContact"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="9804545454" required>
                           
                        </div>


                        <button type="submit" name="add_committe"
                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add
                            Committe</button>

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
                        <div class="w-full md:w-1/2">
                            <form class="flex items-center">
                                <label for="simple-search" class="sr-only">Search</label>
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <h2><b>Management Committee</b></h2>
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
                                    <th scope="col" class="px-4 py-3">committee</th>
                                    <th scope="col" class="px-4 py-3">Position</th>
                                    <th scope="col" class="px-4 py-4">Phone</th>
                                    <th scope="col" class="px-4 py-3">
                                        <span class="sr-only">Actions</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php


                                $fetchmanagementCommitte = "SELECT * FROM `management_committee`;";
                                $managementCommitte = mysqli_query($connection, $fetchmanagementCommitte);
                                $totalmanagementCommitte = mysqli_num_rows($managementCommitte);

                                if ($totalmanagementCommitte > 0) {
                                    while ($row = mysqli_fetch_assoc($managementCommitte)) {
                                        $managementcommitteId = $row['id'];
                                        echo '
                                            <tr class="border-b dark:border-gray-700">
                                                <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    <div class="flex items-center mr-3">
                                                        <img src="../' . $row['image_src'] . '" alt="" class="h-8 w-auto mr-3" onerror="this.src=`' . $defaultavatar . '`">
                                                        ' . $row['name'] . '
                                                    </div>
                                                </th>
                                                <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white  max-w-[10rem] truncate">' . $row['position'] . '</th>
                                                <td class="px-4 py-3">' . $row['contact_no'] . '</td>

                                                
                                                <td class="px-4 py-3 flex items-center justify-end">
                                                    <button id="apple-imac-27-dropdown-button" data-dropdown-toggle="apple-imac-27-dropdowncommitte' . $row['id'] . '" class="inline-flex items-center text-sm font-medium hover:bg-gray-100 dark:hover:bg-gray-700 p-1.5 dark:hover-bg-gray-800 text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100" type="button">
                                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                        </svg>
                                                    </button>
                                                    <div id="apple-imac-27-dropdowncommitte' . $managementcommitteId . '" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                                        <ul class="py-1 text-sm" aria-labelledby="apple-imac-27-dropdown-button">
                                                            <li>
                                                                <button type="button" data-modal-target="updateProductModal' . $managementcommitteId . '" data-modal-toggle="updateProductModal' . $managementcommitteId . '" class="flex w-full items-center py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-gray-700 dark:text-gray-200">
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
        $fetchmanagementCommitte = "SELECT * FROM `management_committee`;";
        $managementCommitte = mysqli_query($connection, $fetchmanagementCommitte);
        $totalmanagementCommitte = mysqli_num_rows($managementCommitte);

        if ($totalmanagementCommitte > 0) {
            while ($row = mysqli_fetch_assoc($managementCommitte)) {
                $managementcommitteId = $row['id'];
                echo '

                        <div id="updateProductModal' . $managementcommitteId . '" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-2xl max-h-full">
                                <!-- Modal content -->
                                
                                <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                    <!-- Modal header -->
                                    <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Update Committe</h3>
                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="updateProductModal' . $managementcommitteId . '">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <form method="post" id="UpdateNotice' . $managementcommitteId . '" enctype="multipart/form-data">
                                        <div class="grid gap-4 mb-4 sm:grid-cols-1">
                                        <div><label for="new_file" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">File (None will be previous)</label></div><br>
                                            <div class="flex items-center justify-center w-full">
                                               
                                            
                                                <input name="file-upload-modified' . $managementcommitteId . '" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file" accept="image/*">

                                            </div>

                                            <div class="sm:col-span-2">
                                                <label for="subject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                                <input type="text" name="comitteName" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="' . $row['name'] . '" placeholder="Bisswass Niroula">
                                                <label for="post" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Post</label>
                                                <input type="text" name="comittepost" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="' . $row['position'] . '" placeholder="Member">
                                                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone No.</label>
                                                <input type="text" name="comittePhone" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="' . $row['contact_no'] . '" placeholder="9812000000">
                                                
                                                </div>
                                                <input type="text" name="imageLocationcommitte" id="name" class="hidden bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="' . $row['image_src'] . '" placeholder="9812000000">
                                            <input type="hidden" name="committeId" value="' . $managementcommitteId . '" />
                                            
                                        </div>
                                        
                                        <div class="flex items-center space-x-4">
                                            <button name="update_committe" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update committe</button>
                                            
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Read modal -->

                        <!-- Delete modal -->
                        <div id="deleteModal' . $managementcommitteId . '" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <!-- Modal content -->
                                <form method="post" id="deleteModal' . $managementcommitteId . '">
                                <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                    <button type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="deleteModal' . $managementcommitteId . '">
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
                                        <button data-modal-toggle="deleteModal' . $managementcommitteId . '" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                                        <input type="hidden" name="comitteDelete_id" value="' . $managementcommitteId . '" />
                                        <button  name="committe_delete" type="submit" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">Yes, I am sure</button>
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




    <section class="text-gray-600 body-font">
        <div class="container px-5 py-10 mx-auto">

            <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                class="mt-10 block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
                Add Staffs
            </button>


        </div>
    </section>

    <main>
        <!-- Start block -->
        <section class="bg-gray-50 dark:bg-gray-900 p-3 mt-5 sm:p-5 antialiased">
            <div class="mx-auto max-w-screen-xl px-0 lg:px-12">
                <!-- Start coding here -->
                <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                    <div
                        class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                        <div class="w-full md:w-1/2">
                            <form class="flex items-center">
                                <label for="simple-search" class="sr-only">Search</label>
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <h2><b>School Staffs</b></h2>
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
                                    <th scope="col" class="px-4 py-3">Staffs</th>
                                    <th scope="col" class="px-4 py-3">Post</th>
                                    <th scope="col" class="px-4 py-4">Phone</th>
                                    <th scope="col" class="px-4 py-4">Qualification</th>
                                    <th scope="col" class="px-4 py-3">
                                        <span class="sr-only">Actions</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php


                                $fetchmanagementCommitte = "SELECT * FROM `staffs`;";
                                $managementCommitte = mysqli_query($connection, $fetchmanagementCommitte);
                                $totalmanagementCommitte = mysqli_num_rows($managementCommitte);

                                if ($totalmanagementCommitte > 0) {
                                    while ($row = mysqli_fetch_assoc($managementCommitte)) {
                                        $staffsId = $row['id'];
                                        echo '
                                            <tr class="border-b dark:border-gray-700">
                                                <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    <div class="flex items-center mr-3">
                                                        <img src="../' . $row['image_src'] . '" alt="" class="h-8 w-auto mr-3" onerror="this.src=`' . $defaultavatar . '`">
                                                        ' . $row['name'] . '
                                                    </div>
                                                </th>
                                                <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white  max-w-[10rem] truncate">' . $row['post'] . '</th>
                                                <td class="px-4 py-3">' . $row['contact'] . '</td>
                                                <td class="px-4 py-3">' . $row['qualification'] . '</td>


                                                
                                                <td class="px-4 py-3 flex items-center justify-end">
                                                    <button id="apple-imac-27-dropdown-button" data-dropdown-toggle="apple-imac-27-dropdown' . $row['id'] . '" class="inline-flex items-center text-sm font-medium hover:bg-gray-100 dark:hover:bg-gray-700 p-1.5 dark:hover-bg-gray-800 text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100" type="button">
                                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                        </svg>
                                                    </button>
                                                    <div id="apple-imac-27-dropdown' . $staffsId . '" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                                        <ul class="py-1 text-sm" aria-labelledby="apple-imac-27-dropdown-button">
                                                            <li>
                                                                <button type="button" data-modal-target="updatestaffsModel' . $staffsId . '" data-modal-toggle="updatestaffsModel' . $staffsId . '" class="flex w-full items-center py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-gray-700 dark:text-gray-200">
                                                                    <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" />
                                                                    </svg>
                                                                    Edit
                                                                </button>
                                                            </li>

                                                            <li>
                                                                <button type="button" data-modal-target="deleteStaffModel' . $row['id'] . '" data-modal-toggle="deleteStaffModel' . $row['id'] . '" class="flex w-full items-center py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 text-red-500 dark:hover:text-red-400">
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
        $fetchmanagementCommitte = "SELECT * FROM `staffs`;";
        $managementCommitte = mysqli_query($connection, $fetchmanagementCommitte);
        $totalmanagementCommitte = mysqli_num_rows($managementCommitte);

        if ($totalmanagementCommitte > 0) {
            while ($row = mysqli_fetch_assoc($managementCommitte)) {
                $staffsId = $row['id'];
                echo '

                        <div id="updatestaffsModel' . $staffsId . '" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-2xl max-h-full">
                                <!-- Modal content -->
                                
                                <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                    <!-- Modal header -->
                                    <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Update Staff</h3>
                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="updatestaffsModel' . $staffsId . '">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <form method="post" id="UpdateNotice' . $staffsId . '" enctype="multipart/form-data">
                                        <div class="grid gap-4 mb-4 sm:grid-cols-1">
                                        <div><label for="new_file" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">File (None will be previous)</label></div><br>
                                            <div class="flex items-center justify-center w-full">
                                               
                                            
                                                <input name="file-upload-modified' . $staffsId . '" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file" accept="image/*">

                                            </div>

                                            <div class="sm:col-span-2">
                                                <label for="subject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                                <input type="text" name="staffName" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="' . $row['name'] . '" placeholder="Bisswass Niroula">
                                                <label for="post" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Post</label>
                                                <input type="text" name="staffPost" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="' . $row['post'] . '" placeholder="Teacher">
                                                <label for="post" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Oualification</label>
                                                <input type="text" name="staffqualification" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="' . $row['qualification'] . '" placeholder="PHD  ">
                                                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone No.</label>
                                                <input type="text" name="staffPhone" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="' . $row['contact'] . '" placeholder="9812000000">

                                                <input type="text" name="imageLocation" id="name" class="hidden bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="' . $row['image_src'] . '" placeholder="9812000000">
                                                
                                                </div>
                                            <input type="hidden" name="staffId" value="' . $staffsId . '" />
                                            
                                        </div>
                                        
                                        <div class="flex items-center space-x-4">
                                            <button name="update_staffs" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update staff</button>
                                            
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Read modal -->

                        <!-- Delete modal -->
                        <div id="deleteStaffModel' . $staffsId . '" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <!-- Modal content -->
                                <form method="post" id="deleteStaffModel' . $staffsId . '">
                                <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                    <button type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="deleteStaffModel' . $staffsId . '">
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
                                        <button data-modal-toggle="deleteStaffModel' . $staffsId . '" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                                        <input type="hidden" name="staffDelete_id" value="' . $staffsId . '" />
                                        <button  name="staffDelete" type="submit" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">Yes, I am sure</button>
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