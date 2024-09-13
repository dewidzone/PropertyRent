<?php
session_start();
if (isset($_SESSION["email"])) {
    header("location:owner/owner-index.php");
    exit();
}

include("navbar.php");
include("owner-engine.php"); // Make sure validate() function is included

// Connect to the database
$db = new mysqli('localhost', 'root', '', 'renthouse');
if ($db->connect_error) {
    die("Error connecting to the database");
}

// Initialize variables
$login_error = '';

if (isset($_POST['owner_login'])) {
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);

    // Check if the email exists in the database
    $sql = "SELECT * FROM owner WHERE email='$email' LIMIT 1";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $stored_password = $row['password'];

        // Verify the password
        if ($password === $stored_password) { // Use password_verify() if hashed passwords
            $_SESSION["email"] = $email;
            header("location:owner/owner-index.php");
            exit();
        } else {
            $login_error = 'Incorrect password.';
        }
    } else {
        $login_error = 'Email not found.';
    }
}
?>

<style>

body {
  background-image: url('images/housem.jpg'); /* Path relative to the PHP file */
  background-size: cover; /* Cover the entire page */
  background-position: center; /* Center the background image */
  background-repeat: no-repeat; /* Prevent tiling */
  min-height: 100vh; /* Full viewport height */
  margin: 0; /* Remove default margin */
  position: relative; /* Ensure the overlay is positioned correctly */
}

.container {
    width: 90%; /* Responsive width */
    max-width: 400px; /* Maximum width */
    min-height: 400px; /* Minimum height */
    padding: 20px;
    background: linear-gradient(135deg, #6a11cb, #aad3f9); /* Gradient background */
    background-size: 200% 200%; /* Ensure the gradient covers the whole container */
    border-radius: 10px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
    box-sizing: border-box; /* Ensure padding and border are included in the width */
    animation: gradientMotion 2s ease infinite; /* Add gradient motion */
}

h3 {
    text-align: center;
    font-weight: bold;
}

.form-group {
    margin-bottom: 15px;
}

.btn-primary {
    border-radius: 5px; /* Rounded corners for button */
}

@keyframes gradientMotion {
    0% {
        background-position: 0% 0%;
    }
    50% {
        background-position: 100% 100%;
    }
    100% {
        background-position: 0% 0%;
    }
}

.form-control {
    border-radius: 5px; /* Rounded corners for inputs */
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
	margin-top: 120px
}

footer.show {
    opacity: 1; /* Ensure the footer is visible when scrolled */
}
</style>

<div class="container">
  <h3 style="font-weight: bold; text-align: center;">Owner Login</h3><hr><br><br>
  <form method="POST">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required>
    </div>
    <div class="form-group">
     <a href="forgot-password-owner.php" style="color: #ffffff; text-decoration: none;">Forgot your Password?</a>

    </div>
    <center><input type="submit" id="submit" name="owner_login" class="btn btn-primary btn-block" value="Login"></center>
  </form>

  <?php
  if (!empty($login_error)) {
      echo "<div class='alert alert-danger'>$login_error</div>";
  }
  ?>
</div>


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