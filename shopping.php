<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Guitar Society</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="styles.css">
</head>
<body>

<?php
require_once 'dbconnect.inc.php';

?>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php"><img src="images/logo3.png" style="height: 30px; width: 80px" class="img-fluid rounded me-3"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="../capstone/index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../capstone/reviews.php">Blogs & Reviews</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Store</a>
        </li>
      </ul>
    </div>
  </nav>


  <section class="hero-shopping bg-dark text-white text-center">
    <div class="container">
      <h1>Guitar Store</h1>
    </div>
  </section>


<section class="gallery py-5">
    <div class="container">
        <h2 class="text-center">Guitars, Keyboards, and More</h2>
        <div class="row">




<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}





if (isset($_SESSION['success_message'])) {
    echo '<div class="alert alert-success">' . $_SESSION['success_message'] . '</div>';
    unset($_SESSION['success_message']); 
}



$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT title, description, unit_price, image_path, sku FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $image_url = 'images/' . htmlspecialchars($row['image_path']); 
    echo '<div class="col-md-4 shopping-item">'; 
    echo '<div class="card mb-4">';
    echo '<img src="' . $image_url . '" class="card-img-top" alt="Product Image" style="width: 150px; height: auto;">';

    echo '<div class="card-body">';
    echo '<h5 class="card-title">' . htmlspecialchars($row['title']) . '</h5>';
    echo '<p class="card-text">' . htmlspecialchars($row['description']) . '</p>';
    echo '<p class="card-text">$' . number_format($row['unit_price'], 2) . '</p>';
    echo '</div>';
    echo '</div>';
    echo '<form action="add_to_cart.php" method="post">';
    echo '<input type="hidden" name="product_id" value="' . htmlspecialchars($row['sku']) . '">'; // Use 'sku'
    echo '<input type="number" name="quantity" value="1" min="1" required style="width: 60px;">';
    echo '<button type="submit" class="btn btn-primary">Add to Cart</button>';
    echo '</form>';
    echo '</div>';
  }
} else {
    echo "<div class='col-12 text-center'>0 results</div>";
}




$conn->close();
?>


        </div>
    </div>
</section>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


?>

<a href="cart.php" class="btn btn-secondary">View Cart</a>




 <!-- Contact Section -->
<section class="contact bg-dark text-white py-5 text-center">
  <div class="container">
    <h4>Be the first to know about exclusive offers, tips and more.</h4>
    <br />
    

    <!-- Email Signup Form -->
    <form class="row g-3 justify-content-center" action="signup.php" method="post">
    <div class="col-auto">
        <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email" style="width: 300px;" required>
    </div>
    <div class="col-auto">
        <button type="submit" class="btn btn-light mb-3">Sign Up</button>
    </div>
    <div class="col-12 text-center checkbox-container">
        <div class="form-check d-inline-block">
            <input class="form-check-input" type="checkbox" name="subscribe" id="subscribe">
            <label class="form-check-label" for="subscribe">
                Yes, I would like to receive emails with news and offers from Guitar Society
            </label>
        </div>
    </div>
</form>

   
</section>




  
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
