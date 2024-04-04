<!DOCTYPE html>
<html lang="en">
<head>
    <style>
    <!-- ... (Your head content remains the same) ... -->
    section {
        margin-bottom: 30px;
        padding: 20px;
        border: 1px solid #ddd;
        background-color: white;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    /* Add margin to create space between sections */
    .task {
        margin-bottom: 20px; /* Adjust this value to control the spacing */
    }
    </style>
</head>
<body>
    <header style="background-color: #1c0d3f; color: white; text-align: center; padding: 10px;">
        <h1>JOBS</h1>
    </header>

    <nav style="background-color: #3333; color: black; text-align: center;">
        <ul style="list-style-type: none; padding: 0; margin: 0;">
            <li style="display: inline; margin-right: 20px;"><a href="supervisordashboard.php">Home</a></li>
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
        $sql = "SELECT * FROM status";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $name = $row['name'];
                $jobId = $row['jobId'];
                $status = $row['status'];

                // Determine the appropriate CSS class based on task status
                $taskClass = ($status == 'completed') ? 'task completed' : 'task';

                echo "<div class='$taskClass' data-status='$status'>";
                echo "<div style='background-color: #3333; color: black; padding: 10px;'>";
                echo "<h2>$name</h2>";
                echo "<p>Job Id: $jobId</p>";
                echo "<p>Status: $status</p>";
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
