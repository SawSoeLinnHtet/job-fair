<?php
  $title = "Companies-Edit"; 
?>
<?php
include("../../../vendor/autoload.php");

use Models\Database\CompanyTable;
use Models\Database\MYSQL;

$table = new CompanyTable(new MYSQL());
$company = $table->findById($_GET["id"]);
?>

<?php include("../layouts/header.php") ?>

<section class="main-content">
  <div class="related_header">
    <p>Company Edit Form</p>
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
    <form id="form" action="../../../App/controllers/companies/edit.php?id=<?= $_GET['id'] ?>" method="post" enctype="multipart/form-data">
      <div class="form-control">
        <label for="image">Upload profile<span class="required">*</span></label>
        <div class="input-holder">
          <img src="../../../public/assets/images/companies/<?= $company[0]->image ?? 'no-image.jpg' ?>" alt="No Image">
          <input type="file" id="image" name="cover_image" class="file-upload">
        </div>
      </div>
      <div class="form-control">
        <label for="name">Name <span class="required">*</span></label>
        <div class="input-holder">
          <input type="text" id="name" name="name" value="<?= $company[0]->name ?>" required>
        </div>
      </div>
      <div class="form-control">
        <label for="type">Type <span class="required">*</span> </label>
        <div class="input-holder">
          <input type="text" id="type" name="type" value="<?= $company[0]->name ?>" required>
        </div>
      </div>
      <div class="form-control">
        <label for="email">Email <span class="required">*</span></label>
        <div class="input-holder">
          <input type="email" id="email" name="email" value="<?= $company[0]->email ?>" required>
        </div>
      </div>
      <div class="form-control">
        <label for="location">Location <span class="required">*</span></label>
        <div class="input-holder">
          <textarea name="location" id="location"><?= $company[0]->location ?>
          </textarea>
        </div>
      </div>
      <div class="form-control">
        <label></label>
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