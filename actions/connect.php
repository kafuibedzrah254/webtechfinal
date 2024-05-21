<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$database = "chores_mgt";
// Create connection
$con =  mysqli_connect($servername, $username, $password,$database);

// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

?>