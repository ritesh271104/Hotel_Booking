<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';
require 'db_connection.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userOtp = $_POST['otp'];
    $email = $_SESSION['email'];
    $password = $_SESSION['password'];
    $sessionOtp = $_SESSION['otp'];

    if ($userOtp === $sessionOtp) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $stmt = $conn->prepare("UPDATE register SET password = ? WHERE email = ?");
        $stmt->bind_param("ss", $hashedPassword, $email);

        if ($stmt->execute()) {
            // Send confirmation email
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'rkregency2@gmail.com';
                $mail->Password = 'rfzy rabm wqap qaym';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                $mail->setFrom('rkregency2@gmail.com', 'HOTEL R.K REGENCY');
                $mail->addAddress($email);
                $mail->isHTML(true);
                $mail->Subject = 'Password Updated Successfully';
                $mail->Body = "
                    <h3>Password Updated</h3>
                    <p>Your password has been successfully updated.</p>
                    <p><strong>Email:</strong> $email</p>
                    <p><strong>New Password:</strong> $password</p>
                    <small>If you did not request this change, contact support immediately.</small>
                ";

                $mail->send();
            } catch (Exception $e) {
                echo "mail_error: " . $mail->ErrorInfo;
                exit;
            }

            echo "success";
            session_unset();
            session_destroy();
        } else {
            echo "db_error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    } else {
        echo "invalid";
    }
}
?>
