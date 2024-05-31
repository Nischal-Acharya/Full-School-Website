<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Error - Page Not Found</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h1 {
            color: #ff6347;
        }
        p {
            line-height: 1.6;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        img {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }
        #timer {
            font-size: 24px;
            margin-top: 20px;
        }
    </style>
    <script>
        var count = 10;
        var timer = setInterval(function() {
            document.getElementById("timer").innerText = count;
            count--;
            if (count === 0) {
                clearInterval(timer);
                window.location.href = "index.php";
            }
        }, 1000); // Update every second
    </script>
</head>
<body>
    <div class="container">
        <h1>404 Error - Page Not Found</h1>
        <img src="assects/images/defaults/header_logo.png" alt="School Logo">
        <p>Oops! It seems like you've reached a page that doesn't exist on our school website.</p>
        <p>No worries! In a few moments, we'll guide you back to familiar ground.</p>
        <p>While you wait, why not learn more about our school? Click <a href="index.php">here</a> to explore!</p>
        <p>You will be redirected in <span id="timer">10</span> seconds...</p>
    </div>
</body>
</html>
