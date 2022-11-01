<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "users";
    //creating a connection
    $conn = mysqli_connect($servername , $username , $password , $database);
    if(!$conn){
        die("Connection to database failed" . mysqli_connect_error());
    }
    if($_SERVER['REQUEST_METHOD']=="POST"){
      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $email = $_POST['email'];
      $number = $_POST['number'];
      $message = $_POST['message'];
      $sql =" INSERT INTO `user details` (`first Name`, `last name`, `email`, `phone`, `message`) VALUES ('$fname', '$lname', '$email', '$number', '$message')";
      $result = mysqli_query($conn , $sql);
      if($result){
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>SUCCESS!!  </strong>Record inserted successfully.
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
      }
      else{
        echo "no insertion";
      }
    }
?>