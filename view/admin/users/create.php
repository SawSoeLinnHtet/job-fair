<?php include("../../../App/_classes/Helpers/RouteAuthCheck.php") ?>
<?php include("../layouts/header.php") ?>

<section class="main-content">
  <div class="related_header">
    <p>Users Created Form</p>

    <a href="./">
      <i class="ri-arrow-go-back-fill"></i>Go Back
    </a>
  </div>
  <div class="alert-box">
    <?php if (isset($_GET['Failed']) == 1) : ?>
      <div class="alert alert-danger">
        Created user Failed!
      </div>
    <?php endif ?>
  </div>
  <div class="related_area">
    <form id="form" action="../../../App/controllers/users/create.php" method="post">
      <div class="form-control">
        <label for="name">Name <span class="required">*</span></label>
        <div class="input-holder">
          <input type="text" id="name" name="name" required>
        </div>
      </div>
      <div class="form-control">
        <label for="email">Email <span class="required">*</span> </label>
        <div class="input-holder">
          <input type="email" id="email" name="email" required>
        </div>
      </div>
      <div class="form-control">
        <label for="password">Password <span class="required">*</span></label>
        <div class="input-holder">
          <input type="password" id="password" name="password" required>
        </div>
      </div>
      <div class="form-control">
        <label for="confirm-password">Confirm Password <span class="required">*</span></label>
        <div class="input-holder">
          <input type="password" id="confirm-password" name="confirm_password" required>
        </div>
      </div>
      <div class="form-control">
        <label for="phone">Phone <span class="required">*</span></label>
        <div class="input-holder">
          <input type="text" id="phone" name="phone" required>
        </div>
      </div>
      <div class="form-control">
        <label for="address">Address <span class="required">*</span></label>
        <div class="input-holder">
          <textarea name="address" id="address" required></textarea>
        </div>
      </div>
      <div class="form-control">
        <label for="city">City <span class="required">*</span></label>
        <div class="input-holder">
          <input type="text" id="city" name="city" required>
        </div>
      </div>
      <div class="form-control">
        <label for="postal-code">Postal Code <span class="required">*</span></label>
        <div class="input-holder">
          <input type="number" id="postal-code" name="postal_code" required>
        </div>
      </div>
      <div class="form-control">
        <label></label>
        <button type="submit">
          Create
        </button>
      </div>
    </form>
  </div>
</section>

<?php include("../jquery-validate.php") ?>
<?php include("../layouts/footer.php") ?>