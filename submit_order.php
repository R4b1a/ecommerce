<?php
include 'db.php'; // Make sure this connects to your database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $fathername = $_POST['fathername'];
    $cnic = $_POST['cnic'];
    $address = $_POST['address'];
    $payment = $_POST['payment'];

    // Insert into orders table (you can create this table in your DB)
    $sql = "INSERT INTO orders (fullname, fathername, cnic, address, payment_method)
            VALUES ('$fullname', '$fathername', '$cnic', '$address', '$payment')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
            alert('Thank you! Your order has been placed.');
            window.location.href = 'index.php'; // redirect after success
        </script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
