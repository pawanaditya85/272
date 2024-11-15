<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="styles.css">
    <style>
    /* General Reset */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* Body and Font Styling */
    body {
        font-family: Arial, sans-serif;
    }

    /* Header Styling */
    header {
        background: linear-gradient(to right, #6a11cb, #2575fc);
        padding: 20px 0;
        color: white;
        text-align: center;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    /* Logo Text Styling */
    .logo h1 {
        font-size: 2.5rem;
        margin-bottom: 10px;
    }

    .logo h2 {
        font-size: 1.2rem;
        font-weight: 300;
    }

    /* Navigation Bar Styling */
    nav ul {
        list-style-type: none;
        display: flex;
        justify-content: center;
        margin-top: 10px;
    }

    nav ul li {
        margin: 0 15px;
    }

    nav ul li a {
        text-decoration: none;
        color: white;
        font-size: 1.1rem;
        font-weight: bold;
        padding: 8px 15px;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    /* Navigation Hover Effects */
    nav ul li a:hover {
        background-color: rgba(255, 255, 255, 0.2);
        border-radius: 5px;
    }

    /* Main Section Styling */
    main {
        padding: 20px;
        text-align: center;
    }

    /* Footer Styling */
    footer {
        text-align: center;
        padding: 10px 0;
        background-color: #f8f8f8;
        box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
    }

    footer p {
        font-size: 0.9rem;
        color: #666;
    }
</style>
</head>
<body>
    <header>
        <h1>Contact Us</h1>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="service.html">Services</a></li>
                <li><a href="news.html">News</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="user_management.php">User Management</a></li>
                <li><a href="login.html">Admin Login</a></li>
            </ul>
        </nav>
    </header>

    <section>
        <h2>Get in Touch</h2>
        <p>You can reach us through the following contact information:</p>

        <?php
        // Reading contacts from a text file
        $contacts = file_get_contents('contacts.txt');
        echo nl2br($contacts); // Display contacts with line breaks
        ?>
    </section>
</body>
</html>
