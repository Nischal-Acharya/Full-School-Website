<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calender | Pashupati</title>
    <script defer src="https://unpkg.com/alpinejs@3.2.3/dist/cdn.min.js"></script>
    <link rel="icon" type="image/x-icon" href="assects/images/logo2.png">
    <style>
        input{
            border-radius: 20px;
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <?php include("includes/header.php") ?>

    <section class="text-gray-600 body-font">
        <div class="container px-5 py-10 mx-auto">
            <div class="flex flex-col text-center w-full mb-20">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-blue-600">Nepali Calender</h1>
                <p class="text-sm md:text-base lg:w-2/3 mx-auto leading-relaxed text-base">Dear students, 📅 Please find attached the Nepali calendar for your reference regarding traditional festivals. It is advisable to consult official notices for accurate information on holidays and time off. 📌
                </p>
            </div>
        </div>   
    </section>
    <div class="mt-5 mb-0 mx-5">


        <script type="text/javascript">
     
        var nc_width = 'responsive';
        var nc_height = 650;
        var nc_api_id = "8201z2n475"; //
   
        </script>
        <script type="text/javascript" src="https://www.ashesh.com.np/nepali-calendar/js/ncf.js?v=5"></script>


    </div>



    <div class="content-center mx-5 mb-10" style="display: flex; justify-content: center;">
        <script type="text/javascript">
        <!--
        var nc_ev_width = 'responsive';
        var nc_ev_height = 303;
        var nc_ev_def_lan = 'np';
        var nc_ev_api_id = 39320240322897; //
        -->
        </script>
        <script type="text/javascript" src="https://www.ashesh.com.np/calendar-event/ev.js"></script>
        
    </div>


    <?php include("includes/footer.php") ?>
</body>
<script>
console.clear();
</script>

</html>