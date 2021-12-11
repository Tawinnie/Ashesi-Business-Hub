<<<<<<< HEAD
<?php
//delete your uploaded images form the database

include "dbconnect.php";
session_start();

$db = mysqli_connect('localhost', 'root', 'Tawinnie', 'business');
//get product id to be deleted
    $id=$_GET['id'];
        $sql= "DELETE FROM product WHERE product_id='$id'";
            if(mysqli_query($db,$sql))
            {
                echo "Record deleted successfully.";

            } else
                  {
                     echo "Error deleting record: " . mysqli_error($db);
                  }
            mysqli_close($db);
?>
=======
<?php
//delete your uploaded images form the database

include "dbconnect.php";
session_start();

$db = mysqli_connect('localhost', 'root', 'Tawinnie', 'business');
//get product id to be deleted
    $id=$_GET['id'];
        $sql= "DELETE FROM product WHERE product_id='$id'";
            if(mysqli_query($db,$sql))
            {
                echo "Record deleted successfully.";

            } else
                  {
                     echo "Error deleting record: " . mysqli_error($db);
                  }
            mysqli_close($db);
?>
>>>>>>> d60c2e09840b0abb33a1ba7c05e35ee98ad71551
