<?php
include 'includes/security.php';
include 'includes/header.php';
include 'includes/navbar.php';
include 'includes/connection.php';

?>
<?php

if (isset($_POST['editBtn'])) {
    $id = $_POST["edit_id"];
    // This get for find the update row
    $_SESSION['gid'] = $id;

    $sql = "SELECT * FROM grade WHERE gid = '$id'";
    $result = mysqli_query($conn, $sql);

    foreach ($result as $row) {
        ?>

<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Class Edit</h6>
      <form action="submitForm.php" method="post" class="row g-3">
      <div class="col-6">
    <label for="inputClass" class="form-label">Add Class</label>
    <input type="text" name="editclass" value="<?php echo $row['grade']; ?>" class="form-control mb-3" id="inputClass" required>
  </div>

  <div class="col-12">
  <div class="modal-footer">
    <button type="submit" id="liveToastBtn" name="updateclassbtn" class="btn btn-primary">UPDATE</button>
  </div>
  </div>
</form>
<?php
}
}
?>
    </div>
    </div>
    </div>

<?php
mysqli_close($conn);
include 'includes/footer.php';
?>