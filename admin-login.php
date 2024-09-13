<?php 
session_start();
if(isset($_SESSION["email"])){
  header("location:admin/admin-index.php");
}

include("navbar.php");
include("admin-engine.php");

 ?>


    <style>
body {
     background-color: #c3ddf5;
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
    animation: gradientMotion 4s ease infinite; /* Add gradient motion */
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

    </style>

   <div class="container">
        <h3 style="font-weight: bold; text-align: center;">Admin Login</h3>
        <hr>
        <form method="POST">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required>
            </div>
            <center><input type="submit" id="submit" name="admin_login" class="btn btn-primary btn-block" value="Login"></center>
        </form>
    </div>
