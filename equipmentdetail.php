<?php
$conn = mysqli_connect("localhost", "root", "", "maintanence");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query to retrieve data from the 'eqdetails' table
$sql = "SELECT * FROM eqdetails";
$result = mysqli_query($conn, $sql);


?>

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
                            <th>Brant</th>
                            <th>Price</th>
                            <th>Warranty</th>
                            <th>Warrantyend</th>
                            <th>Action</th> <!-- New column for the Deactivate and Activate buttons -->
                            <!-- <th>Edit</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Loop through the data retrieved from the database -->
                        <?php
                            if (mysqli_num_rows($result) > 0) {
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>" . $row["name"] . "</td>";
                                    echo "<td>" . $row["brand"] . "</td>";
                                    echo "<td>" . $row["price"] . "</td>";
                                    echo "<td>" . $row["warranty"] . "</td>";
                                    echo "<td>" . $row["warrantyend"] . "</td>";
                                    echo "<td>";
                                    echo "<a href='edit_equipment.php?id=" . $row["eid"] . "'>Edit</a> | ";
                                    echo "<a href='delete_equipment.php?id=" . $row["eid"] . "' onclick='return confirm(\"Are you sure you want to delete this equipment?\")'>Delete</a>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='5'>No records found</td></tr>";
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
    <?php
// Close the database connection
mysqli_close($conn);
?>
</body>
</html>






