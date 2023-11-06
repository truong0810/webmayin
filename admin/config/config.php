<?php
$mysqli = new mysqli("localhost", "root", "", "web_printer");
mysqli_set_charset($mysqli, 'utf8');
// Check connection
if ($mysqli->connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli->connect_error;
  exit();
}
