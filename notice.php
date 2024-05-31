<?php
include 'connection/database.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notices</title>
    <script defer src="https://unpkg.com/alpinejs@3.2.3/dist/cdn.min.js"></script>
    <link rel="icon" type="image/x-icon" href="assects/images/logo2.png">

</head>

<body>
    <?php include("includes/header.php") ?>

    <div id="alert-border-3" class="flex items-center p-4 m-4 mt-5 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800 closewarn" role="alert">
        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <div class="ms-3 text-sm font-medium">
            Most recent notices will be shown first !
        </div>
        <button onclick="closedialouge()" type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-border-3" aria-label="Close">
            <span class="sr-only">Dismiss</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>



    <?php


    $fetch_notice_data = "SELECT * FROM `school_notice` ORDER BY id DESC;";
    $notices = mysqli_query($connection, $fetch_notice_data);
    $totalNotice = mysqli_num_rows($notices);

    if ($totalNotice > 0) {
        while ($row = mysqli_fetch_assoc($notices)) {
            echo '
            
                    <div class="grid grid-cols-1 gap-6 my-6 px-4 md:px-6 lg:px-8">
                        <div class="max-w-xl mx-auto px-4 py-4 bg-white shadow-md rounded-lg">
                            <div class="py-2 flex flex-row items-center justify-between">
                                <div class="flex flex-row items-center">
                                    <a class="flex flex-row items-center focus:outline-none focus:shadow-outline rounded-lg">
                                        <img class="rounded-full h-8 w-8 object-cover" src="' . $row['logo'] . '" alt="">
                                        <p class="ml-2 text-base font-medium text-sm md:text-base">' . $row['posted_by'] . '</p>
                                    </a>
                                </div>
                                <div class="flex flex-row items-center">
                                    <p class="text-xs font-semibold text-gray-500">' . $row['time'] . '&#160;&#160;' . $row['date'] . '</p>
                                </div>
                            </div>
                            <div class="mt-2">
                                <img class="object-cover w-full rounded-lg" src="' . $row['image_url'] . '" alt="">
                                <div class="py-2 flex flex-row items-center">
                                <!--<button class="flex flex-row items-center focus:outline-none focus:shadow-outline rounded-lg">
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-5 h-5">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" />
                                            <path d="M16 3v4" />
                                            <path d="M8 3v4" />
                                            <path d="M4 11h16" />
                                            <path d="M11 15h1" />
                                            <path d="M12 15v3" />
                                        </svg>
                                        <span class="ml-1"></span>
                                    </button>-->
                                    <button onclick="view(\'' . $row['image_url'] . '\', ' . $row['id'] . ')" class="flex flex-row items-center focus:outline-none focus:shadow-outline rounded-lg ml-3">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-5 h-5">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                            </svg>
                            <span class="ml-1">' . $row['total_views'] . '</span>
                        </button>
                        
                        <button onclick="download(\'' . $row['image_url'] . '\', ' . $row['id'] . ')" class="flex flex-row items-center focus:outline-none focus:shadow-outline rounded-lg ml-3">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-5 h-5">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
                                <path d="M7 11l5 5l5 -5" />
                                <path d="M12 4l0 12" />
                            </svg>
                            <span class="ml-1">' . $row['total_downloads'] . '</span>
                        </button>
                                </div>
                            </div>
                            <div class="py-2">
                            <p class="mb-2 text-base font-medium text-sm md:text-base">Subject: '.$row['about'].'</p>

                                <p class="text-justify leading-snug text-base text-sm md:text-base">' . $row['notice_description'] . '</p>
                            </div>
                        </div>

                    </div>
            
                    <script>
                    function view(imageUrl, noticeId) {
                        window.open(imageUrl, "_blank");
                        updateStats("view", noticeId);
                    }

                    function download(imageUrl, noticeId) {
                        var element = document.createElement("a");
                        element.setAttribute("href", imageUrl);
                        element.setAttribute("download", "Notice_Pashupati' . $row['id'] . '");
                        element.style.display = "none";
                        document.body.appendChild(element);
                        element.click();
                        document.body.removeChild(element);
                        updateStats("download", noticeId);
                    }

                    function updateStats(action, noticeId) {
                        fetch(window.location.href, {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/x-www-form-urlencoded"
                            },
                            body: "action=" + action + "&notice_id=" + noticeId
                        });
                    }
                </script>
            ';
        }
    }

    ?>

    <?php include("includes/footer.php") ?>
</body>
<script>
    function closedialouge() {
        document.getElementsByClassName('closewarn')[0].style.display = 'none';
    }
    console.clear();
</script>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action']) && isset($_POST['notice_id'])) {
        $action = $_POST['action'];
        $notice_id = $_POST['notice_id'];

       
        if ($action == 'view') {
            mysqli_query($connection, "UPDATE `school_notice` SET total_views = total_views + 1 WHERE id = $notice_id");
        } elseif ($action == 'download') {
            mysqli_query($connection, "UPDATE `school_notice` SET total_downloads = total_downloads + 1 WHERE id = $notice_id");
        }
        exit;
    }
}
?>
</html>