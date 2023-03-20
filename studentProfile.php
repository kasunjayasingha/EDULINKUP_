
<?php
session_start();

if (!$_SESSION['usernamestudent']) {
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
    <title><?php echo $_SESSION['fname'] . " "; ?> Profile</title>

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
     <!-- MDB icon -->
  <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
  <!-- MDB -->
  <link rel="stylesheet" href="CSS/bootstrap-profiles.min.css" />

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
    <div class="container-fluid p-0 mb-2">
      <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0 px-lg-5 shadow-sm">
        <div class="collapse navbar-collapse justify-content-between px-lg-3">
          <a href="index.html" class="navbar-brand ml-lg-3">
            <h1 class="m-0 text-uppercase text-primary">
              <i class="fa fa-book-reader mr-3 py-3"></i>EduLinkup
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
      style="margin-bottom: 90px"
    >
      <div class="container text-center my-5 py-5">
        <h1 class="text-white mt-4 mb-4">Student Dashboard</h1>
        <h1 class="text-white display-1 mb-5"><?php echo $_SESSION['fname'] . " " . $_SESSION['lname'] ?></h1>
      </div>
    </div>
    <!-- Header End -->

    <!-- Main Start -->
    <div class="container-fluid">
      <ul class="nav nav-tabs">
      <li class="nav-item">
          <a class="nav-link" href="student.php" aria-current="page">Materials</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="studentMarksShow.php">Marks</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="studentProfile.php">Your Profile</a>
        </li>
      </ul>

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">

        </div>

        <div class="card-body">
        <div class="table-responsive">
        <!-- Materials Start -->
    <!-- Start your project here-->
  <section style="background-color: #eee;">
    <div class="container py-5">

      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body text-center">
              <img src="Imgs/userProfile.png" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
              <h5 class="my-3"><?php echo $_SESSION['fname'] . " " . $_SESSION['lname']; ?></h5>
              <p class="text-muted mb-4"><?php echo $_SESSION['grade']; ?></p>
              <div class="d-flex justify-content-center mb-2">
                <button type="button" class="btn btn-outline-primary ms-1">Edit</button>
              </div>
            </div>
          </div>


          <div class="card mb-4 mb-lg-0">

            <div class="card-body text-center">
            <h3 class="my-3">Your Class Teacher</h3>
            <?php
$grade = $_SESSION['grade'];
$select_query = "SELECT * FROM teacher where grade = '$grade' ORDER BY RAND()";
$result_query = mysqli_query($conn, $select_query);

while ($row = mysqli_fetch_assoc($result_query)) {

    $fname = $row['fname'];
    $lname = $row['lname'];
    $profile_photo = $row['profile_photo'];
    $space = " ";

    echo "
    <div class='team-item gap-md-5'>
      <div class='d-flex'>

        <img
          class='img-fluid rounded w-100'
          src='Admin/img/materails/$profile_photo'
          alt='$profile_photo'
        />
      </div>
      <div class='px-4 py-3'>
        <h5 class='fw-bold m-0'>$fname $space $lname </h5>
      </div>
    </div>";
}
?>


            </div>
          </div>


        </div>
        <div class="col-lg-8">
          <div class="card mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Full Name</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?php echo $_SESSION['fname'] . " " . $_SESSION['lname']; ?></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Email</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?php echo $_SESSION['email']; ?></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Phone</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?php echo $_SESSION['tel']; ?></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Address</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?php echo $_SESSION['address']; ?></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Username</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?php echo $_SESSION['usernamestudent']; ?></p>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
  <!-- End your project here-->



      </div>
    </div>
  </div>
    </div>
    <!-- Materials End -->


<!-- MDB -->
<script type="text/javascript" src="JS/mdb.min.js"></script>

    <?php

include 'includes/footer.php';
include 'includes/script.php';
?>
  </body>
</html>
