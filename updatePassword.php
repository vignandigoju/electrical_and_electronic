<?php
session_start();

$user = isset($_SESSION["username"]) ? $_SESSION["username"] : null;
if ($user) {
    $conn = mysqli_connect("localhost", "root", "", "maintanence");
    $oldPassword = mysqli_real_escape_string($conn, $_POST['oldPassword']);
    $newPassword = mysqli_real_escape_string($conn, $_POST['newPassword']);

    // Query to check old password
    $checkQuery = "SELECT * FROM login WHERE username='$user' AND password='$oldPassword'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        // Old password matches, update the password
        $updateQuery = "UPDATE login SET password='$newPassword' WHERE username='$user'";
        $updateResult = mysqli_query($conn, $updateQuery);
        if ($updateResult) {
            echo "Password updated successfully.";
        } else {
            echo "Error updating password.";
        }
    } else {
        echo "Incorrect old password.";
    }
} else {
    echo "User not logged in.";
}
?>
