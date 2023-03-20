<?php
include 'includes/security.php';
include 'includes/header.php';
include 'includes/navbar.php';
include 'includes/connection.php';

?>


<!-- Modal -->
<div class="modal fade" id="addadminprofile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Register Form</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <form action="submitForm.php" method="post" class="row g-3">
      <div class="col-6">
    <label for="inputAddress" class="form-label">First Name</label>
    <input type="text" name="ufname" class="form-control mb-3" id="inputAddress" required>
  </div>
  <div class="col-6">
    <label for="inputAddress2" class="form-label">Last Name</label>
    <input type="text" name="ulname" class="form-control mb-3" id="inputAddress2" required>
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" name="uemail" class="form-control mb-3" id="inputEmail4" required>
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Password</label>
    <input type="password" name="upass" class="form-control mb-3" id="inputPassword4" required>
  </div>

  <div class="col-auto">
    <label class="visually-hidden" for="autoSizingInputGroup">Username</label>
    <div class="input-group">
      <div class="input-group-text">@</div>
      <input type="text" name="uusername" class="form-control" id="autoSizingInputGroup" placeholder="Username" required>
    </div>
  </div>
  <div class="col-12">
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="submit" id="liveToastBtn" name="regbtn" class="btn btn-primary">Register</button>
  </div>
  </div>
</form>
      </div>

    </div>
  </div>
</div>

<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Admins</h6>
    </div>

    <div class="card-body">

      <div class="table-responsive">
        <?php
$sql = "SELECT * FROM admin";
$result = mysqli_query($conn, $sql);

?>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Id</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Username</th>
              <th>Email</th>
              <th>Register Date</th>
            </tr>
          </thead>
          <tbody>
            <?php
if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
        ?>
              <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['fname']; ?></td>
                <td><?php echo $row['lname']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['reg_date']; ?></td>



              </tr>
            <?php

    }
} else {
    echo "No Record Found";
}
?>

          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Teachers</h6>
    </div>

    <div class="card-body">

      <div class="table-responsive">
        <?php

$sql = "SELECT * FROM teacher";
$result = mysqli_query($conn, $sql);

?>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Id</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Username</th>
              <th>Email</th>
              <th>Grade</th>
              <th>Register Date</th>

            </tr>
          </thead>
          <tbody>
            <?php
if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
        ?>
              <tr>
                <td><?php echo $row['tid']; ?></td>
                <td><?php echo $row['fname']; ?></td>
                <td><?php echo $row['lname']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['grade']; ?></td>
                <td><?php echo $row['reg_date']; ?></td>



              </tr>
            <?php

    }
} else {
    echo "No Record Found";
}
?>

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
  <div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Students</h6>
    </div>

    <div class="card-body">

      <div class="table-responsive">
        <?php
$sql = "SELECT * FROM student";
$result = mysqli_query($conn, $sql);

?>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Id</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Email</th>
              <th>Telephone</th>
              <th>WhatsApp</th>
              <th>Address</th>
              <th>Gender</th>
              <th>Grade</th>
              <th>Username</th>
              <th>Register Date</th>

            </tr>
          </thead>
          <tbody>
            <?php
if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
        ?>
              <tr>
                <td><?php echo $row['sid']; ?></td>
                <td><?php echo $row['fname']; ?></td>
                <td><?php echo $row['lname']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['telephone']; ?></td>
                <td><?php echo $row['whatsapp']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['gender']; ?></td>
                <td><?php echo $row['grade']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['reg_date']; ?></td>



              </tr>
            <?php

    }
} else {
    echo "No Record Found";
}
?>

          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Teachers</h6>
    </div>

    <div class="card-body">

      <div class="table-responsive">
        <?php

$sql = "SELECT * FROM teacher";
$result = mysqli_query($conn, $sql);

?>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Id</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Username</th>
              <th>Email</th>
              <th>Grade</th>
              <th>Register Date</th>

            </tr>
          </thead>
          <tbody>
            <?php
if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
        ?>
              <tr>
                <td><?php echo $row['tid']; ?></td>
                <td><?php echo $row['fname']; ?></td>
                <td><?php echo $row['lname']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['grade']; ?></td>
                <td><?php echo $row['reg_date']; ?></td>



              </tr>
            <?php

    }
} else {
    echo "No Record Found";
}
?>

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
  </div>
  <div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Payments</h6>
    </div>

    <div class="card-body">

      <div class="table-responsive">
        <?php
$sql = "SELECT * FROM payment";
$result = mysqli_query($conn, $sql);

?>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Id</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Email</th>
              <th>Grade</th>
              <th>Payment Status</th>
              <th>Payment Amount</th>
              <th>Payment Date</th>

            </tr>
          </thead>
          <tbody>
            <?php
if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
        ?>
              <tr>
                <td><?php echo $row['sid']; ?></td>
                <td><?php echo $row['fname']; ?></td>
                <td><?php echo $row['lname']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['grade']; ?></td>
                <td><?php echo $row['payment']; ?></td>
                <td><?php echo $row['amount']; ?></td>
                <td><?php echo $row['payment_date']; ?></td>



              </tr>
            <?php

    }
} else {
    echo "No Record Found";
}
?>

          </tbody>
        </table>
      </div>
    </div>
  </div>
  </div>
  </div>

<?php
mysqli_close($conn);
include 'includes/footer.php';
?>