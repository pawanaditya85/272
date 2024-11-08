<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Function to fetch users from a URL using cURL
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
        return [];
    }
    curl_close($ch);
    return json_decode($result, true);
}

// URLs for each company
$companyA_url = 'https://pawanaditya.tech/users.php';
$companyB_url = 'https://ninjacoder.tech/users/get_local_users.php';
//$companyC_url = 'https://teammateCdomain.com/companyC.php';
//$companyD_url = 'https://teammateDdomain.com/companyD.php';

// Fetching users from each company
$companyA_users = fetch_users($companyA_url);
$companyB_users = fetch_users($companyB_url);
//$companyC_users = fetch_users($companyC_url);
//$companyD_users = fetch_users($companyD_url);

// Combining all users into one array
//$all_users = array_merge($companyA_users, $companyB_users, $companyC_users, $companyD_users);
$all_users = array_merge($companyA_users, $companyB_users);

// Outputting the fetched data
echo "<h1>Users from All Companies</h1>";
echo "<ul>";
foreach ($all_users as $user) {
    echo "<li>" . htmlspecialchars($user) . "</li>"; // Using htmlspecialchars to prevent XSS
}
echo "</ul>";

echo "<p>If you see this, PHP is running fine up to here.</p>";
?>
