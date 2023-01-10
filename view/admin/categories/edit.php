<?php include("../../../App/_classes/Helpers/RouteAuthCheck.php") ?>
<?php
include("../../../vendor/autoload.php");

use Models\Database\CategoryTable;
use Models\Database\MYSQL;

$table = new CategoryTable(new MYSQL());
$category = $table->findById($_GET["id"]);
?>

<?php include("../layouts/header.php") ?>

<section class="main-content">
  <div class="related_header">
    <p>Category Edit Form</p>
    <a class="previous-btn">
      <i class="ri-arrow-go-back-fill"></i>
      <span>
        Go Back
      </span>
    </a>
  </div>
  <div class="alert-box">
    <?php if (isset($_GET['edit_fail']) == 1) : ?>
      <div class="alert alert-danger">
        Edit user Failed!
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
    <form id="form" action="../../../App/controllers/categories/edit.php?id=<?= $_GET["id"] ?>" method="post" enctype="multipart/form-data">
      <div class="form-control">
        <label for="image">Upload profile<span class="required">*</span></label>
        <div class="input-holder">
          <img src="../../../public/assets/images/categories/<?= $category[0]->image ?? 'no-image.jpg' ?>" alt="">
          <input type="file" id="image" name="cover_image" class="file-upload">
        </div>
      </div>
      <div class="form-control">
        <label for="name">Name <span class="required">*</span></label>
        <div class="input-holder">
          <input type="text" id="name" name="name" value="<?= $category[0]->name ?>" required>
        </div>
      </div>
      <div class="form-control">
        <label for=""></label>
        <button class="submit" type="submit">
          Edit
        </button>
      </div>
    </form>
  </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<?php include("../jquery.php") ?>
<?php include("../layouts/footer.php") ?>