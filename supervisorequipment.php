<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AC Equipment</title>
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

        .search-bar {
            margin-top: 20px;
            margin-bottom: 20px;
            text-align: center;
        }

        #search {
            padding: 12px;
            width: 50%;
            box-sizing: border-box;
            border: 2px solid #3F3064;
            border-radius: 30px;
            margin-bottom: 10px;
            font-size: 16px;
            transition: border-color 0.3s;
            outline: none;
        }

        #search:focus {
            border-color: #FFD700;
        }

        #search::placeholder {
            color: #aaa;
        }

        #search-btn {
            background-color: #3F3064;
            color: #fff;
            border: none;
            padding: 12px 30px;
            border-radius: 30px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        #search-btn:hover {
            background-color: #2D224D;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px; /* Adjusted padding */
        }

        .items-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 20px;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.7);
            border-radius: 10px;
        }

        .box {
            padding: 10px;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            text-align: center;
            position: relative;
        }

        .box:hover {
            transform: translateY(-5px);
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
        }

        .box img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid #3F3064;
            transition: transform 0.3s;
        }

        .box:hover img {
            transform: scale(1.1);
        }

        .box h5 {
            margin-top: 10px;
            font-size: 14px;
            color: #3F3064;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <header>
        <h2>ElecDhiwise</h2>
        <nav>
            <ul>
            <li><a href="supervisorhome.php">Home</a></li>
            <li><a href="supervisordashboard.php">Category</a></li>
            <li><a href="viewissue.php">View Issue</a></li>
            <li><a href="choose.php">Assign Issue</a></li>
            <li><a href="mainstatus.php">Work Status</a></li>
            <li><a href="workerprofile.php">My Profile</a></li>
            <li><a href="mainlogin.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <div class="search-bar">
        <form action="" method="GET">
            <input type="hidden" name="equipment" value="<?php echo isset($_GET['equipment']) ? htmlspecialchars($_GET['equipment']) : ''; ?>">
            <input type="text" id="search" name="search" placeholder="Search...">
            <button type="submit" id="search-btn">Search</button>
        </form>
    </div>

    <div class="container">
        <div class="items-container">
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
    </div>
    
</body>

</html>
