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
    <form action="../../../App/controllers/users/create.php" method="post">
      <div class="form-control">
        <label for="name">Name <span class="required">*</span></label>
        <div class="input-holder">
          <input type="text" id="name" name="name">
        </div>
      </div>
      <div class="form-control">
        <label for="email">Email <span class="required">*</span> </label>
        <div class="input-holder">
          <input type="email" id="email" name="email">
        </div>
      </div>
      <div class="form-control">
        <label for="password">Password <span class="required">*</span></label>
        <div class="input-holder">
          <input type="password" id="password" name="password">
        </div>
      </div>
      <div class="form-control">
        <label for="confirm-password">Confirm Password <span class="required">*</span></label>
        <div class="input-holder">
          <input type="password" id="confirm-password" name="confirm_password">
        </div>
      </div>
      <div class="form-control">
        <label for="phone">Phone <span class="required">*</span></label>
        <div class="input-holder">
          <input type="text" id="phone" name="phone">
        </div>
      </div>
      <div class="form-control">
        <label for="address">Address <span class="required">*</span></label>
        <div class="input-holder">
          <textarea name="address" id="address"></textarea>
        </div>
      </div>
      <div class="form-control">
        <label for="city">City <span class="required">*</span></label>
        <div class="input-holder">
          <input type="text" id="city" name="city">
        </div>
      </div>
      <div class="form-control">
        <label for="postal-code">Postal Code <span class="required">*</span></label>
        <div class="input-holder">
          <input type="number" id="postal-code" name="postal_code">
        </div>
      </div>
      <div class="form-control">
        <button type="submit">
          Create
        </button>
      </div>
    </form>
  </div>
</section>

<?php include("../layouts/footer.php") ?>