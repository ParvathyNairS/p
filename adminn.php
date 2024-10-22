<?php
require_once 'db.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["uname"];
  $password = $_POST["password"];

  // Query to check if username and password exist in database
  $query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
  $result = mysqli_query($con, $query);

  // Check if username and password are correct
  if (mysqli_num_rows($result) > 0) {
    // Login successful, redirect to hi.html
    header("Location: hi.html");
    exit;
  } else {
    // Login failed, display error message
    $error = "Invalid username or password";
  }
}

// Close database connection
mysqli_close($con);
?>

<!-- Display error message if login failed -->
<?php if (isset($error)) { ?>
  <p style="color: red;"><?php echo $error; ?></p>
<?php } ?>