<?php
require_once 'db.php'; //  database connection code 

// Retrieve user data script
$query = "SELECT password FROM db WHERE uname = ?"; 
$stmt = $con->prepare($query);

$uname = $_POST["uname"]; // Get the username from the login form
$stmt->bind_param("s", $uname);
$stmt->execute();
echo $stmt->error; // Check for query execution errors
$result = $stmt->get_result();

echo $uname;

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $stored_password = $row["password"];
    var_dump($stored_password); // Check the stored password value

    echo $_POST["password"];
    echo $stored_password;
    //echo $hashed_password;
    
    if (password_verify($_POST["password"], $stored_password)) {
        echo "true"; // Login successful
        // Set session variables and redirect to the next page
        $_SESSION["uname"] = $uname;
        header("Location: home.html");
        exit();
    } else {
        echo "Invalid password"; // Password does not match
        
    }
} else {
    echo "Invalid username"; // Username does not exist
}