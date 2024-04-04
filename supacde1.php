<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipment Details</title>

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

        .container {
            display: flex;
            flex-direction: column;
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .details-container {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .details {
            flex: 1 1 45%;
    margin-bottom: 20px;
        }

        .details img {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            font-size: 14px;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #3F3064;
            color: white;
        }

        .assign-container {
            text-align: center;
        }

        .assign-button {
            background-color: #3F3064;
            color: white;
            border: none;
            padding: 15px 30px;
            font-size: 18px;
            cursor: pointer;
            border-radius: 8px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .assign-button:hover {
            background-color: #2D224D;
        }
        .details img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .details h1 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #3F3064;
        }

        .details div {
            margin-bottom: 10px;
            font-size: 16px;
            color: #666;
        }

        .details div strong {
            color: #3F3064;
            display: inline-block;
            width: 100px;
        }

        .job-history {
            margin-top: 20px;
            padding: 10px;
            border-radius: 8px;
            background-color: #f9f9f9;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .job-history h2 {
            font-size: 20px;
            margin-bottom: 10px;
            color: #3F3064;
        }

        .job-history table {
            width: 100%;
            border-collapse: collapse;
        }

        .job-history th,
        .job-history td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
            font-size: 14px;
            color: #333;
        }

        .job-history th {
            background-color: #3F3064;
            color: #fff;
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

    <div class="container">
        <div class="details-container">
            <div class="details">
                <?php
                $conn = mysqli_connect("localhost", "root", "", "maintanence");

                if (isset($_GET['eidd'])) {
                    $eidd = $_GET['eidd'];
                    $selectedEquipment = $_GET['name'];
                    $sql = "SELECT eq.name, eq.brand, eq.price, eq.installation, eq.warranty, eq.warrantyend, loc.room, loc.building
            FROM eqdetails eq
            LEFT JOIN location loc ON eq.eid = loc.eidd
            WHERE eq.eid = '$eidd' AND eq.name='$selectedEquipment'";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        $row = mysqli_fetch_assoc($result);
                        $name = $row['name'];
                        $brand = $row['brand'];
                        $price = $row['price'];
                        $installation = $row['installation'];
                        $warranty = $row['warranty'];
                        $warrantyend = $row['warrantyend'];
                        $room = $row['room']; // Fetching room details from the joined table
                        $building = $row['building']; 

                        echo '<h1>Equipment Details</h1>';
                        echo '<div><strong>Name:</strong> ' . $name . '</div>';
                        echo '<div><strong>ID:</strong> ' . $eidd . '</div>';
                        echo '<div><strong>Brand:</strong> ' . $brand . '</div>';
                        echo '<div><strong>Price:</strong> <span style="color: #3F3064;">$' . $price . '</span></div>';
                        echo '<div><strong>Purchase Date:</strong> ' . $installation . '</div>';
                        echo '<div><strong>Warranty:</strong> ' . $warranty . '</div>';
                        echo '<div><strong>Warranty End:</strong> ' . $warrantyend . '</div>';
                        echo '<div><strong>Location:</strong> Building: ' . $building . ', Room: ' . $room . '</div>';
                    }
                }
                ?>
            </div>
            <div class="details">
            <?php
                 $imagePath = isset($_GET['image']) ? htmlspecialchars($_GET['image']) : '';
                 echo '<img src="' . $imagePath . '" alt="Equipment Image">';
                
                        // echo '<img src="defaultimage.png" alt="Default Image">';
                        
                ?>
            </div>
        </div>
       

        <div class="assign-container">
            <form action="choose.php" method="get">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="hidden" name="eidd" value="<?php echo $eidd; ?>">
                <input type="hidden" name="selectedEquipment" value="<?php echo $selectedEquipment; ?>">
                <input type="submit" class="assign-button" value="Assign">
            </form>
        </div>

    </div>
    

</body>

</html>
