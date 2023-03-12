<?php
include_once "../header/header.php";
include_once "../includes/dbh.inc.php";
if ($_SESSION["userType"] != 2) {
    header("location: home.php");
    exit();
}
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
            <tbody class="bg bg-white">
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
                                <i class="bi bi-envelope btn btn-secondary border border-danger"></i>
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
                            <td><?php echo $row["quantity"]; ?></td>
                            <td><?php echo $row["price"]; ?></td>
                            <td>
                                <a href="../includes/deleteProduct.inc.php?id=<?php echo $row["id"] ?>">
                                    <i class="bi bi-trash btn btn-danger border border-danger"></i>
                                </a>
                                <i class="bi bi-pencil btn btn-success border border-danger"></i>
                            </td>
                        </tr>
                <?php }
                } ?>
            </tbody>
        </table>
    </div>
</div>
<?php include_once "../footer/footer.php"; ?>