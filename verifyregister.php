<?php
session_start();
require 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $input_otp = trim($_POST['otp']);

    if (!isset($_SESSION['otp']) || $input_otp !== $_SESSION['otp']) {
        echo "invalid_otp";
        exit;
    }

    // Get user details from session
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $phone = $_SESSION['phone'];
    $hashed_password = $_SESSION['password'];

    $stmt = $conn->prepare("INSERT INTO register (full_name, email, phone, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $phone, $hashed_password);

    if ($stmt->execute()) {
        // Clear OTP session
        session_unset();
        session_destroy();
        echo "success";
    } else {
        echo "db_error";
    }
}
?>
