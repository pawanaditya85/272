<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Management</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Header (same as index.html) -->
    <header>
        <div class="logo">
            <h1>Professional Photographer</h1>
            <h2>Welcome to User Management</h2>
        </div>
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

    <!-- Main Content -->
    <main>
        <!-- User Creation Form -->
        <section>
            <h2>Create New User</h2>
            <form action="user_management.php" method="post">
                <input type="text" name="first_name" placeholder="First Name" required>
                <input type="text" name="last_name" placeholder="Last Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="text" name="home_address" placeholder="Home Address" required>
                <input type="text" name="home_phone" placeholder="Home Phone" required>
                <input type="text" name="cell_phone" placeholder="Cell Phone" required>
                <button type="submit" name="create_user">Create User</button>
            </form>
        </section>

        <!-- User Search Form -->
        <section>
            <h2>Search Users</h2>
            <form action="user_management.php" method="get">
                <input type="text" name="search" placeholder="Search by Name, Email, or Phone" required>
                <button type="submit" name="search_user">Search</button>
            </form>
        </section>

        <!-- PHP Code to Handle Form Submissions and Display Results -->
        <?php
        // Database connection
        $conn = new mysqli('127.0.0.1', 'admin', 'Aditya@830', 'photography_userdb');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Handle User Creation
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create_user'])) {
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];
            $home_address = $_POST['home_address'];
            $home_phone = $_POST['home_phone'];
            $cell_phone = $_POST['cell_phone'];

            $sql = "INSERT INTO users (first_name, last_name, email, home_address, home_phone, cell_phone)
                    VALUES ('$first_name', '$last_name', '$email', '$home_address', '$home_phone', '$cell_phone')";

            if ($conn->query($sql) === TRUE) {
                echo "<p>New user created successfully</p>";
            } else {
                echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
            }
        }

        // Handle User Search
        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['search_user'])) {
            $search = $_GET['search'];
            $sql = "SELECT * FROM users WHERE first_name LIKE '%$search%' OR last_name LIKE '%$search%' OR email LIKE '%$search%' OR home_phone LIKE '%$search%' OR cell_phone LIKE '%$search%'";
            $result = $conn->query($sql);

            echo "<h2>Search Results</h2>";
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "Name: " . $row["first_name"]. " " . $row["last_name"]. " - Email: " . $row["email"]. " - Phone: " . $row["home_phone"] . " / " . $row["cell_phone"] . "<br>";
                }
            } else {
                echo "<p>No results found</p>";
            }
        }

        // Close the database connection
        $conn->close();
        ?>
    </main>

    <!-- Footer (same as index.html) -->
    <footer>
        <p>&copy; 2024 Photography Business</p>
    </footer>
</body>
</html>
