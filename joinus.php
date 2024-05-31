<?php
include 'connection/database.php';

try {

    $query = "SELECT * FROM web_content WHERE id = 5";
    $result = mysqli_query($connection, $query);


    if ($result) {

        $row = mysqli_fetch_assoc($result);
    } else {
        echo "Error executing the query: " . mysqli_error($connection);
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
} finally {

    mysqli_close($connection);
}






?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join Us</title>
    <script defer src="https://unpkg.com/alpinejs@3.2.3/dist/cdn.min.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="icon" type="image/x-icon" href="assects/images/logo2.png">
    <script>
        function conactUs() {
            window.location.href = "contactUs.php";
        }

        function showContent() {
            document.getElementsByClassName("hide_after_submission")[0].style.display = "block";
            document.getElementsByClassName("hide_after_submission")[1].style.display = "block";
            document.getElementsByClassName("thankyou_register")[0].style.display = "none";
        }
        console.clear();
    </script>

</head>

<body>
    <?php include ("includes/header.php") ?>

    <section class="text-gray-600 body-font" id="joinUsSection">
        <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
            <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
                <img class="object-cover object-center rounded" alt="hero" src="assects/images/joinus/joinus.png">
            </div>
            <div
                class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
                <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-blue-600">Join Us
                    <br class="hidden lg:inline-block">
                </h1>
                <p class="mb-8 leading-relaxed">
                    <?php echo $row['one']; ?>
                </p>
                <div id="admissionform" class="flex justify-center">
                    <a href="#admissionform" onclick="scrollToAdmissionForm()">
                        <button
                            class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Scroll
                            to Register Students</button>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <main>
        <section class="max-w-4xl p-6 mx-auto bg-indigo-600 rounded-md shadow-md dark:bg-gray-800 mt-0 mb-10">
            <h1 class="text-xl font-bold text-white capitalize dark:text-white">Admission Form</h1><br>
            <h1 class="hide_after_submission text-x text-white capitalize dark:text-white">Make sure to fill in your
                admission forms carefully. Check all the details, like your personal and academic information, to avoid
                mistakes. Your carefulness will help make your application process smooth. If you have any questions,
                feel free to ask the admissions office for help.</h1>


            <div style="display: none;" id="alert-additional-content-3"
                class="thankyou_register mt-4 p-4 mb-4 text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
                role="alert">
                <div class="flex items-center">
                    <svg class="flex-shrink-0 w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <h3 class="text-lg font-medium">Thank you for your registration</h3>
                </div>
                <div class="mt-2 mb-4 text-sm">

                    Our Pashupati administrator will contact you soon for the admission process. Kindly visit our school
                    at your earliest convenience. Feel free to reach out if you have any questions.
                </div>
                <div class="flex">
                    <button onclick="conactUs()" type="button"
                        class="text-white bg-green-800 hover:bg-green-900 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-xs px-3 py-1.5 me-2 text-center inline-flex items-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">

                        Contact Us
                    </button>
                    <button onclick="showContent()" type="button"
                        class="text-green-800 bg-transparent border border-green-800 hover:bg-green-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:hover:bg-green-600 dark:border-green-600 dark:text-green-400 dark:hover:text-white dark:focus:ring-green-800"
                        data-dismiss-target="#alert-additional-content-3" aria-label="Close">
                        Dismiss
                    </button>
                </div>
            </div>



            <form class="hide_after_submission" action="" method="POST" enctype="multipart/form-data">

                <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                    <div>
                        <label class="text-white dark:text-gray-200">Full Name <span
                                style="color: red;">*</span></label>
                        <input placeholder="Nitin Sharma" required name="full_name" type="text"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    </div>

                    <div>
                        <label class="text-white dark:text-gray-200">Address <span style="color: red;">*</span></label>
                        <input placeholder="Bahradashi 3 Jhapa" id="address" required name="address" type="text"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    </div>

                    <div>
                        <label class="text-white dark:text-gray-200">Gender <span style="color: red;">*</span></label>
                        <select name="gender"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">

                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Others">Others</option>

                        </select>
                    </div>
                    <div>
                        <label class="text-white dark:text-gray-200">Date of Birth (DOB) <span
                                style="color: red;">*</span></label>
                        <input required name="dob" id="date" type="date"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    </div>

                    <div>
                        <label class="text-white dark:text-gray-200">Father's name <span
                                style="color: red;">*</span></label>
                        <input placeholder="Hari Sharma" name="father_name" required type="text"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    </div>

                    <div>
                        <label class="text-white dark:text-gray-200">Mother's Name <span
                                style="color: red;">*</span></label>
                        <input placeholder="Sabitra Sharma" name="mother_name" required type="text"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    </div>

                    <div>
                        <label class="text-white dark:text-gray-200">Grade you want to admit <span
                                style="color: red;">*</span></label>
                        <select name="admit_to"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                            <option>Nursery</option>
                            <option>1 ( English Medium )</option>
                            <option>2 ( English Medium )</option>
                            <option>3 ( English Medium )</option>
                            <option>4 ( English Medium )</option>
                            <option>5 ( English Medium )</option>
                            <option>6 ( English Medium )</option>
                            <option>6 ( Nepali Medium) </option>
                            <option>7 ( English Medium )</option>
                            <option>7 ( Nepali Medium )</option>
                            <option>8 ( English Medium )</option>
                            <option>8 ( Nepali Medium )</option>
                            <option>9 ( Nepali Medium )</option>
                            <option>10 ( Nepali Medium )</option>
                            <option>9 to 12( Computer Engineering )</option>
                            <option>+2( Commerce )</option>
                            <option>+2( Computer Science )</option>
                        </select>
                    </div>

                    <div>
                        <label class="text-white dark:text-gray-200">Previous School</label>
                        <input placeholder="Saraswati Secondary School" name="previous_school" type="text"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    </div>
                    <div>
                        <label class="text-white dark:text-gray-200">Email</label>
                        <input placeholder="nitinxyz@gmail.com" id="email" name="email" type="text"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    </div>

                    <div>
                        <label class="text-white dark:text-gray-200">Phone No. <span
                                style="color: red;">*</span></label>
                        <input placeholder="9817000000" id="phone" required name="phone" type="text"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    </div>

                    <div>
                        <label class="text-white dark:text-gray-200">Write short intro about yourself <span
                                style="color: red;">*</span></label>
                        <textarea required rows="4" id="textarea" name="intro" type="textarea"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-white">
                            Passport Size Image <span style="color: red;">*</span>
                        </label>
                        <div
                            class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
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
                                        <input required type="file" accept="image/*" name="file-upload" id="file-upload" type="file"
                                            class="sr-only" onchange="displayFileName()">
                                    </label>
                                    <p id="file-info" class="pl-1 text-white">or drag and drop</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-start ml-5 mt-6">
                        <input required id="default-checkbox" type="checkbox" value=""
                            class="mt-1 w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-checkbox" class="text-white ml-5 dark:text-gray-200">Confrim, I have
                            rechecked
                            it.</label>
                    </div>
                    <div class="flex justify-end mt-6">

                        <button name="register_student"
                            class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-pink-500 rounded-md hover:bg-pink-700 focus:outline-none focus:bg-gray-600">Register</button>
                    </div>
            </form>
        </section>


    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <?php include ("includes/footer.php") ?>
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

<?php 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $fileUploadName = $_FILES['file-upload']['name'];
    $fileUploadTmp = $_FILES['file-upload']['tmp_name'];


    $targetDirectory = 'assects/images/Registered_Students/';
    $targetFilePath = "assects/images/Registered_Students/" . basename($fileUploadName);
    $sqlfileurl = "";

    if (move_uploaded_file($fileUploadTmp, $targetFilePath)) {

        $sqlfileurl = "../assects/images/Registered_Students/" . basename($fileUploadName);
    }

    if ($connectionobj->connect_error) {
        die("Connectionobj failed: " . $connectionobj->connect_error);
    }

    date_default_timezone_set('Asia/Kathmandu');
    $currentDate = date("d/m/Y");
    $currentTime = date("h:i A");

    // Retrieve the details from the form
    $full_name = $_POST['full_name'];
    $address = $_POST['address'];
    $gender = $_POST["gender"];
    $dob = $_POST["dob"];
    $father_name = $_POST["father_name"];
    $mother_name = $_POST["mother_name"];
    $admit_to = $_POST["admit_to"];
    $previous_school = $_POST["previous_school"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $intro = $_POST["intro"];

    $registered_on = $currentDate . " " . $currentTime;

    // Insert data into the admission_form table
    $sql = "INSERT INTO `admission_form` (`full_name`, `address`, `gender`, `dob`, `father_name`, `mother_name`, `admit_to`, `previous_school`, `email`, `phone`, `intro`, `registered_on`, `image_url`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $connectionobj->prepare($sql);

    $stmt->bind_param("sssssssssssss", $full_name, $address, $gender, $dob, $father_name, $mother_name, $admit_to, $previous_school, $email, $phone, $intro, $registered_on, $sqlfileurl);

    if ($stmt->execute()) {
        mysqli_query($connectionobj, "UPDATE `notification` SET total_notification = total_notification + 1 WHERE id = 1");
        echo '
            <script>
            document.getElementsByClassName("hide_after_submission")[0].style.display = "none";
                    document.getElementsByClassName("hide_after_submission")[1].style.display = "none";
                    document.getElementsByClassName("thankyou_register")[0].style.display = "block";
            </script>
        ';
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();

}

?>
</html>