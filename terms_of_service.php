<?php 
session_start();

include("navbar.php");

 ?>

<!DOCTYPE html>
<html lang="en">
<head>

<style>
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
    <title>Terms of Service</title>
    <link rel="stylesheet" href="styles.css"> <!-- Optional external CSS -->
</head>
<body>
    <header>
        <h1>Terms of Service</h1>
    </header>
    
    <section>
        <h2>1. Acceptance of Terms</h2>
        <p>By accessing and using this website, you agree to comply with and be bound by the following terms and conditions. Please review these terms carefully.</p>
        
        <h2>2. Modification of Terms</h2>
        <p>We reserve the right to modify these terms at any time. Any changes will be effective immediately upon posting on the site.</p>
        
        <h2>3. User Responsibilities</h2>
        <p>Users are responsible for their actions while using the website and must ensure their activities comply with local laws.</p>
        
        <h2>4. Limitation of Liability</h2>
        <p>We are not liable for any damages that may arise from the use of our services or from any information provided on the site.</p>

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

</body>
</html>

