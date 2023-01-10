<?php include("../../../App/_classes/Helpers/RouteAuthCheck.php") ?>
<?php include("../layouts/header.php") ?>

<section class="main-content">
  <div class="related_header">
    <p>Company Created Form</p>

    <a class="previous-btn">
      <i class="ri-arrow-go-back-fill"></i>
      <span>
        Go Back
      </span>
    </a>
  </div>
  <div class="alert-box">
    <?php if (isset($_GET['create_fail']) == 1) : ?>
      <div class="alert alert-danger">
        Create user Failed!
      </div>
    <?php endif ?>
    <?php if (isset($_GET['type_error']) == 1) : ?>
      <div class="alert alert-warning">
        Check Your Image Type!
      </div>
    <?php endif ?>
    <?php if (isset($_GET['image_error']) == 1) : ?>
      <div class="alert alert-danger">
        Your Image Has error!
      </div>
    <?php endif ?>
    <div class="related_area">
      <form action="../../../App/controllers/companies/create.php" id="form" method="post" enctype="multipart/form-data">
        <div class="form-control">
          <label for="image">Upload profile<span class="required">*</span></label>
          <div class="input-holder">
            <input type="file" id="image" name="cover_image" class="file-upload">
          </div>
        </div>
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
          <label></label>
          <button class="submit" type="submit">
            Create
          </button>
        </div>
      </form>
    </div>
</section>
<?php include("../jquery.php") ?>
<?php include("../layouts/footer.php") ?>