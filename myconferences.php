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

  
  $query = "SELECT id, name FROM Conference where createdby=".$_SESSION['ID'];
  
  
  //$result = $conn->query($sql);


?>
<!DOCTYPE html>
<html>
<head>
  <title>Conference</title>
  <link rel="stylesheet" type="text/css" href="register.css">
</head>
<body>
  <p><a href="index.php" style="color: blue;">Homepage</a></p>
  <p><a href="conference.php" style="color: blue;">Create Conference</a></p>
  <p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
  <div class="header">
    <h2>My Conference</h2>
  </div>
  <?php 


  if ($results = mysqli_query($db, $query))
  {
    echo "<table>";
    echo "<tr><th>ID</th>";
    echo "<th>Name</th>";
    echo "<th>Edit</th>";
    echo "<th>Delete</th>";
    echo "</tr>";
  // Fetch one and one row
  while ($row=mysqli_fetch_row($results))
    {
    echo "<tr>";
    printf ("<td>%s</td> <td>(%s)</td>",$row[0],$row[1]);
    echo "<td><a href='editconference.php?id=".$row[0]."'>Edit</a></td>";
    echo "<td><a href='deleteconference.php?id=".$row[0]."'>Delete</a></td>";
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
  
</body>
</html>