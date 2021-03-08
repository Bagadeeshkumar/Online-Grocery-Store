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

<body>
    <?php include "nav_ad.php"; ?>

    <!--items-->

    <!--vegetables-->
    <div class="container-fluid bg-info text-white text-center">
        <h1 id="item1">Vegetables</h1>
        <?php
        if (isset($_GET["msg"])) {
            echo '<div>' . $_GET["msg"] . '</div>';
        }
        ?>
        <div class="row justify-content-center">
            <?php
            $veg = mysqli_query($conn, "SELECT * FROM product WHERE p_category = 'Vegetables'");
            while ($row1 = mysqli_fetch_assoc($veg)) {
                echo '
                    <div class="col-md-3 space p-3 border rounded border-white">
                        <h4>' . $row1["p_name"] . '</h4>
                        <img class="rounded item-img" src="images/Vegetables/' . $row1["p_img"] . '" alt="">
                        <p>' . $row1["p_qty"] . ' ' . $row1["p_measure"] . '  = ₹' . $row1["p_price"] . '</p> 
                        <p>Availability: ' . $row1["available"] . ' ' . $row1["p_measure"] . '</p>   
                        <a href="edit_product.php?id=' . $row1['p_id'] . '" class="px-3 btn btn-outline-light">Edit</a>
                        <a href="function_db.php?d_id=' . $row1['p_id'] . '" class="px-3 btn btn-outline-light">Delete</a>
                    </div>';
            }
            ?>
        </div>
    </div>

    <!--drinks-->

    <div class="container-fluid bg-success text-white text-center">
        <h1 id="item2">Drinks</h1>
        <div class="row justify-content-center">
            <?php
            $drink = mysqli_query($conn, "SELECT * FROM product WHERE p_category = 'Drinks'");
            while ($row2 = mysqli_fetch_assoc($drink)) {
                echo '
                        <div class="col-md-3 space p-3 border rounded border-white">
                            <h4>' . $row2["p_name"] . '</h4>
                            <img class="rounded item-img" src="images/Drinks/' . $row2["p_img"] . '" alt="">
                            <p>' . $row2["p_qty"] . ' ' . $row2["p_measure"] . '  = ₹' . $row2["p_price"] . '</p>
                            <p>Availability: ' . $row2["available"] . ' ' . $row2["p_measure"] . '</p>    
                            <a href="edit_product.php?id=' . $row2['p_id'] . '" class="px-3 btn btn-outline-light">Edit</a>
                            <a href="function_db.php?d_id=' . $row2['p_id'] . '" class="px-3 btn btn-outline-light">Delete</a>
                        </div>';
            }
            ?>
        </div>
    </div>

    <!--Fruits-->

    <div class="container-fluid bg-danger text-white text-center">
        <h1 id="item3">Fruits</h1>
        <div class="row justify-content-center">

            <?php
            $fruit = mysqli_query($conn, "SELECT * FROM product WHERE p_category = 'Fruits'");
            while ($row3 = mysqli_fetch_assoc($fruit)) {
                echo '
                        <div class="col-md-3 space p-3 border rounded border-white">
                            <h4>' . $row3["p_name"] . '</h4>
                            <img class="rounded item-img" src="images/Fruits/' . $row3["p_img"] . '" alt="">
                            <p>' . $row3["p_qty"] . ' ' . $row3["p_measure"] . '  = ₹' . $row3["p_price"] . '</p>    
                            <p>Availability: ' . $row3["available"] . ' ' . $row3["p_measure"] . '</p>
                            <a href="edit_product.php?id=' . $row3['p_id'] . '" class="px-3 btn btn-outline-light">Edit</a>
                            <a href="function_db.php?d_id=' . $row3['p_id'] . '" class="px-3 btn btn-outline-light">Delete</a>
                        </div>';
            }
            ?>

        </div>
    </div>

    <!--oils-->

    <div class="container-fluid bg-primary text-white text-center">
        <h1 id="item4" class="text-center">Oils</h1>
        <div class="row justify-content-center">
            <?php
            $oil = mysqli_query($conn, "SELECT * FROM product WHERE p_category = 'Oils'");
            while ($row4 = mysqli_fetch_assoc($oil)) {
                echo '
                    <div class="col-md-3 space p-3 border rounded border-white">
                        <h4>' . $row4["p_name"] . '</h4>
                        <img class="rounded item-img" src="images/Oils/' . $row4["p_img"] . '" alt="">
                        <p>' . $row4["p_qty"] . ' ' . $row4["p_measure"] . '  = ₹' . $row4["p_price"] . '</p>  
                        <p>Availability: ' . $row4["available"] . ' ' . $row4["p_measure"] . '</p>  
                        <a href="edit_product.php?id=' . $row4['p_id'] . '" class="px-3 btn btn-outline-light">Edit</a>
                        <a href="function_db.php?d_id=' . $row4['p_id'] . '" class="px-3 btn btn-outline-light">Delete</a>
                    </div>';
            }
            ?>
        </div>
    </div>


    <?php
    if (isset($_GET['id'])) {
        $edit_id = $_GET["id"];
        $edit_sql = mysqli_query($conn, "SELECT * FROM product WHERE p_id = '$edit_id'");
        $row9 = mysqli_fetch_assoc($edit_sql);
        echo '
                <script>
                    $(document).ready(function(){
                        $("#m5").modal(); 
                    });
                </script>
            ';
        // <!-- edit product modal -->
        echo '
    <div id="m5" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Edit Product</h3>
                    <a href="edit_product.php" type="button" class="close">
                        <span aria-hidden="true">&times;</span>
                    </a>
                </div>
                <div class="modal-body">
                    <form action="function_db.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="pename" class="col-sm-4 col-form-label">Product Name</label>
                            <div class="col-sm-8">
                                <input type="text" name="pename" class="form-control" value="' . $row9["p_name"] . '" id="pename" placeholder="Product Name" required>
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <label for="peprice" class="col-sm-4 col-form-label">Product Price</label>
                            <div class="col-sm-8">
                                <input type="text" name="peprice" class="form-control" value="' . $row9["p_price"] . '" id="peprice" placeholder="Product Price" required>
                            </div>
                        </div>           
                        <div class="form-group row">
                            <label for="peavail" class="col-sm-4 col-form-label">Product Availability</label>
                            <div class="col-sm-8">
                                <input type="text" name="eavail" class="form-control" value="' . $row9["available"] . '" id="peavail" placeholder="availability in kg/L/bottle/tin" required>
                            </div>
                        </div>  
                        <div class="modal-footer justify-content-center">
                            <button type="submit" name="edit" class="btn btn-success">Update Product</button>
                            <a href="edit_product.php" class="btn btn-danger">Cancel</a>
                        </div>           
                    </form>
                </div>
            </div>
        </div>
    </div>';
        $_SESSION["edit_id"] = $row9["p_id"];
    }

    ?>
</body>

</html>