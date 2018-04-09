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
}

// Add Organization
if (isset($_POST['reg_org'])) {
  // receive all input values from the form
  $Orgname = mysqli_real_escape_string($db, $_POST['name']);
  $Description = mysqli_real_escape_string($db, $_POST['Description']);
  $noofpeople = mysqli_real_escape_string($db, $_POST['noofpeople']);
  $Address = mysqli_real_escape_string($db, $_POST['Address']);
  $City = mysqli_real_escape_string($db, $_POST['City']);
  $State = mysqli_real_escape_string($db, $_POST['State']);
  $Country = mysqli_real_escape_string($db, $_POST['Country']);
  $zip = mysqli_real_escape_string($db, $_POST['zip']);
  $createdby = mysqli_real_escape_string($db, $_POST['createdby']);

  if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      array_push($errors, "Only letters and white space allowed");
    }

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($Orgname)) { array_push($errors, "Organization name is required"); }
  if (empty($Description)) { array_push($errors, "Description is required"); }
  if (empty($noofpeople)) { array_push($errors, "No of People field is required"); }
  if (empty($Address)) { array_push($errors, "Address is required"); }
  if (empty($City)) { array_push($errors, "City is required"); }
  if (empty($State)) { array_push($errors, "State is required"); }
  if (empty($Country)) { array_push($errors, "Country is required"); }
  if (empty($zip)) { array_push($errors, "zip is required"); }
  if (empty($createdby)) { array_push($errors, "User is required"); }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM user WHERE name='$name' OR email='$email' ";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) 
  {
    $query = "INSERT INTO organization (name, description, noofpeople, Address, City, State, Country, zip, createdby) 
          VALUES('$Orgname', '$Description', $noofpeople ,'$Address','$City','$State','$Country', '$zip','$createdby')";
    echo $query;
    mysqli_query($db, $query) or die();
    header('location: myorganization.php');
  }
}


if (isset($_POST['edit_Org'])) {
  // receive all input values from the form
  $identity = mysqli_real_escape_string($db, $_POST['id']);
  $Orgname = mysqli_real_escape_string($db, $_POST['name']);
  $Description = mysqli_real_escape_string($db, $_POST['Description']);
  $noofpeople = mysqli_real_escape_string($db, $_POST['noofpeople']);
  $Address = mysqli_real_escape_string($db, $_POST['Address']);
  $City = mysqli_real_escape_string($db, $_POST['City']);
  $State = mysqli_real_escape_string($db, $_POST['State']);
  $Country = mysqli_real_escape_string($db, $_POST['Country']);
  $zip = mysqli_real_escape_string($db, $_POST['zip']);
  $createdby = mysqli_real_escape_string($db, $_POST['createdby']);

  if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      array_push($errors, "Only letters and white space allowed");
    }

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($Orgname)) { array_push($errors, "Organization name is required"); }
  if (empty($Description)) { array_push($errors, "Description is required"); }
  if (empty($noofpeople)) { array_push($errors, "No of People field is required"); }
  if (empty($Address)) { array_push($errors, "Address is required"); }
  if (empty($City)) { array_push($errors, "City is required"); }
  if (empty($State)) { array_push($errors, "State is required"); }
  if (empty($Country)) { array_push($errors, "Country is required"); }
  if (empty($zip)) { array_push($errors, "zip is required"); }
  if (empty($createdby)) { array_push($errors, "User is required"); }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) 
  {
    $query = "Update organization set name='$Orgname', Description='$Description', noofpeople=$noofpeople, Address='$Address', City='$City', State='$State', Country='$Country', zip='$zip' where id = $identity; ";
    echo $query;
    mysqli_query($db, $query) or die();
    header('location: myorganization.php');
  }

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="register.css">
</head>
<body>

<div class="header">
	<h2>Home Page</h2>
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
      
      <p><a href="myconferences.php" style="color: blue;">My Conferences</a></p>
      <p><a href="myevents.php" style="color: blue;">My Events</a></p>

    	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>
</div>
		
</body>
</html>