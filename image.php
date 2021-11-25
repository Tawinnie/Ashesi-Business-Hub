<?php
  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "business");

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text
  	$image_text = mysqli_real_escape_string($db, $_POST['image_text']);

  	// image file directory
  	$target = "images/".basename($image);

  	$sql = "INSERT INTO product (image, image_text) VALUES ('$image', '$image_text')";
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  $result = mysqli_query($db, "SELECT * FROM product");

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="imageUpload.css">
</head>
<body>
    <?php if(isset($_GET['error'])): ?>
    <p><?php echo $_GET['error']; ?></p>
    <?php endif ?>

    <div id="content">
            <?php
                while ($row = mysqli_fetch_array($result)) {
                echo "<div id='img_div'>";
                    echo "<img src='images/".$row['image']."' >";
                    echo "<p>".$row['image_text']."</p>";
                echo "</div>";
                }
            ?>
            <div class="header">
  	            <h2>Upload Your Product</h2>
            </div>
       <form method="POST" action="upload.php" enctype="multipart/form-data">
            <div class="input-group">
            <label>Product Name</label>
            <input type="text" name="productname"required >
            </div>

            <div class="input-group">
            <label>Price</label>
            <input type="text" name="price" placeholder="In Ghc" required>
            </div>

            <div class="input-group">
            <label>Category</label>
            <input type="text" name="category" placeholder="e.g beauty and fashion or fruits,refer to home categories">
            </div>

            <div class="input-group">
            <label>Location</label>
            <input type="text" name="location" placeholder="hostel $ room number" required>
            </div>
            
            <div>
                <input type="hidden" name="size" value="1000000">
            </div>
           <div>
                <textarea 
                    id="text" cols="40" rows="4" name="image_text" placeholder="Add Description...">
                </textarea>
            </div>

            <div>
            <label>Choose Image</label>
            <br><br>
               <input type="file" name="image" required>
               <br><br>
            </div>

            <div>
                <input type="submit" class="btn" name="submit" value="Upload">
            </div>
                    
        </form>
           
    </div>
</body>
</html>