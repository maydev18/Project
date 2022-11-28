<?php
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");
	session_start();
	include_once('../config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
	<title>Merchant Check Out Page</title>
	<meta name="GENERATOR" content="Evrsoft First Page">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
		crossorigin="anonymous"></script>
		<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
    <a href="../profile.php"><i class='bx bxs-user' style="
    font-size: 2.5rem;
    margin-right: 1rem;"></i></a>
      <a class="navbar-brand" href="../welcome.php">
        <h3>
          <?php
          $username = $_SESSION['username'];
          $query = "select * from `enrolled details` where `email` ='$username'";
          $result = mysqli_query($conn, $query);
          $row = mysqli_fetch_assoc($result);
          $name = $row['name'];
          $plan = strtolower($row['plan']);
          $id = $row['id'];
          $cost;
          if($plan == "basic")$cost =2000;
          else if($plan == "standard")$cost =4000;
          else $cost =18000;
          echo ucwords($name);
          ?>
        </h3>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item me-5">
            <a  class="nav-link" aria-current="page" href="../welcome.php">Home</a>
          </li>
          <li class="nav-item">
            <form action="../logout.php" method="POST">
              <input type="submit" value="Logout" class="nav-link">
            </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>
	<div class="container mt-3">
	<h1>Merchant Check Out Page</h1>
	<form method="post" action="pgRedirect.php">
		<div class="mb-3">
			<label for="ORDER_ID" class="form-label">Order ID</label>
			<input readonly id="ORDER_ID" class="form-control" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" value="<?php echo  "ORDS" . rand(10000,99999999)?>">
		</div>
		<div class="mb-3">
			<label for="CUST_ID" class="form-label">GYM ID</label>
			<input readonly class="form-control" id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?php echo base64_decode($_GET['id']);?>">
		</div>
		<div class="mb-3">
			<label for="CUST_ID" class="form-label">Plan</label>
			<input readonly class="form-control" value="<?php echo base64_decode($_GET['plan']);?>">
		</div>
		<div class="mb-3">
			<label for="amnt" class="form-label">Amount</label>
			<input readonly class="form-control" tabindex="10" type="text" name="TXN_AMOUNT" value="<?php echo base64_decode($_GET['cost']);?>" id='amnt'>
		</div>

		<input type="hidden""id=" INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID"
			autocomplete="off" value="Retail">

		<input type="hidden" id="CHANNEL_ID" tabindex="4" maxlength="12" size="12" name="CHANNEL_ID" autocomplete="off" value="WAP">

		<input value="CheckOut" type="submit" onclick="" class="btn btn-primary">
	</form>
	</div>
</body>

</html>