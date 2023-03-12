<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <link rel="stylesheet" href="../navbar/navbar.css">
    <link rel="stylesheet" href="product.css">
    <title>CLOTHICK</title>
</head>

<body>
    <?php require_once '../navbar/navbar.html' ?>
    <div class="container p-3 border-end border-start border-danger border-5" style="background: black;">
        <div class=" mb-3 text-white">
            <div class="row g-2">
                <div id="carouselExampleControls" class="carousel slide col-8" data-bs-ride="carousel">
                    <div class="carousel-inner" id="imgContainer">

                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <div class="col-4 p-0">
                    <div class="card-body">
                        <p id="category">Keyboards</p>
                        <h3 class="card-title fs-1 fw-bold" id="name">STREAK65</h3>
                        <small id="smallDesc">Ultra Compact Esports Keyboard</small>
                        <p class="fs-4" id="price">120.99 €</p>
                        <hr>
                        <button class="btn btn-outline-danger btn-dark w-100" id="btnCart">ADD TO CART</button>
                        <hr>
                        <p id="desc">Big on performance, small in size. The STREAK65 is built for Esports. The 65% compact form factor has custom low-profile Fnatic Speed Switches, with a familiar key press feeling and the award-winning STREAK industrial design. Everything you need to perform, nothing more.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once '../footer/footer.html' ?>
    <script src="../navbar/navbar.js"></script>
    <script src="product.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>