<?php 
session_start();
if(isset($_SESSION["email"])){
  header("location:index.php");
}
include("navbar.php");

 ?>
<style>

/* Add a background image to the section */
.sign-in-form-section {
    background-image: url('images/img1.jpg'); /* Replace with your image path */
    background-size: cover; /* Cover the entire section */
    background-position: center; /* Center the background image */
    background-repeat: no-repeat; /* Prevent tiling */
    min-height: 100vh; /* Full viewport height */
    display: flex;
    justify-content: center;
    align-items: center;
}

.container {
    background: rgba(0, 0, 0, 0.6); /* 20% transparent black background */
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
    text-align: center;
	margin-top: -150px;
}

.btn-info {
    width: 200px;
    margin: 10px;
}

h3 {
    color: #fff; /* Dark ash color */
    font-weight: bold;
	font-size: 30px; /* Increased font size */
    margin-bottom: 20px; /* Adjust margin as needed */
}

hr {
    border: 1px solid #fff; /* Dark ash color for horizontal line */
    margin: 10px 0; /* Adjust margin as needed */
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

  <section class="container-fluid sign-in-form-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 sign-up">
				<h3>Choose Your Login Type</h3>
                <hr>
                <button type="submit" class="btn btn-info" onclick="window.location.href='tenant-login.php'">Tenant Login</button>
                <button type="submit" class="btn btn-info" onclick="window.location.href='owner-login.php'">Owner Login</button>
                <button type="submit" class="btn btn-info" onclick="window.location.href='admin-login.php'">Admin Login</button>
            </div>
        </div>
    </div>
</section>

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
