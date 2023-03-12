<?php include_once "../header/header.php"; ?>

<form action="../includes/contact.inc.php" method="POST">
  <section class="vh-10 gradient-custom">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card bg-dark text-white" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">
              <div class="mb-md-5 mt-md-4 pb-5">
                <h2 class="fw-bold mb-2 text-uppercase">Contact Us</h2>
                <p class="text-white-50 mb-2">Please describe the reason</p>
                <!-- ERRORES -->
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
                  }
                } ?>

                <div class="form-outline form-white mb-4">
                  <input type="text" class="form-control form-control-lg" placeholder="Full Name *" name="contactName" />
                </div>

                <div class="form-outline form-white mb-4">
                  <input type="text" class="form-control form-control-lg" placeholder="Email *" name="contactEmail" />
                </div>

                <div class="form-outline form-white mb-4">
                  <textarea rows=5 class="form-control form-control-lg" placeholder="Describe the problem *" name="contactText"></textarea>
                </div>
                <br>
                <button class="mb-0 btn btn-outline-danger btn-dark  btn-lg px-5" type="submit" name="contact-submit">Send</button>
              </div>
              <?php
              if (isset($_SESSION["contactSuccess"])) { ?>
                <div class=" alert alert-success alert-dismissible fade show" role="alert">
                  Your query has been <strong>successfully</strong> submitted.
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              <?php }
              unset($_SESSION["contactSuccess"]);
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</form>
<?php include_once "../footer/footer.php"; ?>