<?php
//delete the account from the database

include "dbconnect.php";
session_start();


$db = mysqli_connect('localhost', 'root', '', 'business');
$id=$_SESSION['id'];

// if(isset($_POST['deletebtn']))
// {
        //get student account id to be deleted
        $sql= "DELETE FROM student WHERE id='$id'";
            if(mysqli_query($db,$sql))
            {
                echo "Your Account has been deleted. Regitser to login.";
                header("location: register.php");

            } else
                  {
                     echo "Error deleting record: " . mysqli_error($db);
                  }
//     echo" Successfully deleted your account";

// }
//     else
//     {
//         echo"Cannot delete account at the moment";
//     }
            mysqli_close($db);
?>
