<?php
include_once("config.php");
if (isset($_GET['username'])) {
    $tablename = $_GET['username'];
    date_default_timezone_set('Asia/Kolkata');
    $date = date("Y-m-d");
    $sql = "SELECT * from `${tablename}` WHERE `date` = '$date'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "Already made entry for today, see you tomorrow";
        header("Location:welcome.php");
    } else {
        $query = "insert into `${tablename}`(`date` ,`checkin`,`checkout`)values('$date',NULL,NULL)";
        $result = mysqli_query($conn, $query);
        if ($result) {
            header("Location:welcome.php");
        } else {
            echo "failed to insert day";
        }
    }
} else {
    header("Location:welcome.php");
}
?>