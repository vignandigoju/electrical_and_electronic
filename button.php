<?php
require 'vendor/autoload.php';

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

// Database connection
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'maintenance';

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create a Slim app
$app = AppFactory::create();

// Define a route for updating the issue status
$app->get('/updateIssueStatus/{id}', function (Request $request, Response $response, $args) use ($conn) {
    $id = $args['id'];

    // Query to update the appointment status
    $sql = "UPDATE issue SET status = 'completed' WHERE iid = '$id' ";

    if ($conn->query($sql) === TRUE) {
        // Return a JSON response after a successful update
        $response->getBody()->write(json_encode(['status' => 'success', 'message' => 'Issue Closed']));
    } else {
        // Return a JSON response in case of an error
        $response->getBody()->write(json_encode(['status' => 'error', 'message' => 'Error updating issue']));
    }

    return $response->withHeader('Content-Type', 'application/json');
});

// Run the Slim app
$app->run();

// Close the database connection
$conn->close();
?>
