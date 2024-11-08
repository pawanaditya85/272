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
$annotatedLocalUsers = array_map(function($user) {
    return $user . " (Local)"; // Add annotation for local users
}, $localUsers);

// URLs of the remote user lists
$remoteUrls = [
    "http://www.hsamreen.infinityfreeapp.com/user_list.php", // Assuming this is accessible
    "http://companyc.com/usersC.php",
    "http://companyd.com/usersD.php"  // Assuming this is accessible, corrected a repeated URL
];

// Fetch and annotate remote users
$allUsers = $annotatedLocalUsers; // Start with local users already annotated
foreach ($remoteUrls as $url) {
    $remoteUsers = fetch_users($url);
    $annotatedRemoteUsers = array_map(function($user) use ($url) {
        $domain = parse_url($url, PHP_URL_HOST); // Extract domain from URL
        return $user . " (" . $domain . ")"; // Add domain as annotation
    }, $remoteUsers);
    $allUsers = array_merge($allUsers, $annotatedRemoteUsers); // Merge with previous list
}

// Display all users with annotations
echo "<ul>";
foreach ($allUsers as $user) {
    echo "<li>$user</li>";
}
echo "</ul>";
?>
