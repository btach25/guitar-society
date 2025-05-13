<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once 'dbconnect.inc.php';

$total = 0; 
$cartItems = ''; 

if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $product_id => $quantity) {
       
        $sql = "SELECT title, description, unit_price, image_path FROM products WHERE sku = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $product_id); 
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            $product_total = $row['unit_price'] * $quantity; // Calculate total for this product
            
           
            $cartItems .= '<div class="cart-item">';
            $cartItems .= '<p>' . htmlspecialchars($row['description']) . '</p>';
            $cartItems .= '<p>Price: $' . number_format($row['unit_price'], 2) . '</p>';
            $cartItems .= '<p>Quantity: <form action="update_cart.php" method="post" style="display:inline;">
                      <input type="hidden" name="product_id" value="' . htmlspecialchars($product_id) . '">
                      <input type="number" name="quantity" value="' . $quantity . '" min="0"> <!-- Allow 0 to remove -->
                      <button type="submit" class="btn btn-secondary">Update</button>
                  </form></p>';
            $cartItems .= '<img src="images/' . htmlspecialchars($row['image_path']) . '" alt="Product Image" style="width:50px;">';
            $cartItems .= '</div>';

          
            $total += $product_total;
        }
    }

    
    $cartItems .= '<div class="total" style="font-weight: bold;">';
    $cartItems .= '<h5>Total: $' . number_format($total, 2) . '</h5>';
    $cartItems .= '</div>';
} else {
    $cartItems = "<div>Your cart is empty.</div>";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shopping Cart - Guitar Society</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="styles.css">
  <style>
    .cart-item {
        border: 1px solid #ccc;          
        padding: 4px;                    
        margin: 10px 0;                  
        border-radius: 5px;             
        background-color: #f9f9f9;      
        
        margin-left: 0;                  
        margin-right: 60%;
    }
    .container {
       
        width: 100%; 
        max-width: none; 
        text-align: left; 
    }
    .wrapper {
    display: flex;
    flex-direction: column; 
    min-height: 100vh; 
}

.container {
    flex: 1; 
}


footer {
    margin-top: auto; 
}

  </style>
</head>
<body>
<div class="wrapper">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#"><img src="images/logo3.png" style="height: 30px; width: 80px" class="img-fluid rounded me-3"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../capstone/reviews.php">Blogs & Reviews</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../capstone/shopping.php">Store</a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Cart Items Section -->
  <div class="container my-5">
      <?php echo $cartItems; // Display cart items ?>
      <div style="text-align: left; margin-top: 20px;">
          <form action="shopping.php" method="get">
              <button type="submit" class="btn btn-primary">Return to Store</button>
          </form>
      </div>
  </div>

  <!-- Footer -->
  <footer class="bg-dark text-white text-center py-4">
    <div class="container">
      <div class="row justify-content-center mb-3">
        <!-- Facebook -->
        <div class="col-auto">
          <a href="https://www.facebook.com" target="_blank">
            <img src="images/facebook2.png" alt="Facebook" class="img-fluid" style="height: 40px;">
          </a>
        </div>
        <!-- Instagram -->
        <div class="col-auto">
          <a href="https://www.instagram.com" target="_blank">
            <img src="images/instagram2.png" alt="Instagram" class="img-fluid" style="height: 40px;">
          </a>
        </div>
        <!-- Twitter -->
        <div class="col-auto">
          <a href="https://www.twitter.com" target="_blank">
            <img src="images/twitter2.png" alt="Twitter" class="img-fluid" style="height: 40px;">
          </a>
        </div>
        <!-- YouTube -->
        <div class="col-auto">
          <a href="https://www.youtube.com" target="_blank">
            <img src="images/youtube4.png" alt="YouTube" class="img-fluid" style="height: 40px;">
          </a>
        </div>
      </div>
    </div>
  </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
