<?php
require 'db_connection.php';
session_start();

// Retrieve form data safely
$name      = $_POST['name'] ?? '';
$email     = $_POST['email'] ?? '';
$hallType  = $_POST['hallType'] ?? 'none';
$checkIn   = $_POST['checkIn'] ?? '';
$checkOut  = $_POST['checkOut'] ?? '';
$price= $_SESSION['price'];

// SQL insert statement
$sql = "INSERT INTO banquet_bookings (full_name, email, hall_type, check_in_date, check_out_date) 
        VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    echo "Error preparing statement: " . $conn->error;
    exit;
}

$stmt->bind_param("sssss", $name, $email, $hallType, $checkIn, $checkOut);

if ($stmt->execute()) {
    echo $price;
    header("Location: banqpayment.php");
    exit;
} else {
    echo "<h3 style='text-align:center; color:red;'>Error: " . $stmt->error . "</h3>";
}

$stmt->close();
$conn->close();
?>
