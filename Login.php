<?php 
//connect to database
include('server.php');
?>

<!DOCTYPE html>
<html>
		<head>
	<title>Ashesi Business Hub</title>
  <link rel="stylesheet" type="text/css" href="style.css">

  <style>
		#non{
			text-decoration: none;
		}
	</style>
</head>
<body>
  <div class="header">
  	<h2>Sign in</h2>
  </div>
	 
  <form method="POST" action="Navbar.php">
	  <!---the error file checks if the submitted form does ot have erors-->
		<?php include('errors.php');?>
		<div class="input-group">
			<label>Email</label>
			<input type="text" name="email" required >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password" required>
		</div>
		
		<div class="input-group">
			    <button type="submit" class="btn" name="login_user">Log in</button>
		</div>
		<p>
			Don't have account? <a id="non" href="register.php">Sign up</a>
		</p>
    </form>

</body>
</html>
