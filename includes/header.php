    <script src="https://cdn.tailwindcss.com"></script>
    <script>
function homepage() {
    window.location.replace('index.php');
}
    </script>
    <!-- unpkg -->
    <script src="https://unpkg.com/@barba/core"></script>

    <!-- jsdelivr -->
    <script src="https://cdn.jsdelivr.net/npm/@barba/core"></script>
    <header class="shadow-inherit text-gray-600 body-font sticky top-0 z-50 opacity-95"
        style="box-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1); background-image: url(assects/images/defaults/header_bg4.png); background-size:cover; background-repeat:no-repeat;">
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
            <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">

                <img onclick="homepage()" style="cursor: pointer;" fill="none" stroke="currentColor"
                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    class="w-80 h-22 bg-black-500 rounded-full" viewBox="0 0 24 24"
                    src="assects/images/defaults/header_logo.png">

                <!-- <span class="ml-3 text-xl">Pashupati Technical School</span> -->
            </a>
            <nav class="md:ml-auto flex flex-wrap items-center text-base md:font-bold justify-center">
                <a href="index.php" class="text-sm md:text-base mr-5 hover:text-gray-900">Home</a>
                <a href="aboutus.php" class="text-sm md:text-base mr-5 hover:text-gray-900">About</a>

                <a href="notice.php" class="text-sm md:text-base mr-5 hover:text-gray-900">Notices</a>
                <a href="extras.php" class="text-sm md:text-base mr-5 hover:text-gray-900">Extras</a>
                <a href="contactUs.php" class="text-sm md:text-base mr-5 hover:text-gray-900">Contact Us</a>
            </nav>
            <button onclick="joinus()"
                class="inline-flex items-center border-0 py-1 px-3 focus:outline-none rounded text-base mt-4 md:mt-0 text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Join
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                </svg>
            </button>
        </div>
    </header>