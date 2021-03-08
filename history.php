<!DOCTYPE html>
<html lang="en">
<?php
include "header.php";
session_start();
include "db.php";
if (!isset($_SESSION["name"])) {
  header("Location:index.php");
}
?>
<script>
  $(function() {
    $("#drop").hide();
  });
</script>

<body>
  <?php include "nav_u.php"; ?>
  <div class="text-center container mt-5">
    <table class="table table-bordered table-hover text-center">
      <thead class="thead-dark">
        <tr>
          <th>Bill No</th>
          <th>Items</th>
          <th>Total Price</th>
          <th>Date</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $history = mysqli_query($conn, "SELECT * FROM history WHERE user_id = {$_SESSION['id']}");
        $count = mysqli_num_rows($history);
        if ($count > 0) {
          while ($row12 = mysqli_fetch_assoc($history)) {
            $pur_item = unserialize(base64_decode($row12["items"]));
            echo '
                  <tr>
                    <td> ' . $row12["bill_id"] . '</td>
                    <td>' . implode(", ", $pur_item) . '</td>
                    <td>' . $row12["total"] . '</td>
                    <td>' . $row12["date"] . '</td>
                  </tr>     
        ';
          }
        } else {
          echo '<tr>
                  <td colspan="4" class="text-danger h3">No Order Placed!</td>
                <tr>';
        }

        ?>
      </tbody>
    </table>
  </div>
  <div class="footer-copyright fixed-bottom bg-dark text-white text-center py-3">Copyright © 2020 Reserved by Sai Grocery Store</div>
</body>

</html>