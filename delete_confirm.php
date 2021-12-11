<?php
//delete the account from the database

include "dbconnect.php";
session_start();


$db = mysqli_connect('localhost', 'root', 'Tawinnie', 'business');
$id=$_SESSION['id'];

//delete account
        $sql= "DELETE FROM student WHERE id='$id'";
            if(mysqli_query($db,$sql))
            {
                echo "Your Account has been deleted. Regitser to login.";
                header("location: register.php");

            } else
                  {
                     echo "Error deleting record: " . mysqli_error($db);
                   }
                    mysqli_close($db);
?>
