<?php

session_start();

    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true || $_SESSION['username']!='admin@gym')
    {
    header("location: loginform.php");
    }
?>

<!DOCTYPE html>
<html>

<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous"></script>
    <title>Admin DashBoard</title>
</head>

<body>
  <?php
  include_once('dashboardheader.php');
  ?>
  <div class="jumbotron" style="/* border-radius:0; */background:url('images/3.jpg');background-size:cover;height: 516px;border: 4px solid gray;margin-top: 4rem;">
  </div>
  <br><br>
        <div class="container">
        <div class="card">

<div class="card-body" style="background-color:#3498DB;color:FFFFFF;">
  <h3>Register new members</h3>
</div>
<div class="card-body"></div>
<form class="form-group" action="func.php" method="post">
  <label>Member ID</label>
  <input required type="text" name="id" class="form-control"><br>
  <label>Full Name:</label>
  <input required type="text" name="name" class="form-control"><br>
  <label>Email</label>
  <input required type="email" name="email" class="form-control"><br>
  <label>Phone</label>
  <input required type="number" name="phone" class="form-control"><br>
  <label>Plan</label>
  <input required type="text" name="plan" class="form-control"><br>
  <input type="submit" class="btn btn-primary" name="pat_submit" value="Register">
</form>
</div>
        </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>