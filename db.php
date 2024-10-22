<?php
// Connect to the database
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "test"; 

$con = mysqli_connect($servername,$username,$password,$dbname);

// Check connection
if(mysqli_connect_errno()){
    echo "failed to connect!";
    exit();
}
echo "connection successfull!";



// Close the database connection
//mysqli_close($con);
?>