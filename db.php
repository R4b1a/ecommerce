<?php
$conn = new mysqli("localhost", "root", "", "ecom");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>