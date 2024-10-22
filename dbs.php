<?php
require_once 'db.php';

// Retrieve user data script
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname = $_POST["uname"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phno = $_POST["phno"];
    $address = $_POST["address"];
    $password = $_POST["password"];

    // Hash the password for secure storage
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user data into the database
    $query = "INSERT INTO db(uname, name, email, phno, address, password) VALUES ('$uname', '$name', '$email', '$phno', '$address', '$hashed_password')";
    if (mysqli_query($con, $query)) {
        echo "User created successfully!";
        header('Location:login.html');
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);

    }
}

       
?>