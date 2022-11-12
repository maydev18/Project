<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous"></script>
  <link href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
  <title>User DashBoard</title>
  <script> if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>
</head>
<?php
include_once("config.php");
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  header("location: loginform.php");
}
?>

<body>
  <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="welcome.php">
        <h3>
          <?php
          $username = $_SESSION['username'];
          $query = "select `name` from `enrolled details` where `email` ='$username'";
          $result = mysqli_query($conn, $query);
          $name = mysqli_fetch_assoc($result)['name'];
          echo "Welcome " . ucwords($name)." to UV Fitness gym";
          ?>
        </h3>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item me-5">
            <button class="btn btn-primary" onclick="openfile()"> Add day</button>
          </li>
          <li class="nav-item">
            <form action="logout.php" method="POST">
              <button type="submit" name="submit" class="btn btn-primary">logout</button>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="modal">Edit Time</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="form-group" action="time.php" method="post">
            <input type="text" name="tablename" class="form-control" hidden value="<?php echo $username; ?>"><br>
            <input type="date" name="date" class="form-control" id="date" hidden><br>
            <label>Check In:</label>
            <input type="time" name="checkin" class="form-control" id="checkin"><br>
            <label>Check Out:</label>
            <input type="time" name="checkout" class="form-control" id="checkout"><br>
            <input type="submit" class="btn btn-primary" value="Save Changes" data-bs-dismiss="modal">
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="container mt-5">
    <table class="table" id="myTable">
      <thead>
        <tr>
          <th scope="col">S. No.</th>
          <th scope="col">Date</th>
          <th scope="col">Check in</th>
          <th scope="col">Check out</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        //connecting to user database
        include_once("config.php");
        $sql = "select * from `{$username}`";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result); //gives total number of rows
        $sno = 0;
        while ($row = mysqli_fetch_assoc($result)) {
          $sno += 1;
          $msg = "
                        <tr>
                        <th scope = 'row'>" . $sno . "</th>
                        <td>" . $row["date"] . "</td>
                        <td>" . $row["checkin"] . "</td>
                        <td>" . $row["checkout"] . "</td>
                        <td>" . '<button type="button" class="edit btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal">Edit time</button>' . "</td>
                        </tr>
                      ";
          echo $msg;
        }
        ?>
      </tbody>
    </table>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
    crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"> </script>
  <script>
    $(document).ready(function () {
      $('#myTable').DataTable();
    });
  </script>
  <script>
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
      element.addEventListener('click', (e) => {
        tr = e.target.parentNode.parentNode;
        date = tr.getElementsByTagName('td')[0].innerText;
        document.getElementById('date').value = date;
      })
    })
    function openfile() {
      window.open("addDay.php?username=<?php echo $username; ?>", '_self');
    }
  </script>
</body>

</html>