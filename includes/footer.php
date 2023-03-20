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
 <!-- Footer  -->
 <footer
      class="mt-5 py-5"
      data-aos="fade-up"
      data-aos-offset="200"
      data-aos-duration="1000"
      data-aos-easing="ease-in-out"
    >
    <div class="container-fluid p-2 ">
    <div class="container mb-1 mt-1 ">
      <!--Second row-->
      <div class="row">
        <!--First column-->
        <div class="col-xl-4 col-lg-4 pt-1 pb-1">
          <!--About-->
          <h5 class="text-uppercase mb-3 font-weight-bold">ABOUT EDULINKUP</h5>
          <p align="justify">We're a team of passionate professionals committed to empowering students through our
            online IT courses. Our mission is to provide high-quality, accessible education and training to
            individuals around the world, regardless of their location or background.</p>
          <!--About-->
          <div class="footer-socials mt-4">
            <!--Facebook-->
            <a type="button" class="btn-floating btn-blue-2 ">
              <i class="fab fa-facebook-f"></i>
            </a>
            <!--Dribbble-->
            <a type="button" class="btn-floating btn-blue-2 ">
              <i class="fab fa-dribbble"></i>
            </a>

          </div>
        </div>
        <!--First column-->
        <hr class="w-100 clearfix d-lg-none">
        <!--Second column-->
        <div class="col-xl-3 ml-lg-auto col-lg-4 col-md-6 mt-1 mb-1">

          <p>
            <i class="fas fa-envelope pr-1"></i> edulinkup@gmail.com
          </p>
          <p>
            <i class="fas fa-phone pr-1"></i> + 94 713531809
          </p>
          <p>
            <i class="fas fa-print pr-1"></i> + 94 718908549
          </p>
        </div>
        <!--Second column-->
        <hr class="w-100 clearfix d-md-none">
        <!--Third column-->
        <div class="col-xl-3 ml-lg-auto col-lg-4 col-md-6 mt-1 mb-1">
          <!--Contact-->
          <h5 class="text-uppercase mb-3 font-weight-bold">Recent news</h5>
          <ul class="footer-posts list-unstyled">
            <li>
              <a>We Are Hiring New Teachers.</a>
              <span>
                <p class="grey-text">28 january 2023</p>
              </span>
            </li>
            <li>
              <a>New Classes and Lecture Materials are updated.</a>
              <span>
                <p class="grey-text">27 feb 2023</p>
              </span>
            </li>
          </ul>
        </div>
        <!--Third column-->
      </div>
      <!--Second row-->
    </div>
  </div>
  <!--Footer Links-->

  <!--Copyright-->
  <div class="footer-copyright py-3 text-center">
    <div class="container-fluid">
    <span>Copyright &copy; EDULINKUP 2023</span>
    </div>
  </div>
    </footer>

    <!-- JavaScript Libraries -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>

    <!-- Template Javascript -->
    <script src="JS/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <?php
mysqli_close($conn);
include 'includes/script.php';
?>
  </body>
</html>

