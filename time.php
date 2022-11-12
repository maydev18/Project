<?php
include_once("config.php");
if($_SERVER['REQUEST_METHOD']=="POST"){
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $tablename = $_POST['tablename'];
    $date = $_POST['date'];
    // echo $date;
    $sql = "SELECT * from `${tablename}` WHERE `date` = '$date'";
    $result = mysqli_query($conn , $sql);
    $ischeckin = mysqli_fetch_assoc($result)['checkin'];
    if($ischeckin != ""){
        echo "Entry for today already made";
        header("Location:welcome.php");
    }
    else{
        $sql = "UPDATE `${tablename}` SET `checkin`='$checkin', `checkout` = '$checkout' WHERE `date`= '$date'";
        $result = mysqli_query($conn , $sql);
        if(!$result){
            echo "Internal Server Error : cannot update the time";
        }
        else{
            header("Location:welcome.php");
        }
    }
}
?>