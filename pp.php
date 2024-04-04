<!DOCTYPE html>
<html lang="en">
<head>
    <style>
    <!-- ... (Your head content remains the same) ... -->
    body {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    section {
        margin: 30px auto;
        padding: 20px;
        border: 1px solid #ddd;
        background-color: white;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 80%; /* Adjust the width as needed */
    }

    .task-list {
        text-align: center;
        margin: 20px;
        width: 80%; /* Adjust the width as needed */
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

                // Add a horizontal line after each completed task
                if ($status == 'completed') {
                    echo "<hr>";
                }
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
