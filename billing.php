<?php
// Connect to the database
$servername = "localhost";
$username = "root"; // Replace with your actual username
$password = ""; // Replace with your actual password
$dbname = "bil"; // Replace with your actual database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    echo "Failed to connect: " . $conn->connect_error;
    exit();
}
echo "Connection successful!";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $full_name = $_POST['full_name'];
    $email_address = $_POST['email_address'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];
    $address_line_2 = $_POST['address_line_2'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $region = $_POST['region'];
    $postal = $_POST['postal'];
    $sql = "INSERT INTO billing (full_name, email_address, phone_number, address, address_line_2, country, city, region, postal) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssss", $full_name, $email_address, $phone_number, $address, $address_line_2, $country, $city, $region, $postal);
    $stmt->execute();

  // Check if the insertion is successful
  if ($stmt->affected_rows > 0) {
    echo "Record inserted successfully!";
    header('Location: hi.html');
  } else {
    echo "Error inserting record: " . $stmt->error;
  }
}
  $conn->close();
// Close the database connection
//mysqli_close($con);
?>