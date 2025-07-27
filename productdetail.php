<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Main product
    $sql = "SELECT * FROM products WHERE id = $id";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        $product = $result->fetch_assoc();
    } else {
        echo "Product not found."; exit;
    }

    // Product images
    $imgSql = "SELECT * FROM product_images WHERE product_id = $id";
    $images = $conn->query($imgSql);
} else {
    echo "No product ID provided."; exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width", initial scale="1.0">
    <title><?php echo $product['name']; ?> | StyleAura</title>
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

        <!---------single product details----------->
<div class="small-container single-product">
    <div class="row">
        <div class="col-2">
            <img src="photos/<?php echo $product['image']; ?>" width="85%" id="ProductImg">

            <div class="small-img-row">
                <?php while ($img = $images->fetch_assoc()): ?>
                    <div class="small-img-col">
                        <img src="photos/<?php echo $img['image']; ?>" onclick="ShowImg(this.src)">
                    </div>
                <?php endwhile; ?>
            </div>
        </div>

        <div class="col-2">
            <h2><?php echo $product['name']; ?></h2>
            <h4>PKR <?php echo number_format($product['price'], 2); ?></h4>

            <select>
                <option>Select Size</option>
                <option>XXL</option>
                <option>XL</option>
                <option>Large</option>
                <option>Medium</option>
                <option>Small</option>
            </select>

            <input type="number" value="1" min="1">
            <button class="btn" onclick="addToCart('<?php echo $product['name']; ?>', <?php echo $product['price']; ?>, 'photos/<?php echo $product['image']; ?>')">Add to Cart</button>

            <h3>Product Detail</h3>
            <p1><?php echo $product['description']; ?></p1>
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
                    <h3>Useful links</h3>
                    <ul>
                        <li>Coupons</li>
                        <li>Blog Post</li>
                        <li>Return Policy</li>
                        <li>Join Affiliate</li>
                    </ul>
                </div>
                <div class="footer-col-3">
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
        
    </script>
    <!--------------js for product detail -------->
 <script>
function ShowImg(src) {
    document.getElementById("ProductImg").src = src;
}

function addToCart(name, price, image) {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    cart.push({ name, price, image, quantity: 1 });
    localStorage.setItem("cart", JSON.stringify(cart));
    alert("Added to cart!");
}
</script>

    </body>
</html>      
