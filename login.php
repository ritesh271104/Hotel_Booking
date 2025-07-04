<?php
session_start();
header('Content-Type: text/plain'); // Ensure plain text response
require 'db_connection.php';

// Defensive checks
if (!isset($_POST['email']) || !isset($_POST['password'])) {
    echo "invalid_request";
    exit();
}

$email = trim($_POST['email']);
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT id, password FROM register WHERE email = ?");
if (!$stmt) {
    echo "stmt_error";
    exit();
}

$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        echo "success";
    } else {
        echo "invalid_credentials";
    }
} else {
    echo "invalid_credentials";
}
?>
