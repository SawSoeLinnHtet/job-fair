<?php include("layouts/header.php") ?>
<div class="wrapper">
  <p>
    LOGIN FORM
  </p>
  <div class="form-wrap">
    <form action="">
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