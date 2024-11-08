<?php
header("Content-Type: text/html");
header("Access-Control-Allow-Origin: *"); // Enable CORS

// Function to fetch remote user data
function fetch_users($url) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_TIMEOUT, 30);
    $result = curl_exec($curl);
    if (!$result) {
        curl_close($curl);
        return ["Error retrieving data"]; // Handling connection failure
    }
    curl_close($curl);
    return json_decode($result, true);
}
// Local users list from usersA.php
$localUsers = json_decode(file_get_contents("http://pawanaditya.tech/users.php"), true);

// URLs of the remote user lists
$remoteUrls = [
    "http://companyb.com/usersB.php", // Assuming this is accessible
    "http://companyc.com/usersC.php",
    "http://companyc.com/usersC.php"  // Assuming this is accessible
];

// Fetch remote users
foreach ($remoteUrls as $url) {
    $remoteUsers = fetch_users($url);
    $localUsers = array_merge($localUsers, $remoteUsers);
}

// Display all users
echo "<ul>";
foreach ($localUsers as $user) {
    echo "<li>$user</li>";
}
echo "</ul>";
?>
