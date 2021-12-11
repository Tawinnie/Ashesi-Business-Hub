<<<<<<< HEAD
<?php
 //editing product details
include "dbconnect.php";
session_start();
// connect to database
$db = mysqli_connect('localhost', 'root', 'Tawinnie', 'business');
//if the button is not clicked
  if (!isset($_POST["update"]))
  {
        return false;
  }
//if the user clicks the upload button
    if(isset($_FILES["image"]))
    {
        //get the id of the logged in user
        $sid = $_SESSION["id"];
        //$category=$_POST['category'];
        $prodname = $_POST["productname"];
        $price = $_POST["price"];
        $location = $_POST["location"];
        $desc = $_POST["description"];
        $root_dir = "C:\\Xamppa\\htdocs\\Final Project\\pictures\\";
        $upload_root_dir = "./pictures/";
        $file = $_FILES["image"];//option to upload a file
        $file = str_replace(' ', '_', $file);
        $file_dest = $root_dir . basename($file["name"]);
        $upload_file_dest = $upload_root_dir . basename($file["name"]);
        $file_type = strtolower(pathinfo($file_dest, PATHINFO_EXTENSION));

        echo $file_dest;
        //specifying the type of image files allowed
        if($file_type != "jpg" && $file_type != "png" && $file_type != "jpeg")
        {
            echo "Sorry, only jpg, png, jpeg allowed";
        }
        else
        {//inserting the uploaded files into the database
            $upload_image = move_uploaded_file($file["tmp_name"], $file_dest);
            if($upload_image)
                {
                    // $sql= mysqli_query($db,"UPDATE product SET product_name='$productname',price='$price',image='$image',location='$location',description='$description' WHERE student_id='$sid'");

                    $sql="UPDATE product SET product_name='$prodname', price='$price', image='$file', location='$location', description='$desc' WHERE student_id='$sid'";
                    $status = mysqli_query($db,$sql);
                    if($status)
                        header("Location: Navbar.php");
                }

               
        }
    }

    
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
<!-- form to collect detaila about the product-->
       <form method="POST" enctype="multipart/form-data">
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
                include "dbconnect.php";
                $db = mysqli_connect('localhost', 'root', 'Tawinnie', 'business');
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
                <input type="submit" class="btn" name="update" value="Update">

            </div>
                    
        </form>
           
    
</body>
</html>

>>>>>>> d60c2e09840b0abb33a1ba7c05e35ee98ad71551
