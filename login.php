<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
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

<body>
<form action="login.php"   method ="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username"required><br><br>
    <label for="password">Password:</label>
    <input type="password" id="password"  name="password"required><br><br>
    <input class="login" type="submit" value="Login" name="summit">
</form>

</body>
</html>

<?php

// Define database connection parameters
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_dbname";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Login form submission handler

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $username = filter_var($_POST['username'], FILTER_SANITIZE_SPECIAL_CHARS, 20);
        $password = $_POST['password'];



        if (empty($username) || empty($password)) {
            $_SESSION["empty"] = "All fields are required";
            header("Location: login.php?username_or_password");
        }

        $sql = "SELECT * FROM user WHERE username = '$username' ";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);


            if (password_verify($password, $user['password'])) {
                $_SESSION['user'] = $user;
                $_SESSION['authenticated'] = true;
                $_SESSION['message'] = "Successful Login";
                header("location: dashboard.php");
            }
        } else {
            $_SESSION["user_not_found"] = "User not found";
            header('location: login.php?user_not_found');
        }

        $conn->close();

    } ?>
