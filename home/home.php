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
    <?php require_once '../navbar/navbar.html' ?>
    <div class="container-fluid mt-3">
        <div class="row mb-3">
            <img class="col w-100" src="../assets/img/homeImg.jpg" alt="">
        </div>
        <!-- CARDS NOVEDADES -->
        <div class="row g-3">
            <div class="col-3 d-flex bg-danger align-items-center rounded-2 ms-2">
                <h1 class="text-center w-100">NOVEDADES</h1>
            </div>
            <div class="col row-cols-3 d-flex overflow-auto" id="containerNovedades">

            </div>

        </div>
        <!-- CATEGORIAS -->
        <div class="row justify-content-center">
            <div class="w-75 d-flex">
                <a href="../shop/shop.php?c=headset" class="col-2 text-center text-white">
                    <img src="https://cdn.sanity.io/images/5gii1snx/production/e06f06c3adaef7427578a3daeb7bedadc2c13bed-1080x1080.svg" alt="" class="w-75">
                    <p>Headsets</p>
                </a>
                <a href="../shop/shop.php?c=keyboard" class="col-2 text-center text-white">
                    <img src="https://cdn.sanity.io/images/5gii1snx/production/d58a35b7cdbd9147ca6aa9ea17674c3bbad2403b-1080x1080.svg" alt="" class="w-75">
                    <p>Teclados</p>
                </a>
                <a href="../shop/shop.php?c=mouse" class="col-2 text-center text-white">
                    <img src="https://cdn.sanity.io/images/5gii1snx/production/04266641b12133b1ff7f81423448211be5c1cef8-1080x1080.svg" alt="" class="w-75">
                    <p>Ratones</p>
                </a>
                <a href="../shop/shop.php?c=clothes" class="col-2 text-center text-white">
                    <img src="https://cdn.sanity.io/images/5gii1snx/production/f2d5ca9b710bb7ecbd7b0027ebfd469f2e8c2b5f-1080x1080.svg" alt="" class="w-75">
                    <p>Ropa</p>
                </a>
                <a href="../shop/shop.php?c=accesory" class="col-2 text-center text-white">
                    <img src="https://cdn.sanity.io/images/5gii1snx/production/f88758cdd8b9e83d36288ca8e24c50fc23e114cf-1080x1080.svg" alt="" class="w-75">
                    <p>Accesorios</p>
                </a>
                <a href="../shop/shop.php?c=digital_products" class="col-2 text-center text-white">
                    <img src="https://cdn.sanity.io/images/5gii1snx/production/544e8371ed40ecdf8ebc02a28cc15557ad907454-1080x1080.svg" alt="" class="w-75">
                    <p>Productos digitales</p>
                </a>
            </div>
        </div>
        <!-- PRODUCTOS -->
        <div class="row row-cols-4 g-3" id="productosLista">

        </div>

    </div>
    <?php require_once '../footer/footer.html' ?>
    <script src="home.js"></script>
    <script src="../navbar/navbar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>