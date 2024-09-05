<!DOCTYPE html>
<html>
<head>
	<title>Contact Us</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="contact-container">
		<h1>Contact Us</h1>
		<form>
			<label for="name">Name:</label>
			<input type="text" id="name" name="name"><br><br>
			<label for="email">Email:</label>
			<input type="email" id="email" name="email"><br><br>
			<label for="message">Message:</label>
			<textarea id="message" name="message"></textarea><br><br>
			<input type="submit" value="Send">
		</form>
	</div>
</body>
</html>

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

<?php
// Configure your email address and subject
$to = "your_email@example.com";
$subject = "Contact Form Submission";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Validate form data
    if (empty($name) || empty($email) || empty($message)) {
        $error = "All fields are required.";
    } else {
        // Send email
        $headers = "From: $email";
        mail($to, $subject, $message, $headers);
        $success = "Thank you for contacting us!";
    }
}
?>

<!-- Contact Form -->


<!-- Display error or success message -->
<?php if (isset($error)) { echo "<p style='color: red;'>$error</p>"; } ?>
<?php if (isset($success)) { echo "<p style='color: green;'>$success</p>"; } ?>