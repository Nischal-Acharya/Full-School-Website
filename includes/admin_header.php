<script src="https://cdn.tailwindcss.com"></script>
<script>

    function logoutpashupatisession(){
        window.location.replace('logoutpashupatisession.php');
    }

    function indexme(){
        window.location.replace('index.php');
    }

</script>
    <header class="shadow-inherit text-gray-600 body-font sticky top-0 z-50" style="box-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1); background-image: url(../assects/images/defaults/header_bg4.png); background-size:cover; background-repeat:no-repeat;">
      <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
        <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">

          <img onclick="indexme()" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-80 h-22 bg-black-500 rounded-full" viewBox="0 0 24 24" src="../assects/images/defaults/admin_header_logo.png" style="cursor: pointer;">

          <!-- <span class="ml-3 text-xl">Pashupati Technical School</span> -->
        </a>
        <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center"></nav>
        <button onclick="logoutpashupatisession()" class="inline-flex items-center border-0 py-1 px-3 focus:outline-none rounded text-base mt-4 md:mt-0 text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Logout <?php echo $_SESSION["usr_nam"]; ?>
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
            <path d="M5 12h14M12 5l7 7-7 7"></path>
          </svg>
        </button>
      </div>
    </header>
    