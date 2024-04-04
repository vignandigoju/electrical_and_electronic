<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipment Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
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
        }

        th {
            background-color: #1c0d3f;
            color: white;
        }

        h1, h2 {
            color: #1c0d3f;
            margin-top: 0;
        }

        .job-history {
            list-style: none;
            padding-left: 0;
        }

        .job-history li {
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 10px;
        }

        .job-history li strong {
            font-weight: bold;
        }

        .ADVISABLE-FOR-REPLACEMENT-button {
            background-color: #1c0d3f;
            color: #fff;
            border: none;
            padding: 10px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            border-radius: 5px;
        }

        .ADVISABLE-FOR-REPLACEMENT-button:hover {
            background-color: #0e061f;
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
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
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
                font-size: 18px;
            }
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
    <a href="profile.php">My Profile</a>
    <a href="mainlogin.php">Logout</a>
</div>

<header>
    <div class="menu-bar">
        <span class="hamburger" onclick="openNav()">&#8801;</span>
    </div>
</header>

<div class="container">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $eid = $_POST["eidd"];
        $_SESSION['eid'] = $eid;

        $conn = mysqli_connect("localhost", "root", "", "maintanence");

        $sql = "SELECT name, brand, price, installation, warranty, warrantyend FROM eqdetails WHERE eid=$eid";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo '<h1>Equipment Details</h1>';
            echo '<table>';
            echo '<tr><th>Name</th><th>Brand</th><th>Price</th><th>Installation</th><th>Warranty</th><th>Warranty End</th></tr>';
            $row = mysqli_fetch_assoc($result);
            echo '<tr>';
            echo '<td>' . $row['name'] . '</td>';
            echo '<td>' . $row['brand'] . '</td>';
            echo '<td>' . $row['price'] . '</td>';
            echo '<td>' . $row['installation'] . '</td>';
            echo '<td>' . $row['warranty'] . '</td>';
            echo '<td>' . $row['warrantyend'] . '</td>';
            echo '</tr>';
            echo '</table>';
        }
    }
    ?>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $eid = $_POST["eidd"];
        $conn = mysqli_connect("localhost", "root", "", "maintanence");
        $sql = "SELECT servicetype, servicecharge, empid, date, status FROM job WHERE eid2=$eid";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo '<h2>Job History</h2>';
            echo '<ul class="job-history">';
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<li>';
                echo '<strong>Service Type:</strong> ' . $row['servicetype'] . '<br>';
                echo '<strong>Service Charge:</strong> ' . $row['servicecharge'] . '<br>';
                echo '<strong>Employee ID:</strong> ' . $row['empid'] . '<br>';
                echo '<strong>Date:</strong> ' . $row['date'] . '<br>';
                echo '<strong>Status:</strong> ' . $row['status'] . '<br>';
                echo '</li>';
            }
            echo '</ul>';
        }
    }
    ?>
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

<div>
    <p><a href="acassignwork.php"><button class="ADVISABLE-FOR-REPLACEMENT-button">ADVISABLE FOR REPLACEMENT</button></
