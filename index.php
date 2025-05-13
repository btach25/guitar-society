<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Guitar Society</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="styles.css">
  <link rel="javascript" href="script.js">
</head>
<body>

<?php
require_once 'dbconnect.inc.php';

?>

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



  <section class="hero bg-dark text-white text-center">
    <div class="container">
      <h1>Guitar Society</h1>
      
     
    </div>
  </section>



<section class="about py-5">
  <div class="container">
    <h2 class="text-center">News & Articles</h2>
   
    <div class="row justify-content-center align-items-stretch">
      
      <!-- Left Column: Main Featured Article -->
       
      <?php
      $sql = "SELECT * FROM news_articles LIMIT 1";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          echo '
          <div class="col-md-5 d-flex flex-column justify-content-between mb-4 h-100">
            <br/>
            <a href="' . $row['link'] . '" style="text-decoration: none; color: black;">
              <img src="' . $row['image_path'] . '" class="img-fluid mb-4 rounded" alt="' . $row['title'] . '">
              <p><strong>' . $row['title'] . '</strong><br /></a>' . $row['description'] . '</p>
            <br />
            <!-- Responsive YouTube Video Embed -->
            <div class="ratio ratio-16x9">
              <iframe src="https://www.youtube.com/embed/KLt6h1qL6_U?si=lKGQPPfU0TolH9OK" 
                title="YouTube video player" frameborder="0" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
              </iframe>
            </div>
          </div>';
      }
      ?>
      

      <!-- Right Column: Other Articles -->
      <div class="col-md-5 d-flex flex-column justify-content-start h-100">
        <br/>
        <?php
        $sql = "SELECT * FROM news_articles LIMIT 1, 5";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '
                <div class="small-image-text mb-4 d-flex align-items-center">
                  <a href="' . $row['link'] . '" target="_blank" style="text-decoration: none; color: black;">
                    <p>' . $row['title'] . '</p>
                  </a>
                  <img src="' . $row['image_path'] . '" class="img-fluid rounded me-3" alt="' . $row['title'] . '">
                </div>';
            }
        }
        ?>
      </div>
    </div>
  </div>
</section>


<?php
$conn->close();
?>






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
