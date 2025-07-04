<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start();

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// PHPMailer includes
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

// DB Connection
require 'db_connection.php';

// OTP Generator
function generateOTP($length = 6) {
    $digits = '';
    for ($i = 0; $i < $length; $i++) {
        $digits .= mt_rand(0, 9); // use full 0–9 range
    }
    return $digits;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $toEmail = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($toEmail) || empty($password)) {
        echo "error: Missing email or password.";
        exit;
    }

    // Store password in session (consider hashing or verifying instead)
    $_SESSION['password'] = $password;
    $_SESSION['email'] = $toEmail;

    // Check if user exists in register table
    $stmt = $conn->prepare("SELECT * FROM register WHERE email = ?");
    $stmt->bind_param("s", $toEmail);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo "not_found";
        exit;
    }

    // Generate OTP
    $otp = generateOTP();
    $_SESSION['otp'] = $otp;

    // PHPMailer Setup
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'rkregency2@gmail.com';  // Replace with your Gmail
        $mail->Password = 'rfzy rabm wqap qaym';     // Replace with your Gmail App Password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('rkregency2@gmail.com', 'HOTEL R.K REGENCY');
        $mail->addAddress($toEmail);

        $mail->isHTML(true);
        $mail->Subject = 'Your OTP Code';
        $mail->Body = "
            <h3>OTP Verification</h3>
            <p>Your OTP is: <strong>$otp</strong></p>
            <p>Please use this OTP to continue your login or password reset process.</p>
            <small>Do not share this OTP with anyone.</small>
        ";

        $mail->send();
        echo "success";
    } catch (Exception $e) {
        echo "error: " . $mail->ErrorInfo;
    }
}
?>
