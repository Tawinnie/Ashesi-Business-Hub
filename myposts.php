
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link href="/docs/5.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="sytlesheet" href="myposts.php">
</head>
<body>
<div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        
      <?php
      include "server.php";
      //session_start();

      //if(isset)
      //get an id of the user logged in
                  $id=$_SESSION['id'];
                  //select all for what the user has uploaded
                  $ql="SELECT * FROM product WHERE student_id=$id";
                  $result = mysqli_query($db, $ql);
                  while ($row=mysqli_fetch_assoc($result))
                  {
                    echo '
                <div class="col">
                  <div class="card shadow-sm">
                       <img  class="bd-placeholder-img card-img-top" width="100%" height="225" src='. $row["image"].' role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                      <div class="card-body">
                        <p class="card-text"> GHC:'. " " . $row["price"].'</p>
                        <p class="card-text"> Name:'. " " . $row["product_name"].'</p>

                        <p class="card-text"> Date Posted:'. " " . $row["Date_posted"].'</p>
                        <p class="card-text"> '. " " . $row["description"].'</p>
                        <p class="card-text"> '. " " . $row["location"].'</p>

                        <div class="d-flex justify-content-between align-items-center">
                          <div class="btn-group">
                              <a href="update_image.php?id='.$row["product_id"].'"> <button type="button" class="btn btn-sm btn-outline-primary">Edit Post</button></a>
                              <a href="delete.php?id='.$row["product_id"].'"> <button type="button" name="delete" class="btn btn-sm btn-outline-primary">Delete</button></a>
                          </div>
                        </div>
                    </div>
                 </div>
              </div>';
                  }?>

</body>
=======
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link href="/docs/5.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="sytlesheet" href="myposts.php">
</head>
<body>
<div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        
      <?php
      include "server.php";
      //session_start();

      //if(isset)
      //get an id of the user logged in
                  $id=$_SESSION['id'];
                  //select all for what the user has uploade
                  $ql="SELECT * FROM product WHERE student_id=$id";
                  $result = mysqli_query($db, $ql);
                  while ($row=mysqli_fetch_assoc($result))
                  {
                    echo '
                <div class="col">
                  <div class="card shadow-sm">
                       <img  class="bd-placeholder-img card-img-top" width="100%" height="225" src='. $row["image"].' role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                      <div class="card-body">
                        <p class="card-text"> GHC:'. " " . $row["price"].'</p>
                        <p class="card-text"> Name:'. " " . $row["product_name"].'</p>

                        <p class="card-text"> Date Posted:'. " " . $row["Date_posted"].'</p>
                        <p class="card-text"> '. " " . $row["description"].'</p>
                        <p class="card-text"> '. " " . $row["location"].'</p>

                        <div class="d-flex justify-content-between align-items-center">
                          <div class="btn-group">
                              <a href="update.php?id='.$row["product_id"].'"> <button type="button" class="btn btn-sm btn-outline-primary">Edit Post</button></a>
                              <a href="delete.php?id='.$row["product_id"].'"> <button type="button" name="delete" class="btn btn-sm btn-outline-primary">Delete</button></a>
                          </div>
                        </div>
                    </div>
                 </div>
              </div>';
                  }?>

</body>
</html>
