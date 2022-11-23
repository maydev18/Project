<?php
include_once("config.php");
session_start();
if (isset($_SESSION['recerr'])) {
    if ($_SESSION['recerr'] != '') {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">' . $_SESSION['recerr'] . '
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	  </div>';
    }
}
$recerr = "";
$_SESSION['recerr'] = "";
if (isset($_POST['login_submit'])) {
    $id = trim($_POST['username']);
    $sql = "SELECT * FROM `login` WHERE `username` = '$id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0) {
        $_SESSION['recerr'] = 'No user exists';
        header("location:recoverpass.php");
    } else {
        $otp = rand(100000, 999999);
        $_SESSION['recoverid'] = $id;
        $to_email = $id;
        $subject = "OTP to change the password";
        $body = "your otp is: " . $otp;
        $headers = "From: ms772254@gmail.com";
        if (mail($to_email, $subject, $body, $headers)) {
            $_SESSION['otp'] = $otp;
            header("location:verifyotp.php");
        } else {
            $_SESSION['recerr'] = 'otp sending failed';
            header("location:recoverpass.php");
        }
    }
}
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
                            <h5>Recover Password</h5><br>
                            <form class="form-group" method="POST" action="">
                                <div class="row">
                                    <div class="col-md-4"><label>Recovery Email</label></div>
                                    <div class="col-md-8"><input type="email" name="username" class="form-control"
                                            placeholder="enter registered mail" required /></div><br><br>
                                </div><br>
                                <div class="centerbutton">
                                    <input type="submit" id="inputbtn" name="login_submit" value="Send otp"
                                        class="btn btn-primary">
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
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
</body>

</html>