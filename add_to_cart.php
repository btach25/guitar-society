

<?php


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}



// Check if the request is POST and product_id and quantity are set
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'], $_POST['quantity'])) {
    $product_id = $_POST['product_id'];
    $quantity = intval($_POST['quantity']); // Retrieve quantity from the form

    // Initialize cart if it doesn't exist
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Add product to cart with quantity
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id] += $quantity; // Increment quantity if product already in cart
    } else {
        $_SESSION['cart'][$product_id] = $quantity; // Set quantity for new product
    }

    $_SESSION['success_message'] = "Product added to cart!";
    header("Location: shopping.php");
    exit();
} else {
    // Handle invalid requests (optional)
    $_SESSION['error_message'] = "Invalid request.";
    header("Location: shopping.php");
    exit();
}


?>
