<?php include("layouts/header.php") ?>
<div class="wrapper">
  <p>
    REGISTER FORM
  </p>
  <div class="alert-box">
    <?php if (isset($_GET['MatchPassword']) == 1) : ?>
      <div class="alert alert-danger">
        Password Doesn't Match!
      </div>
    <?php endif ?>
    <?php if (isset($_GET['Registered']) == 1) : ?>
      <div class="alert alert-success">
        Register Success! Please <a href="./login.php">Login Here</a>
      </div>
    <?php endif ?>
  </div>
  <div class="form-wrap">
    <form action="../../App/controllers/register.php" method="POST">
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
        <input type="text" placeholder="Phone Number" name="phone">
      </div>
      <div class="form-group">
        <input type="text" placeholder="Address" name="address">
      </div>
      <div class="form-group side">
        <input type="text" placeholder="City" name="city">
        <input type="number" placeholder="Postal Code" name="postal_code">
      </div>
      <div class="form-group">
        <button type="submit">
          Register
        </button>
      </div>
    </form>
  </div>
  <span>
    Already Account?
    <a href="./login.php">Login Here</a </span>
</div>
<?php include("layouts/footer.php") ?>