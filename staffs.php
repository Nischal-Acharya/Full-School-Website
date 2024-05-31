<?php
include 'connection/database.php';
$defaultavatar = "assects/images/defaults/defaultaltimage.jpg"
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staffs</title>
    <script defer src="https://unpkg.com/alpinejs@3.2.3/dist/cdn.min.js"></script>
    <link rel="icon" type="image/x-icon" href="assects/images/logo2.png">


</head>

<body>
    <?php include("includes/header.php") ?>

    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-6">
            <div class="mx-auto mb-8 max-w-screen-sm lg:mb-16">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Management Committee</h2>
                <p class="font-light text-gray-500 sm:text-xl dark:text-gray-400">The Management Committee typically consists of key decision-makers, administrators, and individuals responsible for the overall governance and strategic direction of the school.</p>
            </div>

            <div class="grid gap-8 lg:gap-16 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">

                <?php


                $management_committee = "SELECT * FROM `management_committee`;";
                $management_committee_members = mysqli_query($connection, $management_committee);
                $total_management_committee_members = mysqli_num_rows($management_committee_members);


                if ($total_management_committee_members > 0) {
                    while ($row = mysqli_fetch_assoc($management_committee_members)) {
                        echo '
                    <div class="text-center text-gray-500 dark:text-gray-400">
                        <img class="mx-auto mb-4 w-36 h-36 rounded-full" src="' . $row['image_src'] . '" onerror="this.src=`' . $defaultavatar . '`">
                            <h3 class="mb-1 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                <a>' . $row['name'] . '</a>
                            </h3>
                            <p>' . $row['position'] . '</p>
                            <p>' . $row['contact_no'] . '</p>
                    </div>
                    
            ';
                    }
                }

                ?>

            </div>
        </div>
    </section>
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-6">
            <div class="mx-auto mb-8 max-w-screen-sm lg:mb-16">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">School Staff</h2>
                <p class="font-light text-gray-500 sm:text-xl dark:text-gray-400">The School Staff includes faculty, administrators, and other employees responsible for day-to-day operations, teaching, and student support. It's crucial to ensure effective communication and collaboration between the Management Committee and the School Staff to implement decisions and achieve the college's objectives.</p>
            </div>

            <div class="grid gap-8 lg:gap-16 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">

                <?php


                $staffs = "SELECT * FROM `staffs`;";
                $staffs_members = mysqli_query($connection, $staffs);
                $total_staffs = mysqli_num_rows($staffs_members);


                if ($total_staffs > 0) {
                    while ($row_staff = mysqli_fetch_assoc($staffs_members)) {
                        echo '
                                <div class="text-center text-gray-500 dark:text-gray-400">
                                    <img class="mx-auto mb-4 w-36 h-36 rounded-full" src="' . $row_staff['image_src'] . '" onerror="this.src=`' . $defaultavatar . '`">
                                        <h3 class="mb-1 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                            <a>' . $row_staff['name'] . '</a>
                                        </h3>
                                        <p>' . $row_staff['post'] . ' ' . $row_staff['qualification'] . '</p>
                                        <p>' . $row_staff['contact'] . '</p>
                                </div>
                                
                                    ';
                    }
                }

                ?>

            </div>
        </div>
    </section>


    <?php include("includes/footer.php") ?>
</body>
<script>console.clear();</script>
</html>