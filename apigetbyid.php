<?php
$apiUrl = 'https://localhost:7296/api/Movies';

// --- GET Request: Retrieve a Movie by ID ---
$movieIdToGet = 2; // Replace with the ID of the movie you want to retrieve
$getByIdUrl = $apiUrl . '/' . $movieIdToGet;

$curlGetById = curl_init($getByIdUrl);

curl_setopt($curlGetById, CURLOPT_RETURNTRANSFER, true); // Get response as a string
curl_setopt($curlGetById, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json', // Set Content-Type header
  
]);
curl_setopt($curlGetById, CURLOPT_SSL_VERIFYPEER, false); // Disable SSL certificate verification
curl_setopt($curlGetById, CURLOPT_SSL_VERIFYHOST, false); // Ignore hostname check

$responseGetById = curl_exec($curlGetById);

if (curl_errno($curlGetById)) {
    echo 'Error in GET by ID: ' . curl_error($curlGetById) . "\n";
} else {
    $httpCodeGetById = curl_getinfo($curlGetById, CURLINFO_HTTP_CODE);
    echo "GET by ID Response Code: $httpCodeGetById\n";
    echo "GET by ID Response Body: $responseGetById\n";
}

curl_close($curlGetById);
?>
