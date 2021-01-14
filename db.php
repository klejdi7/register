<?php
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db = 'regjistri';
	$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
	if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>
