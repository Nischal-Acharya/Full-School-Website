<?php
include 'connection/database.php';
session_start();

// Check if the user is not logged in
if (!isset($_SESSION["selectedAlbum"])) {
    header("Location: albums.php");
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION["selectedAlbum"]; ?> | Pashupati</title>
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

<div class="bg-white dark:bg-gray-800 h-full py-6 sm:py-8 lg:py-12">
    <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
        <div class="mb-4 flex items-center justify-between gap-8 sm:mb-8 md:mb-12">
            <div class="flex items-center gap-12">
                <h2 class="text-2xl font-bold text-gray-800 lg:text-3xl dark:text-white">
                    <?php echo $_SESSION["selectedAlbum"]; ?></h2>

                <p class="hidden max-w-screen-sm text-gray-500 dark:text-gray-300 md:block">
                    On this page, all the images from the <b><?php echo $_SESSION["selectedAlbum"]; ?> Album</b> are
                    displayed, <b>with the most recent
                        ones appearing first.</b>
                </p>
            </div>

            <a href="albums.php"
                class="inline-block rounded-lg border bg-white dark:bg-blue-700 dark:border-none px-4 py-2 text-center text-sm font-semibold text-blue-500 dark:text-blue-200 outline-none ring-indigo-300 transition duration-100 hover:bg-blue-100 focus-visible:ring active:bg-blue-200 md:px-8 md:py-3 md:text-base">
                Back
            </a>
        </div>
    </div>

</div>


<div class="mb-10 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 p-4">
    <?php
        $selectedAlbum = $_SESSION["selectedAlbum"];
        $fetch_all_photos = "SELECT * FROM `gallery_images` WHERE album = '$selectedAlbum'  ORDER BY id DESC;";
        $photos = mysqli_query($connection, $fetch_all_photos);
        $total12photos = mysqli_num_rows($photos);

        if ($total12photos > 0) {
            while ($photorow = mysqli_fetch_assoc($photos)) {
                $getphoto = $photorow['image_url'];
                echo'
                <div class="group cursor-pointer relative">
                <img src="'.$getphoto.'"
                    alt="Image 1"
                    class="w-full h-48 object-cover rounded-lg transition-transform transform scale-100 group-hover:scale-105" />
                <div
                    class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                    <button onclick="window.open(\'' . $getphoto . '\', \'_blank\', \'fullscreen=yes\');"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold rounded-full px-4 py-2 ">
                    View
                </button>

</div>
</div>
';
}
}
?>



</div>





<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
<?php include('includes/footer.php') ?>

</body>
<script>
console.clear();
</script>

</html>