<?php
session_start();
include 'includes/connection.php';
include 'includes/header.php';
?>


    <!-- Team Start -->
    <div class="container-xxl py-5">
      <div class="container px-lg-5">
        <div
          class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp"
          data-aos="fade-up"
          data-aos-offset="200"
          data-aos-duration="500"
          data-aos-easing="ease-in-out"
        >
          <h6 class="position-relative d-inline text-primary ps-4">
            Teacher Panel
          </h6>
          <h2 class="mt-2">Meet Our Teachers</h2>
        </div>
        <div class="row g-4  ">

        <?php
$select_query = "SELECT * FROM teacher ORDER BY RAND()";
$result_query = mysqli_query($conn, $select_query);

while ($row = mysqli_fetch_assoc($result_query)) {

    $fname = $row['fname'];
    $lname = $row['lname'];
    $grade = $row['grade'];
    $profile_photo = $row['profile_photo'];
    $space = " ";

    echo "<div
    class='col-lg-4 col-md-6'
    data-aos='fade-right'
    data-aos-offset='200'
    data-aos-duration='1000'
    data-aos-easing='ease-in-out'
  >
    <div class='team-item gap-md-5'>
      <div class='d-flex'>
        <div
          class='flex-shrink-0 d-flex flex-column align-items-center mt-4 pt-5'
          style='width: 75px'
        >
          <a class='btn btn-square text-primary bg-white my-1' href=''
            ><i class='fab fa-facebook-f'></i
          ></a>
          <a class='btn btn-square text-primary bg-white my-1' href=''
            ><i class='fab fa-twitter'></i
          ></a>
          <a class='btn btn-square text-primary bg-white my-1' href=''
            ><i class='fab fa-instagram'></i
          ></a>
          <a class='btn btn-square text-primary bg-white my-1' href=''
            ><i class='fab fa-linkedin-in'></i
          ></a>
        </div>
        <img
          class='img-fluid rounded w-100'
          src='Admin/img/materails/$profile_photo'
          alt='$profile_photo'
        />
      </div>
      <div class='px-4 py-3'>
        <h5 class='fw-bold m-0'>$fname $space $lname </h5>
        <small>$grade</small>
      </div>
    </div>
  </div>";
}
?>

        </div>
      </div>
    </div>



<?php

include 'includes/footer.php';
include 'includes/script.php';
?>