<?php 
session_start();

include("navbar.php");

 ?>
  <style>
.container-intro-section {
  width: 100%;
  height: 100vh; /* Full height of the viewport */
  padding: 20px; /* Space on the right and left sides */
  box-sizing: border-box; /* Includes padding in the width calculation */
}

.intro-container {
  height: 100%;
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
}

.card-view {
  display: flex;
  width: calc(100% - 40px); /* Full width minus padding */
  max-width: 1200px; /* Optional: Set a maximum width */
  background: rgba(255, 255, 255, 0.8); /* 20% transparent white background */
  border-radius: 20px;
  box-shadow: 0 0 15px rgba(0, 0, 0, 0.4);
  overflow: hidden;
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
  height: 400px; /* Set the height of the logo */
  width: 400px; /* Maintain aspect ratio */
}

.content-card {
  flex: 2;
  padding: 20px;
  color: #000; /* Text color */
  text-align: left;
}

h1 {
   font-family: 'sans-serif';
   font-size: 3em; /* Adjust font size as needed */
   margin-bottom: 10px;
}

p {
  font-size: 1.5em; /* Adjust font size as needed */
  margin: 0;
  font-family: 'sans-serif';
}

        h1 {
			font-family: 'sans-serif';
            text-align: center; /* Center the heading */
            font-weight: bold; /* Make the heading bold */
            color: #333; /* Optional: Set a color for the heading */
            margin-top: 20px; /* Optional: Add some margin at the top */
        }
		
		h2{
			font-family: 'sans-serif';
			text-align: center; /* Center the heading */
            font-weight: bold; /* Make the heading bold */
            color: #333; /* Optional: Set a color for the heading */
            margin-top: 15px; /* Optional: Add some margin at the top */
		}
</style>
  <br>
<section class="container-intro-section">
<h1>About Us</h1>
    <div class="intro-container">
        <div class="card-view">
            <div class="logo-card">
                <img src="logo.jpeg" alt="RentNest Logo" />
            </div>
			
            <div class="content-card">
                <h2>RentNest</h2>
                <p>RentNest is dedicated to transforming the rental experience. We believe that finding your ideal home should be a seamless and enjoyable journey. Whether you’re searching for a cozy apartment, a spacious house, or a luxury residence, RentNest is your trusted partner in the quest for the perfect rental property.</p>
                <br><p>With our extensive database of carefully curated listings, we offer a range of options to meet every need and preference. Our platform combines cutting-edge technology with a user-friendly interface, allowing you to easily browse, filter, and discover properties that align with your lifestyle and budget.</p>
                <br><p>At RentNest, we are committed to providing exceptional service and support throughout your rental journey. Our team of dedicated professionals is here to assist you every step of the way, ensuring that your experience is as smooth and stress-free as possible.</p>
                <p>Discover the ease of finding your next home with RentNest – where comfort and convenience meet.</p>
            </div>
        </div>
    </div>
</section>

