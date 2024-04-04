<!DOCTYPE html>
<html lang="en">
<head>
    <style>
    /* Your existing CSS styles for section and other elements */

    /* Additional styling for section separation and spacing */
    .section-separator {
        margin-top: 20px;
    }
    </style>
</head>
<body>
    <header style="background-color: #1c0d3f; color: white; text-align: center; padding: 10px;">
        <h1>Status</h1>
    </header>

    <nav style="background-color: #3333; color: black; text-align: center;">
        <ul style="list-style-type: none; padding: 0; margin: 0;">
            <li style="display: inline; margin-right: 20px;"><a href="appdashboard.php">Home</a></li>
            <li style="display: inline; margin-right: 20px;"><a href="login.php">Logout</a></li>
            <li style="display: inline;"><a href="Rating.php">Rating</a></li>
        </ul>
    </nav>

    <div style="text-align: center; margin-top: 10px;">
        <label for="viewSelect">View:</label>
        <select id="viewSelect" onchange="filterTasks()">
            <option value="all">All</option>
            <option value="pending">Pending</option>
            <option value="completed">Completed</option>
        </select>
    </div>

    <?php
    // Database connection
    $conn = mysqli_connect("localhost", "root", "", "maintanence");
    session_start();

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query to fetch tasks from the database
    $sql = "SELECT * FROM choose";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $name = $row['name'];
            $empid = $row['empid'];
            $status = $row['status'];

            // Determine the appropriate CSS class based on task status
            $taskClass = ($status == 'completed') ? 'task completed' : 'task';

            // Output section bar with spacing
            echo "<div class='section-separator'></div>";
            echo "<section class='$taskClass' data-status='$status'>";
            echo "<div style='background-color: #3333; color: black; padding: 10px;'>";
            echo "<h2>$name</h2>";
            echo "<p>Employee Id: $empid</p>";
            echo "<p>Status: $status</p>";
            if ($status == 'pending') {
                echo "<button onclick=\"finishTask('$empid')\">Finish</button>";
            }
            echo "</div>";
            echo "</section>";
        }
    }
    // Close the database connection
    $conn->close();
    ?>

    <script>
        // JavaScript function to filter tasks based on the "View" dropdown
        function filterTasks() {
            const viewSelect = document.getElementById('viewSelect');
            const status = viewSelect.value;
            const tasks = document.querySelectorAll('.task');

            tasks.forEach(task => {
                const taskStatus = task.getAttribute('data-status');
                if (status === 'all') {
                    task.style.display = 'block';
                } else if (status === 'pending' && taskStatus === 'pending') {
                    task.style.display = 'block';
                } else if (status === 'completed' && taskStatus === 'completed') {
                    task.style.display = 'block';
                } else {
                    task.style.display = 'none';
                }
            });
        }

        // JavaScript function to mark a task as finished
        function finishTask(empid) {
            // You can perform an action here to update the status in the database
            alert("Task with Employee ID " + empid + " has been marked as finished.");
            // You can also reload the page or update the task status dynamically
        }

        // Initial call to filter tasks based on the "View" dropdown
        filterTasks();
    </script>
</body>
</html>
