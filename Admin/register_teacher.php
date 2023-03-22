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
        <h2 class="modal-title fs-5 text-center" id="exampleModalLabel">Teacher Registration Form</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <form action="submitForm.php" enctype="multipart/form-data" method="post" class="row g-3">
      <div class="col-6">
    <label for="inputFirstname" class="form-label">First Name</label>
    <input type="text" name="ufname" class="form-control mb-3" id="inputFirstname" required>
  </div>
  <div class="col-6">
    <label for="inputLastName" class="form-label">Last Name</label>
    <input type="text" name="ulname" class="form-control mb-3" id="inputLastName" required>
  </div>
  <div class="col-md-6">
    <label for="inputEmail" class="form-label">Email</label>
    <input type="email" name="uemail" class="form-control mb-3" id="inputEmail" required>
  </div>
  <div class="col-6">
    <label for="inputTel" class="form-label">Telephone</label>
    <input type="text" name="utel" class="form-control mb-3" id="inputTel" required>
  </div>
  <div class="col-6">
    <label for="inputWhatsapp" class="form-label">WhatsApp</label>
    <input type="text" name="uwhatsapp" class="form-control mb-3" id="inputWhatsapp" required>
  </div>
  <div class="col-6">
    <label for="addressID" class="form-label">Address</label>
    <textarea class="form-control mb-3" name="uadd" aria-label="With textarea" id="addressID"></textarea>
  </div>

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

  <div class="col-6">
    <label class="visually-hidden" for="autoSizingInputGroup">Username</label>
    <div class="input-group">
      <div class="input-group-text">@</div>
      <input type="text" name="uusername" class="form-control" id="autoSizingInputGroup" placeholder="Username" required>
    </div>
  </div>
  <div class="col-6">
    <label for="inputPassword4" class="form-label">Password</label>
    <input type="password" name="upass" class="form-control mb-3" id="inputPassword4" required>
  </div>
  <div class="col-6">
    <label for="inputAddress2" class="form-label">Insert Photo</label>
    <input type="file" name="uphoto" class="form-control mb-3" id="inputAddress" required>
  </div>
  <div class="col-6">
    <label for="inputqulification" class="form-label">Qualification</label>
    <input type="text" name="uquali" class="form-control mb-3" id="inputqulification" placeholder="eg: BSc, MSc, BEdu,.." required>
  </div>
  <div class="col-12">
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="submit" id="liveToastBtn" name="teacherRegbtn" class="btn btn-primary">Register</button>
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
      <h6 class="m-0 font-weight-bold text-primary">Teacher Profile
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addadminprofile">
          Add Teacher
        </button>
      </h6>
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
                <td><?php echo $row['tid']; ?></td>
                <td><?php echo $row['fname']; ?></td>
                <td><?php echo $row['lname']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['grade']; ?></td>
                <td><?php echo $row['reg_date']; ?></td>

                <td>
                  <form action="teacherEdit.php" method="post">
                    <input type="hidden" name="edit_id" value="<?php echo $row['tid']; ?>">
                    <button type="submit" name="editTeacherBtn" class="btn btn-success">EDIT</button></td>
                  </form>
                <td>
                  <form action="submitForm.php" method="post">
                    <input type="hidden" name="delete_id" value="<?php echo $row['tid']; ?>" id="">
                    <input type="hidden" name="delete_grade" value="<?php echo $row['grade']; ?>" id="">
                    <input type="hidden" name="delete_file" value="<?php echo $row['profile_photo']; ?>">
                    <button type="submit" name="deleteTeacherBtn"  class="btn btn-danger">DELETE</button>
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