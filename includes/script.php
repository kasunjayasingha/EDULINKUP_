
<!-- Bootstrap core JavaScript-->
<script src="EduLinkup--admin/vendor/jquery/jquery.min.js"></script>
    <script src="EduLinkup--admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="EduLinkup--admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="EduLinkup--admin/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="EduLinkup--admin/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="EduLinkup--admin/js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

    <script src="EduLinkup--admin/https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script src="JS/sweetalert.min.js"></script>

    <?php
if (isset($_SESSION['statusDash']) && $_SESSION['statusDash'] != '') {
    ?>

    <script>

      swal({

        title: "<?php echo $_SESSION['statusDash']; ?>",
        // text: "You clicked the button!",
        icon: "<?php echo $_SESSION['status_codeDash']; ?>",
        button: "Ok",
      });
    </script>
    <?php
}
unset($_SESSION['statusDash']);
unset($_SESSION['status_codeDash']);

?>

