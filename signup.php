

<?php
require_once 'dbconnect.inc.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);


// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $subscribed = isset($_POST['subscribe']) ? 1 : 0;

    

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the SQL statement
    $sql = "INSERT INTO SignUps (email, subscribed) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $email, $subscribed);

    // Execute the statement
    $stmt->execute();

    // Close the connection
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up - Guitar Society</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="styles.css">
  <style>
    html, body {
        height: 100%; 
        margin: 0; 
    }
    body {
        display: flex; 
        flex-direction: column; 
    }
    footer {
        margin-top: auto; 
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#"><img src="images/logo3.png" style="height: 30px; width: 80px" class="img-fluid rounded me-3" ></a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home</a>
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

<!-- Signup Form Section -->
<div class="container my-5">
    <h6 class="text-center">Welcome to the Guitar Society family! We're thrilled that you’ve chosen to join us and can't wait to share exciting updates, tips, and exclusive offers with you.

As a subscriber, you're now part of a community that values all things guitar.
<p>
<br />
Feel free to explore our website and let us know if you have any questions or need assistance. We're here to help!

Once again, thank you for subscribing. We're looking forward to building a valuable relationship with you!
</p>

Thank you!
<br />
<br />

Guitar Society</h6>
</div>

<!-- Return Home Button -->
<div class="text-center mb-4">
    <a href="index.php" class="btn btn-primary">Return Home</a>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
