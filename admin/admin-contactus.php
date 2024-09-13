<?php 
session_start();
if(!isset($_SESSION["email"])){
  header("location:../index.php");
}

include("navbar.php");

 ?>
 

<?php
// admin_contact.php

// Database connection
$conn = new mysqli('localhost', 'root', '', 'renthouse');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all contact messages
$sql = "SELECT id, name, email, subject, message FROM contactus ORDER BY id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us Management</title>
   
	<style>
		body {
			 background-color: #a8acfb;
		}

        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <h1>Contact Us Management</h1>

    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Subject</th>
            <th>Message</th>
             <th>Action</th>
        </tr>

        <?php
        // Display each message in the table
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['name']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['subject']}</td>
						 <td>{$row['message']}</td>
                        
                        <td><a href='view_message.php?id={$row['id']}'>View/Reply</a></td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No messages found.</td></tr>";
        }
        ?>

    </table>
</body>
</html>

<?php
$conn->close();
?>
