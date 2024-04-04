<!DOCTYPE html>
<html lang="en">
<head>
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

        li {
            display: inline;
            margin-right: 20px;
            font-size: 13px;
        }

        a {
            text-decoration: none;
            color: black;
        }

        main {
            padding: 20px;
            text-align: center;
        }
        
        .table-container {
            width: 80%;
            margin: 0 auto;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            border-radius: 10px; /* Rounded corners for the entire table */
        }
        
        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        th {
            background-color: #3F3064;
            color: #fff;
            font-weight: bold;
        }
        
        tr:hover {
            background-color: #f2f2f2;
        }
        
        .issue-box {
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 5px;
        }
        
        button {
            background-color: #3F3064;
            color: #fff;
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 13px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #2D224D;
        }

        footer {
           position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #3F3064;
            color: white;
            text-align: center;
            padding: 10px;
            display: none; 
        }

        /* Styling for dropdown */
        #viewSelect {
            border-radius: 5px;
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
            background-color: #fff;
        }

        label {
            font-weight: bold;
            margin-right: 10px;
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
        <div style="text-align: center; margin-top: 10px;">
            <label for="viewSelect">View:</label>
            <select id="viewSelect" onchange="filterTasks()">
                <option value="all">All</option>
                <option value="pending">Pending</option>
                <option value="completed">Completed</option>
            </select>
        </div>

        <div class="table-container">
            <table>
                <tr>
                    <th>Serial No.</th>
                    <th>Issue</th>
                    <th>Finish</th>
                </tr>
                <?php
                // Database connection
                $conn = mysqli_connect("localhost", "root", "", "maintanence");

                // Check the connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Query to fetch tasks from the database
                $sql = "SELECT name, status, empid, servicetype FROM job";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $serial = 1;
                    while ($row = $result->fetch_assoc()) {
                        $name = $row['name'];
                        $empid = $row['empid'];
                        $status = $row['status'];
                        $servicetype = $row['servicetype'];

                        echo "<tr class='task $status'>"; // Add class based on status
                        echo "<td>$serial</td>";
                        echo "<td>";
                        echo "<div class='issue-box'>";
                        echo "<p><b>Name:</b> $name</p>";
                        echo "<p><b>Employee ID:</b> $empid</p>";
                        echo "<p><b>Status:</b> $status</p>";
                        echo "<p><b>Issue:</b> $servicetype</p>";
                        echo "</div>";
                        echo "</td>";
                        echo "<td>";
                        if ($status == 'pending') {
                            echo "<button onclick=\"finishTask('$empid')\">Finish</button>";
                        } else {
                            echo "Completed";
                        }
                        echo "</td>";
                        echo "</tr>";
                        $serial++;
                    }
                } else {
                    echo "<tr><td colspan='3'>No tasks found.</td></tr>";
                }
                // Close the database connection
                $conn->close();
                ?>
            </table>
        </div>
    </main>
    <footer>
        &copy; <?php echo date("Y"); ?> ElecDhiwise. All rights reserved.
    </footer>

    <script>
        // JavaScript function to filter tasks based on the "View" dropdown
        function filterTasks() {
            const viewSelect = document.getElementById('viewSelect');
            const status = viewSelect.value;
            const tasks = document.querySelectorAll('.task');

            tasks.forEach(task => {
                const taskStatus = task.classList.contains(status);
                if (status === 'all') {
                    task.style.display = 'table-row'; // Display as table row
                } else if (taskStatus) {
                    task.style.display = 'table-row'; // Display as table row
                } else {
                    task.style.display = 'none'; // Hide the task
                }
            });
        }

        // JavaScript function to mark a task as finished
        function finishTask(empid) {
            // Perform an AJAX request to update the status in the database
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'update_status.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        alert("Task with Employee ID " + empid + " has been marked as finished.");
                        location.reload(); // Reload the page to update the task status dynamically
                    } else {
                        alert("Error: Unable to mark the task as finished.");
                    }
                }
            };
            xhr.send('empid=' + empid);
        }
    </script>
</body>
</html>
