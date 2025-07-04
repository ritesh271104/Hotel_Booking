<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.html");
    exit();
}

// Get price directly from URL
$price = $_GET['price'] ?? null;
$_SESSION['price']=$price;

if ($price !== null) {
    echo "<script>console.log('Price from URL: " . $price . "');</script>";
} else {
    echo "<script>console.log('Price not found in URL');</script>";
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Hotel & Banquet Booking</title>

  <!-- Bootstrap CSS -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
  />

  <style>
    body {
      background-color:  #a8e4f0;
    }
    .booking-container {
      max-width: 600px;
      margin: 150px auto;
      background-color: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>
<body>

  <div class="container booking-container">
    <h2 class="text-center mb-4">HOTEL R.K REGENCY BANQUET BOOKING</h2>
    <form id="bookingForm" action="banquetbook.php" method="post">
      <div class="mb-3">
        <label for="name" class="form-label">Full Name:</label>
        <input type="text" class="form-control" id="name" required />
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email Address:</label>
        <input type="email" class="form-control" id="email" required />
      </div>

     
      <div class="mb-3">
        <label for="hallType" class="form-label">Banquet Hall:</label>
        <select class="form-select" id="hallType">
          <option value="none">No Banquet Hall</option>
          <option value="Grand Ballroom">Grand Ballroom (500 Guests)</option>
          <option value="Garden Suite">Garden Suite (400 Guests)</option>
          <option value="Royal Hall">Royal Hall (600 Guests)</option>
        </select>
      </div>

      <div class="mb-3">
        <label for="checkIn" class="form-label">Check-in Date:</label>
        <input type="date" class="form-control" id="checkIn" />
      </div>

      <div class="mb-4">
        <label for="checkOut" class="form-label">Check-out Date:</label>
        <input type="date" class="form-control" id="checkOut" />
      </div>

 
      

      <button type="submit" class="btn btn-primary w-100">Book Now</button>
    </form>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

 
</body>
</html>
