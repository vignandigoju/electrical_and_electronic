<?php
session_start();
$user = $_SESSION["username"];

$conn = mysqli_connect("localhost", "root", "", "maintanence");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query to retrieve data from the 'login' table
$sql = "SELECT * FROM issue where user_id= '$user' AND status != 'completed'";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search and Buttons Example</title>
    <style>
        /* CSS styles for the employee table */
        .employee-table {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .employee-table h3 {
            margin-top: 0;
        }

        .employee-table table {
            width: 100%;
            border-collapse: collapse;
        }

        .employee-table th, .employee-table td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
        }

        .employee-table th {
            background-color: #f2f2f2;
        }

        /* CSS styles for the menu bar */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #160b2e;
            color: white;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .hamburger {
            font-size: 20px;
            cursor: pointer;
        }

        .show-menu {
            display: block !important;
        }
        /* CSS styles for the sidenav */
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
            .sidenav { padding-top: 15px; }
            .sidenav a { font-size: 18px; }
        }
    </style>
    <style>
        
/* CSS */
.button-40 {
  background-color: #111827;
  border: 1px solid transparent;
  border-radius: .65rem;
  box-sizing: border-box;
  color: #FFFFFF;
  cursor: pointer;
  flex: 0 0 auto;
  font-family: "Inter var", ui-sans-serif, system-ui, -apple-system, system-ui, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
  font-size: 1rem; /* Adjusted font size */
  font-weight: 500;
  line-height: 1.5rem;
  padding: .5rem 1rem; /* Adjusted padding */
  text-align: center;
  text-decoration: none #6B7280 solid;
  text-decoration-thickness: auto;
  transition-duration: .2s;
  transition-property: background-color, border-color, color, fill, stroke;
  transition-timing-function: cubic-bezier(.4, 0, 0.2, 1);
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  width: auto;
}

.button-40:hover {
  background-color: #374151;
}

.button-40:focus {
  box-shadow: none;
  outline: 2px solid transparent;
  outline-offset: 2px;
}

@media (min-width: 768px) {
  .button-40 {
    padding: .4rem 1rem; /* Adjusted padding */
    font-size: 1.115rem; /* Reset font size for larger screens */
  }
}

    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const hamburger = document.querySelector(".hamburger");
            const menuItems = document.querySelector(".menu-items");

            hamburger.addEventListener("click", function() {
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
        <a href="mainlogin.php">Logout</a>
    </div>

    <header>
        <div class="menu-bar">
            <span class="hamburger" onclick="openNav()">&#8801;</span>
        </div>
    </header>

    </style>
</head>
<body>
    <nav>
        <!-- Navigation menu if needed -->
    </nav>

    <main>
        <div class="employee-table">
            <h3>Issue Details</h3>
            <table>
                <thead>
                    <tr>
                        <th>Location</th>
                        <th>Equipment</th>
                        <th>Issue</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    <!-- Loop through the data retrieved from the database -->
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['location'] . "</td>";
                        echo "<td>" . $row['eqname'] . "</td>";
                        echo "<td>" . $row['issue'] . "</td>";
                        echo "<td><a href='approve.php?id=" . $row['iid'] . "'><button class='button-40' role='button'>Close Issue</button></a>
                        </td>";
                        


                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

    <footer>
        <!-- Your footer content goes here -->
    </footer>

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
