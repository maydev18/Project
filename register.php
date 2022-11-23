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
if (isset($_SESSION['err'])) {
	if ($_SESSION['err'] != '') {
		echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">' . $_SESSION['err'] . '
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	  </div>';
	}
}
$err = "";
$_SESSION['err'] = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$email = $_POST['username'];
	$password = "";
	$sql = "SELECT `id` FROM `enrolled details` WHERE `email` = '$email'";
	$result = mysqli_query($conn, $sql);
	$sql = "SELECT * FROM `login` WHERE `username` = '$email'";
	$result1 = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) == 0) {
		$_SESSION['err'] = "Please ask gym owner to add you in gym";
		header("location:register.php");
	} else if (mysqli_num_rows($result1) == 1) {
		$_SESSION['err'] = "User already registered, please login to continue";
		header("location:register.php");
	} else {
		if (empty(trim($_POST['password']))) {
			$_SESSION['err'] = "Password cannot be blank";
		} elseif (strlen(trim($_POST['password'])) < 5) {
			$_SESSION['err'] = "Password cannot be less than 5 characters";
		} else {
			$password = trim($_POST['password']);
			$password = password_hash($password, PASSWORD_DEFAULT);
			$sql = "INSERT INTO login (username, password) VALUES ('$email', '$password')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				header("location: loginform.php");
			} else {
				$_SESSION['err'] = "cannot redirect, something went wrong";
			}
		}
	}
}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<style type="text/css">
	#inputbtn:hover {
		cursor: pointer;
	}
</style>

<body style="background:url('images/4.jpg'); background-size: cover;">
	<div class="container-fluid" style="margin-top:60px;margin-bottom:60px;color:#34495E;">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-4">
				<div class="card">
					<img src="images/cardback.jpg" class="card-img-top">
					<div class="card-body">
						<center>
							<h5>Registeration Desk</h5><br>
							<form class="form-group" method="POST" action="">
								<div class="row">
									<div class="col-md-4"><label>Username: </label></div>
									<div class="col-md-8"><input type="text" name="username" class="form-control"
											placeholder="enter username" required /></div><br><br>
									<div class="col-md-4"><label>Password: </label></div>
									<div class="col-md-8"><input type="password" class="form-control" name="password"
											placeholder="enter password" required /></div><br><br><br>
								</div>
								<div class="centerbutton">
									<input type="submit" value="Register" class="btn btn-primary">
									<button type="button" class="edit btn btn-primary"
										onclick="window.open('loginform.php','_self');">Login</button>
								</div>
							</form>
						</center>
					</div>
				</div>
			</div>
			<div class="col-md-7"></div>
		</div>
	</div>

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
		integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
					integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
					crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
		crossorigin="anonymous"></script>
</body>

</html>