<!DOCTYPE html>
<html lang="en">
<?php
include "header.php";
session_start();
include "db.php";
?>

<body>
  <nav class="navbar navbar-expand-sm bg-dark sticky-top">
    <a class="navbar-brand text-warning" href="#">Sai Grocery Store</a>
  </nav>
  <section>
    <div class="mx-auto p-3 border border-primary rounded" style="width: 600px; margin-top: 5%;">
      <form action="function_db.php" method="POST">
        <h2 class="text-center text-primary py-3">Forget Password</h2>
        <?php if (isset($_GET["msg"])) { ?>
          <div class="text-danger text-center mb-2"><?php echo $_GET["msg"]; ?></div>
        <?php } ?>
        <div class="form-group row">
          <label for="fmail" class="col-sm-2 col-form-label">New Password</label>
          <div class="col-sm-10">
            <input type="password" name="f_pass" class="form-control" id="fmail" placeholder="Password" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="fcmail" class="col-sm-2 col-form-label">Confirm Password</label>
          <div class="col-sm-10">
            <input type="password" name="fc_pass" class="form-control" id="fcmail" placeholder="Password" required>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-10 offset-sm-2">
            <button type="submit" name="fp_sub" class="btn-block btn btn-primary">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </section>
  <div class="fixed-bottom footer-copyright bg-dark text-white text-center py-3">Copyright © 2020 Reserved by Sai Grocery Store</div>
</body>

</html>