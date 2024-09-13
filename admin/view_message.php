<?php 
session_start();
if(!isset($_SESSION["email"])){
  header("location:../index.php");
}

include("navbar.php");

 ?>

<?php
// view_message.php

// Get the message ID from the URL
$id = $_GET['id'];

// Database connection
$conn = new mysqli('localhost', 'root', '', 'renthouse');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the message details
$sql = "SELECT name, email, subject, message FROM contactus WHERE id = $id";
$result = $conn->query($sql);
$message = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Message</title>
	
	
	
	<style>


/* Styles for the message container */
.message-container {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    color: #333;
    padding: 20px;
    margin: 0;
}

/* Heading style */
.message-container h1 {
    text-align: center;
    color: #2c3e50;
    margin-bottom: 30px;
    font-size: 26px;
    text-transform: uppercase;
    letter-spacing: 1px;
}

/* Paragraph style for message details */
.message-container p {
    font-size: 18px;
    line-height: 1.6;
    margin-bottom: 15px;
}

/* Bold labels for message fields */
.message-container p strong {
    color: #2980b9;
    display: inline-block;
    width: 120px;
}

/* Style for the 'Reply' link */
.message-container a {
    display: inline-block;
    background-color: #2980b9;
    color: white;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 5px;
    font-size: 16px;
    margin-top: 20px;
}

.message-container a:hover {
    background-color: #1c5d80;
}

/* Message not found styling */
.message-container p:not(:last-child) {
    border-bottom: 1px solid #ddd;
    padding-bottom: 10px;
    margin-bottom: 10px;
}

.message-container p:last-child {
    color: #e74c3c;
    font-weight: bold;
}


</style>
</head>
<body>
 <div class="message-container">
        <h1>View Message</h1>

        <?php if ($message): ?>
            <p><strong>Name:</strong> <?php echo $message['name']; ?></p>
            <p><strong>Email:</strong> <?php echo $message['email']; ?></p>
            <p><strong>Subject:</strong> <?php echo $message['subject']; ?></p>
            <p><strong>Message:</strong> <?php echo $message['message']; ?></p>
        
            <br><a href="mailto:<?php echo $message['email']; ?>">Reply to this message</a>
        <?php else: ?>
            <p>Message not found.</p>
        <?php endif; ?>
    </div>

</body>
</html>

<?php
$conn->close();
?>
