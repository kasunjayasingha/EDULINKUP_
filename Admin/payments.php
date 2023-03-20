<?php
include 'includes/security.php';
include 'includes/header.php';
include 'includes/navbar.php';
include 'includes/connection.php';

?>

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
                <td><?php echo $row['amount']; ?></td>
                <td><?php echo $row['payment_date']; ?></td>

                <td>
                  <form action="payments_edit.php" method="post">
                  <input type="hidden" name="edit_id" value="<?php echo $row['sid']; ?>">
                    <button type="submit" name="editPaymentBtn" class="btn btn-success">EDIT</button></td>
                  </form>
                <td>
                  <form action="submitForm.php" method="post">
                    <input type="hidden" name="delete_id" value="<?php echo $row['sid']; ?>" id="">
                    <button type="submit" name="deletePaymentBtn" class="btn btn-danger">DELETE</button>
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