<?php include_once 'header.php'; ?>
<form action="../includes/login.inc.php" method="POST">
    <input class="form-control me-2" type="text" placeholder="Username" name="uid">
    <input class="form-control me-2" type="password" placeholder="Password" name="pwd">
    <button class="btn btn-dark btn-outline-danger" type="submit" name="signup-submit">Log in</button>
</form>
<?php include_once 'footer.php'; ?>