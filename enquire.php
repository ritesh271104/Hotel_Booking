<?php
// Database configuration
$host = "localhost";       // Usually 'localhost'
$dbname = "R.K REGENCY";      // Change to your actual database name
$username = "root";        // Your DB username
$password = "";            // Your DB password

// Create a connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
}

// Get form data and sanitize
$name = htmlspecialchars(trim($_POST['name']));
$email = htmlspecialchars(trim($_POST['email']));
$phone = htmlspecialchars(trim($_POST['phone']));
$checkin = $_POST['checkin_date'];
$checkout = $_POST['checkout_date'];
$room_type = $_POST['room_type'];
$guests = (int)$_POST['guests'];
$message = htmlspecialchars(trim($_POST['message']));

// Validate required fields
if (empty($name) || empty($email) || empty($checkin) || empty($checkout) || empty($room_type) || $guests < 1) {
    die("❌ Please fill in all required fields.");
}

// Prepare SQL statement
$stmt = $conn->prepare("INSERT INTO booking_enquiries (name, email, phone, checkin_date, checkout_date, room_type, guests, message) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssis", $name, $email, $phone, $checkin, $checkout, $room_type, $guests, $message);

// Execute query
if ($stmt->execute()) {
    echo "<h3>✅ Enquiry submitted successfully!</h3>";
    echo "<p>Thank you, <strong>" . htmlspecialchars($name) . "</strong>. We'll contact you shortly.</p>";
} else {
    echo "❌ Error: " . $stmt->error;
}

// Close connections
$stmt->close();
$conn->close();
?>
