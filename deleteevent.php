<?php
if (!isset($_SESSION['name'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
include('config.php');
echo $_GET["id"];



$query = "delete from event where id=".$_GET["id"];
mysqli_query($db, $query);
header('location: myevents.php');
?>