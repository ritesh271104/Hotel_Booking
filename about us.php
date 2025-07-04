<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>About Us - Hotel Booking</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
 body {
  margin: 0;
  padding: 0;
  font-family: Arial, sans-serif;
  min-height: 100vh;
  background-color: #f4f4f4;
  background-image: url("https://static.vecteezy.com/system/resources/previews/050/029/546/non_2x/minimalist-reception-area-with-a-wooden-counter-warm-lighting-and-lush-greenery-photo.jpg");
  background-repeat: no-repeat;
  background-position: top center; /* 👈 Better visibility from top */
  background-attachment: fixed;
  background-size: 100% auto; /* 👈 Width full 100%, height auto = saaf aur wide */
}


    .team-member img {
      border-radius: 50%;
      width: 120px;
      height: 120px;
      object-fit: cover;
    }

    footer {
      background: #333;
      color: #fff;
      padding: 10px 0;
      text-align: center;
      margin-top: 200px;
    }
    .navbar-brand img {
      height: 50px;
      margin-right: 10px;
    }

    
    
  </style>
</head>
<body>

  <!-- Header / Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light px-3">
    <a class="navbar-brand d-flex align-items-center" href="#">
      <img src="https://static.wixstatic.com/media/7c49ed_7adc63083a3743eeb6b588e60d288f02~mv2.png/v1/fill/w_200,h_212,al_c,q_85,usm_2.00_1.00_0.00,enc_avif,quality_auto/LOGO%2520NO%2520BACKGROUND_edited.png"
        alt="Hotel Logo">
      <span class="fw-bold">HOTEL R.K REGENCY</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="banquets.php">Banquets</a></li>
        <li class="nav-item"><a class="nav-link" href="room.php">Rooms</a></li>
        <li class="nav-item"><a class="nav-link" href="enquire with us.php">Enquire with Us</a></li>
        <li class="nav-item"><a class="nav-link" href="#">About Us</a></li>
      </ul>
    </div>
  </nav>

  <!-- About Section -->
  <div class="container my-5">
    <div class="bg-white p-4 rounded shadow">
      <h2 class="text-center mb-4">About Us</h2>
      <p>
        Welcome to Hotel Booking! We are dedicated to providing the best booking experience for travelers worldwide.
        Our goal is to make your stay comfortable, convenient, and memorable. Whether you're here for business, leisure,
        or a special occasion, we offer a wide range of accommodations to suit your needs.
      </p>
      <p>
        Our team is passionate about delivering excellent service and ensuring that your time with us is nothing short
        of exceptional. From modern amenities to personalized customer service, we aim to create a space where you feel
        like you're at home.
      </p>
    </div>

    <!-- Team Section -->
    <div class="row text-center mt-5">
      <div class="col-md-6 mb-4">
        <div class="bg-white p-4 rounded shadow team-member">
          <img src="WhatsApp Image 2025-04-15 at 12.20.01 PM.jpeg" alt="RITESH SINGH" class="mb-3">
          <h3>RITESH SINGH</h3>
          <p>Hotel Manager</p>
        </div>
      </div>
      <div class="col-md-6 mb-4">
        <div class="bg-white p-4 rounded shadow team-member">
          <img src="WhatsApp Image 2025-04-25 at 9.07.58 AM.jpeg" alt="KRISH SHARMA" class="mb-3">
          <h3>KRISH SHARMA</h3>
          <p>Front Office Manager</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer>
    <p>&copy; 2025 Hotel Booking. All rights reserved.</p>
  </footer>

  <!-- Bootstrap JS (Optional for responsive navbar) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
