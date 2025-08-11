
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Payment Form</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
{
  margin: 0; padding: 0; box-sizing: border-box;
}
body {
  font-family: 'Poppins', sans-serif;
  background: url('https://i.pinimg.com/736x/b1/ac/5d/b1ac5df8a28ecf3d6642a8e0e85b2a2a.jpg') no-repeat center center/cover;
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 20px;
}
.overlay {
  position: fixed;
  inset: 0;
  background: rgba(0,0,0,0.5);
  z-index: 1;
}
.panel {
  position: relative;
  z-index: 2;
  width: 100%;
  max-width: 420px;
  padding: 30px;
  background: rgba(255,255,255,0.15);
  backdrop-filter: blur(12px);
  border-radius: 16px;
  color: #fff;
  box-shadow: 0 8px 30px rgba(0,0,0,0.2);
}
.panel h2 {
  text-align: center;
  margin-bottom: 1.5rem;
}
label {
  font-weight: 500;
  display: block;
  margin-bottom: 0.4rem;
}
input, textarea, select {
  width: 100%;
  padding: 12px;
  margin-bottom: 1rem;
  border: none;
  border-radius: 10px;
  font-size: 14px;
  background: rgba(255,255,255,0.2);
  color: #fff;
}
input::placeholder, textarea::placeholder {
  color: #eee;
}
select option { color: #000; }
button {
  width: 100%;
  padding: 14px;
  background: #b07a57;
  color: #fff;
  border: none;
  border-radius: 10px;
  font-size: 16px;
  font-weight: 600;
  cursor: pointer;
}
button:hover { background: #9e6645; }
@media (max-width: 480px) {
  .panel { padding: 20px; }
}
</style>
</head>
<body>
<div class="overlay"></div>
<div class="panel">
    <h2>Enter Payment Details</h2>
    <form action="submit_order.php" method="POST" id="paymentForm">
        <label for="fullname">Full Name</label>
        <input type="text" name="fullname" placeholder="Full Name" required>

        <label for="fathername">Father's Name</label>
        <input type="text" name="fathername" placeholder="Father's Name" required>

        <label for="cnic">CNIC</label>
        <input type="text" name="cnic" placeholder="CNIC" required>

        <label for="address">Address</label>
        <input type="text" name="address" placeholder="Address" required>

        <label for="payment">Payment Method</label>
        <select name="payment" required>
            <option value="">Select Payment Method</option>
            <option value="Cash on Delivery">Cash on Delivery</option>
            <option value="Bank Transfer">Bank Transfer</option>
        </select>

        <!-- Hidden field for cart -->
        <input type="hidden" name="cart" id="cartData">

        <button type="submit">Place Order</button>
    </form>
</div>



<script>
    // Get cart from localStorage
    let cart = localStorage.getItem('cart');
    if (!cart) {
        alert("Your cart is empty!");
        window.location.href = "cart.html";
    } else {
        document.getElementById('cartData').value = cart;
    }
</script>

</body>
</html>
