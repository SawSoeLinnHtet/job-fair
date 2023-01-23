<?php
$title = "Categories-Create";

use Helpers\Auth;

Auth::check();
?>
<?php include("../layouts/header.php") ?>

<section class="main-content">
  <div class="related_header">
    <p>Category Created Form</p>
    <a href="./">
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
  </div>
  <div class="related_area">
    <form id="form" action="../../../App/controllers/categories/create.php " method="post" enctype="multipart/form-data">
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