<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "edulingo";

$conn = new mysqli($servername, $username, $password, $dbname);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

echo "Connected to database successfully!";

?>