<?php
//session
session_start();

include 'Connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM user WHERE username = '$username'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) <= 0) {
    //cookie
    setcookie('error', true, time() + 3600, '/');
    header("Location: login.html");
    exit;
  }

  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

  if ($password != $row['password']) {
    setcookie('error', true, time() + 3600, '/');
    header("Location: login.html");
    exit;
  }
  

  $_SESSION['user'] = $row;
  header("Location: level.html");
}

?>


