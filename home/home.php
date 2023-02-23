<?php include_once 'header.php'; ?>
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
            <a href="../shop/shop.html?c=headset" class="col-2 text-center text-white">
                <img src="https://cdn.sanity.io/images/5gii1snx/production/e06f06c3adaef7427578a3daeb7bedadc2c13bed-1080x1080.svg" alt="" class="w-75">
                <p>Headsets</p>
            </a>
            <a href="../shop/shop.html?c=keyboard" class="col-2 text-center text-white">
                <img src="https://cdn.sanity.io/images/5gii1snx/production/d58a35b7cdbd9147ca6aa9ea17674c3bbad2403b-1080x1080.svg" alt="" class="w-75">
                <p>Teclados</p>
            </a>
            <a href="../shop/shop.html?c=mouse" class="col-2 text-center text-white">
                <img src="https://cdn.sanity.io/images/5gii1snx/production/04266641b12133b1ff7f81423448211be5c1cef8-1080x1080.svg" alt="" class="w-75">
                <p>Ratones</p>
            </a>
            <a href="../shop/shop.html?c=clothes" class="col-2 text-center text-white">
                <img src="https://cdn.sanity.io/images/5gii1snx/production/f2d5ca9b710bb7ecbd7b0027ebfd469f2e8c2b5f-1080x1080.svg" alt="" class="w-75">
                <p>Ropa</p>
            </a>
            <a href="../shop/shop.html?c=accesory" class="col-2 text-center text-white">
                <img src="https://cdn.sanity.io/images/5gii1snx/production/f88758cdd8b9e83d36288ca8e24c50fc23e114cf-1080x1080.svg" alt="" class="w-75">
                <p>Accesorios</p>
            </a>
            <a href="../shop/shop.html?c=digital_products" class="col-2 text-center text-white">
                <img src="https://cdn.sanity.io/images/5gii1snx/production/544e8371ed40ecdf8ebc02a28cc15557ad907454-1080x1080.svg" alt="" class="w-75">
                <p>Productos digitales</p>
            </a>
        </div>
    </div>
    <!-- PRODUCTOS -->
    <div class="row row-cols-4 g-3" id="productosLista">

    </div>
    <?php include_once 'footer.php'; ?>