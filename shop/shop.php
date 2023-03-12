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
    <link rel="stylesheet" href="../main.css">
    <link rel="stylesheet" href="./shop.css">
    <title>CLOTHICK</title>
</head>

<body>
    <?php require_once '../navbar/navbar.html' ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2 d-flex flex-column p-3 bg-dark fs-5 ">
                <table class="table table-hover">
                    <tr>
                        <td>
                            <a href="./shop.php?category=1" class="text-decoration-none text-white">Headtsets</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="./shop.php?category=2" class="text-decoration-none text-white">Keyboards</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="./shop.php?category=3" class="text-decoration-none text-white">Mice</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="./shop.php?category=4" class="text-decoration-none text-white">Clothes</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="./shop.php?category=5" class="text-decoration-none text-white">Accesories</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="./shop.php?category=6" class="text-decoration-none text-white">Digital products</a>
                        </td>
                    </tr>
                    <tr id="clear" class="d-none">
                        <td>
                            <a href="./shop.php" class="text-decoration-none text-danger">X Clear filter</a>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col row pt-3" id="container">

            </div>
        </div>

    </div>
    <?php require_once '../footer/footer.html' ?>
    <script src="../navbar/navbar.js"></script>
    <script src="shop.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>