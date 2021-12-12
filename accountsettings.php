
<?php
include "dbconnect.php";
$db = mysqli_connect('localhost', 'root', 'Tawinnie', 'business');
session_start();

if(isset($_POST['cancel'])){
    header('location:account.php');
}
$id = $_SESSION['id'];//get the id through string
$query=mysqli_query($db,"SELECT * FROM student WHERE id='$id'");
$fetch=mysqli_fetch_array($query);//fetch the data

//if the user clicks on the update button
if(isset($_POST['update']))
{
        $studentid = $_POST['studentid'];
        $username = $_POST['uname'];
        $fullname = $_POST['fname'];
        $email = $_POST['mail'];
        $location = $_POST['location'];
        $current = $_POST['old'];
        $password_1 = $_POST['password_1'];
        $password_2= $_POST['password_2'];
        $errors = array(); 
    //check if passwords match
    if ($password_1 != $password_2) 
    {
      array_push($errors, "The two passwords do not match");
    }
    else
    {
      $password=md5($password_1);
    }

                    
                $sql= mysqli_query($db,"UPDATE student SET student_id='$studentid',username='$username',fullname='$fullname',email='$email',location='$location',password='$password' WHERE id='$id'");
                if($sql)
                {
                    mysqli_close($db);//close connection
                    header("location: index.php");//redirect to home page
                    exit;
                    
                }else
                    {
                    echo mysqli_error();
                    }
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>My Account Settings</title>
    <link rel="stylesheet" href="accountsettings.css">


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link href="/docs/5.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<div class="header">
      <h2>Update Your Information</h2>
</div>
<!--get information form form-->
<form method="POST" action="">
  <div class="card-body">
      <div class="form-group">
                  <label class="form-label" name="studentid">Student ID</label>
                  <input type="text" class="form-control mb-1">
                </div>

                <div class="form-group">
                  <label class="form-label" name="uname">Username</label>
                  <input type="text" class="form-control mb-1">
                </div>

                <div class="form-group">
                  <label class="form-label" name="fname">Full Name</label>
                  <input type="text" class="form-control">
                </div>

                <div class="form-group">
                  <label class="form-label" name="mail">Email</label>
                  <input type="text" class="form-control mb-1">
                </div>

                <div class="form-group">
                  <label class="form-label" name="location">Location</label>
                  <input type="text" class="form-control mb-1">
                </div>

                <div class="form-group">
                  <label class="form-label" name="old">current Password</label>
                  <input type="password" class="form-control mb-1">
                </div>

                <div class="form-group">
                  <label class="form-label" name="password_1">New Password</label>
                  <input type="password" class="form-control mb-1">
                </div>

                <div class="form-group">
                  <label class="form-label" name="password_2">Confirm New Password</label>
                  <input type="password" class="form-control mb-1">
                </div>

                <div class="text-right mt-3">
                      <a href="Navbar.php"> <button type="button" name="update" class="btn btn-primary">Save changes</button></a>
                       <a href="javascript:goBack(http://localhost/Final%20Project/account.php); " class="cancel">
                          <span><button type="button" name="cancel" class="btn btn-default">Cancel</button></span>
                       </a>
                      <script type="text/javascript">
                         function goBack() {
                         window.location=http://localhost/Final%20Project/account.php;
                         }
                      </script>
                 </div>
                      
    </div>
</body>
</html>
