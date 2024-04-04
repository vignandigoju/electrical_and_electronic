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
            background-color: #f0f0f0;
            color: #333;
        }

        header {
            background-color: #3F3064;
            color: white;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        h2 {
            margin: 0;
        }

        nav {
            background-color: #3F3064;
            color: white;
            padding: 10px;
            text-align: center;
            border-bottom: 2px solid #ffffff;
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: flex-end;
        }

        ul a {
            text-decoration: none;
            color: #ffffff;
            font-size: 16px;
            padding: 10px 20px;
            transition: all 0.3s;
            font-weight: bold;
        }

        ul a:hover {
            background-color: #2D224D;
            color: #ffffff;
        }

        ul a.active::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: white;
            z-index: -1;
            border-radius: 8px;
        }

        .container {    margin-left: 20em;
            display: flex;
            flex-wrap: wrap;
            justify-content: normal;
            gap: 10px; /* Adjusted the gap between items in a row */
            padding: 20px 50px; /* Added more space to the left and right of the container */
            margin-top: 20px;
            /* background-color: #f0f0f0; */
            border-radius: 20px;
            /* box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); */
        }

        .service {
            text-decoration: none; /* Removed underline from the anchor tag */
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            text-align: center;
            width: calc(33.33% - 20px); /* Adjusted width to fit three services per row */
            display: flex;
            flex-direction: row;
            align-items: center;
            border-radius: 20px;
            position: relative;
        }

        .service:hover {
            transform: translateY(-10px);
            box-shadow: 0 0 40px rgba(0, 0, 0, 0.2);
        }

        .service img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid #3F3064; /* Theme color border */
            padding: 5px; /* Added padding to create space between the image and the border */
            transition: transform 0.3s;
        }

        .service:hover img {
            transform: scale(1.1); /* Scale up the image on hover */
        }

        .service .details {
            flex: 1;
            margin: 0 20px;
            text-align: left;
        }

        .service .details h5 {
            margin: 0;
            font-size: 16px;
            color: #3F3064;
        }

        .service .details .arrow {
            font-size: 24px;
            color: #3F3064;
            cursor: pointer;
        }
    </style>
</head>
<body>
<?php $activePage= basename($_SERVER['PHP_SELF'],".php");?>

<header>
    <h2>ElecDhiwise</h2>
    <nav>
        <ul>
        <li><a href="managerhome.php">Home</a></li>
        <li><a href="appdashboard.php">Category</a></li>
            <li><a href="addcategory.php">Add Category</a></li>
            <li><a href="staff.php">Add Employee</a></li>
            <li><a href="addequipment.php">Add Equipment</a></li>
            <li><a href="empdetails.php">Employee Details</a></li>
            <li><a href="equipmentdetail.php">Equipment Details</a></li>
            <li><a href="profile.php">My Profile</a></li>
            <li><a href="mainlogin.php">Logout</a></li>
            </ul>
    </nav>
</header>
<br><br>

<div class="container">
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
        while ($row = $result->fetch_assoc()) {
            $image = $row['image'];
            $servicename = $row['servicename'];

            echo '<a href="equipment.php?equipment=' . $servicename . '&image=./images/' . $image . '" class="service">';

            echo '<img src="./images/'.$image.'" alt="Image">';
            echo '<div class="details">';
            echo '<h5>'.$servicename.'</h5>';
            echo '</div>';
            echo '<div class="arrow">&#8594;</div>'; // Right arrow icon
            echo '</a>';
        }
    } else {
        echo 'No services found in the table.';
    }

    $conn->close();
    ?>
</div>

</body>
</html>
