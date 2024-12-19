<?php 
$apiUrl = 'https://localhost:7296/api/Movies';
// --- DELETE Request: Remove a Movie ---
$movieIdToDelete = $_POST["delete_id"]; // Example ID of the movie to delete
$deleteUrl = $apiUrl . '/' . $movieIdToDelete;

$curlDelete = curl_init($deleteUrl);

curl_setopt($curlDelete, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curlDelete, CURLOPT_CUSTOMREQUEST, 'DELETE'); // Set HTTP method to DELETE
curl_setopt($curlDelete, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json', // Set Content-Type header

]);
curl_setopt($curlDelete, CURLOPT_SSL_VERIFYPEER, false); // Disable SSL certificate verification
curl_setopt($curlDelete, CURLOPT_SSL_VERIFYHOST, false); // Ignore hostname check

$responseDelete = curl_exec($curlDelete);

if (curl_errno($curlDelete)) {
    echo 'Error in DELETE: ' . curl_error($curlDelete) . "\n";
} else {
    $httpCodeDelete = curl_getinfo($curlDelete, CURLINFO_HTTP_CODE);
    echo "DELETE Response Code: $httpCodeDelete\n";
    echo "DELETE Response Body: $responseDelete\n";
}

curl_close($curlDelete);

header('location:index.php');