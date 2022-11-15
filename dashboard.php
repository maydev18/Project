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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
    integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <title>Admin DashBoard</title>
</head>

<body>
  <div class="jumbotron" style="border-radius:0;background:url('images/3.jpg');background-size:cover;height:400px;">
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">
        <div class="list-group">
          <a href="" class="list-group-item active">Members</a>
          <a href="showdetails.php" class="list-group-item">Member Request Details</a>
          <a href="showEnrolledDetails.php" class="list-group-item">Enrolled Member Details</a>
          <a href="logout.php" class="list-group-item">Logout</a>
        </div>
        <hr>
      </div>
      <div class="col-md-8">
        <div class="card">

          <div class="card-body" style="background-color:#3498DB;color:FFFFFF;">
            <h3>Register new members</h3>
          </div>
          <div class="card-body"></div>
          <form class="form-group" action="func.php" method="post">
            <label>Member ID</label>
            <input type="text" name="id" class="form-control"><br>
            <label>Full Name:</label>
            <input type="text" name="name" class="form-control"><br>
            <label>Email</label>
            <input type="email" name="email" class="form-control"><br>
            <label>Phone</label>
            <input type="number" name="phone" class="form-control"><br>
            <label>Plan</label>
            <input type="text" name="plan" class="form-control"><br>
            <input type="submit" class="btn btn-primary" name="pat_submit" value="Register">
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-1"></div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
    integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous">
    </script>
</body>

</html>