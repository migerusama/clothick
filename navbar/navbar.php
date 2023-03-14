<nav class="navbar navbar-expand-lg navbar-dark border-bottom border-5 border-danger" style="background-color:black;">
    <div class="container-fluid">

        <!-- <div class="col d-flex justify-content-center justify-content-lg-start w-15">
            <a href="../home/home.php" class="navbar-brand w-15">
                <img src="../assets/img/logo/logo horizontal sin fondo 2.png" class="w-100 d-none d-lg-flex">
                <img src="../assets/img/logo/logo horizontal sin fondo small icon 2.png" class="d-lg-none mobile-p">
            </a>
        </div> -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a href="../home/home.php" class="w-15">
            <img src="../assets/img/logo/logo horizontal sin fondo.png" class="img-fluid">
        </a>
        <div class="col-3 d-flex justify-content-end d-lg-none">
            <!-- MOBILE USER ICON -->
            <?php if (!isset($_SESSION["userid"])) { ?>
                <a href="../login/login.php"><button class="btn btn-outline-danger d-lg-none" type="button"><i class="bi bi-person "></i></button></a>
            <?php } else { ?>
                <a href="../profile/profile.php"><button class="btn btn-outline-danger d-lg-none" type="button"><i class="bi bi-person "></i></button></a>
            <?php } ?>
            <!-- MOBILE CART -->
            <a class="btn btn-outline-danger d-lg-none ms-2" href="../cart/cart.html">
                <i class="bi bi-cart2"></i>
                <!-- TODO: CAMBIAR A VISIBLE SI TIENE PRODUCTOS -->
                <span class="position-absolute 
                            top-0 start-100 translate-middle 
                            badge rounded-pill bg-danger" id="cartCount"></span>
            </a>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 fs-4">
                <li class="nav-item ">
                    <a class="nav-link" href="../shop/shop.php">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../contact/contact.php">Contact us</a>
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
                    <a href="../singup/signup.php"><button class="btn btn-dark btn-outline-danger" type="button">Sign Up</button></a>
                    <a href="../login/login.php"><button class="btn btn-dark btn-outline-danger" type="button">Log in</button></a>
                </div>

            <?php } else { ?>

                <div class="button-container me-2 d-none d-lg-block">
                    <div class="dropdown">
                        <button class="btn btn-dark btn-outline-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person"></i>
                        </button>
                        <ul class="dropdown-menu border-danger text-white" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item border-bottom border-danger" href="../profile/profile.php">Perfil</a></li>
                            <li><a class="dropdown-item border-bottom border-danger" href="../home/logout.php">Logout</a></li>
                            <?php if ($_SESSION["userType"] == 2) { ?>
                                <a class="dropdown-item border-bottom border-danger" href="../admin/admin.php?admin=users">Admin Users</a>
                                <a class="dropdown-item" href="../admin/admin.php?admin=products">Admin Products</a>
                            <?php } ?>
                        </ul>
                    </div>
                </div>

            <?php } ?>
            <!-- SEARCH BAR -->
            <div class="d-flex">
                <input class="form-control me-2" placeholder="Search" id="searchBar">
                <button class="btn btn-dark btn-outline-danger" id="btnSearch">Search</button>
            </div>
            <!-- CARRITO -->
            <a class="btn mx-3 btn-outline-light position-relative" href="../cart/cart.php">
                <i class="bi bi-cart2"></i>
                <!-- TODO: CAMBIAR A VISIBLE SI TIENE PRODUCTOS -->
                <span class="position-absolute 
                    top-0 start-100 translate-middle 
                    badge rounded-pill bg-danger" id="cartCount"></span>
            </a>
        </div>
    </div>
</nav>