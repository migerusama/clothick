<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="../footer/footer.css">
    <link rel="stylesheet" href="../navbar/navbar.css">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>

<body>

    <?php require_once '../navbar/navbar.php';
    if (!isset($_SESSION["userType"])) {
        echo '<img src="../assets/img/403.png" alt="forbidden" class="bg-danger w-100">';
        include_once "../footer/footer.html";
        exit();
    }
    ?>

    <?php if (isset($_POST["editProfileSubmit"])) { ?>
        <!-- EDIT VERSION -->
        <section>
            <div class="container py-5">
                <!-- TITULO TARJETA -->
                <div class="row">
                    <div class="col">
                        <nav aria-label="breadcrumb" class="rounded-3 p-3 mb-4 border border-danger" style="background-color: black; color:white">
                            <h4>Edit profile</h4>
                        </nav>
                    </div>
                </div>
                <!-- DIV CONTENEDOR IMAGEN/DATOS -->
                <div class=" row ">
                    <!-- DIV CONTENEDOR IMAGEN -->
                    <div class=" col-lg-4 ">
                        <div class=" card mb-4 border-danger" style="background-color: black; color:white">
                            <div class=" card-body text-center">
                                <?php if ($_SESSION["pfp"] == "") { ?>
                                    <img src="../assets/img/userimg/profile.png" class="rounded-circle img-fluid" style="width: 150px; height: 150px;">
                                <?php } else {
                                    $image_data = base64_encode($_SESSION["pfp"]);
                                    $image_type = "jpeg"; // Cambiar según el tipo de imagen almacenado en la base de datos
                                    echo '<img src="data:image/' .
                                        $image_type .
                                        ";base64," .
                                        $image_data .
                                        '" class="rounded-circle img-fluid " style="width: 150px; height: 150px;">';
                                } ?>
                                <h5 class="my-3"><?php echo $_SESSION["useruid"]; ?></h5>
                                <p class="text-muted mb-1"><?php echo $_SESSION["email"]; ?></p>
                                <p class="text-muted mb-4"><?php echo $_SESSION["country"]; ?></p>
                                <form action="../includes/profile.inc.php" method="POST" enctype="multipart/form-data">
                                    <div class="d-flex justify-content-center mb-2">
                                        <!-- CAMBIAR IMAGEN BTN -->
                                        <input type="file" name="profilePicture" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" style="display:none;" accept="image/*">
                                        <label class="custom-file-label btn btn-dark btn-outline-danger" for="inputGroupFile01">Change Image</label>
                                        <!-- SAVE CHANGES BTN -->
                                        <button type="submit" class="btn btn-dark btn-outline-danger ms-2" name="saveProfileSubmit">Save Changes</button>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <!-- DIV CONTENEDOR DATOS -->
                    <div class="col-lg-8">
                        <div class="card mb-4 border border-danger" style="background-color: black; color:white ">
                            <div class="card-body">

                                <!-- FULL NAME FIELD -->
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Full Name</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" maxlength="30" name="profileUserName" class="form-control no-border bg bg-dark text-white" value="<?php echo $_SESSION["fullname"]; ?>" placeholder="Enter new Username...">
                                    </div>
                                </div>
                                <hr>
                                <!-- EMAILFIELD -->
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Email</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?php echo $_SESSION["email"]; ?></p>
                                    </div>
                                </div>
                                <hr>
                                <!-- GENDER FIELD -->
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Gender</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="profileGender" id="maleRadio" value="male" <?php if (
                                                                                                                                                $_SESSION["gender"] == "male"
                                                                                                                                            ) {
                                                                                                                                                echo " checked";
                                                                                                                                            } ?>>
                                            <label class="form-check-label" for="maleRadio">
                                                Male
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="profileGender" id="femaleRadio" value="female" <?php if (
                                                                                                                                                    $_SESSION["gender"] == "female"
                                                                                                                                                ) {
                                                                                                                                                    echo " checked";
                                                                                                                                                } ?>>
                                            <label class="form-check-label" for="femaleRadio">
                                                Female
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="profileGender" id="otherRadio" value="other" <?php if (
                                                                                                                                                $_SESSION["gender"] == "other"
                                                                                                                                            ) {
                                                                                                                                                echo " checked";
                                                                                                                                            } ?>>
                                            <label class="form-check-label" for="otherRadio">
                                                Other
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <!-- ADDRESS FIELD -->
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Address</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" maxlength="40" name="profileAddress" value="<?php echo $_SESSION["address"]; ?>" class="form-control no-border bg bg-dark text-white" placeholder="Enter new Address...">
                                    </div>
                                </div>
                                <hr>
                                <!-- COUNTRY FIELD -->
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Country</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <select name="profileCountry" class="bg bg-dark text-white form-select" aria-label="Choose a Country">
                                            <option value="" disabled selected>Choose a country...</option>
                                            <option value="argentina" <?php if (
                                                                            $_SESSION["country"] == "argentina"
                                                                        ) {
                                                                            echo " selected";
                                                                        } ?>>Argentina</option>
                                            <option value="brazil" <?php if (
                                                                        $_SESSION["country"] == "brazil"
                                                                    ) {
                                                                        echo " selected";
                                                                    } ?>>Brazil</option>
                                            <option value="colombia" <?php if (
                                                                            $_SESSION["country"] == "colombia"
                                                                        ) {
                                                                            echo " selected";
                                                                        } ?>>Colombia</option>
                                            <option value="spain" <?php if (
                                                                        $_SESSION["country"] == "spain"
                                                                    ) {
                                                                        echo " selected";
                                                                    } ?>>Spain</option>
                                            <option value="france" <?php if (
                                                                        $_SESSION["country"] == "france"
                                                                    ) {
                                                                        echo " selected";
                                                                    } ?>>France</option>
                                            <option value="italy" <?php if (
                                                                        $_SESSION["country"] == "italy"
                                                                    ) {
                                                                        echo " selected";
                                                                    } ?>>Italy</option>
                                            <option value="mexico" <?php if (
                                                                        $_SESSION["country"] == "mexico"
                                                                    ) {
                                                                        echo " selected";
                                                                    } ?>>Mexico</option>
                                            <option value="peru" <?php if (
                                                                        $_SESSION["country"] == "peru"
                                                                    ) {
                                                                        echo " selected";
                                                                    } ?>>Peru</option>
                                            <option value="portugal" <?php if (
                                                                            $_SESSION["country"] == "portugal"
                                                                        ) {
                                                                            echo " selected";
                                                                        } ?>>Portugal</option>
                                            <option value="uruguay" <?php if (
                                                                        $_SESSION["country"] == "uruguay"
                                                                    ) {
                                                                        echo " selected";
                                                                    } ?>>Uruguay</option>
                                        </select>
                                    </div>
                                </div>
                                <hr>
                                <!-- BIRTHDAY FIELD -->
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Birth Day</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control bg bg-dark text-white" id="profileBirthDay" name="profileBirthDay" value="<?php echo $_SESSION["datebirth"]; ?>">
                                    </div>
                                </div>

                                </form>
                            </div>
                        </div>
                    </div>
        </section>

    <?php } else { ?>
        <!-- DATA VERSION -->
        <section>
            <div class="container py-5">
                <!-- TITULO TARJETA -->
                <div class="row">
                    <div class="col">
                        <nav aria-label="breadcrumb" class="rounded-3 p-3 mb-4 border border-danger" style="background-color: black; color:white">
                            <h4>Profile</h4>
                        </nav>
                    </div>
                </div>
                <!-- DIV CONTENEDOR IMAGEN/DATOS -->
                <div class="row">
                    <!-- DIV CONTENEDOR IMAGEN -->
                    <div class="col-lg-4">
                        <div class=" card mb-4 border-danger" style="background-color: black; color:white">
                            <div class="card-body text-center">
                                <?php if ($_SESSION["pfp"] == "") { ?>
                                    <img src="../assets/img/userimg/profile.png" class="rounded-circle img-fluid" style="width: 150px; height: 150px;">
                                <?php } else {
                                    $image_data = base64_encode($_SESSION["pfp"]);
                                    $image_type = "jpeg"; // Cambiar según el tipo de imagen almacenado en la base de datos
                                    echo '<img src="data:image/' .
                                        $image_type .
                                        ";base64," .
                                        $image_data .
                                        '" class="rounded-circle img-fluid " style="width: 150px; height: 150px;">';
                                } ?>
                                <h5 class="my-3"><?php echo $_SESSION["useruid"]; ?></h5>
                                <p class="text-muted mb-1"><?php echo $_SESSION["email"]; ?></p>
                                <p class="text-muted mb-4"><?php echo $_SESSION["country"]; ?></p>
                                <!-- FORM EDIT PROFILE -->
                                <form action="profile.php" method="POST">
                                    <div class="d-flex justify-content-center mb-2">
                                        <button type="submit" class="btn btn-dark btn-outline-danger" name="editProfileSubmit">Edit Profile</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <!-- DIV CONTENEDOR DATOS -->
                    <div class="col-lg-8">
                        <div class="card mb-4 border border-danger" style="background-color: black; color:white">
                            <div class="card-body">
                                <!-- FULL NAME FIELD -->
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Full Name</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?php echo $_SESSION["fullname"]; ?></p>
                                    </div>
                                </div>
                                <hr>
                                <!-- EMAIL FIELD -->
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Email</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?php echo $_SESSION["email"]; ?></p>
                                    </div>
                                </div>
                                <hr>
                                <!-- GENDER FIELD -->
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Gender</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?php echo $_SESSION["gender"]; ?></p>
                                    </div>
                                </div>
                                <hr>
                                <!-- ADDRESS FIELD-->
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Address</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?php echo $_SESSION["address"]; ?></p>
                                    </div>
                                </div>
                                <hr>
                                <!-- COUNTRY FIELD -->
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Country</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?php echo $_SESSION["country"]; ?></p>
                                    </div>
                                </div>
                                <hr>
                                <!-- BIRTHDAY FIELD -->
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Birth Day</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?php echo $_SESSION["datebirth"]; ?></p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
        </section>
    <?php } ?>
    <?php include_once "../footer/footer.html"; ?>
    <script src="../navbar/navbar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>

</body>

</html>