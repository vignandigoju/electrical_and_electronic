<?php
session_start();
$user = $_SESSION["username"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Location</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        header {
            background-color: #1c0d3f;
            color: white;
            padding: 10px;
            text-align: center;
        }
        header h2{
            margin-top: 10px;
            margin-bottom: 10px;
        }
        nav {
            background-color: white;
            color: white;
            padding: 1px;
            text-align: center;
        }

        ul {
            list-style: none;
            padding: 0;
        }
        
        ul a {
            color: black;
        }

        li {
            display: inline;
            margin-right: 20px;
            color: white;
            font-size: 13px;
        }

        a {
            text-decoration: none;
            color: #1c0d3f
        }

        main {
            padding: 20px;
        }

        section {
            width: 80%;
            margin-top: 30px;
            padding: 1px; /* Decreased padding */
            
            background-color: white;
        }

        section h2 {
            text-align: center;
            font-size: 1.2em; /* Decreased font size */
            margin: 10px 0; /* Adjusted margin */
        }

        .container1 {
            display: flex;
            margin-top: 25px;
            justify-content: space-around;
            align-items: center;
            gap: 20px;
            margin-bottom: 20px;
            
        }

        h4 {
            margin-top: 0;
            color: #1c0d3f;
        }

        .imagecon1 {
            background-image: url('light.jpg');
            background-size: cover;
            background-position: center;
            height: 200px;
        }

        .imagefan {
            background-image: url('fanimage.png');
            background-size: cover;
            background-position: center;
            height: 200px;
        }

        .ac {
            height: 272px;
    width: 244px;
            background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1)
        }

        .fan {
            height: 272px;
    width: 244px;
            background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1)
        }

        .imagelight {
            background-image: url('images/light.jpg');
            background-size: cover;
            background-position: center;
            height: 200px;
        }

        .light {
            height: 272px;
    width: 244px;
            background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1)
        }

        .imagegenerator {
            background-image: url('gen.png');
            background-size: cover;
            background-position: center;
            height: 200px;
        }

        .generator {
            height: 272px;
    width: 244px;
            background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1)
        }

        .imagesocket {
            background-image: url('images/soucet.jpg');
            background-size: cover;
            background-position: center;
            height: 200px;
        }
        
        .socket {
            height: 272px;
    width: 244px;
            background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1)
        }
        
        /* Add this CSS for the box hover effect */
.ac:hover {
    transform: scale(1.1);
}

.fan:hover {
    transform: scale(1.1);
}

.generator:hover {
    transform: scale(1.1);
}

.light:hover {
    transform: scale(1.1);
}

.socket:hover {
    transform: scale(1.1);
}


/* navigation */

nav ul li:hover {
    background-color: #e0ba5c; /* Background color on hover */
    color: #1c0d3f; /* Text color on hover */
    transition: background-color 0.3s ease, color 0.3s ease; /* Smooth transition for both background and text color */
}
nav ul li.active {
    background-color: #e0ba5c; /* Background color on hover */
    color: #1c0d3f; /* Text color on hover */
    transition: background-color 0.3s ease, color 0.3s ease; /* Smooth transition for both background and text color */
}

/* Add this CSS for the box effect on the list items */
nav ul li {
    display: inline-block;
    margin-right: 20px;
    padding: 10px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease; /* Smooth transition for the box effect */
}


nav ul li:hover {
    transform: scale(1.1);
}
/* navigation end */

    </style>
    </head>
<body style="background-image: url('images/aa.jpg');     background-size: cover; ">
<header style="background: rgb(18,14,96);
    background: linear-gradient(90deg, rgb(183 94 14) 0%, rgb(214 174 90) 50%, rgb(231 194 93) 100%);">
        <h2>ElecDhiwise</h2>
    </header>

<nav>
    <ul>
        <li><a href="userhome.php">Home</a></li>
        <li><a href="usercategory.php">Category</a></li>
        <li><a href="issue.php">Rise Issue</a></li>
        <li><a href="userissue.php">View Issue</a></li>
        <li><a href="homepage.php">Logout</a></li>
    </ul>
</nav>
<br><br>
<!-- <div id="header-image-menu"> -->
        <!-- <img src="images/slider.jpg"> -->
        <h2 id="image-text">
        "Welcome to our premier electrical service,<br> where expertise meets excellence for all your power needs."
        </h2>
    <!-- </div> -->



    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
        function showPopup(message) {
            alert(message);
        }
    </script>
<style>
       
#image-text{
    position: absolute;
    top: 47%;
    left: 13%;
    font-family: 'Roboto';
    color: #fff;
    transform: translate(-30%, -30%);
    text-align: center;
}
</style>

</body>
</html>
