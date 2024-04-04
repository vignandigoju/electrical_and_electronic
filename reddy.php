<?php
require_once('dbconfig.php');

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $eid = $_POST['eid'];
    $name = $_POST['name'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $installation = $_POST['installation'];
    $warranty = $_POST['warranty'];
    $warrantyend = $_POST['warrantyend'];


    $insertData = "INSERT INTO eqdetails (eid, name, type, price, installation, warranty, warrantyend) VALUES('$eid', '$name', '$type', '$price', '$installation', '$warranty', '$warrantyend')";

    $response = array();

    if (mysqli_query($dbconn, $insertData)) {
        $id = mysqli_insert_id($dbconn);
        $response['status'] = 'success';
        $response['message'] = 'Register Successfully';
        $response['u_id'] = $id; // Include the inserted ID for reference
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Register Failed';
        $response['error'] = mysqli_error($dbconn); // Include the MySQL error message
    }

    header('Content-Type: application/json; charset=UTF-8');
    echo json_encode($response);
} else {
    // Handle non-POST requests (e.g., return an error response)
    $response = array('status' => 'error', 'message' => 'Invalid request method.');
    header('Content-Type: application/json; charset=UTF-8');
    echo json_encode($response);
}
?>