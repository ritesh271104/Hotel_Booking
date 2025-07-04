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
  <title>Hotel Room Booking Registration</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

  <style>
    body {
      background-color: #a8e4f0;
      color: #333;
      line-height: 1.6;
      font-family: 'Arial', sans-serif;
    }

    header {
      background-color: #1a1a1a;
      color: white;
      padding: 20px 0;
      text-align: center;
    }

    header .logo h1 {
      font-size: 2.5rem;
      letter-spacing: 2px;
    }

    .booking-container {
      display: none;
      margin-top: 20px;
      padding: 20px;
      border: 1px solid #ddd;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      background-color: #a8e4f0;
    }

    .counter {
      display: flex;
      align-items: center;
      justify-content: space-between;
      max-width: 150px;
    }

    .counter button {
      padding: 5px 10px;
    }

    .done {
      width: 100%;
      padding: 10px;
      margin-top: 15px;
      background-color: #0066cc;
      color: white;
      border: none;
      border-radius: 5px;
    }

    footer {
      text-align: center;
      padding: 20px;
      background-color: #1a1a1a;
      color: white;
      margin-top: 40px;
    }
  </style>
</head>

<body>

  <header>
    <div class="logo">
      <h1>HOTEL R.K REGENCY</h1>
    </div>
  </header>

  <section class="container my-5">
    <div class="bg-white p-5 shadow rounded">
      <h2 class="text-center text-primary mb-4">Book Your Stay</h2>

      <form action="bookingdata.php" method="post" onsubmit="return validateGuests()">

        <div class="mb-3">
          <label for="name" class="form-label">Full Name</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name" required />
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Email Address</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required />
        </div>

        <div class="mb-3">
          <label for="phone" class="form-label">Phone Number</label>
          <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your phone number" required />
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="checkin" class="form-label">Check-in Date</label>
            <input type="date" class="form-control" id="checkin" name="checkin" required />
          </div>
          <div class="col-md-6 mb-3">
            <label for="checkout" class="form-label">Check-out Date</label>
            <input type="date" class="form-control" id="checkout" name="checkout" required />
          </div>
        </div>

        <div class="mb-3">
          <label for="room-type" class="form-label">Room Type</label>
          <select class="form-select" id="room-type" name="room-type" required onchange="resetGuests()">
            <option value="single">Single Room</option>
            <option value="double">Double Room</option>
          </select>
        </div>

        <div class="mb-3">
          <label class="form-label">Number of Guests</label>
          <input type="text" id="guest-summary" class="form-control" readonly placeholder="Select guests and click Done" required />
          <input type="hidden" name="guests" id="guests" />
          <button type="button" class="btn btn-info mt-2" onclick="toggleGuestSelector()">Select Guests</button>
        </div>

        <div class="booking-container" id="booking-container">
          <div class="mb-3">
            <label class="form-label">Adults</label>
            <div class="counter">
              <button type="button" class="btn btn-outline-secondary btn-sm" onclick="changeCount('adults', -1)">-</button>
              <span id="adults">1</span>
              <button type="button" class="btn btn-outline-secondary btn-sm" onclick="changeCount('adults', 1)">+</button>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">Children</label>
            <div class="counter">
              <button type="button" class="btn btn-outline-secondary btn-sm" onclick="changeCount('children', -1)">-</button>
              <span id="children">0</span>
              <button type="button" class="btn btn-outline-secondary btn-sm" onclick="changeCount('children', 1)">+</button>
            </div>
          </div>

          <button type="button" class="done" onclick="done()">Done</button>
        </div>

        <div class="text-center mt-4">
          <button type="submit" class="btn btn-warning btn-lg">Submit</button>
        </div>

      </form>
    </div>
  </section>

  <footer>
    <p>&copy; 2025 Luxury Hotel. All rights reserved.</p>
  </footer>

  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Custom JavaScript -->
  <script>
    function toggleGuestSelector() {
      const container = document.getElementById('booking-container');
      container.style.display = container.style.display === 'block' ? 'none' : 'block';
    }

    function changeCount(type, delta) {
      const el = document.getElementById(type);
      let count = parseInt(el.textContent);
      count = Math.max(0, count + delta);
      el.textContent = count;
    }

    function done() {
      const adults = parseInt(document.getElementById('adults').textContent);
      const children = parseInt(document.getElementById('children').textContent);
      const total = adults + children;

      if (adults === 0) {
        alert('Please select at least one adult.');
        return;
      }

      const guestSummary = document.getElementById('guest-summary');
      const guestHidden = document.getElementById('guests');

      guestSummary.value = `${adults} Adult${adults !== 1 ? 's' : ''}, ${children} Child${children !== 1 ? 'ren' : ''}`;
      guestHidden.value = `adults:${adults},children:${children}`;

      document.getElementById('booking-container').style.display = 'none';
    }

    function resetGuests() {
      document.getElementById('adults').textContent = '1';
      document.getElementById('children').textContent = '0';
      document.getElementById('guest-summary').value = '';
      document.getElementById('guests').value = '';
    }

    function validateGuests() {
      const guests = document.getElementById('guests').value;
      if (!guests) {
        alert('Please select the number of guests.');
        return false;
      }

      const roomType = document.getElementById('room-type').value;
      const adults = parseInt(guests.match(/adults:(\d+)/)[1]);
      const children = parseInt(guests.match(/children:(\d+)/)[1]);
      const total = adults + children;

      const maxGuests = roomType === 'single' ? 2 : 4; // example max guests per room type

      if (total > maxGuests) {
        alert(`Total guests (${total}) exceed max allowed for selected room type (${maxGuests}).`);
        return false;
      }

      return true;
    }
  </script>
  
</body>

</html>
