
<?php 
//connect to database
include "server.php";

  //session_start(); 

  if (!isset($_SESSION['id'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: Login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
    unset($_SESSION['fullname']);
  	unset($_SESSION['email']);
  	header("location: Login.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ashesi Business Hub</title>
	<link rel="stylesheet" href="Navbar.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link href="/docs/5.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style>
        #non
        {
            text-decoration: none;
        }
    </style>
</head>
<body>

  
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

      
      <!-- <?php  if (isset($_SESSION['username'])) : ?>
        <p>Welcome<strong><?php echo $_SESSION['username']; ?></strong></p>
      <?php endif ?> -->
    </div>
    <!-- side bar navigation menu-->
        <ul>
            <li>
              <a class="btn" id="non" href="Navbar.php">Home</a>
            </li>
            <li>
              <a class="btn" id="non" href="account.php">My Account</a>
            </li>
            <li>
              <a class="btn" id="non" href="about.php">About</a>
            </li>
            <li>
              <a class="btn" id="non" href="image.php">Sell</a>
            </li>
            <li>
              <a class="btn" id="non" href="inbox.php">Message</a>
              
            </li>
            <li>
              <p><a  id="non" href="index.php?logout='1'" style="color: white;">Log Out</a></p>
            </li>
        </ul> 
      
    </div>
  </div>
</div>
<div class="col" style="padding: 0px; margin: none;">
    <div class="header ">
        <?php  if (isset($_SESSION['username'])) : ?>
            <h1>Welcome <strong><?php echo $_SESSION['username']; ?> to</h1></strong></h1>
          <?php endif ?><br>
            <h1>Your Buying and Selling Hub</h1>
    </div>
        <!-- Three columns of text below the carousel, contain choice to easily find products by theur categories -->

    <div class="row">
         <div class="text-end col-10 col-lg-10 mb-3 mb-lg-0 pe-0">
          <!--search option on the home page-->
         <form class="">
            <input type="search" class="form-control form-control-dark" placeholder="Search Here" aria-label="Search" style="display: inline">
          </form>
    </div>

      <div class="col ps-0">
          <button type="button" class="btn btn-warning" name="search" style= "background-color: #934444;">Search</button>
      </div>

      <div class="row mt-3 mx-5 px-5">
        <h1 class="big_head mb-3 d-flex justify-content-center">Browse Categories</h1>
        <div class="col-lg-4">
              <a href="fashion.php" ><img src="images/beauty.jpg" class="rounded-circle" style="width:140px; height: 140px;"></a>
              </a>
              <p class="category">Beauty and Fashion</p>
        </div>

        <div class="col-lg-4">
              <a href="fruits.php" ><img src="images/fruits.jpg" class="rounded-circle" style="width:140px; height: 140px;"></a>
              </a>
              <p class="category">Fruits and Drinks</p>
        </div>

        <div class="col-lg-4">
              <a href="clothing.php" ><img src="images/clothing.jpg" class="rounded-circle" style="width:140px; height: 140px;"></a>
              </a>
              <p class="category">Clothing and Shoes</p>
        </div>
      </div>
        

        <!-- Three columns of text below the carousel -->
        <div class="row mt-5 mx-5 px-5">
            <div class="col-lg-4">
              <a href="electronics.php" ><img src="images/electronics.jpg" class="rounded-circle" style="width:140px; height: 140px;"></a>
              </a>
              <p class="category">Electronics</p>
            </div>

            <div class="col-lg-4">
              <a href="school.php" ><img src="images/school materials.jpg" class="rounded-circle" style="width:140px; height: 140px;"></a>
              </a>
              <p class="category">School Materials</p>
            </div>

            <div class="col-lg-4">
              <a href="slideup.html" ><img src="images/plus.jpg" class="rounded-circle" style="width:140px; height: 140px;"></a>
              </a>
              <p class="category"> More Categories</p>
            </div>
        </div>

        <div class="album py-5 bg-light">
          <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        
              <?php 
              //select the attributes of a product uploded by a user, and show it on the home page
                $ql="SELECT * FROM product";
                $result = mysqli_query($db, $ql);
                while ($row=mysqli_fetch_assoc($result))
                {
                  echo '
                  <div class="col">
                     <div class="card shadow-sm">
                         <img  class="bd-placeholder-img card-img-top" width="100%" height="225" src='. $row["image"].' role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <div class="card-body">
                             <p class="card-text"> GHC:'. " " . $row["price"].'</p>
                             <p class="card-text"> ' . $row["product_name"].'</p>
                          <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                 <a href="view.php?id='.$row["product_id"].'"><button type="button" name="viewbtn" class="btn btn-sm btn-outline-primary">View</button></a>
                            </div>
                          </div>
                        </div>
                     </div>
                  </div>';
                }?>
            </div>
         </div>
</div>
</body>
</html>


