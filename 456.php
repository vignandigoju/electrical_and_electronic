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
session_start();

// Check if the form was submitted to choose employees
if (isset($_POST['choose_employee'])) {
    // Retrieve selected employee data from the session
    $selected_employee = $_SESSION['selected_employee'];

    // Display the selected employee data
    $name = $selected_employee['name'];
    $empid = $selected_employee['empid'];
    
    echo "<h1>Selected Employee</h1>";
    echo "<p>Name: $name</p>";
    echo "<p>Employee Id: $empid</p>";
}

// Rest of your status.php page content
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
