<?php 
session_start();

// Include the navigation bar
include("navbar.php");


// Database connection parameters
$host = 'localhost'; // Change if different
$db = 'renthouse'; // Replace with your database name
$user = 'root'; // Replace with your MySQL username
$pass = ''; // Replace with your MySQL password

// Create a connection to the MySQL database
$conn = new mysqli($host, $user, $pass, $db);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Prepare an SQL statement to insert data into the contactus table
    $stmt = $conn->prepare("INSERT INTO contactus (name, email, subject, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $subject, $message); // "ssss" indicates that all parameters are strings

    // Execute the statement
    if ($stmt->execute()) {
        // Store success message in session
        $_SESSION['success_message'] = "Message submitted successfully!";
        // Redirect to the original page to display the message
        header("Location: contactus.php");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and the connection
    $stmt->close();
    $conn->close();
}
?>

<style>
/* Success notification styling */
.notification {
    padding: 10px;
    margin: 10px 0;
    border-radius: 5px;
    text-align: center;
    font-size: 1em;
}

.notification.success {
    background-color: #4CAF50; /* Green background for success */
    color: white;
}

/* Other styles */
.container-intro-section {
  width: 100%;
  height: 100vh; /* Full height of the viewport */
  padding: 20px; /* Space on the right and left sides */
  box-sizing: border-box; /* Includes padding in the width calculation */
  margin-top: -250px;
}

.intro-container {
  height: 100%;
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
}

.logo-card {
  flex: 1;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 20px;
  background: rgba(255, 255, 255, 0.4); /* 40% transparent white background */
}

.logo-card img {
  height: 200px; /* Adjust the height of the logo */
  width: auto; /* Maintain aspect ratio */
}

.content-card {
  flex: 2;
  padding: 20px;
  color: #000; /* Text color */
  text-align: left;
}

h1 {
	font-family: 'sans-serif';
	font-size: 2.5em; /* Adjust font size as needed */
	margin-bottom: 10px;
}

p {
	font-family: 'sans-serif';
	font-size: 1.2em; /* Adjust font size as needed */
	margin: 10px 0;
}

/* Container for the entire contact section */
.container-contact-section {
  width: 100%;
  height: 100vh; /* Full height of the viewport */
  padding: 20px; /* Space on the right and left sides */
  box-sizing: border-box; /* Includes padding in the width calculation */
  display: flex;
  justify-content: center;
  align-items: center;
}

/* Container for the card view inside the contact section */
.contact-container {
  width: 100%;
  max-width: 800px; /* Optional: Set a maximum width */
}

/* Styling for the form element */
form {
  display: flex;
  flex-direction: column;
  gap: 10px; /* Space between form elements */
}

/* Styling for input and textarea elements */
form input, form textarea {
  padding: 10px;
  border: 1px solid #ddd;
  border-radius: 5px;
  font-size: 1em;
  width: calc(100% - 20px); /* Full width of card-view minus padding */
  box-sizing: border-box; /* Includes padding in the width calculation */
}

/* Styling for textarea element */
form textarea {
  resize: vertical;
  min-height: 150px;
}

/* Styling for form buttons */
form button {
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  font-size: 1em;
  cursor: pointer;
  width: calc(50% - 10px); /* Adjust width to fit within card-view with spacing */
  box-sizing: border-box; /* Includes padding in the width calculation */
}

/* Specific styling for submit button */
form button[type="submit"] {
  background-color: #4CAF50; /* Green background for the submit button */
  color: white;
}

/* Specific styling for reset button */
form button[type="reset"] {
  background-color: #f44336; /* Red background for the clear button */
  color: white;
}

/* Modal container */
.modal {
  display: none; /* Hidden by default */
  position: fixed; 
  z-index: 1; 
  padding-top: 100px; 
  left: 0;
  top: 0;
  width: 100%;
  height: 100%; 
  background-color: rgba(0,0,0,0.5); /* Black background with opacity */
}

/* Modal content */
.modal-content {
  background-color: #fff;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 50%; 
  text-align: center;
  border-radius: 10px;
}

/* Close button */
.close-btn {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

footer {
    text-align: center;
    padding: 10px;
    background-color: #2c3e50;
    color: white;
    margin-top: 20px;
    width: 100%;
    left: 0;
    opacity: 1; /* Visible by default */
    transition: opacity 0.3s ease-in-out; /* Smooth transition for scroll */
    position: relative; /* Relative position to the content */
}

footer.show {
    opacity: 1; /* Ensure the footer is visible when scrolled */
}
</style>

<section class="container-intro-section">
    <div class="intro-container">
        <div class="logo-card">
            <img src="images/logo.jpeg" alt="RentNest Logo" />
        </div>
        <div class="content-card">
            <h1>Contact Us</h1>
            <p>If you have any questions or need assistance, please don't hesitate to reach out to us. We're here to help you with any inquiries regarding our rental properties or services.</p>
            <p>You can contact us via email, phone, or by filling out the contact form below. Our dedicated team is always ready to provide you with the support you need and ensure your experience with RentNest is exceptional.</p>
            <p>We look forward to hearing from you and assisting you in finding your ideal rental property. Thank you for choosing RentNest!</p>           
        </div>
    </div>
</section>

<section class="container-contact-section">
    <div class="contact-container">
        <form action="contactus.php" method="post">
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <input type="text" name="subject" placeholder="Subject" required>
            <textarea name="message" placeholder="Your Message" required></textarea>
            <button type="submit">Submit</button>
            <button type="reset">Clear</button>
        </form>
    </div>
</section>

<?php

// Display success message if it exists
if (isset($_SESSION['success_message'])) {
    // Output a script to display the popup
    echo "<script type='text/javascript'>
        window.onload = function() {
            // Show the modal when the page loads
            document.getElementById('successModal').style.display = 'block';
        }
    </script>";
    
    // Clear the success message after displaying it
    unset($_SESSION['success_message']);
}
?>
<!-- The Modal -->
<div id="successModal" class="modal">
  <div class="modal-content">
    <p>Your message has been successfully submitted!</p>
    <button class="close-btn" onclick="closeModal()">OK</button>
  </div>
</div>

<script>
// Function to close the modal
function closeModal() {
    document.getElementById('successModal').style.display = 'none';
}
</script>

<section class="footer-section">
    <footer class="show">
        &copy; RentNest 2024. All rights reserved.
        <br>
        <a href="terms_of_service.php">Terms of Service</a> |
        <a href="privacy_policy.php">Privacy Policy</a> |
        <a href="contactus.php">Contact Us</a>
    </footer>
</section>

<script>
    window.addEventListener('scroll', function() {
        var footer = document.querySelector('.footer-section footer');
        if (window.scrollY > 200) { // Adjust the scroll distance as needed
            footer.classList.add('show');
        } else {
            footer.classList.remove('show');
        }
    });
</script>
