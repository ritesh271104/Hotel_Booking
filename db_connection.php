<?php
// booking_handler.php

// Database connection parameters
$host = "localhost";
$dbname = "R.K REGENCY";
$username = "root"; // Change to your DB username
$password = "";     // Change to your DB password

// Create a connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
