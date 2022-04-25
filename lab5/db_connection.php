<?php
$hostname = "localhost";
$username = "";
$password = "";
$database = "";


$connect = mysqli_connect($hostname, $username, $password, $database);

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
?>
