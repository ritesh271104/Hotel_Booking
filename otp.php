
<div class="booking-container">
  <!-- Step 1: Enter Phone -->
  <div class="step" id="step-phone">
    <h2>Enter Phone Number</h2>
    <input type="tel" id="phone" placeholder="e.g. +91 9876543210" />
    <button onclick="sendOTP()">Send OTP</button>
  </div>

  <!-- Step 2: Enter OTP -->
  <div class="step" id="step-otp" style="display: none;">
    <h2>Verify OTP</h2>
    <p>OTP sent to <span id="show-phone"></span></p>
    <div class="otp-inputs">
      <input type="text" maxlength="1" />
      <input type="text" maxlength="1" />
      <input type="text" maxlength="1" />
      <input type="text" maxlength="1" />
      <input type="text" maxlength="1" />
      <input type="text" maxlength="1" />
    </div>
    <button>Verify OTP</button>
    <p class="resend">Didn't receive it? <a href="#">Resend OTP</a></p>
  </div>
</div>
