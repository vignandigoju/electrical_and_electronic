<?php 
session_start();
?>
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
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            font-size: 13px;
        }

        h1, h2 {
            color: #1c0d3f;
        }

        strong {
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
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
        .assign-button {
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
            font-size: 18px;
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
            .sidenav { padding-top: 15px; }
            .sidenav a { font-size: 13px; }
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
    <!-- Sidenav -->
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="supervisordashboard.php">Home</a>
        <a href="viewissue.php">View Issue</a>
        <a href="mainstatus.php">Status</a>
        <a href="supervisoremployeedetails.php">Employee Details</a>
        <a href="mainlogin.php">Logout</a>
    </div>

    <header>
        <div class="menu-bar">
            <span class="hamburger" onclick="openNav()">&#8801;</span>
        </div>
    </header>

    <div class="container">
        <?php
        $eid = $_SESSION['eid'];
        $conn = mysqli_connect("localhost", "root", "", "maintanence");

        $sql = "SELECT name, brand, price, installation, warranty, warrantyend FROM eqdetails WHERE eid=$eid";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $name = $row['name'];
            $brand = $row['brand'];
            $price = $row['price'];
            $installation = $row['installation'];
            $warranty = $row['warranty'];
            $warrantyend = $row['warrantyend'];

            echo '<h1>Equipment Details</h1>';
            echo '<div><strong>Name:</strong> ' . $name . '</div>';
            echo '<div><strong>Brand:</strong> ' . $brand . '</div>';
            echo '<div><strong>Price:</strong> ' . $price . '</div>';
            echo '<div><strong>Installation:</strong> ' . $installation . '</div>';
            echo '<div><strong>Warranty:</strong> ' . $warranty . '</div>';
            echo '<div><strong>Warranty End:</strong> ' . $warrantyend . '</div>';
        }
        ?>

<?php
$eid = $_SESSION['eid'];
$conn = mysqli_connect("localhost", "root", "", "maintanence");
$sql = "SELECT servicetype, servicecharge, type, name, date, duedate, endby, status FROM job WHERE eid2=$eid AND type = 'invoice'";
$result = mysqli_query($conn, $sql);

// Fetch all rows into an array
$rows = [];
while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}

// Reverse the array
$reversedRows = array_reverse($rows);

if (!empty($reversedRows)) {
    echo '<h2>Job History</h2>';
    echo '<table border="1">';
    echo '<tr><th>Service Type</th><th>Service Charge</th><th>Done By</th><th>Name</th><th>Date</th><th>Due Date</th><th>Done on</th><th>Status</th></tr>';
    foreach ($reversedRows as $row) {
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
        <div>
            <a href="choose.php"><button class="assign-button">Assign Work</button></a>
        </div>
    </div>


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
</body>

</html>

