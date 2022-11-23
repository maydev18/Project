<?php
include_once("config.php");
session_start();
// check if the user is already logged in
if (isset($_SESSION['username'])) {
  if ($_SESSION['username'] == 'admin@gym') {
    header("location:dashboard.php");
  } else {
    header("location:welcome.php");
  }
}
$username = $password = "";
// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $username = trim($_POST['username']);
  $password = trim($_POST['password']);
  $sql = "SELECT `username`, `password` FROM `login` WHERE `username` = '$username'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) == 0) {
    $_SESSION['logerr'] = 'No user exists';
    header("location: loginform.php");
  } else {
    $hashedPwd = mysqli_fetch_assoc($result)['password'];
    if (password_verify($password, $hashedPwd)) {
      session_start();
      $_SESSION["username"] = $username;
      $_SESSION["loggedin"] = true;
      if ($username == 'admin@gym') {
        header("location:dashboard.php");
      } else {
        header("location:welcome.php");
      }
    } else {
      $_SESSION['logerr'] = 'Please enter correct password';
      header("location:loginform.php");
    }
  }
}
mysqli_close($conn);
?>
