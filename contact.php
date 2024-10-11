<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Contact Us</h1>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="news.html">News</a></li>
                <li><a href="contact.php">Contact</a></li>
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
