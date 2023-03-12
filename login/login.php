<?php include_once 'header.php'; ?>
<!--
<form action="../includes/login.inc.php" method="POST">
    <input class="form-control me-2" type="text" placeholder="Username" name="uid">
    <input class="form-control me-2" type="password" placeholder="Password" name="pwd">
    <button class="btn btn-dark btn-outline-danger" type="submit" name="signup-submit">Log in</button>
</form>
-->
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

              <?php if(isset($_GET['error'])){
                if($_GET['error'] == 'emptyFields'){
                  echo '<p>There are empty fields</p>';
                }else if($_GET['error'] == 'submitFailed'){
                  echo '<p>Submit Failed</p>';
                }else if($_GET['error'] == 'stmtFailed'){
                  echo '<p>Internal error</p>';
                }else if($_GET['error'] == 'wrongLogin'){
                  echo '<p>Incorrect Username or Password</p>';
                }else if($_GET['error'] == 'wrongPass'){
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

              <!--<p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!" >Forgot password?</a></p>-->
                <br>
              <button class="btn btn-outline-danger btn-dark  btn-lg px-5" type="submit" name="login-submit">Login</button>
            </div>
            <div>
              <p class="mb-0">Don't have an account? <a href="signup.php" class="text-white-50 fw-bold">Sign Up</a>
              
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</form>
<?php include_once 'footer.php'; ?>