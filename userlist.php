<?php
function fetch_users($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Not recommended for production, only use if SSL/TLS certificates are not configured
    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Curl error: ' . curl_error($ch);
    }
    curl_close($ch);
    return json_decode($result, true);
}

// Adjust the URLs to point to where the files are actually hosted
$companyA_users = fetch_users('http://pawanaditya.tech/users.php'); // Your server
$companyB_users = fetch_users('http://teammateBdomain.com/companyB.php'); // Teammate's domain for Company B
$companyC_users = fetch_users('http://teammateCdomain.com/companyC.php'); // Teammate's domain for Company C

$all_users = array_merge($companyA_users, $companyB_users, $companyC_users);

echo "<ul>";
foreach ($all_users as $user) {
    echo "<li>$user</li>";
}
echo "</ul>";
?>
