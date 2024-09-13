<?php 
session_start();

include("navbar.php");

 ?>
 <style>
body, html {
  height: 100%;
  margin: 0;
}

.bg {
  /* The image used */
  background-image: url("images/housem2.jpg");

  /* Full height */
  height: 70%; 

  /* Center and scale the image nicely */
  background-position: bottom;
  background-repeat: no-repeat;
  background-size: cover;
}

.fa {
  padding: 20px;
  font-size: 30px;
  text-align: left;
  text-decoration: none;
  margin: 5px 2px;
}
.fa:hover {
    opacity: 0.7;
}
.fa-facebook {
  background: #3B5998;
  color: white;
}
.fa-linkedin {
  background: #007bb5;
  color: white;
}
.active-cyan-3 input[type=text] {
  border: 1px solid #4dd0e1;
  box-shadow: 0 0 0 1px #4dd0e1;
}


.overlay-container {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%); /* Center the container */
    background: rgba(0, 0, 0, 0.6); /* 20% transparent white background */
    padding: 20px;
    border-radius: 10px;
    text-align: center;
    color: #fff; /* White text color */
    width: 80%; /* Adjust width as needed */
    margin-top: -60px;
}

h1 {
    font-size: 5em; /* Adjust font size as needed */
    margin-bottom: 10px;
	font-family: 'sans-serif';
}

p {
    font-size: 1.5em; /* Adjust font size as needed */
    margin: 0;
	font-family: 'sans-serif';
}


.btn {
	margin-top:20px;
    display: inline-block;
    padding: 6px 12px; 
    font-size: 14px; 
    font-weight: bold;
    text-align: center;
    text-decoration: none;
    border-radius: 4px; 
	
    max-width: 120px;
    transition: background-color 0.3s, color 0.3s;
}

/* Primary button styles */
.btn-primary {
    background-color: #808080; 
    color: #fff; /* White text color */
    border: none;
}

.btn-primary:hover {
    background-color: #404040; 
    color: #fff; 
}

.btn-primary:active {
    background-color: #404040; 
}



</style>

<section class="container-fluid sign-in-form-section">
    <div class="bg">
        <div class="overlay-container">
            <h1>RentNest</h1>
            <p>Your trusted partner in finding the perfect home. Discover a wide range of rental properties tailored to your needs.</p>
            <a href="aboutus.php" class="btn btn-primary">More Info</a>
        </div>
    </div>
</section>



<div class="bg"></div><br>
<div class="container active-cyan-4 mb-4 inline">
	<form method="POST" action="search-property.php">
  <input class="form-control" type="text" placeholder="Enter location to search house." name="search_property" aria-label="Search">
  </form>
</div>
<br><br>
<?php 

include("property-list.php");

 ?>
 <br><br><br>

