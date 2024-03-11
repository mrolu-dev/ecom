<?php
// Set the response headers to indicate that this is a liveliness probe
header('Content-Type: application/json');

// Define a simple response for the liveliness probe
$response = array(
    'status' => 'ok',
    'message' => 'Service is alive and kicking'
);

// Convert the response array to JSON format
$jsonResponse = json_encode($response);

// Output the JSON response
echo $jsonResponse;
?>
