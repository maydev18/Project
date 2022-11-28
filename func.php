<script> if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>
<?php
include_once("config.php");
if (isset($_POST['pat_submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $plan = strtolower($_POST['plan']);
    $query = "insert into `enrolled details`(`id`,`name`,`email`,`phone`,`plan`)values('$id','$name','$email','$phone','$plan')";
    $result = mysqli_query($conn, $query);
    $sql = "CREATE TABLE `{$email}` (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        `date` DATE NOT NULL DEFAULT CURRENT_DATE,
        checkin TIME NULL,
        checkout TIME NULL
        )";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $to_email = $email;
        $subject = "Welcome To UV Fitness Gym";
        $body = "Your request to join UV Fitness gym is successfully initiated and processed. Kindly register yourself into the gym to gain access to your dashboard from where you can pay the gym fee and start your journey with us";
        $headers = "From: ms772254@gmail.com";
        if (mail($to_email, $subject, $body, $headers)) {
            echo "<script>alert('Member added and enrollment mail is succesfully sent.')</script>";
            echo "<script>window.open('dashboard.php','_self')</script>";
        } else {
            echo "<script>alert('Member added but failed to send the mail.')</script>";
            echo "<script>window.open('dashboard.php','_self')</script>";
        }
    }
    else{
        echo "<script>alert('Member Not added.')</script>";
        echo "<script>window.open('dashboard.php','_self')</script>";
    }
}
?>
