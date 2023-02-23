<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cart.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script><!-- CARGAR NAVBAR -->
    <title>CLOTHICK</title>
</head>

<body>
    <?php require_once '../navbar/navbar.html' ?>
    <div class="container mt-3">
        <div class="row">
            <div class="col col-12 col-lg-8">
                <h1>Carrito</h1>
                <hr>
                <div id="listaProductos">

                </div>
            </div>
            <div class="col border-start border-2 p-5">
                <div id="ticket">

                </div>
                <div id="emptyStuff" class="text-center fw-bold">
                    There is nothing in the cart
                </div>
                <hr>
                <div id="totalAmount" class="d-flex justify-content-between fw-bold">
                    <p>TOTAL</p>
                    <p id="total">0</p>
                </div>
                <button id="checkOut" class="btn btn-outline-dark w-100">CHECK OUT</button>
            </div>
        </div>
    </div>
    <?php require_once '../footer/footer.html' ?>


    <script src="cart.js"></script>
    <script src="../navbar/navbar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>