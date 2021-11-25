<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Ashesi Business Hub</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Sign Up</h2>
  </div>
	
  <form method="post" action="Login.php">
  	<?php include('errors.php'); ?>
      <div class="input-group">
  	  <label>Student ID</label>
  	  <input type="text" name="studentid" value="<?php echo $studentid; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
      
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already have an account? <a href="Login.php">Sign in</a>
  	</p>
  </form>
</body>
</html>