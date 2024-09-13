<?php
session_start();
if (isset($_SESSION["email"])) {
    header("location:index.php"); // Adjust redirection based on tenant home page
    exit();
}

include("navbar.php");
include_once("tenant-engine.php"); // Ensure this file is included if it contains relevant functions

// Connect to the database
$db = new mysqli('localhost', 'root', '', 'renthouse');
if ($db->connect_error) {
    die("Error connecting to the database");
}

// Initialize variables
$email = '';
$password_error = '';

if (isset($_POST['reset_password'])) {
    $email = validate($_POST['email']);
    $new_password = validate($_POST['new_password']);
    $confirm_password = validate($_POST['confirm_password']);

    // Check if the email exists in the database for tenants
    $sql = "SELECT * FROM tenant WHERE email='$email' LIMIT 1";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        if ($new_password === $confirm_password) {
           // Update the password in the database using the email to identify the correct owner
            $update_password_sql = "UPDATE tenant SET password='$new_password' WHERE email='$email'";
            if ($db->query($update_password_sql) === TRUE) {
                echo "<script>
                        alert('Password has been reset successfully.');
                        window.location.href = 'tenant-login.php'; // Adjust redirection as needed
                      </script>";
            } else {
                echo "<div class='alert alert-danger'>Error updating the password. Please try again.</div>";
            }
        } else {
            $password_error = 'Passwords do not match.';
        }
    } else {
        $password_error = 'Email not found.';
    }
}
?>
<style>
body {
     background-color: #a8acfb;
}
</style>
<div class="container">
  <h3 style="font-weight: bold; text-align: center;">Tenant - Reset Password</h3><hr><br><br>

  <form method="POST" action="">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
    </div>
    <div class="form-group">
      <label for="new_password">New Password:</label>
      <input type="password" class="form-control" id="new_password" placeholder="Enter new password" name="new_password" required>
    </div>
    <div class="form-group">
      <label for="confirm_password">Confirm Password:</label>
      <input type="password" class="form-control" id="confirm_password" placeholder="Confirm new password" name="confirm_password" required>
    </div>
    <center><input type="submit" name="reset_password" class="btn btn-primary btn-block" value="Reset Password"></center>
  </form>

  <?php
  if (!empty($password_error)) {
      echo "<div class='alert alert-danger'>$password_error</div>";
  }
  ?>

</div>
