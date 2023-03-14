<?php session_start(); ?>
<nav class="navbar navbar-expand-lg navbar-dark border-bottom border-5 border-danger" style="background-color:black;">
    <div class="container-fluid ">

        <button class="navbar-toggler btn" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a href="../home/home.php" class="w-15">
            <img src="../assets/img/logo/logo horizontal sin fondo 2.png" class="w-100 d-none d-lg-flex">
            <img src="../assets/img/logo/logo horizontal sin fondo small icon 2.png" class="d-lg-none mobile-p">
        </a>

        <div class="collapse navbar-collapse order-1 order-lg-0" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 fs-4">
                <li class="nav-item ">
                    <a class="nav-link text-danger" href="../shop/shop.php">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-danger" href="../contact/contact.php">Contact us</a>
                </li>
                <?php if (!isset($_SESSION["userid"])) { ?>
                    <li class="nav-item d-lg-none">
                        <a class="nav-link text-danger" href="../singup/signup.php">Sign Up</a>
                    </li>
                    <li class="nav-item d-lg-none">
                        <a class="nav-link text-danger" href="../login/login.php">Login</a>
                    </li>
                <?php } else { ?>
                    <?php if ($_SESSION["userType"] == 2) { ?>

                        <li class="nav-item d-lg-none">
                            <a class="nav-link text-danger" href="../admin/admin.php?admin=users">Admin Users</a>
                        </li>
                        <li class="nav-item d-lg-none">
                            <a class="nav-link text-danger" href="../admin/admin.php?admin=products">Admin Products</a>
                        </li>

                    <?php } ?>
                    <li class="nav-item d-lg-none">
                        <a class="nav-link text-danger" href="../profile/profile.php">Profile</a>
                    </li>
                    <li class="nav-item d-lg-none">
                        <a class="nav-link text-danger" href="../home/logout.php">Log Out</a>
                    </li>
                <?php } ?>
            </ul>
            <!-- SIGN UP / LOG IN -->

            <?php if (!isset($_SESSION["userid"])) { ?>
                <div class="button-container me-2 d-none d-lg-block">
                    <a href="../singup/signup.php"><button class="btn  btn-outline-danger" type="button">Sign Up</button></a>
                    <a href="../login/login.php"><button class="btn btn-outline-danger" type="button">Log in</button></a>
                </div>

            <?php } else { ?>

                <div class="button-container me-2 d-none d-lg-block">
                    <div class="dropdown">
                        <button class="btn btn-outline-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person"></i>
                        </button>
                        <ul class="dropdown-menu border-danger " aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item " href="../profile/profile.php">Perfil</a></li>
                            <?php if ($_SESSION["userType"] == 2) { ?>
                                <a class="dropdown-item " href="../admin/admin.php?admin=users">Admin Users</a>
                                <a class="dropdown-item " href="../admin/admin.php?admin=products">Admin Products</a>
                            <?php } ?>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item " href="../home/logout.php">Logout</a></li>
                        </ul>
                    </div>
                </div>

            <?php } ?>
            <!-- SEARCH BAR -->
            <div class="d-flex">
                <input class="form-control me-2" placeholder="Search" id="searchBar">
                <button class="btn btn-outline-danger" id="btnSearch">Search</button>
            </div>
        </div>
        <div class="d-flex justify-content-end order-0 order-lg-1">
            <?php if (!isset($_SESSION["userid"])) { ?>
                <a href="../login/login.php" class="d-lg-none">
                    <button class="btn btn-outline-danger " type="button">
                        <i class="bi bi-person "></i>
                    </button>
                </a>
            <?php } else { ?>
                <a href="../profile/profile.php" class="d-lg-none">
                    <button class="btn btn-outline-danger " type="button">
                        <i class="bi bi-person "></i>
                    </button>
                </a>
            <?php } ?>
            <!-- CARRITO -->
            <a class="btn mx-3 btn-outline-danger position-relative" href="../cart/cart.php">
                <i class="bi bi-cart2"></i>
                <span class="position-absolute 
                    top-0 start-100 translate-middle 
                    badge rounded-pill bg-danger" id="cartCount"></span>
            </a>
        </div>
    </div>
</nav>