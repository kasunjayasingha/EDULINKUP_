<?php
include 'includes/security.php';
include 'includes/header.php';
include 'includes/navbar.php';
include 'includes/connection.php';
?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a
          href="reports.php"
          class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
          ><i class="fas fa-download fa-sm text-white-50"></i> Generate
          Report</a
        >
      </div>

      <!-- Content Row -->
      <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div
                    class="text-xs font-weight-bold text-primary text-uppercase mb-1"
                  >
                    Total Registered Admins
                  </div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">
                  <?php
$sql = "SELECT id FROM admin ORDER BY id";
$result = mysqli_query($conn, $sql);
$queryResults = mysqli_num_rows($result);
echo '<h1>' . $queryResults . '</h1>';

?>
                  </div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div
                    class="text-xs font-weight-bold text-success text-uppercase mb-1"
                  >
                  Revenue
                  </div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">
                  <?php
$sql = "SELECT amount FROM payment_histroy";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $total = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $total += $row['amount'];
    }
    echo '<h1>' . 'Rs.' . $total . '</h1>';
}

?>
                  </div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div
                    class="text-xs font-weight-bold text-info text-uppercase mb-1"
                  >
                  Total Registered Teachers
                  </div>
                  <div class="row no-gutters align-items-center">
                    <div class="col-auto">
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                        <?php
$sql = "SELECT tid FROM teacher ORDER BY tid";
$result = mysqli_query($conn, $sql);
$queryResults = mysqli_num_rows($result);
echo '<h1>' . $queryResults . '</h1>';
?>
                      </div>
                    </div>
                    <!-- <div class="col">
                      <div class="progress progress-sm mr-2">
                        <div
                          class="progress-bar bg-info"
                          role="progressbar"
                          style="width: 50%"
                          aria-valuenow="50"
                          aria-valuemin="0"
                          aria-valuemax="100"
                        ></div>
                      </div>
                    </div> -->
                  </div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div
                    class="text-xs font-weight-bold text-warning text-uppercase mb-1"
                  >
                  Total Registered Students
                  </div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">
                  <?php
$sql = "SELECT sid FROM student ORDER BY sid";
$result = mysqli_query($conn, $sql);
$queryResults = mysqli_num_rows($result);
echo '<h1>' . $queryResults . '</h1>';
?>
                  </div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-comments fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Content Row -->


    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- End of Main Content -->

<?php
include 'includes/footer.php';
?>
