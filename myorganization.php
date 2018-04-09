<?php 
  include('config.php');

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

  
  $query = "SELECT id, name FROM organization where createdby=".$_SESSION['ID'];
  
  
  //$result = $conn->query($sql);


?>
<!DOCTYPE html>
<html>
<head>
  <title>Organization</title>
  <link rel="stylesheet" type="text/css" href="register.css">
</head>
<body>
  <ul>
  <li><a class="active" href="index.php">Home</a></li>
  <li><a href="myconferences.php" >My Conferences</a></li>
  <li><a href="myorganization.php" >My Organization</a></li>
  <li><a href="myevents.php" >My Events</a></li>
  <li class="logout"><a href="index.php?logout='1'">Logout</a></li>
</ul>
  
  
  <div class="header">
    <h2>My Organization</h2>
	<p><a href="organization.php" style="color: white;">Create Organization</a></p>
  </div>
  <div class="content">
  <?php 


  if ($results = mysqli_query($db, $query))
  {
    echo "<table>";
    echo "<tr><th>ID</th>";
    echo "<th>Name</th>";
    echo "<th colspan='2'>Actions</th>";
    
    echo "</tr>";
  // Fetch one and one row
  while ($row=mysqli_fetch_row($results))
    {
    echo "<tr>";
    printf ("<td>%s</td> <td>%s</td>",$row[0],$row[1]);
    echo "<td><a href='editorganization.php?id=".$row[0]."'>Edit</a></td>";
    echo "<td><a href='deleteorganization.php?id=".$row[0]."'>Delete</a></td>";
    echo "</tr>";
    }
    // Free result set
      mysqli_free_result($results);
      echo "</table>";
    }
    else{
      echo "0 results"; 
    }



  ?>
  </div>
</body>
</html>