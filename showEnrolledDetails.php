<?php
session_start();

    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true || $_SESSION['username']!='admin@gym')
    {
    header("location: loginform.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>user details</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous"></script>
  <link href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">

  <style>
    * {
      margin: 0;
      padding: 0;
    }

    .container {
      margin-top: 4rem;
    }
  </style>
</head>
<script> if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
</script>

<body>
<?php
  include_once('dashboardheader.php');
  ?>
  <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="modal">Edit Details</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="form-group" action="edit.php" method="post">
            <input type="text" name="id" class="form-control" id="id" hidden><br>
            <label>Full Name:</label>
            <input type="text" name="name" class="form-control" id="name"><br>
            <label>Email</label>
            <input type="email" name="email" class="form-control" id="email"><br>
            <label>Phone</label>
            <input type="number" name="phone" class="form-control" id="phone"><br>
            <label>Plan</label>
            <input type="text" name="plan" class="form-control" id="plan"><br>
            <input type="submit" class="btn btn-primary" name="pat_submit" value="Save Changes" data-bs-dismiss="modal">
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <table class="table" id="myTable">
      <thead>
        <tr>
          <th scope="col">S. No.</th>
          <th scope="col">Member Id</th>
          <th scope="col">Full Name</th>
          <th scope="col">Email</th>
          <th scope="col">Phone</th>
          <th scope="col">Plan</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
            //connecting to user database
            include_once("config.php");
            $sql = "select * from `enrolled details`";
            $result = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result); //gives total number of rows
            $sno = 0;
            while ($row = mysqli_fetch_assoc($result)) {
              if ($row['email'] == 'admin@gym')
                continue;
              $sno += 1;
              $msg = "
                        <tr>
                        <th scope = 'row'>" . $sno . "</th>
                        <td>" . $row["id"] . "</td>
                        <td>" . $row["name"] . "</td>
                        <td>" . $row["email"] . "</td>
                        <td>" . $row["phone"] . "</td>
                        <td>" . $row["plan"] . "</td>
                        <td>" . '<button type="button" class="edit btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal">Edit</button>' . " " . '<button type="button" class="delete btn btn-danger">Delete</button>' . "</td>
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
        id = tr.getElementsByTagName('td')[0].innerText;
        name = tr.getElementsByTagName('td')[1].innerText;
        email = tr.getElementsByTagName('td')[2].innerText;
        phone = tr.getElementsByTagName('td')[3].innerText;
        plan = tr.getElementsByTagName('td')[4].innerText;
        document.getElementById('id').value = id;
        document.getElementById('name').value = name;
        document.getElementById('email').value = email;
        document.getElementById('phone').value = phone;
        document.getElementById('plan').value = plan;
      })
    })
    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener('click', (e) => {
        tr = e.target.parentNode.parentNode;
        id = tr.getElementsByTagName('td')[0].innerText;
        if (confirm("Do you really want to delete this record?")) {
          window.location = `edit.php?delete=${id}`;
        }
      })
    })
  </script>
</body>

</html>