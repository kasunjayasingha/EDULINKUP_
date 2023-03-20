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
    <title>Upload Student Result</title>

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

    <!-- Main Start -->
    <div class="container-fluid">
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link " href="teacher.php" aria-current="page">Upload Material</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#">Student Marks</a>
        </li>
      </ul>

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">

        </div>

        <div class="card-body">
        <div class="table-responsive">
        <?php
$sql = "SELECT * FROM marks WHERE grade = '$_SESSION[grade]'";
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
              <th>Marks</th>
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
                <td><?php echo $row['marks']; ?></td>

                <td>
                  <form action="studentMarksEdit.php" method="post">
                  <input type="hidden" name="edit_id" value="<?php echo $row['sid']; ?>">
                    <button type="submit" name="editMarksBtn" class="btn btn-success">EDIT</button></td>
                  </form>
                <td>
                  <form action="code.php" method="post">
                    <input type="hidden" name="delete_id" value="<?php echo $row['sid']; ?>" id="">
                    <button type="submit" name="deletemarksBtn"  class="btn btn-danger">DELETE</button>
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
    </div>

 <!-- Logout Modal-->
 <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form action="code.php" method="post">
                        <button type="submit" name="logoutBtn" class="btn btn-primary">Logout</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- Main end -->



    <?php

include 'includes/footer.php';
include 'includes/script.php';
?>
  </body>
</html>
