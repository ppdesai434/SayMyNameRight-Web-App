<?php 
  session_start(); 

  if (!isset($_SESSION['name'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['name']);
    unset($_SESSION['ID']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="register.css">
</head>
<body>

<ul>
  <li><a class="active" href="index.php">Home</a></li>
  <li><a href="myconferences.php" >My Conferences</a></li>
  <li><a href="myorganization.php" >My Organization</a></li>
  <li><a href="myevents.php" >My Events</a></li>
  <li class="logout"><a href="index.php?logout='1'" >Logout</a></li>
</ul>

<div class="header">
	<h2>Say My Name Right!</h2>
</div>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success'];
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['name'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['name']; echo $_SESSION['ID']; ?></strong></p>

      <!--<p><a href="conference.php" style="color: blue;">Create Conference</a></p>-->
      

    <?php endif ?>
</div>
		
</body>
</html>