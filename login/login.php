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
  <link rel="stylesheet" href="login.css">
  <link rel="stylesheet" href="../footer/footer.css">
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>

<body>

  <?php require_once '../navbar/navbar.php';
  if (isset($_SESSION['userType'])) {
    echo '<img src="../assets/img/403.png" alt="forbidden" class="bg-danger w-100">';
    include_once "../footer/footer.html";
    exit();
  } ?>
  <form action="../includes/login.inc.php" method="POST">
    <section class="vh-10 gradient-custom">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card bg-dark text-white" style="border-radius: 1rem;">
              <div class="card-body p-5 text-center">

                <div class="mb-md-5 mt-md-4 pb-5">

                  <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                  <p class="text-white-50 mb-2">Please enter your login and password</p>

                  <?php if (isset($_GET['error'])) {
                    if ($_GET['error'] == 'emptyFields') {
                      echo '<p>There are empty fields</p>';
                    } else if ($_GET['error'] == 'submitFailed') {
                      echo '<p>Submit Failed</p>';
                    } else if ($_GET['error'] == 'stmtFailed') {
                      echo '<p>Internal error</p>';
                    } else if ($_GET['error'] == 'wrongLogin') {
                      echo '<p>Incorrect Username or Password</p>';
                    } else if ($_GET['error'] == 'wrongPass') {
                      echo '<p>Wrong Password</p>';
                    }
                  }
                  ?>

                  <div class="form-outline form-white mb-4">
                    <input type="text" class="form-control form-control-lg" placeholder="Username / Email *" name="uid" />
                  </div>

                  <div class="form-outline form-white mb-4">
                    <input type="password" class="form-control form-control-lg" placeholder="Password *" name="pwd" />
                  </div>
                  <br>
                  <button class="btn btn-outline-danger btn-dark  btn-lg px-5" type="submit" name="login-submit">Login</button>
                </div>
                <div>
                  <p class="mb-0">Don't have an account? <a href="../signup/signup.php" class="text-white-50 fw-bold">Sign Up</a>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </form>
  <?php include_once "../footer/footer.html"; ?>
  <script src="../navbar/navbar.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
</body>

</html>