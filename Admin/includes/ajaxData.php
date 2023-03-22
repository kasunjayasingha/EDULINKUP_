<?php
include 'includes/connection.php';
?>
<?php
if (isset($_POST['request'])) {
    $request = $_POST['request'];

    $sql = "SELECT * FROM payment_histroy WHERE full_name = '$request'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    ?>

<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <?php
if ($count > 0) {
        ?>
          <thead>
            <tr>
              <th>Id</th>
              <th>Full Name</th>
              <th>Payment Month</th>
              <th>Payment Year</th>
              <th>Payment Amount</th>
            </tr>

<?php
} else {
        echo "No Record Found";
    }
    ?>
          </thead>
          <tbody>
            <?php

    while ($row = mysqli_fetch_assoc($result)) {
        ?>
              <tr>
                <td><?php echo $row['sid']; ?></td>
                <td><?php echo $row['full_name']; ?></td>
                <td><?php echo $row['payment_month']; ?></td>
                <td><?php echo $row['payment_year']; ?></td>
                <td><?php echo $row['amount']; ?></td>



              </tr>
            <?php

    }

    ?>

          </tbody>
        </table>
<?php
}
?>