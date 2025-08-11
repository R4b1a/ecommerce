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


<?php
session_start();
include 'db.php';

if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}
?>

<h2>Welcome, <?php echo $_SESSION['admin']; ?></h2>
<div class="logout-container">
  <a href="admin_logout.php" class="logout-btn">🚪 Logout</a>
</div>



<div class="dashboard-container">
    <!-- 1. Add Product -->
    <div class="dashboard-card product-form">
        <h3>Add Product</h3>
        <form action="add_product.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="title" placeholder="Product Title" required><br>
            <input type="number" step="0.01" name="price" placeholder="Price" required><br>
            <textarea name="description" placeholder="Description" required></textarea><br>
            <input type="file" name="image" accept="image/*" required><br>
            <button type="submit" style="width:100%; padding:10px; background:#28a745; color:white; border:none; border-radius:5px; cursor:pointer; font-size:16px;">Add Product</button>
        </form>
        <h3 >Remove Product</h3>
    <form action="remove_product.php" method="POST">
        <input type="number" name="product_id" placeholder="Product ID" required style="width:100%; padding:10px; margin-bottom:10px; border:1px solid #ccc; border-radius:5px;"><br>
        <button type="submit" style="width:100%; padding:10px; background:#dc3545; color:white; border:none; border-radius:5px; cursor:pointer; font-size:16px;">Remove Product</button>
    </form>
    </div>
   </div> 

  <!-- 2. View Products -->
   <div class="dashboard-card products-list">
    <h3>Products</h3>
    <?php
    $products = mysqli_query($conn, "SELECT * FROM products") or die("Query Failed: " . mysqli_error($conn));

    if (mysqli_num_rows($products) > 0) {
        while ($row = mysqli_fetch_assoc($products)) {
            echo "<div>
                    <img src='photos/{$row['image']}' width='80'><br>
                    {$row['name']} - PKR {$row['price']}<br>
                    <small>{$row['description']}</small>
                  </div><hr>";
        }
    } else {
        echo "<p>No products found.</p>";
    }
    ?>
</div>



<!-- Orders -->
  <div class="dashboard-card orders-list">
    <h3>Orders</h3>
    <?php
    $orders = mysqli_query($conn, "SELECT * FROM orders ORDER BY created_at DESC");
    if ($orders === false) {
        echo "<p>Error loading orders: " . mysqli_error($conn) . "</p>";
    } else {
        while ($order = mysqli_fetch_assoc($orders)) {
            // ensure we use an integer id
            $order_id = (int) $order['id'];

            echo "<div class='order-block'>
                    <b>Order #{$order_id}</b> - <small>" . htmlspecialchars($order['created_at']) . "</small><br>
                    <b>Customer:</b> " . htmlspecialchars($order['fullname']) . "<br>
                    <b>Father Name:</b> " . htmlspecialchars($order['fathername']) . "<br>
                    <b>CNIC:</b> " . htmlspecialchars($order['cnic']) . "<br>
                    <b>Address:</b> " . nl2br(htmlspecialchars($order['address'])) . "<br>
                    <b>Payment Method:</b> " . htmlspecialchars($order['payment_method']) . "<br><br>";

         $items_sql = "SELECT product_name, price, quantity, image FROM order_items WHERE order_id = {$order_id}";
$items = mysqli_query($conn, $items_sql);




            if ($items === false) {
                echo "<p style='color:red;'>Error loading items: " . mysqli_error($conn) . "</p>";
            } elseif (mysqli_num_rows($items) === 0) {
                echo "<p>No items found for this order.</p>";
            } else {
                echo "<table style='width:100%; border-collapse: collapse; font-size: 14px;'>
                        <tr style='background:#ff523b; color:white;'>
                            <th style='padding:5px; text-align:left;'>Product</th>
                            <th style='padding:5px; text-align:center;'>Price</th>
                            <th style='padding:5px; text-align:center;'>Qty</th>
                            <th style='padding:5px; text-align:right;'>Subtotal</th>
                        </tr>";
                $order_total = 0.0;
                while ($item = mysqli_fetch_assoc($items)) {
                    // cast values to correct types
                    $price = (float) $item['price'];
                    $qty = (int) $item['quantity'];
                    $subtotal = $price * $qty;
                    $order_total += $subtotal;

                    $product_name = htmlspecialchars($item['product_name']);
                    $image = !empty($item['image']) ? "photos/" . htmlspecialchars($item['image']) : "photos/no-image.png";

                    echo "<tr style='border-bottom:1px solid #ddd;'>
                            <td '>
                                <img src='{$image}' width='40' style='vertical-align:middle; margin-right:8px; border-radius:4px;'>
                                {$product_name}
                            </td>
                            <td>PKR " . number_format($price,2) . "</td>
                            <td >{$qty}</td>
                            <td >PKR " . number_format($subtotal,2) . "</td>
                          </tr>";
                }
                echo "<tr>
                        <td colspan='3' style='padding:8px; text-align:right; font-weight:bold;'>Total:</td>
                        <td>PKR " . number_format($order_total,2) . "</td>
                      </tr>";
                echo "</table>";
            }

            echo "</div>"; // end order-block
        } // end while orders
    } // end else orders
    ?>
</div>
<style>
body {
    font-family: Arial, sans-serif;
    background: #f5f5f5;
    margin: 0;
    padding: 0;
}

.logout-container {
  text-align: right;
  padding: 15px 25px;
}

.logout-btn {
  display: inline-block;
  background:  linear-gradient(135deg, #8B4513, #A0522D); 
  color: white;
  text-decoration: none;
  padding: 12px 22px;
  border-radius: 25px;
  font-size: 16px;
  font-weight: bold;
  box-shadow: 0px 4px 10px rgba(255, 0, 76, 0.3);
  transition: all 0.3s ease;
}

.logout-btn:hover {
  background: linear-gradient(135deg, #8B4513, #5C3317);
  transform: scale(1.08);
  box-shadow: 0px 6px 14px rgba(255, 0, 76, 0.4);
}

.logout-btn:active {
  transform: scale(0.95);
}


/* Dashboard Wrapper */
.dashboard-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    padding: 20px;
}

/* Card style for each portion */
.dashboard-card {
    background: #fff;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

/* Add & Remove Products Section */
.product-form {
    flex: 1 1 300px;
}

.product-form h3 {
    margin-bottom: 15px;
}

.product-form input,
.product-form textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

/* Buttons */
.btn-green {
    background: #28a745;
    color: white;
    border: none;
    padding: 10px;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
}

.btn-green:hover {
    background: #218838;
}

.btn-red {
    background: #dc3545;
    color: white;
    border: none;
    padding: 10px;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
}

.btn-red:hover {
    background: #b02a37;
}

/* Products List */
.products-list {
    flex: 1 1 300px;
}

.products-list img {
    border-radius: 5px;
    margin-bottom: 5px;
}

/* Orders Section */
.orders-list {
    flex: 1 1 100%;
}

.order-block {
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 15px;
    margin-bottom: 15px;
    background: #fafafa;
}

.order-block table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
}

.order-block th,
.order-block td {
    padding: 6px;
    border-bottom: 1px solid #ddd;
}

.order-block th {
    background: #ff523b;
    color: white;
}

</style>
