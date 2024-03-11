<?php
// Set the response headers to indicate that this is a readiness probe
header('Content-Type: application/json');

// Attempt to connect to the database
$link = mysqli_connect('DB_HOST', 'DB_USER', 'DB_PASSWORD', 'DB_NAME');

// Check if the database connection is successful
if ($link) {
    // Database connection is successful
    $response = array(
        'status' => 'ok',
        'message' => 'Database is ready'
    );
} else {
    // Database connection failed
    $response = array(
        'status' => 'error',
        'message' => 'Database connection failed'
    );
}

// Convert the response array to JSON format
$jsonResponse = json_encode($response);

// Output the JSON response
echo $jsonResponse;
?>
