<?php 
include "dbconnect.php";

  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: Login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: Login.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ashesi Business Hub</title>
	<link rel="stylesheet" href="Navbar.css">
  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
  <a href="image.php">&#8592;</a>
  <?php
     $sql="SELECT * FROM products ORDER BY product_id DESC";
      $res=mysqli_query($dbconnect,$sql);
      if(mysqli_num_rows($res) > 0) 
      {
        while($images=mysqli_fetch_assoc($res))
        { ?>
        <div class="upload">
          <img src="images/<?=$images['image_text']?>">
        <div>


       <?php }

       }?>

  
<div class="row">
<div class="col-2">
<div class="wrapper">
    <div class="sidebar">
        <h2>Ashesi Business Hub</h2>
        <div class="content">
      <!-- notification message -->
      <?php if (isset($_SESSION['success'])) : ?>
        <div class="error success" >
          <h3>
            <?php 
              echo $_SESSION['success']; 
              unset($_SESSION['success']);
            ?>
          </h3>
        </div>
      <?php endif ?>

      <!-- logged in user information -->
      <?php  if (isset($_SESSION['username'])) : ?>
        <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
      <?php endif ?>
    </div>
        <ul>
            <li><a href="#"><i class="fas fa-home"></i>Home</a></li>
            <li><a href="#"><i class="fas fa-user"></i>Profile</a></li>
            <li><a href="#"><i class="fas fa-address-card"></i>About</a></li>
            <li><a href="image.php"><i class="fas fa-project-diagram"></i>Sell</a></li>
            <li><a href="#"><i class="fas fa-address-book"></i>Inbox</a></li>
            <li><p> <a href="Navbar.php?logout='1'" style="color: red;">Log Out</a> </p></li>
        </ul> 
        <div class="social_media">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
      </div>
    </div>
    </div>
    </div>


    <!-- Three columns of text below the carousel -->
    <div class="col" style="padding: 0px; margin: none;">
    <div class="header ">
         <h1>Your Buying and Selling Hub</h1>
    </div>
    <div class="row">
    <div class="text-end col-10 col-lg-10 mb-3 mb-lg-0 pe-0">
         <form class="">
            <input type="search" class="form-control form-control-dark" placeholder="Search Here" aria-label="Search" style="display: inline">
          </form>
      </div>
      <div class="col ps-0">
      <button type="button" class="btn btn-warning" style="background-color: #934444;">Search</button>
      </div>
      <div class="row mt-3 mx-5 px-5">
        <h1 class="big_head mb-4 d-flex justify-content-center">Browse Categories</h1>
        <div class="col-lg-4">
          <a href="#" ><img src="images/beauty.jpg" class="rounded-circle" style="width:140px; height: 140px;"></a>
          </a>
          <p class="category">Beauty and Fashion</p>
        </div>

        <div class="col-lg-4">
          <a href="#" ><img src="images/fruits.jpg" class="rounded-circle" style="width:140px; height: 140px;"></a>
          </a>
          <p class="category">Fruits</p>
        </div>

        <div class="col-lg-4">
          <a href="#" ><img src="images/clothing.jpg" class="rounded-circle" style="width:140px; height: 140px;"></a>
          </a>
          <p class="category">Clothing</p>
        </div>
      </div>
        

        <!-- Three columns of text below the carousel -->
        <div class="row mt-5 mx-5 px-5">
            <div class="col-lg-4">
              <a href="#" ><img src="images/electronics.jpg" class="rounded-circle" style="width:140px; height: 140px;"></a>
              </a>
              <p class="category">Electronics</p>
            </div>

            <div class="col-lg-4">
              <a href="#" ><img src="images/school materials.jpg" class="rounded-circle" style="width:140px; height: 140px;"></a>
              </a>
              <p class="category">School Materials</p>
            </div>

            <div class="col-lg-4">
              <a href="#" ><img src="images/plus.jpg" class="rounded-circle" style="width:140px; height: 140px;"></a>
              </a>
              <p class="category">Browse More</p>
            </div>
        </div>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <div class="col">
          <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

            <div class="card-body">
              <p class="card-text">Clothes<br>GHC: 350</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">Add to Cart</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Like</button>
                </div>
                <!--<small class="text-muted">9 mins</small>-->
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

            <div class="card-body">
              <p class="card-text">Gold Necklces<br>GHC: 15</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">Add to Cart</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Like</button>
                </div>
                <!--<small class="text-muted">9 mins</small>-->
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

            <div class="card-body">
              <p class="card-text">Lenovo Charger<br>GHC: 50</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">Add to Cart</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
                <!--<small class="text-muted">9 mins</small>-->
              </div>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

            <div class="col">
          <div class="card shadow-sm">
            <div class="card-body">
            <a href="#" ><img src="images/iphone.jpg" class="card-img-top" style="width:100%; height: 225;"></a>

              <p class="card-text">Second hand iphone<br>GHC: 25</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">Add to Cart</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Like</button>
                </div>
                <!--<small class="text-muted">9 mins</small>-->
              </div>
            </div>
          </div>
        </div>


            <div class="card-body">
              <p class="card-text">Second hand iphone11<br>GHC: 1300</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">Add to Cart</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Like</button>
                </div>
                <!--<small class="text-muted">9 mins</small>-->
              </div>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card shadow-sm">
            <div class="card-body">
            <a href="#" ><img src="images/Pillows.jpg" class="card-img-top" style="width:100%; height: 225px;"></a>

              <p class="card-text">Pillows<br>GHC: 25</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">Add to Cart</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Like</button>
                </div>
                <!--<small class="text-muted">9 mins</small>-->
              </div>
            </div>
          </div>
        </div>


        <div class="col">
          <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

            <div class="card-body">
              <p class="card-text">Pepsodent<br>GHC: 10</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">Add to Cart</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Like</button>
                </div>
               <!--- <small class="text-muted">9 mins</small>-->
              </div>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

            <div class="card-body">
              <p class="card-text">Block Heel<br>GHC: 60</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">Add to Cart</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Like</button>
                </div>
               <!---<small class="text-muted">9 mins</small>-->
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

            <div class="card-body">
              <p class="card-text">Hoodies<br>GHC: 85</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">Add to Cart</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Like</button>
                </div>
                <!--<small class="text-muted">9 mins</small>-->
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

            <div class="card-body">
              <p class="card-text">Sports Boots<br>GHC: 65</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">Add to Cart</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Like</button>
                </div>
                <!--<small class="text-muted">9 mins</small>-->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
  
    

          
</div>
</body>
</html>

 