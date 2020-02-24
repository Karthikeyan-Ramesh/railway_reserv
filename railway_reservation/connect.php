<?php
// Create connection
$conn = new mysqli("localhost", "root", "" , "railway_reservation");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>