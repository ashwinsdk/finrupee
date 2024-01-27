<?php
require "func.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
connect("localhost","root","","student-portal");

// Function to authenticate user
function authenticateUser($username, $password) {
    // Check hardcoded credentials (replace these with database queries in a real application)
    $validUsername = "user123";
    $validPassword = "password123";

    if ($username === $validUsername && $password === $validPassword) {
        return true;
    }
    return false;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (authenticateUser($username, $password)) {
        $_SESSION["username"] = $username; // Store username in session
        header("Location: welcome.php"); // Redirect to welcome page after successful login
        exit();
    } else {
        $loginError = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
<body>
    <h2>Login</h2>
    <form method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <br>
        <input type="submit" value="Login">
    </form>
    <?php
    if (isset($loginError)) {
        echo "<p>$loginError</p>";
    }
    ?>
</body>
</html>
