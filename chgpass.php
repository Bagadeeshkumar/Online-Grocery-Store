<!DOCTYPE html>
<html lang="en">
<?php
include "header.php";
session_start();
include "db.php";
if (!isset($_SESSION["name"])) {
  header("Location:index.php");
}
$name = $_SESSION["name"];
$page = ($name == 'admin') ? "admin.php" : "user_home.php";
?>

<body>
  <nav class="navbar navbar-expand-sm bg-dark sticky-top">
    <a class="navbar-brand text-warning" href="#">Sai Grocery Store</a>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link text-warning" href="<?php echo $page; ?>"><i class="fa fa-home fa-x mr-1"></i>Home</a>
      </li>
    </ul>
  </nav>
  <section>
    <div class="mx-auto p-3 border border-primary rounded" style="width: 600px; margin-top: 5%;">
      <form action="function_db.php" method="POST">
        <div class="text-center py-1">
          <h2>Change Password</h2>
          <?php if (isset($_GET["success_chg"])) { ?>
            <span class="text-success mt-1"><?php echo $_GET["success_chg"]; ?></span>
          <?php } ?>
        </div>
        <div class="form-group row">
          <label for="inputPassword" class="col-sm-2 col-form-label">Current Password</label>
          <div class="col-sm-10">
            <input type="password" name="log_pass" class="form-control" id="inputPassword" placeholder="Password" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="chgPassword" class="col-sm-2 col-form-label">New Password</label>
          <div class="col-sm-10">
            <input type="password" name="chg_pass" class="form-control" id="chgPassword" placeholder="Password" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="chgcPassword" class="col-sm-2 col-form-label">Confirm Password</label>
          <div class="col-sm-10">
            <input type="password" name="chgc_pass" class="form-control" id="chgcPassword" placeholder="Password" required>
            <?php if (isset($_GET["error_chg"])) { ?>
              <span class="text-danger mt-1"><?php echo $_GET["error_chg"]; ?></span>
            <?php } ?>
          </div>
        </div>
        <div class="form-group row">
          <div class="d-flex justify-content-center col-sm-6 offset-sm-2">
            <button type="submit" name="chg_submit" class="btn-block btn btn-primary">Change</button>
            <a href="<?php echo $page; ?>" class="ml-2 btn btn-danger">Cancel</a>
          </div>
        </div>
      </form>
    </div>
  </section>
  <div class="fixed-bottom footer-copyright bg-dark text-white text-center py-3">Copyright © 2020 Reserved by Sai Matrimony</div>
</body>

</html>