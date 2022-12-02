<?php include("layouts/header.php") ?>
<div class="wrapper">
  <p>
    LOGIN FORM
  </p>
  <div class="alert-box">
    <?php if (isset($_GET['Login_Failed']) == 1) : ?>
      <div class="alert alert-danger">
        Incorrect Email Or Password!
      </div>
    <?php endif ?>
  </div>
  <div class="form-wrap">
    <form action="../../App/controllers/login.php" method="POST">
      <div class="form-group">
        <input type="text" placeholder="Enter Your Email" name="email">
      </div>
      <div class="form-group">
        <input type="password" placeholder="Enter Your Password" name="password">
      </div>
      <div class="form-group">
        <button type="submit">
          Login
        </button>
      </div>
    </form>
  </div>
  <span>
    Not Registered?
    <a href="./register.php">Create an Account</a>
  </span>
</div>
<?php include("layouts/footer.php") ?>