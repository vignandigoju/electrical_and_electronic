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
    <title>Issue Details</title>
    <style>
        /* CSS styles for the table */
       

        main {
            padding: 20px;
        }

        .employee-table {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .employee-table h3 {
            margin: 0;
            padding: 20px;
            background-color: #3F3064;
            color: white;
            border-radius: 10px 10px 0 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px 16px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #3F3064;
            color: white;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tbody tr:hover {
            background-color: #ddd;
        }

        /* CSS styles for the button */
        .button-40 {
            background-color: #111827;
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 13px;
            transition: background-color 0.3s;
        }

        .button-40:hover {
            background-color: #374151;
        }

        .button-40:focus {
            outline: none;
        }

        /* CSS styles for navigation */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            color: #333;
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
            font-weight: bold;
        }

        ul a:hover {
            background-color: #2D224D;
            color: #ffffff;
        }

        ul a.active::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: white;
            z-index: -1;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <header>
        <h2>ElecDhiwise</h2>
        <nav>
            <ul>
                <li><a href="issue.php">Raise Issue</a></li>
                <li><a href="userissue.php">View Issue</a></li>
                <li><a href="userprofile.php">Profile</a></li>
                <li><a href="homepage.php">Logout</a></li>
            </ul>
        </nav>
    </header>

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
                    <!-- PHP code to fetch and display data -->
                    <?php
                   
                    $user = $_SESSION["username"];
                    $conn = mysqli_connect("localhost", "root", "", "maintanence");

                    // Check connection
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    // Query to retrieve data from the 'issue' table
                    $sql = "SELECT * FROM issue WHERE user_id = '$user'";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        // Output data of each row
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['location'] . "</td>";
                            echo "<td>" . $row['eqname'] . "</td>";
                            echo "<td>" . $row['issue'] . "</td>";
                            if ($row['status'] == 'completed') {
                                echo "<td>Completed</td>";
                            } else {
                                echo "<td><a href='approve.php?id=" . $row['iid'] . "'><button class='button-40'>Close Issue</button></a></td>";
                            }
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>No issues found</td></tr>";
                    }

                    mysqli_close($conn);
                    ?>
                </tbody>
            </table>
        </div>
    </main>

    <footer>
        <!-- Footer content -->
    </footer>
</body>
</html>
