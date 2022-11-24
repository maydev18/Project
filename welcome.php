<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
if (isset($_SESSION['welerr'])) {
  if ($_SESSION['welerr'] != '') {
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">' . $_SESSION['welerr'] . '
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
  }
}
$welerr = "";
$_SESSION['welerr'] = "";
?>

<body>
  <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a href="profile.php"><i class='bx bxs-user' style="
    font-size: 2.5rem;
    margin-right: 1rem;"></i></a>
      <a class="navbar-brand" href="welcome.php">
        <h3>
          <?php
          $username = $_SESSION['username'];
          $query = "select * from `enrolled details` where `email` ='$username'";
          $result = mysqli_query($conn, $query);
          $row = mysqli_fetch_assoc($result);
          $name = $row['name'];
          $plan = $row['plan'];
          $id = $row['id'];
          $cost;
          if ($plan == "basic")
            $cost = 2000;
          else if ($plan == "standard")
            $cost = 4000;
          else
            $cost = 18000;
          echo ucwords($name);
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
            <a id="addDay" class="nav-link active" aria-current="page" href="addDay.php">Add Day</a>
          </li>
          <li class="nav-item me-5">
            <a id="addDay" class="nav-link" aria-current="page"
              href="payment/TxnTest.php?plan=<?php echo base64_encode($plan); ?>&id=<?php echo base64_encode($id); ?>&cost=<?php echo base64_encode($cost); ?>">Pay
              Fees</a>
          </li>
          <li class="nav-item">
            <form action="logout.php" method="POST">
              <input type="submit" value="Logout" class="nav-link">
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
            <input type="submit" class="btn btn-primary" data-bs-dismiss="modal" value="Save Changes">
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="container mt-2">
    <table class="mt-3 table" id="myTable">
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
        $total = 0;
        $avg = 0;
        $cal = 0;
        while ($row = mysqli_fetch_assoc($result)) {
          $sno += 1;
          if ($num <= 7) {
            $total += strtotime($row["checkout"]) - strtotime($row["checkin"]);
          } else if ($sno > ($num - 7)) {
            $total += strtotime($row["checkout"]) - strtotime($row["checkin"]);
          }
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
        $cal = $total * 0.06; //per second cal burnt is 0.2(estimate)
        $total = round($total / 3600, 2);
        if ($num <= 7 && $num!=0) {
          $avg = $total / $num;
        } else {
          $avg = $total / 7;
        }
        $avg = round($avg,2);
        $_SESSION['totalWorkoutHours'] = $total;
        $_SESSION['averageWorkoutHours'] = $avg;
        $_SESSION['calories'] = $cal;
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
    // function openfile() {
    //   window.open("addDay.php?username=<?php echo $username; ?>", '_self');
    // }
    $(document).ready(function () {
      $('#addDay').click(function () {
        $.ajax({
          url: 'addDay.php',
          method: "post",
          data: {
            //data to be sent to the server, in this case we are not sending anything.can be json,string or array.
          },
          success: function (data) {
            if (data == "entryfortodayalreadymade") {
              alert("Entry for today already made");
            }
            else if (data == 'success') {
              location.reload();
            }
          }
        });
      })
    })
  </script>
</body>

</html>