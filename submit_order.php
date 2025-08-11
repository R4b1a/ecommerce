<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check cart from POST (sent via hidden input)
    if (!isset($_POST['cart']) || empty($_POST['cart'])) {
        die("Cart data is empty.");
    }

    $cart = json_decode($_POST['cart'], true);
    if (!is_array($cart) || count($cart) === 0) {
        die("Cart is empty.");
    }

    // Escape form data
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $fathername = mysqli_real_escape_string($conn, $_POST['fathername']);
    $cnic = mysqli_real_escape_string($conn, $_POST['cnic']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $payment_method = mysqli_real_escape_string($conn, $_POST['payment']);

    // Insert into orders table
    $sql_order = "INSERT INTO orders (fullname, fathername, cnic, address, payment_method) 
                  VALUES ('$fullname', '$fathername', '$cnic', '$address', '$payment_method')";
    if (mysqli_query($conn, $sql_order)) {
        $order_id = mysqli_insert_id($conn);

        // Insert order items
        $stmt = $conn->prepare("INSERT INTO order_items (order_id, product_name, price, quantity, image) VALUES (?, ?, ?, ?, ?)");
        foreach ($cart as $item) {
            $stmt->bind_param("isdis", $order_id, $item['name'], $item['price'], $item['quantity'], $item['image']);
            $stmt->execute();
        }
        $stmt->close();

        // Clear cart and redirect to index.php
        echo "<script>
            alert('Order placed successfully!');
            localStorage.removeItem('cart');
            window.location.href='index.php';
        </script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
