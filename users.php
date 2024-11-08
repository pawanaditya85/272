<?php
header("Access-Control-Allow-Origin: *"); // Allowing all domains for demonstration purposes, replace '*' with specific domain names for security

$list_of_users_A = ['Aditya', 'Balakrishna', 'Charan'];
echo json_encode($list_of_users_A);
?>
