<?php
include 'includes/security.php';
include 'includes/header.php';
include 'includes/navbar.php';
include 'includes/connection.php';

?>

<?php

if (isset($_POST['editTeacherBtn'])) {
    $id = $_POST["edit_id"];
    // This get for find the update row
    $_SESSION['tid'] = $id;

    $sql = "SELECT * FROM teacher WHERE tid = '$id'";
    $result = mysqli_query($conn, $sql);

    foreach ($result as $row) {
        ?>

<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Teacher Profile Edit</h6>

      <form action="submitForm.php" enctype='multipart/form-data' method="post" class="row g-3">
      <div class="col-6">
    <label for="inputFirstname" class="form-label">First Name</label>
    <input type="text" name="ufname"  value="<?php echo $row['fname']; ?>"class="form-control mb-3" id="inputFirstname" required>
  </div>
  <div class="col-6">
    <label for="inputLastName" class="form-label">Last Name</label>
    <input type="text" name="ulname" value="<?php echo $row['lname']; ?>" class="form-control mb-3" id="inputLastName" required>
  </div>
  <div class="col-md-6">
    <label for="inputEmail" class="form-label">Email</label>
    <input type="email" name="uemail" value="<?php echo $row['email']; ?>" class="form-control mb-3" id="inputEmail" required>
  </div>
  <div class="col-6">
    <label for="inputTel" class="form-label">Telephone</label>
    <input type="text" name="utel" value="<?php echo $row['telephone']; ?>" class="form-control mb-3" id="inputTel" required>
  </div>
  <div class="col-6">
    <label for="inputWhatsapp" class="form-label">WhatsApp</label>
    <input type="text" name="uwhatsapp" value="<?php echo $row['whatsapp']; ?>" class="form-control mb-3" id="inputWhatsapp" required>
  </div>
  <div class="col-6">
    <label for="addressID" class="form-label">Address</label>
    <textarea class="form-control mb-3" name="uadd"  aria-label="With textarea" id="addressID" required><?php echo $row['address']; ?></textarea>
  </div>

  <?php

    }
}
?>

  <div class="col-6">
  <label for="flexRadioDefault1" class="form-label" >Gender</label>
    <div class="form-check ">
        <input class="form-check-input" type="radio" name="ugender" value="Male" id="flexRadioDefault1" >
        <label class="form-check-label" for="flexRadioDefault1">Male</label>
    </div>
    <div class="form-check mb-3">
        <input class="form-check-input" type="radio" name="ugender" value="Female" id="flexRadioDefault2" checked>
        <label class="form-check-label" for="flexRadioDefault2">Female</label>
    </div>
  </div>


  <div class="col-6">
  <label for="selectGrade" class="form-label">Grade</label>
  <br>
    <select class="form-select mb-3" name="ugrade" aria-label="Default select example" id="selectGrade" required>
        <option selected>Select Grade..</option>
        <?php
$select_query = "SELECT grade FROM grade";
$result_query = mysqli_query($conn, $select_query);

while ($row = mysqli_fetch_assoc($result_query)) {
    $grade = $row['grade'];
    echo "<option value='$grade'>$grade</option>";
}
?>
    </select>
  </div>
  <?php

if (isset($_POST['editTeacherBtn'])) {
    $id = $_POST["edit_id"];

    $sql = "SELECT * FROM teacher WHERE tid = '$id'";
    $result = mysqli_query($conn, $sql);

    foreach ($result as $row) {
        ?>

  <div class="col-6">
    <label class="visually-hidden" for="autoSizingInputGroup">Username</label>
    <div class="input-group">
      <div class="input-group-text">@</div>
      <input type="text" name="uusername" value="<?php echo $row['username']; ?>" class="form-control" id="autoSizingInputGroup" placeholder="Username" required>
    </div>
  </div>
  <div class="col-6">
    <label for="inputPassword4" class="form-label">Password</label>
    <input type="text" name="upass" value="<?php echo $row['password']; ?>" class="form-control mb-3" id="inputPassword4" required>
  </div>
  <?php
}
}
?>

    <?php
if (isset($_POST['editTeacherBtn'])) {
    $id = $_POST["edit_id"];

    $sql = "SELECT * FROM teacher WHERE tid = '$id'";
    $result = mysqli_query($conn, $sql);

    foreach ($result as $row) {
        ?>
  <div class="col-6">
    <label for="inputqulification" class="form-label">Qualification</label>
    <input type="text" name="uquali" value="<?php echo $row['qualification']; ?>" class="form-control mb-3" id="inputqulification" placeholder="eg: BSc, MSc, BEdu,.." required>
  </div>

  <div class="col-6">
    <label for="inputAddress2" class="form-label">Insert Photo</label>
    <input type="file" name="uploadFile" class="form-control mb-3" id="inputAddress" required>
  </div>

  <div class="col-12">
  <div class="modal-footer">
    <a href="register_teacher.php">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    </a>

    <button type="submit" id="liveToastBtn" name="teacherUpdatebtn" class="btn btn-primary">Update</button>
  </div>
  </div>


</form>
<?php
$_SESSION['Stid'] = $row['tid'];
        $_SESSION['fileName'] = $row['profile_photo'];
    }
}
?>

    </div>

    <div class="card-body">


    </div>
  </div>


<?php
mysqli_close($conn);
include 'includes/footer.php';
?>