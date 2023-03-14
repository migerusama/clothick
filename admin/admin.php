<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLOTHICK</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../home/home.css">
    <link rel="stylesheet" href="../footer/footer.css">
    <link rel="stylesheet" href="../navbar/navbar.css">
    <link rel="stylesheet" href="admin.css">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>

<body>

    <?php require_once '../navbar/navbar.php';
    if (!isset($_SESSION["userType"]) || $_SESSION["userType"] != 2) {
        echo '<img src="../assets/img/403.png" alt="forbidden" class="bg-danger w-100">';
        include_once "../footer/footer.html";
        exit();
    }
    include_once "../includes/dbh.inc.php";
    ?>

    <div class="container">
        <div class="col m-3 ">
            <!-- TABLA PRODUCTOS-->
            <table class="table table-bordered border-danger">
                <thead class="bg bg-danger border border-dark">
                    <tr>
                        <?php if ($_GET["admin"] == "users") { ?>
                            <th>IdUser</th>
                            <th>Nickname</th>
                            <th>Email</th>
                            <th>Actions</th>
                        <?php } elseif ($_GET["admin"] == "products") { ?>
                            <th>Product ID</th>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Actions</th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody class="bg-dark text-white">
                    <!-- TABLA USUARIOS -->
                    <?php if ($_GET["admin"] == "users") {

                        $query = "SELECT US.id as id,US.nick as nick,
                    US.email as email,D.name as fullname 
                    FROM users US
                    INNER JOIN userData D on US.id = D.idUser
                    WHERE us.type != 2;";

                        $conn = Connection::getConnection();
                        $result = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_array($result)) { ?>
                            <tr>
                                <td><?php echo $row["id"]; ?></td>
                                <td><?php echo $row["nick"]; ?></td>
                                <td><?php echo $row["email"]; ?></td>
                                <td>
                                    <a href="../includes/deleteUser.inc.php?id=<?php echo $row["id"] ?>">
                                        <i class="bi bi-trash btn btn-danger border border-danger"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php }
                        ?>
                        <?php
                    } elseif ($_GET["admin"] == "products") {
                        $query = "SELECT * FROM products";

                        $conn = Connection::getConnection();
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($result)) { ?>
                            <tr>
                                <td><?php echo $row["id"]; ?></td>
                                <td><?php echo $row["name"]; ?></td>
                                <?php if (isset($_GET['pId'])) {
                                    if ($_GET['pId'] == $row["id"]) { ?>
                                        <form action="../includes/updateProduct.inc.php" method="POST">
                                            <td>
                                                <input type="number" name="pQuantity" value="<?php echo $row["quantity"]; ?>">
                                            </td>
                                            <td>
                                                <input type="number" step="0.01" name="pPrice" value="<?php echo $row["price"]; ?>" autofocus>
                                                <input type="number" name="id" value="<?php echo $row["id"] ?>" class="d-none">
                                            </td>
                                            <td>
                                                <a href="../includes/deleteProduct.inc.php?id=<?php echo $row["id"] ?>">
                                                    <i class="bi bi-trash btn btn-danger border border-danger"></i>
                                                </a>
                                                <button type="submit" class="btn btn-success border border-success">
                                                    <i class="bi bi-file-earmark-arrow-up-fill"></i>
                                                </button>
                                            </td>
                                        </form>


                                    <?php } else { ?>
                                        <td><?php echo $row["quantity"]; ?></td>
                                        <td><?php echo $row["price"]; ?></td>
                                        <td>
                                            <a href="../includes/deleteProduct.inc.php?id=<?php echo $row["id"] ?>">
                                                <i class="bi bi-trash btn btn-danger border border-danger"></i>
                                            </a>
                                            <a href="admin.php?admin=products&pId=<?php echo $row["id"] ?>">
                                                <i class="bi bi-pencil btn btn-success border border-danger"></i>
                                            </a>

                                        </td>
                                    <?php }
                                } else { ?>
                                    <td><?php echo $row["quantity"]; ?></td>
                                    <td><?php echo $row["price"]; ?></td>
                                    <td>
                                        <a href="../includes/deleteProduct.inc.php?id=<?php echo $row["id"] ?>">
                                            <i class="bi bi-trash btn btn-danger border border-danger"></i>
                                        </a>
                                        <a href="admin.php?admin=products&pId=<?php echo $row["id"] ?>">
                                            <i class="bi bi-pencil btn btn-success border border-danger"></i>
                                        </a>
                                    </td>
                                <?php } ?>
                            </tr>
                    <?php }
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php include_once "../footer/footer.html"; ?>
    <script src="home.js"></script>
    <script src="../navbar/navbar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
</body>

</html>