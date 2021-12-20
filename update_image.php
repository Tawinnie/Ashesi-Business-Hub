<?php

include "update.php";

$db = mysqli_connect("localhost", "root", "Tawinnie", "business");

?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="imageUpload.css">
</head>
<body>
   
    <div class="header">
  	    <h2>Update Your Product</h2>
    </div>
<!-- form to collect detaila about the product-->
       <form method="POST" action="update.php" enctype="multipart/form-data">
            <div class="input-group">
                <label>Product Name</label>
                <input type="text" name="productname" required >
            </div>

            <div class="input-group">
                <label>Price</label>
                <input type="text" name="price" placeholder="In Ghc" pattern="[0-9]+" required>
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
               <a href=update.php?id='.$row["product_id"].'"><input type="submit" class="btn" name="update" value="Update"></a>
                <!--<input type="submit" class="btn" name="update" value="Update">-->

            </div>
                    
        </form>
           
    
</body>
</html>

