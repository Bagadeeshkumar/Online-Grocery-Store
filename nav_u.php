<nav class="navbar sticky-top navbar-expand-sm bg-dark">
    <a class="navbar-brand text-warning" href="user_home.php">Sai Grocery Store</a>
    <form id="form" class="form-inline">
        <input type="text" id="search" name="search" class="form-control mr-sm-2" placeholder="Search" required>
        <button type="submit" class="btn btn-outline-warning"><span class="fa fa-search"></span> Search</button>
    </form>
    <ul class="navbar-nav ml-auto">

        <li class="nav-item">
            <a class="nav-link text-warning" href="user_home.php"><i class="fa fa-home fa-x mr-1"></i>Home</a>
        </li>
        <li id="drop" class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle text-warning" data-toggle="dropdown">Items</a>
            <div class="dropdown-menu">
                <a href="user_home.php#Vegetables" class="dropdown-item">Vegetables</a>
                <a href="user_home.php#Drinks" class="dropdown-item">Drinks</a>
                <a href="user_home.php#Fruits" class="dropdown-item">Fruits</a>
                <a href="user_home.php#Oils" class="dropdown-item">Oils</a>
            </div>
        </li>
        <li class="nav-item cart">
            <a class="nav-link text-warning" href="#m3" data-backdrop="static" data-toggle="modal"><i class="fa fa-cart-plus fa-x mr-1"></i>Cart</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-warning" href="user_home.php#con"><i class="fa fa-address-book fa-x mr-1"></i>Contact</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-warning" href="user_home.php#about"><i class="fa fa-info-circle fa-x mr-1"></i>About us</a>
        </li>
        <li class="nav-item">
            <span class="nav-link text-warning dropdown" data-toggle="popover" data-placement="bottom" id="user" title="User profile"><i class="fa fa-user-circle fa-x mr-1"></i><?php echo $_SESSION["name"]; ?></span>
        </li>
    </ul>
</nav>