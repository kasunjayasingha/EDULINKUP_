<?php

include 'includes/header.php';
include 'includes/navbar.php';
include 'includes/security.php';
?>

<?php

if (isset($_POST['editBtn'])) {
    $id = $_POST["edit_id"];
    // This get for find the update row
    $_SESSION['id'] = $id;

    $sql = "SELECT * FROM admin WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    foreach ($result as $row) {
        ?>


<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Edit Admin Profile</h6>
    </div>

    <div class="card-body">

    <form action="submitForm.php" method="post" class="row g-3">
      <div class="col-6">
    <label for="inputAddress" class="form-label">First Name</label>
    <input type="text" value="<?php echo $row['fname']; ?>"
     name="edit_fname" class="form-control mb-3" id="inputAddress" required>
  </div>
  <div class="col-6">
    <label for="inputAddress2" class="form-label">Last Name</label>
    <input type="text" value="<?php echo $row['lname']; ?>"
     name="edit_lname" class="form-control mb-3" id="inputAddress2" required>
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" value="<?php echo $row['email']; ?>"
     name="edit_email" class="form-control mb-3" id="inputEmail4" required>
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Password</label>
    <input type="text" value="<?php echo $row['password']; ?>"
     name="edit_pass" class="form-control mb-3" id="inputPassword4" required>
  </div>

  <div class="col-auto">
    <label class="visually-hidden" for="autoSizingInputGroup">Username</label>
    <div class="input-group">
      <div class="input-group-text">@</div>
      <input type="text" value="<?php echo $row['username']; ?>"
       name="edit_username" class="form-control" id="autoSizingInputGroup" placeholder="Username" required>
    </div>
  </div>
  <div class="col-12">
  <div class="modal-footer">
    <a href="register.php">
    <button type="button" class="btn btn-secondary">Close</button>
    </a>

    <button type="submit" id="liveToastBtn" name="updatebtn" class="btn btn-primary">Update</button>
  </div>
  </div>
</form>
<?php
}

}
mysqli_close($conn);
?>



      </div>
    </div>
  </div>
<?php
include 'includes/footer.php';
?>