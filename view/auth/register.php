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
    <form id="form" action="../../App/controllers/register.php" method="POST">
      <div class="half">
        <div class="form-control">
          <label>Name<span class="required">*</span></label>
          <input type="text" name="name" required>
        </div>
        <div class="form-control">
          <label>Email<span class="required">*</span></label>
          <input type="email" name="email" required>
        </div>
      </div>
      <div class="half">
        <div class="form-control">
          <label>Password<span class="required">*</span></label>
          <input type="password" name="password" required>
        </div>
        <div class="form-control">
          <label>Comfirm Password<span class="required">*</span></label>
          <input type="password" name="confirm_password" required>
        </div>
      </div>
      <div class="form-control">
        <label>Phone Number<span class="required">*</span></label>
        <input type="text" name="phone" required>
      </div>
      <div class="form-control">
        <label>Address<span class="required">*</span></label>
        <input type="text" name="address" required>
      </div>
      <div class="half">
        <div class="form-control">
          <label>City<span class="required">*</span></label>
          <input type="text" name="city" required>
        </div>
        <div class="form-control">
          <label>Postal Code<span class="required">*</span></label>
          <input type="number" name="postal_code" required>
        </div>
      </div>
      <div class="form-control">
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

<?php include("./jquery-validate.php") ?>
<?php include("layouts/footer.php") ?>