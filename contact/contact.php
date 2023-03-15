<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CLOTHICK</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="contact.css">
  <link rel="stylesheet" href="../footer/footer.css">
  <link rel="stylesheet" href="../home/home.css">
  <link rel="stylesheet" href="../navbar/navbar.css">
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>

<body>

  <?php require_once '../navbar/navbar.php' ?>
  <form action="../includes/contact.inc.php" method="POST">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card bg-dark text-white" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">
              <?php
              if (isset($_SESSION["contactSuccess"])) { ?>
                <div class=" alert alert-success alert-dismissible fade show" role="alert">
                  Thank you for contacting us. Your message has been <strong>successfully</strong> submitted.
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              <?php }
              unset($_SESSION["contactSuccess"]);
              ?>
              <div class=" mt-md-4 ">
                <h2 class="fw-bold mb-2 text-uppercase">Contact Us</h2>
                <hr>
                <!-- ERRORES -->
                <?php if (isset($_GET["error"])) {
                  if ($_GET["error"] == "emptyFields") {
                    echo "<p>There are empty fields</p>";
                  } elseif ($_GET["error"] == "submitFailed") {
                    echo "<p>Submit Failed</p>";
                  } elseif ($_GET["error"] == "invalidEmail") {
                    echo "<p>Invalid email</p>";
                  } elseif ($_GET["error"] == "wrongLogin") {
                    echo "<p>Incorrect Username or Password</p>";
                  } elseif ($_GET["error"] == "wrongPass") {
                    echo "<p>Wrong Password</p>";
                  }
                } ?>
                <div class="form-outline form-white mb-4">
                  <input type="text" maxlength="50" class="form-control form-control-lg" placeholder="Full Name *" name="contactName" <?php if (
                                                                                                                                        isset($_SESSION["userType"])
                                                                                                                                      ) {
                                                                                                                                        echo "value='" . $_SESSION["fullname"] . "'";
                                                                                                                                      } ?> />
                </div>

                <div class="form-outline form-white mb-4">
                  <input type="text" maxlength="50" class="form-control form-control-lg" placeholder="Email *" name="contactEmail" <?php if (
                                                                                                                                      isset($_SESSION["userType"])
                                                                                                                                    ) {
                                                                                                                                      echo "value='" . $_SESSION["email"] . "'";
                                                                                                                                    } ?> />
                </div>

                <div class="form-outline form-white mb-4">
                  <textarea rows=8 class="form-control form-control-lg" placeholder="Please describe the reason for your inquiry. *" name="contactText"></textarea>
                </div>
                <br>
                <button class="mb-0 btn btn-outline-danger btn-dark  btn-lg px-5" type="submit" name="contact-submit">Send</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </form>
  <?php include_once "../footer/footer.html"; ?>
  <script src="home.js"></script>
  <script src="../navbar/navbar.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
</body>

</html>
