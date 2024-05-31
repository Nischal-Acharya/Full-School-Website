<?php
session_start();
include 'connection/database.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Routines | Pashupati</title>
    <script defer src="https://unpkg.com/alpinejs@3.2.3/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="css/utilities.css">
    <link rel="icon" type="image/x-icon" href="assects/images/logo2.png">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/animation.css">
    <link rel="icon" type="image/x-icon" href="assects/images/logo2.png">

    <style>

    </style>
</head>
<?php include('includes/header.php') ?>


<section class="text-gray-600 body-font">
    <div class="container px-5 py-10 mx-auto">
        <div class="flex flex-col text-center w-full mb-20">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-blue-600">Class Routines</h1>
            <p class="text-sm md:text-base lg:w-2/3 mx-auto leading-relaxed text-base">Here, you'll find everything you need to know about our class schedules and routines. We've made it super easy for students, parents, and staff to stay in the loop with all the happenings at our school. So kick back, relax, and explore what we've got going on! 😊📚🎒
            </p>
        </div>
    </div>   
</section>



<section class="mb-10 text-gray-600 body-font">
    <div class="container px-5 py-0 mx-auto">
        <div class="flex flex-wrap -m-4">

            <?php
$defaultroutineerror = "assects/images/Routines/RoutineError.png";
$fetch_all_album = "SELECT * FROM `schoolRoutine` ORDER BY id DESC;";
$albums = mysqli_query($connection, $fetch_all_album);
$totalAlbums = mysqli_num_rows($albums);

if ($totalAlbums > 0) {
    while ($row = mysqli_fetch_assoc($albums)) {
        $class = $row["class"];
        $routine = $row["routine_url"];

        echo '
        <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
            <a class="block relative h-48 rounded overflow-hidden">
                <img alt="Routine Not Found" class="object-cover object-center w-full h-full block" src="' . $routine . '" onerror="this.src=\'' . $defaultroutineerror . '\'">
            </a>
            <div class="mt-4">
                <form method="post" id="album' . $class. '">
                    <h2 class="text-gray-900 title-font text-lg font-medium">' . $class . '</h2>
                    <input type="hidden" name="albumname" value="' . $class . '" />';
                    if ($row["routine_url"] != "") {
                        echo '<button onclick="window.open(\'' . $routine . '\', \'_blank\', \'fullscreen=yes\');" class="mt-1 focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">See Routine</button>';
                    }
                    echo '
                </form>
            </div>
        </div>';
    }
}
?>


        </div>
    </div>
</section>


<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
<?php include('includes/footer.php') ?>

</body>
<script>
console.clear();
</script>

</html>