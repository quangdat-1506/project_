<?php
    session_start();
    $conn = new mysqli('localhost', 'root', '', 'web_mysqli') or die('Không kết nối được với cơ sở dữ liệu');
    mysqli_query($conn, 'SET NAMES UTF8');
    session_start(); // Initialize the session

    if (isset($_GET['ten_sp'])) {
        $id = $_GET['ten_sp'];

        // Check if the product is in the cart
        if (isset($_SESSION['cart'][$id])) {
            unset($_SESSION['cart'][$id]); // Remove the product from the cart
        }

        // Redirect to the cart page
        header('Location: ../../../index.php?action=giohang');
        exit;
    } else {
        header('Location: index.php'); // If no product is specified, redirect to the home page
        exit;
    }
?>