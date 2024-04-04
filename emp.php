
<?php
$conn = mysqli_connect("localhost", "root", "", "building_management");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query to retrieve data from the 'login' table
$sql = "SELECT * FROM login";
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

        .add-button,
        .remove-button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 8px 16px;
            margin-left: 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .remove-button {
            background-color: #f44336;
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
        <a href="appdashboard.php">Home</a> 
        <a href="profile.html">My Profile</a>
        <a href="mainlogin.php">Logout</a>
    </div>

    <header>
        <div class="menu-bar">
            <span class="hamburger" onclick="openNav()">&#8801;</span>
        </div>
        <div>
            <button class="add-button" onclick="showPopup('Added successfully!')">Add</button>
            <button class="remove-button" onclick="showPopup('Removed successfully!')">Remove</button>
        </div>
    </header>

    <main>
        <div class="employee-table">
            <h3>Employee Details</h3>
            <table>
                <thead>
                    <tr>
                        <th>Sl.No</th>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Mob.No</th>
                        <th>Active/Deactive</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Loop through the data retrieved from the database -->
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['user_id'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['role'] . "</td>";
                        echo "<td>" . $row['mobno'] . "</td>";
                        echo "<td>active</td>";
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
