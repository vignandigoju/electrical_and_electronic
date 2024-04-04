<?php
$conn = mysqli_connect("localhost", "root", "", "maintanence");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve selected worker and issue details from the form
    $workerName = $_POST['worker_id'];
    $issueId = $_POST['issue_id'];

    // Insert the assignment into the job table
    $insertQuery = "INSERT INTO job (worker_name, issue_id) VALUES ('$workerName', '$issueId')";
    if (mysqli_query($conn, $insertQuery)) {
        echo "Issue assigned successfully.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Query to retrieve data from the 'issue' table
$sql = "SELECT * FROM issue WHERE status != 'completed'";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electrical Maintenance</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        header {
            background-color: #1c0d3f;
            color: white;
            padding: 10px;
            text-align: center;
        }

        nav {
            background-color: #311249;
            color: white;
            padding: 10px;
            text-align: center;
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        ul a {
            color: white;
            text-decoration: none;
        }

        li {
            display: inline;
            margin-right: 20px;
            font-size: 13px;
        }

        main {
            padding: 20px;
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

        button {
            background-color: #1c0d3f;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <header>
        <h2>Electrical Maintenance</h2>
    </header>
    
    <nav>
        <ul>
            <li><a href="staff.php">Add Employee</a></li>
            <li><a href="addissue.php">Add Issue</a></li>
            <li><a href="empdetails.php">Employee Details</a></li>
            <li><a href="mainlogin.php">Logout</a></li>
        </ul>
    </nav>

    <main>
        <div class="employee-table">
            <h3>Issue Details</h3>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <table>
                    <!-- Table headers -->
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>Location</th>
                            <th>Equipment</th>
                            <th>Issue</th>
                            <th>Assign To Worker</th>
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

                            // Query to retrieve only names from the 'login' table for each row
                            $workerQuery = "SELECT name FROM login WHERE role = 'worker' AND issue IS NULL";
                            $workerResult = mysqli_query($conn, $workerQuery);

                            // Fetch all worker names into an array
                            $workers = [];
                            while ($workerRow = mysqli_fetch_assoc($workerResult)) {
                                $workers[] = $workerRow['name'];
                            }

                            // Add a dropdown for assigning to a worker
                            echo "<td>";
                            echo '<select name="worker_id">';
                            foreach ($workers as $workerName) {
                                echo '<option value="' . $workerName . '">' . $workerName . '</option>';
                            }
                            echo '</select>';
                            echo '<input type="hidden" name="issue" value="' . $row['issue'] . '">';
                            echo "</td>";

                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
                <br></br>
                <button type="submit">Assign Issue</button>
            </form>
        </div>
    </main>
</body>
</html>
