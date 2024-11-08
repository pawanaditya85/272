<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *"); // Enable CORS to allow fetching this data remotely

echo json_encode(["Alice", "Bob", "Charlie"]); // Example user list
?>
