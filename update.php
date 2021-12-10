<?php
//editing/updating product details

//connect to database
// include "dbconnect.php";
// $db = mysqli_connect('localhost', 'root', '', 'business');
// session_start();//start a session

// $id = $_GET['id'];//get the id through string
// $query=mysqli_query($db,"SELECT * FROM product WHERE product_id='$id'");
// $fetch=mysqli_fetch_array($query);//fetch the data

//         //if the user clicks on the update button
//         if(isset($_POST['update']))
//         {
//             $sid=$_SESSION["id"];
//                 $productname = $_POST["productname"];
//                 $price = $_POST["price"];
//                 $location = $_POST["location"];
//                 $description = $_POST["description"];
//                 $image=$_FILES["image"];
//                 $root_dir = "C:\\Xamppa\\htdocs\\Final Project\\pictures\\";
//                 $upload_root_dir = "./pictures/";
//                 $file = $_FILES["image"];//option to upload a file
//                 $file = str_replace(' ', '_', $file);
//                 $file_dest = $root_dir . basename($file["name"]);
//                 $upload_file_dest = $upload_root_dir . basename($file["name"]);
//                 $file_type = strtolower(pathinfo($file_dest, PATHINFO_EXTENSION));
        
//                 echo $file_dest;
//                 //specifying the type of image files allowed
//                 if($file_type != "jpg" && $file_type != "png" && $file_type != "jpeg")
//                 {
//                     echo "Sorry, only jpg, png, jpeg allowed";
//                 }
//                 else
//                 {//inserting the uploaded files into the database
//                     $upload_image = move_uploaded_file($file["tmp_name"], $file_dest);
//                     if($upload_image)
//                     {
//                         $sql= mysqli_query($db,"UPDATE product SET product_name='$productname',price='$price',image='$image',location='$location',description='$description' WHERE student_id='$sid'");
//                         $status = mysqli_query($db,$sql);
//                         if($status)
//                         {
//                             header("Location: Navbar.php");
//                         }
//                    }

//                 //update the database with the entered data
//             // if($sql)
//             // {
//             //     mysqli_close($db);//close connection
//             //     header("location:Navbar.php");//redirect to home page
//             //     exit;
                
//             // }
//         }
//     }
?>



<?php
include "dbconnect.php";
session_start();
// connect to database
$db = mysqli_connect('localhost', 'root', '', 'business');
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

