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
<!-- for all ajax request -->
<script>
    $(function() {
        items();
        loadCart();
    });

    function items() {
        $.ajax({
            url: "function_db.php",
            data: {
                display_item: "true"
            },
            type: "POST",
            success: function(data) {
                $("#item").html(data);
            }
        });
    }

    function search(data) {
        $.ajax({
            url: "function_db.php",
            type: "POST",
            data: data,
            success: function(data) {
                $("#main")
                    .html(data)
                    .addClass("main");
                $("#drop").hide();
            }
        });
        sessionStorage.setItem('search', data);
    }

    function loadCart() {
        $.ajax({
            url: "function_db.php",
            data: {
                display: "true"
            },
            type: "POST",
            success: function(data) {
                $("#display-cart").html(data);
            }
        });
    }

    function addToCart(id) {
        $.ajax({
            url: "function_db.php",
            data: {
                cart_id: id
            },
            type: "POST",
            success: function() {
                items();
                loadCart();
                $("#msg").text("");
            }
        });
    }

    function addToCarts(id) {
        $.ajax({
            url: "function_db.php",
            data: {
                cart_id: id
            },
            type: "POST",
            success: function() {
                if (!(sessionStorage.getItem('search') === null)) {
                    let data = sessionStorage.getItem('search');
                    search(data);
                }
                items();
                loadCart();
                $("#msg").text("");
            }
        });
    }

    function plus(id) {
        $.ajax({
            url: "function_db.php",
            data: {
                plus_id: id
            },
            type: "POST",
            success: function(data) {
                loadCart();
                $("#msg").text(data);
            }
        });
    }

    function minus(id) {
        $.ajax({
            url: "function_db.php",
            data: {
                min_id: id
            },
            type: "POST",
            success: function(data) {
                loadCart();
                $("#msg").text(data);
            }
        });
    }

    function clearAll() {
        if (confirm("Remove all items from cart!")) {
            $.ajax({
                url: "function_db.php",
                data: {
                    action: "del"
                },
                type: "POST",
                success: function(data) {
                    if (!(sessionStorage.getItem('search') === null)) {
                        let data = sessionStorage.getItem('search');
                        search(data);
                    }
                    items();
                    loadCart();
                    $("#msg").text("All items removed!");
                }
            });
        }
    }

    function removeItem(id) {
        if (confirm("Remove this item from cart!")) {
            $.ajax({
                url: "function_db.php",
                data: {
                    action: "delete",
                    id: id
                },
                type: "POST",
                success: function(data) {
                    if (!(sessionStorage.getItem('search') === null)) {
                        let data = sessionStorage.getItem('search');
                        search(data);
                    }
                    items();
                    loadCart();
                    $("#msg").text(data);
                }
            });
        }
    }

    function addToDb() {
        $.ajax({
            url: "function_db.php",
            type: "POST",
            data: {
                store: "true"
            }
        });
    }

    function checkout() {
        if (confirm("All items in the cart are going to order!")) {
            $.ajax({
                url: "function_db.php",
                data: {
                    checkout: "true"
                },
                type: "POST",
                success: function(data) {
                    items();
                    addToDb();
                    $("#msg").text("Items ordered successfully!");
                    $.ajax({
                        url: "function_db.php",
                        data: {
                            action: "del"
                        },
                        type: "POST",
                        success: function(data) {
                            items();
                            loadCart();
                        }
                    });
                }
            });
        }
    }

    function hideButton() {
        $("#carthide").hide();
    }

    function showButton() {
        $("#carthide").show();
    }

    function remove() {
        sessionStorage.removeItem('search');
    }
</script>

<body onload="remove()">
    <?php include "nav_u.php"; ?>

    <!--body images-->
    <main id="main">
        <div class="mx-auto">
            <div id="items" class="carousel slide carousel-fade" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-slide-to="0" class="active"></li>
                    <li data-slide-to="1"></li>
                    <li data-slide-to="2"></li>
                    <li data-slide-to="3"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <a href="user_home.php#Vegetables"><img id="veg" class="img w-100" src="images/Vegetables/full_veg.jpg" alt="First slide"></a>
                        <div class="carousel-caption d-none d-md-block">
                            <h3>Fresh vegetables</h3>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <a href="user_home.php#Drinks"><img class="img w-100" src="images\Drinks\full_image.jpg" alt="Second slide"></a>
                        <div class="carousel-caption d-none d-md-block">
                            <h3>Energy Drinks</h3>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <a href="user_home.php#Fruits"><img class="img w-100" src="images\Fruits\full_fruit.jpg" alt="Third slide"></a>
                        <div class="carousel-caption d-none d-md-block">
                            <h3>Sweet Fruits</h3>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <a href="user_home.php#Oils"><img class="img w-100" src="images\Oils\full_oil.jpg" alt="fourth slide"></a>
                        <div class="carousel-caption d-none d-md-block">
                            <h3>Pure Oils</h3>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#items" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#items" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <!--items-->
        <div id="item" class="text-white">

        </div>
    </main>
    <!--about us-->

    <div id="about" class="bg-success text-white space-a">
        <h1 class="text-center">About us</h1>
        <div class="row space text-white">
            <div class="card col-md-4  ">
                <div class="card-header text-center bg-warning">Started</div>
                <div class="card-body bg-danger">
                    <ul>
                        <li>Since 1994.</li>
                        <li>Second branched started at 2000.</li>
                        <li>At present totally 5 in all over TamilNadu.</li>
                    </ul>
                </div>
            </div>

            <div class="card col-md-4">
                <div class="card-header text-center bg-warning">Terms & Conditions</div>
                <div class="card-body bg-danger">
                    <ul>
                        <li>Cash on delivery is available.</li>
                        <li>The things are not taken back.</li>
                    </ul>
                </div>
            </div>

            <div class="card col-md-4">
                <div class="card-header text-center bg-warning">Delivery</div>
                <div class="card-body bg-danger">
                    <ul>
                        <li>If you are in the same district the order is reached you within 24 hours.</li>
                        <li>If you are near districts definitly it will reaches you within 2 days.</li>
                        <li>Atmost within 5 days wherever you are in TamilNadu the order reached you.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!--contact-->

    <div id="con" class="bg-secondary text-white">
        <h1 class="text-center">Contact</h1>
        <div class="row  m-4">
            <div class="col-md-5">
                Call us : +91 98345 98234
                <div>Telephone: 04549 267356</div>
            </div>
            <div class="col-md-4">
                <i class="fa fa-telegram fa-3x mr-4" aria-hidden="true"></i>
                <i class="fa fa-facebook-official fa-3x mr-4" aria-hidden="true"></i>
                <i class="fa fa-instagram fa-3x mr-4" aria-hidden="true"></i>
                <i class="fa fa-twitter fa-3x" aria-hidden="true"></i>
            </div>
            <div class="">Email : sai23@gmail.com</div>
        </div>
        <div id="foot" class="footer-copyright bg-dark text-white text-center py-3">Copyright © 2020 Reserved by Sai Grocery Store</div>
    </div>

    <!--cart modal-->

    <div id="m3" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Ordered Items</h3>

                    <div id="msg" class="text-danger mx-auto"></div>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body" id="display-cart">

                </div>

                <div id="carthide" class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-secondary" onclick="checkout()">Buy</button>
                    <button onclick="clearAll()" class="btn btn-secondary">Remove All</button>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    $(function() {
        $("#form").on("submit", function(e) {
            let data = $(this).serialize();
            search(data);
            e.preventDefault();
        });
    });
</script>

</html>