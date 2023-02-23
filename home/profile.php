<?php include_once 'header.php'; ?>
<?php if (isset($_POST['editProfileSubmit'])){ ?>

<section>
  <div class="container py-5">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
        <h4>Profile EDIT</h4>
        </nav>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="../assets/img/userimg/pepe.jpg"
              class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3"><?php echo $_SESSION['useruid'];?></h5>
            <p class="text-muted mb-1"><?php echo $_SESSION['email'];?></p>
            <p class="text-muted mb-4"><?php echo $_SESSION['country'];?></p>
            <form action="../includes/profile.inc.php" method="POST">
            <div class="d-flex justify-content-center mb-2">
              <a href="profile.php"><button type="submit" class="btn btn-primary" name="saveProfileSubmit">Save Changes</button></a>
            </div>
            
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Full Name</p>
              </div>
              <div class="col-sm-9">
              <input type="text" maxlength="30" name="profileUserName" class="form-control no-border" value ="<?php echo $_SESSION['fullname'];?>"placeholder="Enter new Username...">
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
              <input type="text" maxlength="30" name="profileEmail" class="form-control no-border" placeholder="Enter new email...">
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Sex</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">Male</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Address</p>
              </div>
              <div class="col-sm-9">
              <input type="text" maxlength="40" name="profileAddress" class="form-control no-border" placeholder="Enter new Address...">
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Country</p>
              </div>
              <div class="col-sm-9">
              <input type="text" maxlength="30" name="profileCounty" class="form-control no-border" placeholder="Enter new Country...">
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Birth Day</p>
              </div>
              <div class="col-sm-9">
              <input type="text" name="profileBirthDay" class="form-control no-border" placeholder="Enter new Birth Day...">
              </div>
            </div>
            <hr>
            </form> 
      </div>
    </div>
  </div>
</section>

<?php } else { ?>
<section>
  <div class="container py-5">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
        <h4>Profile</h4>
        </nav>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="../assets/img/userimg/pepe.jpg"
              class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3"><?php echo $_SESSION['useruid'];?></h5>
            <p class="text-muted mb-1"><?php echo $_SESSION['email'];?></p>
            <p class="text-muted mb-4"><?php echo $_SESSION['country'];?></p>
            <!-- FORM EDIT PROFILE -->
            <form action="profile.php" method="POST">
            <div class="d-flex justify-content-center mb-2">
              <button type="submit" class="btn btn-primary" name="editProfileSubmit">Edit Profile</button>
            </div>
            </form>  

          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Full Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $_SESSION['fullname'];?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $_SESSION['email'];?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Sex</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $_SESSION['sex'];?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Address</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $_SESSION['address'];?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Country</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $_SESSION['country'];?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Birth Day</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $_SESSION['datebirth'];?></p>
              </div>
            </div>
            <hr>
      </div>
    </div>
  </div>
</section>
<?php } ?>
<?php include_once 'footer.php'; ?>