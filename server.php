<?php
include "dbconnect.php";
include "errors.php";
//start session 
session_start();

// initializing variables
$studentid= "";
$username = "";
$email    = "";
$password="";
$fullname = "";
$location = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', 'Tawinnie', 'business');

// REGISTER USER
if (isset($_POST['reg_user'])) 
{
        // receive all input values from the form
        $studentid = mysqli_real_escape_string($db, $_POST['studentid']);
        $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
        $location = mysqli_real_escape_string($db, $_POST['location']);

        // form validation: ensure that the form is correctly filled ...
        // by adding (array_push()) corresponding error unto $errors array
        if (empty($studentid)) { array_push($errors, "Student ID is required"); }
        if (empty($fullname)) { array_push($errors, "Your full name is required"); }
        if (empty($username)) { array_push($errors, "Username is required"); }
        if (empty($email)) { array_push($errors, "Email is required"); }
        if (empty($location)) { array_push($errors, "Location is required"); }
        if (empty($password_1)) { array_push($errors, "Password is required"); }
        if ($password_1 != $password_2) 
        {
        array_push($errors, "The two passwords do not match");
        }

        // first check the database to make sure 
        // a user does not already exist with the same  student id, username and/or email
        $user_check_query = "SELECT * FROM student WHERE student_id='$studentid' OR username='$username' OR email='$email' LIMIT 1";
        $result = mysqli_query($db, $user_check_query);
        $user = mysqli_fetch_assoc($result);
        
        if ($user) 
        { // if user exists
          if ($user['student_id'] === $studentid) 
          {
              array_push($errors, "Student ID already exists");
          }
          if ($user['username'] === $username) 
          {
            array_push($errors, "Username already exists");
          }

          if ($user['email'] === $email) 
          {
            array_push($errors, "email already exists");
          }
        }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) 
  {
  	$password = md5($password_1);//encrypt the password before saving in the database
           //inseert into database
  	$query = "INSERT INTO student (student_id, fullname,username, email, password, location) 
  			  VALUES('$studentid','$fullname', '$username','$email','$password','$location')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "";
  	header('location: Login.php');//if register is successful, go to login page
  }
}


// LOGIN USER
//if user clicks login button
if (isset($_POST['login_user'])) 
{
  //get password and email
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  //if the email and password is empty,show an error
    if (empty($email)) 
    {
        array_push($errors, "Email is required");
    }
    if (empty($password)) 
    {
        array_push($errors, "Password is required");
    }
    //if there are no errors
    if (count($errors) == 0) 
    {
        $password = md5($password);//encrpt password 
        //select the data from database
        $sql = "SELECT * FROM student WHERE email='$email' AND password='$password'";

        $result = mysqli_query($db, $sql);           
        
           $row = mysqli_fetch_assoc($result);
        if ($row['email'] === $email && $row['password'] === $password) 
        {
            

              echo "email";
                 echo "password";

                $_SESSION['username'] = $row['username'];

               $_SESSION['fullname'] = $row['fullname'];

               $_SESSION['id'] = $row['id'];

                  header("Location: Navbar.php");

                 exit();

              }else
                  {

                   header("Location: Login.php?error= OOPS SORRY! Incorrect email or password");

                  exit("This email and password does not exist");

                  }

          }else{
             echo " ";
         }
}
      
?>
        
    
