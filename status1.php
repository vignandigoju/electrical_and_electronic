<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ... (Your head content remains the same) ... -->
</head>
<body>
    <header style="background-color: #333; color: white; text-align: center; padding: 10px;">
        <h1>JOBS</h1>
    </header>

    <nav style="background-color: #3333; color: black; text-align: center;">
        <ul style="list-style-type: none; padding: 0; margin: 0;">
            <li style="display: inline; margin-right: 20px;"><a href="appdashboard.php">Home</a></li>
            <li style="display: inline;"><a href="mainlogin.php">Logout</a></li>
        </ul>
    </nav>
    
    <div class="task-list">
        <label for="viewSelect">View:</label>
        <select id="viewSelect" onchange="filterTasks()">
            <option value="all">All</option>
            <option value="pending">Pending</option>
            <option value="completed">Completed</option>
        </select>
        
        <?php
        // Database connection
        $conn = mysqli_connect("localhost", "root", "", "maintanence");
        session_start();

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Query to fetch tasks from the database
        $sql = "SELECT * FROM rating";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $name = $row['name'];
                $jobid = $row['jobid'];
                $status = $row['status'];
                $rating = $row['rating'];
                $comments = $row['comments'];

                // Determine the appropriate CSS class based on task status
                $taskClass = ($status == 'completed') ? 'task completed' : 'task';

                echo "<div class='$taskClass' data-status='$status'>";
                echo "<div style='background-color: #3333; color: black; padding: 10px;'>";
                echo "<h2>$name</h2>";
                echo "<p>Job Id: $jobid</p>";
                echo "<p>Status: $status</p>";
                echo "<p>Rating: $rating</p>";
                echo "<p>Comments: $comments</p>";
                echo "</div>";
                echo "</div>";
            }    
        }  
        // Close the database connection
        $conn->close();
        ?>
    </div>

    <script>
        // JavaScript function to filter tasks based on the "View" dropdown
        function filterTasks() {
            const viewSelect = document.getElementById('viewSelect');
            const status = viewSelect.value;
            const tasks = document.querySelectorAll('.task');

            tasks.forEach(task => {
                const taskStatus = task.getAttribute('data-status');
                if (status === 'all' || taskStatus === status) {
                    task.style.display = 'block';
                } else {
                    task.style.display = 'none';
                }
            });
        }

        // Initial call to filter tasks based on the "View" dropdown
        filterTasks();
    </script>
</body>
</html>
