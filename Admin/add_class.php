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
      <h6 class="m-0 font-weight-bold text-primary">Class

      </h6>
      <form action="submitForm.php" method="post" class="row g-3">
      <div class="col-6">
    <label for="inputClass" class="form-label">Add Class</label>
    <input type="text" name="addclass" class="form-control mb-3" id="inputClass" placeholder="Ex: Grade 6" required>
  </div>

  <div class="col-12">
  <div class="modal-footer">
    <button type="submit" id="liveToastBtn" name="addclassbtn" class="btn btn-primary">ADD</button>
  </div>
  </div>
</form>
    </div>

    <div class="card-body">

      <div class="table-responsive">
        <?php
$sql = "SELECT * FROM grade";
$result = mysqli_query($conn, $sql);

?>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Id</th>
              <th>Grade</th>
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
                <td><?php echo $row['gid']; ?></td>
                <td><?php echo $row['grade']; ?></td>

                <td>
                  <form action="classEdit.php" method="post">
                  <input type="hidden" name="edit_id" value="<?php echo $row['gid']; ?>">
                    <button type="submit" name="editBtn" class="btn btn-success">EDIT</button></td>
                  </form>
                <td>
                  <form action="regAdd.php" method="post">
                    <input type="hidden" name="delete_id" value="<?php echo $row['gid']; ?>" id="">
                    <button type="submit" name="deleteBtn" class="btn btn-danger">DELETE</button>
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