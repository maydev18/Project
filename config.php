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
?>