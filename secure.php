<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hardcoded admin credentials (in real-world use, use a database or more secure method)
    $admin_user = 'admin';
    $admin_pass = 'password';  // Replace 'password' with a stronger password

    if ($username === $admin_user && $password === $admin_pass) {
        $_SESSION['loggedin'] = true;
    } else {
        echo '<p style="color:red;">Invalid credentials</p>';
        exit;
    }
}

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.html');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Section</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .user-list {
            background-color: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .logout-btn {
            background-color: #dc3545;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .logout-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="user-list">
        <h1>Current Users</h1>
        <ul>
            <li>Mary</li>
            <li>John</li>
            <li>Alex</li>
            <li>Pawan</li>
            <li>Aditya</li>
        </ul>
    </div>
    <form action="logout.php" method="post">
        <button class="logout-btn" type="submit">Logout</button>
    </form>
</body>
</html>
