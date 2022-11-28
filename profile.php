<?php
include_once("config.php");
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  header("location: loginform.php");
}
$username = $_SESSION['username'];
$query = "select * from `enrolled details` where `email` ='$username'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$plan = $row['plan'];
$id = $row['id'];
$phone = $row['phone'];
$cost;
if (strtolower($plan) == "basic")
  $cost = 2000;
else if (strtolower($plan) == "standard")
  $cost = 4000;
else
  $cost = 18000;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous"></script>
    <style>
      html{
        text-transform: capitalize;
      }
    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="welcome.php">
        <button class="btn btn-primary">Dashboard</button>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <form action="logout.php" method="POST">
              <button type="submit" name="submit" class="btn btn-primary">logout</button>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class='container mt-3'>
		<table class='table'>
			<tbody>
			  <tr>
          <th scope='col'>Name</th>
          <td><?php echo $name;?> </td>
        </tr>
        <tr>
          <th scope='col'>Email</th>
          <td><?php echo $username;?> </td>
        </tr>
        <tr>
          <th scope='col'>Phone</th>
          <td><?php echo $phone;?> </td>
        </tr>
        <tr>
          <th scope='col'>GYM ID</th>
          <td><?php echo $id;?> </td>
        </tr>
        <tr>
          <th scope='col'>Plan</th>
          <td><?php echo $plan;?> </td>
        </tr>
        <tr>
          <th scope='col'>GYM Fee</th>
          <td><?php echo $cost;?> </td>
        </tr>
        <tr>
          <th scope='col'>Total workout hours this week</th>
          <td><?php echo $_SESSION['totalWorkoutHours'];?> </td>
        </tr>
        <tr>
          <th scope='col'>Average workout hours this week per day</th>
          <td><?php echo $_SESSION['averageWorkoutHours'];?> </td>
        </tr>
        <tr>
          <th scope='col'>Calories burnt this week</th>
          <td><?php echo $_SESSION['calories'];?> </td>
        </tr>
      </tbody>
		  </table>
		</div>
  </div>
</body>

</html>