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
    $plan = $_POST['plan'];
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
        echo "<script>alert('Member added.')</script>";
        echo "<script>window.open('dashboard.php','_self')</script>";
    }
    else{
        echo "<script>alert('Member Not added.')</script>";
        echo "<script>window.open('dashboard.php','_self')</script>";
    }
}
if (isset($_POST['tra_submit'])) {
    $Trainer_id = $_POST['Trainer_id'];
    $Name = $_POST['Name'];
    $phone = $_POST['phone'];
    $query = "insert into Trainer(Trainer_id,Name,phone)values('$Trainer_id','$Name','$phone')";
    $result = mysqli_query($con, $query);
    if ($result) {
        echo "<script>alert('Trainer added.')</script>";
        echo "<script>window.open('admin-panel.php','_self')</script>";
    }
}
?>