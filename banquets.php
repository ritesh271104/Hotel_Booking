<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Banquets - R.K Regency</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>

  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f8f9fa;
      background-image: url('https://plus.unsplash.com/premium_photo-1661964071015-d97428970584?fm=jpg&q=60&w=3000&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8aG90ZWx8ZW58MHx8MHx8fDA%3D');
      background-size: cover;
      background-attachment: fixed;
    }

    .navbar {
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .navbar-brand img {
      height: 50px;
    }

    .card {
      border: none;
      border-radius: 15px;
      overflow: hidden;
      transition: transform 0.2s;
      margin-top: 240px;
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 6px 15px rgba(0,0,0,0.2);
    }

    .card-img-top {
      height: 220px;
      object-fit: cover;
    }

    .card-title {
      font-size: 1.4rem;
      color: #2c3e50;
      font-weight: 600;
    }

    .card-text {
      color: #555;
    }

    .price {
      font-size: 1.1rem;
      font-weight: 600;
      color: #c0392b;
    }

    .btn-primary {
      background-color: #2980b9;
      border: none;
    }

    .btn-outline-danger {
      border-radius: 25px;
    }

    footer {
      background-color: #212529;
      color: #f1f1f1;
      text-align: center;
      padding: 12px 0;
      margin-top: 350px;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-light py-3 px-4">
    <a class="navbar-brand d-flex align-items-center" href="#">
      <img src="https://static.wixstatic.com/media/7c49ed_7adc63083a3743eeb6b588e60d288f02~mv2.png/v1/fill/w_200,h_212,al_c,q_85,usm_2.00_1.00_0.00,enc_avif,quality_auto/LOGO%2520NO%2520BACKGROUND_edited.png" alt="Hotel Logo">
      <span class="ms-2 fw-bold text-uppercase">Hotel R.K Regency</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link active" href="#">Banquets</a></li>
        <li class="nav-item"><a class="nav-link" href="room.php">Rooms</a></li>
        <li class="nav-item"><a class="nav-link" href="enquire with us.php">Enquire with Us</a></li>
        <li class="nav-item"><a class="nav-link" href="about us.php">About Us</a></li>
      </ul>
    </div>
  </nav>

  <!-- Banquet Halls Section -->
  <section class="container my-5">
    <div class="row g-4">
      <!-- Hall Cards -->
      <!-- You can loop these if generating dynamically -->
      <div class="col-md-4">
        <div class="card shadow-sm">
          <img src="https://padmahotelsemarang.com/images/events/pandanaran-grand-ballroom-thumb1.jpg" class="card-img-top" alt="Grand Ballroom">
          <div class="card-body text-center">
            <h5 class="card-title">Grand Ballroom</h5>
            <p class="card-text">Luxurious space for up to 500 guests. Ideal for weddings and receptions.</p>
            <div class="price">₹95,000</div>
            <a href="Visit1.html" class="btn btn-primary mt-2 me-2">Visit</a>
            <a href="bookbanquethall.php?price=95000&hall=Grand Ballroom" class="btn btn-outline-danger mt-2">Book Now</a>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card shadow-sm">
          <img src="https://cf.bstatic.com/xdata/images/hotel/max1024x768/543806766.jpg?k=7e33db4a096f2787c40d1c96e6d9e43f69be4008c617442889362e107233f7b1&o=&hp=1" class="card-img-top" alt="Garden Suite">
          <div class="card-body text-center">
            <h5 class="card-title">Garden Suite</h5>
            <p class="card-text">Indoor-outdoor setup with garden view. Fits up to 400 guests.</p>
            <div class="price">₹1,15,000</div>
            <a href="Visit2.html" class="btn btn-primary mt-2 me-2">Visit</a>
            <a href="bookbanquethall.php?price=115000&hall=Garden Suite" class="btn btn-outline-danger mt-2">Book Now</a>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card shadow-sm">
          <img src="https://images.stockcake.com/public/6/6/a/66a4c749-4134-404c-8631-3b39b3820175_large/elegant-gala-dinner-stockcake.jpg" class="card-img-top" alt="Royal Hall">
          <div class="card-body text-center">
            <h5 class="card-title">Royal Hall</h5>
            <p class="card-text">Elegant décor for conferences, galas, and corporate events (up to 600 guests).</p>
            <div class="price">₹1,50,000</div>
            <a href="Visit3.html" class="btn btn-primary mt-2 me-2">Visit</a>
            <a href="bookbanquethall.php?price=150000&hall=Royal Hall" class="btn btn-outline-danger mt-2">Book Now</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <p>© 2025 Hotel R.K Regency | All Rights Reserved</p>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
