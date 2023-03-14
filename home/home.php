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
    <link rel="stylesheet" href="../footer/footer.css">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>

<body>
    <?php require_once '../navbar/navbar.php' ?>
    <div class="container-fluid p-0" id="container">
        <div class="row mb-3">
            <video autoplay="" loop="" muted="" preload="none" webkit-playsinline="" playsinline="" class="b-lazy videoh__video" src="../assets/video/home.mp4" id="video-hero-video">
                <source src="../assets/video/home.mp4" type="video/mp4">
            </video>
        </div>
        <!-- TODO: CARDS INFO -->
        <div class="row text-white mt-5 justify-content-center">
            <h1 class="my-2 text-center ">ALL THINGS CLOTHICK</h1>
            <hr class="w-75">
            <div class="row g-3 w-75">
                <div class="col ">
                    <div class="card">
                        <img src="https://cf-img.fnatic.com/cdn-cgi/image/dpr=1,fit=cover,format=auto,width=1280/https://cdn.sanity.io/images/5gii1snx/production/2eb3947a9dcbd479f8e3ced70be189976c153f36-750x1196.jpg" class="card-img h-pers" alt="...">
                        <div class="card-img-overlay">
                            <h2 class="card-title d-none d-lg-block">MOUSE - BOLT</h2>
                            <h4 class="card-title d-block d-lg-none">MOUSE - BOLT</h4>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="https://cf-img.fnatic.com/cdn-cgi/image/dpr=1,fit=contain,format=auto,width=1280/https://cdn.sanity.io/images/5gii1snx/production/0766dd63748e09513eb6c3e49694a7a3fb327428-4160x5200.jpg" class="card-img h-pers" alt="">
                        <div class="card-img-overlay">
                            <h2 class="card-title d-none d-lg-block">CLOTHICK NETWORK</h2>
                            <h4 class="card-title d-block d-lg-none">CLOTHICK NETWORK</h4>
                        </div>
                    </div>
                </div>
                <div class="col ">
                    <div class="card">
                        <img src="https://cf-img.fnatic.com/cdn-cgi/image/dpr=1,fit=cover,format=auto,width=1280/https://cdn.sanity.io/images/5gii1snx/production/c98aeedf7f461e29556b279fb1a207c0a39846c8-580x720.png" class="card-img h-pers" alt="...">
                        <div class="card-img-overlay">
                            <h2 class="card-title d-none d-lg-block">CLOTHICK X CHILLBLAST</h2>
                            <h4 class="card-title d-block d-lg-none">CLOTHICK X CHILLBLAST</h4>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- CATEGORIAS -->
        <div class="row justify-content-center">
            <div class="w-75 d-flex">
                <a href="../shop/shop.php?category=1" class="col-2 text-center text-white ">
                    <img src="https://cdn.sanity.io/images/5gii1snx/production/e06f06c3adaef7427578a3daeb7bedadc2c13bed-1080x1080.svg" alt="" class="w-75 ">
                    <p>Headsets</p>
                </a>
                <a href="../shop/shop.php?category=2" class="col-2 text-center text-white">
                    <img src="https://cdn.sanity.io/images/5gii1snx/production/d58a35b7cdbd9147ca6aa9ea17674c3bbad2403b-1080x1080.svg" alt="" class="w-75">
                    <p>Teclados</p>
                </a>
                <a href="../shop/shop.php?category=3" class="col-2 text-center text-white">
                    <img src="https://cdn.sanity.io/images/5gii1snx/production/04266641b12133b1ff7f81423448211be5c1cef8-1080x1080.svg" alt="" class="w-75">
                    <p>Ratones</p>
                </a>
                <a href="../shop/shop.php?category=4" class="col-2 text-center text-white">
                    <img src="https://cdn.sanity.io/images/5gii1snx/production/f2d5ca9b710bb7ecbd7b0027ebfd469f2e8c2b5f-1080x1080.svg" alt="" class="w-75">
                    <p>Ropa</p>
                </a>
                <a href="../shop/shop.php?category=5" class="col-2 text-center text-white">
                    <img src="https://cdn.sanity.io/images/5gii1snx/production/f88758cdd8b9e83d36288ca8e24c50fc23e114cf-1080x1080.svg" alt="" class="w-75">
                    <p>Accesorios</p>
                </a>
                <a href="../shop/shop.php?category=6" class="col-2 text-center text-white">
                    <img src="https://cdn.sanity.io/images/5gii1snx/production/544e8371ed40ecdf8ebc02a28cc15557ad907454-1080x1080.svg" alt="" class="w-75">
                    <p>Productos digitales</p>
                </a>
            </div>
        </div>
        <!-- PRODUCTOS -->
        <div class="d-flex justify-content-center">
            <div class="row row-cols-3 row-cols-lg-4 w-75 g-3 " id="productosLista">

            </div>
        </div>


    </div>
    <?php require_once '../footer/footer.html' ?>
    <script src="home.js"></script>
    <script src="../navbar/navbar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>

</body>

</html>