<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Hotel Rooms - RK Regency</title>
  <meta name="description" content="Stay at RK Regency with our luxurious, spacious rooms. Book now to enjoy comfort and modern amenities." />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f8f9fa;
      margin: 0;
    }

    header {
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .navbar-brand img {
      height: 45px;
      margin-right: 8px;
    }

    .rooms {
      background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
        url("https://img.freepik.com/premium-photo/room-with-large-mirror-row-chairs-with-lamp-it_724865-17131.jpg?semt=ais_hybrid&w=740") center/cover no-repeat;
      color: #fff;
      padding: 80px 0;
      text-align: center;
    }

    .rooms h1 {
      font-weight: 600;
      font-size: 2.8rem;
    }

    .rooms p {
      font-size: 1.1rem;
      max-width: 700px;
      margin: 10px auto 40px;
    }

    .card {
      background: rgba(255, 255, 255, 0.9);
      border: none;
      border-radius: 12px;
      transition: all 0.3s ease;
      backdrop-filter: blur(6px);
    }

    .card:hover {
      transform: translateY(-8px);
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
    }

    .card img {
      border-top-left-radius: 12px;
      border-top-right-radius: 12px;
      height: 220px;
      object-fit: cover;
    }

    .card-title {
      font-size: 1.3rem;
      font-weight: 600;
    }

    .price {
      font-size: 1.2rem;
      color: #e74c3c;
      margin: 12px 0;
    }

    .btn-outline-danger {
      border-radius: 30px;
      padding: 8px 20px;
    }

    footer {
      background-color: #1a1a1a;
      color: #fff;
      text-align: center;
      padding: 20px;
      font-size: 0.95rem;
      margin-top: 4px;
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white px-3">
      <a class="navbar-brand d-flex align-items-center" href="index.html">
        <img src="https://static.wixstatic.com/media/7c49ed_7adc63083a3743eeb6b588e60d288f02~mv2.png/v1/fill/w_200,h_212,al_c,q_85,usm_2.00_1.00_0.00,enc_avif,quality_auto/LOGO%2520NO%2520BACKGROUND_edited.png" alt="Logo" />
        <span class="fw-bold text-dark">HOTEL R.K REGENCY</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="banquets.php">Banquets</a></li>
          <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Rooms</a></li>
          <li class="nav-item"><a class="nav-link" href="enquire with us.php">Enquire with Us</a></li>
          <li class="nav-item"><a class="nav-link" href="about us.php">About Us</a></li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- Rooms Section -->
  <main class="rooms">
    <div class="container">
      <h1>Explore Our Rooms</h1>
      <p>Pick from our premium, deluxe, or suite rooms — each thoughtfully designed for comfort and elegance.</p>

      <div class="row">
        <!-- Luxury Room -->
        <div class="col-md-4 mb-4">
          <div class="card h-100">
            <img src="https://media.istockphoto.com/id/1452529483/photo/3d-render-of-luxury-hotel-room.jpg?s=1024x1024&w=is&k=20&c=MgAhtLDywMfFflHFhL634qp6sNNHa6PC5f6F4-rKyRo=" class="card-img-top" alt="Luxury Room" />
            <div class="card-body text-center">
              <h5 class="card-title">Luxury Room</h5>
              <p class="card-text">Experience premium hospitality with top-notch decor, services, and comfort.</p>
              <div class="price">₹14,999 / night</div>
              <a href="RoomBook.php?price=14999&room=Luxury" class="btn btn-outline-danger">Book Now</a>
            </div>
          </div>
        </div>

        <!-- Deluxe Room -->
        <div class="col-md-4 mb-4">
          <div class="card h-100">
            <img src="https://www.oberoihotels.com/-/media/oberoi-hotels/website-images/the-oberoi-new-delhi/room-and-suites/deluxe-room/detail/deluxe-room-1.jpg" class="card-img-top" alt="Deluxe Room" />
            <div class="card-body text-center">
              <h5 class="card-title">Deluxe Room</h5>
              <p class="card-text">Modern and spacious — perfect for business or leisure travelers alike.</p>
              <div class="price">₹4,999 / night</div>
              <a href="RoomBook.php?price=4999&room=Deluxe" class="btn btn-outline-danger">Book Now</a>
            </div>
          </div>
        </div>

        <!-- Suite Room -->
        <div class="col-md-4 mb-4">
          <div class="card h-100">
            <img src="https://media-cdn.tripadvisor.com/media/photo-s/02/8a/e6/d6/filename-120409-02-jpg.jpg" class="card-img-top" alt="Suite Room" />
            <div class="card-body text-center">
              <h5 class="card-title">Suite Room</h5>
              <p class="card-text">Enjoy the privacy and space of our finest suite with luxury at every corner.</p>
              <div class="price">₹9,999 / night</div>
              <a href="RoomBook.php?price=9999&room=Suite" class="btn btn-outline-danger">Book Now</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer>
    &copy; 2025 RK Regency Hotel. All rights reserved.
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
