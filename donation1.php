<?php
$servername = "localhost";
$username = "root"; // Replace with your actual username
$password = ""; // Replace with your actual password
$dbname = "project"; // Replace with your actual database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    echo "Failed to connect: " . $conn->connect_error;
    exit();
}
echo "Connection successful!";

// Insert data into the table
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $pan = $_POST["pan"];
    $type = $_POST["type"];
    $resident_name = $_POST["resident-name"];
    $amount = $_POST["amount"];
    $date = $_POST["date"];

    // Prepare the query
    $stmt = $conn->prepare("INSERT INTO donation (name, email, phone, pan, type, resident_name, amount, date) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

    // Bind parameters
    $stmt->bind_param("ssssssss", $name, $email, $phone, $pan, $type, $resident_name, $amount, $date);

    // Execute the query
    if (!$stmt->execute()) {
        echo "Error: " . $stmt->error;
    } else {
        echo "New record created successfully";
        header('Location:payment.html');
    }
}

// Close connection
$conn->close();

?>