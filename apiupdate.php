<?php
$apiUrl = 'https://localhost:7296/api/Movies';

// --- PUT Request: Update a Movie ---
$movieIdToUpdate = $_POST['update_id']; // Replace with the ID of the movie to update
$updateUrl = $apiUrl . '/' . $movieIdToUpdate;

$title = $_POST['uptitle'];
$genre = $_POST['upgenre'];
$date = $_POST['update'];

// Data to update (example)
$updatedData = [
    'id' => $movieIdToUpdate,
    'title' => $title, // New title
    'genre' => $genre,
    'releaseDate' => $date // Updated release year
];

print_r($updatedData);

$curlUpdate = curl_init($updateUrl);

curl_setopt($curlUpdate, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curlUpdate, CURLOPT_CUSTOMREQUEST, 'PUT'); // Set HTTP method to PUT
curl_setopt($curlUpdate, CURLOPT_POSTFIELDS, json_encode($updatedData)); // Set the updated data
curl_setopt($curlUpdate, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json', // Set Content-Type header

]);
curl_setopt($curlUpdate, CURLOPT_SSL_VERIFYPEER, false); // Disable SSL certificate verification
curl_setopt($curlUpdate, CURLOPT_SSL_VERIFYHOST, false); // Ignore hostname check

$responseUpdate = curl_exec($curlUpdate);

if (curl_errno($curlUpdate)) {
    echo 'Error in PUT: ' . curl_error($curlUpdate) . "\n";
} else {
    $httpCodeUpdate = curl_getinfo($curlUpdate, CURLINFO_HTTP_CODE);
    echo "PUT Response Code: $httpCodeUpdate\n";
    echo "PUT Response Body: $responseUpdate\n";
}

curl_close($curlUpdate);
header('location:index.php');

?>

