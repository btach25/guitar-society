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
require_once 'dbconnect.inc.php'; // Ensure this file contains the correct DB connection setup.

if (!$conn) {
    // If the connection fails, output a message and stop the script
    die('Database connection failed: ' . $conn->connect_error);
}
?>

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
          <a class="nav-link" href="#">Blogs & Reviews</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../capstone/shopping.php">Store</a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Hero Section for Reviews -->
  <section class="hero-reviews bg-dark text-white text-center">
    <div class="container">
      <h1>Guitar Reviews</h1>
    </div>
  </section>


  <section class="about py-5">
  <div class="container">
    <h2 class="text-center">Instruction and Reviews</h2>
   
    <div class="row justify-content-center align-items-stretch">
      <?php
      // Verify connection and fetch reviews
      if ($conn) {
          $query = "SELECT title, description, url, image_url FROM reviews";
          $result = $conn->query($query);
      
          if ($result === false) {
              // If the query fails, show an error
              echo '<p class="text-center">There was an error fetching the reviews.</p>';
          } elseif ($result->num_rows > 0) {
              // Display reviews
              while($row = $result->fetch_assoc()) {
                  echo '<div class="col-md-4">';
                  echo '<div class="card mb-3">';
          
                  if (!empty($row['image_url'])) {
                      echo '<a href="' . htmlspecialchars($row['url']) . '" target="_blank">';
                      echo '<img src="' . htmlspecialchars($row['image_url']) . '" class="card-img-top" alt="Review Image">';
                      echo '</a>'; 
                  }
          
                  echo '<div class="card-body">';
                  echo '<h5 class="card-title">' . htmlspecialchars($row['title']) . '</h5>';
                  echo '<p class="card-text">' . htmlspecialchars($row['description']) . '</p>';
                  echo '</div>'; 
                  echo '</div>'; 
                  echo '</div>'; 
              }
          } else {
              echo '<p class="text-center">No reviews available at the moment.</p>';
          }
      } else {
          echo '<p class="text-center">Database connection failed!</p>';
      }
      ?>
    </div>

    <!-- Video Cards Section -->
    <h2 class="text-center mt-5">Lesson Videos</h2>
    <div class="row justify-content-center align-items-stretch">
      <div class="col-md-4">
        <div class="card mb-3">
          <iframe width="100%" height="315" src="https://www.youtube.com/embed/Y6GpHB0-eYA" title="HERE COMES THE SUN GUITAR LESSON - How To Play Here Comes The Sun By The Beatles" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
          <div class="card-body">
            <h5 class="card-title">How to Play Here Comes The Sun</h5>
            
          </div>
        </div>
      </div>
      
      <div class="col-md-4">
        <div class="card mb-3">
          <iframe width="100%" height="315" src="https://www.youtube.com/embed/gmvwZRwn-j0" title="Piano chords for beginners" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
          <div class="card-body">
            <h5 class="card-title">Piano Chords for Beginners</h5>
            
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card mb-3">
          <iframe width="100%" height="315" src="https://www.youtube.com/embed/TBEwqZSTu2s" title="How to Play The Pentatonic Scale" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
          <div class="card-body">
            <h5 class="card-title">How to Play The Pentatonic Scale</h5>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



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
