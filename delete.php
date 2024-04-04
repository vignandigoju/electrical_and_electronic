<?php
// Establish database connection
$conn = mysqli_connect("localhost", "root", "", "maintanence");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if ID parameter is passed in the URL
if(isset($_GET['id'])) {
    $employeeID = $_GET['id'];

    // Delete employee from database
    $sql = "DELETE FROM login WHERE id='$employeeID'";
    if(mysqli_query($conn, $sql)) {
        echo "Employee deleted successfully.";
        header("Location: empdetails.php");
    } else {
        echo "Error deleting employee: " . mysqli_error($conn);
    }
} else {
    echo "ID parameter not provided.";
}

// Close database connection
mysqli_close($conn);
?>
