<?php
session_start();
include 'Connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM user WHERE username='".$username."' AND password='".$password."';";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) <= 0) {
      $_SESSION['login_error'] = "Invalid username or password.";
      header("Location: login.html");
      exit;
  }

  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  $_SESSION['user'] = $row['id'];
  header("Location: level.html");
  exit;
}
?>