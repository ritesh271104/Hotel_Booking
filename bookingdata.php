<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.html");
    exit();
}

// Database configuration
$host = 'localhost';
$db = 'R.K REGENCY';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    die("DB Connection failed: " . $e->getMessage());
}

// Form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];
$room_type = $_POST['room-type'];
$guests_raw = $_POST['guests'];
$room_price = isset($_POST['room_price']) ? (int)$_POST['room_price'] : 0;

// Extract guests
$adults = 0;
$children = 0;
if (preg_match('/adults:(\d+),children:(\d+)/', $guests_raw, $matches)) {
    $adults = (int)$matches[1];
    $children = (int)$matches[2];
}
$total_guests = $adults + $children;

// Save to database
$sql = "INSERT INTO bookings 
        (name, email, phone, checkin_date, checkout_date, room_type, total_guests, adults, children)
        VALUES 
        (:name, :email, :phone, :checkin, :checkout, :room_type, :total_guests, :adults, :children)";
$stmt = $pdo->prepare($sql);

try {
    $stmt->execute([
        ':name' => $name,
        ':email' => $email,
        ':phone' => $phone,
        ':checkin' => $checkin,
        ':checkout' => $checkout,
        ':room_type' => $room_type,
        ':total_guests' => $total_guests,
        ':adults' => $adults,
        ':children' => $children
    ]);

    // Save info for Razorpay
    $_SESSION['booking'] = [
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
        'room_type' => $room_type,
        'price' => $room_price
    ];

    header("Location: payment.php");
    exit();

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
