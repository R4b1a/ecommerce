<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "ecom"); 

$loginMessage = "";
$registerMessage = "";

// Only process if form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // LOGIN FORM
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($conn, $sql);

        if ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $row['password'])) {
                $_SESSION['user'] = $row['username'];
                header("Location: index.php"); // Redirect to homepage
                exit();
            } else {
                $loginMessage = "❌ Incorrect password!";
            }
        } else {
            $loginMessage = "❌ User not found!";
        }
    }

    // REGISTRATION FORM
    if (isset($_POST['register'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        // Check if user already exists
        $check = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' OR email='$email'");
        if (mysqli_num_rows($check) > 0) {
            $registerMessage = "❌ Username or Email already exists!";
        } else {
            $sql = "INSERT INTO users (username, email, phone, password) 
                    VALUES ('$username', '$email', '$phone', '$password')";
            if (mysqli_query($conn, $sql)) {
                $registerMessage = "✅ Registration successful! You can now log in.";
            } else {
                $registerMessage = "❌ Error: " . mysqli_error($conn);
            }
        }
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
             <img src="photos/logof.png" width="160px" height="160px">
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
      <!------------Sign Up Page------->



            <div class="account-page">
                <div class="container">
                    <div class="row">
                        <div class="col-2">
                            <img src="photos/acount.jpg">
                        </div>
                        <div class="col-2">
                            <div class="form-container">
                               <div class="form-btn">
                                <span onclick="login()">Login</span>
                                <span onclick="register()">Register</span>
                                <hr id="Indicator">
                               </div>

                           <!-- LOGIN FORM -->
<form id="LoginForm" method="post" action="account.php">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit" class="btn" name="login">Login</button>
    <a href="#">Forgot Password?</a>
    <?php if (!empty($loginMessage)): ?>
        <div class="message"><?= $loginMessage ?></div>
    <?php endif; ?>
</form>

<!-- REGISTRATION FORM -->
<form id="RegForm" method="post" action="account.php">
    <input type="text" name="username" placeholder="Username" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="number" name="phone" placeholder="Phone Number" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit" class="btn" name="register">Register</button>
    <?php if (!empty($registerMessage)): ?>
        <div class="<?= str_contains($registerMessage, '✅') ? 'success' : 'message' ?>">
            <?= $registerMessage ?>
        </div>
    <?php endif; ?>
</form>



         

                            </div>
                        </div>
                    </div>
                </div>
            </div>  





      


       <!-------footer-------->
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
                <p>@ 2025 Designed and Developed by:Rabia and Urooj </p>
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

<!--------js for toggle form------->
<script>
    var LoginForm = document.getElementById("LoginForm");
    var RegForm = document.getElementById("RegForm");
    var Indicator = document.getElementById("Indicator");

    function register(){
        RegForm.style.transform = "translateX(0px)";
        LoginForm.style.transform = "translateX(0px)";
        Indicator.style.transform = "translateX(100px)";
    }

    function login(){
        RegForm.style.transform = "translateX(300px)";
        LoginForm.style.transform = "translateX(300px)";
        Indicator.style.transform = "translateX(0px)";
    }



</script>




    </body>
</html>