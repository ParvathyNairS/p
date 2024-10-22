<?php
// Connect to the database
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $pan = $_POST["pan"];
    $type = $_POST["type"];
    $amount = $_POST["amount"];
    $date = $_POST["date"];

    // Insert data into the `donation` table
    $query = "INSERT INTO donation (name, email, phone, pan, type, amount, date) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssssss", $name, $email, $phone, $pan, $type, $amount, $date);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Data inserted successfully!";
        header('Location:payment.html');
    } else {
        echo "Error inserting data: " . $stmt->error;
    }
}

$conn->close();

?>