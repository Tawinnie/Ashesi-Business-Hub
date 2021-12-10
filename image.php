<<<<<<< HEAD
<?php
include "upload.php";

  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "business");
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="imageUpload.css">
</head>
<body>
   
    <div class="header">
  	   <h2>Upload Your Product</h2>
    </div>
              <!--get data form the input of the user-->
       <form method="POST" action="upload.php" enctype="multipart/form-data">
            <div class="input-group">
                <label>Product Name</label>
                <input type="text" name="productname" required >
            </div>

            <div class="input-group">
                <label>Price</label>
                <input type="text" name="price" placeholder="In Ghc" required>
            </div>

            <div class="input-group select-boxes col-md-6">
                <label>Category</label>
                <?php
                //create a dropdown of categories displayed from database
                $category='';
                $query="SELECT category_name FROM category ORDER BY category_name ASC";
                $result=mysqli_query($db,$query);
                while($row=mysqli_fetch_array($result))
                {
                    $category.= '<option value="'.$row["category_name"].'">'.$row["category_name"].'</option>';
                }
               ?>
                    <select name="category" id="category" class="form-control action">
                        <option value="">Select Category</option>
                        <?php echo $category; ?>
                    </select>
            </div>

            <div class="input-group">
                <label>Location</label>
                <input type="text" name="location" placeholder="hostel $ room number"required>
            </div>
            
            <div>
                <input type="hidden" name="size" value="1000000">
            </div>

           <div class="input-group">
                <textarea 
                  id="text" cols="40" rows="4" name="description" placeholder= "Add a Description about your product...">
                </textarea>
            </div>

            <div>
              Browse Your Computer: <input type="file" name="image" required>
               <br><br>
            </div>

            <div>
                <input type="submit" class="btn" name="submit" value="Upload">
            </div>
                    
            </form>
</body>
=======
<?php
include "upload.php";

  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "business");

//   // Initialize message variable
//   $msg = "";

//   // If upload button is clicked ...
//   if (isset($_POST['submit']))
//   {
//   	// Get image name
//   	// 
//     $product_name= mysqli_real_escape_string($db, $_POST['productname']);
//     $price= mysqli_real_escape_string($db, $_POST['price']);
//     $image = $_FILES['image']['name'];
//     $location= mysqli_real_escape_string($db, $_POST['location']);
//     $description=mysqli_real_escape_string($db, $_POST['description']);
// // image file directory
//       // image validation
//     $target_dir = "pictures/";
//     // file path
//     $target_file = $target_dir.basename($_FILES["image"]["name"]);
//   	//$target = "images/".basename($image);

//   	$sql = "INSERT INTO product (product_name,price,image,location,description) VALUES ('$product_name', '$price','$image','$location',$description)";
//   	// execute query
//   	mysqli_query($db, $sql);

//   	if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
//   		$msg = "Image uploaded successfully";
//   	}else{
//   		$msg = "Failed to upload image";
//   	}
//   }
//   $result = mysqli_query($db, "SELECT * FROM product");

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="imageUpload.css">
</head>
<body>
   
    <div class="header">
  	   <h2>Upload Your Product</h2>
    </div>
              <!--get data form the input of the user-->
       <form method="POST" action="upload.php" enctype="multipart/form-data">
            <div class="input-group">
                <label>Product Name</label>
                <input type="text" name="productname" required >
            </div>

            <div class="input-group">
                <label>Price</label>
                <input type="text" name="price" placeholder="In Ghc" required>
            </div>

            <div class="input-group select-boxes col-md-6">
                <label>Category</label>
                <?php
                //create a dropdown of categories displayed from database
                $category='';
                $query="SELECT category_name FROM category ORDER BY category_name ASC";
                $result=mysqli_query($db,$query);
                while($row=mysqli_fetch_array($result))
                {
                    $category.= '<option value="'.$row["category_name"].'">'.$row["category_name"].'</option>';
                }
               ?>
                    <select name="category" id="category" class="form-control action">
                        <option value="">Select Category</option>
                        <?php echo $category; ?>
                    </select>
            </div>

            <div class="input-group">
                <label>Location</label>
                <input type="text" name="location" placeholder="hostel $ room number"required>
            </div>
            
            <div>
                <input type="hidden" name="size" value="1000000">
            </div>

           <div class="input-group">
                <textarea 
                  id="text" cols="40" rows="4" name="description" placeholder= "Add a Description about your product...">
                </textarea>
            </div>

            <div>
              Browse Your Computer: <input type="file" name="image" required>
               <br><br>
            </div>

            <div>
                <input type="submit" class="btn" name="submit" value="Upload">
            </div>
                    
            </form>
</body>
>>>>>>> d60c2e09840b0abb33a1ba7c05e35ee98ad71551
</html>