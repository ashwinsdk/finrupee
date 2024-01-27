<?php
require "func.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

connect("localhost","root","","student-portal");
// Function to register a user
function registerUser($username, $password) {
    // In a real application, this data should be stored securely in a database
    // For simplicity, let's just display the registered user details
    echo "User Registered Successfully!<br>";
    echo "Username: $username<br>";
    echo "Password: $password<br>";
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = connect("localhost","root","","student-portal");
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (!empty($username) && !empty($password)) {
        $insert = "INSERT INTO sample_user(user,password) 
        VALUES('$username','$password')";

        $query=mysqli_query($conn, $insert);
        if($query == true){
         header('location:sample_login.php');
       }else{
         echo 'failed';
       }
        //registerUser($username, $password);
    } else {
        $registrationError = "Both username and password are required.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register Page</title>
</head>
<body>
    <h2>Register</h2>
    <form method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <br>
        <input type="submit" value="Register">
    </form>
    <?php
    if (isset($registrationError)) {
        echo "<p>$registrationError</p>";
    }
    ?>
</body>
</html>

