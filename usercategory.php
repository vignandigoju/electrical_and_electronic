<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electrical Maintenance</title>
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
            /* background-image: url('light.jpg'); */
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
<?php $activePage= basename($_SERVER['PHP_SELF'],".php");?>

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
     
    <?php
// Database connection
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'maintanence';

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to select all images from the table
$sql = "SELECT * FROM category";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $counter = 0; // Counter to track the number of items
    echo '<div class="container">';
    while ($row = $result->fetch_assoc()) {
        if ($counter % 3 == 0) {
            // Start a new row every 3 items
            echo '<div class="container1">';
        }

        $image = $row['image'];
        $servicename = $row['servicename'];

        echo '<div class="ac">';
        // echo '<a href="equipment.php?equipment='.$servicename.'">';
        echo '<div class="imagecon1"><img src="./images/'.$image.'" alt="Image" style="height: 272px; width: 244px;"></div>';
        echo '<center>';
        echo '<section id="facade">';
        echo '<div class="acblock">';
        echo '<h5>'.$servicename.'</h5>';
        echo '</div>';
        echo '</section>';
        echo '</center>';
        echo '</a>';
        echo '</div>';

        $counter++;

        if ($counter % 3 == 0) {
            // End the row after 3 items
            echo '</div>';
        }
    }

    if ($counter % 3 != 0) {
        // If the last row doesn't contain 3 items, close it
        echo '</div>';
    }

    echo '</div>'; // Close the main container
} else {
    echo 'No images found in the table.';
}

$conn->close();
?>

   

</body>
</html>
