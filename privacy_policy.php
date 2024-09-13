<?php 
session_start();

include("navbar.php");

 ?>

<!DOCTYPE html>
<html lang="en">
<head>

<style>
/* General page styling */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    line-height: 1.6;
    background-color: #f4f4f4;
    color: #333;
}

/* Header Styling */
header {
    background-color: #2c3e50;
    color: white;
    padding: 20px 0;
    text-align: center;
}

header h1 {
    margin: 0;
    font-size: 2.5em;
    font-weight: 400;
}

/* Section Styling */
section {
    margin: 20px auto;
    padding: 20px;
    max-width: 900px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

section h2 {
    color: #2c3e50;
    font-size: 1.8em;
    margin-top: 20px;
    border-bottom: 2px solid #2c3e50;
    padding-bottom: 10px;
}

section p {
    font-size: 1.1em;
    margin-bottom: 15px;
    color: #555;
    line-height: 1.8;
}



/* Links inside content */
a {
    color: #3498db;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy Policy</title>
    <link rel="stylesheet" href="styles.css"> <!-- Optional external CSS -->
</head>
<body>
    <header>
        <h1>Privacy Policy</h1>
    </header>
    
    <section>
        <h2>1. Information We Collect</h2>
        <p>We collect information that you voluntarily provide to us when registering or using our services, including your name, email address, and any other data you choose to share.</p>
        
        <h2>2. How We Use Your Information</h2>
        <p>Your information is used to improve the website, provide services, and communicate with you. We do not sell or share your data with third parties without your consent.</p>
        
        <h2>3. Cookies</h2>
        <p>We use cookies to enhance your experience on our website. You can adjust your browser settings to reject cookies if you prefer.</p>
        
        <h2>4. Security</h2>
        <p>We take reasonable steps to protect your personal information, but no method of transmission over the internet is 100% secure.</p>

        <!-- Add more sections as needed -->
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



</body>
</html>
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