<?php
    include_once("config.php");
    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $sql = "SELECT `email` from `enrolled details` WHERE `id` = '$id'";
        $result1 = mysqli_query($conn , $sql);
        $email = mysqli_fetch_assoc($result1)['email'];
        $sql = "DELETE FROM `login` WHERE `username` = '$email'";
        $result1 = mysqli_query($conn , $sql);
        if(!$result1){
          echo "Internal Server Error : cannot delete the records";
        }
        else{
          $sql = "DELETE FROM `enrolled details` WHERE `id` = '$id'";
          $result1 = mysqli_query($conn , $sql);
          if(!$result1){
            echo "Internal Server Error : cannot delete the records";
          }
          else{
            $sql = "DROP TABLE `{$email}`";
            $result = mysqli_query($conn , $sql);
            if(!$result){
              echo "Internal Server Error : cannot delete the records";
            }
            else{
              header("Location:showEnrolledDetails.php");
            }
          }
        }
      }
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $plan = $_POST['plan'];

        $sql = "UPDATE `enrolled details` SET `name`='$name', `email` = '$email' , `phone` = '$phone' , `plan` = '$plan' WHERE `id`= '$id'";
        $result = mysqli_query($conn , $sql);
        if(!$result){
            echo "Internal Server Error : cannot update the records";
        }
        else{
            header("Location:showEnrolledDetails.php");
        }
    }
?>