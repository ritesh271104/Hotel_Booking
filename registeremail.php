<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start();

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';
require 'db_connection.php'; // DB connection

function generateOTP($length = 4) {
    return strval(rand(pow(10, $length - 1), pow(10, $length) - 1));
}

function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $full_name = trim($_POST['full_name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validations
    if (!isValidEmail($email)) {
        echo "invalid_email";
        exit;
    }

    if ($password !== $confirm_password) {
        echo "password_mismatch";
        exit;
    }

    // Check if email or phone exists
    $stmt = $conn->prepare("SELECT * FROM register WHERE email = ? OR phone = ?");
    $stmt->bind_param("ss", $email, $phone);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row['email'] === $email) {
            echo "email_exists";
        } else {
            echo "phone_exists";
        }
        exit;
    }

    // Generate and store OTP and user info in session
    $otp = generateOTP();
    $_SESSION['otp'] = $otp;
    $_SESSION['email'] = $email;
    $_SESSION['name'] = $full_name;
    $_SESSION['password'] = password_hash($password, PASSWORD_BCRYPT);
    $_SESSION['phone'] = $phone;

    // Send OTP Email
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'rkregency2@gmail.com'; // Use your app email
        $mail->Password = 'rfzy rabm wqap qaym'; // App Password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('rkregency2@gmail.com', 'HOTEL R.K REGENCY');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'Your OTP Code - HOTEL R.K REGENCY';
        $mail->Body = "
            <div style='font-family: Arial, sans-serif; color: #000;'>
                <h3>OTP Verification</h3>
                <p>Your OTP is:</p>
                <h2 style='padding: 10px; display: inline-block;'>$otp</h2>
                <p>This OTP is valid for a short time. Please do not share it.</p>
            </div>
        ";
        $mail->AltBody = "Your OTP is: $otp";

        $mail->send();
        echo "success";
    } catch (Exception $e) {
        echo "error: " . $mail->ErrorInfo;
    }
}
?>
