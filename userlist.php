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
$companyB_url = 'https://pawanaditya.tech/user1.php';
$companyC_url = 'https://pawanaditya.tech/user2.php';
$companyD_url = 'https://pawanaditya.tech/user3.php';

// Fetching users from each company
$companyA_users = fetch_users($companyA_url);
$companyB_users = fetch_users($companyB_url);
$companyC_users = fetch_users($companyC_url);
$companyD_users = fetch_users($companyD_url);

// Outputting the fetched data under separate subheadings
echo "<h1>Users from Company A</h1>";
echo "<ul>";
foreach ($companyA_users as $user) {
    $userName = is_array($user) ? $user['name'] : $user;
    echo "<li>" . htmlspecialchars($userName) . "</li>";
}
echo "</ul>";

echo "<h1>Users from Company B</h1>";
echo "<ul>";
foreach ($companyB_users as $user) {
    $userName = is_array($user) ? $user['name'] : $user;
    echo "<li>" . htmlspecialchars($userName) . "</li>";
}
echo "</ul>";

echo "<h1>Users from Company C</h1>";
echo "<ul>";
foreach ($companyC_users as $user) {
    $userName = is_array($user) ? $user['name'] : $user;
    echo "<li>" . htmlspecialchars($userName) . "</li>";
}
echo "</ul>";

echo "<h1>Users from Company D</h1>";
echo "<ul>";
foreach ($companyD_users as $user) {
    $userName = is_array($user) ? $user['name'] : $user;
    echo "<li>" . htmlspecialchars($userName) . "</li>";
}
echo "</ul>";

echo "<p>If you see this, PHP is running fine up to here.</p>";
?>
