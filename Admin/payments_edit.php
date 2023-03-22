<?php
include 'includes/security.php';
include 'includes/header.php';
include 'includes/navbar.php';
include 'includes/connection.php';

?>

<?php

if (isset($_POST['editPaymentBtn'])) {
    $id = $_POST["edit_id"];
    // This get for find the update row
    $_SESSION['psid'] = $id;

    $sql = "SELECT * FROM payment WHERE sid = '$id'";
    $result = mysqli_query($conn, $sql);

    foreach ($result as $row) {
        $_SESSION['fname'] = $fname = $row['fname'];
        $_SESSION['lname'] = $lname = $row['lname'];
        ?>
<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Payment

      </h6>
      <form action="submitForm.php" method="post" class="row g-3">
      <div class="col-6">
  <label for="flexRadioDefault1" class="form-label" >Payment Status</label>
    <div class="form-check ">
        <input class="form-check-input" type="radio" name="paymentStatus" value="Pay" id="flexRadioDefault1" >
        <label class="form-check-label" for="flexRadioDefault1">Pay</label>
    </div>
    <div class="form-check mb-3">
        <input class="form-check-input" type="radio" name="paymentStatus" value="Not Pay" id="flexRadioDefault2" checked>
        <label class="form-check-label" for="flexRadioDefault2">Not Pay</label>
    </div>
  </div>
  <div class="col-6">
    <label for="inputPassword4" class="form-label">Full Name</label>
    <input type="text" name="ufull" value="<?php echo $fname . " " . $lname ?>" class="form-control mb-3" id="inputPassword4" readonly>
  </div>
  <div class="col-6">
  <label for="selectGrade" class="form-label">Month</label>
  <br>
    <select class="form-select mb-3" name="umonth" aria-label="Default select example" id="selectGrade" required>
        <option selected>Select Month..</option>
        <option value="January">January</option>
        <option value="February">February</option>
        <option value="March">March</option>
        <option value="April">April</option>
        <option value="May">May</option>
        <option value="June">June</option>
        <option value="July">July</option>
        <option value="August">August</option>
        <option value="September">September</option>
        <option value="October">October</option>
        <option value="November">November</option>
        <option value="December">December</option>
    </select>
  </div>
  <div class="col-6">
    <label for="inputPassword4" class="form-label">Year</label>
    <input type="number" name="uyear" value="<?php $year = date("Y");
        echo $year;?>" class="form-control mb-3" id="inputPassword4" readonly>
  </div>
  <div class="col-6">
    <label for="inputPassword4" class="form-label">Payment Amount</label>
    <input type="number" name="paymentAmount" class="form-control mb-3" id="inputPassword4" >
  </div>
  <div class="col-12">
  <div class="modal-footer">
    <button type="submit" id="liveToastBtn" name="paymentUpdatebtn" class="btn btn-primary">Update</button>
  </div>
  </div>
</form>
<?php
}
}
?>
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
              <th>Payment Date</th>
              <th>EDIT</th>
              <th>DELETE</th>
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
                <td><?php echo $row['payment_date']; ?></td>

                <td>
                  <form action="" method="post">
                  <input type="hidden" name="edit_id" value="<?php echo $row['sid']; ?>">
                    <button type="submit" name="editPaymentBtn" class="btn btn-success">EDIT</button></td>
                  </form>
                <td>
                  <form action="regAdd.php" method="post">
                    <input type="hidden" name="delete_id" value="<?php echo $row['sid']; ?>" id="">
                    <button type="submit" name="deletePaymentBtn" onclick="myFunction()" class="btn btn-danger">DELETE</button>
                  </form>
                </td>

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


<?php
mysqli_close($conn);
include 'includes/footer.php';
?>