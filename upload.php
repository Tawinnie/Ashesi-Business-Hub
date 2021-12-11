
<?php

include "dbconnect.php";
session_start();
// connect to database
$db = mysqli_connect('localhost','root','Tawinnie','business');
$id=$_SESSION['id'];
 
if (isset($_POST['submit']) && $_POST['submit'] == 'Upload')
{
  if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK)
  {
            // get details of the uploaded file
            $prodname = $_POST["productname"];
            $price = $_POST["price"];
            $location = $_POST["location"];
            $desc = $_POST["description"];
            $fileTmpPath = $_FILES['image']['tmp_name'];
            $fileName = $_FILES['image']['name'];
            $fileName= str_replace(' ', '_', $fileName);
            $fileSize = $_FILES['image']['size'];
            $fileType = $_FILES['image']['type'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));
        
            // sanitize file-name
            $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
        
            // check if file has one of the following extensions
            $allowedfileExtensions = array('jpg', 'jpeg', 'png', 'gif', 'mp4', 'xls');
        
            if (in_array($fileExtension, $allowedfileExtensions))
            {
                // directory in which the uploaded file will be moved
                $uploadFileDir = './pictures/';
                $dest_path = $uploadFileDir . $newFileName;
                $move_to_folder=move_uploaded_file($fileTmpPath, $dest_path);
            
                if($move_to_folder)
                {

                    $sql="INSERT INTO product(image, product_name, price, location, description, student_id) VALUES(' $fileNameCmps', '$prodname','$price','$location','$desc','$id')";
                    $status = mysqli_query($db,$sql);
                    if($status)
                        header("Location: Navbar.php");
                }
                else
                {
                    echo 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
                }
            }
            else
            {
            echo 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
            }
    }
  else
  {
    echo 'There is some error in the file upload. Please check the following error.<br>';
    echo 'Error:' . $_FILES['image']['error'];
  }
}

?>



<!-- <?php
//this is theinitial github code
include "dbconnect.php";
session_start();
// connect to database
$db = mysqli_connect('localhost', 'root', 'Tawinnie', 'business');
//if the button is not clicked
  if (!isset($_POST["submit"]))
  {
        return false;
  }
//if the user clicks the upload button
    if(isset($_FILES["image"]))
    {
        //get the id of the logged in user
        $id = $_SESSION["id"];
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
                    $sql="INSERT INTO product(image, product_name, price, location, description, student_id) VALUES('$upload_file_dest', '$prodname','$price','$location','$desc','$id')";
                    $status = mysqli_query($db,$sql);
                    if($status)
                        header("Location: Navbar.php");
                }

               
        }
    }

    
?> 

