<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
 *, *::before, *::after {
    box-sizing: border-box;
    padding: 0;
    margin: 0;
    font-family: monospace;
 }


 body{
    background-color: black;
    color: #fff;
 }

 form { 
    padding: 20px;
    width: 50%;
    margin: 10px auto;
    border-radius: 20px;
    box-shadow: 2px 2px 10px skyblue;
 }

 input ,textarea {
    border: none;
     width: 100%; 
    outline: none;
    border-radius: 10px;
    margin-top: 5px;
    
 }
 input:focus{
    box-shadow: 2px 2px 10px rgb(0, 183, 255);
 }
.login{
    background-color: blue;
    
}

.login:hover    {
    color: #000;
    background-color: #fff;
}
.contact-container{
    margin: auto;
}

</style>
</head>
<body>
<form action="registration.php" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username"><br><br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password"><br><br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email"><br><br>
    <input type="submit" value="Register">
</form>

</body>
</html>

<?php
// Load .env file
//$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

// Get database credentials from .env file
$dbHost = getenv('DB_HOST');
$dbUsername = getenv('DB_USERNAME');
$dbPassword = getenv('DB_PASSWORD');
$dbName = getenv('DB_NAME');

// Create connection
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Registration form submission handler
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    // Hash password securely
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert user into database
    $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$hashedPassword', '$email')";
    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>

