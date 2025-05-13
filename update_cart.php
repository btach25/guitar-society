<?php

require_once 'dbconnect.inc.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['product_id']) && isset($_POST['quantity'])) {
    $product_id = $_POST['product_id'];
    $quantity = (int)$_POST['quantity'];

    if ($quantity > 0) {
        
        $_SESSION['cart'][$product_id] = $quantity;
    } else {
       
        unset($_SESSION['cart'][$product_id]);
    }
}


header("Location: cart.php");
exit;
?>
