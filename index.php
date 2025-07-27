
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
             <img src="photos/logof.png" width="200px" height="170px">
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
            <div class="row">
                <div class="col-2">
                    <h2>Fragrance you wear. Fashion you feel.</h2><br>
                    <p>Be fearless. Be iconic. Be you.<br>
                        This season’s must-haves, all in one place.<br>
                        Wear what moves you — fashion that breaks the rules.</p>
                    <a href="product.php" class="btn"> Explore Now &#8594;</a>
                </div>
                <div class="col-2">
                    <img src="photos/wardrope.jpg">
            </div>
        </div>
       
        </div> 
      </div>
    <!------feature categories------>
        <div class="categories">
            <div class="small-container">
             <div class="row">
                <div class="col-3"> <img src="photos/indexpage1.jpg"> </div>
                 <div class="col-3"> <img src="photos/indexpage2.jpg"> </div>
                 <div class="col-3"> <img src="photos/indexpage3.jpg"> </div>
            </div>
            </div>
             </div>
        
       <!----------About us---------->
       <h2 class="title">Why Choose Us </h2>
       <div class="row">
        <div class="col-2">
            <h2>Welcome to StyleAura!!</h2>
            <p1>
                We made an online store where you can find Clothes, Eyewear, Watches, Fragrances, Skincare items, etc.
                Our goal is to make shopping easy, fun, and affordable for everyone.<br><br>
        
                We started this store because we love helping people find great products without the stress of going
                to a physical store. Here, you can shop from the comfort of your home and get what you need delivered
                right to your door.<br><br>
        
                At StyleAura, we care about our customers. That’s why we offer good-quality items, safe and easy payment
                options, fast shipping, and friendly support if you ever need help.<br><br>
        
                Thanks for visiting! We hope you enjoy shopping with us.<br><br></p1>
        
            <h2>Why Shop With Us?</h2>
            <ul class="features-list">
                <li>Great Products</li>
                <li>Safe Payments</li>
                <li>Fast Delivery</li>
                <li>Easy Returns</li>
                <li>Helpful Support</li>
            </ul>
        </div>    
                    <div class="col-2">
                        <img src="photos/aboutus.jpg" width="85%">
                </div>
            </div>
    
     
              
              

        <!-----Offer--------->
        <div class="offer">
            <div class="small container">
                <div class="row">
                    <div class="col-2">
                        <img src="photos/limone co ord set.webp" class="offer-img">
                    </div>
                    <div class="col-2">
                        <h3>Also Avaiable on this Store</h3>
                        <p2> Limone Co Ord Set</p2><br>
                        <p1>Price : 4999.00 Only</p1><br>
                        <small>Limone Co Ord Set. Made with luxurious crepe fabric
                             and adorned with a stunning print, this set is the perfect
                              combination of comfort and chic. Pair it together or mix
                               and match for versatile and stylish looks.
                             Embrace sophistication and ease with our Limone Co Ord Set.</small>
                             <h6>Fabric: Crepe.</h6>
                             <a href="#" class="btn" onclick="addToCart('Limone Co Ord Set', 4999, 'photos/limone co ord set.webp')">Buy Now &#8594;</a>

                    </div>
                </div>
            </div>
        </div>
    <!---------testtimonial----------->
        <div class="testimonial">
            <div class="small-container">
                <div class="row">
                    <div class="col-3">
                        <i class="fa fa-quote-left"></i>
                        <p1> Quality is never an accident; it is always the result of intelligent efforts</p1>
                        <div class="rating">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                       <i class="fa-solid fa-star-half-stroke"></i>
                       <i class="fa-solid fa-star-half-stroke"></i>
                        <i class="fa-regular fa-star"></i>
                        </div>
                        <img src="photos/user1.jpeg">
                        <h3>Elmira A. Kelly</h3>
                    </div>
                     <div class="col-3">
                        <i class="fa fa-quote-left"></i>
                        <p1> Quality is never an accident; it is always the result of intelligent efforts</p1>
                        <div class="rating">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                       <i class="fa-solid fa-star-half-stroke"></i>
                       <i class="fa-solid fa-star-half-stroke"></i>
                        <i class="fa-regular fa-star"></i>
                        </div>
                        <img src="photos/user2.jpeg">
                        <h3>Jeffrey C. Montgomery</h3>
                    </div>
                     <div class="col-3">
                        <i class="fa fa-quote-left"></i>
                        <p1> Quality is never an accident; it is always the result of intelligent efforts</p1>
                        <div class="rating">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                       <i class="fa-solid fa-star-half-stroke"></i>
                       <i class="fa-solid fa-star-half-stroke"></i>
                        <i class="fa-regular fa-star"></i>
                        </div>
                        <img src="photos/user3.jpeg">
                        <h3>Claws</h3>
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



<script>
function addToCart(name, price, image) {
  const sanitizedName = String(name);
  const sanitizedPrice = parseFloat(price);
  const sanitizedImage = String(image);

  const cart = JSON.parse(localStorage.getItem("cart")) || [];
  cart.push({
    name: sanitizedName,
    price: sanitizedPrice,
    image: sanitizedImage,
    quantity: 1
  });
  localStorage.setItem("cart", JSON.stringify(cart));

  alert(sanitizedName + " added to cart!");
}
</script>




</body>
</html>