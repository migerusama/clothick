<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLOTHICK</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="home.css">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark border-bottom border-5 border-danger" style="background-color:black;">
        <div class="container-fluid">
            <a href="../home/home.php" class="navbar-brand">
                <img src="../assets/img/logo/logo horizontal sin fondo.png" class="w-100">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 fs-4">
                    <li class="nav-item">
                        <a class="nav-link" href="../shop/shop.html">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../contact/contact.php">Contact Us</a>
                    </li>
                </ul>
                <!-- SIGN UP / LOG IN -->
                <?php session_start(); ?>
                <?php if (!isset($_SESSION["userid"])) { ?>
                    <div class="button-container me-2">
                        <a href="../singup/signup.php"><button class="btn btn-dark btn-outline-danger" type="button">Sign Up</button></a>
                        <a href="../login/login.php"><button class="btn btn-dark btn-outline-danger" type="button">Log in</button></a>
                    </div>

                <?php } else { ?>

                    <?php if ($_SESSION["userType"] == 2) { ?>

                        <div class="button-container me-2">
                            <a href="../admin/admin.php?admin=users"><button class="btn btn-dark btn-outline-danger" type="button">Admin Users</button></a>
                            <a href="../admin/admin.php?admin=products"><button class="btn btn-dark btn-outline-danger" type="button">Admin Products</button></a>
                        </div>

                    <?php } ?>
                    <div class="button-container me-2">
                        <a href="../home/logout.php"><button class="btn btn-dark btn-outline-danger" type="button">Log Out</button></a>
                        <a href="../profile/profile.php"><button class="btn btn-dark btn-outline-danger" type="button"><?php echo $_SESSION["useruid"]; ?></button></a>
                    </div>
                <?php } ?>

                <!-- SEARCH BAR -->
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-dark btn-outline-danger" type="submit">Search</button>
                </form>

                <!-- CARRITO -->
                <a class="btn mx-3 btn-outline-light position-relative" href="../cart/cart.html">
                    <i class="bi bi-cart2"></i>
                    <!-- TODO: CAMBIAR A VISIBLE SI TIENE PRODUCTOS -->
                    <span class="position-absolute 
                            top-0 start-100 translate-middle 
                            badge rounded-pill bg-danger" id="cartCount"></span>
                </a>
            </div>
        </div>
    </nav>