<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet"> 
    <style>
      *{
        margin: 0;
        padding: 0;
      }
      .container{
        margin-top : 4rem;
      }
    </style>
</head>
<body>
    <div class="container">
    <table class="table" id  = "myTable">
        <thead>
          <tr>
            <th scope="col">S. No.</th>
            <th scope="col">Date</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">message</th>
            <!-- <th scope="col">Action</th> -->
          </tr>
        </thead>
        <tbody>
            <?php
    //connecting to user database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "users";

    //creating a connection
    $conn = mysqli_connect($servername , $username , $password , $database);
    if(!$conn){
        die("Connection to database failed" . mysqli_connect_error());
    }
    $sql = "select * from `user details`";
    $result = mysqli_query($conn , $sql);
    $num = mysqli_num_rows($result);//gives total number of rows
    $sno = 0;
      while($row = mysqli_fetch_assoc($result)){
        $sno+=1;
        $msg = "
              <tr>
              <th scope = 'row'>" . $sno . "</th>
              <td>". $row["date"] ."</td>
              <td>". $row["first Name"] ."</td>
              <td>". $row["last name"] ."</td>
              <td>". $row["email"] ."</td>
              <td>". $row["phone"] ."</td>
              <td>". $row["message"] ."</td>
              </tr>
            ";
          echo $msg;
      }
?>
        </tbody>
      </table>
    </div>
      <script
  src="https://code.jquery.com/jquery-3.6.1.js"
  integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
  crossorigin="anonymous"></script>
    <script src = "//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"> </script>
    <script>
        $(document).ready( function () {
        $('#myTable').DataTable();
        } );
    </script>
</body>
</html>