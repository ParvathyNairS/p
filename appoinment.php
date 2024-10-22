<?php
// Connect to the database
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "appointment"; 
$con = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$con) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
} else {
    echo "Connection successful!";
}
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = $_POST["name"];
    $type = $_POST["type"];
    $date = $_POST["date"];
    $time = $_POST["time"];

    // Insert data into the `appoin` table
    $query = "INSERT INTO appoin (name, type, date, time) VALUES (?, ?, ?, ?)";
    $stmt = $con->prepare($query);
    $stmt->bind_param("ssss", $name, $type, $date, $time);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Appointment booked successfully!";
        header('Location: next-page.html');
    } else {
        echo "Booking failed: " . $stmt->error;
    }
}

$con->close();
?>