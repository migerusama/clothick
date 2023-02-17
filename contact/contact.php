<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cart.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../navbar/navbar.css">
    <link rel="stylesheet" href="../main.css">
    <link rel="stylesheet" href="contact.css">
    <title>CLOTHICK</title>
</head>

<body>
    <?php require_once '../navbar/navbar.html' ?>
    <form action="" method="post">
        <div class="d-flex justify-content-center">
            <div class="row g-2 mt-3 w-50">
                <h3 class="text-center text-white">CONTACT US</h3>
                <input class="form-control" type="text" placeholder="Name">
                <input class="form-control" type="email" placeholder="Email">
                <textarea class="form-control h-75" placeholder="Your message..." maxlength="500"></textarea>
                <button type="submit" class="btn btn-danger">Send Email</button>
            </div>
        </div>
    </form>
    <?php require_once '../footer/footer.html' ?>

    <script src="cart.js"></script>
    <script src="../navbar/navbar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>