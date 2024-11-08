<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

function fetch_users($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $result = curl_exec($ch);
    if (!$result) {
        die('Curl error: "' . curl_error($ch) . '" - Code: ' . curl_errno($ch));
    }
    curl_close($ch);
    return json_decode($result, true);
}

$companyA_users = fetch_users('http://pawanaditya.tech/users.php');
echo "<pre>";
print_r($companyA_users);
echo "</pre>";
?>
