<?php
$conn = mysqli_connect("localhost", "root", "", "maintanence");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted for deactivation or activation
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["deactivate"])) {
        // Deactivate logic here (update database, etc.)
        $employeeName = $_POST["employee_name"];
        // Implement your deactivation logic here, e.g., update the 'action' to "Deactive" in the database
        $sqlUpdate = "UPDATE login SET action='Deactive' WHERE name='$employeeName'";
        mysqli_query($conn, $sqlUpdate);
    } elseif (isset($_POST["activate"])) {
        // Activate logic here (update database, etc.)
        $employeeName = $_POST["employee_name"];
        // Implement your activation logic here, e.g., update the 'action' to "Active" in the database
        $sqlUpdate = "UPDATE login SET action='Active' WHERE name='$employeeName'";
        mysqli_query($conn, $sqlUpdate);
    }

    // Redirect to the same page to refresh the data
    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
}

// Query to retrieve data from the 'login' table
$sql = "SELECT * FROM login where role='worker'";
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
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        header {
            color: white;
            padding: 1px;
            text-align: center;
            background: linear-gradient(90deg, rgb(183 94 14) 0%, rgb(214 174 90) 50%, rgb(231 194 93) 100%);
        }

        nav {
            background-color: #fff;
            color: white;
            padding: 1px;
            text-align: center;
        }

        ul {
            list-style: none;
            padding: 0;
        }
        
        ul a {
            color: #000;
        }

        li {
            display: inline;
            margin-right: 20px;
            color: white;
            font-size: 13px;
            display: inline-block;
            margin-right: 20px;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        a {
            text-decoration: none;
            color: #1c0d3f
        }

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
            font-size: 13px;
        }

        .employee-table th {
            background-color: #f2f2f2;
        }


        .hamburger {
            font-size: 20px;
            cursor: pointer;
        }

        .show-menu {
            display: block !important;
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
            .sidenav { padding-top: 15px; }
            .sidenav a { font-size: 18px; }
        }

        .button-container {
            display: flex;
            gap: 10px; /* Adjust the gap as needed */
        }

        /* Style for the buttons */
        .action-button {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .activate-button {
            background-color: #4CAF50; /* Green */
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }

        .deactivate-button {
            background-color: #3498db; /* Blue */
            border: none;
            padding: 5px 10px;
            cursor: pointer;
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

   <header>
        <h2>Electrical Maintenance</h2>
    </header>
    
    <nav>
        <ul>
        <li><a href="supervisordashboard.php">Home</a></li>
            <li><a href="viewissue.php">View Issue</a></li>
            <li><a href="choose.php">Assign Issue</a></li>
            <li><a href="mainstatus.php">Work Status</a></li>
            <li><a href="Rating.php">Rating</a></li>
            <li><a href="workerprofile.php">My Profile</a></li>
            <li><a href="mainlogin.php">Logout</a></li>
        </ul>
    </nav>
    <br><br>

    <main>
        <div class="employee-table">
            <h3>Employee Details</h3>
            <table>
            <thead>
                    <tr>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Mob.No</th>
                        <th>Active/Deactive</th>
                        <th>Action</th> <!-- New column for the Deactivate and Activate buttons -->
                    </tr>
                </thead>
                <tbody>
                    <!-- Loop through the data retrieved from the database -->
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['role'] . "</td>";
                        echo "<td>" . $row['mobnum'] . "</td>";
                        echo "<td>" . $row['action'] . "</td>";
                        echo '<td class="button-container">
                                <form method="post" onsubmit="return confirm(\'Are you sure you want to deactivate ' . $row['name'] . '?\');">
                                    <input type="hidden" name="employee_name" value="' . $row['name'] . '">
                                    <button type="submit" name="deactivate" class="deactivate-button">Deactivate</button>
                                </form>
                                <br>
                                <form method="post" onsubmit="return confirm(\'Are you sure you want to activate ' . $row['name'] . '?\');">
                                    <input type="hidden" name="employee_name" value="' . $row['name'] . '">
                                    <button type="submit" name="activate" class="activate-button">Activate</button>
                                </form>
                              </td>';
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>

    <footer>
        <!-- Your footer content goes here -->
    </footer>

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

