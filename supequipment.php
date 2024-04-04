<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AC Equipment</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            font-size: 13px;
        }

        header {
            background-color: #1c0d3f;
            color: white;
            padding: 1px;
            text-align: center;
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

        .box {
    background-color: white;
    border-radius: 29px;
    width: 235px;
    height: 194px;
    border: 1px solid #00000078;
    margin: 35px;
    padding: 19px;
    float: left;
    box-shadow: 4px 6px #888888;
}

        .box img {
            max-width: 100%;
            max-height: 80px; /* Adjust the height as needed */
            display: block;
            margin: 0 auto;
        }

        .box a {
            text-decoration: none;
            color: inherit;
        }

        .search-bar {
            margin-bottom: 20px;
            text-align: center;
        }

        #search {
    padding: 12px;
    width: 29%;
    box-sizing: border-box;
    border: 1px solid #ddd;
    border-radius: 36px;
    margin-bottom: 10px;
    font-size: 13px;
}
        .container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px; /* Adjust the gap as needed */
            padding: 20px;
        }
        nav ul li:hover {
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
.box:hover {
    transform: scale(1.1);
}

    </style>
</head>

<body style="background-image: url('images/aa.jpg');     background-size: cover; ">
<header style="background: rgb(18,14,96);
    background: linear-gradient(90deg, rgb(183 94 14) 0%, rgb(214 174 90) 50%, rgb(231 194 93) 100%);">
        <h2>ElecDhiwise</h2>
    </header>

    <nav>
        <ul>
        <li><a href="supervisorhome.php">Home</a></li>
            <li class="<?= ($activePage == 'supervisordashboard') ? 'active': ''; ?>"><a href="supervisordashboard.php">Category</a></li>
            <li class="<?= ($activePage == 'viewissue') ? 'active': ''; ?>"><a href="viewissue.php">View Issue</a></li>
            <li class="<?= ($activePage == 'choose') ? 'active': ''; ?>"><a href="choose.php">Assign Issue</a></li>
            <li class="<?= ($activePage == 'mainstatus') ? 'active': ''; ?>"><a href="addequipment.php">Work Status</a></li>
            <!-- <li class="<?= ($activePage == 'viewissue') ? 'active': ''; ?>"><a href="viewissue.php">View Issue</a></li> -->
            <!-- <li class="<?= ($activePage == 'mainstatus') ? 'active': ''; ?>"><a href="mainstatus.php">Work Status</a></li> -->
            <li class="<?= ($activePage == 'supempdetails') ? 'active': ''; ?>"><a href="supempdetails.php">Employee Details</a></li>
            <!-- <li class="<?= ($activePage == 'choose') ? 'active': ''; ?>"><a href="choose.php">Assign Issue</a></li> -->
            <!-- <li class="<?= ($activePage == 'Rating') ? 'active': ''; ?>"><a href="Rating.php">Rating</a></li> -->
            <li class="<?= ($activePage == 'workerprofile') ? 'active': ''; ?>"><a href="workerprofile.php">My Profile</a></li>
            <li class="<?= ($activePage == 'mainlogin') ? 'active': ''; ?>"><a href="mainlogin.php">Logout</a></li>
           
        </ul>
    </nav>
    <br></br>
    <div class="search-bar">
    <form action="" method="GET">
    <input type="hidden" name="equipment" value="<?php echo isset($_GET['equipment']) ? htmlspecialchars($_GET['equipment']) : ''; ?>">
    <input type="text" id="search" name="search" placeholder="Search...">
</form>

    </div>
    <section id="complaint" class="ab">
    <div class="container"> 
        <?php
        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'maintanence';

        $conn = mysqli_connect($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        if (isset($_GET['equipment'])) {
            // Store the selected equipment in session
           
            // Get the image URL if it's set in the session
            $imageUrl = isset($_GET['image']) ? htmlspecialchars($_GET['image']) : '';

            // Your database query code goes here
            $selectedEquipment = isset($_GET['equipment']) ? mysqli_real_escape_string($conn, $_GET['equipment']) : '';
            $searchTerm = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';
            if (!empty($selectedEquipment)) {
                $sql = "SELECT * FROM location WHERE 
                    equipment = '$selectedEquipment' AND 
                    (building LIKE '%$searchTerm%' OR room LIKE '%$searchTerm%' OR eidd LIKE '%$searchTerm%')";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Loop through the database results
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="box">';
                        echo '<a href="supacde1.php?eidd=' . htmlspecialchars($row['eidd']) . '&name=' . htmlspecialchars($row['equipment']) . '&image=' . urlencode($imageUrl) . '">';

                        // Display the equipment image
                        echo '<img src="' . htmlspecialchars($imageUrl) . '" alt="Equipment Image">';

                        echo '<h5>Equipment Id: ' . htmlspecialchars($row['eidd']) . '</h5>'; // Display Equipment ID
                        echo '</a>';
                        echo '</div>';
                    }
                }
            } else {
                echo "0 results";
            }
        }
        $conn->close();
        ?>
        </div>
    </section>
</body>

</html>
