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
                // Your existing PHP code for the image remains unchanged
                // Assuming you have established a database connection

// Query to fetch image URL based on selected equipment
$query = "SELECT image FROM category WHERE servicename = '$selectedEquipment'";
$result = mysqli_query($connection, $query);

// Check if query executed successfully and if a row was returned
if ($result && mysqli_num_rows($result) > 0) {
    // Fetch the image URL from the result
    $row = mysqli_fetch_assoc($result);
    $imageUrl = $row['image_url'];
    
    // Output the image tag with the dynamically fetched image URL
    echo "<img src='$imageUrl' alt='$selectedEquipment Image'>";
} else {
    // If no matching image URL is found in the database, use a default image
    echo '<img src="defaultimage.png" alt="Default Image">';
}

// Free result set
mysqli_free_result($result);

// Close connection
mysqli_close($connection);

                ?>
            </div>
        </div>
        <?php
        $query = "SELECT servicetype, servicecharge, type, name, date, duedate, endby, status FROM job WHERE eid2 = '$eidd'  ORDER BY date DESC";
        $res = mysqli_query($conn, $query);

        // Fetch all rows into an array
        $rows = [];
        while ($row = mysqli_fetch_assoc($res)) {
            $rows[] = $row;
        }
        $sum = "SELECT sum(servicecharge) AS total_sum from job WHERE eid2 = '$eidd'";
        $sumres = mysqli_query($conn, $sum);
        if ($sumres) {
            $row = mysqli_fetch_assoc($sumres);
            $totalSum = $row['total_sum'];
            echo "<strong>Total Sum of Service Charges: $totalSum</strong>";
        } else {
            echo "Error executing query: " . mysqli_error($conn);
        }

        if (!empty($rows)) {
            echo '<div class="job-history">';
            echo '<h2>Job History</h2>';
            echo '<table>';
            echo '<tr><th>Service Type</th><th>Service Charge</th><th>Done By</th><th>Name</th><th>Date</th><th>Due Date</th><th>Done On</th><th>Status</th></tr>';

            foreach ($rows as $row) {
                $servicetype = $row['servicetype'];
                $servicecharge = $row['servicecharge'];
                $type = $row['type'];
                $name = $row['name'];
                $date = $row['date'];
                $duedate = $row['duedate'];
                $endby = $row['endby'];
                $status = $row['status'];

                echo '<tr>';
                echo '<td>' . $servicetype . '</td>';
                echo '<td>' . $servicecharge . '</td>';
                echo '<td>' . $type . '</td>';
                echo '<td>' . $name . '</td>';
                echo '<td>' . $date . '</td>';
                echo '<td>' . $duedate . '</td>';
                echo '<td>' . $endby . '</td>';
                echo '<td>' . $status . '</td>';
                echo '</tr>';
            }

            echo '</table>';
            echo '</div>';
        } else {
            echo '<p>No job history available.</p>';
        }
        ?>
    </div>
</body>

</html>
