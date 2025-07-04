<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Hotel Booking Enquiry</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      font-family: 'Roboto', sans-serif;
      background: url('https://c8.alamy.com/comp/2RYY2NR/woman-guest-at-the-reception-of-hotel-checking-in-2RYY2NR.jpg') no-repeat center center fixed;
      background-size: cover;
      margin: 0;
      padding: 0;
    }

    .navbar-brand img {
      height: 50px;
      margin-right: 10px;
    }

    .card {
      border: none;
    }

    .card-title {
      font-weight: bold;
    }

    .enquiry-section {
      background-color: rgba(255, 255, 255, 0.9);
      border-radius: 8px;
      padding: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    .text-white-shadow {
      color: white;
      text-shadow: 1px 1px 4px #000;
    }
  </style>
</head>

<body>

  <!-- Header / Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light px-3">
    <a class="navbar-brand d-flex align-items-center" href="#">
      <img src="https://static.wixstatic.com/media/7c49ed_7adc63083a3743eeb6b588e60d288f02~mv2.png/v1/fill/w_200,h_212,al_c,q_85,usm_2.00_1.00_0.00,enc_avif,quality_auto/LOGO%2520NO%2520BACKGROUND_edited.png" alt="Hotel Logo">
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
        <li class="nav-item"><a class="nav-link active" href="#">Enquire with Us</a></li>
        <li class="nav-item"><a class="nav-link" href="about us.php">About Us</a></li>
      </ul>
    </div>
  </nav>

  <!-- Enquiry Form Section -->
  <section class="py-5">
    <div class="container">
      <div class="text-center mb-5 text-white-shadow">
        <h2 class="fw-bold text-uppercase">Enquire with Us</h2>
        <p>Let us know your preferences, and we'll get back to you shortly.</p>
      </div>

      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="enquiry-section">
            <form action="submit_enquiry.php" method="POST">
              <div class="row">
                <div class="mb-3 col-md-6">
                  <label for="name" class="form-label">Full Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="John Doe" required>
                </div>
                <div class="mb-3 col-md-6">
                  <label for="email" class="form-label">Email Address</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="email@example.com" required>
                </div>
              </div>

              <div class="mb-3">
                <label for="phone" class="form-label">Phone Number <small class="text-muted">(Optional)</small></label>
                <input type="tel" class="form-control" id="phone" name="phone" placeholder="+91 9876543210">
              </div>

              <div class="row">
                <div class="mb-3 col-md-6">
                  <label for="checkin" class="form-label">Check-in Date</label>
                  <input type="date" class="form-control" id="checkin" name="checkin_date" required>
                </div>
                <div class="mb-3 col-md-6">
                  <label for="checkout" class="form-label">Check-out Date</label>
                  <input type="date" class="form-control" id="checkout" name="checkout_date" required>
                </div>
              </div>

              <div class="mb-3">
                <label for="room" class="form-label">Room Type</label>
                <select class="form-select" id="room" name="room_type" required>
                  <option selected disabled value="">Choose...</option>
                  <option value="single">Single</option>
                  <option value="double">Double</option>
                  <option value="suite">Suite</option>
                </select>
              </div>

              <div class="mb-3">
                <label for="guests" class="form-label">Number of Guests</label>
                <input type="number" class="form-control" id="guests" name="guests" min="1" max="10" required>
              </div>

              <div class="mb-4">
                <label for="message" class="form-label">Additional Requests or Questions</label>
                <textarea class="form-control" id="message" name="message" rows="4" placeholder="Let us know if you have any special requests..."></textarea>
              </div>

              <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-lg">Submit Enquiry</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
