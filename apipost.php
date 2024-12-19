<?php 
$apiUrl = 'https://localhost:7296/api/Movies';

// --- POST Request: Add a New Movie ---
$title = $_POST['title'];
$genre = $_POST['genre'];
$date = $_POST['date'];


$data = [
    'title' => $title,      // Example data
    'genre' => $genre,
    'releaseDate' => $date
];

$curlPost = curl_init($apiUrl);

curl_setopt($curlPost, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curlPost, CURLOPT_POST, true); // Set HTTP method to POST
curl_setopt($curlPost, CURLOPT_POSTFIELDS, json_encode($data)); // Set the request body
curl_setopt($curlPost, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json', // Set Content-Type header
]);
curl_setopt($curlPost, CURLOPT_SSL_VERIFYPEER, false); // Disable SSL certificate verification
curl_setopt($curlPost, CURLOPT_SSL_VERIFYHOST, false); // Ignore hostname check

$responsePost = curl_exec($curlPost);

if (curl_errno($curlPost)) {
    echo 'Error in POST: ' . curl_error($curlPost) . "\n";
} else {
    $httpCodePost = curl_getinfo($curlPost, CURLINFO_HTTP_CODE);
    echo "POST Response Code: $httpCodePost\n";
    echo "POST Response Body: $responsePost\n";
}

curl_close($curlPost);
header('location:index.php');