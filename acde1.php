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
            background-color: #f5f5f5;
            color: #3F3064;
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
            position: relative;
            font-weight: bold;
        }

        ul a:hover {
            background-color: #2D224D; /* Updated hover background color */
            color: #ffffff;
        }

        ul a.active::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #ffffff; /* Updated active link background color */
            z-index: -1;
            border-radius: 8px;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .details-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: flex-start;
        }

        .details {
            flex: 1 1 45%;
            margin-bottom: 20px;
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
                <li><a href="appdashboard.php" class="<?= ($activePage == 'appdashboard.php') ? 'active' : '' ?>">Category</a></li>
                <li><a href="addcategory.php" class="<?= ($activePage == 'addcategory.php') ? 'active' : '' ?>">Add Category</a></li>
                <li><a href="staff.php" class="<?= ($activePage == 'staff.php') ? 'active' : '' ?>">Add Employee</a></li>
                <li><a href="addequipment.php" class="<?= ($activePage == 'addequipment.php') ? 'active' : '' ?>">Add Equipment</a></li>
                <li><a href="empdetails.php" class="<?= ($activePage == 'empdetails.php') ? 'active' : '' ?>">Employee Details</a></li>
                <li><a href="profile.php" class="<?= ($activePage == 'profile.php') ? 'active' : '' ?>">My Profile</a></li>
                <li><a href="mainlogin.php" class="<?= ($activePage == 'mainlogin.php') ? 'active' : '' ?>">Logout</a></li>
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
                    $sql = "SELECT name, brand, price, installation, warranty, warrantyend, location FROM eqdetails WHERE eid = '$eidd' AND name='$selectedEquipment'";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        $row = mysqli_fetch_assoc($result);
                        $name = $row['name'];
                        $brand = $row['brand'];
                        $price = $row['price'];
                        $installation = $row['installation'];
                        $warranty = $row['warranty'];
                        $warrantyend = $row['warrantyend'];
                        $location = $row['location'];

                        echo '<h1>Equipment Details</h1>';
                        echo '<div><strong>Name:</strong> ' . $name . '</div>';
                        echo '<div><strong>ID:</strong> ' . $eidd . '</div>';
                        echo '<div><strong>Brand:</strong> ' . $brand . '</div>';
                        echo '<div><strong>Price:</strong> <span style="color: #3F3064;">$' . $price . '</span></div>';
                        echo '<div><strong>Purchase Date:</strong> ' . $installation . '</div>';
                        echo '<div><strong>Warranty:</strong> ' . $warranty . '</div>';
                        echo '<div><strong>Warranty End:</strong> ' . $warrantyend . '</div>';
                        echo '<div><strong>Location:</strong> ' . $location . '</div>';
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
        
    </div>
</body>

</html>
