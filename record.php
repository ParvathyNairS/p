<?php
// Connect to the database
$servername = "localhost";
$username = "root"; // Replace with your actual username
$password = ""; // Replace with your actual password
$dbname = "records"; // Replace with your actual database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    echo "Failed to connect: " . $conn->connect_error;
    exit();
}
echo "Connection successful!";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $resident_name = $_POST["resident-name"];
    $resident_id = $_POST["resident-id"];
    $record_type = $_POST["record-type"];
    $requester_name = $_POST["requester-name"];
    $requester_email = $_POST["requester-email"];
    $requester_phone = $_POST["requester-phone"];
    $additional_info = $_POST["additional-info"];

    // Insert the data into the database
    $sql = "INSERT INTO recordrequest (resident_name, resident_id, record_type, requester_name, requester_email, requester_phone, additional_info) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $resident_name, $resident_id, $record_type, $requester_name, $requester_email, $requester_phone, $additional_info);
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
        echo "Data inserted successfully!";
        header('Location:payment.html');
    } else {
        echo "Error inserting data: " . $stmt->error;
    }


    // Close the statement and connection
    $stmt->close();
$conn->close();
}
?>