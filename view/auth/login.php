<?php include("layouts/header.php") ?>
<div class="poster">
  <img src="../../public/assets/images/auth.jpg" alt="">
</div>
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
    <form id="form" action="../../App/controllers/login.php" method="POST">
      <div class="form-control">
        <label for="email">
          Email
        </label>
        <input type="text" name="email" required>
      </div>
      <div class="form-control">
        <label for="email">
          Password
        </label>
        <input type="password" name="password" required>
      </div>
      <div class="form-control">
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

<?php include("./jquery-validate.php") ?>
<?php include("layouts/footer.php") ?>