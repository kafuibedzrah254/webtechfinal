<?php
$servername = "localhost:3308";
$username = "root";
$password = "brim254@king";
$database = "votingsystem";
// Create connection
$con =  mysqli_connect($servername, $username, $password,$database);

// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

?>