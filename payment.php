<?php
session_start();

// Redirect if user is not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: index.html");
    exit();
}

$price = $_SESSION['price'] ?? '0';
$amount = $price * 100; // Razorpay expects amount in paise

// Booking details from session (if available)
$name = $_SESSION['booking']['name'] ?? 'Guest';
$email = $_SESSION['booking']['email'] ?? '';
$contact = $_SESSION['booking']['phone'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Razorpay Payment - RK Regency</title>
  <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color:#a8e4f0 ; font-family:Arial, max-width: 600px; margin: 200px; sans-serif">

<div class="container mt-5">
  <div class="bg-white p-4 rounded shadow text-center" style="max-width: 550px; margin: auto;">
    <h2 class="mb-4 text-primary">Complete Your Payment</h2>
    <p>Amount to Pay: <strong>₹<?php echo number_format($price, 2); ?></strong></p>
    <button id="rzp-button" class="btn btn-success btn-lg">Pay with Razorpay</button>
  </div>
</div>

<script>
  var options = {
    "key": "rzp_test_AD9TqbCPT4a9ul", // Replace with your Razorpay key_id
    "amount": "<?php echo $amount; ?>",
    "currency": "INR",
    "name": "Hotel R.K Regency",
    "description": "Room Booking Payment",
    "image": "https://static.wixstatic.com/media/7c49ed_7adc63083a3743eeb6b588e60d288f02~mv2.png/v1/fill/w_200,h_212,al_c,q_85,usm_2.00_1.00_0.00,enc_avif,quality_auto/LOGO%2520NO%2520BACKGROUND_edited.png", // Optional
    "handler": function (response) {
      alert("Payment Successful! Payment ID: " + response.razorpay_payment_id);
      window.location.href = "success.php"; // Redirect after payment
    },
    "prefill": {
      "name": "<?php echo addslashes($name); ?>",
      "email": "<?php echo addslashes($email); ?>",
      "contact": "<?php echo addslashes($contact); ?>"
    },
    "theme": {
      "color": "#0066cc"
    }
  };

  var rzp = new Razorpay(options);
  document.getElementById('rzp-button').onclick = function (e) {
    rzp.open();
    e.preventDefault();
  }
</script>

</body>
</html>
