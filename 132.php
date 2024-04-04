<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ... (Your existing head content) ... -->
</head>
<body>
    <!-- ... (Your existing navigation and styling) ... -->

    <main>
        <section>
            <h2>Add Supervisor</h2>
            <form id="add-supervisor-form" method="POST" action="add_supervisor.php">
                <!-- Add Supervisor Form Fields -->
                <!-- You can add fields for supervisor details here -->
                <button type="submit">Add Supervisor</button>
            </form>
        </section>

        <section>
            <h2>Add Worker</h2>
            <form id="add-worker-form" method="POST" action="add_worker.php">
                <!-- Add Worker Form Fields -->
                <!-- You can add fields for worker details here -->
                <button type="submit">Add Worker</button>
            </form>
        </section>

        <section>
            <h2>Job History</h2>
            <!-- Display Job History -->
            <!-- You can retrieve and display job history here using PHP -->
            <?php
            // Example PHP code to fetch and display job history from a database
            // Replace this with your actual database connection and query
            $host = "localhost";
            $username = "your_username";
            $password = "your_password";
            $database = "your_database";

            $conn = new mysqli($host, $username, $password, $database);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM job_history";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<ul>";
                while ($row = $result->fetch_assoc()) {
                    echo "<li>{$row['job_description']}</li>";
                }
                echo "</ul>";
            } else {
                echo "No job history available.";
            }

            $conn->close();
            ?>
        </section>
    </main>

    <!-- ... (Your existing footer and script) ... -->
</body>
</html>
// add_supervisor.php
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process the supervisor form submission
    // Retrieve and sanitize form data
    $supervisorName = $_POST['supervisor_name'];
    // ... (Retrieve other supervisor details)

    // Perform database insertion (replace with your database connection code)
    $host = "localhost";
    $username = "your_username";
    $password = "your_password";
    $database = "your_database";

    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO supervisors (name, ...) VALUES (?, ...)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $supervisorName);
    // ... (Bind other parameters)
    
    if ($stmt->execute()) {
        // Supervisor added successfully
        header("Location: dashboard.php"); // Redirect back to the dashboard
        exit();
    } else {
        // Error occurred while adding supervisor
        echo "Error: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
