<?php include('config.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="register.css">
</head>
<body>
  <div class="header">
    <h2>Register</h2>
  </div>
  
  <form method="POST" action="register.php">
    <?php include('errors.php'); ?>
    <div class="input-group">
      <label>Name</label>
      <input type="text" name="name" required>
    </div>
    <div class="input-group">
      <label>Email</label>
      <input type="email" name="email" required>
    </div>
    <div class="input-group">
      <label>Password</label>
      <input type="password" name="password" required>
    </div>
    <div class="input-group">
      <label>Address: </label>
      <textarea style="width: 97%;height: 10%" name="Address"></textarea>
    </div>
    <div class="input-group">
      <label>City: </label>
      <input type="text" name="City">
    </div>
    <div class="input-group">
      <label>State: </label>
      <input type="text" name="State">
    </div>
    <div class="input-group">
      <label>Country: </label>
      <input type="text" name="Country">
    </div>
    <div class="input-group">
      <label>zip: </label>
      <input type="number" name="zip">
    </div>
    <div class="input-group">
      <label>Phone number: </label>
      <input type="number" name="phonenumber">
    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="reg_user">Register</button>
    </div>
    <p>
      Already a member? <a href="login.php">Sign in</a>
    </p>
  </form>
</body>
</html>