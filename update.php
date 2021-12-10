<?php
//editing/updating product details

//connect to database
include "dbconnect.php";
$db = mysqli_connect('localhost', 'root', '', 'business');
session_start();//start a session

$id = $_GET['id'];//get the id through string
$query=mysqli_query($db,"SELECT * FROM product WHERE product_id='$id'");
$fetch=mysqli_fetch_array($query);//fetch the data

        //if the user clicks on the update button
        if(isset($_POST['update']))
        {
            $sid=$_SESSION["id"];
                $productname = $_POST["productname"];
                $price = $_POST["price"];
                $location = $_POST["location"];
                $description = $_POST["description"];
                $image=$_FILES["image"];
                $image= str_replace(' ', '_', $image);
                //update the database with the entered data
                $sql= mysqli_query($db,"UPDATE product SET product_name='$productname',price='$price',image='$image',location='$location',description='$description' WHERE student_id='$sid'");
            if($sql)
            {
                mysqli_close($db);//close connection
                header("location:Navbar.php");//redirect to home page
                exit;
                
            }else
                {
                echo mysqli_error();
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
                $db = mysqli_connect('localhost', 'root', '', 'business');
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

