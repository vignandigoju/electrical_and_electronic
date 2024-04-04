<?php
$conn = mysqli_connect("localhost", "root", "", "maintanence");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query to retrieve data from the 'login' table for active workers dropdown
$workerSql = "SELECT * FROM login WHERE role = 'worker' AND action = 'active'";
$workerResult = mysqli_query($conn, $workerSql);

// Query to retrieve data from the 'issue' table
$sql = "SELECT * FROM issue WHERE status != 'completed'";
$result = mysqli_query($conn, $sql);

// Handling form submission for assigning an issue to a worker
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedWorker = $_POST["worker"];
    $selectedIssueID = $_POST["issue"];

    // Update 'login' table with the selected worker for the specific issue
    $updateSql = "UPDATE login SET issue = '$selectedIssueID' WHERE name = '$selectedWorker' AND role = 'worker' AND action = 'active'";
    mysqli_query($conn, $updateSql);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Issue Details</title>
    <style>
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
            border-bottom: 2px solid #ffffff;
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

        main {
            padding: 20px;
        }

        table {
            width: 100%;
            border-spacing: 0;
            margin-top: 20px;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-top: 1px solid #ddd;
            border-bottom: 1px solid #ddd;
        }

        th:first-child,
        td:first-child {
            border-left: 1px solid #ddd;
            border-radius: 8px 0 0 0;
        }

        th:last-child,
        td:last-child {
            border-right: 1px solid #ddd;
            border-radius: 0 8px 0 0;
        }

        th {
            background-color: #3F3064;
            color: white;
            font-weight: bold;
            text-transform: uppercase;
        }

        td {
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        tbody tr:nth-child(even) td {
            background-color: #f2f2f2;
        }

        tbody tr:hover td {
            background-color: #ddd;
        }

        select {
            padding: 8px;
            border: none;
            border-radius: 5px;
            background-color: #f2f2f2;
            width: calc(100% - 100px);
        }

        button {
            background-color: #1c0d3f;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        button:hover {
            background-color: #e0ba5c;
            color: #1c0d3f;
        }
    </style>
</head>
<body>

<header>
    <h2>ElecDhiwise</h2>
    <nav>
        <ul>
            <li><a href="supervisorhome.php">Home</a></li>
            <li><a href="supervisordashboard.php">Category</a></li>
            <li><a href="viewissue.php">View Issue</a></li>
            <li><a href="choose.php">Assign Issue</a></li>
            <li><a href="mainstatus.php">Work Status</a></li>
            <li><a href="workerprofile.php">My Profile</a></li>
            <li><a href="mainlogin.php">Logout</a></li>
        </ul>
    </nav>
</header>

<main>
    <table>
        <thead>
        <tr>
            <th>User ID</th>
            <th>Location</th>
            <th>Equipment</th>
            <th>Issue</th>
            <th>Assign Worker</th>
        </tr>
        </thead>
        <tbody>
        <!-- Loop through the data retrieved from the 'issue' table -->
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['user_id'] . "</td>";
            echo "<td>" . $row['location'] . "</td>";
            echo "<td>" . $row['eqname'] . "</td>";
            echo "<td>" . $row['issue'] . "</td>";
            echo "<td>";
            echo "<form method='POST' action='choose.php'>";
            echo "<input type='hidden' name='selected_issue' value='" . $row['issue'] . "'>";
            echo "<select name='worker'>";
            mysqli_data_seek($workerResult, 0);
            while ($workerRow = mysqli_fetch_assoc($workerResult)) {
                echo "<option value='" . $workerRow['name'] . "'>" . $workerRow['name'] . "</option>";
            }
            echo "</select>";
            echo "<button type='submit'>Assign</button>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</main>

<footer>
    <!-- Your footer content goes here -->
</footer>

</body>
</html>















