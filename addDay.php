<?php
session_start();
include_once("config.php");
// if (isset($_GET['username'])) {
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $tablename = $_SESSION['username'];
    date_default_timezone_set('Asia/Kolkata');
    $date = date("Y-m-d");
    $sql = "SELECT * from `${tablename}` WHERE `date` = '$date'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "entryfortodayalreadymade";
        // header("Location:welcome.php");
    } else {
        $query = "insert into `${tablename}`(`date` ,`checkin`,`checkout`)values('$date',NULL,NULL)";
        $result = mysqli_query($conn, $query);
        if ($result){
            echo "success";
        } else {
            echo "failed to insert day";
        }
    }
} else {
    header("Location:welcome.php");
}
?>