<?php
session_start();

include "dbconnect.php";
// connect to database
$db = mysqli_connect('localhost', 'root', 'Tawinnie', 'business');
//if the button is not clicked
  if (!isset($_POST["submit"]))
  {
        return false;
  }
//if the user clicks the upload button
    if(isset($_POST["submit"]))
    {
        //get the id of the logged in user
        $id = $_SESSION['id'];
        //$category=$_POST['category'];
        $prodname = $_POST["productname"];
        $price = $_POST["price"];
        $location = $_POST["location"];
        $desc = $_POST["description"];
        $root_dir ="20.117.153.25\\Final Project\\Ashesi-Business-Hub\\pictures\\";
        $upload_root_dir = "./pictures/";
        $file = $_FILES["image"];//option to upload a file
        $file = str_replace(' ', '_', $file);//replace spaces with underscores in a file name
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
            var_dump($file["tmp_name"]);
            var_dump($_FILES['image']['tmp_name']);
            if($upload_image)
                {
                    //echo "file moved to pictures folder";
              //i tried all i could but this insert query failed to work, i could not figure out what the problem was, i even tried with the FI too
                    $sql="INSERT INTO product(image, product_name, price, location, description, student_id)
                    VALUES('$upload_file_dest', '$prodname','$price','$location','$desc','$id')";
                    $status = mysqli_query($db,$sql);
                    if($status)
                    {
                        header("Location: Navbar.php");
                    }
                }

               
        }
    }

    
?> 

