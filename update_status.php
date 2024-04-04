<?php
// Check if the empid parameter is set
if (isset($_POST['empid'])) {
    // Database connection
    $conn = mysqli_connect("localhost", "root", "", "maintanence");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Update the status of the task with the provided empid
    $empid = mysqli_real_escape_string($conn, $_POST['empid']);
    $sql = "UPDATE job SET status = 'completed' WHERE empid = '$empid'";

    if (mysqli_query($conn, $sql)) {
        echo "Task status updated successfully";
    } else {
        echo "Error updating task status: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo "Employee ID (empid) parameter is missing";
}
?>
