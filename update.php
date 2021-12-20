
<?php

include "dbconnect.php";
session_start();
//$db= mysqli_connect($servername,$username, $password, $database);

// connect to database
$db = mysqli_connect('localhost','root','Tawinnie','business');
$sid=$_SESSION['id'];
 
//$message = ''; 
if (isset($_POST['update']) && $_POST['update'] == 'Update')
{
  if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK)
  {
               $id=$_GET['id'];

            // get details of the uploaded fil
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

                    $sql="UPDATE product SET product_name='$prodname', price='$price', image='$fileNameCmps', location='$location', description='$desc' WHERE product_id='$id'";
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
            echo 'Update failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
            }
    }
  else
  {
    echo 'There is some error in the file upload. Please check the following error.<br>';
    echo 'Error:' . $_FILES['image']['error'];
  }
}

?>







