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

