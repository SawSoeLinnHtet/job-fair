<?php include("../layouts/header.php") ?>

<section class="main-content">
  <div class="related_header">
    <p>Category Created Form</p>
    <a href="./">
      <i class="ri-arrow-go-back-fill"></i>Go Back
    </a>
  </div>
  <div class="alert-box">
    <?php if (isset($_GET['success']) == 1) : ?>
      <div class="alert alert-success">
        Category Created!
      </div>
    <?php endif ?>
    <?php if (isset($_GET['fail']) == 1) : ?>
      <div class="alert alert-danger">
        Created Category Failed!
      </div>
    <?php endif ?>
  </div>
  <div class="related_area">
    <form action="../../../App/controllers/categories/create.php " method="post">
      <div class="form-control">
        <label for="name">Name <span class="required">*</span></label>
        <div class="input-holder">
          <input type="text" id="name" name="name">
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