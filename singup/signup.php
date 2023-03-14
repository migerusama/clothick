<?php include_once "../header/header.php";
if (isset($_SESSION['userType'])) {
  echo '<img src="../assets/img/403.png" alt="forbidden" class="bg-danger w-100">';
  include_once "../footer/footer.php";
  exit();
} ?>


<form action="../includes/signup.inc.php" method="POST">
  <section class="vh-10 gradient-custom">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card bg-dark text-white" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">

              <div class="mb-md-5 mt-md-4 pb-5">

                <h2 class="fw-bold mb-1 text-uppercase">Sign Up</h2>

                <p class="text-white-50 mb-2">Please enter all the data</p>

                <?php if (isset($_GET["error"])) {
                  if ($_GET["error"] == "emptyFields") {
                    echo "<p>There are empty fields</p>";
                  } elseif ($_GET["error"] == "submitFailed") {
                    echo "<p>Submit Failed</p>";
                  } elseif ($_GET["error"] == "stmtFailed") {
                    echo "<p>Internal error</p>";
                  } elseif ($_GET["error"] == "wrongLogin") {
                    echo "<p>Incorrect Username or Password</p>";
                  } elseif ($_GET["error"] == "wrongPass") {
                    echo "<p>Wrong Password</p>";
                  } elseif ($_GET["error"] == "invalidEmail") {
                    echo "<p>Email already exist</p>";
                  }
                } ?>

                <div class="form-outline form-white mb-4">
                  <input type="text" class="form-control form-control-lg" placeholder="Full Name *" name="signupName" />
                </div>

                <div class="form-outline form-white mb-4">
                  <input type="text" class="form-control form-control-lg" placeholder="Nickname *" name="signupNick" />
                </div>

                <div class="form-outline form-white mb-4">
                  <input type="text" class="form-control form-control-lg" placeholder="Email *" name="signupEmail" />
                </div>

                <div class="form-outline form-white mb-4">
                  <input type="password" class="form-control form-control-lg" placeholder="Password *" name="signupPwd" />
                </div>

                <div class="form-outline form-white mb-4">
                  <input type="password" class="form-control form-control-lg" placeholder="Repeat Password *" name="signupRepwd" />
                </div>
                <br>
                <button class="btn btn-outline-danger btn-dark  btn-lg px-5" type="submit" name="signup-submit">Sign Up</button>
              </div>
              <div>
                <p class="mb-0">Already have an account? <a href="../login/login.php" class="text-white-50 fw-bold">Log in</a>

              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</form>
<?php include_once "../footer/footer.php"; ?>