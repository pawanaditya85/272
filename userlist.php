<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

function fetch_users($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Keep this if SSL certificate validation is not needed
    $result = curl_exec($ch);
    if (!$result) {
        echo 'Curl error: "' . curl_error($ch) . '" - Code: ' . curl_errno($ch);
        curl_close($ch);
        return null;
    }
    curl_close($ch);
    return json_decode($result, true);
}

$companyA_users = fetch_users('https://pawanaditya.tech/users.php');
echo "<pre>";
if ($companyA_users) {
    print_r($companyA_users);
} else {
    echo "Failed to fetch users.";
}
echo "</pre>";

echo "If you see this, PHP is running fine up to here.";
?>

