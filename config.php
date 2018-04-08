<?php
session_start();

// initializing variables
$name = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'saymyname');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $Address = mysqli_real_escape_string($db, $_POST['Address']);
  $City = mysqli_real_escape_string($db, $_POST['City']);
  $State = mysqli_real_escape_string($db, $_POST['State']);
  $Country = mysqli_real_escape_string($db, $_POST['Country']);
  $zip = mysqli_real_escape_string($db, $_POST['zip']);
  $phonenumber = mysqli_real_escape_string($db, $_POST['phonenumber']);

  if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
  	  array_push($errors, "Only letters and white space allowed");
    }
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
     array_push($errors, "Email is required");  
    }

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($name)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }
  if (empty($Address)) { array_push($errors, "Address is required"); }
  if (empty($City)) { array_push($errors, "City is required"); }
  if (empty($State)) { array_push($errors, "State is required"); }
  if (empty($Country)) { array_push($errors, "Country is required"); }
  if (empty($zip)) { array_push($errors, "zip is required"); }
  if (empty($phonenumber)) { array_push($errors, "phonenumber is required"); }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM user WHERE name='$name' OR email='$email' ";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['name'] === $name) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) 
  {
  	

  	$query = "INSERT INTO user (name, email, password, Address, City, State, Country, zip, phonenumber) 
  			  VALUES('$name', '$email', '$password' ,'$Address','$City','$State','$Country', '$zip','$phonenumber')";
  	mysqli_query($db, $query);
  	$_SESSION['name'] = $name;
  	$_SESSION['success'] = "You are registered now please log in to see details";
  	header('location: login.php');
  }

}
 //
// Login
if (isset($_POST['login_user'])) {
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($name)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	
  	$query = "SELECT * FROM user WHERE name='$name' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
      $row=mysqli_fetch_row($results);

  	  $_SESSION['name'] = $name;
      $_SESSION['ID'] = $row[0] or die();
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}


// Add Conference
if (isset($_POST['reg_conf'])) {
  // receive all input values from the form
  $Confname = mysqli_real_escape_string($db, $_POST['name']);
  $startdate = mysqli_real_escape_string($db, $_POST['startdate']);
  $enddate = mysqli_real_escape_string($db, $_POST['enddate']);
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
  if (empty($Confname)) { array_push($errors, "Conference name is required"); }
  if (empty($startdate)) { array_push($errors, "Start Date is required"); }
  if (empty($enddate)) { array_push($errors, "End Date is required"); }
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
    

    $query = "INSERT INTO conference (name, startdatetime, enddatetime, Address, City, State, Country, zip, createdby) 
          VALUES('$Confname', '$startdate', '$enddate' ,'$Address','$City','$State','$Country', '$zip','$createdby')";
    echo $query;
    mysqli_query($db, $query) or die();
    header('location: myconferences.php');
  }

}


if (isset($_POST['edit_conf'])) {
  // receive all input values from the form
  $identity = mysqli_real_escape_string($db, $_POST['id']);
  $Confname = mysqli_real_escape_string($db, $_POST['name']);
  $startdate = mysqli_real_escape_string($db, $_POST['startdate']);
  $enddate = mysqli_real_escape_string($db, $_POST['enddate']);
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
  if (empty($Confname)) { array_push($errors, "Conference name is required"); }
  if (empty($startdate)) { array_push($errors, "Start Date is required"); }
  if (empty($enddate)) { array_push($errors, "End Date is required"); }
  if (empty($Address)) { array_push($errors, "Address is required"); }
  if (empty($City)) { array_push($errors, "City is required"); }
  if (empty($State)) { array_push($errors, "State is required"); }
  if (empty($Country)) { array_push($errors, "Country is required"); }
  if (empty($zip)) { array_push($errors, "zip is required"); }
  if (empty($createdby)) { array_push($errors, "User is required"); }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) 
  {
    

    $query = "Update conference set name='$Confname', startdatetime='$startdate', enddatetime='$enddate', Address='$Address', City='$City', State='$State', Country='$Country', zip='$zip' where id = $identity; ";
    echo $query;
    mysqli_query($db, $query) or die();
    header('location: myconferences.php');
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



