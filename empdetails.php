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

    // Check if the form is submitted for edit or delete
    if (isset($_POST["edit"])) {
        // Redirect to the edit page with the employee ID
        $employeeID = $_POST["employee_id"];
        header("Location: edit_employee.php?id=$employeeID");
        exit;
    } elseif (isset($_POST["delete"])) {
        // Delete logic here (delete employee from database)
        $employeeID = $_POST["employee_id"];
        $sqlDelete = "DELETE FROM login WHERE id='$employeeID'";
        mysqli_query($conn, $sqlDelete);
        // Redirect to refresh the page
        header("Location: ".$_SERVER['PHP_SELF']);
        exit;
    }
}

// Query to retrieve data from the 'login' table
$sql = "SELECT * FROM login WHERE role IN ('supervisor', 'worker', 'user')";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Details</title>
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

        .employee-container {
            background-color: white;
    padding: 30px;
    border-radius: 10px;
            margin: 20px;
            overflow-x: auto;
        }

        .employee-table {

            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .employee-table h3 {
            margin: 0;
            background-color: #3F3064;
            color: white;
            padding: 10px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .employee-table table {
            width: 100%;
            border-collapse: collapse;
        }

        .employee-table th, .employee-table td {
            padding: 10px;
            text-align: center;
            font-size: 14px;
        }

        .employee-table th {
            background-color: #f2f2f2;
        }

        .button-container {
            display: flex;
            gap: 10px; /* Adjust the gap as needed */
            justify-content: center;
            align-items: center;
        }

        /* Style for the buttons */
        .action-button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: 1px solid #4CAF50;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .activate-button {
            background-color: #4CAF50; /* Green */
            border-color: #4CAF50;
        }

        .deactivate-button {
            background-color: #3498db; /* Blue */
            border-color: #3498db;
        }

        .action-button:hover {
            background-color: #2D224D; /* Updated hover background color */
        }

        .button-container button {
            border: none;
            color: white;
            padding: 5px 10px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .button-container button:hover {
            filter: brightness(1.2);
        }

        /* Styling for alternate rows */
        .employee-table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .employee-table tbody tr:nth-child(odd) {
            background-color: #ffffff;
        }

    </style>
</head>
<body>
    <header>
        <h2>ElecDhiwise</h2>
        <nav>
            <ul>
            <li><a href="managerhome.php">Home</a></li>
                <li><a href="appdashboard.php" class="<?= ($activePage == 'appdashboard.php') ? 'active' : '' ?>">Category</a></li>
                <li><a href="addcategory.php" class="<?= ($activePage == 'addcategory.php') ? 'active' : '' ?>">Add Category</a></li>
                <li><a href="staff.php" class="<?= ($activePage == 'staff.php') ? 'active' : '' ?>">Add Employee</a></li>
                <li><a href="addequipment.php" class="<?= ($activePage == 'addequipment.php') ? 'active' : '' ?>">Add Equipment</a></li>
                <li><a href="empdetails.php" class="<?= ($activePage == 'empdetails.php') ? 'active' : '' ?>">Employee Details</a></li>
                <li><a href="equipmentdetail.php" class="<?= ($activePage == 'equipmentdetail.php') ? 'active' : '' ?>">Equipment Details</a></li>
                <li><a href="profile.php" class="<?= ($activePage == 'profile.php') ? 'active' : '' ?>">My Profile</a></li>
                <li><a href="mainlogin.php" class="<?= ($activePage == 'mainlogin.php') ? 'active' : '' ?>">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="employee-container">
            <div class="employee-table">
                <h3>Employee Details</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Mob.No</th>
                            <th>Time</th>
                            <th>Active/Deactive</th>
                            <th>Action</th> <!-- New column for the Deactivate and Activate buttons -->
                            <!-- <th>Edit</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Loop through the data retrieved from the database -->
                        <?php
                        $row_number = 0;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $row_number++;
                            $row_class = $row_number % 2 == 0 ? 'even' : 'odd';
                            echo "<tr class='$row_class'>";
                            echo "<td>" . $row['name'] . "</td>";
                            echo "<td>" . $row['role'] . "</td>";
                            echo "<td>" . $row['mobnum'] . "</td>";
                            echo "<td>" . $row['timestamp'] . "</td>";
                            echo "<td>" . $row['action'] . "</td>";
                            
                            echo '<td class="button-container">
                                    <form method="post" onsubmit="return confirm(\'Are you sure you want to activate ' . $row['name'] . '?\');">
                                        <input type="hidden" name="employee_name" value="' . $row['name'] . '">
                                        <button type="submit" name="activate" class="activate-button action-button">Activate</button>
                                    </form>
                                    <form method="post" onsubmit="return confirm(\'Are you sure you want to deactivate ' . $row['name'] . '?\');">
                                        <input type="hidden" name="employee_name" value="' . $row['name'] . '">
                                        <button type="submit" name="deactivate" class="deactivate-button action-button">Deactivate</button>
                                    </form>
                                </td>';

                                echo '<td class="button-container">
                                
    <a href="edit_employee.php?id='. $row['id'].'">Edit</a>
    
    <a href="delete.php?id='. $row['id'].'">Delete</a>
                            </td>';
                        
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <footer>
        <!-- Your footer content goes here -->
    </footer>
</body>
</html>






