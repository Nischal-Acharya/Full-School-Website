<?php
include 'connection/database.php';

try {

    $query = "SELECT * FROM web_content WHERE id = 2";
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
    <title>About Us</title>
    <script defer src="https://unpkg.com/alpinejs@3.2.3/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="css/utilities.css">
    <link rel="icon" type="image/x-icon" href="assects/images/logo2.png">

</head>

<body>
    <?php include('includes/header.php') ?>
    <main>



        <section class="text-gray-600 body-font">
            <div class="container mx-auto flex px-5 py-5 md:flex-row flex-col items-center">
                <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                    <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-blue-600">Introduction
                        <br class="hidden lg:inline-block">
                    </h1>
                    <p class="text-justify text-sm md:text-base mb-8 leading-relaxed">
                        <?php echo $row['one'];?></p>
                    <div class="flex justify-center">
                        <button onclick="contactbtn()" class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Contact Us</button>
                        <button onclick="joinbtn()" class="ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">Join Us</button>
                    </div>
                </div>
                <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
                    <img class="object-cover object-center rounded" alt="hero" src="assects/images/joinus/joinus.png">
                </div>
            </div>
        </section>

        <section class="text-gray-600 body-font">
            <div class="container px-5 py-5 mx-auto flex flex-col">
                <div class="lg:w-4/6 mx-auto">
                    <!-- <div class="rounded-lg h-64 overflow-hidden">
                        <img alt="content" class="object-cover object-center h-full w-full" src="assects/images/schoolImages/mainschool.jpg">
                    </div> -->
                    <div class="flex flex-col sm:flex-row mt-10">
                        <div class="sm:w-1/3 text-center sm:pr-8 sm:py-8">
                            <div class="w-20 h-20 rounded-full inline-flex items-center justify-center bg-gray-200 text-gray-400">

                                <img src="assects/images/staff/thirKumarDahal.jpg" alt="" srcset="">

                            </div>
                            <div class="flex flex-col items-center text-center justify-center">
                                <h2 class="font-medium title-font mt-4 text-gray-900 text-lg">Mr. Thir Kumar Dahal</h2>
                                <div class="w-12 h-1 bg-indigo-500 rounded mt-2 mb-4"></div>
                                <p class="text-base">Message From Principal</p>
                                <p class="text-base">Phone no: 9844640316</p>
                            </div>
                        </div>
                        <div class="sm:w-2/3 sm:pl-8 sm:py-8 sm:border-l border-gray-200 sm:border-t-0 border-t mt-4 pt-4 sm:mt-0 text-center sm:text-left">
                            <p class="text-justify text-sm md:text-base leading-relaxed text-lg mb-4">
                            <?php echo $row['two'];?></p>
                            <a href="staffs.php" class="cursor-pointer text-indigo-500 inline-flex items-center">Navigate to Management Committee
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="text-gray-600 body-font">
            <div class="container px-5 py-5 mx-auto">
                <div class="text-center mb-10">
                    <h1 class="sm:text-3xl text-2xl font-medium text-center title-font text-blue-600 mb-4">Rules and regulations</h1>
                    <p class="text-justify text-sm md:text-base text-base leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto">
                    <?php echo $row['three'];?></p>
                </div>
                <div class="flex flex-wrap lg:w-4/5 sm:mx-auto sm:mb-2 -mx-2">
                    <div class="p-2 sm:w-1/2 w-full">
                        <div class="bg-gray-100 rounded flex p-4 h-full items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="text-indigo-500 w-6 h-6 flex-shrink-0 mr-4" viewBox="0 0 24 24">
                                <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                                <path d="M22 4L12 14.01l-3-3"></path>
                            </svg>
                            <span class="text-sm md:text-base title-font font-medium"><?php echo $row['four'];?></span>
                        </div>
                    </div>
                    <div class="p-2 sm:w-1/2 w-full">
                        <div class="bg-gray-100 rounded flex p-4 h-full items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="text-indigo-500 w-6 h-6 flex-shrink-0 mr-4" viewBox="0 0 24 24">
                                <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                                <path d="M22 4L12 14.01l-3-3"></path>
                            </svg>
                            <span class="text-sm md:text-base title-font font-medium"><?php echo $row['five'];?></span>
                        </div>
                    </div>
                    <div class="p-2 sm:w-1/2 w-full">
                        <div class="bg-gray-100 rounded flex p-4 h-full items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="text-indigo-500 w-6 h-6 flex-shrink-0 mr-4" viewBox="0 0 24 24">
                                <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                                <path d="M22 4L12 14.01l-3-3"></path>
                            </svg>
                            <span class="text-sm md:text-base title-font font-medium"><?php echo $row['six'];?></span>
                        </div>
                    </div>
                    <div class="p-2 sm:w-1/2 w-full">
                        <div class="bg-gray-100 rounded flex p-4 h-full items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="text-indigo-500 w-6 h-6 flex-shrink-0 mr-4" viewBox="0 0 24 24">
                                <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                                <path d="M22 4L12 14.01l-3-3"></path>
                            </svg>
                            <span class="text-sm md:text-base title-font font-medium"><?php echo $row['seven'];?></span>
                        </div>
                    </div>
                    <div class="p-2 sm:w-1/2 w-full">
                        <div class="bg-gray-100 rounded flex p-4 h-full items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="text-indigo-500 w-6 h-6 flex-shrink-0 mr-4" viewBox="0 0 24 24">
                                <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                                <path d="M22 4L12 14.01l-3-3"></path>
                            </svg>
                            <span class="text-sm md:text-base title-font font-medium"><?php echo $row['eight'];?></span>
                        </div>
                    </div>
                    <div class="p-2 sm:w-1/2 w-full">
                        <div class="bg-gray-100 rounded flex p-4 h-full items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="text-indigo-500 w-6 h-6 flex-shrink-0 mr-4" viewBox="0 0 24 24">
                                <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                                <path d="M22 4L12 14.01l-3-3"></path>
                            </svg>
                            <span class="text-sm md:text-base title-font font-medium"><?php echo $row['nine'];?></span>
                        </div>
                    </div>
                    <div class="p-2 sm:w-1/2 w-full">
                        <div class="bg-gray-100 rounded flex p-4 h-full items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="text-indigo-500 w-6 h-6 flex-shrink-0 mr-4" viewBox="0 0 24 24">
                                <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                                <path d="M22 4L12 14.01l-3-3"></path>
                            </svg>
                            <span class="text-sm md:text-base title-font font-medium"><?php echo $row['ten'];?></span>
                        </div>
                    </div>
                    <div class="p-2 sm:w-1/2 w-full">
                        <div class="bg-gray-100 rounded flex p-4 h-full items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="text-indigo-500 w-6 h-6 flex-shrink-0 mr-4" viewBox="0 0 24 24">
                                <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                                <path d="M22 4L12 14.01l-3-3"></path>
                            </svg>
                            <span class="text-sm md:text-base title-font font-medium"><?php echo $row['eleven'];?></span>
                        </div>
                    </div>
                    <div class="p-2 sm:w-1/2 w-full">
                        <div class="bg-gray-100 rounded flex p-4 h-full items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="text-indigo-500 w-6 h-6 flex-shrink-0 mr-4" viewBox="0 0 24 24">
                                <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                                <path d="M22 4L12 14.01l-3-3"></path>
                            </svg>
                            <span class="text-sm md:text-base title-font font-medium"><?php echo $row['twelve'];?></span>
                        </div>
                    </div>
                    <div class="p-2 sm:w-1/2 w-full">
                        <div class="bg-gray-100 rounded flex p-4 h-full items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="text-indigo-500 w-6 h-6 flex-shrink-0 mr-4" viewBox="0 0 24 24">
                                <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                                <path d="M22 4L12 14.01l-3-3"></path>
                            </svg>
                            <span class="text-sm md:text-base title-font font-medium"><?php echo $row['thirteen'];?></span>
                        </div>
                    </div>
                </div>
                <!-- <button class="flex mx-auto mt-16 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Button</button> -->
            </div>
        </section>

        <section id="courses" class="text-gray-600 body-font">
            <div class="container px-5 py-24 mx-auto">
                <div class="text-center mb-10">
                    <h1 class="sm:text-3xl text-2xl font-medium text-center title-font text-blue-600 mb-4">Our Courses</h1>
                    <p class="text-justify text-sm md:text-base text-base leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto">
                    <?php echo $row['fourteen'];?></p>
                </div>
                <div class="flex flex-wrap -mx-4 -mb-10 text-center">
                    <div class="sm:w-1/2 mb-10 px-4">
                        <div class="rounded-lg h-64 overflow-hidden">
                            <img alt="content" class="object-cover object-center h-full w-full" src="assects/images/courses/computerengineering.jpg">
                        </div>
                        <h2 class="title-font text-2xl font-medium text-gray-900 mt-6 mb-3">Computer Engineering (9-12)</h2>
                        <p class="text-justify text-sm md:text-base leading-relaxed text-base">
                        <?php echo $row['fifteen'];?></p>
                        <button onclick="joinbtn()" class="flex mx-auto mt-6 text-white bg-indigo-500 border-0 py-2 px-5 focus:outline-none hover:bg-indigo-600 rounded">Join Computer Engineering</button>
                    </div>
                    <div class="sm:w-1/2 mb-10 px-4">
                        <div class="rounded-lg h-64 overflow-hidden">
                            <img alt="content" class="object-cover object-center h-full w-full" src="assects/images/courses/computerscience.jpg">
                        </div>
                        <h2 class="title-font text-2xl font-medium text-gray-900 mt-6 mb-3">Management (+2 Computer Science)</h2>
                        <p class="text-justify text-sm md:text-base leading-relaxed text-base">
                        <?php echo $row['sixteen'];?></p>
                        <button onclick="joinbtn()" class="flex mx-auto mt-6 text-white bg-indigo-500 border-0 py-2 px-5 focus:outline-none hover:bg-indigo-600 rounded">Join Computer Science</button>
                    </div>
                </div>
            </div>
        </section>



        <section class="text-gray-600 body-font">
            <div class="container px-5 py-24 mx-auto">
                <div class="flex flex-wrap w-full mb-20">
                    <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
                        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Our Facilities</h1>
                        <div class="h-1 w-20 bg-indigo-500 rounded"></div>
                    </div>
                    <p class="text-justify text-sm md:text-base lg:w-1/2 w-full leading-relaxed text-gray-500">
                    <?php echo $row['seventeen'];?></p>
                </div>
                <div class="flex flex-wrap -m-4">
                    <div class="xl:w-1/4 md:w-1/2 p-4">
                        <div class="bg-gray-100 p-6 rounded-lg">
                            <img class="h-40 rounded w-full object-cover object-center mb-6" src="assects/images/facilities/physics_lab.jpg" alt="content">
                            <h3 class="tracking-widest text-indigo-500 text-xs font-medium title-font"></h3>
                            <h2 class="text-lg text-gray-900 font-medium title-font mb-4">Physics Lab</h2>
                            <p class="text-sm md:text-base leading-relaxed text-base"><?php echo $row['eighteen'];?></p>
                        </div>
                    </div>
                    <div class="xl:w-1/4 md:w-1/2 p-4">
                        <div class="bg-gray-100 p-6 rounded-lg">
                            <img class="h-40 rounded w-full object-cover object-center mb-6" src="assects/images/facilities/computer_lab.jpg" alt="content">
                            <h3 class="tracking-widest text-indigo-500 text-xs font-medium title-font"></h3>
                            <h2 class="text-lg text-gray-900 font-medium title-font mb-4">Computer Lab</h2>
                            <p class="text-sm md:text-base leading-relaxed text-base"><?php echo $row['ninteen'];?></p>
                        </div>
                    </div>
                    <div class="xl:w-1/4 md:w-1/2 p-4">
                        <div class="bg-gray-100 p-6 rounded-lg">
                            <img class="h-40 rounded w-full object-cover object-center mb-6" src="assects/images/facilities/network_lab.jpg" alt="content">
                            <h3 class="tracking-widest text-indigo-500 text-xs font-medium title-font"></h3>
                            <h2 class="text-lg text-gray-900 font-medium title-font mb-4">Electronics and Network Lab</h2>
                            <p class="text-sm md:text-base leading-relaxed text-base"><?php echo $row['twenty'];?></p>
                        </div>
                    </div>
                    <div class="xl:w-1/4 md:w-1/2 p-4">
                        <div class="bg-gray-100 p-6 rounded-lg">
                            <img class="h-40 rounded w-full object-cover object-center mb-6" src="assects/images/facilities/library_lab.jpg" alt="content">
                            <h3 class="tracking-widest text-indigo-500 text-xs font-medium title-font"></h3>
                            <h2 class="text-lg text-gray-900 font-medium title-font mb-4">Library</h2>
                            <p class="text-sm md:text-base leading-relaxed text-base"><?php echo $row['twentyone'];?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>


    <?php include('includes/footer.php') ?>

</body>
<script>
    function joinbtn() {
        window.location.href = "joinus.php";
    }

    function contactbtn() {
        window.location.href = "contactUs.php";
    }
    console.clear();
</script>

</html>