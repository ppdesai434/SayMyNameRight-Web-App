<?php include('config.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="register.css">
</head>
<body>
  <div class="header">
	<h2>Say My Name Right!</h2>
  	
  </div>
	 
  <form method="post" action="login.php">
  <h3>Login</h3>
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Name</label>
  		<input type="text" name="name" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<p>
  		Not yet a member? <a href="register.php">Sign up</a>
  	</p>
  </form>
</body>
</html>