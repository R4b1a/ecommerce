<?php
$msg = "";
$error = "";

// Connect to database
$conn = mysqli_connect("localhost", "root", "", "ecom");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['send'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);

    if ($name && $email && $message) {
        $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $message);
        
        if ($stmt->execute()) {
            $msg = "✅ Thank you! Your message has been sent.";
        } else {
            $error = "❌ Something went wrong. Please try again.";
        }

        $stmt->close();
    } else {
        $error = "❌ Please fill all fields.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width", initial scale="1.0">
    <title>StyleAura | Ecommerce Website Design</title>
    <link rel="stylesheet" href="style.css">
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

   <!-------------favicon-->
   <link rel="icon" type="image/png" href="photos/favicon-96x96.png" sizes="96x96" />
   <link rel="icon" type="image/svg+xml" href="photos/favicon.svg" />
   <link rel="shortcut icon" href="photos/favicon.ico" />
   <link rel="apple-touch-icon" sizes="180x180" href="photos/apple-touch-icon.png" />
   <link rel="manifest" href="photos/site.webmanifest" />
 </head>
    <body>
        
        
        
        <div class="header">
        <div class="container">
         <div class="navbar">
         <div class="logo">
             <img src="photos/logof.png" width="125px">
            </div>
            <nav> 
                <ul id="MenuItems">
                    <li><a href="index.php">Home</a> </li>
                     <li><a href="product.php">Products</a> </li>
                     <li><a href="about.html">About</a> </li>
                     <li><a href="contact.php">Contact</a> </li>
                     <li><a href="account.php">Account</a> </li>
                </ul>
            </nav>
             <div id="cart-icon">
            <a href="cart.html"><i class="fa fa-shopping-basket" aria-hidden="true"></i></a> 
            <span class="cart-item-count"></span>
             <i class="fa fa-bars" onclick="menutoggle()"></i>
             </div>
        </div>
       
        </div> 
      </div>


      <!---------------Contact us---------------->
      <div class="contact-card">
        <div class="contact-header">
            <h1>Contact Us</h1>
            <p1>Feel free to contact us any time. We will get<br>back to you as soon as we can!</p1>
        </div>
        
        <div class="contact-content">
           
            
            <div class="contact-form">
              <form id="contactForm" method="post" action="contact.php">
    <h3>Send your Request</h3>
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" required>
    </div>
    
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
    </div>
    
    <div class="form-group">
        <label for="message">Message</label>
        <textarea id="message" name="message" required></textarea>
    </div>
    
    <button type="submit" class="send-btn" name="send">SEND</button>

    <?php if (!empty($msg)): ?>
        <p style="color:green;"><?= $msg ?></p>
    <?php elseif (!empty($error)): ?>
        <p style="color:red;"><?= $error ?></p>
    <?php endif; ?>
</form>

            </div>


            <div class="contact-info">
                <h3>Reach Us </h3>
                <div class="info-item">
                    <h2>StyleAura</h2>
                    <p1>Click it , Get it , Love it </p1>
                </div>
                
                <div class="info-item">
                    <h2>Phone</h2>
                    <p1>+00 00 00 111</p1>
                </div>
                
                <div class="info-item">
                    <h2>Address</h2>
                    <p1>14 000000000 St.</p1>
                </div>
                <div class="info-item">
                    <h2>E-mail</h2>
                    <p1>styleaura123@email.com</p1>
                </div>
                <div class="info-item">
                    <h2>Hours</h2>
                    <p1>09:00-18:00</p1>
                </div>
            </div>


        </div>
    </div>
    <!------------Footer----------->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col-1">
                    <h3>Download our App</h3>
                    <p1> Download App for Android and ios mobile phone.</p1>
                    <div class="app-badges">
                        <a href="https://play.google.com/store/apps/details?id=your.app.id" target="_blank">
                          <img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Google_Play_Store_badge_EN.svg" class="store-icon" />
                        </a>
                        <a href="https://apps.apple.com/app/idYourAppID" target="_blank">
                          <img src="https://developer.apple.com/assets/elements/badges/download-on-the-app-store.svg" class="store-icon" />
                        </a>
                      </div>
                      
                </div>
                 <div class="footer-col-2">
                    <img src="photos/logof.png">
                    <br><p1> Where style meets essence</p1>
                </div>
                <div class="footer-col-3">
                    <h3>Useful links</h3>
                    <ul>
                        <li>Coupons</li>
                        <li>Blog Post</li>
                        <li>Return Policy</li>
                        <li>Join Affiliate</li>
                    </ul>
                </div>
                <div class="footer-col-4">
                    <h3>Follow Us</h3>
                    <ul>
                        <li>Facebook</li>
                        <li>Twitter</li>
                        <li>Instagram</li>
                        <li>Youtube</li>
                       
                    </ul>
                </div>
            </div>
            <hr>
               <div class="copyright">
                <p>@ 2025 Designed and Developed by:Rabia and Urooj</p>
              </div>
        </div>
    </div>








     <!------------js for toggle menu---------------->
     <script>
        var MenuItems = document.getElementById("MenuItems");
      
      function menutoggle() {
          if (MenuItems.style.display === "block") {
              MenuItems.style.display = "none";
          } else {
              MenuItems.style.display = "block";
          }
      }
              </script>

</body>
</html>