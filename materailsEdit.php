<?php
session_start();
if (!$_SESSION['usernameteacher']) {
    header("Location: index.php");
}

include 'includes/connection.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Teacher Dashboard</title>

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;800&display=swap"
      rel="stylesheet"
    />

    <!-- CSS only -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
      crossorigin="anonymous"
    />

    <!-- Fonts-awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
      integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="CSS/style.css" />
    <link rel="stylesheet" href="CSS/normalize.css" />
  </head>
  <body>
    <!-- Topbar Start -->
    <div class="container-fluid bg-dark">
      <div class="row py-2 px-lg-5">
        <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
          <div class="d-inline-flex align-items-center text-white">
            <small><i class="fa fa-phone-alt mr-2"></i>+012 345 6789</small>
            <small class="px-3">|</small>
            <small><i class="fa fa-envelope mr-2"></i>info@example.com</small>
          </div>
        </div>
        <div class="col-lg-6 text-center text-lg-right">
          <div class="d-inline-flex align-items-center">
            <a class="text-white px-2" href="">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a class="text-white pl-2" href="">
              <i class="fab fa-youtube"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <div class="container-fluid ">
      <nav class="navbar navbar-expand-lg bg-white navbar-light   shadow-sm">
        <div class="justify-content-between collapse navbar-collapse justify-content-between px-lg-3">
          <a href="index.html" class="navbar-brand ">
            <h1 class="m-0 text-uppercase text-primary">
              <i class="fa fa-book-reader mr-3"></i>EduLinkup
            </h1>
          </a>
          <button type="button" class="btn btn-primary px-4 d-none d-lg-block" data-bs-toggle="modal" data-bs-target="#logoutModal">Logout</button>
        </div>
      </nav>
    </div>
    <!-- Navbar End -->

    <!-- Header Start -->
    <div
      class="jumbotron jumbotron-fluid position-relative overlay-bottom"
      style="margin-bottom: 10px"
    >
      <div class="container text-center my-5 py-5">
        <h1 class="text-white mt-4 mb-4">Teacher Dashboard</h1>
        <h1 class="text-white display-1 mb-5"><?php echo $_SESSION['fname'] . " " . $_SESSION['lname'] ?></h1>
      </div>
    </div>
    <!-- Header End -->

    <div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Materails Edit</h6>

    <?php
if (isset($_POST['editMatBtn'])) {
    $id = $_POST["edit_id"];

    $sql = "SELECT * FROM subject_materials WHERE mid = '$id'";
    $result = mysqli_query($conn, $sql);

    foreach ($result as $row) {
        ?>

      <form action="code.php" enctype="multipart/form-data" method="post" class="row g-3">
      <div class="col-6">
    <label for="inputAddress" class="form-label">Material Name</label>
    <input type="text" name="material" value="<?php echo $row['m_topic']; ?>" class="form-control mb-3" id="inputAddress" required>
  </div>
  <?php

    }
}
?>
<div class="col-6">
    <label for="inputAddress2" class="form-label">Grade</label>
    <input type="text" value="<?php echo $_SESSION['teacher_id']; ?>" name="teacher_id" class="form-control mb-3" id="inputAddress2" readonly>
  </div>
  <div class="col-6">
    <label for="inputAddress2" class="form-label">Grade</label>
    <input type="text" value="<?php echo $_SESSION['grade']; ?>" name="grade" class="form-control mb-3" id="inputAddress2" readonly>
  </div>
  <?php
if (isset($_POST['editMatBtn'])) {
    $id = $_POST["edit_id"];

    $sql = "SELECT * FROM subject_materials WHERE mid = '$id'";
    $result = mysqli_query($conn, $sql);

    foreach ($result as $row) {
        ?>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Upload File</label>
    <input type="file" name="uploadFile" class="form-control mb-3" id="inputEmail4" required>
    <?php
$_SESSION['file'] = $row['file_name'];
        $_SESSION['id'] = $row['mid'];

        ?>
  </div>

  <div class="col-12">
  <div class="modal-footer">
    <a href="teacher.php">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    </a>
    <button type="submit" id="liveToastBtn" name="updateMatbtn" class="btn btn-primary">Update</button>
  </div>
  </div>

</form>
<?php

    }
}
?>

    </div>

    <div class="card-body">


    </div>
  </div>
    <!-- Main end -->


    <?php

include 'includes/footer.php';
include 'includes/script.php';
?>
  </body>
</html>
