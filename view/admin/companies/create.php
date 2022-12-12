<?php include("../../../App/_classes/Helpers/RouteAuthCheck.php") ?>
<?php include("../layouts/header.php") ?>

<section class="main-content">
  <div class="related_header">
    <p>Company Created Form</p>

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
    <form action="../../../App/controllers/companies/create.php" id="form" method="post">
      <div class="form-control">
        <label for="name">Name <span class="required">*</span></label>
        <div class="input-holder">
          <input type="text" id="name" name="name" required>
        </div>
      </div>
      <div class="form-control">
        <label for="email">Type <span class="required">*</span> </label>
        <div class="input-holder">
          <input type="text" id="type" name="type" required>
        </div>
      </div>
      <div class="form-control">
        <label for="email">Email <span class="required">*</span></label>
        <div class="input-holder">
          <input type="email" id="email" name="email" required>
        </div>
      </div>
      <div class="form-control">
        <label for="location">Location <span class="required">*</span></label>
        <div class="input-holder">
          <textarea name="location" id="location" rows="5" cols="100" required></textarea>
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
<?php include("../jquery-validate.php") ?>
<?php include("../layouts/footer.php") ?>