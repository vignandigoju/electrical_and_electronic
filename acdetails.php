<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipment Details</title>

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
            background-color: #311249;
            color: white;
            padding: 1px;
            text-align: center;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        ul a {
            color: white;
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

        .container {
            display: flex;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            flex-direction: column;
        }

        .details-container {
            display: flex;
            flex-direction: row;
        }

        .details {
            flex: 1;
            padding-right: 20px;
        }

        .details img {
            max-width: 80%;
            height: auto;
            margin-bottom: 20px;
        }

        .job-table-container {
            width: 100%;
            box-sizing: border-box;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        h2 {
            color: #fff;
        }

        strong {
            font-weight: bold;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            font-size: 13px;
        }

        th {
            background-color: #f2f2f2;
        }

        .job-history {
            list-style: none;
            padding: 0;
        }

        .job-history li {
            border: 1px solid #ddd;
            padding: 12px;
            margin-bottom: 12px;
            border-radius: 4px;
            font-size: 13px;
        }

        .next-button {
            background-color: #1c0d3f;
            color: #fff;
            border: none;
            padding: 5px 10px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
            font-size: 13px;
        }

        .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #1c0d3f;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .sidenav a {
            padding: 15px;
            text-decoration: none;
            font-size: 15px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        .sidenav a:hover {
            color: #f1f1f1;
        }

        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        @media screen and (max-height: 450px) {
            .sidenav {
                padding-top: 15px;
            }

            .sidenav a {
                font-size: 13px;
            }
        }

        .menu-bar {
            display: flex;
            justify-content: flex-end;
            padding: 10px;
            cursor: pointer;
        }

        .hamburger {
            font-size: 24px;
            color: #1c0d3f;
        }
    </style>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const hamburger = document.querySelector(".hamburger");
            const menuItems = document.querySelector(".menu-items");

            hamburger.addEventListener("click", function () {
                menuItems.classList.toggle("show-menu");
            });
        });
    </script>
</head>

<body>

    <header>
        <h2>Electrical Maintenance</h2>
    </header>

    <nav>
        <ul>
        <li><a href="supervisordashboard.php">Home</a></li>
            <li><a href="viewissue.php">View Issue</a></li>
            <li><a href="addissue.php">Add Issue</a></li>
            <li><a href="mainstatus.php">Work Status</a></li>
            <li><a href="supervisoremployedetails.php">Employee Details</a></li>
            <li><a href="mainlogin.php">Logout</a></li>
        </ul>
    </nav>
    <br></br>
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
                        echo '<div><strong>Name :</strong> ' . $name . '</div>';
                        echo '<div><strong>ID :</strong> ' . $eidd . '</div>';
                        echo '<div><strong>Brand :</strong> ' . $brand . '</div>';
                        echo '<div><strong>Price :</strong> ' . $price . '</div>';
                        echo '<div><strong>Purchase Date :</strong> ' . $installation . '</div>';
                        echo '<div><strong>Warranty :</strong> ' . $warranty . '</div>';
                        echo '<div><strong>Warranty End :</strong> ' . $warrantyend . '</div>';
                        echo '<div><strong>Location :</strong> ' . $location . '</div>';
                    }
                }
                ?>
            </div>
            <div class="details">
                <?php
                switch ($selectedEquipment) {
                    case 'ac':
                        echo '<img src="acimage.png" alt="AC Image">';
                        break;
                    case 'fan':
                        echo '<img src="fanimage.png" alt="Fan Image">';
                        break;
                    case 'generator':
                        echo '<img src="gen.png" alt="Generator Image">';
                        break;
                    case 'sockets':
                        echo '<img src="sockets.jpg" alt="Sockets Image">';
                        break;
                    case 'light':
                        echo '<img src="bulb.jpg" alt="Light Image">';
                        break;
                    default:
                        echo '<img src="defaultimage.png" alt="Default Image">';
                        break;
                }
                ?>
            </div>
        </div>
        <?php
        $query = "SELECT servicetype, servicecharge, type, name, date, duedate, endby, status FROM job WHERE eid2 = '$eidd'  ORDER BY date DESC";
        $res = mysqli_query($conn, $query);

        $rows = [];
        while ($row = mysqli_fetch_assoc($res)) {
            $rows[] = $row;
        }
        $sum = "SELECT eid2, sum(servicecharge) AS total_sum from job WHERE eid2 = '$eidd'";
        $sumres = mysqli_query($conn, $sum);

        if ($sumres) {
            $row = mysqli_fetch_assoc($sumres);
            $totalSum = $row['total_sum'];
            $id = $row['eid2'];

            echo "<strong>Total Sum of Service Charges: $totalSum</strong>";

            echo "<div style='text-align: right;'>";
            echo "<form action='choose.php' method='get'>";
            echo "<input type='hidden' name='id' value='$id'>";
            echo "<input type='hidden' name='eidd' value='$eidd'>";
            echo "<input type='hidden' name='selectedEquipment' value='$selectedEquipment'>";
            echo "<input type='submit' value='Assign'>";
            echo "</form>";
            echo "</div>";
        } else {
            echo "Error executing query: " . mysqli_error($conn);
        }

        if (!empty($rows)) {
            echo '<h1>Job History</h1>';
            echo '<table border="1">';
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
        } else {
            echo '<p>No job history available.</p>';
        }
        ?>
        <br></br>
         
    </div>

    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "150px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }

        function showPopup(message) {
            alert(message);
        }
    </script>
</body>

</html>
