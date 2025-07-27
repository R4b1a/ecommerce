<?php
include 'db.php';

if (isset($_GET['category']) && !empty($_GET['category'])) {
    $category = $_GET['category'];
    $stmt = $conn->prepare("SELECT * FROM products WHERE category = ?");
    $stmt->bind_param("s", $category);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width", initial scale="1.0">
      <title>All Products - StyleAura</title>
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
      <h2 class="title">All Products </h2>
  
      
       <div class="dropdown-container">
        <div class="dropdown">
          <button class="dropbtn">Product Menu</button>
          <div class="dropdown-content">
            <a href="product.php?category=wardrobe">Wardrobe Pieces</a>
            <a href="product.php?category=fragrances">Fragrances</a>
            <a href="product.php?category=watches">Luxury Time Pieces</a>
            <a href="product.php?category=skincare">Skin Routine</a>
            <a href="product.php?category=eyewear">EyeWear</a>

          </div>
        </div>
      </div>
     

 <!--------- Products---------->


<div class="row">
<?php while($row = $result->fetch_assoc()): ?>
    <div class="col-4">
       <a href="productdetail.php?id=<?php echo $row['id']; ?>">
            <img src="photos/<?php echo $row['image']; ?>">
        </a>
        <h4><?php echo $row['name']; ?></h4>
        <p1>PKR <?php echo number_format($row['price'], 2); ?> Only</p1>
        <i class="fa fa-shopping-basket" aria-hidden="true"
           onclick="addToCart('<?php echo $row['name']; ?>', <?php echo $row['price']; ?>, 'photos/<?php echo $row['image']; ?>')"
           style="cursor:pointer;"></i>
    </div>
<?php endwhile; ?>
</div>








 <div class="page-btn">
            <a href="product.php?category=wardrobe"><span>1</span></a>
            <a href="product.php?category=fragrances"><span>2</span></a> 
            <a href="product.php?category=watches"><span>3</span></a> 
            <a href="product.php?category=skincare"><span>4</span></a> 
             <a href="product.php?category=eyewear"><span>&#8594;</span></a> 
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


<!------------------cart-->
<script>
function addToCart(name, price, image) {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    cart.push({ name, price, image, quantity: 1 });
    localStorage.setItem("cart", JSON.stringify(cart));
    alert(name + " added to cart!");
}
</script>




</body>
</html>