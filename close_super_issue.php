<?php

// Database connection
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'maintanence';

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the user ID is provided in the query parameter
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query to update the appointment status
    $sql = "UPDATE job SET status = 'completed' WHERE empid = '$id' ";

    if ($conn->query($sql) === TRUE) {
        // Close the database connection
        $conn->close();
        
        // Display an alert and reload the previous page using JavaScript
        echo "<script type='text/javascript'>alert('Issue Closed'); window.history.back();</script>";
        exit(); // Terminate the script execution
    } else {
        echo 'Error updating appointment: ' . $conn->error;
    }
} else {
    echo 'User ID not provided.';
}

$conn->close();
?>
