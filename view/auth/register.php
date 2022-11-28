<?php include("layouts/header.php") ?>
<div class="wrapper">
  <p>
    REGISTER FORM
  </p>
  <div class="form-wrap">
    <form action="">
      <div class="form-group">
        <input type="text" placeholder="Name" name="name">
      </div>
      <div class="form-group">
        <input type="email" placeholder="Email" name="email">
      </div>
      <div class="form-group">
        <input type="password" placeholder="Password" name="password">
      </div>
      <div class="form-group">
        <input type="password" placeholder="Confirm Password" name="confirm_password">
      </div>
      <div class="form-group">
        <input type="text" placeholder="Address" name="address">
      </div>
      <div class="form-group side">
        <input type="text" placeholder="City" name="confirm_password">
        <input type="text" placeholder="Postal Code" name="confirm_password">
      </div>
      <div class="form-group">
        <button type="submit">
          Login
        </button>
      </div>
    </form>
  </div>
  <span>
    Already Account?
    <a href="./login.php">Login Here</a>
  </span>
</div>
<?php include("layouts/footer.php") ?>